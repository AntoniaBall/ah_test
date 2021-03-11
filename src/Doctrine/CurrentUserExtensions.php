<?php

namespace App\Doctrine;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryItemExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use App\Entity\Reservation;
use App\Entity\Property;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\Security\Core\Security;
use Doctrine\ORM\Query\Expr;
use Doctrine\ORM\Query\Expr\Join;

final class CurrentUserExtensions implements QueryCollectionExtensionInterface, QueryItemExtensionInterface
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function applyToCollection(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, string $operationName = null): void
    {
        $this->addWhere($queryBuilder, $resourceClass);
    }

    public function applyToItem(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, array $identifiers, string $operationName = null, array $context = []): void
    {
        $this->getItem($queryBuilder, $resourceClass);
    }
    
    private function addWhere(QueryBuilder $queryBuilder, string $resourceClass): void
    {
        if (Reservation::class !== $resourceClass || $this->security->isGranted('ROLE_ADMIN') || 
        null === $user = $this->security->getUser()) {
            return;
        }

        $rootAlias = $queryBuilder->getRootAliases()[0];

        // si l'utilisateur est un locataire voir les réservations uniquement faites par lui
        if ($this->security->isGranted('ROLE_USER')){
            $queryBuilder->andWhere(sprintf('%s.user = :current_user', $rootAlias));
            $queryBuilder->setParameter('current_user', $this->security->getUser());
            // dump($queryBuilder->getQuery());
            
        }
        
        // si l'utilisateur est proprio voir la liste de toutes les reservations sur ses biens
        if ($this->security->isGranted('ROLE_PROPRIO')){
            // $queryBuilder->innerJoin(Property::class, 'p', Join::WITH, '%s.property = p.id');
            $queryBuilder->innerJoin(Property::class, 'p', Join::WITH, sprintf('%s.property = p.id', $rootAlias));
            // $queryBuilder->leftJoin(sprintf('%s.property', $rootAlias), 'property')->addSelect('property');
            $queryBuilder->andWhere(sprintf('p.user = :user'));
            $queryBuilder->setParameter('user', $this->security->getUser());
            
            // dump($queryBuilder->getQuery());
        }
    }
    private function getItem(QueryBuilder $queryBuilder, string $resourceClass): void
    {
        // if ($this->security->isGranted('ROLE_PROPRIO')){
        // $rootAlias = $queryBuilder->getRootAliases()[0];
        // if ($this->security->isGranted('ROLE_USER')){
        //     $queryBuilder->andWhere(sprintf('%s.user = :current_user', $rootAlias));
        //     $queryBuilder->setParameter('current_user', $this->security->getUser());
        //     dump($queryBuilder->getQuery());
        //     // dump($queryBuilder->getQuery());
        // }
        return ;
    }
}