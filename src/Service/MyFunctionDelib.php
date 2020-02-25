<?php

namespace App\Service;
use App\Entity\EcuSpeciality;
use App\Entity\StudentAverages;
use App\Entity\StudentExamNotes;
use App\Entity\UeSpeciality;
use App\Entity\UeValidated;
use App\Repository\EcuSpecialityRepository;
use App\Repository\SchoolClassRepository;
use App\Repository\StudentExamNotesRepository;
use App\Repository\UeSpecialityRepository;
use App\Repository\UeValidatedRepository;
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


class MyFunctionDelib
{


    private $manager;





    /**
     * Pagination constructor.
     * @param $manager
     */
    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }



    public function averagecc($studentid,$specialityid,$semesterid,$ueid,$ecuid,$acadyearid)
    {



        $aver1 = $this->manager->getRepository(StudentAverages::class)->findOneBy(array('studentid' => $studentid, 'acadyearid' => $acadyearid, 'specialityid' => $specialityid, 'ueid' => $ueid, 'ecuid' => $ecuid, 'semesterid' => $semesterid, 'typeofaverages' => 'MCC'));
        if ($aver1 != NULL) {

            if ($aver1->getAverage() == 99) {

                $avercc = "NC";


            } else {

                $avercc = number_format($aver1->getAverage(),2);

            }

        } else {
            $avercc = "";
        }

        return $avercc;



    }



    public function averagecctp($studentid,$specialityid,$semesterid,$ueid,$ecuid,$acadyearid)
    {

        $aver1 = $this->manager->getRepository(StudentAverages::class)->findOneBy(array('studentid' => $studentid, 'acadyearid' => $acadyearid, 'specialityid' => $specialityid, 'ueid' => $ueid, 'ecuid' => $ecuid, 'semesterid' => $semesterid, 'typeofaverages' => 'MTP'));
        if ($aver1 != NULL) {

            if ($aver1->getAverage() == 99) {

                $avercctp = "NC";


            } else {

                $avercctp = number_format($aver1->getAverage(),2);

            }

        } else {
            $avercctp = "";
        }

        return $avercctp;







    }






    public function examnotes($studentid,$specialityid,$semesterid,$sessionid,$ueid,$ecuid,$acadyearid)
    {



        $aver2 = $this->manager->getRepository(StudentExamNotes::class)->findOneBy(array('studentid' => $studentid, 'acadyearid' => $acadyearid, 'specialityid' => $specialityid, 'ueid' => $ueid, 'ecuid' => $ecuid, 'semesterid' => $semesterid, 'sessionid' => $sessionid, 'typeofexamnotes' => 'EXCC'));
        if ($aver2 != NULL) {

            if ($aver2->getExamnotes() == 99) {

                $noteex = "NC";


            } else {

                $noteex = $aver2->getExamnotes();

            }

        } else {
            $noteex = "";
        }


        return $noteex;

    }



    public function examnotestp($studentid,$specialityid,$semesterid,$sessionid,$ueid,$ecuid,$acadyearid)
    {



        $aver2 = $this->manager->getRepository(StudentExamNotes::class)->findOneBy(array('studentid' => $studentid, 'acadyearid' => $acadyearid, 'specialityid' => $specialityid, 'ueid' => $ueid, 'ecuid' => $ecuid, 'semesterid' => $semesterid, 'sessionid' => $sessionid, 'typeofexamnotes' => 'EXTP'));
        if ($aver2 != NULL) {

            if ($aver2->getExamnotes() == 99) {

                $noteextp = "NC";


            } else {

                $noteextp = $aver2->getExamnotes();

            }

        } else {
            $noteextp = "";
        }


        return $noteextp;


    }





    public function ecuaverage($studentid, $idspec, $idecu, $idsem, $idsession, $idanac)
    {



        $spececusem = $this->manager->getRepository(EcuSpeciality::class)->findBy(array('specialityid' => $idspec, 'ecuid' => $idecu, 'semester' => $idsem, 'acadyearid' => $idanac));

        foreach ($spececusem as $speusem) {
            $iduespeusem = $speusem->getUeid();



            $uevalid = $this->manager->getRepository(UeValidated::class)->findOneBy(array('studentid' => $studentid, 'specialityid' => $idspec, 'semesterid' =>$idsem, 'ueid' => $iduespeusem));



            if(!$uevalid){


                if($idsession=='SE1'){





                    $averagcc=$this->averagecc($studentid,$idspec,$idsem,$iduespeusem,$idecu,$idanac);
                    $notexam=$this->examnotes($studentid,$idspec,$idsem,$idsession,$iduespeusem,$idecu,$idanac);




                    if( $averagcc==""){
                        $aversem = "";
                    }else{

                        $aversem = number_format((4 * $averagcc + 6 * $notexam) / 10, 2);
                    }






                    $averagcctp=$this->averagecctp($studentid,$idspec,$idsem,$iduespeusem,$idecu,$idanac);
                    $notexamtp=$this->examnotestp($studentid,$idspec,$idsem,$idsession,$iduespeusem,$idecu,$idanac);




                    if( $averagcctp==""){
                        $aversemtp = "";
                    }else{

                        $aversemtp = number_format((4 * $averagcctp + 6 * $notexamtp) / 10, 2);
                        //$aversemtp = number_format((4 * $averagcctp + 6 * $notexamtp) / 10, 2);
                    }















                    if( $aversemtp==""){
                        $ecuaverage=$aversem ;
                    }else{
                        $ecuaverage=number_format((0.6*$aversem + 0.4*$aversemtp),2);
                    }




                    return $ecuaverage;

                }


                else{


                    $averagcc=$this->averagecc($studentid,$idspec,$idsem,$iduespeusem,$idecu,$idanac);




                    $etudiant101 = $this->manager->getRepository(StudentExamNotes::class)->findOneBy(array('studentid' => $studentid, 'specialityid' => $idspec, 'ecuid' => $idecu, 'semesterid' => $idsem, 'sessionid' => $idsession, 'typeofexamnotes' => 'EXCC', 'acadyearid' => $idanac));
                    if ($etudiant101 != NULL) {

                        if ($etudiant101->getExamnotes() == 99) {

                            $moyex = "NC";


                        } else {

                            $moyex = $etudiant101->getExamnotes();

                        }

                    } else {
                        $moyex = "";
                    }






                    if( $averagcc==""){
                        $aversem = "";
                    }else{
                        $aversem=number_format((4*$averagcc + 6*$moyex)/10,2);
                    }





                    $averagcctp=$this->averagecctp($studentid,$idspec,$idsem,$iduespeusem,$idecu,$idanac);



                    $etudiant103 =$this->manager->getRepository(StudentExamNotes::class)->findOneBy(array('studentid' => $studentid, 'specialityid' => $idspec, 'ecuid' => $idecu, 'semesterid' => $idsem, 'sessionid' => $idsession, 'typeofexamnotes' => 'EXTP', 'acadyearid' => $idanac));
                    if($etudiant103!=NULL){

                        if($etudiant103->getExamnotes()==99){

                            $moyextp="NC";


                        }else{

                            $moyextp=$etudiant103->getExamnotes();

                        }

                    }else{
                        $moyextp="";
                    }



                    if( $averagcctp==""){
                        $aversemtp = "";
                    }else{
                        $aversemtp=number_format((4*$averagcctp + 6*$moyextp)/10,2);
                    }











                    if($aversemtp==""){

                        if($etudiant101->getEntryuser()=='admin'){
                            $ecuaverage=$aversem;

                        }else{


                            $ecuaverage1=$aversem ;
                            if($ecuaverage1 < $moyex){
                                $ecuaverage=$moyex;
                            }else{
                                $ecuaverage=$ecuaverage1;
                            }

                        }

                    }else{
                        if($etudiant101->getEntryuser()=='admin'){
                            $m1=$aversem;

                        }else{

                            $ecuaverage1=$aversem ;
                            if($ecuaverage1 < $moyex){

                                $m1=$moyex;

                            }else{
                                $m1=$ecuaverage1;
                            }

                        }

                        if($etudiant103->getEntryuser()=='admin'){
                            $m2=$aversemtp;

                        }else{


                            $ecuaverage2=$aversemtp ;
                            if($ecuaverage2 < $moyextp){
                                $m2=$moyextp;

                            }else{
                                $m2=$ecuaverage2;
                            }




                        }





                        $ecuaverage=number_format((0.6*$m1+0.4*$m2),2);

                    }















                    return $ecuaverage;















                }



            }
            else{


                if($uevalid->getSessionid()=='SE2'){


                    $averagcc=$this->averagecc($studentid,$idspec,$uevalid->getSemesterid(),$iduespeusem,$idecu,$uevalid->getAcadyearid());







                    $etudiant101 = $this->manager->getRepository(StudentExamNotes::class)->findOneBy(array(
                        'studentid' => $studentid, 'specialityid' => $idspec, 'ecuid' => $idecu, 'semesterid' => $uevalid->getSemesterid(), 'sessionid' => $uevalid->getSessionid(), 'typeofexamnotes' => 'EXCC', 'acadyearid' => $uevalid->getAcadyearid()
                    ));
                    if ($etudiant101 != NULL) {

                        if ($etudiant101->getExamnotes() == 99) {

                            $moyex = "NC";


                        } else {

                            $moyex = $etudiant101->getExamnotes();

                        }

                    } else {
                        $moyex = "";
                    }

                    if($uevalid->getAcadyearid()=='2015-2016'){

                        $aversem=number_format($moyex,2);

                    }else{
                        $aversem=number_format((4*$averagcc + 6*$moyex)/10,2);
                    }












                    $averagcctp=$this->averagecctp($studentid,$idspec,$uevalid->getSemesterid(),$iduespeusem,$idecu,$uevalid->getAcadyearid());






                    $etudiant103 =$this->manager->getRepository(StudentExamNotes::class)->findOneBy(array('studentid' => $studentid, 'specialityid' => $idspec, 'ecuid' => $idecu, 'semesterid' => $uevalid->getSemesterid(), 'sessionid' => $uevalid->getSessionid(), 'typeofexamnotes' => 'EXTP', 'acadyearid' => $uevalid->getAcadyearid()));
                    if($etudiant103!=NULL){

                        if($etudiant103->getExamnotes()==99){

                            $moyextp="NC";


                        }else{

                            $moyextp=$etudiant103->getExamnotes();

                        }

                    }else{
                        $moyextp="";
                    }


                    if($averagcctp==""){

                        $aversemtp="";

                    }else{
                        $aversemtp=number_format((4*$averagcctp + 6*$moyextp)/10,2);
                    }













                    if($aversemtp==""){

                        if($etudiant101->getEntryuser()=='admin'){
                            $ecuaverage=$aversem;

                        }else{


                            $ecuaverage1=$aversem ;
                            if($ecuaverage1 < $moyex){
                                $ecuaverage=$moyex;
                            }else{
                                $ecuaverage=$ecuaverage1;
                            }

                        }

                    }else{
                        if($etudiant101->getEntryuser()=='admin'){
                            $m1=$aversem;

                        }else{

                            $ecuaverage1=$aversem ;
                            if($ecuaverage1 < $moyex){

                                $m1=$moyex;

                            }else{
                                $m1=$ecuaverage1;
                            }

                        }

                        if($etudiant103->getEntryuser()=='admin'){
                            $m2=$aversemtp;

                        }else{


                            $ecuaverage2=$aversemtp ;
                            if($ecuaverage2 < $moyextp){
                                $m2=$moyextp;

                            }else{
                                $m2=$ecuaverage2;
                            }




                        }





                        $ecuaverage=number_format((0.6*$m1+0.4*$m2),2);

                    }




                    return $ecuaverage;







                }
                else{


                    $averagcc=$this->averagecc($studentid,$idspec,$uevalid->getSemesterid(),$iduespeusem,$idecu,$uevalid->getAcadyearid());





                    $etudiant101 = $this->manager->getRepository(StudentExamNotes::class)->findOneBy(array(
                        'studentid' => $studentid, 'specialityid' => $idspec, 'ecuid' => $idecu, 'semesterid' => $uevalid->getSemesterid(), 'sessionid' => $uevalid->getSessionid(), 'typeofexamnotes' => 'EXCC', 'acadyearid' => $uevalid->getAcadyearid()
                    ));
                    if ($etudiant101 != NULL) {

                        if ($etudiant101->getExamnotes() == 99) {

                            $moyex = "NC";


                        } else {

                            $moyex = $etudiant101->getExamnotes();

                        }

                    } else {
                        $moyex = "";
                    }


                    $aversem=number_format((4*$averagcc + 6*$moyex)/10,2);








                    $averagcctp=$this->averagecctp($studentid,$idspec,$uevalid->getSemesterid(),$iduespeusem,$idecu,$uevalid->getAcadyearid());








                    $etudiant101 = $this->manager->getRepository(StudentExamNotes::class)->findOneBy(array(
                        'studentid' => $studentid, 'specialityid' => $idspec, 'ecuid' => $idecu, 'semesterid' => $uevalid->getSemesterid(), 'sessionid' => $uevalid->getSessionid(), 'typeofexamnotes' => 'EXTP', 'acadyearid' => $uevalid->getAcadyearid()
                    ));
                    if ($etudiant101 != NULL) {

                        if ($etudiant101->getExamnotes() == 99) {

                            $moyextp = "NC";


                        } else {

                            $moyextp = $etudiant101->getExamnotes();

                        }

                    } else {
                        $moyextp = "";
                    }



                    if( $averagcctp==""){
                        $aversemtp="" ;
                    }else{
                        $aversemtp=number_format((4*$averagcctp + 6*$moyextp)/10,2);
                    }





                    if($aversemtp==""){
                        $ecuaverage=$aversem ;
                    }else{
                        $ecuaverage=number_format((0.6*$aversem + 0.4*$aversemtp),2);
                    }




                    return $ecuaverage;








                }








            }


























        }}




    public function creditue($idspec, $idue, $idsem, $idanac)
    {




        $credit = $this->manager->getRepository(UeSpeciality::class)->findOneBy(array('specialityid' => $idspec, 'ueid' => $idue, 'semester' => $idsem, 'acadyearid' => $idanac));

        $uecredit = $credit->getCreditvalue();


        return $uecredit;


    }









    public function ueaverage($studentid, $idspec, $idue, $idsem, $idsession, $idanac)
    {




        $spececusem = $this->manager->getRepository(EcuSpeciality::class)->findBy(array('specialityid' => $idspec, 'ueid' => $idue, 'semester' => $idsem, 'acadyearid' => $idanac));
        $moyennetpondereecu = 0;
        foreach ($spececusem as $speusem) {
            $idecuspeusem = $speusem->getEcuid();





            $moyennetpondereecuval = number_format($moyennetpondereecu + ($this->ecuaverage($studentid, $idspec,$idecuspeusem, $idsem, $idsession, $idanac) * $speusem->getCreditvalue()), 2);


            if($moyennetpondereecuval ){

                $moyennetpondereecu  = $moyennetpondereecuval ;

            }else{

                $moyennetpondereecu = "";


            }






        }
        $ueaverage = number_format(($moyennetpondereecu / $this->creditue($idspec, $idue, $idsem, $idanac)), 2);


        return $ueaverage;
    }





    public function sumcredit($idspec,$idsem,$idanac)
    {





        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('somcredit', 'somcredit');


        $sql = "SELECT SUM(creditvalue) as somcredit FROM `ue_speciality`   WHERE specialityid_id=:idspec and semester_id=:idsem and acadyearid=:idanac";
        $query = $this->manager->createNativeQuery($sql, $rsm);

        $query->setParameter('idspec', $idspec);
        $query->setParameter('idsem', $idsem);


        $query->setParameter('idanac', $idanac);

        $somcredit = $query->getResult();


        foreach ($somcredit as $ne) {


            $sumcredit = $ne['somcredit'];



        }


        return $sumcredit;

    }


    public function ecusemaverage($studentid, $idspec, $idsem, $idsession, $idanac)
    {




        $spececusem = $this->manager->getRepository(EcuSpeciality::class)->findBy(array('specialityid' => $idspec, 'semester' => $idsem, 'acadyearid' => $idanac));
        $moyennetsemestrepondere = 0;
        foreach ($spececusem as $speusem) {
            $idecusem = $speusem->getEcuid();




            $moyennetsemestrepondere = number_format(($moyennetsemestrepondere + ($this->ecuaverage($studentid, $idspec, $idecusem, $idsem, $idsession, $idanac) * $speusem->getCreditvalue())), 2);














        }



        $moyennesemestre = number_format(($moyennetsemestrepondere /$this->sumcredit($idspec,$idsem,$idanac)), 2);

        return $moyennesemestre;

    }



    public function sumcreditmajor($idspec,$idsem,$idanac)
    {





        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('somcreditmajor', 'somcreditmajor');


        $sql = "SELECT SUM(creditvalue) as somcreditmajor FROM `ue_speciality`   WHERE specialityid_id=:idspec and semester_id=:idsem and acadyearid=:idanac and creditvalue BETWEEN 4 AND 6 ";
        $query = $this->manager->createNativeQuery($sql, $rsm);

        $query->setParameter('idspec', $idspec);
        $query->setParameter('idsem', $idsem);


        $query->setParameter('idanac', $idanac);

        $somcreditmajor = $query->getResult();


        foreach ($somcreditmajor as $ne) {


            $sumcreditmajor = $ne['somcreditmajor'];



        }


        return $sumcreditmajor;

    }

    public function sumcreditminor($idspec,$idsem,$idanac)
    {





        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('somcreditminor', 'somcreditminor');


        $sql = "SELECT SUM(creditvalue) as somcreditminor FROM `ue_speciality`   WHERE specialityid_id=:idspec and semester_id=:idsem and acadyearid=:idanac and creditvalue BETWEEN 2 AND 3 ";
        $query = $this->manager->createNativeQuery($sql, $rsm);

        $query->setParameter('idspec', $idspec);
        $query->setParameter('idsem', $idsem);


        $query->setParameter('idanac', $idanac);

        $somcreditminor = $query->getResult();


        foreach ($somcreditminor as $ne) {


            $sumcreditminor = $ne['somcreditminor'];



        }


        return $sumcreditminor;

    }



    public function uemajorsemaverage($studentid, $idspec,  $idsem, $idsession, $idanac)
    {


        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('ueid_id', 'ueid_id');
        $rsm->addScalarResult('creditvalue', 'creditvalue');
        $sql = "SELECT  DISTINCT ueid_id,creditvalue FROM `ue_speciality`   WHERE  specialityid_id=:idspec  and  acadyearid=:idanac and creditvalue BETWEEN 4 AND 6 and semester_id=:idsem   ";
        $query = $this->manager->createNativeQuery($sql, $rsm);
        $query->setParameter('idanac', $idanac );

        $query->setParameter('idsem', $idsem);

        $query->setParameter('idspec', $idspec);





        $idue = $query->getResult();
        $moyennemajorpondere = 0;

        foreach($idue as $listidue){




            $moyennemajorpondere = number_format(($moyennemajorpondere + ($this->ueaverage($studentid, $idspec, $listidue['ueid_id'], $idsem, $idsession, $idanac)* $listidue['creditvalue'])), 2);



        }
        $moyennesemestremajor = number_format(($moyennemajorpondere /$this->sumcreditmajor($idspec,$idsem,$idanac)), 2);

        return $moyennesemestremajor;





    }






    public function ueminorsemaverage($studentid, $idspec,  $idsem, $idsession, $idanac)
    {


        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('ueid_id', 'ueid_id');
        $rsm->addScalarResult('creditvalue', 'creditvalue');
        $sql = "SELECT  DISTINCT ueid_id,creditvalue FROM `ue_speciality`   WHERE  specialityid_id=:idspec  and  acadyearid=:idanac and creditvalue BETWEEN 2 AND 3 and semester_id=:idsem   ";
        $query = $this->manager->createNativeQuery($sql, $rsm);
        $query->setParameter('idanac', $idanac );

        $query->setParameter('idsem', $idsem);

        $query->setParameter('idspec', $idspec);





        $idue = $query->getResult();
        $moyenneminorpondere = 0;

        foreach($idue as $listidue){




            $moyenneminorpondere = number_format(($moyenneminorpondere + ($this->ueaverage($studentid, $idspec, $listidue['ueid_id'], $idsem, $idsession, $idanac)* $listidue['creditvalue'])), 2);



        }
        $moyennesemestreminor = number_format(($moyenneminorpondere /$this->sumcreditminor($idspec,$idsem,$idanac)), 2);

        return $moyennesemestreminor;





    }






    public function creditsvalide($studentid,$idsem,$idue,$idanac,$idspec,$idsession)
    {



        if($idanac=='2019-2020'){


            if ($this->ueaverage($studentid, $idspec, $idue, $idsem, $idsession, $idanac) >= 10) {

                $creditvalide = $this->creditue($idspec, $idue, $idsem, $idanac);
            }

            else {


                $uetype = $this->manager->getRepository(UeSpeciality::class)->findOneBy(array('specialityid' => $idspec, 'semester' => $idsem, 'acadyearid' => $idanac, 'ueid' => $idue));




                if ($uetype->getCreditvalue() >= 4 and $uetype->getCreditvalue() <= 6 and $this->uemajorsemaverage($studentid, $idspec,  $idsem, $idsession, $idanac) >=10 ) {


                    $rsm = new ResultSetMapping();

                    $rsm->addScalarResult('ueid_id', 'ueid_id');
                    $rsm->addScalarResult('creditvalue', 'creditvalue');
                    $sql = "SELECT  DISTINCT ueid_id,creditvalue FROM `ue_speciality`   WHERE  specialityid_id=:idspec  and  acadyearid=:idanac and creditvalue BETWEEN 4 AND 6 and semester_id=:idsem   ";
                    $query = $this->manager->createNativeQuery($sql, $rsm);
                    $query->setParameter('idanac', $idanac);

                    $query->setParameter('idsem', $idsem);

                    $query->setParameter('idspec', $idspec);


                    $specue = $query->getResult();
                    $credit = 1;

                    foreach ($specue as $spue) {


                        $spececucred = $this->manager->getRepository(EcuSpeciality::class)->findBy(array('specialityid' => $idspec, 'ueid' => $spue['ueid_id'], 'semester' => $idsem, 'acadyearid' => $idanac));
                        $moyennetotalponderec = 0;

                        foreach ($spececucred as $speucred) {


                            $idecucr = $speucred->getEcuid();

                            $moyennetotalponderec = $moyennetotalponderec + ($this->ecuaverage($studentid, $idspec, $idecucr, $idsem, $idsession, $idanac) * $speucred->getCreditvalue());


                        }

                        $moyenneuecreduev = number_format(($moyennetotalponderec / $spue['creditvalue']), 2);


                        if ($moyenneuecreduev < 7) {

                            $credit = 0 * $credit;

                        } else {

                            $credit = 1 * $credit;

                        }

                    }


                    if ($credit == 0) {


                        $creditvalide = 0;


                    } else {


                        $creditvalide = $this->creditue($idspec, $idue, $idsem, $idanac);


                    }


                }




                elseif($uetype->getCreditvalue() >= 2 and $uetype->getCreditvalue() <= 3 and $this->ueminorsemaverage($studentid, $idspec,  $idsem, $idsession, $idanac) >=10){


                    $rsm = new ResultSetMapping();

                    $rsm->addScalarResult('ueid_id', 'ueid_id');
                    $rsm->addScalarResult('creditvalue', 'creditvalue');
                    $sql = "SELECT  DISTINCT ueid_id,creditvalue FROM `ue_speciality`   WHERE  specialityid_id=:idspec  and  acadyearid=:idanac and creditvalue BETWEEN 2 AND 3 and semester_id=:idsem   ";
                    $query = $this->manager->createNativeQuery($sql, $rsm);
                    $query->setParameter('idanac', $idanac);

                    $query->setParameter('idsem', $idsem);

                    $query->setParameter('idspec', $idspec);


                    $specue = $query->getResult();
                    $credit = 1;

                    foreach ($specue as $spue) {


                        $spececucred = $this->manager->getRepository(EcuSpeciality::class)->findBy(array('specialityid' => $idspec, 'ueid' => $spue['ueid_id'], 'semester' => $idsem, 'acadyearid' => $idanac));
                        $moyennetotalponderec = 0;

                        foreach ($spececucred as $speucred) {


                            $idecucr = $speucred->getEcuid();

                            $moyennetotalponderec = $moyennetotalponderec + ($this->ecuaverage($studentid, $idspec, $idecucr, $idsem, $idsession, $idanac) * $speucred->getCreditvalue());


                        }

                        $moyenneuecreduev = number_format(($moyennetotalponderec / $spue['creditvalue']), 2);


                        if ($moyenneuecreduev < 7) {

                            $credit = 0 * $credit;

                        } else {

                            $credit = 1 * $credit;

                        }

                    }


                    if ($credit == 0) {


                        $creditvalide = 0;


                    } else {


                        $creditvalide = $this->creditue($idspec, $idue, $idsem, $idanac);


                    }



                }
                else {

                    $creditvalide= 0;
                }

            }








            return $creditvalide;


        }
        else {



            if ($this->ueaverage($studentid, $idspec, $idue, $idsem, $idsession, $idanac) >= 10) {

                $creditvalide = $this->creditue($idspec, $idue, $idsem, $idanac);


            }

            elseif ($this->ecusemaverage($studentid, $idspec, $idsem, $idsession, $idanac) >= 10) {


                $specue=$this->manager->getRepository(UeSpeciality::class)->findBy(array('specialityid' => $idspec,'semester' => $idsem,'acadyearid'=>$idanac));
                $credit=1;
                foreach($specue as $spue){
                    $iduecr= $spue->getUeid();


                    $spececucred =$this->manager->getRepository(EcuSpeciality::class)->findBy(array('specialityid' => $idspec,'ueid' => $iduecr,'semester' => $idsem,'acadyearid'=>$idanac));
                    $moyennetotalponderec=0;

                    foreach($spececucred as $speucred){


                        $idecucr= $speucred->getEcuid();

                        $moyennetotalponderec=$moyennetotalponderec + ($this->ecuaverage($studentid, $idspec, $idecucr, $idsem, $idsession, $idanac) * $speucred->getCreditvalue());






                    }

                    $moyenneuecreduev=number_format(($moyennetotalponderec/$spue->getCreditvalue()),2);



                    if($moyenneuecreduev < 7){

                        $credit=0*$credit;

                    }else{

                        $credit=1*$credit;

                    }



                }


                if($credit==0){


                    $creditvalide=0;



                }else{


                    $creditvalide=  $this->creditue($idspec, $idue, $idsem, $idanac);



                }


            }





            else {

                $creditvalide= 0;
            }



            return $creditvalide;





        }


    }




    public function tcredit($studentid, $idspec, $idsem, $idses, $idanac)
    {


        if($idanac=='2019-2020'){


            $specue = $this->manager->getRepository(UeSpeciality::class)->findBy(array('specialityid' => $idspec, 'semester' => $idsem, 'acadyearid' => $idanac));
            $tcredit = 0;
            foreach ($specue as $spue) {

                $iduespue = $spue->getUeid();

                if ($this->ueaverage($studentid, $idspec, $iduespue, $idsem, $idses, $idanac) >= 10) {
                    $tcredit = $tcredit + $spue->getCreditvalue();
                }
                else{


                    if($spue->getCreditvalue() >= 4 and $spue->getCreditvalue() <= 6 and $this->uemajorsemaverage($studentid, $idspec,  $idsem, $idses, $idanac) >=10){


                        $rsm = new ResultSetMapping();

                        $rsm->addScalarResult('ueid_id', 'ueid_id');
                        $rsm->addScalarResult('creditvalue', 'creditvalue');
                        $sql = "SELECT  DISTINCT ueid_id,creditvalue FROM `ue_speciality`   WHERE  specialityid_id=:idspec  and  acadyearid=:idanac and creditvalue BETWEEN 4 AND 6 and semester_id=:idsem   ";
                        $query = $this->manager->createNativeQuery($sql, $rsm);
                        $query->setParameter('idanac', $idanac);

                        $query->setParameter('idsem', $idsem);

                        $query->setParameter('idspec', $idspec);


                        $spmaj = $query->getResult();
                        $creditv = 1;

                        foreach ($spmaj as $uemajor) {


                            $spececucred = $this->manager->getRepository(EcuSpeciality::class)->findBy(array('specialityid' => $idspec, 'ueid' => $uemajor['ueid_id'], 'semester' => $idsem, 'acadyearid' => $idanac));
                            $moyennetotalponderec = 0;

                            foreach ($spececucred as $speucred) {


                                $idecucr = $speucred->getEcuid();

                                $moyennetotalponderec = $moyennetotalponderec + ($this->ecuaverage($studentid, $idspec, $idecucr, $idsem, $idses, $idanac) * $speucred->getCreditvalue());


                            }

                            $moyenneuecreduev = number_format(($moyennetotalponderec / $uemajor['creditvalue']), 2);


                            if ($moyenneuecreduev < 7) {

                                $creditv = 0 * $creditv;

                            } else {

                                $creditv = 1 * $creditv;

                            }

                        }


                        if ($creditv == 0) {


                            $tcredit = $tcredit + 0;


                        } else {


                            $tcredit = $tcredit + $spue->getCreditvalue();


                        }












                    }
                    elseif($spue->getCreditvalue() >= 2 and $spue->getCreditvalue() <= 3 and $this->ueminorsemaverage($studentid, $idspec,  $idsem, $idses, $idanac) >=10){


                        $rsm = new ResultSetMapping();

                        $rsm->addScalarResult('ueid_id', 'ueid_id');
                        $rsm->addScalarResult('creditvalue', 'creditvalue');
                        $sql = "SELECT  DISTINCT ueid_id,creditvalue FROM `ue_speciality`   WHERE  specialityid_id=:idspec  and  acadyearid=:idanac and creditvalue BETWEEN 2 AND 3 and semester_id=:idsem   ";
                        $query = $this->manager->createNativeQuery($sql, $rsm);
                        $query->setParameter('idanac', $idanac);

                        $query->setParameter('idsem', $idsem);

                        $query->setParameter('idspec', $idspec);


                        $spmin = $query->getResult();
                        $creditv = 1;

                        foreach ($spmin as $ueminor) {


                            $spececucred = $this->manager->getRepository(EcuSpeciality::class)->findBy(array('specialityid' => $idspec, 'ueid' => $ueminor['ueid_id'], 'semester' => $idsem, 'acadyearid' => $idanac));
                            $moyennetotalponderec = 0;

                            foreach ($spececucred as $speucred) {


                                $idecucr = $speucred->getEcuid();

                                $moyennetotalponderec = $moyennetotalponderec + ($this->ecuaverage($studentid, $idspec, $idecucr, $idsem, $idses, $idanac) * $speucred->getCreditvalue());


                            }

                            $moyenneuecreduev = number_format(($moyennetotalponderec / $ueminor['creditvalue']), 2);


                            if ($moyenneuecreduev < 7) {

                                $creditv = 0 * $creditv;

                            } else {

                                $creditv = 1 * $creditv;

                            }

                        }


                        if ($creditv == 0) {


                            $tcredit = $tcredit + 0;


                        } else {


                            $tcredit = $tcredit + $spue->getCreditvalue();


                        }







                    }
                    else {

                        $tcredit = $tcredit + 0;
                    }


                }





            }











            return $tcredit;





        }










            else{

            $specue = $this->manager->getRepository(UeSpeciality::class)->findBy(array('specialityid' => $idspec, 'semester' => $idsem, 'acadyearid' => $idanac));
            $tcredit = 0;
            foreach ($specue as $spue) {

                $iduespue = $spue->getUeid();

                if ($this->ueaverage($studentid, $idspec, $iduespue, $idsem, $idses, $idanac) >= 10) {
                    $tcredit = $tcredit + $spue->getCreditvalue();
                }



                elseif ($this->ecusemaverage($studentid, $idspec, $idsem, $idses, $idanac) >= 10) {

                    if ($this->ueaverage($studentid, $idspec, $iduespue, $idsem, $idses, $idanac) >= 7) {

                        $em = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('ESATICSigesBundle:UeSpeciality');

                        $specuev = $em->findBy(array('specialityid' => $idspec, 'semester' => $idsem, 'acadyearid' => $idanac));
                        $creditv = 1;
                        foreach ($specuev as $spuev) {
                            $iduespuev = $spuev->getUeid();


                            if ($this->ueaverage($studentid, $idspec, $iduespuev, $idsem, $idses, $idanac) < 7) {

                                $creditv = 0 * $creditv;

                            } else {

                                $creditv = 1 * $creditv;

                            }

                        }

                        if ($creditv == 0) {


                            $tcredit = $tcredit + 0;


                        } else {


                            $tcredit = $tcredit + $spue->getCreditvalue();


                        }
                    } else {
                        $tcredit = $tcredit + 0;
                    }


                } else {

                    $tcredit = $tcredit + 0;
                }


            }


            return $tcredit;
        }








    }




    public function decision($idetudiant, $idspecialite, $idsemestre, $idsession, $idanacademie)
    {


        if ($this->tcredit($idetudiant, $idspecialite, $idsemestre, $idsession, $idanacademie) == $this->sumcredit($idspecialite,$idsemestre,$idanacademie)) {


            $decision = 'ADMIS';
        } else {

            $decision = 'REFUSE';
        }


        return $decision;


    }



    public function moyennesemecusemestrielle($idetudiant,$idsem,$idanac,$idspec,$idses)
    {



        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('semaverage', 'semaverage');



        $sql = "SELECT  semaverage FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite  and acadyearid=:idanac  and semesterid=:idsemestre and sessionid=:idsession  ";
        $query = $this->manager->createNativeQuery($sql, $rsm);



        $query->setParameter('idanac', $idanac );
        $query->setParameter('idetudiant', $idetudiant);

        $query->setParameter('idsemestre', $idsem);

        $query->setParameter('idspecialite', $idspec);
        $query->setParameter('idsession', $idses);




        $idetudeci = $query->getResult();

        foreach ($idetudeci as $mo){


            $moysemestrielle=$mo['semaverage'];

        }


        $moyennesemestre=$moysemestrielle;









        return $moyennesemestre;

    }
    public function tcreditsemestrielle($idetudiant,$idsem,$idanac,$idspec,$idses)
    {



        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('tvalidatecred', 'tvalidatecred');



        $sql = "SELECT  tvalidatecred FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite  and acadyearid=:idanac  and semesterid=:idsemestre and sessionid=:idsession";
        $query = $this->manager->createNativeQuery($sql, $rsm);



        $query->setParameter('idanac', $idanac );
        $query->setParameter('idetudiant', $idetudiant);

        $query->setParameter('idsemestre', $idsem);

        $query->setParameter('idspecialite', $idspec);
        $query->setParameter('idsession', $idses);




        $idetudeci = $query->getResult();

        foreach ($idetudeci as $mo){


            $tcreditsemestrielle=$mo['tvalidatecred'];

        }


        $tcreditsemestre=$tcreditsemestrielle;









        return $tcreditsemestre;

    }


    public function nbaveragegtzclassspec($idspec,$idecu,$idsem,$idses, $idanac, $idlevel)
    {



        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('studentid', 'studentid');
        $sql = "SELECT  DISTINCT student_speciality.studentid FROM `student_speciality` INNER JOIN student_examnotes on student_speciality.studentid=student_examnotes.studentid  WHERE  student_examnotes.specialityid=:idspec  and  student_examnotes.acadyearid=:idanac  and student_examnotes.semesterid=:idsem and student_speciality.levelid=:levelid  ";
        $query = $this->manager->createNativeQuery($sql, $rsm);
        $query->setParameter('idanac', $idanac );

        $query->setParameter('idsem', $idsem);

        $query->setParameter('idspec', $idspec);
        $query->setParameter('levelid', $idlevel);




        $idstud = $query->getResult();
        $nbgtz=0;

        foreach($idstud as $stude){




            if($this->ecuaverage($stude['studentid'],$idspec, $idecu, $idsem,$idses,$idanac)>=0 and $this->ecuaverage($stude['studentid'],$idspec, $idecu, $idsem,$idses,$idanac)<8){




                $nbgtz=$nbgtz+ 1;
            }









        }
        $nbstudgtz=$nbgtz;


        return $nbstudgtz;












    }


    public function nbaveragelttclassspec($idspec,$idecu,$idsem,$idses, $idanac, $idlevel)
    {



        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('studentid', 'studentid');
        $sql = "SELECT  DISTINCT student_speciality.studentid FROM `student_speciality` INNER JOIN student_examnotes on student_speciality.studentid=student_examnotes.studentid  WHERE  student_examnotes.specialityid=:idspec  and  student_examnotes.acadyearid=:idanac  and student_examnotes.semesterid=:idsem and student_speciality.levelid=:levelid  ";
        $query = $this->manager->createNativeQuery($sql, $rsm);
        $query->setParameter('idanac', $idanac );

        $query->setParameter('idsem', $idsem);

        $query->setParameter('idspec', $idspec);
        $query->setParameter('levelid', $idlevel);




        $idstud = $query->getResult();
        $nbltt=0;

        foreach($idstud as $stude){




            if($this->ecuaverage($stude['studentid'],$idspec, $idecu, $idsem,$idses,$idanac)>=8 and $this->ecuaverage($stude['studentid'],$idspec, $idecu, $idsem,$idses,$idanac)<10){




                $nbltt=$nbltt+ 1;
            }









        }
        $nbstudltt=$nbltt;


        return $nbstudltt;























    }




    public function nbaveragegttclassspec($idspec,$idecu,$idsem,$idses, $idanac, $idlevel)
    {



        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('studentid', 'studentid');
        $sql = "SELECT  DISTINCT student_speciality.studentid FROM `student_speciality` INNER JOIN student_examnotes on student_speciality.studentid=student_examnotes.studentid  WHERE  student_examnotes.specialityid=:idspec  and  student_examnotes.acadyearid=:idanac  and student_examnotes.semesterid=:idsem and student_speciality.levelid=:levelid ";
        $query = $this->manager->createNativeQuery($sql, $rsm);
        $query->setParameter('idanac', $idanac );

        $query->setParameter('idsem', $idsem);

        $query->setParameter('idspec', $idspec);
        $query->setParameter('levelid', $idlevel);




        $idstud = $query->getResult();
        $nbgtt=0;

        foreach($idstud as $stude){




            if($this->ecuaverage($stude['studentid'],$idspec, $idecu, $idsem,$idses,$idanac)>=10){




                $nbgtt=$nbgtt+ 1;
            }









        }
        $nbstudgtt=$nbgtt;


        return $nbstudgtt;
















    }


    public function nbaveragemaxclassspec($idspec,$idecu,$idsem,$idses, $idanac, $idlevel)
    {


        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('studentid', 'studentid');
        $sql = "SELECT  DISTINCT student_speciality.studentid FROM `student_speciality` INNER JOIN student_examnotes on student_speciality.studentid=student_examnotes.studentid  WHERE  student_examnotes.specialityid=:idspec  and  student_examnotes.acadyearid=:idanac  and student_examnotes.semesterid=:idsem and student_speciality.levelid=:levelid  ";
        $query = $this->manager->createNativeQuery($sql, $rsm);
        $query->setParameter('idanac', $idanac );

        $query->setParameter('idsem', $idsem);

        $query->setParameter('idspec', $idspec);
        $query->setParameter('levelid', $idlevel);




        $idstud = $query->getResult();
        $avermax=0;

        foreach($idstud as $stude){




            if($this->ecuaverage($stude['studentid'],$idspec, $idecu, $idsem,$idses,$idanac)>=$avermax){

                $avermax=$this->ecuaverage($stude['studentid'],$idspec, $idecu, $idsem,$idses,$idanac);
            }









        }
        $maxaverage=$avermax;


        return $maxaverage;










    }




    public function nbaverageminclassspec($idspec,$idecu,$idsem,$idses, $idanac, $idlevel)
    {





        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('studentid', 'studentid');
        $sql = "SELECT  DISTINCT student_speciality.studentid FROM `student_speciality` INNER JOIN student_examnotes on student_speciality.studentid=student_examnotes.studentid  WHERE  student_examnotes.specialityid=:idspec and student_examnotes.exam_notes BETWEEN 0 AND 20 and  student_examnotes.acadyearid=:idanac  and student_examnotes.semesterid=:idsem and student_speciality.levelid=:levelid  ";
        $query = $this->manager->createNativeQuery($sql, $rsm);
        $query->setParameter('idanac', $idanac );

        $query->setParameter('idsem', $idsem);

        $query->setParameter('idspec', $idspec);
        $query->setParameter('levelid', $idlevel);




        $idstud = $query->getResult();
        $avermin=21;

        foreach($idstud as $stude){




            if($this->ecuaverage($stude['studentid'],$idspec, $idecu, $idsem,$idses,$idanac)<=$avermin){

                $avermin=$this->ecuaverage($stude['studentid'],$idspec, $idecu, $idsem,$idses,$idanac);
            }









        }
        $minaverage=$avermin;


        return $minaverage;











    }




    public function averageofclassspec($idspec,$idecu,$idsem,$idses, $idanac, $idlevel)
    {



        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('studentid', 'studentid');
        $sql = "SELECT  DISTINCT student_speciality.studentid FROM `student_speciality` INNER JOIN student_examnotes on student_speciality.studentid=student_examnotes.studentid  WHERE  student_examnotes.specialityid=:idspec and student_examnotes.exam_notes BETWEEN 0 AND 20 and  student_examnotes.acadyearid=:idanac  and student_examnotes.semesterid=:idsem and student_speciality.levelid=:levelid  ";
        $query = $this->manager->createNativeQuery($sql, $rsm);
        $query->setParameter('idanac', $idanac );

        $query->setParameter('idsem', $idsem);

        $query->setParameter('idspec', $idspec);
        $query->setParameter('levelid', $idlevel);




        $idstud = $query->getResult();
        $nbstudclass=0;
        $averclass=0;


        foreach($idstud as $stude){

            $nbstudclass=$nbstudclass + 1;

            $avercl=$this->ecuaverage($stude['studentid'],$idspec, $idecu, $idsem,$idses,$idanac);
            $averclass=$averclass + $avercl;











        }
        $numstdclass=$nbstudclass;
        $averofclass=$averclass;

        $averageofclass=number_format(($averofclass/$numstdclass),2);

        return $averageofclass ;










    }



    public function idmaxaveragesemestrielle( $idspec, $idsem, $idses, $idanac)
    {


        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('studentid', 'studentid');



        $sql = "SELECT  DISTINCT studentid FROM `halfyearly_delib` WHERE   specialityid=:idspecialite  and acadyearid=:idanac  and semesterid=:idsemestre and sessionid=:idsession  ";
        $query = $this->manager->createNativeQuery($sql, $rsm);



        $query->setParameter('idanac', $idanac );

        $query->setParameter('idsemestre', $idsem);

        $query->setParameter('idspecialite', $idspec);
        $query->setParameter('idsession', $idses);




        $idetudevaf = $query->getResult();
        $moyforte=0;
        $idmoyforte="";
        foreach($idetudevaf as $etf){










            if($this->moyennesemecusemestrielle($etf['studentid'],$idsem,$idanac,$idspec,$idses)>= $moyforte){

                $moyforte=$this->moyennesemecusemestrielle($etf['studentid'],$idsem,$idanac,$idspec,$idses);
                $idmoyforte=$etf['studentid'];
            }


        }
        $idfortemoyennesemestrielle=$idmoyforte ;

        return $idfortemoyennesemestrielle ;












    }



    public function maxaveragesemestrielle( $idspec, $idsem, $idses, $idanac)
    {


        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('studentid', 'studentid');



        $sql = "SELECT  DISTINCT studentid FROM `halfyearly_delib` WHERE   specialityid=:idspecialite  and acadyearid=:idanac  and semesterid=:idsemestre and sessionid=:idsession  ";
        $query = $this->manager->createNativeQuery($sql, $rsm);



        $query->setParameter('idanac', $idanac );

        $query->setParameter('idsemestre', $idsem);

        $query->setParameter('idspecialite', $idspec);
        $query->setParameter('idsession', $idses);



        $idetudevaf = $query->getResult();
        $moyforte=0;
        foreach($idetudevaf as $etf){








            if($this->moyennesemecusemestrielle($etf['studentid'],$idsem,$idanac,$idspec,$idses)>= $moyforte){

                $moyforte=$this->moyennesemecusemestrielle($etf['studentid'],$idsem,$idanac,$idspec,$idses);

            }


        }
        $fortemoyennesemestrielle=$moyforte ;

        return $fortemoyennesemestrielle ;












    }




    public function idminaveragesemestrielle( $idspec, $idsem, $idses, $idanac)
    {


        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('studentid', 'studentid');



        $sql = "SELECT  DISTINCT studentid FROM `halfyearly_delib` WHERE   specialityid=:idspecialite  and acadyearid=:idanac  and semesterid=:idsemestre and sessionid=:idsession  ";
        $query = $this->manager->createNativeQuery($sql, $rsm);



        $query->setParameter('idanac', $idanac );

        $query->setParameter('idsemestre', $idsem);

        $query->setParameter('idspecialite', $idspec);
        $query->setParameter('idsession', $idses);





        $idetudevafa = $query->getResult();
        $moyfai=21;
        foreach($idetudevafa as $etfa){









            if($this->moyennesemecusemestrielle($etfa['studentid'],$idsem,$idanac,$idspec,$idses)<= $moyfai){

                $moyfai=$this->moyennesemecusemestrielle($etfa['studentid'],$idsem,$idanac,$idspec,$idses);
                $idmoyfai=$etfa['studentid'];
            }


        }
        $idfaiblemoyennesemestrielle=$idmoyfai ;

        return $idfaiblemoyennesemestrielle ;












    }


    public function minaveragesemestrielle( $idspec, $idsem, $idses, $idanac)
    {





        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('studentid', 'studentid');



        $sql = "SELECT  DISTINCT studentid FROM `halfyearly_delib` WHERE   specialityid=:idspecialite  and acadyearid=:idanac  and semesterid=:idsemestre and sessionid=:idsession  ";
        $query = $this->manager->createNativeQuery($sql, $rsm);



        $query->setParameter('idanac', $idanac );

        $query->setParameter('idsemestre', $idsem);

        $query->setParameter('idspecialite', $idspec);
        $query->setParameter('idsession', $idses);




        $idetudevafa = $query->getResult();
        $moyfai=21;
        foreach($idetudevafa as $etfa){









            if($this->moyennesemecusemestrielle($etfa['studentid'],$idsem,$idanac,$idspec,$idses) <= $moyfai){

                $moyfai=$this->moyennesemecusemestrielle($etfa['studentid'],$idsem,$idanac,$idspec,$idses);

            }


        }
        $faiblemoyennesemestrielle=$moyfai ;

        return $faiblemoyennesemestrielle ;












    }



    public function averageofspecsemestrielle($idspec, $idsem, $idses, $idanac)
    {





        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('studentid', 'studentid');



        $sql = "SELECT  DISTINCT studentid FROM `halfyearly_delib` WHERE   specialityid=:idspecialite  and acadyearid=:idanac  and semesterid=:idsemestre and sessionid=:idsession  ";
        $query = $this->manager->createNativeQuery($sql, $rsm);



        $query->setParameter('idanac', $idanac );

        $query->setParameter('idsemestre', $idsem);

        $query->setParameter('idspecialite', $idspec);
        $query->setParameter('idsession', $idses);





        $idstud = $query->getResult();
        $nbstudclass=0;
        $averclass=0;


        foreach($idstud as $stude){

            $nbstudclass=$nbstudclass + 1;

            $avercl=$this->moyennesemecusemestrielle($stude['studentid'],$idsem,$idanac,$idspec,$idses);
            $averclass=$averclass + $avercl;











        }
        $numstdclass=$nbstudclass;
        $averofclass=$averclass;

        $averageofclass=number_format(($averofclass/$numstdclass),2);

        return $averageofclass ;










    }




    public function nbmoyennesemecusupzsemestrielle( $idspec, $idsem, $idses, $idanac)
    {


        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('studentid', 'studentid');



        $sql = "SELECT  DISTINCT studentid FROM `halfyearly_delib` WHERE   specialityid=:idspecialite  and acadyearid=:idanac  and semesterid=:idsemestre and sessionid=:idsession  ";
        $query = $this->manager->createNativeQuery($sql, $rsm);



        $query->setParameter('idanac', $idanac );

        $query->setParameter('idsemestre', $idsem);

        $query->setParameter('idspecialite', $idspec);
        $query->setParameter('idsession', $idses);




        $idetudeva = $query->getResult();
        $nbmoysup=0;
        foreach($idetudeva as $et){



            if($this->moyennesemecusemestrielle($et['studentid'],$idsem,$idanac,$idspec,$idses) >=0 and $this->moyennesemecusemestrielle($et['studentid'],$idsem,$idanac,$idspec,$idses)<8){

                $nbmoysup=$nbmoysup + 1;

            }


        }
        $nbsupsemestrielle=$nbmoysup ;

        return $nbsupsemestrielle ;












    }



    public function nbmoyennesemecuinfdsemestrielle( $idspec, $idsem, $idses, $idanac)
    {


        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('studentid', 'studentid');



        $sql = "SELECT  DISTINCT studentid FROM `halfyearly_delib` WHERE   specialityid=:idspecialite  and acadyearid=:idanac  and semesterid=:idsemestre and sessionid=:idsession  ";
        $query = $this->manager->createNativeQuery($sql, $rsm);



        $query->setParameter('idanac', $idanac );

        $query->setParameter('idsemestre', $idsem);

        $query->setParameter('idspecialite', $idspec);
        $query->setParameter('idsession', $idses);




        $idetudeva = $query->getResult();
        $nbmoysupi=0;
        foreach($idetudeva as $et){








            if($this->moyennesemecusemestrielle($et['studentid'],$idsem,$idanac,$idspec,$idses)>=8 and $this->moyennesemecusemestrielle($et['studentid'],$idsem,$idanac,$idspec,$idses) <10){

                $nbmoysupi=$nbmoysupi + 1;

            }


        }
        $nbsupisemestrielle=$nbmoysupi ;

        return $nbsupisemestrielle;












    }



    public function nbmoyennesemecusupdxsemestrielle( $idspec, $idsem, $idses, $idanac)
    {


        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('studentid', 'studentid');



        $sql = "SELECT  DISTINCT studentid FROM `halfyearly_delib` WHERE   specialityid=:idspecialite  and acadyearid=:idanac  and semesterid=:idsemestre and sessionid=:idsession  ";
        $query = $this->manager->createNativeQuery($sql, $rsm);



        $query->setParameter('idanac', $idanac );

        $query->setParameter('idsemestre', $idsem);

        $query->setParameter('idspecialite', $idspec);
        $query->setParameter('idsession', $idses);




        $idetudeva = $query->getResult();
        $nbmoysupdx=0;
        foreach($idetudeva as $et){











            if($this->moyennesemecusemestrielle($et['studentid'],$idsem,$idanac,$idspec,$idses) >=10){

                $nbmoysupdx=$nbmoysupdx + 1;

            }


        }
        $nbsupdxsemestrielle=$nbmoysupdx ;

        return $nbsupdxsemestrielle ;












    }


    public function nbsemadmissemestrielle( $idspec, $idsem, $idses, $idanac)
    {




        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('nbidetudiant', 'nbidetudiant');



        $sql = "SELECT   count(DISTINCT halfyearly_delib.studentid) as nbidetudiant FROM `halfyearly_delib` WHERE   specialityid=:idspecialite  and acadyearid=:idanac  and semesterid=:idsemestre and sessionid=:idsession and decision='ADMIS'  ";
        $query = $this->manager->createNativeQuery($sql, $rsm);



        $query->setParameter('idanac', $idanac );

        $query->setParameter('idsemestre', $idsem);

        $query->setParameter('idspecialite', $idspec);
        $query->setParameter('idsession', $idses);




        $idetudevad = $query->getResult();

        foreach($idetudevad as $eta){



            $nombreetudiant=$eta['nbidetudiant'];




        }


        return    $nombreetudiant;
    }









    public function nbsemrefusesemestrielle( $idspec, $idsem, $idses, $idanac)
    {





        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('nbidetudiantrefuse', 'nbidetudiantrefuse');



        $sql = "SELECT   count(DISTINCT halfyearly_delib.studentid) as nbidetudiantrefuse FROM `halfyearly_delib` WHERE   specialityid=:idspecialite  and acadyearid=:idanac  and semesterid=:idsemestre and sessionid=:idsession and decision='REFUSE' ";
        $query = $this->manager->createNativeQuery($sql, $rsm);



        $query->setParameter('idanac', $idanac );

        $query->setParameter('idsemestre', $idsem);

        $query->setParameter('idspecialite', $idspec);
        $query->setParameter('idsession', $idses);




        $idetudevadref = $query->getResult();

        foreach($idetudevadref as $etaref){



            $nombreetudiantrefuse=$etaref['nbidetudiantrefuse'];




        }


        return    $nombreetudiantrefuse;
    }



    //end functions

}