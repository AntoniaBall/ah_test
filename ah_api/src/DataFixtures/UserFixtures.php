<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
   
        
        for ($i=0; $i <10 ; $i++) { 
        	$user = (new User);
        	$user-> setEmail("user$i@gamil.com");
        	$user-> setPassword("admine");
        	$user-> setIsVerified(rand(0,1));
        	if ($i === 1) {
        		$user-> setRoles(["ROLE_ADMIN"]);
        	}else{
        		$user-> setRoles(["ROLE_USER"]);
        	}
        	$manager->persist($user);
        }

        $manager->flush();
    }
}
