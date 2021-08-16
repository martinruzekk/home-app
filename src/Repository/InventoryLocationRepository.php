<?php

namespace App\Repository;

use App\Entity\InventoryLocation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InventoryLocation|null find($id, $lockMode = null, $lockVersion = null)
 * @method InventoryLocation|null findOneBy(array $criteria, array $orderBy = null)
 * @method InventoryLocation[]    findAll()
 * @method InventoryLocation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InventoryLocationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InventoryLocation::class);
    }

    // /**
    //  * @return InventoryLocation[] Returns an array of InventoryLocation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InventoryLocation
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
