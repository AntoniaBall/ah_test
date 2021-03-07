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

class SearchController extends AbstractController
{

    /**
     * @Route("api/properties/search", name="search")
     */
    public function searchProperties(Request $request, DateService $dateService): Response
    {
        $dateStart = (null === $request->query->get("dateStart") 
                    || "" === $request->query->get("dateEnd")) 
                    ? new \DateTime('now') : new \DateTime($request->query->get("dateStart"));
        
        if ( new \DateTime('now') > new \DateTime($request->query->get("dateStart") )) {
            throw new HttpException(400, "Date Start must be greather than today");
        }

        $dateEnd = null === $request->query->get("dateEnd") || "" === $request->query->get("dateEnd")
                        // || new \DateTime($request->query->get("dateStart")) > new \DateTime($request->query->get("dateEnd"))
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

        // var_dump($dates);

        foreach($properties as $property){
            // property 1
            $jourDispos = $this->getDoctrine()
                    ->getRepository(Disponibility::class)
                    ->getPropertyDisponibilitiesByDay($property->getId()); // array
            
                    $dispos = $property->getDisponibilities();
                    
                    dump(getType($property->getDisponibilities()));
                    foreach ($dispos as $dispo){
                        dump($dispo->getJourDispo());
                    }
            die();
        }

        // foreach($properties as $property){
        //     // verifier quel bien est dispo durant la durée définie entre les 2 dates
        //     dump($property->getId());
        //     $isDisonibleByDay = $this->getDoctrine()
        //             ->getRepository(Disponibility::class)
        //             ->findDispoByDay($property->getId(), $jourDispo);
        // }
        die();
        
    }
}

