<?php

namespace App\EventSubscriber;

use App\Entity\Property;
use ApiPlatform\Core\EventListener\EventPriorities;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;

/**
  * Cette classe est un écouteur d'évenements qui va écouter toutes les opérations post de l'application, 
  * et executera la méthode public function setCurrentUser à chaque fois qu'un post opération est fait
*/
final class CurrentUserSubscriber implements EventSubscriberInterface
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
            KernelEvents::VIEW => [['setCurrentUser', EventPriorities::PRE_WRITE]],
        ];
    }

    public function setCurrentUser(ViewEvent $event)
    {
    /**
    * Pour débugger, faire un dump de tes variables ici
    */
    $object = $event->getControllerResult();
    // si l'objet est un bien ou une réservation setter le user au user connecté actuellement
    if ($object instanceof Property){
            $object->setUser($this->tokenStorage->getToken()->getUser());
            $event->setControllerResult($object);
        }
    }
}