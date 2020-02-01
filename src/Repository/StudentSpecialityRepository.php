<?php

namespace App\Repository;

use App\Entity\StudentSpeciality;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\ResultSetMapping;

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


    public function levelspec($idanac)
    {







        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('specialityid', 'specialityid');

        $rsm->addScalarResult('levelid', 'levelid');

        $sql = "SELECT DISTINCT `specialityid`,`levelid` FROM `school_class` WHERE `acadyearid`=:idanac  ";
        $query = $this->_em->createNativeQuery($sql, $rsm);



        $query->setParameter('idanac', $idanac );






        $studspec = $query->getResult();


        return $studspec;



    }






    public function searchconsultaverage($idanac,$idspec,$idclasse,$data, $page = 0, $max = NULL, $getResult = true)
    {
        $qb = $this->_em->createQueryBuilder();
        $query = isset($data['query']) && $data['query']?$data['query']:null;

        $qb
            ->select('s')
            ->from('ESATICSigesBundle:StudentSpeciality', 's')
            ->where("s.acadyearid=:idanac ")

            ->andWhere('s.specialityid=:idspec')
            ->andWhere('s.schoolclasseid=:idclasse')
            ->setParameter('idanac', $idanac)
            ->setParameter('idspec', $idspec)
            ->setParameter('idclasse', $idclasse)





        ;

        if ($query) {
            $qb
                ->andWhere('s.studentid like :query')
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

    public function studspec($idanac,$idsem,$idspecialite,$idses)
    {







        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('studentid', 'studentid');



        $sql = "SELECT  DISTINCT student_examnotes.studentid FROM `student_examnotes` INNER JOIN student_speciality on student_examnotes.studentid=student_speciality.studentid  WHERE  student_examnotes.specialityid=:idspec  and student_examnotes.acadyearid=:idanac  and student_examnotes.semesterid=:idsem and student_examnotes.sessionid=:idses and student_examnotes.studentid NOT IN (SELECT  DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib`   WHERE  halfyearly_delib.specialityid=:idspec    and halfyearly_delib.semesterid=:idsem  and halfyearly_delib.decision='ADMIS' and halfyearly_delib.acadyearid !=:idanac)  ";
        $query = $this->_em->createNativeQuery($sql, $rsm);



        $query->setParameter('idanac', $idanac );

        $query->setParameter('idsem', $idsem);

        $query->setParameter('idspec', $idspecialite);
        $query->setParameter('idses', $idses);




        $studspec = $query->getResult();


        return $studspec;



    }





    public function studspecse2($idanac,$idsem,$idspecialite)
    {







        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('studentid', 'studentid');



        $sql = "SELECT  DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib` INNER JOIN student_speciality on student_speciality.studentid=halfyearly_delib.studentid  WHERE  halfyearly_delib.specialityid=:idspec  and halfyearly_delib.acadyearid=:idanac  and halfyearly_delib.semesterid=:idsem and halfyearly_delib.sessionid='SE1' and halfyearly_delib.decision='REFUSE'  ";
        $query = $this->_em->createNativeQuery($sql, $rsm);



        $query->setParameter('idanac', $idanac );

        $query->setParameter('idsem', $idsem);

        $query->setParameter('idspec', $idspecialite);




        $studspecse2 = $query->getResult();


        return $studspecse2;



    }


    public function searchstudentuniq($idstudent,$data, $page = 0, $max = NULL, $getResult = true)
    {
        $qb = $this->_em->createQueryBuilder();
        $query = isset($data['query']) && $data['query']?$data['query']:null;

        $qb
            ->select('s')
            ->from('ESATICSigesBundle:Student', 's')
            ->where("s.id=:idstudent ")


            ->setParameter('idstudent', $idstudent)





        ;

        if ($query) {
            $qb
                ->andWhere('s.studentid like :query')
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


    public function studspecclass($idanac,$idsem,$idspecialite,$idses,$idclass)
    {







        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('studentid', 'studentid');



        $sql = "SELECT  DISTINCT student_examnotes.studentid FROM `student_examnotes` INNER JOIN student_speciality on student_examnotes.studentid=student_speciality.studentid  WHERE  student_examnotes.specialityid=:idspec  and student_speciality.school_classeid=:idclass  and student_examnotes.acadyearid=:idanac  and student_examnotes.semesterid=:idsem and student_examnotes.sessionid=:idses and student_examnotes.studentid NOT IN (SELECT  DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib`   WHERE  halfyearly_delib.specialityid=:idspec    and halfyearly_delib.semesterid=:idsem  and halfyearly_delib.decision='ADMIS' and halfyearly_delib.acadyearid!=:idanac)  ";
        $query = $this->_em->createNativeQuery($sql, $rsm);



        $query->setParameter('idanac', $idanac );

        $query->setParameter('idsem', $idsem);

        $query->setParameter('idspec', $idspecialite);
        $query->setParameter('idses', $idses);

        $query->setParameter('idclass', $idclass);


        $studspec = $query->getResult();


        return $studspec;



    }







    public function levelspecse2($idanac,$semtype)
    {







        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('specialityid', 'specialityid');

        $rsm->addScalarResult('semesterid', 'semesterid');


        $sql = "SELECT DISTINCT specialityid,semesterid FROM `student_examnotes` where acadyearid=:acadyearid and sessionid='SE2' and semesterid in (select id from semester where semtype=:semtype)   ";
        $query = $this->_em->createNativeQuery($sql, $rsm);
        $query->setParameter('acadyearid', $idanac);
        $query->setParameter('semtype', $semtype);



        $studspec = $query->getResult();


        return $studspec;



    }




    public function studsemvalide($idanac,$idsem,$idspecialite,$idniv)
    {




        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('studentid', 'studentid');



        $sql = "SELECT  DISTINCT (student_speciality.studentid)  FROM `student_speciality`  WHERE  student_speciality.specialityid=:idspecialite and student_speciality.acadyearid=:idanac and student_speciality.levelid=:idniv and student_speciality.studentid IN (SELECT  DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib`   WHERE  halfyearly_delib.specialityid=:idspecialite    and halfyearly_delib.semesterid=:idsemestre  and halfyearly_delib.decision='ADMIS' and halfyearly_delib.acadyearid !=:idanac)  ";
        $query = $this->_em->createNativeQuery($sql, $rsm);
        $query->setParameter('idspecialite', $idspecialite);


        $query->setParameter('idanac', $idanac );
        $query->setParameter('idsemestre', $idsem);
        $query->setParameter('idniv', $idniv );

        $nbetudadsem = $query->getResult();

        return $nbetudadsem ;

    }




    public function delibannuel($idanac,$idniv,$idspecialite)
    {







        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('studentid', 'studentid');



        $sql = "SELECT  DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib` INNER JOIN student_speciality on student_speciality.studentid=halfyearly_delib.studentid  WHERE  student_speciality.specialityid=:idspecialite  and student_speciality.acadyearid=:idanac  and student_speciality.levelid=:idniveau";
        $query = $this->_em->createNativeQuery($sql, $rsm);



        $query->setParameter('idanac', $idanac );

        $query->setParameter('idniveau', $idniv);

        $query->setParameter('idspecialite', $idspecialite);





        $etudevaan = $query->getResult();


        return $etudevaan;



    }








    public function delibannuelse2($idanac,$idniv,$idspecialite)
    {







        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('studentid', 'studentid');



        $sql = 'SELECT  DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib`  WHERE  halfyearly_delib.specialityid=:idspecialite  and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid="SE1" and halfyearly_delib.decision="REFUSE"   and halfyearly_delib.studentid IN (select studentid from student_speciality where levelid=:idniveau and acadyearid=:idanac) ';
        $query = $this->_em->createNativeQuery($sql, $rsm);



        $query->setParameter('idanac', $idanac );

        $query->setParameter('idniveau', $idniv);

        $query->setParameter('idspecialite', $idspecialite);





        $etudevaan2 = $query->getResult();


        return $etudevaan2;



    }






}
