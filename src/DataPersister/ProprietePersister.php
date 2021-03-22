<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\Property;
use App\Entity\UserNotifications;
// use Symfony\Component\Mailer\MailerInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Services\NotificationService;
use Symfony\Bridge\Twig\Mime\NotificationEmail;
use ApiPlatform\Core\DataPersister\DataPersisterInterface;

final class ProprietePersister implements ContextAwareDataPersisterInterface
{
    private $decorated;
    private $entityManager;
    private $mailer;
    private $notificationService;

    public function __construct(DataPersisterInterface $decorated,
    \Swift_Mailer $mailer,EntityManagerInterface $entityManager, NotificationService $notificationService)
    {
        $this->decorated = $decorated;
        $this->mailer = $mailer;
        $this->entityManager = $entityManager;
        $this->notificationService = $notificationService;
    }

    public function supports($data, array $context = []): bool
    {
        return $this->decorated->supports($data, $context);
    }

    public function persist($data, array $context = [])
    {
        $result = $this->decorated->persist($data, $context);
        if ($data instanceof Propriete && (($context['collection_operation_name'] ?? null) === 'post')) {
            $this->sendOwnerEmails($data);
        }
        return $result;
    }

    public function remove($data, array $context = [])
    {
        return $this->decorated->remove($data, $context);
    }
    
    private function sendOwnerEmails(Propriete $data){
        dump("coucou");
        die();
    }
    public function resumable(array $context = []): bool 
    {
        return true;
    }
}