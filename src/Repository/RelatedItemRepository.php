<?php

namespace App\Repository;

use App\Entity\RelatedItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RelatedItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method RelatedItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method RelatedItem[]    findAll()
 * @method RelatedItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RelatedItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RelatedItem::class);
    }

    // /**
    //  * @return RelatedItem[] Returns an array of RelatedItem objects
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

    /*
    public function findOneBySomeField($value): ?RelatedItem
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
