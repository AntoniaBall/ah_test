<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Property;
use Symfony\Component\HttpKernel\Exception\HttpException;

class SearchController extends AbstractController
{
    /**
     * @Route("api/properties/search", name="search")
     */
    public function searchProperties(Request $request): Response
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
        
        $ville = $request->query->get("ville");

        if (!isset($ville) || $ville === ""){
            throw new HttpException(400, "Veuillez renseigner au moins une ville");
        }

        // dump($dateEnd->diff($dateStart));
        // dump($dateEnd);

        $period = new \DatePeriod(
            $dateStart,
            new \DateInterval('P1D'),
            $dateEnd->modify('+1 day')
        );

        foreach($period as $singleDate){
           dump($singleDate->format('Y-m-d'));
        }

        // dump($period);
        // récupérer tous les biens entre 2 dates
        // var_dump($request->query);

        $currentDisponibilities = $this->getDoctrine()
                                    ->getRepository(Property::class)
                                    ->findPropertiesBySearch($dateStart, $dateEnd);
    
        var_dump(count($currentDisponibilities));

        foreach($currentDisponibilities as $currentDisponibily){
            dump($currentDisponibily->getId());
        }
        die();
    }
}

