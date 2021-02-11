<?php

namespace App\DataFixtures;

use App\Entity\TypeValue;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeValueFixtures extends Fixture
{
    public const integer_ref = "entier";
    public const booleen_ref = "booleen";
    public const string_ref = "string";
    public function load(ObjectManager $manager)
    {
        $entier = new TypeValue();
        $entier->setName('entier');
        $manager->persist($entier);
        $this->addReference(self::integer_ref, $entier);
        
        $booleen = new TypeValue();
        $booleen->setName('booleen');
        $manager->persist($booleen);
        $this->addReference(self::booleen_ref, $booleen);
        
        $string = new TypeValue();
        $string->setName('string');
        $manager->persist($string);
        $this->addReference(self::string_ref, $string);
        $manager->flush();
    }
}
