<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Pictures;
use App\DataFixtures\PropertyFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PicturesFixtures extends Fixture
{
    public const picture_bien = 'picture_bien';
    public const picture_activite = 'picture_activite';
    public const picture_commentaire= 'picture_commentaire';
    
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        $picture_bien = new Pictures();
        $picture_bien->setUrl($faker->imageUrl($width=640, $height=300))
                    ->setMaxSize(650)
                    ->setStatus('en modération');
        $this->addReference(self::picture_bien,$picture_bien);
        
        $manager->persist($picture_bien);

        $picture_commentaire = new Pictures();
        $picture_commentaire->setUrl($faker->imageUrl($width=640, $height=300))
                    ->setMaxSize(650)
                    ->setStatus('en modération');
        $this->addReference(self::picture_commentaire,$picture_commentaire);
        $manager->persist($picture_commentaire);
        
        $picture_activite = new Pictures();
        $picture_activite->setUrl($faker->imageUrl($width=640, $height=300))
                    ->setMaxSize(650)
                    ->setStatus('en modération');
        $this->addReference(self::picture_activite,$picture_activite);

        $manager->persist($picture_activite);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            PropertyFixtures::class,
        );
    }
}