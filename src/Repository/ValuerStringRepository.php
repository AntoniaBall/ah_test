<?php

namespace App\Repository;

use App\Entity\ValuerString;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ValuerString|null find($id, $lockMode = null, $lockVersion = null)
 * @method ValuerString|null findOneBy(array $criteria, array $orderBy = null)
 * @method ValuerString[]    findAll()
 * @method ValuerString[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ValuerStringRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ValuerString::class);
    }

    // /**
    //  * @return ValuerString[] Returns an array of ValuerString objects
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
    public function findOneBySomeField($value): ?ValuerString
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
