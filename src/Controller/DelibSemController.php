<?php

namespace App\Controller;

use App\Entity\AcademicYear;
use App\Entity\StudentAverages;
use App\Entity\StudentExamNotes;
use App\Entity\UeSpeciality;
use App\Form\AcademicYearType;
use App\Repository\EcuRepository;
use App\Repository\StudentAveragesRepository;
use App\Repository\StudentExamNotesRepository;
use App\Repository\StudentRepository;
use App\Repository\StudentSpecialityRepository;
use App\Repository\UeRepository;
use App\Repository\UeValidatedRepository;
use App\Service\MyFunction;
use Doctrine\ORM\Query\ResultSetMapping;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\MyFunctionDelib;

class DelibSemController extends AbstractController
{


    /**
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function choiceacadyear(Request $request)
    {
        $c=new AcademicYear();
        $form=$this -> createForm(AcademicYearType::class,$c);


        if ($request->getMethod()=='POST'){

            $form->handleRequest($request);
            if ($form->isValid()) {

                $anacad =$form['academicyear']->getData()->getAcademicyear();
                $idanacad =$form['academicyear']->getData()->getId();

                $request->getSession()->set('anacademiq', $anacad);
                $request->getSession()->set('idanacademiq', $idanacad);

                return $this->redirectToRoute('siges_dashboarddelib');
            }}


        return  $this->render('delibsem/choiceacadyear.html.twig',array('f'=>$form->createView()));
    }



    public function dashboarddelib()
    {

        return  $this->render('delibsem/dashboarddelib.html.twig', array('current_menu'=>'dashboarddelib'));
    }



    public function redirectdelibspecbylevel(Request $request)
    {



        $request->getSession()->set('idsesdelib', $request->query->get('idses'));
        $request->getSession()->set('semtypedelib', $request->query->get('semtype'));

        return $this->redirectToRoute('siges_delibspecbylevel',array('semtype'=>$request->query->get('semtype'),'idses'=>$request->query->get('idses')));
    }


    public function delibspecbylevel()
    {
        $idses=$this->get('session')->get('idsesdelib');
        $semtype=$this->get('session')->get('semtypedelib');
        return  $this->render('delibsem/delibspecbylevel.html.twig', array('current_menu'=>'delibspecbylevel/'.$idses.'/'.$semtype.''));
    }




    public function listdelibspecbylevel(Request $request, StudentSpecialityRepository $studspecrepo, MyFunction $callfunction)
    {
        $idanac = $this->get('session')->get('idanacademiq');
        $semtype = $this->get('session')->get('semtypedelib');
        $idses = $this->get('session')->get('idsesdelib');

        if ($idses == 'SE1') {


            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $search = $request->get('search');
            $filters = [
                'query' => @$search['value']
            ];

            $users = $studspecrepo->levelspec($idanac, $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($studspecrepo->levelspec($idanac, $filters, 0, false)),
                'recordsTotal' => count($studspecrepo->levelspec($idanac, 0, false))
            );

            foreach ($users as $user) {


                $semster = $callfunction->findsemesterid($user['levelid'], $semtype);


                if ($user['specialityid'] == 'TCSIGLSITW') {

                    $libspec = 'INFORMATIQUE';
                } else {
                    $libspec = $user['specialityid'];
                }
                $urldelib = $this->generateUrl('siges_redirectdelibbylevel', array('levelid' => $user['levelid'], 'specid' => $user['specialityid'], 'idsem' => $semster, 'idses' => $idses));


                $liendelib = '<a href="' . $urldelib . '"  class="btn btn-danger btn-xs"> <i class="material-icons">school</i>  </a>';


                $output['data'][] = [
                    'levelid' => $user['levelid'],
                    'specid' => $libspec,
                    'idsem' => $semster,

                    'delib' => $liendelib,


                ];
            }

            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);

        } else {
            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $search = $request->get('search');
            $filters = [
                'query' => @$search['value']
            ];

            $users = $studspecrepo->levelspecse2($idanac, $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($studspecrepo->levelspecse2($idanac, $filters, 0, false)),
                'recordsTotal' => count($studspecrepo->levelspecse2($idanac, 0, false))
            );

            foreach ($users as $user) {


                $semster = $callfunction->findsemesterid($user['levelid'], $semtype);


                if ($user['specialityid'] == 'TCSIGLSITW') {

                    $libspec = 'INFORMATIQUE';
                } else {
                    $libspec = $user['specialityid'];
                }
                $urldelib = $this->generateUrl('siges_redirectdelibbylevel', array('levelid' => $user['levelid'], 'specid' => $user['specialityid'], 'idsem' => $semster, 'idses' => $idses));


                $liendelib = '<a href="' . $urldelib . '"  class="btn btn-danger btn-xs"> <i class="material-icons">school</i>  </a>';


                $output['data'][] = [
                    'levelid' => $user['levelid'],
                    'specid' => $libspec,
                    'idsem' => $semster,

                    'delib' => $liendelib,


                ];
            }

            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);

        }


    }



    public function redirectdelibbylevel(Request $request)
    {



        $request->getSession()->set('leveliddelib', $request->query->get('levelid'));
        $request->getSession()->set('speciddelib', $request->query->get('specid'));
        $request->getSession()->set('semiddelib', $request->query->get('idsem'));



        return $this->redirectToRoute('siges_dashboarddelibbylevel');
    }


    public function dashboarddelibbylevel()
    {

        return  $this->render('delibsem/dashboarddelibbylevel.html.twig', array('current_menu'=>'dashboarddelibbylevel'));
    }





    public function deleteavernull(Request $request)
    {
        $idanac=$this->get('session')->get('anacad');
        $idspec=$this->get('session')->get('speciddelib');
        $idsem=$this->get('session')->get('semiddelib');
        $idses=$this->get('session')->get('idsesdelib');
        $idniveau=$this->get('session')->get('leveliddelib');


        if($idses=='SE1'){



            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();
            $rsm->addScalarResult('nbavert', 'nbavert');

            $sql = "SELECT count(*) as nbavert FROM `student_averages`  WHERE  acadyearid=:acadyearid and specialityid=:specialityid and semesterid=:semesterid AND `average` IS NULL  ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('acadyearid', $idanac);
            $query->setParameter('specialityid', $idspec);
            $query->setParameter('semesterid', $idsem);
            $aver= $query->getResult();


            foreach ($aver as $n) {
                $nbavert= $n['nbavert'];

            }





            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();
            $rsm->addScalarResult('nbexamnotes', 'nbexamnotes');

            $sql = "SELECT COUNT(*) as nbexamnotes FROM `student_examnotes` WHERE  acadyearid=:acadyearid and specialityid=:specialityid and semesterid=:semesterid  AND `exam_notes` IS NULL and sessionid=:idses  ";



            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('acadyearid', $idanac);
            $query->setParameter('specialityid', $idspec);
            $query->setParameter('semesterid', $idsem);
            $query->setParameter('idses', $idses);

            $nex= $query->getResult();


            foreach ($nex as $ne) {
                $nbexamnotes= $ne['nbexamnotes'];

            }




            if($nbavert==0 and $nbexamnotes==0)
            {


                  return  $this->render('delibsem/alertnotnullaver.html.twig');



            }


            else{

                   return  $this->render('delibsem/alertdeleteavernull.html.twig');


            }







        }else{








            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();
            $rsm->addScalarResult('nbexamnotes', 'nbexamnotes');

            $sql = "SELECT count(*) as nbexamnotes FROM `student_examnotes`  WHERE  acadyearid=:acadyearid and specialityid=:specialityid and semesterid=:semesterid AND `exam_notes` IS NULL and sessionid=:idses  ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('acadyearid', $idanac);
            $query->setParameter('specialityid', $idspec);
            $query->setParameter('semesterid', $idsem);
            $query->setParameter('idses', $idses);
            $nex= $query->getResult();


            foreach ($nex as $ne) {
                $nbexamnotes= $ne['nbexamnotes'];

            }


            if( $nbexamnotes != 0 )
            {
                return  $this->render('delibsem/alertdeleteavernull.html.twig');

            }else{



                return  $this->render('delibsem/alertnotnullaver.html.twig');
            }








        }












    }






    public function savedeleteavernull(Request $request)
    {

        if($this->get('session')->get('idsesdelib')=='SE1') {


            $sql = "DELETE FROM  student_averages WHERE  acadyearid=:acadyearid and specialityid=:specialityid and semesterid=:semesterid AND `average` IS NULL";
            $params = array('acadyearid'=>$this->get('session')->get('anacad'), 'specialityid'=>$this->get('session')->get('speciddelib'),'semesterid'=>$this->get('session')->get('semiddelib'));

            $em = $this->getDoctrine()->getManager();
            $stmt = $em->getConnection()->prepare($sql);
            $stmt->execute($params);



            $sql = "DELETE FROM  student_examnotes WHERE  acadyearid=:acadyearid and specialityid=:specialityid and semesterid=:semesterid AND `exam_notes` IS NULL and sessionid=:idses";
            $params = array('acadyearid'=>$this->get('session')->get('anacad'), 'specialityid'=>$this->get('session')->get('speciddelib'),'semesterid'=>$this->get('session')->get('semiddelib'),'idses'=>$this->get('session')->get('idsesdelib'));

            $em = $this->getDoctrine()->getManager();
            $stmt = $em->getConnection()->prepare($sql);
            $stmt->execute($params);


            $this->get('session')->getFlashBag()->add(
                'notice',
                'Moyennes/notes annulées avec succès !!!'
            );

            return $this->redirectToRoute('siges_dashboarddelibbylevel');



        }
        else{


            $sql = "DELETE FROM  student_examnotes WHERE  acadyearid=:acadyearid and specialityid=:specialityid and semesterid=:semesterid AND `exam_notes` IS NULL and sessionid=:idses";
            $params = array('acadyearid'=>$this->get('session')->get('anacad'), 'specialityid'=>$this->get('session')->get('speciddelib'),'semesterid'=>$this->get('session')->get('semiddelib'),'idses'=>$this->get('session')->get('idsesdelib'));

            $em = $this->getDoctrine()->getManager();
            $stmt = $em->getConnection()->prepare($sql);
            $stmt->execute($params);



            $this->get('session')->getFlashBag()->add(
                'notice',
                'Moyennes/notes annulées avec succès!!!'
            );

            return $this->redirectToRoute('siges_dashboarddelibbylevel');


        }



    }





    public function viewaverzero(Request $request)
    {

        return  $this->render('delibsem/viewaverzero.html.twig');
    }




    public function listviewaverzero(Request $request, StudentSpecialityRepository $stuspecrepo, StudentRepository $studrepo, EcuRepository $ecurepo, UeRepository $uerepo)
    {
        $idanac = $this->get('session')->get('anacad');
        $idspecialite = $this->get('session')->get('speciddelib');
        $idsem = $this->get('session')->get('semiddelib');
        $idses = $this->get('session')->get('idsesdelib');

        $idlevel = $this->get('session')->get('leveliddelib');






            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $searchconsulnotexclass = $request->get('searchconsulnotexclass');
            $filters = [
                'query' => @$searchconsulnotexclass['value']
            ];

            $users = $stuspecrepo->averzero($idanac,$idspecialite, $idsem,
                $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($stuspecrepo->averzero($idanac,$idspecialite, $idsem, $filters, 0, false)),
                'recordsTotal' => count($stuspecrepo->averzero($idanac,$idspecialite, $idsem, 0, false))
            );

            foreach ($users as $user) {
                $idstudent = $user['studentid'];


                $studentecu = $studrepo->findOneById($idstudent);




                $ecu = $ecurepo->findOneById($user['ecuid']);




                $em = $this->getDoctrine()->getManager();


                $rsm = new ResultSetMapping();

                $rsm->addScalarResult('picture', 'picture');
                $rsm->addScalarResult('school_classeid', 'school_classeid');

                $sql = "SELECT picture,school_classeid FROM `student_speciality`  WHERE student_speciality.studentid=:idstud and student_speciality.specialityid=:idspec and student_speciality.acadyearid=:idanac and student_speciality.levelid=:idlev  ";
                $query = $em->createNativeQuery($sql, $rsm);
                $query->setParameter('idspec', $idspecialite);
                $query->setParameter('idstud', $idstudent);

                $query->setParameter('idanac', $idanac);
                $query->setParameter('idlev', $idlevel);


                $studpic = $query->getResult();


                foreach ($studpic as $ne) {


                    $studentpic = $ne['picture'];
                    $classeid = $ne['school_classeid'];


                }


                $lientof= '
                                                <img class="img" onclick="window.open(this.src,\'_blank\',\'toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=0, copyhistory=0, menuBar=0, width=\'+this.width+\', height=\'+this.height);" src="http://localhost/SIGESV2/SIGESV2/web/photoetudiant/'.$studentpic.'" />
                                          ';
















                $output['data'][] = [
                    'username' => $studentecu->getId(),
                    'tof' => $lientof,
                    'idclasse' => $classeid,
                    'firstname' => $studentecu->getFirstname(),
                    'lastname' => $studentecu->getLastname(),
                    'kind' => $studentecu->getKind(),


                    'ecu' =>$ecu->getEcuname(),

                    'type' =>$user['typeof_averages'],

                    'aver' =>$user['average']


                ];



        }


        return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);




    }






    public function viewnotexamzero(Request $request)
    {

        return  $this->render('delibsem/viewnotexamzero.html.twig');
    }




    public function listviewnotexamzero(Request $request, StudentSpecialityRepository $stuspecrepo, StudentRepository $studrepo, EcuRepository $ecurepo, UeRepository $uerepo)
    {
        $idanac = $this->get('session')->get('anacad');
        $idspecialite = $this->get('session')->get('speciddelib');
        $idsem = $this->get('session')->get('semiddelib');
        $idses = $this->get('session')->get('idsesdelib');

        $idlevel = $this->get('session')->get('leveliddelib');






        $length = $request->get('length');
        $length = $length && ($length != -1) ? $length : 0;

        $start = $request->get('start');
        $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

        $searchconsulnotexclass = $request->get('searchconsulnotexclass');
        $filters = [
            'query' => @$searchconsulnotexclass['value']
        ];

        $users = $stuspecrepo->notexamzero($idanac,$idspecialite, $idsem,$idses,
            $filters, $start, $length
        );

        $output = array(
            'data' => array(),
            'recordsFiltered' => count($stuspecrepo->notexamzero($idanac,$idspecialite, $idsem,$idses, $filters, 0, false)),
            'recordsTotal' => count($stuspecrepo->notexamzero($idanac,$idspecialite, $idsem,$idses, 0, false))
        );

        foreach ($users as $user) {
            $idstudent = $user['studentid'];


            $studentecu = $studrepo->findOneById($idstudent);



            $ecu = $ecurepo->findOneById($user['ecuid']);




            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();

            $rsm->addScalarResult('picture', 'picture');
            $rsm->addScalarResult('school_classeid', 'school_classeid');

            $sql = "SELECT picture,school_classeid FROM `student_speciality`  WHERE student_speciality.studentid=:idstud and student_speciality.specialityid=:idspec and student_speciality.acadyearid=:idanac and student_speciality.levelid=:idlev  ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('idspec', $idspecialite);
            $query->setParameter('idstud', $idstudent);

            $query->setParameter('idanac', $idanac);
            $query->setParameter('idlev', $idlevel);


            $studpic = $query->getResult();


            foreach ($studpic as $ne) {


                $studentpic = $ne['picture'];
                $classeid = $ne['school_classeid'];


            }


            $lientof= '
                                                <img class="img" onclick="window.open(this.src,\'_blank\',\'toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=0, copyhistory=0, menuBar=0, width=\'+this.width+\', height=\'+this.height);" src="http://localhost/SIGESV2/SIGESV2/web/photoetudiant/'.$studentpic.'" />
                                          ';
















            $output['data'][] = [
                'username' => $studentecu->getId(),
                'tof' => $lientof,
                'idclasse' => $classeid,
                'firstname' => $studentecu->getFirstname(),
                'lastname' => $studentecu->getLastname(),
                'kind' => $studentecu->getKind(),


                'ecu' =>$ecu->getEcuname(),

                'type' =>$user['typeof_examnotes'],

                'aver' =>$user['exam_notes']


            ];



        }


        return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);




    }



    public function consultaveragedelib()
    {
        return  $this->render('delibsem/consultaveragedelib.html.twig',array('current_menu'=>'consultaveragedelib'));
    }




    public function listconsultaveragedelib(Request $request, EcuRepository $ecurepo, UeRepository $uerepo)
    {
        $idspec=$this->get('session')->get('speciddelib');
        $idsem=$this->get('session')->get('semiddelib');

        $idanac=$this->get('session')->get('anacad');

        $length = $request->get('length');
        $length = $length && ($length!=-1)?$length:0;

        $start = $request->get('start');
        $start = $length?($start && ($start!=-1)?$start:0)/$length:0;

        $search = $request->get('search');
        $filters = [
            'query' => @$search['value']
        ];

        $users = $ecurepo->spececu($idspec,$idsem,$idanac,
            $filters, $start, $length
        );

        $output = array(
            'data' => array(),
            'recordsFiltered' => count($ecurepo->spececu($idspec,$idsem,$idanac,$filters, 0, false)),
            'recordsTotal' => count($ecurepo->spececu($idspec,$idsem,$idanac, 0, false))
        );

        foreach ($users as $listecu) {


            $ue = $uerepo->findOneById($listecu->getUeid());


            $ecu = $ecurepo->findOneById($listecu->getEcuid());



            $urlconsultlicence = $this->generateUrl('siges_viewaveragesem', array('idue' =>$ue->getId(), 'idecu' => $ecu->getId(), 'libue' => $ue->getUename(), 'libecu' => $ecu->getEcuname()));



            $urlconsultmaster = $this->generateUrl('siges_viewaveragesem', array('idue' =>$ue->getId(), 'idecu' => $ecu->getId(), 'libue' => $ue->getUename(), 'libecu' => $ecu->getEcuname()));



            $lien1='<a href="' . $urlconsultlicence . '" class="btn btn-info btn-xs"><i class="fa fa-search">Voir</i>  </a>';


            $lien2='<a href="' . $urlconsultmaster . '" class="btn btn-info btn-xs"><i class="fa fa-search">Voir</i>  </a>';



            if($this->get('session')->get('leveliddelib')=="M1" || $this->get('session')->get('leveliddelib')=="M2")
            {
                $lien=$lien2;
            }else{
                $lien=$lien1;
            }












            $output['data'][] = [


                'ue' => $ue->getUename(),
                'ecu' => $ecu->getEcuname(),

                'voir'=>$lien



            ];
        }

        return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);
    }





    public function viewaveragesem(Request $request)
    {


        $request->getSession()->set('ecuconsultdelibaver',$request->query->get('idecu'));



        $request->getSession()->set('libecuconsultdelibaver', $request->query->get('libecu'));


        $request->getSession()->set('ueconsultdelibaver', $request->query->get('idue'));


        $request->getSession()->set('libueconsultdelibaver', $request->query->get('libue'));

        return  $this->render('delibsem/viewaveragesem.html.twig');
    }




    public function listviewaveragesem(Request $request, StudentSpecialityRepository $studspecrepo, StudentRepository $studrepo, UeValidatedRepository $uevalidrepo, MyFunctionDelib $callfunctiondelib, StudentAveragesRepository $studaverrepo, StudentExamNotesRepository $studexamrepo)
    {
        $idanac = $this->get('session')->get('anacad');
        $idspecialite = $this->get('session')->get('speciddelib');
        $idsem = $this->get('session')->get('semiddelib');
        $idses = $this->get('session')->get('idsesdelib');

        $idlevel = $this->get('session')->get('leveliddelib');




        if ($idses == 'SE1') {

            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $searchconsulnotexclass = $request->get('searchconsulnotexclass');
            $filters = [
                'query' => @$searchconsulnotexclass['value']
            ];

            $users = $studspecrepo->studspec($idanac, $idsem, $idspecialite, $idses,
                $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($studspecrepo->studspec($idanac,$idanac, $idsem, $idspecialite, $idses, $filters, 0, false)),
                'recordsTotal' => count($studspecrepo->studspec($idanac, $idsem, $idspecialite, $idses, 0, false))
            );

            foreach ($users as $user) {
                $idstudent = $user['studentid'];


                $studentecu = $studrepo->findOneById($idstudent);


                $em = $this->getDoctrine()->getManager();


                $rsm = new ResultSetMapping();

                $rsm->addScalarResult('picture', 'picture');
                $rsm->addScalarResult('school_classeid', 'school_classeid');

                $sql = "SELECT picture,school_classeid FROM `student_speciality`  WHERE student_speciality.studentid=:idstud and student_speciality.specialityid=:idspec and student_speciality.acadyearid=:idanac and student_speciality.levelid=:idlev  ";
                $query = $em->createNativeQuery($sql, $rsm);
                $query->setParameter('idspec', $idspecialite);
                $query->setParameter('idstud', $idstudent);

                $query->setParameter('idanac', $idanac);
                $query->setParameter('idlev', $idlevel);


                $studpic = $query->getResult();


                foreach ($studpic as $ne) {


                    $studentpic = $ne['picture'];
                    $classeid = $ne['school_classeid'];


                }


                $lientof= '
                                                <img class="img" onclick="window.open(this.src,\'_blank\',\'toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=0, copyhistory=0, menuBar=0, width=\'+this.width+\', height=\'+this.height);" src="/SIGES/public/images/photoetudiant/'.$studentpic.'" />
                                          ';






                $uevalide = $uevalidrepo->findOneBy(array('studentid' => $idstudent, 'specialityid' => $idspecialite, 'semesterid' => $idsem, 'ueid' => $this->get('session')->get('ueconsultdelibaver')));
                if ($uevalide) {

                    if ($uevalide->getSessionid() == 'SE1') {



                        $averagcc=$callfunctiondelib->averagecc($idstudent,$idspecialite,$uevalide->getSemesterid(), $this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$uevalide->getAcadyearid());
                        $notexam=$callfunctiondelib->examnotes($idstudent,$idspecialite,$uevalide->getSemesterid(),$uevalide->getSessionid(),$this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$uevalide->getAcadyearid());


                        $averagcctp=$callfunctiondelib->averagecctp($idstudent,$idspecialite,$uevalide->getSemesterid(), $this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$uevalide->getAcadyearid());
                        $notexamtp=$callfunctiondelib->examnotestp($idstudent,$idspecialite,$uevalide->getSemesterid(),$uevalide->getSessionid(),$this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$uevalide->getAcadyearid());



                        $aversem = number_format((4 * $averagcc + 6 * $notexam) / 10, 2);



                        if ($averagcctp == "") {
                            $aversemtp = "";
                        }else{
                            $aversemtp = number_format((4 * $averagcctp + 6 * $notexamtp) / 10, 2);
                        }






                        if ($aversemtp == "") {
                            $averageecu = $aversem;
                        } else {
                            $averageecu = number_format((0.6 * $aversem + 0.4 * $aversemtp), 2);
                        }


                        $creditvalideue = $uevalide->getCreditvalided();
                    }
                    else {



                        $averagcc=$callfunctiondelib->averagecc($idstudent,$idspecialite,$uevalide->getSemesterid(), $this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$uevalide->getAcadyearid());




                        $etudiant101 = $studexamrepo->findOneBy(array(
                            'studentid' => $idstudent, 'specialityid' => $idspecialite, 'ecuid' => $this->get('session')->get('ecuconsultdelibaver'), 'semesterid' => $uevalide->getSemesterid(), 'sessionid' => $uevalide->getSessionid(), 'typeofexamnotes' => 'EXCC', 'acadyearid' => $uevalide->getAcadyearid()
                        ));
                        if ($etudiant101) {



                                $notexam = $etudiant101->getExamnotes();



                        } else {
                            $notexam = "";
                        }





                        if ($uevalide->getAcadyearid() == '2015-2016') {
                            $averagcc = number_format((float)$notexam, 2);
                            $aversem = number_format((float)$notexam, 2);

                        } else {
                            $aversem = number_format((4 * $averagcc + 6 * $notexam) / 10, 2);
                        }



                        $averagcctp=$callfunctiondelib->averagecctp($idstudent,$idspecialite,$uevalide->getSemesterid(), $this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$uevalide->getAcadyearid());



                        $etudiant103 =$studexamrepo->findOneBy(array('studentid' => $idstudent, 'specialityid' => $idspecialite, 'ecuid' => $this->get('session')->get('ecuconsultdelibaver'), 'semesterid' => $uevalide->getSemesterid(), 'sessionid' => $uevalide->getSessionid(), 'typeofexamnotes' => 'EXTP', 'acadyearid' => $uevalide->getAcadyearid()));
                        if($etudiant103){
                                $notexamtp=$etudiant103->getExamnotes();

                            }

                        else{
                            $notexamtp="";
                        }



                        if ($averagcctp == ""  ) {
                            $aversemtp = "";
                        }else{
                            $aversemtp = number_format((4 * $averagcctp + 6 * $notexamtp) / 10, 2);
                        }







                        if($aversemtp==""){

                            if($etudiant101->getEntryuser()=='admin'){
                                $averageecu=$aversem;

                            }else{


                                $averageecu1=$aversem ;
                                if($averageecu1 < $notexam){
                                    $averageecu=$notexam;
                                }else{
                                    $averageecu=$averageecu1;
                                }

                            }

                        }else{
                            if($etudiant101->getEntryuser()=='admin'){
                                $m1=$aversem;

                            }else{

                                $averageecu1=$aversem ;
                                if($averageecu1 < $notexam){

                                    $m1=$notexam;
                                    $aversem=$notexam;

                                }else{
                                    $m1=$averageecu1;
                                }

                            }

                            if($etudiant103->getEntryuser()=='admin'){
                                $m2=$aversemtp;

                            }else{


                                $averageecu2=$aversemtp ;
                                if($averageecu2 < $notexamtp){
                                    $m2=$notexamtp;
                                    $aversemtp=$notexamtp;

                                }else{
                                    $m2=$averageecu2;
                                }




                            }





                            $averageecu=number_format((0.6*$m1+0.4*$m2),2);

                        }





                        $creditvalideue = $uevalide->getCreditvalided();


                    }
                }
                else {






                    $averagcc=$callfunctiondelib->averagecc($idstudent,$idspecialite,$idsem, $this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$idanac);
                    $notexam=$callfunctiondelib->examnotes($idstudent,$idspecialite,$idsem,$idses,$this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$idanac);





                    if($averagcc==""){
                        $aversem = "";
                    }else{
                        $aversem = number_format((4 * $averagcc + 6 * $notexam) / 10, 2);
                    }





                    $averagcctp=$callfunctiondelib->averagecctp($idstudent,$idspecialite,$idsem, $this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$idanac);
                    $notexamtp=$callfunctiondelib->examnotestp($idstudent,$idspecialite,$idsem,$idses,$this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$idanac);




                    if($averagcctp==""){
                        $aversemtp = "";
                    }else{
                        $aversemtp = number_format((4 * $averagcctp + 6 * $notexamtp) / 10, 2);
                    }





                    if ( $aversemtp == "") {
                        $averageecu = $aversem;
                    } else {
                        $averageecu = number_format((0.6 * $aversem + 0.4 * $aversemtp), 2);
                    }



                    $em = $this->getDoctrine()->getManager();

                    $uetype = $em->getRepository(UeSpeciality::class)->findBy(array('specialityid' => $idspecialite, 'semester' => $idsem, 'acadyearid' => $idanac, 'ueid' => $this->get('session')->get('ueconsultdelibaver')));

                    var_dump($uetype);
                    die();


                    $creditvalideue = $callfunctiondelib->creditsvalide($idstudent, $idsem, $this->get('session')->get('ueconsultdelibaver'), $idanac, $idspecialite, $idses);














                }





                $output['data'][] = [
                    'username' => $studentecu->getId(),
                    'tof' => $lientof,
                    'idclasse' => $classeid,
                    'firstname' => $studentecu->getFirstname(),
                    'lastname' => $studentecu->getLastname(),
                    'kind' => $studentecu->getKind(),
                    'averagecc' => $averagcc,

                    'examnote' =>$notexam,
                    'average' =>$aversem ,
                    'averagecctp' =>$averagcctp,
                    'examnotetp' => $notexamtp,
                    'averagetp' => $aversemtp,
                    'moyenneecu' => $averageecu,
                    'creditue' => $creditvalideue,



                ];
            }

            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);
        }







    }





}
