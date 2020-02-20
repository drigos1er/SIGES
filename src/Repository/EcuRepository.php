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


    public function spececu($idspec, $idsem, $idanac, $data, $page = 0, $max = NULL, $getResult = true)
    {
        $qb = $this->_em->createQueryBuilder();
        $query = isset($data['query']) && $data['query'] ? $data['query'] : null;

        $qb
            ->select('e')
            ->from('App\Entity\EcuSpeciality', 'e')
            ->where('e.specialityid=:idspec ')
            ->andWhere('e.semester=:sem')
            ->andWhere('e.acadyearid=:anac')
            ->setParameter('idspec', $idspec)
            ->setParameter('sem', $idsem)
            ->setParameter('anac', $idanac);

        if ($query) {
            $qb
                ->andWhere('e.specialityid like :query')
                ->setParameter('query', "%" . $query . "%");
        }
        if ($max) {
            $preparedQuery = $qb->getQuery()
                ->setMaxResults($max)
                ->setFirstResult($page * $max)
            ;
        } else {
            $preparedQuery = $qb->getQuery();
        }

        return $getResult?$preparedQuery->getResult():$preparedQuery;
    }




    public function ueecu($idspec,$idsem,$idue,$idanac,$data, $page = 0, $max = NULL, $getResult = true)
    {
        $qb = $this->_em->createQueryBuilder();
        $query = isset($data['query']) && $data['query'] ? $data['query'] : null;

        $qb
            ->select('e')
            ->from('App\Entity\EcuSpeciality', 'e')
            ->where('e.specialityid=:idspec ')
            ->andWhere('e.semester=:sem')
            ->andWhere('e.acadyearid=:anac')
            ->andWhere('e.ueid=:idue')

            ->setParameter('idspec', $idspec)
            ->setParameter('sem', $idsem)
            ->setParameter('idue', $idue)
            ->setParameter('anac', $idanac);

        if ($query) {
            $qb
                ->andWhere('e.specialityid like :query')
                ->setParameter('query', "%" . $query . "%");
        }
        if ($max) {
            $preparedQuery = $qb->getQuery()
                ->setMaxResults($max)
                ->setFirstResult($page * $max)
            ;
        } else {
            $preparedQuery = $qb->getQuery();
        }

        return $getResult?$preparedQuery->getResult():$preparedQuery;
    }





}
