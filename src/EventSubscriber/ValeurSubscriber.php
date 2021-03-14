<?php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use ApiPlatform\Core\Util\RequestAttributesExtractor;
use App\Entity\Property;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Vich\UploaderBundle\Storage\StorageInterface;

final class ValeurSubscriber implements EventSubscriberInterface
{
    private $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::VIEW => ['onPreSerialize', EventPriorities::PRE_SERIALIZE],
        ];
    }

    public function onPreSerialize(ViewEvent $event): void
    {
        $controllerResult = $event->getControllerResult();
        $request = $event->getRequest();

        if ($controllerResult instanceof Response || 
            !$request->attributes->getBoolean('_api_respond', true)) {
            return;
        }
        
        if (!($attributes = RequestAttributesExtractor::extractAttributes($request)) 
            || !\is_a($attributes['resource_class'], Property::class, true)) {
            return;
        }

        $object = $controllerResult;
        // $valeurs = $object->getValeurs();
        
        // foreach ($valeurs as $valeur){
        //     $valeur->setSavedValue(($valeur->getValue()));
        // }
        // dump($object->getId());
        // die();
        // $valeurs = $object->getValeurs();

        // foreach ($valeurs as $valeur){
        //     dump("beyonce");
        //     $valeur->setSavedValue(($valeur->getValue()));
        //     $valeur->getSavedValue();
        // }
    }
}