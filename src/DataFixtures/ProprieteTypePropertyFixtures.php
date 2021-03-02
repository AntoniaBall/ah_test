<?php

namespace App\DataFixtures;

use App\Entity\ProprieteTypeProperty;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProprieteTypePropertyFixtures extends Fixture implements DependentFixtureInterface
{
    public const propriete_cabane = 'propriete-cabane';

    public function load(ObjectManager $manager)
    {
        $proprieteTypePr = new ProprieteTypeProperty();
        $proprieteTypePr->setPropriete($this->getReference(ProprietesFixtures::profondeur))
                        ->setTypeProperty($this->getReference(TypePropertyFixtures::cabane_arbre));
                        // ->setValeur(50);
        $this->addReference(self::propriete_cabane, $proprieteTypePr);

        $manager->persist($proprieteTypePr);

        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            ProprietesFixtures::class,
            TypePropertyFixtures::class,
        );
    }
}
