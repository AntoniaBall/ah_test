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
        
        $propertyDisponibilities = $data->getDisponibilities();
        foreach ($propertyDisponibilities as $disponibility){
            $data->removeDisponibility($disponibility);
        }

        foreach ($newDisponibilities as $newDisponibility){
            try{
                $jour = new \DateTime($newDisponibility);
            }
            catch(\Exception $e){
                throw new HttpException(404, "The date you try to send is not valid");
            }
            
            $disponibilityNew = new Disponibility();
            $disponibilityNew->setJourDispo($jour);
            $disponibilityNew->setProperty($data);
            $entityManager->persist($disponibilityNew);
        }

        $entityManager->flush();
        return $data;
    }
}