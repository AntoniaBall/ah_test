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
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class RegistrationController extends AbstractController
{
    private $emailVerifier;
   

    public function __construct(EmailVerifier $emailVerifier,MailerInterface $mailer)
    {
        $this->emailVerifier = $emailVerifier;
        $this->mailer = $mailer;
    }

    
    public function __invoke(User $data,Request $request,GuardAuthenticatorHandler $guardHandler, UserAuthenticationAuthenticator $authenticator,TokenGeneratorInterface $tokenGenerator, \Swift_Mailer $mailer,UserPasswordEncoderInterface $passwordEncoder): User
    {
            $content = json_decode($request->getContent());
            $token = $tokenGenerator->generateToken();
            $url = $this->generateUrl('api_users_app_verify_email_item', ['token' => $token],UrlGeneratorInterface::ABSOLUTE_URL);
            $data->setActivationToken($token);
            $data->setPassword($passwordEncoder->encodePassword($data, $data->getPassword('password')));
            $message = (new \Swift_Message('Compte activation'))
            ->setFrom('anouar.deve@gmail.com')
            ->setTo($data->getEmail())
            ->setBody(
                "<p>Bonjour,</p><p> Please confirm your email address by clicking the following link: <br><br>
                <a href='https://f2i-dev-14-ba-ka-pc.vercel.app/verification-compte' >Confirm my Email  </a><br><br> votre code d'activation est :  $token </p>",
                'text/html'
                )
            ;
            //dd($token);
            $mailer->send($message);
    return $data;
    }
    
}
