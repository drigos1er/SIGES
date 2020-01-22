<?php

namespace App\Repository;

use App\Entity\StudentSpeciality;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method StudentSpeciality|null find($id, $lockMode = null, $lockVersion = null)
 * @method StudentSpeciality|null findOneBy(array $criteria, array $orderBy = null)
 * @method StudentSpeciality[]    findAll()
 * @method StudentSpeciality[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentSpecialityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StudentSpeciality::class);
    }

    // /**
    //  * @return StudentSpeciality[] Returns an array of StudentSpeciality objects
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
    public function findOneBySomeField($value): ?StudentSpeciality
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
