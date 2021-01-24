<?php

namespace App\Controller;

use App\Entity\Property;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Workflow\Registry;
use Symfony\Component\Workflow\Exception\TransitionException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Workflow\Exception\LogicException;

class PropertyController extends AbstractController
{
    /**
     * 
     * Route("/api/properties/{id}/{transition}", method={"PATCH"})
     */
    public function __construct(Registry $workflow){
        $this->workflow = $workflow;
    }

    public function __invoke(Property $property, String $transition = "") : JsonResponse
    {
        $workflow = $this->workflow->get($property);

        try{
            
            if($workflow->can($property, $transition))
            {
                $workflow->apply($property, $transition);
                $em = $this->getDoctrine()->getManager();
                $em->persist($property);
                $em->flush();
            }
    
        }catch (TransitionException $exception){
            throw new HttpException(400, `Can not transition to $transition`);
  
        }
        
        return new JsonResponse($property);

    }
}
