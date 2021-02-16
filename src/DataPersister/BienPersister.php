<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\Property;
// use Symfony\Component\Mailer\MailerInterface;

final class BienPersister implements ContextAwareDataPersisterInterface
{
    private $decorated;
    private $mailer;

    public function __construct(ContextAwareDataPersisterInterface $decorated, \Swift_Mailer $mailer)
    {
        $this->decorated = $decorated;
        $this->mailer = $mailer;
    }

    public function supports($data, array $context = []): bool
    {
        return $this->decorated->supports($data, $context);
    }

    public function persist($data, array $context = [])
    {
        $result = $this->decorated->persist($data, $context);

        // quand un bien est ajouté par un propriétaire
        if ($data instanceof Property && (($context['collection_operation_name'] ?? null) === 'post')) {
            $this->sendAddPropertyEmail($data);
        }

        // quand le statut d'un bien est accepté ou rejeté par l'administrateur
        if ($data instanceof Property && (($context['item_operation_name'] ?? null) === 'patch')) {
            $this->sendResponseAdmissionEmail($data);
        }
        return $result;
    }

    public function remove($data, array $context = [])
    {
        return $this->decorated->remove($data, $context);
    }

    private function sendAddPropertyEmail(Property $property)
    {
        $message=(new \Swift_Message('post property'))
        ->setFrom('admin@yopmail.com')
        ->setTo('antonia.balluais@gmail.com')
        ->setBody('Bonjour '.$property->getUser()->getEmail().'Votre bien est en cours d\'etude par notre equipe. Nous vous informerons bientot des que nous avons une reponse');

        $this->mailer->send($message);
    }

    private function sendResponseAdmissionEmail(Property $property)
    {
        $message=(new \Swift_Message('response to your property add commission'))
        ->setFrom('admin@yopmail.com')
        ->setTo('antonia.balluais@gmail.com')
        ->setBody('Bonjour '.$property->getUser()->getEmail().' your property has been '.$property->getStatus().'by Atypik\'House');

        $this->mailer->send($message);

    }
}