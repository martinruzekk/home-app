<?php

namespace App\Repository;

use App\Entity\InventoryLocationImage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InventoryLocationImage|null find($id, $lockMode = null, $lockVersion = null)
 * @method InventoryLocationImage|null findOneBy(array $criteria, array $orderBy = null)
 * @method InventoryLocationImage[]    findAll()
 * @method InventoryLocationImage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InventoryLocationImageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InventoryLocationImage::class);
    }

    // /**
    //  * @return InventoryLocationImage[] Returns an array of InventoryLocationImage objects
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
    public function findOneBySomeField($value): ?InventoryLocationImage
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
