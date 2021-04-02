<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Property;
use App\Entity\APropos;
use App\Services\DateService;
use Symfony\Component\HttpKernel\Exception\HttpException;
use ApiPlatform\Core\Api\IriConverterInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Doctrine\ORM\EntityManagerInterface;

class AProposController extends AbstractController{

    public function __invoke(APropos $data, Request $request, EntityManagerInterface $entityManager){
        $bodyRequest = json_decode($request->getContent(), true);

        // dépublier toutes les autres descriptions
        $apropos = new APropos();
        $activities = $entityManager->getRepository(APropos::class)->findAll();

        foreach ($activities as $activity){
            $activity->setIsActived(false);
            $entityManager->persist($activity);
        }

        $apropos->setIsActived(true);
        $apropos->setDescription($bodyRequest["description"]);
        $entityManager->persist($apropos);

        $entityManager->flush();
        return $data;
    }
}