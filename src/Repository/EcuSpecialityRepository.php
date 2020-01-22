<?php

namespace App\Repository;

use App\Entity\EcuSpeciality;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EcuSpeciality|null find($id, $lockMode = null, $lockVersion = null)
 * @method EcuSpeciality|null findOneBy(array $criteria, array $orderBy = null)
 * @method EcuSpeciality[]    findAll()
 * @method EcuSpeciality[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EcuSpecialityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EcuSpeciality::class);
    }

    // /**
    //  * @return EcuSpeciality[] Returns an array of EcuSpeciality objects
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
    public function findOneBySomeField($value): ?EcuSpeciality
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
