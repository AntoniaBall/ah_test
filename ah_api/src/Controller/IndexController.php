<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Messenger\MessageBusInterface;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    // public function index(): Response
    // public function index(MessageBusInterface $bus): Response
    public function index(\Swift_Mailer $mailer)
    {
        $message=(new \Swift_Message('Hello Email'))
        ->setFrom('admin@yopmail.com')
        ->setTo('antonia.balluais@gmail.com')
        ->setBody('coucou');

        $mailer->send($message);

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
