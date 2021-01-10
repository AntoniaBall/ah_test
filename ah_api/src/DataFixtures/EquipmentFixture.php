<?php

namespace App\DataFixtures;

use App\Entity\Equipment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;


class EquipmentFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $generator = Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $equipment = new Equipment();
            $equipment->setPool($generator->numberBetween($min = 0, $max = 1))
                ->setBaignoire($generator->numberBetween($min = 0, $max = 1))
                ->setJaccuzzi($generator->numberBetween($min = 0, $max = 1))
                ->setClimatiseur($generator->numberBetween($min = 0, $max = 1))
                ->setChauffage($generator->numberBetween($min = 0, $max = 1))
                ->setWifi($generator->numberBetween($min = 0, $max = 1));
            $manager->persist($equipment);
        }

        $manager->flush();
    }
}
