<?php

namespace App\DataFixtures;

use App\Entity\TypeProperty;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;


class TypePropertyFixture_old extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $generator = Faker\Factory::create(); {
            $typeproperty = new TypeProperty();
            $typeproperty->setTitle("Cabane dans les arbres")
                ->setDescription("Perché en hauteur, nos cabanes dans les arbres vous assurerons un dépaysement total");
            $manager->persist($typeproperty);
        }
        $generator = Faker\Factory::create(); {
            $typeproperty = new TypeProperty();
            $typeproperty->setTitle("Roulotte")
                ->setDescription("Perché en hauteur, nos cabanes dans les arbres vous assurerons un dépaysement total");
            $manager->persist($typeproperty);
        }
        $generator = Faker\Factory::create(); {
            $typeproperty = new TypeProperty();
            $typeproperty->setTitle("Tipi")
                ->setDescription("Perché en hauteur, nos cabanes dans les arbres vous assurerons un dépaysement total");
            $manager->persist($typeproperty);
        }
        $generator = Faker\Factory::create(); {
            $typeproperty = new TypeProperty();
            $typeproperty->setTitle("Bulle")
                ->setDescription("Perché en hauteur, nos cabanes dans les arbres vous assurerons un dépaysement total");
            $manager->persist($typeproperty);
        }
        $generator = Faker\Factory::create(); {
            $typeproperty = new TypeProperty();
            $typeproperty->setTitle("Yourte")
                ->setDescription("Perché en hauteur, nos cabanes dans les arbres vous assurerons un dépaysement total");
            $manager->persist($typeproperty);
        }
        $generator = Faker\Factory::create(); {
            $typeproperty = new TypeProperty();
            $typeproperty->setTitle("Chalet")
                ->setDescription("Perché en hauteur, nos cabanes dans les arbres vous assurerons un dépaysement total");
            $manager->persist($typeproperty);
        }
        $generator = Faker\Factory::create(); {
            $typeproperty = new TypeProperty();
            $typeproperty->setTitle("Bateau")
                ->setDescription("Perché en hauteur, nos cabanes dans les arbres vous assurerons un dépaysement total");
            $manager->persist($typeproperty);
        }
        $generator = Faker\Factory::create(); {
            $typeproperty = new TypeProperty();
            $typeproperty->setTitle("Cabane sur l'eau")
                ->setDescription("Perché en hauteur, nos cabanes dans les arbres vous assurerons un dépaysement total");
            $manager->persist($typeproperty);
        }
        $generator = Faker\Factory::create(); {
            $typeproperty = new TypeProperty();
            $typeproperty->setTitle("Inclassable")
                ->setDescription("Perché en hauteur, nos cabanes dans les arbres vous assurerons un dépaysement total");
            $manager->persist($typeproperty);
        }

        $manager->flush();
    }
}
