<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Disponibility;
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
                    ? new \DateTime('now') : $request->query->get("dateStart");
        
        if ( new \DateTime('now') > new \DateTime($request->query->get("dateStart") )) {
            throw new HttpException(400, "Date Start must be greather than today");
        }
        
        var_dump($dateStart);

        // $dateEnd = null === $request->query->get("dateEnd") || "" === $request->query->get("dateEnd")
        //             || new \DateTime($request->query->get("dateEnd")) < new \DateTime('now')
        //             ? new \DateTime('now') : $request->query->get("dateEnd");

        // $ville = $request->query->get("town");

        // if (isset($ville)){
        //     throw new HttpException(400, "Veuillez renseigner au moins une ville");
        // }
        
        // // jours dispos entre les 2 dates
        // $period = new \DatePeriod($dateStart,new \DateInterval('P1D'), $dateEnd);

        // éclater les dates
        // foreach($period as $singleDate){
        //     // var_dump($singleDate->format('Y-m-d'));
        // }

        // var_dump($dateEnd);
        // var_dump($period);

        // récupérer tous les biens entre 2 dates
        // var_dump($request->query);

        // $currentDisponibilities = $this->getDoctrine()
        //                             ->getRepository(Disponibility::class)
        //                             ->findPropertiesByArgs(1);
        // var_dump($period);
        die();
    }
}

