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
 
      $Disponibility = new Disponibility();
 
      $Disponibility->setDateStart($dateStart)
                      ->setDateEnd($dateEnd)
                      ->setProperty($this->getReference(PropertyFixtures::CABANES));
 
      $manager->persist($Disponibility);
      $manager->flush();
      $this->addReference(self::noel, $Disponibility);
  }
 
  public function getDependencies()
  {
      return array(
          PropertyFixtures::class,
      );
  }
}
