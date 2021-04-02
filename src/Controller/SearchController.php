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

class SearchController extends AbstractController
{
    /**
     * @param SerializerInterface $serializer
     * @Route("api/properties/search",
     *      name="search",
     *      defaults={
     *          "_api_resource_class"=Property::class,
     *          "_api_collection_operation_name"="searchProperties"}     
     * )
     */
    public function __invoke(Request $request,DateService $dateService, IriConverterInterface $iriConverter,
    NormalizerInterface $objectNormalizer, SerializerInterface $serializer)
    {
        $response = [];

        $dateStart = (null === $request->query->get("dateStart") 
                    || "" === $request->query->get("dateEnd")) 
                    ? new \DateTime('now') : new \DateTime($request->query->get("dateStart"));

        if ( new \DateTime('now') > new \DateTime($request->query->get("dateStart") )) {
            throw new HttpException(400, "Date Start must be greather than today");
        }

        $dateEnd = null === $request->query->get("dateEnd") || "" === $request->query->get("dateEnd")
                        ? new \DateTime($request->query->get("dateStart")) : new \DateTime($request->query->get("dateEnd"));

        $town = $request->query->get("town");
        $maxTraveler = $request->query->get("maxTraveler");

        if (!isset($town) || $town === ""){
            throw new HttpException(400, "Veuillez renseigner au moins une ville");
        }

        $properties = $this->getDoctrine()
                        ->getRepository(Property::class)
                        ->findPropertiesBySearch($dateStart, $dateEnd, $maxTraveler, $town);
                   
        $dates = $dateService->displayDates($dateStart, $dateEnd);

        foreach($properties as $property){

            $jourDispos = $this->getDoctrine()
                    ->getRepository(Disponibility::class)
                    ->getJourDisposBetweenDatesByProperty($property->getId(), $dateStart, $dateEnd);
            
            //dump($jourDispos);

            if (array_diff($dates,$jourDispos["data"]) === []){
                $response[] = $property;
                // dump($property->getId());

            }

        }
        // dump($response);


        return $response;
    }
}