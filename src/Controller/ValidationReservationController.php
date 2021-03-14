<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Entity\Paiement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Services\PaymentService;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Security\Core\Security;

class ValidationReservationController extends AbstractController
{
    private $security;
    private $paimentService;
    private $params;

    public function __construct(PaymentService $paiementService, 
            ParameterBagInterface $params, Security $security)
    {
        $this->paimentService = $paiementService;
        $this->params = $params;
        $this->security = $security;
    }

    public function __invoke(Reservation $data, Request $request) : Reservation
    {
        $bodyRequest = json_decode($request->getContent(), true);
        $currentDisponibilities= $data->getProperty()->getDisponibilities();
        
        if ($data->getIsPublished() === false){
            throw new HttpException(400, "Le bien que vous essayez de réserver est masqué");
        }

        if (!$bodyRequest){
            throw new HttpException(400, "Please provide a valid JSON");
        }

        if (!in_array($bodyRequest["status"], ["acceptee", "rejetee"])){
            throw new HttpException(400, "Please provide a correct answer");
        }

        $userReservationsCount = $this->getDoctrine()
        ->getRepository(Reservation::class)
        ->getCountReservationsByUser($data->getUser());

        if ($userReservationsCount[0][1] > 10){
            throw new HttpException(400, "Vous avez plus de 2 reservations en attente");
        }

        $periodes = new \DatePeriod(
            $data->getDateStart(),
            new \DateInterval('P1D'),
            $data->getDateEnd()->modify("+1 day")
        );

        $em = $this->getDoctrine()->getManager();

        if($data->getNumberTraveler() > $data->getProperty()->getMaxTravelers()) {
            throw new HttpException(400, "Le nombre de voyageurs est supérieur à la capacité du bien que vous voulez réserver");
        }

        if ($bodyRequest["status"] === "acceptee"){
            foreach($periodes as $period) {
                $result = $this->getDoctrine()
                ->getRepository(Reservation::class)
                ->getOtherWaitingReservations($period, $data->getProperty()->getId(), $data->getId());
                $reservations[] = $result;
            }
            foreach ($reservations[0] as $reservation){
                $reservation->setStatus("rejetee");
            }

            // envoyer le paiement
            $this->paimentService->confirmPayment($data, $data->getStripeToken());
            $data->setStatus("acceptee");

            // trouver et bloquer les dates
          
        } else{
            // si reservation rejetee
            $this->paimentService->cancelPayment($data->getStripeToken());
            $data->setStatus("rejetee");
        }
        $em->persist($data);
        $em->flush();
        return $data;
    }
}
