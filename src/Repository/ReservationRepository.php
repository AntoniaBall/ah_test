<?php

namespace App\Repository;

use App\Entity\Reservation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Reservation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reservation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reservation[]    findAll()
 * @method Reservation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReservationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reservation::class);
    }

    // /**
    //  * @return Reservation[] Returns an array of Reservation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    public function findAcceptedReservations($day, $property)
    {
        return $this->createQueryBuilder('r')
            ->select('r.id')
            ->where('r.status = :val')
            ->setParameter('val', 'acceptee')
            ->andWhere('r.dateStart <= :day')
            ->andWhere('r.dateEnd >= :day')
            ->andWhere('r.property >= :property')
            ->setParameter('day', $day)
            ->setParameter('property', $property)
            ->getQuery()
            ->getResult()
            ;
        }
        
        public function getCountReservationsByUser($user)
        {
            return $this->createQueryBuilder('r')
            ->select('count(r.id)')
            ->where('r.user = :user')
            ->andWhere('r.status= :status')
            ->setParameter('status', 'en attente')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult()
        ;
    }
}
