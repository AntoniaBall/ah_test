<?php

namespace App\Controller;

use App\Entity\Property;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Services\PaymentService;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Security\Core\Security;

class ValidationPropertyController extends AbstractController
{
    private $security;
    private $paimentService;
    private $params;

    public function __construct(PaymentService $paiementService, 
            ParameterBagInterface $params, Security $security)
    {
        $this->paimentService = $paiementService;
        $this->params = $params;
        $this->security = $security;
    }

    public function __invoke(Property $data, Request $request) : Property
    {
        $bodyRequest = json_decode($request->getContent(), true);
        // $currentDisponibilities= $data->getProperty()->getDisponibilities();
        // foreach ($currentDisponibilities as $currentDisponibility){
        //     dump($currentDisponibility->getJourDispo());
        // }
        // die();   
        if (!$bodyRequest){
            throw new HttpException(400, "Please provide a valid JSON");
        }

        if (!in_array($bodyRequest["status"], ["acceptee", "rejetee"])){
            throw new HttpException(400, "Please provide a correct answer");
        }
        
        $data->setStatus($bodyRequest["status"]);
        return $data;
    }
}
