<?php

namespace App\DataFixtures;

use App\Entity\Propriete;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProprietesFixtures extends Fixture implements DependentFixtureInterface
{
    public const proprieteLit = 'proprieteLit';
    public const barbecue = 'barbecue';
    public const profondeur = 'profondeur';

    public function load(ObjectManager $manager)
    {
        $proprieteCabane = new Propriete();
        $proprieteCabane->setNom('profondeur de la cabane')
                    ->setIsRequired(1)
                    ->setType('string')
                    ->setTypeValue($this->getReference(TypeValueFixtures::string_ref));
        
        $manager->persist($proprieteCabane);
        $this->addReference(self::profondeur, $proprieteCabane);

        $proprieteCabane1 = new Propriete();
        $proprieteCabane1->setNom('barbecue')
                    ->setIsRequired(0)
                    ->setType('booleen')
                    ->setTypeValue($this->getReference(TypeValueFixtures::booleen_ref));
        
        $manager->persist($proprieteCabane1);
        $this->addReference(self::barbecue, $proprieteCabane1);

        $proprieteLit= new Propriete();
        $proprieteLit->setNom('lit supplémentaire')
                    ->setIsRequired(0)
                    ->setType('integer')
                    ->setTypeValue($this->getReference(TypeValueFixtures::integer_ref));
        $this->addReference(self::proprieteLit, $proprieteLit);
        $manager->persist($proprieteLit);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            TypeValueFixtures::class,
        );
    }
}
