<?php

namespace App\Services;

use App\Entity\UserNotifications;
use Doctrine\ORM\EntityManagerInterface;

class NotificationService {

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }
    
    public function sendNotificationMessage($user, $message){
        $notifications = new UserNotifications();
        $notifications->setNotificationText($message);
        $notifications->setUser($user);
        $this->entityManager->persist($notifications);
        $this->entityManager->flush();
    }
}