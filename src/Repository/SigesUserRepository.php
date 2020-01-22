<?php

namespace App\Repository;

use App\Entity\SigesUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SigesUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method SigesUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method SigesUser[]    findAll()
 * @method SigesUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SigesUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SigesUser::class);
    }

    // /**
    //  * @return SigesUser[] Returns an array of SigesUser objects
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
    public function findOneBySomeField($value): ?SigesUser
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
