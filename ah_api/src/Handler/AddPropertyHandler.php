<?php

namespace App\Handler;

use App\Message\AddPropertyMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Mime\Email;

class AddPropertyHandler {
    public function __invoke(AddPropertyMessage $message)
    {
        $message=(new \Swift_Message('Hello Email'))
        ->setFrom('admin@yopmail.com')
        ->setTo('antonia.balluais@gmail.com')
        ->setBody('Property reviewing');

        $mailer->send($message);

        dump($message->getContent());
    }
}