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

    public function __construct(PaymentService $paiementService, ParameterBagInterface $params, Security $security)
    {
        $this->paimentService = $paiementService;
        $this->params = $params;
        $this->security = $security;
    }

    public function __invoke(Reservation $data, Request $request) : Reservation
    {
        // pour le proprio valider les reservations et ce qu'il s'en suit

        $bodyRequest = json_decode($request->getContent(), true);

        if (!$bodyRequest){
            throw new HttpException(400, "Please provide a valid JSON");
        }

        // affectee la décision "validee" ou "rejetee"
        if (!in_array($bodyRequest["status"], ["acceptee", "rejetee"])){
            throw new HttpException(400, "Please provide a correct answer");
        }
        
        // $data->setStatus($bodyRequest["status"]);
        
        $periodes = new \DatePeriod(
            $data->getDateStart(),
            new \DateInterval('P1D'),
            $data->getDateEnd()->modify("+1 day")
        );
        
        $statusUpdate = $bodyRequest["status"] === "acceptee" ? "rejetee" : "acceptee";

        // trouver toutes les réservations de ce bien entre les 2 dates
        $em = $this->getDoctrine()->getManager();
        
        foreach($periodes as $period){
            $otherResa = $this->getDoctrine()
            ->getRepository(Reservation::class)
            ->getOtherWaitingReservations($period, $data->getProperty()->getId(), $data->getId());

            // $otherResa->setStatus($statusUpdate);

            // $reservation = $this->getDoctrine()->getRepository(Reservation::class)->find($data->getId()); // array
            // dump($otherResa[0]);
            // $resa->setStatus($statusUpdate);
            $reservations[] = $otherResa;
            // $reservatiions[] = $reservation;
        }
        
        foreach ($reservations[0] as $otherReservation){
            $otherReservation->setStatus($statusUpdate);
        }
        // dump($reservations[0]);
        // die();

        // if($data->getNumberTraveler() > $data->getProperty()->getMaxTravelers()) {
        //     throw new HttpException(400, "Le nombre de voyageurs est supérieur à la capacité du bien que vous voulez réserver");
        // }
        
        // // vérifier que l'utilisateur n'a pas plus de 2 reservations en attente
        // $userReservationsCount = $this->getDoctrine()
        //         ->getRepository(Reservation::class)
        //         ->getCountReservationsByUser($data->getUser());

        // if ($userReservationsCount[0][1] > 10){
        //     throw new HttpException(400, "Vous avez plus de 2 reservations en attente");
            
        // }

        // // PREPARER PAIEMENT
        // // dump($data->getStripeToken());
                              
        // // \Stripe\Stripe::setApiKey($this->getParameter('stripe_secret_key'));
                              
        // // // $event = \Stripe\Charge::create(array(
        //                                                 // //     "amount" => $data->getMontant() * 1000,
        //                                                 // //     "currency" => "eur",
        //                                                 // //     "source" => "tok_visa",
        //                                                 // //     "description" => "First test charge!"
        //                                                 // // ));
                                                        
        //                                                 // // create a payment intent event
                                                        
        //                                                 // $event = \Stripe\PaymentIntent::create([
        //                                                     //     "amount" => $data->getMontant() * 1000,
        //                                                     //     'currency' => 'eur',
        // //     'payment_method_types' => ['card'],
        // //   ]);

        // // enregister le paiement & créer le payment intent
        // $paiement = new Paiement();
        // $paiement->setReservation($data);
        // $paiement->setDatePaiement(new \Datetime('now'));
        // $paiement->setTokenStripe($data->getStripeToken());
        // $paiement->setRetourStripe("en attente");
        // $paiement->setEventId($data->getStripeToken());
        // $paiement->setMontant($data->getMontant()*100);

        // $em->persist($paiement);
        // $em->flush();

        // $newReservation = new Reservation();
        
        return $data;
    }
}
