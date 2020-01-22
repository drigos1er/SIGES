<?php

namespace App\Repository;

use App\Entity\StudentAverages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method StudentAverages|null find($id, $lockMode = null, $lockVersion = null)
 * @method StudentAverages|null findOneBy(array $criteria, array $orderBy = null)
 * @method StudentAverages[]    findAll()
 * @method StudentAverages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentAveragesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StudentAverages::class);
    }

    // /**
    //  * @return StudentAverages[] Returns an array of StudentAverages objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StudentAverages
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
