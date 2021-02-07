<?php

namespace App\Controller;

use App\Entity\Reservation;
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

class ReservationController extends AbstractController
{
    private $paimentService;
    private $params;

    public function __construct(PaymentService $paiementService, ParameterBagInterface $params)
    {
        $this->paimentService= $paiementService;
        $this->params = $params;

    }

    public function __invoke(Reservation $data, Request $request) : Reservation
    {
        // verifier si datestart et dateend disponibility
        $disponibilities = $data->getProperty()->getDisponibilities()->toArray();

        // dump($data->getDateStart());

        $interval = date_diff($data->getDateEnd(), $data->getDateStart()); // 6 days

        foreach($disponibilities as $disponibility)
        {
            // dates de diff reservation
            $dates = new \DatePeriod(
                $data->getDateStart(),
                new \DateInterval('P1D'),
                $data->getDateEnd(),
            );
            foreach($dates as $date){
            // 1- verifier que l'intervalle dateStart et dateEnd sont disponibles, sinon renvoyer une erreur
                if (new \DateTime($date->format('Y-m-d')) < $disponibility->getDateStart()){
                    throw new HttpException(400,"Le bien n'est pas disponible à ces dates de fin");
                } else if (new \DateTime($date->format('Y-m-d')) > $disponibility->getDateEnd()){
                    throw new HttpException(400,"Le bien n'est pas disponible à ces dates de fin");
                }
            }
        }
        
        $bien = $data->getProperty()->getMaxTravelers();

        if($data->getNumberTraveler() >$data->getProperty()->getMaxTravelers())
        {
            throw new HttpException(400, "Le nombre de voyageurs est supérieur à la capacité du bien que vous voulez réserver");
        }

        // si user n'a pas une autre reservation (pas plus de 2 reservations)
        
        // $requestBody = json_decode($request->getContent(), true);

        // if (!isset($requestBody["stripeToken"])){
        //     $response = new Response();
        //     $response->setContent(json_encode([
        //         'status' => 400,
        //         'message' => 'Bad Request',
        //         'description' => 'API Key Stripe missing'
        //     ]));
        //     $response->setStatusCode(400);
        //     return $response;
        // }

        $newReservation = new Reservation();

        // si token, demander le paiement à l'api stripe
        $this->paimentService->createCharge();

        // créer un objet paiement
        
        die();
        //retourne la nouvelle reservation
        return $data;

    }
}
