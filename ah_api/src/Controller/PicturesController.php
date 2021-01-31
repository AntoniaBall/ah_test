<?php

namespace App\Controller;

use App\Entity\Pictures;
use App\Repository\PicturesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;

final class PicturesController
{
    // /**
    //  * @Route("/pictures", name="pictures")
    //  */
    // public function index(): Response
    // {
    //     return $this->render('pictures/index.html.twig', [
    //         'controller_name' => 'PicturesController',
    //     ]);
    // }

    // post action add pictures file
    public function __invoke(Request $request): Pictures
    {
        // var_dump("coucou");
        // die();
        $uploadedFile = $request->files->get('file');

        if (!$uploadedFile) {
            throw new BadRequestHttpException('"file" is required');
            return new Response('file is require');
        }

        $mediaObject = new Pictures();
        $mediaObject->file = $uploadedFile;

        return $mediaObject;
    }

}
