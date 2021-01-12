<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
		$generator = Faker\Factory::create("fr_FR");

		$plainPassword="admine";

        for ($i=0; $i <10 ; $i++) { 
			$user = (new User);
			$user
			// ->setFirstname($generator->firstName())
			// ->setLastname($generator->lastName)
				->setEmail("user$i@gmail.com")
                ->setPhone((int)$generator->phoneNumber)
				->setIsVerified(rand(0,1));
				
			$password = $this->encoder->encodePassword($user,'azerty');

			$user->setPassword($password);

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

