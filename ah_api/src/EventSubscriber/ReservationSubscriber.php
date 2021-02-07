<?php

namespace App\EventSubscriber;

use App\Entity\Reservation;
use App\Entity\Property;
use ApiPlatform\Core\EventListener\EventPriorities;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;

  /**
    * Cette classe est un écouteur d'évenements qui va écouter toues les opérations post de l'application, 
    * et executera la méthode public function setCurrentUser à chaque fois qu'un post opération est fait
    */
    
final class ReservationSubscriber implements EventSubscriberInterface
{
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * CurrentUserSubscriber constructor.
     */
    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => [['addReservationAction', EventPriorities::PRE_WRITE]],
        ];
    }

    public function addReservationAction(ViewEvent $event)
    {
    /**
    * récupérer le résultat du controlleur
    */
        $object = $event->getControllerResult();
        
        var_dump("coucou");
        // die();
        if ($object instanceof Reservation){
            $object->setUser($this->tokenStorage->getToken()->getUser());
            $event->setControllerResult($object);
        }
        
        return true;
    }
}