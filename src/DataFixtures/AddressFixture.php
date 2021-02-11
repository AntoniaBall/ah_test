<?php

namespace App\DataFixtures;

use App\Entity\Address;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;


class AddressFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $generator = Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $address = new Address();
            $address->setNumber((int) $generator->numberBetween($min = 1, $max = 900))
                ->setStreet($generator->streetName)
                ->setPostalCode((int)$generator->postcode)
                ->setTown($generator->city)
                ->setRegion($generator->state)
                ->setCountry($generator->country);
            $manager->persist($address);
        }

        $manager->flush();
    }
}
