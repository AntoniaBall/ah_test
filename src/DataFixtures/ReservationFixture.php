<?php

namespace App\DataFixtures;

use App\Entity\Reservation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ReservationFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        //1 reservation pour l'utilisateur locataire@yopmail.com dans les jours à venir
        $reservation = new Reservation();
        $reservation->setDateStart(new \Datetime('tomorrow'))
        ->setDateEnd(new \Datetime('next monday'))
        ->setMontant(600)
        ->setPaid(1)
        ->setNumberTraveler(3)
        ->setStripeToken('tok_1IHxljKzuq8ewRYyYBlC0GSz')
        ->setUser($this->getReference(UserFixtures::LOC_USER_REFERENCE))
        ->setProperty($this->getReference(PropertyFixtures::CABANES_EAU));
        
        //1 reservation pour l'utilisateur locataire@yopmail.com pour le mois prochain pour un autre bien
        $reservation1 = new Reservation();
        $reservation1->setDateStart(new \Datetime('first day of next month'))
        ->setDateEnd(new \Datetime('+5weeks'))
        ->setMontant(1200)
        ->setPaid(0)
        ->setNumberTraveler(3)
        ->setStatus("rejetee")
        ->setStripeToken('tok_1IHxljKzuq8ewRYyYBlC0GSz')
        ->setUser($this->getReference(UserFixtures::LOC_USER_REFERENCE))
        ->setProperty($this->getReference(PropertyFixtures::CABANES));

        //1 reservation pour l'utilisateur locataire@yopmail.com pour le mois prochain pour un autre bien
        $reservation2 = new Reservation();
        $reservation2->setDateStart(new \Datetime('first day of last month'))
                ->setDateEnd(new \Datetime('1 week ago'))
                ->setMontant(12000)
                ->setPaid(1)
                ->setNumberTraveler(3)
                ->setStatus("acceptee")
                ->setStripeToken('tok_1IHxljKzuq8ewRYyYBlC0GSz')
                ->setUser($this->getReference(UserFixtures::LOC_USER_REFERENCE))
                ->setProperty($this->getReference(PropertyFixtures::roulottes));

        $manager->persist($reservation);
        $manager->persist($reservation1);
        $manager->persist($reservation2);

        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            UserFixtures::class,
            PropertyFixtures::class,
        );
    }
}