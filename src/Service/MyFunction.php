<?php

namespace App\Service;
use App\Repository\SchoolClassRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\DependencyInjection\Container;
use Doctrine\ORM\EntityManagerInterface;

class MyFunction
{
    protected $em;


    // We need to inject this variables later.
    public function __construct(EntityManager $em)
    {
        $this->em = $em;

    }


    /**
     *Number of ECU SE1
     * @param $idanac
     * @param $semtype
     * @return mixed
     */
    public function nbecuteachingse1($idanac, $semtype)
    {




        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('nbecu', 'nbecu');

        $sql = "SELECT count(DISTINCT ecuid,ueid,semesterid,classeid) as nbecu FROM `teach_speciality` where acadyearid=:acadyearid and semesterid in (select id from semester where semtype=:semtype)  ";
        $query = $this->em->createNativeQuery($sql, $rsm);
        $query->setParameter('acadyearid', $idanac);
        $query->setParameter('semtype', $semtype);

        $cptecu= $query->getResult();


        foreach ($cptecu as $nt) {

            $nbcptecu= $nt['nbecu'];



        }

        return $nbcptecu;



    }


    /**
     * NUMBER OF ECU SE2
     * @param $idanac
     * @param $semtype
     * @return mixed
     */
    public function nbecuteachingse2($idanac, $semtype)
    {






        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('nbecu', 'nbecu');


        $sql = "SELECT count(DISTINCT ecuid,specialityid,ueid,semesterid) as nbecu FROM `student_examnotes` where acadyearid=:acadyearid and sessionid='SE2' and semesterid in (select id from semester where semtype=:semtype)   ";
        $query = $this->em->createNativeQuery($sql, $rsm);
        $query->setParameter('acadyearid', $idanac);
        $query->setParameter('semtype', $semtype);

        $cptecu= $query->getResult();


        foreach ($cptecu as $nt) {

            $nbcptecu= $nt['nbecu'];



        }

        return $nbcptecu;
    }


    /**
     * @return
     */
    public function nbstudentclass($idanac, $spec, $schoolclass)
    {




        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('nbstudent', 'nbstudent');

        $sql = "SELECT count(  DISTINCT `studentid`) as nbstudent FROM `student_speciality`  WHERE  acadyearid=:acadyearid and specialityid=:specialityid  and school_classeid=:school_classid  ";
        $query = $this->em->createNativeQuery($sql, $rsm);
        $query->setParameter('acadyearid', $idanac);
        $query->setParameter('specialityid', $spec);
        $query->setParameter('school_classid', $schoolclass);


        $nbstdcc = $query->getResult();

        foreach ($nbstdcc as $nst) {
            $nbstudcc= $nst['nbstudent'];

        }

        return $nbstudcc;
    }


    /**
     * @return
     */
    public function nbaveragebyschoolclass($idanac,$idsem,$ueid,$ecuid,$schooclass)
    {


        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('nbaverage', 'nbaverage');
        $sql = "  SELECT  count(average) as nbaverage FROM  student_averages   WHERE   acadyearid=:idanac and  average  BETWEEN 0 AND 20 and semesterid=:idsem and ecuid=:ecuid and ueid=:ueid and typeof_averages='MCC' and valid=1  and studentid in (select studentid from student_speciality where acadyearid=:idanac and school_classeid=:idclasse)   ";
        $query = $this->em->createNativeQuery($sql, $rsm);
        $query->setParameter('idanac', $idanac);
        $query->setParameter('idsem', $idsem);
        $query->setParameter('ueid', $ueid);
        $query->setParameter('ecuid', $ecuid);
        $query->setParameter('idclasse', $schooclass);

        $idecucc = $query->getResult();


        foreach ($idecucc as $necc){
            $averagenb=$necc['nbaverage'];
        }


        return $averagenb;

    }




    /**
     * @return
     */
    public function nbexamnotesbyschoolclass($idanac,$idsem,$ueid,$ecuid,$schooclass)
    {


        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('nbaverage', 'nbaverage');
        $sql = "  SELECT  count(average) as nbaverage FROM  student_averages   WHERE   acadyearid=:idanac and  average  BETWEEN 0 AND 20 and semesterid=:idsem and ecuid=:ecuid and ueid=:ueid and typeof_averages='EXCC'   and studentid in (select studentid from student_speciality where acadyearid=:idanac and school_classeid=:idclasse)   ";
        $query = $this->em->createNativeQuery($sql, $rsm);
        $query->setParameter('idanac', $idanac);
        $query->setParameter('idsem', $idsem);
        $query->setParameter('ueid', $ueid);
        $query->setParameter('ecuid', $ecuid);
        $query->setParameter('idclasse', $schooclass);

        $idecu = $query->getResult();


        foreach ($idecu as $ne){
            $examnotenb=$ne['nbexamnotes'];
        }

   return $examnotenb;
    }








    public function nbecuentryaverages($idanac, $semtype){











        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('ecuid', 'ecuid');
        $rsm->addScalarResult('classeid', 'classeid');
        $rsm->addScalarResult('ueid', 'ueid');
        $rsm->addScalarResult('semesterid', 'semesterid');

        $sql = "SELECT DISTINCT ecuid,classeid,ueid,semesterid FROM `teach_speciality` where acadyearid=:acadyearid and semesterid in (select id from semester where semtype=:semtype )  ";
        $query = $this->em->createNativeQuery($sql, $rsm);
        $query->setParameter('acadyearid', $idanac);
        $query->setParameter('semtype', $semtype);

        $cptecu= $query->getResult();

        $nbecusai=0;
        foreach ($cptecu as $ncc) {




            $classecu = SchoolClassRepository::class->findOneById($ncc['classeid']);






            $nbstudsc=$this->nbstudentclass($idanac, $classecu->getSpecialityid(), $ncc['classeid']);


            $averagenbsc=$this->nbaveragebyschoolclass($idanac, $ncc['semesterid'], $ncc['ueid'], $ncc['ecuid'],$ncc['classeid']);



            if($nbstudsc==$averagenbsc){

                $nbecusai=$nbecusai+1;
            }



        }


        return $nbecusai;

    }


    /**
     * @return
     */
    public function nbecuentryexamnotes($idanac, $semtype)
    {




        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('ecuid', 'ecuid');
        $rsm->addScalarResult('classeid', 'classeid');
        $rsm->addScalarResult('ueid', 'ueid');
        $rsm->addScalarResult('semesterid', 'semesterid');

        $sql = "SELECT ecuid,classeid,ueid,semesterid FROM `teach_speciality` where acadyearid=:acadyearid and semesterid in (select id from semester where semtype=:semtype)  ";
        $query = $this->em->createNativeQuery($sql, $rsm);
        $query->setParameter('acadyearid', $idanac);
        $query->setParameter('semtype', $semtype);

        $cptecu= $query->getResult();

        $nbecusaiex=0;
        foreach ($cptecu as $n) {



            $classecu = SchoolClassRepository::class->findOneById($n['classeid']);



            $nbstud=$this->nbstudentclass($idanac, $classecu->getSpecialityid(), $n['classeid']);


            $examnotenb=$this->nbaveragebyschoolclass($idanac, $n['semesterid'], $n['ueid'], $n['ecuid'],$n['classeid']);


            if($nbstud==$examnotenb){

                $nbecusaiex=$nbecusaiex+1;
            }


        }



        return $nbecusaiex;
    }





    //end functions

}