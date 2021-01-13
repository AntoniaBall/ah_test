<?php

namespace App\DataFixtures;

use App\Entity\Activities;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $userAdmin = new User();
        // $userAdmin
        // ->setEmail("user$i@gmail.com")
        // ->setPhone((int)$generator->phoneNumber)
        // ->setIsVerified(rand(0,1))
        // ->setRoles(["ROLE_ADMIN"]);
		// $pwAdmin = $this->encoder->encodePassword($userAdmin,'azerty');
        
        // $userAdmin->setPassword($pwAdmin);
        
        // $userProprio = new User(); 
        // $userProprio
        // ->setEmail("user$i@gmail.com")
        // ->setPhone((int)$generator->phoneNumber)
        // ->setIsVerified(rand(0,1))
        // ->setRoles(["ROLE_PROPRIO"]);

        // $userProprio->setPassword($pwAdmin);

        // $userLocataire = new User(); 
        // $userLocataire
        // ->setEmail("user$i@gmail.com")
        // ->setPhone((int)$generator->phoneNumber)
        // ->setIsVerified(rand(0,1))
        // ->setRoles(["ROLE_USER"]);
        // $userProprio->setPassword($pwAdmin);



        // $manager->persist($userAdmin);
        // $manager->persist($userProprio);
        // $manager->persist($userLocataire);

        // $manager->flush();
    }
}
