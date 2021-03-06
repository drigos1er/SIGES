<?php

namespace App\Repository;

use App\Entity\TeachSpeciality;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\ResultSetMapping;

/**
 * @method TeachSpeciality|null find($id, $lockMode = null, $lockVersion = null)
 * @method TeachSpeciality|null findOneBy(array $criteria, array $orderBy = null)
 * @method TeachSpeciality[]    findAll()
 * @method TeachSpeciality[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeachSpecialityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TeachSpeciality::class);
    }


    public function searchteachpec($teachid,$acadyearid,$data, $page = 0, $max = NULL, $getResult = true)
    {
        $qb = $this->_em->createQueryBuilder();
        $query = isset($data['query']) && $data['query']?$data['query']:null;

        $qb
            ->select('t')
            ->from('App\Entity\TeachSpeciality', 't')
            ->where("t.teacherid=:teachid ")

            ->andWhere('t.acadyearid=:acadyearid')
            ->setParameter('teachid', $teachid)

            ->setParameter('acadyearid', $acadyearid)





        ;

        if ($query) {
            $qb
                ->andWhere('t.teacherid like :query')
                ->setParameter('query', "%".$query."%")
            ;
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







    public function searchsemspec($acadyearid,$idsem,$idspec,$levelid,$data, $page = 0, $max = NULL, $getResult = true)
    {



        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('ecuid', 'ecuid');
        $rsm->addScalarResult('classeid', 'classeid');
        $rsm->addScalarResult('ueid', 'ueid');
        $rsm->addScalarResult('semesterid', 'semesterid');
        $rsm->addScalarResult('teacherid', 'teacherid');


        $sql = "SELECT ecuid,classeid,ueid,semesterid,teacherid FROM `teach_speciality` where acadyearid=:acadyearid  and semesterid=:idsem and classeid in (select id from school_class where `specialityid`=:idspec and `levelid`=:levelid) ";
        $query = $this->_em->createNativeQuery($sql, $rsm);
        $query->setParameter('acadyearid', $acadyearid);
        $query->setParameter('idsem', $idsem);
        $query->setParameter('idspec', $idspec);
        $query->setParameter('levelid', $levelid);

        $ecu = $query->getResult();


        return $ecu;









    }





    // /**
    //  * @return TeachSpeciality[] Returns an array of TeachSpeciality objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TeachSpeciality
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
