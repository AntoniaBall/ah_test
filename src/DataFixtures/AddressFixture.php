<?php

namespace App\DataFixtures;

use App\Entity\Address;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AddressFixture extends Fixture 
{
    public const adresse_bien = 'adresse_bien';
    public const adresse_bien1 = 'adresse_bien1';
    public const adr_cabane_eau = 'adr_cabane_eau';
    public const adr_bulle= 'adr_bulle';
    public const adr_roulotte= 'adr_roulotte';
    public const adr_chalets= 'adr_chalets';
    public const adr_inclassable= 'adr_inclassable';
    public const adr_bateau= 'adr_bateau';
    public const adr_tipi= 'adr_tipi';
    public const adr_yourte= 'adr_yourte';

    public function load(ObjectManager $manager)
    {
        $generator = Faker\Factory::create();

        for ($i=0; $i<20 ; $i++){
                $address= new Address();
                $address->setNumber((int) $generator->numberBetween($min = 1, $max = 900))
                        ->setStreet($generator->streetName)
                        ->setPostalCode((int)$generator->postcode)
                        ->setTown($generator->city)
                        ->setRegion($generator->state)
                        ->setCountry($generator->country);
                $manager->persist($address);
        }

        $this->addReference(self::adresse_bien,$address);

        $address1= new Address();
        $address1->setNumber((int) $generator->numberBetween($min = 1, $max = 900))
                ->setStreet($generator->streetName)
                ->setPostalCode((int)$generator->postcode)
                ->setTown($generator->city)
                ->setRegion($generator->state)
                ->setCountry($generator->country);
        $manager->persist($address);

        $this->addReference(self::adresse_bien1,$address);

        $addressEau= new Address();
        $addressEau->setNumber((int) $generator->numberBetween($min = 1, $max = 900))
                ->setStreet($generator->streetName)
                ->setPostalCode((int)$generator->postcode)
                ->setTown($generator->city)
                ->setRegion($generator->state)
                ->setCountry($generator->country);
        $manager->persist($addressEau);

        $this->addReference(self::adr_cabane_eau,$addressEau);
        
        $adr_tipi= new Address();
        $adr_tipi->setNumber((int) $generator->numberBetween($min = 1, $max = 900))
        ->setStreet($generator->streetName)
        ->setPostalCode((int)$generator->postcode)
        ->setTown($generator->city)
        ->setRegion($generator->state)
        ->setCountry($generator->country);
        $manager->persist($adr_tipi);

        $this->addReference(self::adr_tipi,$adr_tipi);
        
        $adr_bulle= new Address();
        $adr_bulle->setNumber((int) $generator->numberBetween($min = 1, $max = 900))
        ->setStreet($generator->streetName)
        ->setPostalCode((int)$generator->postcode)
        ->setTown($generator->city)
        ->setRegion($generator->state)
        ->setCountry($generator->country);
        $manager->persist($adr_bulle);

        $this->addReference(self::adr_bulle,$adr_bulle);
        
        $adr_bateau= new Address();
        $adr_bateau->setNumber((int) $generator->numberBetween($min = 1, $max = 900))
                ->setStreet($generator->streetName)
                ->setPostalCode((int)$generator->postcode)
                ->setTown($generator->city)
                ->setRegion($generator->state)
                ->setCountry($generator->country);
        $manager->persist($adr_bateau);

        $this->addReference(self::adr_bateau,$adr_bateau);

        $adr_roulotte= new Address();
        $adr_roulotte->setNumber((int) $generator->numberBetween($min = 1, $max = 900))
                ->setStreet($generator->streetName)
                ->setPostalCode((int)$generator->postcode)
                ->setTown($generator->city)
                ->setRegion($generator->state)
                ->setCountry($generator->country);
        $manager->persist($adr_roulotte);

        $this->addReference(self::adr_roulotte,$adr_roulotte);

        $adr_chalets= new Address();
        $adr_chalets->setNumber((int) $generator->numberBetween($min = 1, $max = 900))
                ->setStreet($generator->streetName)
                ->setPostalCode((int)$generator->postcode)
                ->setTown($generator->city)
                ->setRegion($generator->state)
                ->setCountry($generator->country);
        $manager->persist($adr_chalets);

        $this->addReference(self::adr_chalets,$adr_chalets);
        
        $adr_inclassable= new Address();
        $adr_inclassable->setNumber((int) $generator->numberBetween($min = 1, $max = 900))
            ->setStreet($generator->streetName)
            ->setPostalCode((int)$generator->postcode)
            ->setTown($generator->city)
            ->setRegion($generator->state)
            ->setCountry($generator->country);
        $manager->persist($adr_inclassable);
        
        $this->addReference(self::adr_inclassable,$adr_inclassable);

        $adr_yourte= new Address();
        $adr_yourte->setNumber((int) $generator->numberBetween($min = 1, $max = 900))
                ->setStreet($generator->streetName)
                ->setPostalCode((int)$generator->postcode)
                ->setTown($generator->city)
                ->setRegion($generator->state)
                ->setCountry($generator->country);
        $manager->persist($adr_yourte);

        $this->addReference(self::adr_yourte,$adr_yourte);

        $manager->flush();
    }

}
