<?php

namespace App\Controller;

use App\Entity\Property;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/properties")
 */
class PropertyController extends AbstractController
{
    /**
     * @Route("/{id}/status/{transition}", name="validate_property")
     * 
     */
    public function validateProperties(Request $request, Property $property, String $transition): Response
    {
        /*
        * changement statut ajout
        * transition: draft, rejected, published
        */
        $workflow = $this->workflowRegistry->get($property);
        if($workflow->can($property, $transition))
        {
            $workflow->apply($property, $transition);
            $em = $this->getDoctrine()->getManager();
            $em->persist($property);
            $em->flush();
        }
    }

    /**
     * @Route("/admin/properties", name="property_validate")
     */
    public function changeState(): Response
    {
        // get properties with last session   
    }
}
