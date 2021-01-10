<?php

namespace App\DataFixtures;
use App\Entity\TypeProperty;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypePropertyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $array=[
            '',
            'cabane dans les arbres',
            'cabane sur l\'eau',
            'bulle',
            'tipi',
            'yourte',
            'roulotte',
            'bateau',
            'chalet',
            'inclassable'
        ];
        
        for ($i = 1; $i <= 9; $i++) {
            $typeProperty = new TypeProperty();
            $typeProperty->setTitle($array[$i]);
            $typeProperty->setDescription("Muffin sesame snaps caramels icing powder cotton candy lemon drops cake. Lemon drops topping tart cheesecake cake wafer tiramisu powder");
            // $typeProperty->addProperty();
            $manager->persist($typeProperty);

        }
        $manager->flush();
    }
}
