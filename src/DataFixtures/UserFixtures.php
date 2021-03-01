<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\DataFixtures\PropertyFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class UserFixtures extends Fixture
{
	public const ADMIN_USER_REFERENCE = 'admin-user';
	public const LOC_USER_REFERENCE = 'locataire-user';
	public const PROP_USER_REFERENCE = 'proprio-user';
	public const PROP1_USER_REFERENCE = 'proprio-user1';

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
			->setFirstname($generator->firstname())
			->setLastname($generator->lastname)
			->setPhone((int)$generator->phoneNumber)
			->setIsVerified(rand(0,1))
			->setRoles(["ROLE_ADMIN"]);
			$password = $this->encoder->encodePassword($userAdmin,'azerty12');
			
			$userAdmin->setPassword($password);
			
			$manager->persist($userAdmin);
			$this->addReference(self::ADMIN_USER_REFERENCE, $userAdmin);
			
			// USER PROPRIO
			$userProprio = new User();
			$userProprio
			->setEmail("proprio@yopmail.com")
			->setFirstname($generator->firstname())
			->setLastname($generator->lastname)
			->setPhone((int)$generator->phoneNumber)
			->setIsVerified(rand(0,1))
			->setRoles(["ROLE_PROPRIO"]);
			// ->addProperty($this->getReference(PropertyFixtures::CABANES, $userProprio))
			// ->addProperty($this->getReference(PropertyFixtures::tipis, $userProprio))
			// ->addProperty($this->getReference(PropertyFixtures::roulottes, $userProprio));
			
			$this->addReference(self::PROP_USER_REFERENCE, $userProprio);
			
			$password = $this->encoder->encodePassword($userProprio,'azerty12');
			$userProprio->setPassword($password);
			
			$manager->persist($userProprio);
			$manager->flush();
			
			// USER PROPRIO 1
			$userProprio1 = new User();
			$userProprio1
			->setEmail("proprio1@yopmail.com")
			->setPhone((int)$generator->phoneNumber)
			->setFirstname($generator->firstname())
			->setLastname($generator->lastname)
			->setIsVerified(rand(0,1))
			->setRoles(["ROLE_PROPRIO"]);
			// ->addProperty($this->getReference(PropertyFixtures::CABANES, $userProprio1))
			// ->addProperty($this->getReference(PropertyFixtures::bulles, $userProprio1))
			// ->addProperty($this->getReference(PropertyFixtures::chalets, $userProprio1))
			// ->addProperty($this->getReference(PropertyFixtures::bateaux, $userProprio1));
			
			$password = $this->encoder->encodePassword($userProprio1,'azerty12');
			$userProprio1->setPassword($password);
			$this->addReference(self::PROP1_USER_REFERENCE, $userProprio1);
			
			// USER PROPRIO 2
			$userProprio2 = new User();
			$userProprio2
			->setEmail("proprio2@yopmail.com")
						->setFirstname($generator->firstname())
						->setLastname($generator->lastname)
						->setPhone((int)$generator->phoneNumber)
						->setIsVerified(rand(0,1))
						->setRoles(["ROLE_PROPRIO"]);
						// ->addProperty($this->getReference(PropertyFixtures::inclassables, $userProprio2))
						// ->addProperty($this->getReference(PropertyFixtures::CABANES_EAU, $userProprio2));

			$password = $this->encoder->encodePassword($userProprio2,'azerty12');

			$userProprio2->setPassword($password);

			$manager->persist($userProprio2);

			$manager->flush();
		
		// USER LOCATAIRE
		$locataire = new User();
		$locataire
			->setEmail("locataire@yopmail.com")
			->setFirstname($generator->firstname())
			->setLastname($generator->lastname)
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
				->setFirstname($generator->firstname())
				->setLastname($generator->lastname)
                ->setPhone((int)$generator->phoneNumber)
				->setIsVerified(rand(0,1));
				
			$password = $this->encoder->encodePassword($user,'azerty12');

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
	// public function getDependencies()
	// {
	// 	return array(
	// 	PropertyFixtures::class,
	// );
	// }
}

