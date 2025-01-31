<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Mailer\MailerInterface;

final class UserPersister implements DataPersisterInterface
{
    private $mailer;
    private $entityManager;
    private $userPasswordEncoder;

    public function __construct(\Swift_Mailer $mailer,
    EntityManagerInterface $entityManager, UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $this->mailer = $mailer;
        $this->entityManager = $entityManager;
        $this->userPasswordEncoder = $userPasswordEncoder;
    }

    public function supports($data): bool
    {
        return $data instanceof User;
    }
    /**
     * @param User $data
     */
    public function persist($data)
    {
        // if ($data->getPassword()) {
        //     $data->setPassword(
        //         $this->userPasswordEncoder->encodePassword($data, $data->getPassword())
        //     );
        //     $data->eraseCredentials();
        // }
        $this->entityManager->persist($data);
        $this->entityManager->flush();
    }

    public function remove($data)
    {
        $this->entityManager->remove($data);
        $this->entityManager->flush();
    }
    public function resumable(array $context = []): bool 
    {
        return true;
    }
}