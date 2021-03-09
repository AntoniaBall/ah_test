<?php

namespace App\Repository;

use App\Entity\ValeurBool;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ValeurBool|null find($id, $lockMode = null, $lockVersion = null)
 * @method ValeurBool|null findOneBy(array $criteria, array $orderBy = null)
 * @method ValeurBool[]    findAll()
 * @method ValeurBool[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ValeurBoolRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ValeurBool::class);
    }

    // /**
    //  * @return ValeurBool[] Returns an array of ValeurBool objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ValeurBool
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
