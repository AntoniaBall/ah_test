<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Property;
use App\Entity\Disponibility;
use App\Services\DateService;
use Symfony\Component\HttpKernel\Exception\HttpException;
use ApiPlatform\Core\Api\IriConverterInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Doctrine\ORM\EntityManagerInterface;


class DisponibilitiesController extends AbstractController{
    public function __invoke(Property $data, Request $request, EntityManagerInterface $entityManager){
        $bodyRequest = json_decode($request->getContent(), true);

        $newDisponibilities = $bodyRequest["disponibilities"];

        // supprimer les disponibilités du bien
        $propertyDisponibilities = $data->getDisponibilities();
        foreach ($propertyDisponibilities as $disponibility){
            $data->removeDisponibility($disponibility);
            $entityManager->persist($data);
            // dump($disponibility->getId());

        }
        // dump($data->getDisponibilities()->count());
        // die();
        foreach ($newDisponibilities as $newDisponibility){
            $jour = new \DateTime($newDisponibility);
            if ($jour === null ){ // si pas une date
                throw new HttpException(400, "Date not valid");
            }
            $disponibilityNew = new Disponibility();
            $disponibilityNew->setJourDispo($jour);
            $disponibilityNew->setProperty($data);
            $entityManager->persist($disponibilityNew);
            // dump($disponibilityNew);
        }

        $entityManager->flush();
        return $data;
    }
}