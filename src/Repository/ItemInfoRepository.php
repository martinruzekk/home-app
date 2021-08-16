<?php

namespace App\Repository;

use App\Entity\ItemInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ItemInfo|null find($id, $lockMode = null, $lockVersion = null)
 * @method ItemInfo|null findOneBy(array $criteria, array $orderBy = null)
 * @method ItemInfo[]    findAll()
 * @method ItemInfo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemInfoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ItemInfo::class);
    }

    // /**
    //  * @return ItemInfo[] Returns an array of ItemInfo objects
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
    public function findOneBySomeField($value): ?ItemInfo
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
