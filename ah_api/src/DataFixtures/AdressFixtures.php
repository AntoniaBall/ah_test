<?php

namespace App\DataFixtures;

use App\Entity\Address;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AdressFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
   
        
        for ($i=0; $i <10 ; $i++) { 
        	$Adress = (new Address);
        	$Adress-> setNumber($i);
        	$Adress-> setStreet("street $i");
            $Adress-> setPostalCode($i);
            $Adress-> setRegion("region $i"); 
            $Adress-> setTown("Town $i");
            $Adress-> setCountry("france");
        	$manager->persist($Adress);
        }

        $manager->flush();
    }
}
