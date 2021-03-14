<?php

namespace App\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Symfony\Component\HttpFoundation\RequestStack;

class PropertyValeurListener{
    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     */
    public function exemple()
    {
        dump("propertyListener");
        die();
    }




}