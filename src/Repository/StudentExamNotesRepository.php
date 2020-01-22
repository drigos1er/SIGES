<?php

namespace App\Repository;

use App\Entity\StudentExamNotes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method StudentExamNotes|null find($id, $lockMode = null, $lockVersion = null)
 * @method StudentExamNotes|null findOneBy(array $criteria, array $orderBy = null)
 * @method StudentExamNotes[]    findAll()
 * @method StudentExamNotes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentExamNotesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StudentExamNotes::class);
    }

    // /**
    //  * @return StudentExamNotes[] Returns an array of StudentExamNotes objects
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
    public function findOneBySomeField($value): ?StudentExamNotes
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
