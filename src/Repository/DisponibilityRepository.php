<?php

namespace App\Repository;

use App\Entity\Disponibility;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Disponibility|null find($id, $lockMode = null, $lockVersion = null)
 * @method Disponibility|null findOneBy(array $criteria, array $orderBy = null)
 * @method Disponibility[]    findAll()
 * @method Disponibility[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DisponibilityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Disponibility::class);
    }

    public function getJourDisposBetweenDatesByProperty($property, $dateStart, $dateEnd){
        $qb = $this->createQueryBuilder('d')
        ->select('d.jourDispo')
        ->andWhere('d.property = :val')
        ->setParameter('val', $property)
        ->andWhere('d.jourDispo >= :dateStart and d.jourDispo<= :dateEnd')
        ->setParameter('dateStart', $dateStart)
        ->setParameter('dateEnd', $dateEnd)
        ->getQuery()
        ->getResult()
        ;

        $response = [];

        $response["property"] = $property;
        foreach ($qb as $rowDispo){
            $jours []= $rowDispo["jourDispo"]->format('Y-m-d');
        }
        
        $response["data"] = $jours;

        return $response;
    }

    /*
    public function findOneBySomeField($value): ?Disponibility
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /**
    * @return Disponibility[] Returns an array of Disponibility objects
    */
    public function findDisponibilitiesBetweenDates($dateStart, $dateEnd){
        $qb = $this->createQueryBuilder('d')
            ->andWhere('d.property = :val')
            ->setParameter('val', $propertyId)
            ->orderBy('d.id', 'DESC')
            ->getQuery()
            ->getResult()
        ;

        dump($qb);

        return $qb;
    }

    /**
    * @return Disponibility[] Returns an array of Disponibility objects
    */
    public function findDisponibilitiesByJourDispo($property, $jourDispo){

        $qb = $this->createQueryBuilder('d')
        ->andWhere('d.jourDispo = :val')
            ->setParameter('val', $jourDispo)
            ->andWhere('d.property = :val')
            ->setParameter('val', $property)
            ->getQuery()
            ->getResult();

        dump($qb);

        return $qb;
        ;
    }
}
