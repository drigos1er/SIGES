<?php

namespace App\Controller;

use App\Entity\SchoolClass;
use App\Entity\TeachSpeciality;
use App\Repository\EcuRepository;
use App\Repository\LevelRepository;
use App\Repository\SchoolClassRepository;
use App\Repository\SemesterRepository;
use App\Repository\SpecialityRepository;
use App\Repository\TeachSpecialityRepository;
use App\Repository\UeRepository;
use Doctrine\ORM\Query\ResultSetMapping;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeacherController extends AbstractController
{

    /**
     * Choice  Teacher Action
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function dashboardteacher()
    {
        return $this->render('teacher/dashboardteacher.html.twig', [
            'controller_name' => 'TeacherController',
        ]);
    }


    /**
     * Dashboard Average Teacher
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function averagedashteacher()
    {

        return $this->render('teacher/averagedashteacher.html.twig', [
            'current_menu' => 'averagedashteacher',
        ]);
    }


    /**
     * Table of a teacher's ecu
     * @return Response
     */
    public function teachereculist()
    {
        return  $this->render('teacher/teachereculist.html.twig', array('current_menu'=>'teachereculist'));
    }

    /**
     * List of a teacher's ecu
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function eculist(Request $request, TeachSpecialityRepository $teachSpecialityrep,
                                  SchoolClassRepository $schoolclassrep, UeRepository $uerep,
                            EcuRepository $ecurep, SpecialityRepository $specrep
    )
    {
        $idanac=$this->get('session')->get('anacad');
        $teachid=$this->getUser()->getUsername();
        $semtype=$this->get('session')->get('semtype');


        $length = $request->get('length');
        $length = $length && ($length!=-1)?$length:0;

        $start = $request->get('start');
        $start = $length?($start && ($start!=-1)?$start:0)/$length:0;

        $search = $request->get('search');
        $filters = [
            'query' => @$search['value']
        ];

        $ecuslist = $teachSpecialityrep->searchteachpec($teachid, $idanac, $filters, $start, $length
        );
        
  


        $output = array(
            'data' => array(),
            'recordsFiltered' => count($teachSpecialityrep->searchteachpec($teachid, $idanac, $filters, 0, false)),
            'recordsTotal' => count($teachSpecialityrep->searchteachpec($teachid, $idanac, 0, false))
        );

        foreach ($ecuslist as $eculist) {

            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();
            $rsm->addScalarResult('id', 'id');

            $sql = "SELECT * FROM `semester`  WHERE  id=:semid and semtype=:semtype  ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('semid', $eculist->getSemesterId());
            $query->setParameter('semtype', $semtype);



            $seme= $query->getResult();


            if ($seme) {

                $classincor = $schoolclassrep->findOneById($eculist->getClasseid());

                $ue = $uerep->findOneById($eculist->getUeid());

                $ecu = $ecurep->findOneById($eculist->getEcuid());




                $spe = $specrep->findOneById($classincor->getSpecialityId());


                $em = $this->getDoctrine()->getManager();


                $rsm = new ResultSetMapping();
                $rsm->addScalarResult('nbstudent', 'nbstudent');

                $sql = "SELECT count(  DISTINCT `studentid`) as nbstudent FROM `student_speciality`  WHERE  acadyearid=:acadyearid and specialityid=:specialityid and  levelid=:levelid and school_classeid=:school_classid  ";
                $query = $em->createNativeQuery($sql, $rsm);
                $query->setParameter('acadyearid', $idanac);
                $query->setParameter('specialityid', $classincor->getSpecialityId());

                $query->setParameter('levelid', $classincor->getLevelid());

                $query->setParameter('school_classid', $classincor->getId());



                $cptetud= $query->getResult();


                foreach ($cptetud as $n) {
                    $nbcptetud= $n['nbstudent'];

                }



                $vht=$eculist->getHourvolcm()+ $eculist->getHourvoltd() + $eculist->getHourvoltp();






                $em = $this->getDoctrine()->getManager();


                $rsm = new ResultSetMapping();
                $rsm->addScalarResult('nbaveragescc', 'nbaveragescc');

                $sql = "SELECT count(  DISTINCT student_averages.`studentid`) as nbaveragescc FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages='MCC'  and student_averages.average BETWEEN 0 AND 20 and student_speciality.school_classeid=:school_classeid  ";
                $query = $em->createNativeQuery($sql, $rsm);
                $query->setParameter('acadyearid', $idanac);
                $query->setParameter('specialityid', $classincor->getSpecialityid());
                $query->setParameter('semesterid', $eculist->getSemesterid());

                $query->setParameter('school_classeid', $classincor->getId());

                $query->setParameter('ueid', $eculist->getUeid());
                $query->setParameter('ecuid', $eculist->getEcuid());


                $cptnotemoycc= $query->getResult();


                foreach ($cptnotemoycc as $n) {
                    $nbcptnotemoycc= $n['nbaveragescc'];
                }






                $em = $this->getDoctrine()->getManager();


                $rsm = new ResultSetMapping();
                $rsm->addScalarResult('averagestp', 'averagestp');

                $sql = "SELECT count(  DISTINCT student_averages.`studentid`) as averagestp FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages='MTP'  and student_averages.average BETWEEN 0 AND 20 and student_speciality.school_classeid=:school_classeid  ";
                $query = $em->createNativeQuery($sql, $rsm);
                $query->setParameter('acadyearid', $this->get('session')->get('anacademiq'));
                $query->setParameter('specialityid', $classincor->getSpecialityid());
                $query->setParameter('semesterid', $eculist->getSemesterid());

                $query->setParameter('school_classeid', $classincor->getId());

                $query->setParameter('ueid', $eculist->getUeid());
                $query->setParameter('ecuid', $eculist->getEcuid());


                $cptnotemoycctp= $query->getResult();


                foreach ($cptnotemoycctp as $n) {
                    $nbcptnotemoycctp= $n['averagestp'];
                }










                $em = $this->getDoctrine()->getManager();


                $rsm = new ResultSetMapping();
                $rsm->addScalarResult('average', 'average');

                $sql = "SELECT student_averages.average  FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages='MCC'  and student_averages.valid=1 and student_speciality.school_classeid=:school_classeid  ";
                $query = $em->createNativeQuery($sql, $rsm);
                $query->setParameter('acadyearid', $idanac);
                $query->setParameter('specialityid', $classincor->getSpecialityid());
                $query->setParameter('semesterid', $eculist->getSemesterid());

                $query->setParameter('school_classeid', $classincor->getId());

                $query->setParameter('ueid', $eculist->getUeid());
                $query->setParameter('ecuid', $eculist->getEcuid());


                $averagevalid= $query->getResult();

                if($averagevalid){


                          $pathurl=  $this->generateUrl('siges_alertvalidation', array('classid'=>$eculist->getClasseid(),'specid'=>$spe->getId(),'ueid'=>$eculist->getUeid(),'ecuid'=>$eculist->getEcuid(),'uename'=>$ue->getUename(),'classname'=>$classincor->getClassname(),'semid'=>$eculist->getSemesterid(),'ecuname'=>$ecu->getEcuname(),'ecuname'=>$ecu->getEcuname(),'typaver'=>'MCC'))  ;
                    if ($nbcptnotemoycc >= 1) {
                        $incorpo = '<a href="'.$pathurl.'" class="btn btn-success btn-xs" >' . $nbcptnotemoycc. '/' . $nbcptetud .'&nbsp;&nbsp;<i class="fa fa-edit"></i> </a>';
                    } else {
                        $incorpo = '<a href="'.$pathurl.'" class="btn btn-danger btn-xs">' . $nbcptnotemoycc. '/' . $nbcptetud .'&nbsp;&nbsp;<i class="fa fa-edit"></i></a>';
                    }


                    $liensaisiecc=$incorpo;
                }else{
                    $dateoftheday=new \Datetime();
                    $fdateoftheday= $dateoftheday->format('Y-m-d h:i:s');


                    if($fdateoftheday > $this->get('session')->get('deadline')){
                               $pathurl=  $this->generateUrl('siges_alertdeadlinesaisie', array('classid'=>$eculist->getClasseid(),'specid'=>$spe->getId(),'ueid'=>$eculist->getUeid(),'ecuid'=>$eculist->getEcuid(),'uename'=>$ue->getUename(),'classname'=>$classincor->getClassname(),'semid'=>$eculist->getSemesterid(),'ecuname'=>$ecu->getEcuname(),'ecuname'=>$ecu->getEcuname(),'typaver'=>'MCC'))  ;

                        if ($nbcptnotemoycc >= 1) {
                            $incorpo = '<a href="'.$pathurl.'" class="btn btn-success btn-xs" >' . $nbcptnotemoycc. '/' . $nbcptetud .'&nbsp;&nbsp;<i class="fa fa-edit"></i> </a>';
                        } else {
                            $incorpo = '<a href="'.$pathurl.'" class="btn btn-danger btn-xs">' . $nbcptnotemoycc. '/' . $nbcptetud .'&nbsp;&nbsp;<i class="fa fa-edit"></i></a>';
                        }
                                      $liensaisiecc=$incorpo;






                    }else{
                        $pathurl=  $this->generateUrl('siges_redirectentryaverages', array('classid'=>$eculist->getClasseid(),'specid'=>$spe->getId(),'ueid'=>$eculist->getUeid(),'ecuid'=>$eculist->getEcuid(),'uename'=>$ue->getUename(),'classname'=>$classincor->getClassname(),'semid'=>$eculist->getSemesterid(),'ecuname'=>$ecu->getEcuname(),'ecuname'=>$ecu->getEcuname(),'typaver'=>'MCC'))  ;

                        if ($nbcptnotemoycc >= 1) {
                            $incorpo = '<a href="'.$pathurl.'" class="btn btn-success btn-xs" >' . $nbcptnotemoycc. '/' . $nbcptetud .'&nbsp;&nbsp;<i class="fa fa-edit"></i> </a>';
                        } else {
                            $incorpo = '<a href="'.$pathurl.'" class="btn btn-danger btn-xs">' . $nbcptnotemoycc. '/' . $nbcptetud .'&nbsp;&nbsp;<i class="fa fa-edit"></i></a>';
                        }





                        $liensaisiecc=$incorpo;
                    }









                }




                $em = $this->getDoctrine()->getManager();


                $rsm = new ResultSetMapping();
                $rsm->addScalarResult('average', 'average');

                $sql = "SELECT student_averages.average  FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages='MTP'  and student_averages.valid=1 and student_speciality.school_classeid=:school_classeid  ";
                $query = $em->createNativeQuery($sql, $rsm);
                $query->setParameter('acadyearid', $idanac);
                $query->setParameter('specialityid', $classincor->getSpecialityid());
                $query->setParameter('semesterid', $eculist->getSemesterid());

                $query->setParameter('school_classeid', $classincor->getId());

                $query->setParameter('ueid', $eculist->getUeid());
                $query->setParameter('ecuid', $eculist->getEcuid());


                $averagevalidtp= $query->getResult();

                if($averagevalidtp){


                    $pathurltp=  $this->generateUrl('siges_alertvalidation', array('classid'=>$eculist->getClasseid(),'specid'=>$spe->getId(),'ueid'=>$eculist->getUeid(),'ecuid'=>$eculist->getEcuid(),'uename'=>$ue->getUename(),'classname'=>$classincor->getClassname(),'semid'=>$eculist->getSemesterid(),'ecuname'=>$ecu->getEcuname(),'ecuname'=>$ecu->getEcuname(),'typaver'=>'MTP'))  ;


                    if ($nbcptnotemoycctp >= 1) {
                        $incorpotp = '<a href="'.$pathurltp.'" class="btn btn-success btn-xs">' . $nbcptnotemoycctp . '/' . $nbcptetud .'&nbsp;&nbsp;<i class="fa fa-edit"></i></span>';
                    } else{

                        $incorpotp = '<a href="'.$pathurltp.'" class="btn btn-danger btn-xs">' . $nbcptnotemoycctp . '/' . $nbcptetud .'&nbsp;&nbsp;<i class="fa fa-edit"></i></span>';
                    }




                    $liensaisietp=$incorpotp;






                }else{

                    $dateoftheday=new \Datetime();
                    $fdateoftheday= $dateoftheday->format('Y-m-d h:i:s');


                    if($fdateoftheday > $this->get('session')->get('deadline')){


                        $pathurltp=  $this->generateUrl('siges_alertdeadlinesaisie', array('classid'=>$eculist->getClasseid(),'specid'=>$spe->getId(),'ueid'=>$eculist->getUeid(),'ecuid'=>$eculist->getEcuid(),'uename'=>$ue->getUename(),'classname'=>$classincor->getClassname(),'semid'=>$eculist->getSemesterid(),'ecuname'=>$ecu->getEcuname(),'ecuname'=>$ecu->getEcuname(),'typaver'=>'MTP'))  ;
                        if ($nbcptnotemoycctp >= 1) {
                            $incorpotp = '<a href="'.$pathurltp.'" class="btn btn-success btn-xs">' . $nbcptnotemoycctp . '/' . $nbcptetud .'&nbsp;&nbsp;<i class="fa fa-edit"></i></span>';
                        } else{

                            $incorpotp = '<a href="'.$pathurltp.'" class="btn btn-danger btn-xs">' . $nbcptnotemoycctp . '/' . $nbcptetud .'&nbsp;&nbsp;<i class="fa fa-edit"></i></span>';
                        }




                        $liensaisietp=$incorpotp;



                    }else{

                        $pathurltp=  $this->generateUrl('siges_redirectentryaverages', array('classid'=>$eculist->getClasseid(),'specid'=>$spe->getId(),'ueid'=>$eculist->getUeid(),'ecuid'=>$eculist->getEcuid(),'uename'=>$ue->getUename(),'classname'=>$classincor->getClassname(),'semid'=>$eculist->getSemesterid(),'ecuname'=>$ecu->getEcuname(),'ecuname'=>$ecu->getEcuname(),'typaver'=>'MTP'))  ;

                        if ($nbcptnotemoycctp >= 1) {
                            $incorpotp = '<a href="'.$pathurltp.'" class="btn btn-success btn-xs">' . $nbcptnotemoycctp . '/' . $nbcptetud .'&nbsp;&nbsp;<i class="fa fa-edit"></i></span>';
                        } else{

                            $incorpotp = '<a href="'.$pathurltp.'" class="btn btn-danger btn-xs">' . $nbcptnotemoycctp . '/' . $nbcptetud .'&nbsp;&nbsp;<i class="fa fa-edit"></i></span>';
                        }




                        $liensaisietp=$incorpotp;

                    }









                }







                $output['data'][] = [
                    'specialityname' => $spe->getId(),
                    'levelid' => $classincor->getLevelid(),
                    'classename' => $classincor->getClassname(),

                    'uename' => $ue->getUename(),
                    'ecuname' => $ecu->getEcuname(),
                    'semester' => $eculist->getSemesterId(),
                    'hourvht' => $vht,
                    'averagescc' => $liensaisiecc,
                    'averagestp'=>$liensaisietp



                ];



            }







        }

        return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);
    }


    /**
     *  Redirect Datatable editor
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectentryaverages(Request $request)
    {


        $request->getSession()->set('ueidedit', $request->query->get('ueid'));
        $request->getSession()->set('ecuidedit', $request->query->get('ecuid'));
        $request->getSession()->set('typaveredit', $request->query->get('typaver'));
        $request->getSession()->set('uenamedit', $request->query->get('uename'));
        $request->getSession()->set('ecunamedit', $request->query->get('ecuname'));
        $request->getSession()->set('classnamedit', $request->query->get('classname'));
        $request->getSession()->set('specidedit', $request->query->get('specid'));
        $request->getSession()->set('semidedit', $request->query->get('semid'));
        $idanac=$this->get('session')->get('anacad');
        $idspec=$request->query->get('specid');
        $idsem=$request->query->get('semid');
        $leconnecte=$this->getUser()->getUsername();
        $idue=$request->query->get('ueid') ;
        $idecu=$request->query->get('ecuid');
        $typeofaver=$request->query->get('typaver');
        $idclass=$request->query->get('classname');




        return $this->redirect("http://localhost:8888/SIGES/src/Service/averageteacher.php?idanac=$idanac&&idspec=$idspec&&idsem=$idsem&&idue=$idue&&&idecu=$idecu&&typeofaver=$typeofaver&&idclass=$idclass&&leconnecte=$leconnecte");


    }


    /**
     * Table Entry averages
     * @return Response
     */
    public function entryaverages()
    {
        return  $this->render('teacher/entryaverages.html.twig', array('current_menu'=>'entryaverages'));
    }

    /**
     * alert validation
     * @return Response
     */
    public function alertvalidation()
    {
        return  $this->render('teacher/alertvalidation.html.twig', array('current_menu'=>'alertvalidation'));
    }

    /**
     * alert deadline
     * @return Response
     */
    public function alertdeadlinesaisie()
    {
        return  $this->render('teacher/alertdeadlinesaisie.html.twig', array('current_menu'=>'alertdeadlinesaisie'));
    }




    /**
     * Table of a teacher's ecu validation
     * @return Response
     */
    public function teachereculistvalidation()
    {
        return  $this->render('teacher/teachereculistvalidation.html.twig', array('current_menu'=>'teachereculistvalidation'));
    }

    /**
     * List of a teacher's ecu validation
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function eculistvalidation(Request $request, TeachSpecialityRepository $teachSpecialityrep,
                            SchoolClassRepository $schoolclassrep, UeRepository $uerep,
                            EcuRepository $ecurep, SpecialityRepository $specrep, SemesterRepository $semrep, LevelRepository $levelrep
    )
    {
        $idanac=$this->get('session')->get('anacad');
        $teachid=$this->getUser()->getUsername();
        $semtype=$this->get('session')->get('semtype');


        $length = $request->get('length');
        $length = $length && ($length!=-1)?$length:0;

        $start = $request->get('start');
        $start = $length?($start && ($start!=-1)?$start:0)/$length:0;

        $search = $request->get('search');
        $filters = [
            'query' => @$search['value']
        ];

        $ecuslist = $teachSpecialityrep->searchteachpec($teachid, $idanac, $filters, $start, $length
        );




        $output = array(
            'data' => array(),
            'recordsFiltered' => count($teachSpecialityrep->searchteachpec($teachid, $idanac, $filters, 0, false)),
            'recordsTotal' => count($teachSpecialityrep->searchteachpec($teachid, $idanac, 0, false))
        );

        foreach ($ecuslist as $eculist) {

            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();
            $rsm->addScalarResult('id', 'id');

            $sql = "SELECT * FROM `semester`  WHERE  id=:semid and semtype=:semtype  ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('semid', $eculist->getSemesterId());
            $query->setParameter('semtype', $semtype);



            $seme= $query->getResult();


            if ($seme) {

                $classincor = $schoolclassrep->findOneById($eculist->getClasseid());

                $ue = $uerep->findOneById($eculist->getUeid());

                $ecu = $ecurep->findOneById($eculist->getEcuid());




                $spe = $specrep->findOneById($classincor->getSpecialityId());



                $lev = $levelrep->findOneById($classincor->getLevelid());

                $sem = $semrep->findOneById($eculist->getSemesterid());



                $em = $this->getDoctrine()->getManager();


                $rsm = new ResultSetMapping();
                $rsm->addScalarResult('nbstudent', 'nbstudent');

                $sql = "SELECT count(  DISTINCT `studentid`) as nbstudent FROM `student_speciality`  WHERE  acadyearid=:acadyearid and specialityid=:specialityid and  levelid=:levelid and school_classeid=:school_classid  ";
                $query = $em->createNativeQuery($sql, $rsm);
                $query->setParameter('acadyearid', $idanac);
                $query->setParameter('specialityid', $classincor->getSpecialityId());

                $query->setParameter('levelid', $classincor->getLevelid());

                $query->setParameter('school_classid', $classincor->getId());



                $cptetud= $query->getResult();


                foreach ($cptetud as $n) {
                    $nbcptetud= $n['nbstudent'];

                }



                $vht=$eculist->getHourvolcm()+ $eculist->getHourvoltd() + $eculist->getHourvoltp();






                $em = $this->getDoctrine()->getManager();


                $rsm = new ResultSetMapping();
                $rsm->addScalarResult('nbaveragescc', 'nbaveragescc');

                $sql = "SELECT count(  DISTINCT student_averages.`studentid`) as nbaveragescc FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages='MCC'  and student_averages.average BETWEEN 0 AND 20 and student_speciality.school_classeid=:school_classeid and student_averages.valid=1  ";
                $query = $em->createNativeQuery($sql, $rsm);
                $query->setParameter('acadyearid', $idanac);
                $query->setParameter('specialityid', $classincor->getSpecialityid());
                $query->setParameter('semesterid', $eculist->getSemesterid());

                $query->setParameter('school_classeid', $classincor->getId());

                $query->setParameter('ueid', $eculist->getUeid());
                $query->setParameter('ecuid', $eculist->getEcuid());


                $cptnotemoycc= $query->getResult();


                foreach ($cptnotemoycc as $n) {
                    $nbcptnotemoycc= $n['nbaveragescc'];
                }






                $em = $this->getDoctrine()->getManager();


                $rsm = new ResultSetMapping();
                $rsm->addScalarResult('averagestp', 'averagestp');

                $sql = "SELECT count(  DISTINCT student_averages.`studentid`) as averagestp FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages='MTP'  and student_averages.average BETWEEN 0 AND 20 and student_speciality.school_classeid=:school_classeid and student_averages.valid=1  ";
                $query = $em->createNativeQuery($sql, $rsm);
                $query->setParameter('acadyearid', $this->get('session')->get('anacademiq'));
                $query->setParameter('specialityid', $classincor->getSpecialityid());
                $query->setParameter('semesterid', $eculist->getSemesterid());

                $query->setParameter('school_classeid', $classincor->getId());

                $query->setParameter('ueid', $eculist->getUeid());
                $query->setParameter('ecuid', $eculist->getEcuid());


                $cptnotemoycctp= $query->getResult();


                foreach ($cptnotemoycctp as $n) {
                    $nbcptnotemoycctp= $n['averagestp'];
                }















                    $dateoftheday=new \Datetime();
                    $fdateoftheday= $dateoftheday->format('Y-m-d h:i:s');


                    if($fdateoftheday > $this->get('session')->get('deadline')){
                        $pathurl=  $this->generateUrl('siges_alertdeadlinevalid', array('classid'=>$eculist->getClasseid(),'specid'=>$spe->getId(),'ueid'=>$eculist->getUeid(),'ecuid'=>$eculist->getEcuid(),'uename'=>$ue->getUename(),'classname'=>$classincor->getClassname(),'semid'=>$eculist->getSemesterid(),'ecuname'=>$ecu->getEcuname(),'ecuname'=>$ecu->getEcuname(),'typaver'=>'MCC'))  ;

                        if ($nbcptnotemoycc >= 1) {
                            $incorpo = '<a href="'.$pathurl.'" class="btn btn-success btn-xs" >' . $nbcptnotemoycc. '/' . $nbcptetud .'&nbsp;&nbsp;<i class="fa fa-edit"></i> </a>';


                        } else {
                            $incorpo = '<a href="'.$pathurl.'" class="btn btn-danger btn-xs">' . $nbcptnotemoycc. '/' . $nbcptetud .'&nbsp;&nbsp;<i class="fa fa-edit"></i></a>';


                        }
                        $liensaisiecc=$incorpo;






                    }else{
                        $pathurl=  $this->generateUrl('siges_redirectvalidaverages', array('classid'=>$eculist->getClasseid(),'specid'=>$spe->getId(),'ueid'=>$eculist->getUeid(),'ecuid'=>$eculist->getEcuid(),'uename'=>$ue->getUename(),'classname'=>$classincor->getClassname(),'semid'=>$eculist->getSemesterid(),'ecuname'=>$ecu->getEcuname(),'ecuname'=>$ecu->getEcuname(),'typaver'=>'MCC'))  ;

                        if ($nbcptnotemoycc >= 1) {
                            $incorpo = '<a href="'.$pathurl.'" class="btn btn-success btn-xs" >' . $nbcptnotemoycc. '/' . $nbcptetud .'&nbsp;&nbsp;<i class="fa fa-edit"></i> </a>';



                        } else {
                            $incorpo = '<a href="'.$pathurl.'" class="btn btn-danger btn-xs">' . $nbcptnotemoycc. '/' . $nbcptetud .'&nbsp;&nbsp;<i class="fa fa-edit"></i></a>';



                        }





                        $liensaisiecc=$incorpo;
                    }





                if ($nbcptnotemoycc==0) {


                    $lienlisting = '';
                } elseif($nbcptnotemoycc <$nbcptetud){



                    $lienlisting = '<a href="http://localhost:8888/SIGES/files/calllisting.php?levelname=' .$lev->getLevelname(). '&amp;semname=' .$sem->getSemname(). '&amp;classid=' .$eculist->getClasseid(). '&amp;specid=' .$spe->getId(). '&amp;ueid=' . $eculist->getUeid(). '&amp;ecuid=' . $eculist->getEcuid(). '&amp;uename=' . $ue->getUename(). '&amp;classname=' . $classincor->getClassname(). ' &amp;semid=' . $eculist->getSemesterid(). ' &amp;ecuname=' . $ecu->getEcuname(). '&amp;idanac='.$idanac.'&amp;idses=&amp;typeaver=" class="btn btn-warning btn-xs"><i class="fa fa-file-pdf-o"></i>  </a>';


                }



                else{

                    $lienlisting = '<a href="http://localhost:8888/SIGES/files/calllisting.php?levelname=' .$lev->getLevelname(). '&amp;semname=' .$sem->getSemname(). '&amp;classid=' .$eculist->getClasseid(). '&amp;specid=' .$spe->getId(). '&amp;ueid=' . $eculist->getUeid(). '&amp;ecuid=' . $eculist->getEcuid(). '&amp;uename=' . $ue->getUename(). '&amp;classname=' . $classincor->getClassname(). ' &amp;semid=' . $eculist->getSemesterid(). ' &amp;ecuname=' . $ecu->getEcuname(). '&amp;idanac='.$idanac.'&amp;idses=&amp;typeaver=" class="btn btn-success btn-xs"><i class="fa fa-file-pdf-o"></i>  </a>';


                }











                    $dateoftheday=new \Datetime();
                    $fdateoftheday= $dateoftheday->format('Y-m-d h:i:s');


                    if($fdateoftheday > $this->get('session')->get('deadline')){


                        $pathurltp=  $this->generateUrl('siges_alertdeadlinevalid', array('classid'=>$eculist->getClasseid(),'specid'=>$spe->getId(),'ueid'=>$eculist->getUeid(),'ecuid'=>$eculist->getEcuid(),'uename'=>$ue->getUename(),'classname'=>$classincor->getClassname(),'semid'=>$eculist->getSemesterid(),'ecuname'=>$ecu->getEcuname(),'ecuname'=>$ecu->getEcuname(),'typaver'=>'MTP'))  ;
                        if ($nbcptnotemoycctp >= 1) {
                            $incorpotp = '<a href="'.$pathurltp.'" class="btn btn-success btn-xs">' . $nbcptnotemoycctp . '/' . $nbcptetud .'&nbsp;&nbsp;<i class="fa fa-edit"></i></span>';




                        } else{

                            $incorpotp = '<a href="'.$pathurltp.'" class="btn btn-danger btn-xs">' . $nbcptnotemoycctp . '/' . $nbcptetud .'&nbsp;&nbsp;<i class="fa fa-edit"></i></span>';
                        }




                        $liensaisietp=$incorpotp;



                    }else{

                        $pathurltp=  $this->generateUrl('siges_redirectvalidaverages', array('classid'=>$eculist->getClasseid(),'specid'=>$spe->getId(),'ueid'=>$eculist->getUeid(),'ecuid'=>$eculist->getEcuid(),'uename'=>$ue->getUename(),'classname'=>$classincor->getClassname(),'semid'=>$eculist->getSemesterid(),'ecuname'=>$ecu->getEcuname(),'ecuname'=>$ecu->getEcuname(),'typaver'=>'MTP'))  ;

                        if ($nbcptnotemoycctp >= 1) {
                            $incorpotp = '<a href="'.$pathurltp.'" class="btn btn-success btn-xs">' . $nbcptnotemoycctp . '/' . $nbcptetud .'&nbsp;&nbsp;<i class="fa fa-edit"></i></span>';
                        } else{

                            $incorpotp = '<a href="'.$pathurltp.'" class="btn btn-danger btn-xs">' . $nbcptnotemoycctp . '/' . $nbcptetud .'&nbsp;&nbsp;<i class="fa fa-edit"></i></span>';
                        }




                        $liensaisietp=$incorpotp;

                    }

















                $output['data'][] = [
                    'specialityname' => $spe->getId(),
                    'levelid' => $classincor->getLevelid(),
                    'classename' => $classincor->getClassname(),

                    'uename' => $ue->getUename(),
                    'ecuname' => $ecu->getEcuname(),
                    'semester' => $eculist->getSemesterId(),
                    'hourvht' => $vht,
                    'averagescc' => $liensaisiecc,
                    'averagestp'=>$liensaisietp,
                    'listing'=>$lienlisting


                ];



            }







        }

        return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);
    }


    /**
     * alert deadline validation
     * @return Response
     */
    public function alertdeadlinevalid()
    {
        return  $this->render('teacher/alertdeadlinevalidation.html.twig', array('current_menu'=>'alertdeadlinevalid'));
    }


    /**
     * redirect datatable editor validation
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectvalidaverages(Request $request)
    {

        $request->getSession()->set('ueidvaedit', $request->query->get('ueid'));
        $request->getSession()->set('ecuidvaedit', $request->query->get('ecuid'));
        $request->getSession()->set('typavervaedit', $request->query->get('typaver'));
        $request->getSession()->set('uenamvaedit', $request->query->get('uename'));
        $request->getSession()->set('ecunamvaedit', $request->query->get('ecuname'));
        $request->getSession()->set('classnamevaedit', $request->query->get('classname'));
        $request->getSession()->set('specidvaedit', $request->query->get('specid'));
        $request->getSession()->set('semidvaedit', $request->query->get('semid'));
        $idanac=$this->get('session')->get('anacad');
        $idspec=$request->query->get('specid');
        $idsem=$request->query->get('semid');
        $leconnecte=$this->getUser()->getUsername();
        $idue=$request->query->get('ueid') ;
        $idecu=$request->query->get('ecuid');
        $typeofaver=$request->query->get('typaver');
        $idclass=$request->query->get('classname');




        return $this->redirect("http://localhost:8888/SIGES/src/Service/averagevaedit.php?idanac=$idanac&&idspec=$idspec&&idsem=$idsem&&idue=$idue&&&idecu=$idecu&&typeofaver=$typeofaver&&idclass=$idclass&&leconnecte=$leconnecte");

    }



    /**
     * Table Valid averages
     * @return Response
     */
    public function validaveragesedit()
    {
        return  $this->render('teacher/validaveragesedit.html.twig', array('current_menu'=>'validaveragesedit'));
    }


    /**
     * Valid all averages
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function validallaverages(Request $request)
    {

        $classeid=$this->get('session')->get('classnamevaedit');
        $specid=$this->get('session')->get('specidvaedit');
        $ueid=$this->get('session')->get('ueidvaedit');
        $ecuid=$this->get('session')->get('ecuidvaedit');
        $uename=$this->get('session')->get('uenamvaedit');
        $classname=$this->get('session')->get('classnamevaedit');
        $semid=$this->get('session')->get('semidvaedit');
        $ecuname=$this->get('session')->get('ecunamvaedit');
        $typaver=$this->get('session')->get('typavervaedit');
        $dateoftheday=new \Datetime();
        $fdateoftheday= $dateoftheday->format('Y-m-d h:i:s');

/*
        if($fdateoftheday > $this->get('session')->get('deadline') && $this->get('session')->get('classnamevaedit')!='MBDSM1'){



            return $this->redirect("http://localhost/SIGESV2/SIGESV2/web/app_dev.php/teachersarea/notifvalidationdead?classid=$classeid&&specid=$specid&&&ueid=$ueid&&ecuid=$ecuid&&uename=$uename&&classname=$classname&&semid=$semid&&ecuname=$ecuname&&typaver=$typaver");



        }*/




        return  $this->render('teacher/validallaverages.html.twig', array('current_menu'=>'validaveragesedit'));


    }


    /**
     * save validallaverages
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function savevalidallaverages(Request $request)
    {




        $iduser=$this->getUser()->getUsername();

        $sql = " UPDATE student_averages SET valid=1,valid_date=now(),valid_user=:validuser WHERE student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeofaverages and student_averages.average between 0 and 20 and student_averages.studentid in ( select studentid from student_speciality where acadyearid=:acadyearid and specialityid=:specialityid and school_classeid=:classeid)  ";
        $params = array('validuser'=>$iduser,'acadyearid'=>$this->get('session')->get('anacad'),'specialityid'=>$this->get('session')->get('specidvaedit'),'semesterid'=>$this->get('session')->get('semidvaedit'),'ueid'=>$this->get('session')->get('ueidvaedit'),'ecuid'=>$this->get('session')->get('ecuidvaedit'),'typeofaverages'=>$this->get('session')->get('typavervaedit'),'classeid'=>$this->get('session')->get('classnamevaedit'));

        $em = $this->getDoctrine()->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute($params);




        $this->get('session')->getFlashBag()->add(
            'notice',
            'Validation effectuée avec succès !!!'
        );

        return $this->redirectToRoute('siges_validaveragesedit');


    }


    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @throws \Exception
     */
    public function unvalidallaverages(Request $request)
    {

        $classeid=$this->get('session')->get('classnamevaedit');
        $specid=$this->get('session')->get('specidvaedit');
        $ueid=$this->get('session')->get('ueidvaedit');
        $ecuid=$this->get('session')->get('ecuidvaedit');
        $uename=$this->get('session')->get('uenamvaedit');
        $classname=$this->get('session')->get('classnamevaedit');
        $semid=$this->get('session')->get('semidvaedit');
        $ecuname=$this->get('session')->get('ecunamvaedit');
        $typaver=$this->get('session')->get('typavervaedit');
        $dateoftheday=new \Datetime();
        $fdateoftheday= $dateoftheday->format('Y-m-d h:i:s');


    /*    if($fdateoftheday > $this->get('session')->get('deadline') && $this->get('session')->get('classnamevaedit')!='MBDSM1'){



            return $this->redirect("http://localhost/SIGESV2/SIGESV2/web/app_dev.php/teachersarea/notifvalidationdead?classid=$classeid&&specid=$specid&&&ueid=$ueid&&ecuid=$ecuid&&uename=$uename&&classname=$classname&&semid=$semid&&ecuname=$ecuname&&typaver=$typaver");



        }*/



        return  $this->render('teacher/unvalidallaverages.html.twig', array('current_menu'=>'unvalidallaverages'));


    }


    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function saveunvalidallaverages(Request $request)
    {

        $iduser=$this->getUser()->getUsername();

        $sql = " UPDATE student_averages SET valid=0 WHERE student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeofaverages and valid=1 and valid_user=:validuser and student_averages.studentid in ( select studentid from student_speciality where acadyearid=:acadyearid and specialityid=:specialityid and school_classeid=:classeid)";
        $params = array('validuser'=>$iduser,'acadyearid'=>$this->get('session')->get('anacad'),'specialityid'=>$this->get('session')->get('specidvaedit'),'semesterid'=>$this->get('session')->get('semidvaedit'),'ueid'=>$this->get('session')->get('ueidvaedit'),'ecuid'=>$this->get('session')->get('ecuidvaedit'),'typeofaverages'=>$this->get('session')->get('typavervaedit'),'classeid'=>$this->get('session')->get('classnamevaedit'));

        $em = $this->getDoctrine()->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute($params);




        $this->get('session')->getFlashBag()->add(
            'notice',
            'Annulation validation effectuée avec succès !!!'
        );

        return $this->redirectToRoute('siges_validaveragesedit');


    }







}
