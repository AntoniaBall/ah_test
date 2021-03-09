<?php

namespace App\DataFixtures;

use App\Entity\Valeur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ValeurFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $valeur= new Valeur();
        $valeur->setValeur(5)
                ->setPropertyId($this->getReference(PropertyFixtures::CABANES));
        
        $manager->persist($valeur);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ProprieteTypePropertyFixtures::class
        );
    }
}
