<?php

use App\Message\AddPropertyMessage;

class AppMessageHandler implements MessageHandlerInterface {
    public function __invoke(AddPropertyMessage $propertyMessage)
    {
        /**
         * PATCH "/api/properties/{id}/{$message->property->getId()/reviewing}
         */
        
    }
}