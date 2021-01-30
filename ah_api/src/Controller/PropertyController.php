<?php

namespace App\Controller;

use App\Entity\Property;
use App\Message\AddPropertyMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Workflow\Registry;
use Symfony\Component\Workflow\Exception\TransitionException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Workflow\Exception\LogicException;

class PropertyController extends AbstractController
{
    /**
     * Route("/api/envoi-message")
     */
    public function index(MessageBusInterface $bus)
    {
        // will cause the SmsNotificationHandler to be called
        $bus->dispatch(new AddPropertyMessage('Look! I created a message!'));

        // // or use the shortcut
        // $this->dispatchMessage(new AddPropertyMessage('Look! I created a message!'));

        // ...
    }
}
