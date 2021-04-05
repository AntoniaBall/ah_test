<?php

namespace App\Controller;

use App\Entity\Property;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Workflow\Registry;
use Symfony\Component\Workflow\Exception\TransitionException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Workflow\Exception\LogicException;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Security\Core\Security;

class PropertyController extends AbstractController
{
    private $security;
    private $params;

    public function __construct(ParameterBagInterface $params, Security $security)
    {
        $this->params = $params;
        $this->security = $security;
    }

    public function __invoke(Property $data, Request $request) : Property
    {
        $countProperties = $this->getDoctrine()
                ->getRepository(Property::class)
                ->getCountPropertiesByUser($data->getUser()->getId());
        
        if ($countProperties[0][1] > 30){
            throw new HttpException(400, "Vous avez plus de 3 demandes d'ajout de biens en attente");
        }
        
        return $data;
        // get count user property

    }
}
