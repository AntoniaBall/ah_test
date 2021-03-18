<?php

namespace App\Repository;

use App\Entity\Property;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Disponibility;
use App\Entity\Address;
use Doctrine\ORM\Query\Expr\Join;

/**
 * @method Property|null find($id, $lockMode = null, $lockVersion = null)
 * @method Property|null findOneBy(array $criteria, array $orderBy = null)
 * @method Property[]    findAll()
 * @method Property[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Property::class);
    }
    
    public function findPropertiesBySearch($dateStart, $dateEnd, $maxTraveler = null, $town = null){
        $qb = $this->createQueryBuilder('p')
                    ->innerJoin(Disponibility::class, 'd',Join::WITH,'p.id = d.property')
                    ->andWhere('d.jourDispo >= :dateStart AND d.jourDispo <=:dateEnd')
                    ->setParameter('dateStart', $dateStart)
                    ->setParameter(':dateEnd', $dateEnd);

            if ($maxTraveler !== null){
                $qb->andWhere('p.maxTravelers <= :maxTraveler');
                $qb->setParameter('maxTraveler', $maxTraveler);
            }

            if ($town !== null){
                $qb->innerJoin(Address::class, 'a',Join::WITH,'a.id = p.address')
                    ->andWhere('a.town = :town')
                   ->setParameter('town', $town);
            }

            $query = $qb->getQuery();

            return $query->getResult();
    }

    public function getCountPropertiesByUser($userId){
        // get all demandes of a property
        $qb = $this->createQueryBuilder('p')
                ->select('COUNT(p.id)')
                ->andWhere('p.status = :status')
                ->setParameter('status', 'en attente')
                ->andWhere('p.user = :userId')
                ->setParameter('userId', $userId);
                
        $query = $qb->getQuery();

        return $query->getResult();
    }
    // /**
    //  * @return Property[] Returns an array of Property objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Property
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
