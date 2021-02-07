<?php

namespace App\DataFixtures;

use App\Entity\Property;
use App\Entity\TypeProperty;
use App\Entity\Disponibility;
use App\DataFixtures\TypePropertyFixtures;
use App\DataFixtures\UserFixtures;
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
            ->setAddress($this->getReference(AddressFixture::adresse_bien))
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
            ->setAddress($this->getReference(AddressFixture::adr_cabane_eau))
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
            ->setAddress($this->getReference(AddressFixture::adr_bulle))
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
            ->setAddress($this->getReference(AddressFixture::adr_tipi))
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
            ->setAddress($this->getReference(AddressFixture::adr_roulotte))
            ->addPicture($this->getReference(PicturesFixtures::picture_bien))
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
            ->setAddress($this->getReference(AddressFixture::adr_chalets))
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
            ->setAddress($this->getReference(AddressFixture::adr_yourte))
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
            ->setAddress($this->getReference(AddressFixture::adr_inclassable))
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
            ->setAddress($this->getReference(AddressFixture::adr_bateau))
            ->addPicture($this->getReference(PicturesFixtures::picture_bien));
            
            $this->addReference(self::bateaux,$bateaux);
            $manager->persist($bateaux);

            $manager->flush();
            
        }
        
        public function getDependencies()
        {
            return array(
            PicturesFixtures::class,
        );
        }
}