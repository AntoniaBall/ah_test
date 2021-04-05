<?php

namespace App\Security\Guard;

use Lexik\Bundle\JWTAuthenticationBundle\Security\Guard\JWTTokenAuthenticator as BaseAuthenticator;
use App\Entity\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\DisabledException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;

class JWTTokenAuthenticator extends BaseAuthenticator
{

    // public function createAuthenticatedToken(UserInterface $user, $providerKey)
    // {
    //     parent::createAuthenticatedToken($user, $providerKey);
    // //  // dd('toto');
    //     if (!$user->isVerified()) {
    //         throw new DisabledException('User account is disabled.');
    //     }

    //    return true;
    // }

}