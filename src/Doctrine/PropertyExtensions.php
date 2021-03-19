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

final class PropertyExtensions implements QueryCollectionExtensionInterface, QueryItemExtensionInterface
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
        if (Property::class !== $resourceClass || $this->security->isGranted('ROLE_ADMIN')) {
            return;
        }
        
        if ($this->security->isGranted('ROLE_USER') 
            || null === $user = $this->security->getUser() ){
            $rootAlias = $queryBuilder->getRootAliases()[0];
            $queryBuilder->andWhere(sprintf('%s.isPublished = :isPublished', $rootAlias))
                        ->setParameter('isPublished', true)
                        ->andWhere(sprintf('%s.status = :status', $rootAlias))
                        ->setParameter('status', "acceptee");
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