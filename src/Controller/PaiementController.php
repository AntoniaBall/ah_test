<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Repository\PaiementRepository;
use App\Entity\Paiement;

class PaiementController extends AbstractController
{
    /**
     * @Route("/stripeHooks", name="paiement")
     */
    public function index(Request $request) : Response
    {
        $event = json_decode($request->getContent(), true);

        if (!$event){
            throw new HttpException(400, "No JSON Body from Stripe");
        }

        $repository = $this->getDoctrine()->getRepository(Paiement::class);
        
        // $paiement = $repository->findPaiementByEvent($event["object"]["id"]);
        $paiement = $repository->findPaiementByEvent($event["data"]["object"]["id"]);

        dump($event["data"]["object"]["id"]);
        die();
        
        $reservation = $paiement->getReservation();
        switch ($event["object"]["status"]) {
            case 'succeeded':
                $reservation->setStatus("acceptee");
                $reservation->setPaid(true);
                dump($paiement);
                die("paiementsucceed");
            break;
            case 'payment_method.attached':
                $reservation->setStatus("acceptee");
                $reservation->setPaid(true);
                die("paymentfailed");
            break;
            case 'failed':
                echo "failed";
            default:
            echo 'Received unknown event type ' . $event["object"]["id"];
        }
        die();
        
        // http_response_code(200);


    }
}
