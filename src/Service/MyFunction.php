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
use Doctrine\Common\Persistence\ObjectManager;


class MyFunction
{
    private $entityClass;

    private $manager;
    private $idanac;
    private $semtype;

    /**
     * Pagination constructor.
     * @param $manager
     */
    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }


    /**
     * @return EntityManagerInterface
     */
    public function  findsemesterid($levelid,$semtype)
    {



        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('id', 'id');

        $sql = "SELECT id FROM `semester`  WHERE  level_id=:levelid and semtype=:semtype  ";
        $query = $this->manager->createNativeQuery($sql, $rsm);
        $query->setParameter('levelid', $levelid);
        $query->setParameter('semtype', $semtype);



        $seme= $query->getResult();


        foreach ($seme as $sm) {
            $semster= $sm['id'];

        }


        return $semster;


    }







    /**
     *Number of ECU SE1
     * @param $idanac
     * @param $semtype
     * @return mixed
     */
    public function nbecuteachingse1()
    {




        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('nbecu', 'nbecu');

        $sql = "SELECT count(DISTINCT ecuid,ueid,semesterid,classeid) as nbecu FROM `teach_speciality` where acadyearid=:acadyearid and semesterid in (select id from semester where semtype=:semtype)  ";
        $query = $this->manager->createNativeQuery($sql, $rsm);
        $query->setParameter('acadyearid', $this->idanac);
        $query->setParameter('semtype', $this->semtype);

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
    public function nbecuteachingse2()
    {

        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('nbecu', 'nbecu');

        $sql = "SELECT count(DISTINCT ecuid,specialityid,ueid,semesterid) as nbecu FROM `student_examnotes` where acadyearid=:acadyearid and sessionid='SE2' and semesterid in (select id from semester where semtype=:semtype)   ";
        $query = $this->manager->createNativeQuery($sql, $rsm);
        $query->setParameter('acadyearid', $this->idanac);
        $query->setParameter('semtype', $this->semtype);

        $cptecu= $query->getResult();


        foreach ($cptecu as $nt) {

            $nbcptecu= $nt['nbecu'];



        }

        return $nbcptecu;
    }



    /**
     * @return
     */
    public function nbstudentclass($idanacad,$spec,$schoolclass)
    {





              $rsm = new ResultSetMapping();
              $rsm->addScalarResult('nbstudent', 'nbstudent');

              $sql = "SELECT count(  DISTINCT `studentid`) as nbstudent FROM `student_speciality`  WHERE  acadyearid=:acadyearid and specialityid=:specialityid  and school_classeid=:school_classid  ";
              $query = $this->manager->createNativeQuery($sql, $rsm);
              $query->setParameter('acadyearid', $idanacad);
              $query->setParameter('specialityid', $spec);
              $query->setParameter('school_classid', $schoolclass);


              $nbstdcc = $query->getResult();

              foreach ($nbstdcc as $nst) {
                  $nbstudcc= $nst['nbstudent'];

              }

              return $nbstudcc;













    }


    public function nbstudentse2($idanacad,$idspec,$idsem,$idue,$idecu)
    {





            $rsm = new ResultSetMapping();
            $rsm->addScalarResult('nbstudent', 'nbstudent');

            $sql = "SELECT count(  DISTINCT `studentid`) as nbstudent FROM `student_examnotes`  WHERE  acadyearid=:acadyearid and specialityid=:specialityid and typeof_examnotes='EXCC' and sessionid='SE2' and semesterid=:idsem and ecuid=:ecuid and ueid=:ueid ";
            $query = $this->manager->createNativeQuery($sql, $rsm);
            $query->setParameter('acadyearid', $idanacad);
            $query->setParameter('specialityid', $idspec);

            $query->setParameter('idsem', $idsem);
            $query->setParameter('ueid', $idue);
            $query->setParameter('ecuid', $idecu);

            $nbstdex = $query->getResult();

            foreach ($nbstdex as $nstex) {
                $nbstud = $nstex['nbstudent'];

            }



            return $nbstud;
















    }




    public function nbaveragebyschoolclass($idanacad,$idsem,$ueid,$ecuid,$schooclass)
    {


        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('nbaverage', 'nbaverage');
        $sql = "  SELECT  count(average) as nbaverage FROM  student_averages   WHERE   acadyearid=:idanac and  average  BETWEEN 0 AND 20 and semesterid=:idsem and ecuid=:ecuid and ueid=:ueid and typeof_averages='MCC' and valid=1  and studentid in (select studentid from student_speciality where acadyearid=:idanac and school_classeid=:idclasse)   ";
        $query = $this->manager->createNativeQuery($sql, $rsm);
        $query->setParameter('idanac', $idanacad);
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





    public function nbaveragese2($idanacad,$idsem,$ueid,$ecuid,$idspec)
    {




        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('nbaverage', 'nbaverage');
        $sql = " SELECT count(average) as nbaverage FROM student_averages WHERE acadyearid=:idanac and average BETWEEN 0 AND 20 and typeof_averages='MCC' and semesterid=:idsem and ecuid=:ecuid and ueid=:ueid and valid=1 and specialityid=:specialityid and studentid in (SELECT studentid from student_examnotes WHERE acadyearid=:idanac and `specialityid`=:specialityid and `semesterid`=:idsem and `typeof_examnotes`='EXCC' and sessionid='SE2') ";
        $query = $this->manager->createNativeQuery($sql, $rsm);
        $query->setParameter('idanac', $idanacad);
        $query->setParameter('idsem', $idsem);
        $query->setParameter('ueid', $ueid);
        $query->setParameter('ecuid', $ecuid);
        $query->setParameter('specialityid', $idspec);


        $averstuds = $query->getResult();


        foreach ($averstuds as $sex) {
            $averagenb = $sex['nbaverage'];

        }









        return $averagenb;










    }








    /**
     * @return
     */
    public function nbexamnotesbyschoolclass($idanacad,$idsem,$idses,$ueid,$ecuid,$schooclass)
    {


        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('nbexamnotes', 'nbexamnotes');
        $sql = "  SELECT  count(exam_notes) as nbexamnotes FROM  student_examnotes   WHERE   acadyearid=:idanac and  exam_notes  BETWEEN 0 AND 20 and semesterid=:idsem  and sessionid=:idses and ecuid=:ecuid and ueid=:ueid and typeof_examnotes='EXCC'   and studentid in (select studentid from student_speciality where acadyearid=:idanac and school_classeid=:idclasse)   ";
        $query = $this->manager->createNativeQuery($sql, $rsm);
        $query->setParameter('idanac', $idanacad);
        $query->setParameter('idsem', $idsem);
        $query->setParameter('idses', $idses);
        $query->setParameter('ueid', $ueid);
        $query->setParameter('ecuid', $ecuid);
        $query->setParameter('idclasse', $schooclass);

        $idecu = $query->getResult();


        foreach ($idecu as $ne){
            $examnotenb=$ne['nbexamnotes'];
        }

        return $examnotenb;
    }





    public function nbexamnotesse2($idanacad,$idsem,$ueid,$ecuid,$idspec)
    {

        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('nbexamnotes', 'nbexamnotes');
        $sql = "  SELECT   count(exam_notes) as nbexamnotes FROM  student_examnotes   WHERE   acadyearid=:idanac and  exam_notes BETWEEN  0 AND 20 and semesterid=:idsem and sessionid='SE2' and ecuid=:ecuid and ueid=:ueid  and specialityid=:specialityid  and typeof_examnotes='EXCC' ";
        $query = $this->manager->createNativeQuery($sql, $rsm);
        $query->setParameter('idanac', $idanacad);
        $query->setParameter('idsem', $idsem);
        $query->setParameter('ueid', $ueid);
        $query->setParameter('ecuid', $ecuid);
        $query->setParameter('specialityid', $idspec);

        $idecu = $query->getResult();


        foreach ($idecu as $ne){
            $examnotenb=$ne['nbexamnotes'];
        }

        return $examnotenb;
    }




    public function nbecuentryaverages(){



        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('ecuid', 'ecuid');
        $rsm->addScalarResult('classeid', 'classeid');
        $rsm->addScalarResult('ueid', 'ueid');
        $rsm->addScalarResult('semesterid', 'semesterid');

        $sql = "SELECT DISTINCT ecuid,classeid,ueid,semesterid FROM `teach_speciality` where acadyearid=:acadyearid and semesterid in (select id from semester where semtype=:semtype )  ";
        $query = $this->manager->createNativeQuery($sql, $rsm);
        $query->setParameter('acadyearid', $this->idanac);
        $query->setParameter('semtype', $this->semtype);

        $cptecu= $query->getResult();




        $nbecusai=0;
        foreach ($cptecu as $ncc) {


            $classecu = $this->manager->getRepository($this->entityClass);
            $ecuclass=$classecu->findOneById($ncc['classeid']);


            $nbstudsc=$this->nbstudentclass($this->idanac, $ecuclass->getSpecialityid(), $ncc['classeid']);


            $averagenbsc=$this->nbaveragebyschoolclass($this->idanac, $ncc['semesterid'], $ncc['ueid'], $ncc['ecuid'],$ncc['classeid']);



            if($nbstudsc==$averagenbsc){

                $nbecusai=$nbecusai+1;
            }



        }


        return $nbecusai;

    }



    public function nbecuentryaveragesbyspec($anacad,$semster,$spec){



        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('ecuid', 'ecuid');
        $rsm->addScalarResult('classeid', 'classeid');
        $rsm->addScalarResult('ueid', 'ueid');
        $rsm->addScalarResult('semesterid', 'semesterid');


        $sql = "SELECT ecuid,classeid,ueid,semesterid FROM `teach_speciality` where acadyearid=:acadyearid and semesterid =:idsem  and classeid in (select id from school_class where specialityid=:specid and acadyearid=:acadyearid ) ";
        $query = $this->manager->createNativeQuery($sql, $rsm);
        $query->setParameter('acadyearid', $anacad);
        $query->setParameter('idsem', $semster);
        $query->setParameter('specid', $spec);
        $cptecu= $query->getResult();




        $nbecusai=0;
        foreach ($cptecu as $ncc) {


            $classecu = $this->manager->getRepository($this->entityClass);
            $ecuclass=$classecu->findOneById($ncc['classeid']);


            $nbstudsc=$this->nbstudentclass($this->idanac, $ecuclass->getSpecialityid(), $ncc['classeid']);


            $averagenbsc=$this->nbaveragebyschoolclass($this->idanac, $ncc['semesterid'], $ncc['ueid'], $ncc['ecuid'],$ncc['classeid']);



            if($nbstudsc==$averagenbsc){

                $nbecusai=$nbecusai+1;
            }



        }


        return $nbecusai;

    }











    public function nbecuentryaveragesse2(){









        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('ecuid', 'ecuid');
        $rsm->addScalarResult('specialityid', 'specialityid');
        $rsm->addScalarResult('ueid', 'ueid');
        $rsm->addScalarResult('semesterid', 'semesterid');

        $sql = "SELECT  DISTINCT ecuid,specialityid,ueid,semesterid FROM `student_examnotes` where acadyearid=:acadyearid AND sessionid='SE2' and semesterid in (select id from semester where semtype=:semtype)  ";
        $query = $this->manager->createNativeQuery($sql, $rsm);
        $query->setParameter('acadyearid', $this->idanac);
        $query->setParameter('semtype', $this->semtype);


        $cptecu= $query->getResult();




        $nbecusai=0;
        foreach ($cptecu as $ncc) {



            $nbstudsc=$this->nbstudentse2($this->idanac,$ncc['specialityid'],$ncc['semesterid'],$ncc['ueid'], $ncc['ecuid']);


            $averagenbsc=$this->nbaveragese2($this->idanac, $ncc['semesterid'], $ncc['ueid'], $ncc['ecuid'],$ncc['specialityid']);



            if($nbstudsc==$averagenbsc){

                $nbecusai=$nbecusai+1;
            }



        }


        return $nbecusai;

    }







    /**
     * @return
     */
    public function nbecuentryexamnotes($idses)
    {

        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('ecuid', 'ecuid');
        $rsm->addScalarResult('classeid', 'classeid');
        $rsm->addScalarResult('ueid', 'ueid');
        $rsm->addScalarResult('semesterid', 'semesterid');

        $sql = "SELECT ecuid,classeid,ueid,semesterid FROM `teach_speciality` where acadyearid=:acadyearid and semesterid in (select id from semester where semtype=:semtype)  ";
        $query = $this->manager->createNativeQuery($sql, $rsm);
        $query->setParameter('acadyearid', $this->idanac);
        $query->setParameter('semtype', $this->semtype);

        $cptecu= $query->getResult();

        $nbecusaiex=0;
        foreach ($cptecu as $n) {

            $classecuex = $this->manager->getRepository($this->entityClass);
            $ecuclassex=$classecuex->findOneById($n['classeid']);

            $nbstud=$this->nbstudentclass($this->idanac, $ecuclassex->getSpecialityid(), $n['classeid']);


            $examnotenb=$this->nbexamnotesbyschoolclass($this->idanac, $n['semesterid'],$idses, $n['ueid'], $n['ecuid'],$n['classeid']);


            if($nbstud==$examnotenb){

                $nbecusaiex=$nbecusaiex+1;
            }


        }

        return $nbecusaiex;
    }





    /**
     * @return
     */
    public function nbecuentryexamnotesbyspec($anacad,$semster,$spec,$idses)
    {

        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('ecuid', 'ecuid');
        $rsm->addScalarResult('classeid', 'classeid');
        $rsm->addScalarResult('ueid', 'ueid');
        $rsm->addScalarResult('semesterid', 'semesterid');


        $sql = "SELECT ecuid,classeid,ueid,semesterid FROM `teach_speciality` where acadyearid=:acadyearid and semesterid =:idsem  and classeid in (select id from school_class where specialityid=:specid and acadyearid=:acadyearid ) ";
        $query = $this->manager->createNativeQuery($sql, $rsm);
        $query->setParameter('acadyearid', $anacad);
        $query->setParameter('idsem', $semster);
        $query->setParameter('specid', $spec);
        $cptecu= $query->getResult();


        $nbecusaiex=0;
        foreach ($cptecu as $n) {

            $classecuex = $this->manager->getRepository($this->entityClass);
            $ecuclassex=$classecuex->findOneById($n['classeid']);

            $nbstud=$this->nbstudentclass($this->idanac, $ecuclassex->getSpecialityid(), $n['classeid']);


            $examnotenb=$this->nbexamnotesbyschoolclass($this->idanac, $n['semesterid'],$idses, $n['ueid'], $n['ecuid'],$n['classeid']);


            if($nbstud==$examnotenb){

                $nbecusaiex=$nbecusaiex+1;
            }


        }

        return $nbecusaiex;
    }










    /**
     * @return
     */
    public function nbecuentryexamnotesse2()
    {

        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('ecuid', 'ecuid');
        $rsm->addScalarResult('specialityid', 'specialityid');
        $rsm->addScalarResult('ueid', 'ueid');
        $rsm->addScalarResult('semesterid', 'semesterid');

        $sql = "SELECT  DISTINCT ecuid,specialityid,ueid,semesterid FROM `student_examnotes` where acadyearid=:acadyearid AND sessionid='SE2' and semesterid in (select id from semester where semtype=:semtype)  ";
        $query = $this->manager->createNativeQuery($sql, $rsm);
        $query->setParameter('acadyearid', $this->idanac);
        $query->setParameter('semtype', $this->semtype);

        $cptecu= $query->getResult();

        $nbecusaiex=0;
        foreach ($cptecu as $n) {



            $nbstud=$this->nbstudentse2($this->idanac,$n['specialityid'],$n['semesterid'],$n['ueid'], $n['ecuid']);


            $examnotenb=$this->nbexamnotesse2($this->idanac, $n['semesterid'], $n['ueid'], $n['ecuid'], $n['specialityid']);


            if($nbstud==$examnotenb){

                $nbecusaiex=$nbecusaiex+1;
            }


        }

        return $nbecusaiex;
    }



    public function nbeculevelspec($idanac,$idspec,$semster){







        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('nbecuspec', 'nbecuspec');

        $sql = "SELECT  count(`ecuid`)  as nbecuspec FROM `teach_speciality`  WHERE acadyearid=:idanac and semesterid=:idsem  and classeid in (select id from school_class where specialityid=:specid and acadyearid=:idanac ) ";
        $query = $this->manager->createNativeQuery($sql, $rsm);
        $query->setParameter('specid', $idspec);
        $query->setParameter('idanac', $idanac);
        $query->setParameter('idsem', $semster);



        $nbecus= $query->getResult();


        foreach ($nbecus as $nb) {
            $nbecusemspec= $nb['nbecuspec'];

        }




        return  $nbecusemspec;







    }








    /**
     * @return mixed
     */
    public function getIdanac()
    {
        return $this->idanac;
    }

    /**
     * @param mixed $idanac
     * @return MyFunction
     */
    public function setIdanac($idanac)
    {
        $this->idanac = $idanac;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSemtype()
    {
        return $this->semtype;
    }

    /**
     * @param mixed $semtype
     * @return MyFunction
     */
    public function setSemtype($semtype)
    {
        $this->semtype = $semtype;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSpec()
    {
        return $this->spec;
    }

    /**
     * @param mixed $spec
     * @return MyFunction
     */
    public function setSpec($spec)
    {
        $this->spec = $spec;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSchoolclass()
    {
        return $this->schoolclass;
    }

    /**
     * @param mixed $schoolclass
     * @return MyFunction
     */
    public function setSchoolclass($schoolclass)
    {
        $this->schoolclass = $schoolclass;
        return $this;
    }













    /**
     * @return mixed
     */
    public function getEntityClass()
    {
        return $this->entityClass;
    }

    /**
     * @param mixed $entityClass
     */
    public function setEntityClass($entityClass)
    {
        $this->entityClass = $entityClass;
        return $this;
    }

    //end functions

}