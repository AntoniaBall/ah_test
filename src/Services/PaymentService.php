<?php

namespace App\Services;

use App\Entity\Paiement;

class PaymentService {

    private $clientSecret;

    public function __construct($clientSecret)
    {
        $this->clientSecret = $clientSecret;
    }

    // confirmPaymentIntent
    public function confirmPayment($reservation, $paymentId)
    {
        \Stripe\Stripe::setApiKey($this->clientSecret);

        // dump($this->clientSecret);
        $stripe = new \Stripe\StripeClient($this->clientSecret);
        $stripe->paymentIntents->confirm(
            $paymentId,
            ['payment_method' => 'pm_card_visa']
        );

        // enregistrer le paiement
        $paiement = new Paiement();
        $paiement->setTokenStripe($paymentId);
        $paiement->setDatePaiement(new \DateTime('now'));
        $paiement->setStatus("paiement en cours");
        $paiement->setMontant($reservation->getMontant());

        $reservation->addPaiement($paiement);
    }
    
    // refundPaymentIntent if proprio rejected the reservation demand and payment has been succeed
    public function refundPayment($paymentId)
    {
        
    }

    // cancel PaymentIntent if proprio rejected the reservation and payment has not been sent
    public function cancelPayment($paymentId)
    {
        $stripe = new \Stripe\StripeClient($this->clientSecret);
        $stripe->paymentIntents->cancel(
            $paymentId,
            ['payment_method' => 'pm_card_visa']
        );
    }

    //find event based on paymentId in the webhook
    public function findPayment($paymentId)
    {
        $stripe = new \Stripe\StripeClient($this->clientSecret);

        return $stripe->paymentIntents->retrieve(
                        $paymentId, []
            );
    }

    
    
}