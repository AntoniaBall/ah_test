<?php
namespace App\DataFixtures;
use App\Entity\Indisponibility;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\PropertyFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class IndisponibilityFixtures extends Fixture implements DependentFixtureInterface
{
  public const noel = 'noel';
  public function load(ObjectManager $manager)
  {
      $dateStart = new \Datetime("2020-01-01");
      $dateEnd = new \Datetime("2020-01-11");
 
      $indisponibility = new Indisponibility();
 
      $indisponibility->setDateStart($dateStart)
                      ->setDateEnd($dateEnd)
                      ->setProperty($this->getReference(PropertyFixtures::CABANES));
 
      $manager->persist($indisponibility);
      $manager->flush();
      $this->addReference(self::noel, $indisponibility);
  }
 
  public function getDependencies()
  {
      return array(
          PropertyFixtures::class,
      );
  }
}
