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

class DisponibilitiesController extends AbstractController
{
    public function __invoke(Property $data,DateService $dateService,
            IriConverterInterface $iriConverter, NormalizerInterface $objectNormalizer,
            SerializerInterface $serializer){
        return $data->getDisponibilities();
    }
}