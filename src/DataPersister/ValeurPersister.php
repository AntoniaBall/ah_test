<?php

namespace App\DataPersister;
use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use App\Entity\Valeur;
// use Symfony\Component\Mailer\MailerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Mailer\MailerInterface;

final class ValeurPersister implements DataPersisterInterface
{
    private $mailer;
    private $entityManager;

    public function __construct(\Swift_Mailer $mailer,
    EntityManagerInterface $entityManager)
    {
        $this->mailer = $mailer;
        $this->entityManager = $entityManager;
    }

    public function supports($data): bool
    {
        return $data instanceof Valeur;
    }
    /**
     * @param Valeur $data
     */
    public function persist($data, array $context = [])
    {
        dump("persistData");
        $this->entityManager->persist($data);
        $this->entityManager->flush();
    }

    public function remove($data, array $context = [])
    {
        $this->entityManager->remove($data);
        $this->entityManager->flush();
    }
}