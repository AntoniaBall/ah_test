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
        // dump($data);

        $requestBody = json_decode($request->getContent(), true);

        if (!isset($requestBody["stripeToken"])){
            $response = new Response();
            $response->setContent(json_encode([
                'status' => 400,
                'message' => 'Bad Request',
                'description' => 'API Key Stripe missing'
            ]));
            $response->setStatusCode(400);
            return $response;
        }

        $newReservation = new Reservation();

        // si token, demander le paiement à l'api stripe
        $this->paimentService->createCharge();

        // créer un objet paiement
        
        //retourne la nouvelle reservation
        return $data;

    }
}
