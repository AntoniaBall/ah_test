<?php

namespace App\Controller;

use App\Entity\Pictures;
use App\Repository\PicturesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

final class PicturesController extends AbstractController  
{
    private $params;

    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
    }

    public function __invoke(Request $request): Pictures
    {
        $uploadedFile = $request->files->get('file');

        if (!$uploadedFile) {
            throw new BadRequestHttpException('"file" is required');
            return new Response('file is require');
        }

        $mediaObject = new Pictures();
        $mediaObject->file = $uploadedFile;

        $mediaObject->setUrl($this->params->get('pictures-directory'));
        return $mediaObject;
    }

}
