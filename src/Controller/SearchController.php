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
        $dateStart = null === $request->query->get("dateStart") || "" === $request->query->get("dateStart")
                    || new \DateTime($request->query->get("dateStart")) < new \DateTime('now')
                    ? new \DateTime('now') : $request->query->get("dateStart");

        $dateEnd = null === $request->query->get("dateEnd") || "" === $request->query->get("dateEnd")
                    || new \DateTime($request->query->get("dateEnd")) < new \DateTime('now')
                    ? new \DateTime('now') : $request->query->get("dateEnd");
        
        // var_dump($dateStart);
        // var_dump($dateEnd);
        // die();
        $ville = $request->query->get("town");

        if (isset($ville)){
            throw new HttpException(400, "Veuillez renseigner au moins une ville");
        }

        // jours dispos entre les 2 dates
        $period = new \DatePeriod($dateStart,new \DateInterval('P1D'),$dateEnd
        );

        // // éclater les dates
        // $queryDateString="";
        // foreach($period as $singleDate){
        //     dump($singleDate->format('Y-m-d'));
        // }

        // récupérer tous les biens entre 2 dates

        // var_dump($request->query);

        $currentDisponibilities = $this->getDoctrine()
                                         ->getRepository(Disponibility::class)
                                         ->findDisponibilitiesByProperty(1);
        var_dump($period);
        
        die();
    }
}

