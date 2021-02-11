<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{




    public function load(ObjectManager $manager)
    {
        $generator = Faker\Factory::create("fr_FR");
        for ($i = 0; $i < 10; $i++) {
            $usertest = new User();

            $usertest->setFirstname($generator->firstName())
                ->setLastname($generator->lastName)
                ->setEmail($generator->email)
                ->setPassword('password')
                ->setPhone((int)$generator->phoneNumber)
                ->setRole('admin');

            $manager->persist($usertest);
        }

        $manager->flush();
    }
}
