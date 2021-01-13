<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
	public const ADMIN_USER_REFERENCE = 'admin-user';
	public const LOC_USER_REFERENCE = 'locataire-user';
	public const PROP_USER_REFERENCE = 'proprio-user';

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
		$generator = Faker\Factory::create("fr_FR");

		$userAdmin = new User();
		$userAdmin
			->setEmail("admin@yopmail.com")
			->setPhone((int)$generator->phoneNumber)
			->setIsVerified(rand(0,1))
			->setRoles(["ROLE_ADMIN"]);
		$password = $this->encoder->encodePassword($userAdmin,'azerty12');
		
		$userAdmin->setPassword($password);
		
		$manager->persist($userAdmin);
		$manager->flush();
		$this->addReference(self::ADMIN_USER_REFERENCE, $userAdmin);
		
		
		// USER PROPRIO
		$userProprio = new User();
		$userProprio
			->setEmail("proprio@yopmail.com")
			->setPhone((int)$generator->phoneNumber)
			->setIsVerified(rand(0,1))
			->setRoles(["ROLE_PROPRIO"]);
		
		$password = $this->encoder->encodePassword($userProprio,'azerty12');
		$userProprio->setPassword($password);
		
		$manager->persist($userProprio);
		$manager->flush();
		
		// USER LOCATAIRE
		$locataire = new User();
		$locataire
			->setEmail("locataire@yopmail.com")
			->setPhone((int)$generator->phoneNumber)
			->setIsVerified(rand(0,1))
			->setRoles(["ROLE_USER"]);
		$password = $this->encoder->encodePassword($locataire,'azerty12');
		$locataire->setPassword($password);
		
		$manager->persist($locataire);
		$manager->flush();

		$this->addReference(self::LOC_USER_REFERENCE, $locataire);

		// AUTRES USER LOCATAIRE
        for ($i=0; $i <5 ; $i++) { 
			$user = (new User);
			$user
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

