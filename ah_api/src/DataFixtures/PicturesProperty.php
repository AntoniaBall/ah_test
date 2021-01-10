<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Pictures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PicturesProperty extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 20; $i++) {
            $picture = new Pictures();
            // $picture->url($pictures[$i]);
            $picture->setURL($faker->imageUrl($width=640, $height=300))
                    ->setMaxSize(650)
                    ->setStatus('en modération');
            // $repository = $this->getDoctrine()->getRepository(typeProperty::class);
            // $property = $repository->find(1);
            // $picture->setProperty($property);

            $manager->persist($picture);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            PropertyFixtures::class,
        );
    }
}