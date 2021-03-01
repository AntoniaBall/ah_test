<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Repository\PaiementRepository;
use App\Entity\Paiement;

/**
 * Manage the web hook
 */
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
        $paiement = $repository->findPaiementByEvent($event["object"]["id"]);
        
        if (!$paiement){
            throw new HttpException(404, "No payment found");
        }

        $em = $this->getDoctrine()->getManager();

        $reservation = $paiement[0]->getReservation();

        switch ($event["object"]["status"]) {
            case 'succeeded':
                $reservation->setStatus("acceptee");
                $reservation->setPaid(true);
                $paiement[0]->setRetourStripe("succeeded");
                $paiement[0]->setDateRetourStripe(new \DateTime('now'));
                $em->persist($reservation);
                $em->persist($paiement[0]);
                $em->flush();
            break;
            case 'requires_payment_method':
                $reservation->setStatus("rejetee");
                $reservation->setPaid(false);
                $paiement[0]->setRetourStripe("failed");
                $paiement[0]->setDateRetourStripe(new \DateTime('now'));
                $em->persist($reservation);
                $em->persist($paiement[0]);
                $em->flush();
            break;
            case 'failed':
                echo "failed";
            default:
            echo 'Received unknown event type ' . $event["object"]["id"];
        }
        http_response_code(200);

        return new Response("The paiement is well treated");
    }
}