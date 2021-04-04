<?php

declare(strict_types=1);


namespace App\EventListener;

use App\Entity\User;
use App\Repository\UserRepository;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTDecodedEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class JWTDecodedListener
{
    private ?Request $request;
    private UserRepository $userRepository;

    public function __construct(RequestStack $requestStack, UserRepository $userRepository)
    {
        $this->request = $requestStack->getCurrentRequest();
        $this->userRepository = $userRepository;
    }

    public function onJWTDecoded(JWTDecodedEvent $event): void
    {
        
        $payload = $event->getPayload();

        if (!$username = $payload['email']) {
            throw new BadRequestHttpException('email not found !!!!');
        }

        $user = $this->userRepository->findOneBy(['email' => $username]);

       
    }
}