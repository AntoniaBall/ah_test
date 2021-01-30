<?php

namespace App\Message;

class AddPropertyMessage {
    public $content;

    public function __construct(String $content)
    {
        $this->content = $content;
    }
    
    public function getContent(): string
    {
        return $this->content;
    }
}