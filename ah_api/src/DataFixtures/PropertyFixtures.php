<?php

namespace App\DataFixtures;

use App\Entity\Property;
use App\Entity\TypeProperty;
use App\DataFixtures\TypePropertyFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PropertyFixtures extends Fixture implements DependentFixtureInterface
{
    public const CABANES = 'cabane-arbre';
    public const CABANES_EAU = 'cabane-eau';
    public const tipis = 'tipi';
    public const roulottes = 'roulottes';
    public const bulles = 'bulles';
    public const yourtes = 'yourtes';
    public const bateaux = 'bateaux';
    public const chalets = 'chalets';
    public const inclassables = 'inclassables';

    public function load(ObjectManager $manager)
    {
        $cabane = new Property();
        $cabane->setTitle('cabane dans les abres')
            ->setDescription('très belle cabane dans les arbres. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..')
            ->setAccessHandicap(true)
            ->setWater('eau courante')
            ->setElectricity(true)
            ->setSurface(150)
            ->setRate(95.50)
            ->setNbrRoom(3)
            ->setMaxTravelers(3)
            ->setTax(0.20)
            ->addPicture($this->getReference(PicturesFixtures::picture_bien));
            
            $this->addReference(self::CABANES,$cabane);

            $manager->persist($cabane);
            
            $cabaneEau = new Property();
            $cabaneEau->setTitle('cabane sur l\'eau')
            ->setDescription('très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..')
            ->setAccessHandicap(false)
            ->setWater('eau courante')
            ->setElectricity(true)
            ->setSurface(30)
            ->setRate(95.50)
            ->setNbrRoom(3)
            ->setMaxTravelers(3)
            ->setTax(0.20)
            ->addPicture($this->getReference(PicturesFixtures::picture_bien));
            
            $this->addReference(self::CABANES_EAU,$cabaneEau);
            $manager->persist($cabaneEau);
            
            $bulle = new Property();
            $bulle->setTitle('bulle')
            ->setDescription('très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..')
            ->setAccessHandicap(false)
            ->setWater('eau courante')
            ->setElectricity(true)
            ->setSurface(30)
            ->setRate(95.50)
            ->setNbrRoom(3)
            ->setMaxTravelers(3)
            ->setTax(0.20)
            ->addPicture($this->getReference(PicturesFixtures::picture_bien));
            
            $this->addReference(self::bulles,$bulle);
            $manager->persist($bulle);
            
            $tipi = new Property();
            $tipi->setTitle('tipi')
            ->setDescription('très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..')
            ->setAccessHandicap(false)
            ->setWater('eau courante')
            ->setElectricity(false)
            ->setSurface(30)
            ->setRate(95.50)
            ->setNbrRoom(3)
            ->setMaxTravelers(3)
            ->setTax(0.20)
            ->addPicture($this->getReference(PicturesFixtures::picture_bien));
            $this->addReference(self::tipis,$tipi);
            $manager->persist($tipi);
            
            $roulottes = new Property();
            $roulottes->setTitle('roulottes')
                ->setDescription('très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..')
                ->setAccessHandicap(false)
                ->setWater('eau courante')
                ->setElectricity(true)
                ->setSurface(30)
                ->setRate(95.50)
                ->setNbrRoom(3)
                ->setMaxTravelers(3)
                ->setTax(0.20);
            $this->addReference(self::roulottes,$roulottes);
            $manager->persist($roulottes);
            
            $chalets = new Property();
            $chalets->setTitle('chalets')
            ->setDescription('très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..')
            ->setAccessHandicap(false)
            ->setWater('eau courante')
            ->setElectricity(true)
            ->setSurface(30)
            ->setRate(95.50)
            ->setNbrRoom(3)
            ->setMaxTravelers(3)
            ->setTax(0.20)
            ->addPicture($this->getReference(PicturesFixtures::picture_bien));

        $this->addReference(self::chalets,$chalets);
        $manager->persist($chalets);

        $yourtes = new Property();
        $yourtes->setTitle('yourtes')
            ->setDescription('très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..')
            ->setAccessHandicap(false)
            ->setWater('eau courante')
            ->setElectricity(true)
            ->setSurface(30)
            ->setRate(95.50)
            ->setNbrRoom(3)
            ->setMaxTravelers(3)
            ->setTax(0.20)
            ->addPicture($this->getReference(PicturesFixtures::picture_bien));
        $this->addReference(self::yourtes,$yourtes);
        $manager->persist($yourtes);

        $inclassables = new Property();
        $inclassables->setTitle('inclassables')
            ->setDescription('très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..')
            ->setAccessHandicap(false)
            ->setWater('eau courante')
            ->setElectricity(true)
            ->setSurface(30)
            ->setRate(95.50)
            ->setNbrRoom(3)
            ->setMaxTravelers(3)
            ->setTax(0.20)
            ->addPicture($this->getReference(PicturesFixtures::picture_bien));
        $this->addReference(self::inclassables,$inclassables);
        $manager->persist($inclassables);

        $bateaux = new Property();
        $bateaux->setTitle('bateaux')
            ->setDescription('très belle cabane sur l\'eau. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..')
            ->setAccessHandicap(false)
            ->setWater('eau courante')
            ->setElectricity(true)
            ->setSurface(30)
            ->setRate(95.50)
            ->setNbrRoom(3)
            ->setMaxTravelers(3)
            ->setTax(0.20)
            ->addPicture($this->getReference(PicturesFixtures::picture_bien));
            
        $this->addReference(self::bateaux,$bateaux);
        $manager->persist($bateaux);
        $manager->flush();

        // // // 15 biens dans la catégorie cabane dans les arbres
        // for ($i = 0; $i <= 100; $i++) {
        //     $property = new Property();
        //     $property->setTitle('cabane dans les abres');
        //     $property->setDescription('Description n° '.$i.' très beau chalet à la montagne. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..');
        //     $property->setAccessHandicap(true);
        //     $property;
        //     $property->setElectricity(true);
        //     $property->setSurface(150);
        //     $property->setSurface(150);
        //     $property->setRate(95.50);
        //     $property->setMaxTravelers(3);
        //     $property->setTax(10.20);
        //     // $repository = $this->getDoctrine()->getRepository(typeProperty::class);
        //     // $typeProperty = $repository->find(1);
        //     // $property->setTypeProperty($typeProperty);  // 1 cabane dans les arbres
        //     $manager->persist($property);
            
        // }

        // // // 15 biens dans la catégorie cabane sur l'eau
        // for ($i = 16; $i <= 25; $i++) {
        //     $property = new Property();
        //     $property->setTitle('catégorie cabane sur l\'eau n°');
        //     $property->setDescription('Description n° '.$i.' très beau chalet à la montagne. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..');
        //     $property->setAccessHandicap(false);
        //     $property->setWater('eau du puits');
        //     $property->setElectricity(false);
        //     $property->setSurface(30);
        //     $property->setNbrRoom(1);
        //     $property->setRate(50);
        //     $property->setMaxTravelers(2);
        //     $property->setTax(0.20);
        //     // $property->setTypeProperty();  // 2 cabane sur l'eau.
        //     $manager->persist($property);
        // }
        // // // 15 biens dans la catégorie bulle
        // for ($i = 26; $i <= 40; $i++) {
        //     $property = new Property();
        //     $property->setTitle('Bulle');
        //     $property->setDescription('Description n° '.$i.' très beau chalet à la montagne. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..');
        //     $property->setAccessHandicap(false);
        //     $property->setWater('eau du puits');
        //     $property->setElectricity(false);
        //     $property->setSurface(30);
        //     $property->setNbrRoom(1);
        //     $property->setRate(50);
        //     $property->setMaxTravelers(2);
        //     $property->setTax(0.20);
        //     // $property->setTypeProperty();  // 3 bulle
        //     $manager->persist($property);
        // }
        // // // 15 biens dans la catégorie Tipi
        // for ($i = 41; $i <= 55; $i++) {
        //     $property = new Property();
        //     $property->setTitle('Tipi');
        //     $property->setDescription('Description n° '.$i.' très beau chalet à la montagne. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..');
        //     $property->setAccessHandicap(false);
        //     $property->setWater('eau du puits');
        //     $property->setElectricity(false);
        //     $property->setSurface(30);
        //     $property->setNbrRoom(1);
        //     $property->setRate(50);
        //     $property->setMaxTravelers(2);
        //     $property->setTax(0.20);
        //     // $property->setTypeProperty();  // 4 tipi
        //     $manager->persist($property); 
        // }
        // // // 10 biens dans la catégorie Yourte
        // for ($i = 56; $i <= 65; $i++) {
        //     $property = new Property();
        //     $property->setTitle('Yourte');
        //     $property->setDescription('Description n° '.$i.' très beau chalet à la montagne. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..');
        //     $property->setAccessHandicap(false);
        //     $property->setWater('eau du puits');
        //     $property->setElectricity(false);
        //     $property->setSurface(30);
        //     $property->setNbrRoom(1);
        //     $property->setRate(50);
        //     $property->setMaxTravelers(2);
        //     $property->setTax(0.20);
        //     // $property->setTypeProperty();  // 5 Yourte
        //     $manager->persist($property); 
        // }
        // // // 15 biens dans la catégorie Roulotte
        // for ($i = 66; $i <= 80; $i++) {
        //     $property = new Property();
        //     $property->setTitle('Roulotte');
        //     $property->setDescription('Description n° '.$i.' très beau chalet à la montagne. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..');
        //     $property->setAccessHandicap(false);
        //     $property->setWater('eau du puits');
        //     $property->setElectricity(false);
        //     $property->setSurface(30);
        //     $property->setNbrRoom(1);
        //     $property->setRate(50);
        //     $property->setMaxTravelers(2);
        //     $property->setTax(0.20);
        //     // $property->setTypeProperty();  // 6 Roulotte
        //     $manager->persist($property); 
        // }
        // // // 15 biens dans la catégorie Bateau
        // for ($i = 81; $i <= 95; $i++) {
        //     $property = new Property();
        //     $property->setTitle('Bateau');
        //     $property->setDescription('Description n° '.$i.' très beau chalet à la montagne. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..');
        //     $property->setAccessHandicap(false);
        //     $property->setWater('eau du puits');
        //     $property->setElectricity(false);
        //     $property->setSurface(30);
        //     $property->setNbrRoom(1);
        //     $property->setRate(50);
        //     $property->setMaxTravelers(2);
        //     $property->setTax(0.20);
        //     // $property->setTypeProperty();  // 7 Bateau
        //     $manager->persist($property); 
        // }
        // // // 15 biens dans la catégorie Chalet
        // for ($i = 96; $i <= 111; $i++) {
        //     $property = new Property();
        //     $property->setTitle('Chalet');
        //     $property->setDescription('Description n° '.$i.' très beau chalet à la montagne. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..');
        //     $property->setAccessHandicap(false);
        //     $property->setWater('eau du puits');
        //     $property->setElectricity(false);
        //     $property->setSurface(30);
        //     $property->setNbrRoom(1);
        //     $property->setRate(50);
        //     $property->setMaxTravelers(2);
        //     $property->setTax(0.20);
        //     // $property->setTypeProperty();  // 8 Chalet
        //     $manager->persist($property);
        // }
        
        // // 13 biens dans la catégorie inclassable
        // for ($i = 112; $i < 125; $i++) {
        //     $property = new Property();
        //     $property->setTitle('Igloo inclassable n°');
        //     $property->setDescription('Description n° '.$i.' très beau chalet à la montagne. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..');
        //     $property->setAccessHandicap(false);
        //     $property->setWater('eau du puits');
        //     $property->setElectricity(false);
        //     $property->setSurface(30);
        //     $property->setNbrRoom(1);
        //     $property->setRate(50);
        //     $property->setMaxTravelers(2);
        //     $property->setTax(0.20);
        //     // $property->setTypeProperty();  // 9 Inclassasble
        //     $manager->persist($property);
        // }

        $manager->flush();
    }

    // protected function loadData(ObjectManager $manager)
    // {
    //     $this->createMany(Property::class, 100, function(Property $property){
    //         $property->setTitle('Igloo inclassable n°');
    //         $property->setDescription('Description n° '.$i.' très beau chalet à la montagne. Sit amet jelly beans pie apple pie chupa chups candy. I love candy I love pie bear claw chocolate bar sweet tootsie roll I love..');
    //         $property->setAccessHandicap(false);
    //         $property->setWater('eau du puit');
    //         $property->setElectricity(false);
    //         $property->setSurface(30);
    //         $property->setNbrRoom(1);
    //         $property->setRate(50);
    //         $property->setMaxTravelers(2);
    //         $property->setTax(0.20);
    //         $property->setTypeProperty($this->addReference(TypeProperty::class, '_0'));  // 9 Inclassable
    //         $manager->persist($property);

    //     });
        // $manager->flush();
    // }

    public function getDependencies()
    {
        return array(
            UserFixtures::class,
            PicturesFixtures::class,
        );
    }
}