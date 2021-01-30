<?php
namespace App\EventListener;

use App\Message\AddPropertyMessage;

class AddPropertyListener {
    private $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;
    }

    public function postPersist(Property $property)
    {
        $this->bus->dispatch(new AddPropertyMessage($property));
    }
}

