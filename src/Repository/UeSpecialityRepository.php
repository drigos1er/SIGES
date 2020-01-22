<?php

namespace App\Repository;

use App\Entity\UeSpeciality;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method UeSpeciality|null find($id, $lockMode = null, $lockVersion = null)
 * @method UeSpeciality|null findOneBy(array $criteria, array $orderBy = null)
 * @method UeSpeciality[]    findAll()
 * @method UeSpeciality[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UeSpecialityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UeSpeciality::class);
    }

    // /**
    //  * @return UeSpeciality[] Returns an array of UeSpeciality objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UeSpeciality
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
