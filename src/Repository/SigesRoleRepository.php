<?php

namespace App\Repository;

use App\Entity\SigesRole;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SigesRole|null find($id, $lockMode = null, $lockVersion = null)
 * @method SigesRole|null findOneBy(array $criteria, array $orderBy = null)
 * @method SigesRole[]    findAll()
 * @method SigesRole[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SigesRoleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SigesRole::class);
    }

    // /**
    //  * @return SigesRole[] Returns an array of SigesRole objects
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
    public function findOneBySomeField($value): ?SigesRole
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
