<?php

namespace App\Repository;

use App\Entity\UeValidated;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method UeValidated|null find($id, $lockMode = null, $lockVersion = null)
 * @method UeValidated|null findOneBy(array $criteria, array $orderBy = null)
 * @method UeValidated[]    findAll()
 * @method UeValidated[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UeValidatedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UeValidated::class);
    }

    // /**
    //  * @return UeValidated[] Returns an array of UeValidated objects
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
    public function findOneBySomeField($value): ?UeValidated
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
