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
use Vich\UploaderBundle\Storage\StorageInterface;

final class PicturesController extends AbstractController  
{
    private $params;
    private $storage;

    public function __construct(ParameterBagInterface $params, StorageInterface $storage)
    {
        $this->params = $params;
        $this->storage = $storage;
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

        // var_dump($uploadedFile);
        // die();

        // $mediaObject->setUrl($this->storage->resolveUri($mediaObject, 'file'));

        return $mediaObject;
    }

}
