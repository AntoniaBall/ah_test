<?php

namespace App\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\Security\Core\Exception\DisabledException;



class JWTCreatedListener {
    
    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function onJwtCreated(JWTCreatedEvent $event): void
    {
        
        $user = $event->getUser();
        if (!$user->isVerified()) {
            throw new DisabledException('User account is disabled.');
             }
        $payload = $event->getData();
        $payload['_id'] = $user->getId();

        $event->setData($payload);
    }
}