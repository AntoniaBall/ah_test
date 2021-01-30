<?php

namespace App\EventListener;

class PropertyListener {
    // private $bus;

    // public function __construct(MessageBusInterface $bus)
    public function __construct()
    {
        // $this->bus = $bus;
        dump("created");

    }

    // public function postPersist(Property $property)
    // {
    //     $this->bus->dispatch(new AddPropertyMessage('review en cours'));
    // }
}