<?php

namespace App\Repository;

use App\Entity\ExamSession;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ExamSession|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamSession|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamSession[]    findAll()
 * @method ExamSession[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamSessionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamSession::class);
    }

    // /**
    //  * @return ExamSession[] Returns an array of ExamSession objects
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
    public function findOneBySomeField($value): ?ExamSession
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
