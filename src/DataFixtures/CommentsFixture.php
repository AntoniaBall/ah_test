<?php

namespace App\DataFixtures;

use App\Entity\Comments;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CommentsFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i <10 ; $i++) { 
            $Comments = new Comments();
            $Comments->setPublishedAt(new \Datetime('next monday'))
                ->setCommentContent("totototot")
                ->setForbiddenWords(["aaa","aaaazz","aefxcc"])
                ->setAuteur($this->getReference(UserFixtures::LOC_USER_REFERENCE))
                ->setActivities($this->getReference("activities"))
                ->setReservation($this->getReference(ReservationFixture::Reservation_1));
            $manager->persist($Comments);
            $manager->persist($Comments);
        }
        $manager->flush();

    }
    public function getDependencies()
    {
        return array(
            UserFixtures::class,
            ActivitiesFixtures::class,
            ReservationFixture::class

        );
    }
}
