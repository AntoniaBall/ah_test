<?php

namespace App\DataPersister;

use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use Doctrine\ORM\EntityManagerInterface;

final class UserPersister implements DataPersisterInterface
{
    private $mailer;
    private $userPasswordEncoder;
    private $entityManager;

    public function __construct(\Swift_Mailer $mailer,UserPasswordEncoderInterface $userPasswordEncoder, EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
        $this->userPasswordEncoder = $userPasswordEncoder;
    }

    public function supports($data, array $context = []): bool
    {
        return $data instanceof User;
    }

    public function persist($data, array $context = [])
    {
        if ($data->getPassword()) {
            $data->setPassword(
                $this->userPasswordEncoder->encodePassword($data, $data->getPassword())
            );
            $data->eraseCredentials();
        }

        $this->entityManager->persist($data);
        $this->entityManager->flush();
    }

    public function remove($data, array $context = [])
    {
        $this->entityManager->remove($data);
        $this->entityManager->flush();
    }

    /**
     * @param User $data
     */
    private function encodePassword(User $data)
    {
        
        // $message=(new \Swift_Message('post property'))
        // ->setFrom('admin@yopmail.com')
        // ->setTo('antonia.balluais@gmail.com')
        // ->setBody('Bonjour '.$property->getUser()->getEmail().'Votre bien est en cours d\'etude par notre equipe. Nous vous informerons bientot des que nous avons une reponse');

        // $this->mailer->send($message);
    }

    // private function sendResponseAdmissionEmail(Property $property)
    // {
    //     $message=(new \Swift_Message('response to your property add commission'))
    //     ->setFrom('admin@yopmail.com')
    //     ->setTo('antonia.balluais@gmail.com')
    //     ->setBody('Bonjour '.$property->getUser()->getEmail().' your property has been '.$property->getStatus().'by Atypik\'House');

    //     $this->mailer->send($message);

    // }
}