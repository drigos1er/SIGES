<?php

namespace App\Repository;

use App\Entity\Ecu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Ecu|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ecu|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ecu[]    findAll()
 * @method Ecu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EcuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ecu::class);
    }

    // /**
    //  * @return Ecu[] Returns an array of Ecu objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ecu
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
