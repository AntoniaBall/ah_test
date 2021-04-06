<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\EmailVerifier;
use App\Security\UserAuthenticationAuthenticator;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use Symfony\Component\HttpFoundation\RequestStack;


class VerifyEmailController extends AbstractController
{
    private $emailVerifier;
   

    public function __construct(EmailVerifier $emailVerifier, RequestStack $request )
    {
        $this->emailVerifier = $emailVerifier;
        $this->currentRequest = $request->getCurrentRequest();
    }

    
    public function __invoke(User $data,Request $request,$token): User
    {
       
      //$data = json_decode($request->getContent());
      $data = $this->getDoctrine()->getRepository(User::class)->findOneBy(['activation_token' => $token]);
      $data->setIsVerified(true);
      $data->setActivationToken(null);
    

    return $data;
    }

}
