<?php

namespace App\Controller;
use App\Repository\UserRepository;
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


class ResetRequestController extends AbstractController
{
    private $emailVerifier;
   

    public function __construct(EmailVerifier $emailVerifier,MailerInterface $mailer)
    {
        $this->emailVerifier = $emailVerifier;
        $this->mailer = $mailer;
    }

    
    public function __invoke(User $data,Request $request,UserRepository $usersRepo,GuardAuthenticatorHandler $guardHandler, UserAuthenticationAuthenticator $authenticator,TokenGeneratorInterface $tokenGenerator, \Swift_Mailer $mailer): User
    {
            $content = json_decode($request->getContent());
            $donnees = $data;
            $data = $usersRepo->findOneByEmail($donnees->getEmail());
            //dd($data);
            $token = $tokenGenerator->generateToken();
            $url = $this->generateUrl('api_users_reset_password_item', ['token' => $token],UrlGeneratorInterface::ABSOLUTE_URL);
            $data->setRestToken($token);
            
           
            $message = (new \Swift_Message('Mot de passe oublié'))
            ->setFrom('anouar.deve@gmail.com')
            ->setTo($data->getEmail())
            ->setBody(
                "<p>Bonjour,</p><p> Une demande de réinitialisation de mot de passe a été effectuée pour le site Atypikhouse.fr. Veuillez cliquer sur le lien suivant : <br><br>
                <a href='https://f2i-dev-14-ba-ka-pc.vercel.app/' >ici </a><br><br> Entrer ce code pour confirmer votre demande :  $token</p>",
                'text/html'
                )
            ;
         
            $mailer->send($message);
    return $data;
}

 
}
