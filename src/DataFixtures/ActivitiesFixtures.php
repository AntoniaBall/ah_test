<?php

namespace App\DataFixtures;

use App\Entity\Activities;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ActivitiesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $equitation = new Activities();
        $equitation->setTitle('Equitation')
                    ->setDescription('centre d\'equitation proche du logement')
                    ->addPicture($this->getReference(PicturesFixtures::picture_activite));
                    
        $manager->persist($equitation);

        $natation = new Activities();
        $natation->setTitle('natation')
                    ->setDescription('centre d\'equitation proche du logement')
                    ->addPicture($this->getReference(PicturesFixtures::picture_activite));
                    
        $manager->persist($natation);

        for ($i=0; $i <10 ; $i++) { 
        	$Activities = (new Activities);
        	$Activities-> setDescription("Lorem ipsum dolor sit amet");
        	$Activities-> setTitle("$i Activity");
        	
        	$manager->persist($Activities);

        }
        $this->addReference("activities" , $natation);
        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            PicturesFixtures::class,
        );
    }
}
