<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

abstract class BaseFixtures extends Fixture{
    protected function createMany(string $className, int $count, callable $factory)
    {
        for ($i = 0; $i < $count; $i++) {
            $entity = new $className();
            $factory($entity, $i);
            $this->manager->persist($entity);
            
            $this->addReference($className . '_' . $i, $entity);
        }
    }
}
