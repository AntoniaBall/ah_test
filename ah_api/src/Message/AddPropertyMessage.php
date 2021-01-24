<?php

namespace App\Message;

use App\Entity\Property;

class AddPropertyMessage {
    public $property;

    public function __construct(Property $property)
    {
        $this->property = $property;
    }

}