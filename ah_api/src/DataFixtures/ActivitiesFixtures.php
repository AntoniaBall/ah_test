<?php

namespace App\DataFixtures;

use App\Entity\Activities;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActivitiesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
   
        
        for ($i=0; $i <10 ; $i++) { 
        	$Activities = (new Activities);
        	$Activities-> setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,");
        	$Activities-> setTitle("$i Activity");
        	
        	$manager->persist($Activities);
        }

        $manager->flush();
    }
}
