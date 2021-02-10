<?php
namespace App\DataFixtures;
use App\Entity\Disponibility;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\PropertyFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class DisponibilityFixtures extends Fixture implements DependentFixtureInterface
{
  public const noel = 'noel';

  public function load(ObjectManager $manager)
  {
      $dateStart = new \Datetime("2021-04-01");
      $dateEnd = new \Datetime("2021-05-11");

      // // $Disponibility = new Disponibility();

      // //     $Disponibility->setjourDispo($dateStart);
      // //     $manager->persist($Disponibility);


  
      //   $this->addReference(self::noel, $disponibility);
      // $manager->flush();
  }
 
  public function getDependencies()
  {
      return array(
          PropertyFixtures::class,
      );
  }
}
