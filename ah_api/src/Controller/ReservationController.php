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

class ReservationController extends AbstractController
{
    private $security;
    private $paimentService;
    private $params;

    public function __construct(PaymentService $paiementService, ParameterBagInterface $params, Security $security)
    {
        $this->paimentService= $paiementService;
        $this->params = $params;
        $this->security = $security;

    }

    public function __invoke(Reservation $data, Request $request) : Reservation
    {
        // verifier si datestart et dateend disponibility
        $disponibilities = $data->getProperty()->getDisponibilities();
        // dump($disponibilities);
        // die();
        $interval = date_diff($data->getDateEnd(), $data->getDateStart()); // 6 days

        if (!$data->getStripeToken()) {
            throw new HttpException(400, "Aucun paiement initié pour cette réservation");
        }

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
                    throw new HttpException(400, "Le bien n'est pas disponible à ces dates de fin");
                } else if (new \DateTime($date->format('Y-m-d')) > $disponibility->getDateEnd()){
                    throw new HttpException(400,"Le bien n'est pas disponible à ces dates de fin");
                }
            }
        }

        if($data->getNumberTraveler() > $data->getProperty()->getMaxTravelers()) {
            throw new HttpException(400, "Le nombre de voyageurs est supérieur à la capacité du bien que vous voulez réserver");
        }

        // vérifier qu'il n'y a pas de reservation acceptée et dont la date de fin est inf à today
        
        // $reservations = $data->getUser()->getReservations()->toArray();
        // // dump($reservations);
        
        // foreach ($reservations as $reservation)
        // {
        //     if ($reservation->getStatus()=== "acceptee" && $reservation->getDateEnd() < new \Datetime('now'))
        //     {
        //         throw new HttpException(400, "Vous avez déjà une réservation en cours");
                
        //     }
        //     // vérifier si plus d'une réservation acceptée et dateEnd
        //     dump($reservation->getDateEnd());
        //     dump($reservation->getDateEnd());
        // }

        // PREPARER PAIEMENT
        // dump($data->getStripeToken());

        // \Stripe\Stripe::setApiKey($this->getParameter('stripe_secret_key'));

        // // $event = \Stripe\Charge::create(array(
        // //     "amount" => $data->getMontant() * 1000,
        // //     "currency" => "eur",
        // //     "source" => "tok_visa",
        // //     "description" => "First test charge!"
        // // ));

        // // create a payment intent event
        
        // $event = \Stripe\PaymentIntent::create([
        //     "amount" => $data->getMontant() * 1000,
        //     'currency' => 'eur',
        //     'payment_method_types' => ['card'],
        //   ]);

        // charge_created - charge_succeeded - charge_failure

        // dump($event["amount"]);

        $em = $this->getDoctrine()->getManager();
        
        // enregister le paiement & evenement id
        $paiement = new Paiement();
        $paiement->setReservation($data);
        $paiement->setDatePaiement(new \Datetime('now'));
        $paiement->setTokenStripe($data->getStripeToken());
        $paiement->setRetourStripe("en attente");
        $paiement->setEventId($data->getStripeToken());
        $paiement->setMontant($data->getMontant()*100);

        $em->persist($paiement);
        $em->flush();

        $newReservation = new Reservation();

        // enlever dates de disponibilites du bien

        $property = $data->getProperty();
        dump($property->getProperty());

        // REMOVE DISPONIBILITY
        
        // $property->removeDisponibility($disponibilities);
        // dump($property->getDisponibilities());
        // die();
        // $newReservation->setUser($currentUser);

        // si token, demander le paiement à l'api stripe
        // $this->paimentService->createCharge();

        // die("fin controlleur");
        //retourne la nouvelle reservation
        return $data;

    }
}
