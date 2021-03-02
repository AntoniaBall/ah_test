<?php

namespace App\Repository;

use App\Entity\TypeAttribut;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeAttribut|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeAttribut|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeAttribut[]    findAll()
 * @method TypeAttribut[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeAttributRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeAttribut::class);
    }

    // /**
    //  * @return TypeAttribut[] Returns an array of TypeAttribut objects
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
    public function findOneBySomeField($value): ?TypeAttribut
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
