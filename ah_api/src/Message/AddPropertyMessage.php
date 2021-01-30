<?php

namespace App\Message;

class AddPropertyMessage {
    private $content;

    public function __construct(string $content)
    {
        $this->content = $content;
        return $this->getContent();
    }

    public function getContent(): string
    {
        return $this->content;
    }
    // private $bus;

    // public function __construct(MessageBusInterface $bus)
    // {
    //     $this->bus = $bus;
    // }

    // public function postPersist()
    // {
    //     return "coucou";
    // }
}