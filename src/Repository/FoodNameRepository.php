<?php

namespace App\Repository;

use App\Entity\FoodName;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FoodName|null find($id, $lockMode = null, $lockVersion = null)
 * @method FoodName|null findOneBy(array $criteria, array $orderBy = null)
 * @method FoodName[]    findAll()
 * @method FoodName[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FoodNameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FoodName::class);
    }

    // /**
    //  * @return FoodName[] Returns an array of FoodName objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FoodName
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
