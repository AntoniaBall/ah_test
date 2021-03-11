<?php

namespace App\Repository;

use App\Entity\TypeValue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeValue|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeValue|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeValue[]    findAll()
 * @method TypeValue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeValueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeValue::class);
    }

    // /**
    //  * @return TypeValue[] Returns an array of TypeValue objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeValue
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
