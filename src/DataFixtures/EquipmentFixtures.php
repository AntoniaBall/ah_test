<?php

namespace App\DataFixtures;

use App\Entity\Equipment;
use App\DataFixtures\PropertyFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EquipmentFixtures extends Fixture
{
    public const equipment = "equipment";
    public function load(ObjectManager $manager)
    {
        $generator = Faker\Factory::create();

        $equipment = new Equipment();

        $equipment->setPool($generator->numberBetween($min = 0, $max = 1))
            ->setBaignoire($generator->numberBetween($min = 0, $max = 1))
            ->setJaccuzzi($generator->numberBetween($min = 0, $max = 1))
            ->setClimatiseur($generator->numberBetween($min = 0, $max = 1))
            ->setChauffage($generator->numberBetween($min = 0, $max = 1))
            ->setWifi($generator->numberBetween($min = 0, $max = 1));
        $manager->persist($equipment);

        $manager->flush();
        $this->addReference(self::equipment,$equipment);

    }
}
