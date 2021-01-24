<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Comments;

class CommentController 
{
	public function __construct(Security $Security)
	{
		$this->Security = $security;
	}


   public function __invoke(Comments $data)
   {
   		$data-> setUser($this->security->getUser());
   		return $data;
   }
}
