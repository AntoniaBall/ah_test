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
        
        // dump($event);
    
        $repository = $this->getDoctrine()->getRepository(Paiement::class);
        switch ($event["object"]["status"]) {
            case 'succeeded':
                // récupérer le paiement relatif à l'id de l'event
                $paiement = $repository->findPaiementByEvent($event["object"]["id"]);

                dump($paiement);
                die("paiementsucceed");
            break;
            case 'payment_method.attached':
                // $paymentMethod = $event->data->object; // contains a \Stripe\PaymentMethod
                die("paymentfailed");
            break;
            // ... handle other event types
            default:
            echo 'Received unknown event type ' . $event["object"]["id"];
        }
        die();
        
        // http_response_code(200);


    }
}
