<?php

namespace App\DataFixtures;

use App\Entity\Propriete;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProprietesFixtures extends Fixture
{
    public const proprieteLit = 'proprieteLit';
    public const barbecue = 'barbecue';
    public const profondeur = 'profondeur';

    public function load(ObjectManager $manager)
    {
        $proprieteCabane = new Propriete();
        $proprieteCabane->setNom('profondeur de la cabane')
                    ->setType('string');

        $manager->persist($proprieteCabane);
        $this->addReference(self::profondeur, $proprieteCabane);

        $proprieteCabane1 = new Propriete();
        $proprieteCabane1->setNom('barbecue')
                    ->setType('booleen');
        
        $manager->persist($proprieteCabane1);
        $this->addReference(self::barbecue, $proprieteCabane1);

        $proprieteLit= new Propriete();
        $proprieteLit->setNom('lit supplémentaire')
                    ->setType('integer');
                    
        $this->addReference(self::proprieteLit, $proprieteLit);
        $manager->persist($proprieteLit);

        $manager->flush();
    }

}
