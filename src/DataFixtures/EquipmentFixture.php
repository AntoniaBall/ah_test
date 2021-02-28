<?php

namespace App\DataFixtures;

use App\Entity\Equipment;
use App\DataFixtures\PropertyFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EquipmentFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $generator = Faker\Factory::create();

        $equipment = new Equipment();

        $equipment->setPool($generator->numberBetween($min = 0, $max = 1))
            ->setBaignoire($generator->numberBetween($min = 0, $max = 1))
            ->setJaccuzzi($generator->numberBetween($min = 0, $max = 1))
            ->setClimatiseur($generator->numberBetween($min = 0, $max = 1))
            ->setChauffage($generator->numberBetween($min = 0, $max = 1))
            ->addProperty($this->getReference(PropertyFixtures::CABANES))
            ->addProperty($this->getReference(PropertyFixtures::CABANES_EAU))
            ->addProperty($this->getReference(PropertyFixtures::tipis))
            ->addProperty($this->getReference(PropertyFixtures::roulottes))
            ->addProperty($this->getReference(PropertyFixtures::bulles))
            ->addProperty($this->getReference(PropertyFixtures::yourtes))
            ->addProperty($this->getReference(PropertyFixtures::bateaux))
            ->addProperty($this->getReference(PropertyFixtures::chalets))
            ->addProperty($this->getReference(PropertyFixtures::inclassables))
            ->setWifi($generator->numberBetween($min = 0, $max = 1));
        $manager->persist($equipment);

        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            PropertyFixtures::class,
        );
    }
}
