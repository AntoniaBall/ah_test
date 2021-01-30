<?php

namespace App\Handler;

use App\Message\AddPropertyMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class AddPropertyHandler implements MessageHandlerInterface {

    public function __invoke(AddPropertyMessage $message)
    {
        /**
         * PATCH "api/properties/{$message->property->getId()}/prepare
         */
        return 'coucou';
    }
}