<?php
namespace App\EventListener;

class PropertyStateListener
{
    public function __construct(MessagBusInterface $bus)
    {
        $this->bus = $bus;
    }

    public function onPrepare(Event $event)
    {
        $bien = $event->getSubject();
        $this->bus->dispatch(new AddPropertyMessage($bien));
    }

    public static function getSubscribedEvents()
    {
        return ['workflow.create_property.transition.reviewing' => 'reviewing'];
    }
}