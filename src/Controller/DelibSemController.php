<?php

namespace App\Controller;

use App\Entity\AcademicYear;
use App\Entity\HalfYearlyDelib;
use App\Entity\StudentAverages;
use App\Entity\StudentExamNotes;
use App\Entity\UeSpeciality;
use App\Entity\UeValidated;
use App\Form\AcademicYearType;
use App\Repository\AcademicYearRepository;
use App\Repository\EcuRepository;
use App\Repository\EcuSpecialityRepository;
use App\Repository\HalfYearlyDelibRepository;
use App\Repository\SemesterRepository;
use App\Repository\StudentAveragesRepository;
use App\Repository\StudentExamNotesRepository;
use App\Repository\StudentRepository;
use App\Repository\StudentSpecialityRepository;
use App\Repository\UeRepository;
use App\Repository\UeSpecialityRepository;
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
                $request->getSession()->set('anacad', $idanacad);

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




    public function listdelibspecbylevel(Request $request, StudentSpecialityRepository $studspecrepo, MyFunction $callfunction, SemesterRepository $semrepo)
    {
        $idanac = $this->get('session')->get('anacad');
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


                $liendelib = '<a href="' . $urldelib . '"  class="btn btn-primary btn-xs"> <i class="material-icons">touch_app</i> Effectuer la Déliberation </a>';


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

            $users = $studspecrepo->levelspecse2($idanac,$semtype, $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($studspecrepo->levelspecse2($idanac,$semtype, $filters, 0, false)),
                'recordsTotal' => count($studspecrepo->levelspecse2($idanac,$semtype, 0, false))
            );

            foreach ($users as $user) {


               $levelid = $semrepo->findOneById($user['semesterid']);


                if ($user['specialityid'] == 'TCSIGLSITW') {

                    $libspec = 'INFORMATIQUE';
                } else {
                    $libspec = $user['specialityid'];
                }
                $urldelib = $this->generateUrl('siges_redirectdelibbylevel', array('levelid' => $levelid->getLevel()->getId(), 'specid' => $user['specialityid'], 'idsem' => $user['semesterid'], 'idses' => $idses));


                $liendelib = '<a href="' . $urldelib . '"  class="btn btn-primary btn-xs"> <i class="material-icons">touch_app</i> Effectuer la Déliberation </a>';


                $output['data'][] = [
                    'levelid' => $levelid->getLevel()->getId(),
                    'specid' => $libspec,
                    'idsem' => $user['semesterid'],

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



            $urlconsultmaster = $this->generateUrl('siges_viewaveragesemmaster', array('idue' =>$ue->getId(), 'idecu' => $ecu->getId(), 'libue' => $ue->getUename(), 'libecu' => $ecu->getEcuname()));



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
        else{



            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $searchconsulnotexclass = $request->get('searchconsulnotexclass');
            $filters = [
                'query' => @$searchconsulnotexclass['value']
            ];

            $users = $studspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses,
                $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($studspecrepo->studspecse2($idanac,$idanac, $idsem, $idspecialite, $idses, $filters, 0, false)),
                'recordsTotal' => count($studspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses, 0, false))
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


    /**
     * Critères de déliberation Licence
     * @return Response
     */
    public function startdeliblicence()
    {

        return $this->render('delibsem/startdeliblicence.html.twig',array('current_menu'=>'startdeliblicence'));

    }


    /**
     * Effectif Etudiants
     * @param Request $request
     * @return Response
     */
    public function startdelib2(Request $request)
    {

        if($this->get('session')->get('idsesdelib')=='SE1'){




            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();
            $rsm->addScalarResult('nbstudent', 'nbstudent');

            $sql = "SELECT count(  DISTINCT `studentid`) as nbstudent FROM `student_speciality`  WHERE  acadyearid=:acadyearid and specialityid=:specialityid  and levelid=:levelid  ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('acadyearid', $this->get('session')->get('anacad'));
            $query->setParameter('specialityid', $this->get('session')->get('speciddelib'));
            $query->setParameter('levelid', $this->get('session')->get('leveliddelib'));


            $nbstdcc = $query->getResult();

            foreach ($nbstdcc as $nst) {
                $cptnbetud= $nst['nbstudent'];

                $request->getSession()->set('totaletud', $cptnbetud);

            }




            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();
            $rsm->addScalarResult('nbadmissem', 'nbadmissem');

            $sql = "SELECT count(  DISTINCT `studentid`) as nbadmissem FROM `student_speciality`  WHERE  acadyearid=:acadyearid and specialityid=:specialityid  and levelid=:levelid  and studentid IN (SELECT  DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib`   WHERE  halfyearly_delib.specialityid=:specialityid    and  halfyearly_delib.semesterid=:semesterid  and  halfyearly_delib.decision='ADMIS' and  halfyearly_delib.acadyearid !=:acadyearid) ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('acadyearid', $this->get('session')->get('anacad'));
            $query->setParameter('specialityid', $this->get('session')->get('speciddelib'));
            $query->setParameter('semesterid', $this->get('session')->get('semiddelib'));
            $query->setParameter('levelid', $this->get('session')->get('leveliddelib'));


            $nbetudadsem = $query->getResult();

            foreach ($nbetudadsem as $ne) {
                $cptnbetudadses1 = $ne['nbadmissem'];


                $nbattendus=$cptnbetud - $cptnbetudadses1;


                $request->getSession()->set('nbattendus', $nbattendus);

            }






            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();
            $rsm->addScalarResult('nbetudianteva', 'nbetudianteva');

            $sql = "SELECT count(  DISTINCT `studentid`) as nbetudianteva FROM `student_examnotes`  WHERE  acadyearid=:acadyearid and specialityid=:specialityid  and semesterid=:semesterid and sessionid=:sessionid  and studentid NOT IN (SELECT  DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib`   WHERE  halfyearly_delib.specialityid=:specialityid    and  halfyearly_delib.semesterid=:semesterid  and  halfyearly_delib.decision='ADMIS' and  halfyearly_delib.acadyearid !=:acadyearid) ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('acadyearid', $this->get('session')->get('anacad'));
            $query->setParameter('specialityid', $this->get('session')->get('speciddelib'));
            $query->setParameter('semesterid', $this->get('session')->get('semiddelib'));
            $query->setParameter('sessionid', $this->get('session')->get('idsesdelib'));


            $nbetudeva = $query->getResult();

            foreach ($nbetudeva as $ne) {
                $cptnbetudeva = $ne['nbetudianteva'];



                $request->getSession()->set('totaletudeva', $cptnbetudeva);

            }



            $cptabs=$this->get('session')->get('totaletud') - $this->get('session')->get('totaletudeva');

            $request->getSession()->set('cptabs', $cptabs);










            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();
            $rsm->addScalarResult('nbetudiantf', 'nbetudiantf');

            $sql = "SELECT count(  DISTINCT student_speciality.`studentid`) as nbetudiantf FROM `student_speciality` INNER JOIN student on student.id=student_speciality.studentid  WHERE  student_speciality.acadyearid=:acadyearid and student_speciality.specialityid=:specialityid  and student_speciality.levelid=:levelid and student.kind='F' ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('acadyearid', $this->get('session')->get('anacad'));
            $query->setParameter('specialityid', $this->get('session')->get('speciddelib'));
            $query->setParameter('levelid', $this->get('session')->get('leveliddelib'));


            $nbetudf = $query->getResult();



            foreach ($nbetudf as $ne) {


                $cptnbetudf = $ne['nbetudiantf'];

                $request->getSession()->set('totaletudf', $cptnbetudf);

            }










            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();
            $rsm->addScalarResult('nbetudiantevaf', 'nbetudiantevaf');

            $sql = "SELECT count(  DISTINCT student_examnotes.`studentid`) as nbetudiantevaf FROM `student_examnotes` INNER JOIN student on student.id=student_examnotes.studentid WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid  and student_examnotes.semesterid=:semesterid and student_examnotes.sessionid=:sessionid and student.kind='F'  and student_examnotes.studentid NOT IN (SELECT  DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib`   WHERE  halfyearly_delib.specialityid=:specialityid    and  halfyearly_delib.semesterid=:semesterid  and  halfyearly_delib.decision='ADMIS' and  halfyearly_delib.acadyearid !=:acadyearid) ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('acadyearid', $this->get('session')->get('anacad'));
            $query->setParameter('specialityid', $this->get('session')->get('speciddelib'));
            $query->setParameter('semesterid', $this->get('session')->get('semiddelib'));
            $query->setParameter('sessionid', $this->get('session')->get('idsesdelib'));

            $nbetudevaf = $query->getResult();



            foreach ($nbetudevaf as $ne) {


                $cptnbetudevaf = $ne['nbetudiantevaf'];



                $request->getSession()->set('totaletudevaf', $cptnbetudevaf);

            }

            $cptabsf=$this->get('session')->get('totaletudf') - $this->get('session')->get('totaletudevaf');

            $request->getSession()->set('cptabsf', $cptabsf);







            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();
            $rsm->addScalarResult('nbetudiantg', 'nbetudiantg');

            $sql = "SELECT count(  DISTINCT student_speciality.`studentid`) as nbetudiantg FROM `student_speciality` INNER JOIN student on student.id=student_speciality.studentid  WHERE  student_speciality.acadyearid=:acadyearid and student_speciality.specialityid=:specialityid  and student_speciality.levelid=:levelid and student.kind='M' ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('acadyearid', $this->get('session')->get('anacad'));
            $query->setParameter('specialityid', $this->get('session')->get('speciddelib'));
            $query->setParameter('levelid', $this->get('session')->get('leveliddelib'));

            $nbetudg = $query->getResult();



            foreach ($nbetudg as $ne) {


                $cptnbetudg = $ne['nbetudiantg'];


                $request->getSession()->set('totaletudg', $cptnbetudg);

            }




















            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();
            $rsm->addScalarResult('nbetudiantevag', 'nbetudiantevag');

            $sql = "SELECT count(  DISTINCT student_examnotes.`studentid`) as nbetudiantevag FROM `student_examnotes` INNER JOIN student on student.id=student_examnotes.studentid WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid  and student_examnotes.semesterid=:semesterid and student_examnotes.sessionid=:sessionid and student.kind='M'  and student_examnotes.studentid NOT IN (SELECT  DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib`   WHERE  halfyearly_delib.specialityid=:specialityid    and  halfyearly_delib.semesterid=:semesterid  and  halfyearly_delib.decision='ADMIS' and  halfyearly_delib.acadyearid !=:acadyearid) ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('acadyearid', $this->get('session')->get('anacad'));
            $query->setParameter('specialityid', $this->get('session')->get('speciddelib'));
            $query->setParameter('semesterid', $this->get('session')->get('semiddelib'));
            $query->setParameter('sessionid', $this->get('session')->get('idsesdelib'));

            $nbetudevag = $query->getResult();



            foreach ($nbetudevag as $ne) {


                $cptnbetudevag = $ne['nbetudiantevag'];



                $request->getSession()->set('totaletudevag', $cptnbetudevag);

            }


            $cptabsg=$this->get('session')->get('totaletudg') - $this->get('session')->get('totaletudevag');



            $request->getSession()->set('cptabsg', $cptabsg);





            return $this->render('delibsem/startdelib2.html.twig',array('current_menu'=>'startdeliblicence'));




        }

        else{






            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();
            $rsm->addScalarResult('nbstudent', 'nbstudent');

            $sql = "SELECT count(  DISTINCT `studentid`) as nbstudent FROM `student_speciality`  WHERE  acadyearid=:acadyearid and specialityid=:specialityid  and levelid=:levelid  ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('acadyearid', $this->get('session')->get('anacad'));
            $query->setParameter('specialityid', $this->get('session')->get('speciddelib'));
            $query->setParameter('levelid', $this->get('session')->get('leveliddelib'));


            $nbstdcc = $query->getResult();

            foreach ($nbstdcc as $nst) {
                $cptnbetud= $nst['nbstudent'];

                $request->getSession()->set('totaletud', $cptnbetud);

            }










            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();

            $rsm->addScalarResult('nbadmisses1', 'nbadmisses1');



            $sql = "SELECT  count(DISTINCT halfyearly_delib.studentid) as nbadmisses1 FROM `halfyearly_delib`   WHERE  halfyearly_delib.specialityid=:idspecialite  and halfyearly_delib.acadyearid=:idanac  and halfyearly_delib.semesterid=:idsemestre and halfyearly_delib.sessionid='SE1' and halfyearly_delib.decision='ADMIS'   ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('idspecialite', $this->get('session')->get('speciddelib'));


            $query->setParameter('idanac', $this->get('session')->get('anacad') );
            $query->setParameter('idsemestre', $this->get('session')->get('semiddelib') );


            $nbetudadses1 = $query->getResult();



            foreach ($nbetudadses1 as $ne) {


                $cptnbetudadses1 = $ne['nbadmisses1'];


                $nbattendus=$this->get('session')->get('totaletud') - $cptnbetudadses1;
                $request->getSession()->set('nbattendus', $nbattendus);

            }













            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();

            $rsm->addScalarResult('nbetudianteva', 'nbetudianteva');



            $sql = "SELECT  count(DISTINCT halfyearly_delib.studentid) as nbetudianteva FROM `halfyearly_delib` INNER JOIN student_speciality on student_speciality.studentid=halfyearly_delib.studentid  WHERE  halfyearly_delib.specialityid=:idspecialite  and halfyearly_delib.acadyearid=:idanac  and halfyearly_delib.semesterid=:idsemestre and halfyearly_delib.sessionid='SE1' and halfyearly_delib.decision='REFUSE'   ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('idspecialite', $this->get('session')->get('speciddelib'));


            $query->setParameter('idanac', $this->get('session')->get('anacad') );
            $query->setParameter('idsemestre', $this->get('session')->get('semiddelib') );



            $nbetudeva = $query->getResult();



            foreach ($nbetudeva as $ne) {


                $cptnbetudeva = $ne['nbetudianteva'];

                $request->getSession()->set('totaletudeva', $cptnbetudeva);

            }









            $cptabs=$this->get('session')->get('totaletud') - $this->get('session')->get('totaletudeva');

            $request->getSession()->set('cptabs', $cptabs);










            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();
            $rsm->addScalarResult('nbetudiantf', 'nbetudiantf');

            $sql = "SELECT count(  DISTINCT student_speciality.`studentid`) as nbetudiantf FROM `student_speciality` INNER JOIN student on student.id=student_speciality.studentid  WHERE  student_speciality.acadyearid=:acadyearid and student_speciality.specialityid=:specialityid  and student_speciality.levelid=:levelid and student.kind='F' ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('acadyearid', $this->get('session')->get('anacad'));
            $query->setParameter('specialityid', $this->get('session')->get('speciddelib'));
            $query->setParameter('levelid', $this->get('session')->get('leveliddelib'));


            $nbetudf = $query->getResult();



            foreach ($nbetudf as $ne) {


                $cptnbetudf = $ne['nbetudiantf'];

                $request->getSession()->set('totaletudf', $cptnbetudf);

            }














            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();

            $rsm->addScalarResult('nbetudiantevaf', 'nbetudiantevaf');



            $sql = "SELECT  count(DISTINCT halfyearly_delib.studentid) as nbetudiantevaf FROM `halfyearly_delib` INNER JOIN student on student.id=halfyearly_delib.studentid  WHERE  halfyearly_delib.specialityid=:idspecialite  and halfyearly_delib.acadyearid=:idanac  and halfyearly_delib.semesterid=:idsemestre and halfyearly_delib.sessionid='SE1' and halfyearly_delib.decision='REFUSE'  and student.kind='F'  ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('idspecialite', $this->get('session')->get('speciddelib'));


            $query->setParameter('idanac', $this->get('session')->get('anacad') );
            $query->setParameter('idsemestre', $this->get('session')->get('semiddelib') );



            $nbetudevaf = $query->getResult();



            foreach ($nbetudevaf as $ne) {


                $cptnbetudevaf = $ne['nbetudiantevaf'];

                $request->getSession()->set('totaletudevaf', $cptnbetudevaf);

            }








            $cptabsf=$this->get('session')->get('totaletudf') - $this->get('session')->get('totaletudevaf');

            $request->getSession()->set('cptabsf', $cptabsf);







            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();
            $rsm->addScalarResult('nbetudiantg', 'nbetudiantg');

            $sql = "SELECT count(  DISTINCT student_speciality.`studentid`) as nbetudiantg FROM `student_speciality` INNER JOIN student on student.id=student_speciality.studentid  WHERE  student_speciality.acadyearid=:acadyearid and student_speciality.specialityid=:specialityid  and student_speciality.levelid=:levelid and student.kind='M' ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('acadyearid', $this->get('session')->get('anacad'));
            $query->setParameter('specialityid', $this->get('session')->get('speciddelib'));
            $query->setParameter('levelid', $this->get('session')->get('leveliddelib'));

            $nbetudg = $query->getResult();



            foreach ($nbetudg as $ne) {


                $cptnbetudg = $ne['nbetudiantg'];


                $request->getSession()->set('totaletudg', $cptnbetudg);

            }
























            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();

            $rsm->addScalarResult('nbetudiantevag', 'nbetudiantevag');



            $sql = "SELECT  count(DISTINCT halfyearly_delib.studentid) as nbetudiantevag FROM `halfyearly_delib` INNER JOIN student on student.id=halfyearly_delib.studentid  WHERE  halfyearly_delib.specialityid=:idspecialite  and halfyearly_delib.acadyearid=:idanac  and halfyearly_delib.semesterid=:idsemestre and halfyearly_delib.sessionid='SE1' and halfyearly_delib.decision='REFUSE'  and student.kind='M'";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('idspecialite', $this->get('session')->get('speciddelib'));


            $query->setParameter('idanac', $this->get('session')->get('anacad') );
            $query->setParameter('idsemestre', $this->get('session')->get('semiddelib') );



            $nbetudevag = $query->getResult();



            foreach ($nbetudevag as $ne) {


                $cptnbetudevag = $ne['nbetudiantevag'];

                $request->getSession()->set('totaletudevag', $cptnbetudevag);

            }









            $cptabsg=$this->get('session')->get('totaletudg') - $this->get('session')->get('totaletudevag');



            $request->getSession()->set('cptabsg', $cptabsg);





            return $this->render('delibsem/startdelib2.html.twig',array('current_menu'=>'startdeliblicence'));






        }

    }


    /**
     * Etudiant ayant dejà validé le semestre
     * @return Response
     */
    public function stusemvalide()
    {

        return $this->render('delibsem/stusemvalide.html.twig');
    }

    /**
     * Liste etudiants ayany validés le semestre
     * @param Request $request
     * @return Response
     */
    public function liststusemvalide(Request $request, StudentSpecialityRepository $studentspecrepo, StudentRepository $studrepo)
    {


        $idspecialite=$this->get('session')->get('speciddelib');
        $idsem=$this->get('session')->get('semiddelib');

        $idniv=$this->get('session')->get('leveliddelib');
        $idanac=$this->get('session')->get('anacad');
        $length = $request->get('length');
        $length = $length && ($length != -1) ? $length : 0;

        $start = $request->get('start');
        $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

        $delibsem = $request->get('delibsem');
        $filters = [
            'query' => @$delibsem['value']
        ];

        $users = $studentspecrepo->studsemvalide($idanac,$idsem,$idspecialite,$idniv,$filters, $start, $length
        );

        $output = array(
            'data' => array(),
            'recordsFiltered' => count($studentspecrepo->studsemvalide($idanac,$idsem,$idspecialite,$idniv, $filters, 0, false)),
            'recordsTotal' => count($studentspecrepo->studsemvalide($idanac,$idsem,$idspecialite,$idniv,0, false))
        );

        foreach ($users as $user) {



            $idetudiant = $user['studentid'];



            $etudiantvasem = $studrepo->findOneById($idetudiant);




            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();

            $rsm->addScalarResult('picture', 'picture');


            $sql = "SELECT picture FROM `student_speciality`  WHERE student_speciality.studentid=:idstud and student_speciality.specialityid=:idspec and student_speciality.acadyearid=:idanac and student_speciality.levelid=:idlev  ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('idspec', $idspecialite);
            $query->setParameter('idstud', $idetudiant);

            $query->setParameter('idanac', $idanac);
            $query->setParameter('idlev', $idniv);


            $studpic = $query->getResult();


            foreach ($studpic as $ne) {


                $studentpic = $ne['picture'];



            }


            $lientof= '
                                                <img class="img" onclick="window.open(this.src,\'_blank\',\'toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=0, copyhistory=0, menuBar=0, width=\'+this.width+\', height=\'+this.height);" src="/SIGES/public/images/photoetudiant/'.$studentpic.'" />
                                          ';








            $em = $this->getDoctrine()->getManager();
            $rsm = new ResultSetMapping();

            $rsm->addScalarResult('semaverage', 'semaverage');
            $rsm->addScalarResult('acadyearid', 'acadyearid');
            $rsm->addScalarResult('sessionid', 'sessionid');

            $sql = "SELECT semaverage,acadyearid,sessionid FROM `halfyearly_delib`  WHERE halfyearly_delib.studentid=:idetudiant and halfyearly_delib.specialityid=:idspecialite and halfyearly_delib.semesterid=:idsem and halfyearly_delib.decision='ADMIS'  ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('idspecialite', $idspecialite);
            $query->setParameter('idetudiant', $idetudiant);


            $query->setParameter('idsem', $idsem);


            $detetudva = $query->getResult();


            foreach ( $detetudva  as $ne) {


                $moyetudva = $ne['semaverage'];
                $anaetudva = $ne['acadyearid'];
                $sesetudva = $ne['sessionid'];



            }








            $output['data'][] = [
                'photo' => $lientof,
                'idetudiant' => $idetudiant,
                'nom' =>  $etudiantvasem->getFirstname(),
                'prenom' =>  $etudiantvasem->getLastname(),
                'genre' =>  $etudiantvasem->getKind(),

                'idsem' => $idsem,


                'idses' =>  $sesetudva,
                'anac' => $anaetudva,
                'moyennesem' => $moyetudva,
                'jury' => 'ADMIS'

            ];
        }

        return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);
    }



    public function deliberationsemestre(Request $request, StudentSpecialityRepository $studspecrepo, UeSpecialityRepository $uespecrepo, UeValidatedRepository $uevalidrepo, MyFunctionDelib $callfunctiondelib)
    {


        $idses=$this->get('session')->get('idsesdelib');

        $idspecialite=$this->get('session')->get('speciddelib');
        $idsem=$this->get('session')->get('semiddelib');


        $idanac=$this->get('session')->get('anacad');




           if($idses=='SE1'){
               $length = $request->get('length');
               $length = $length && ($length != -1) ? $length : 0;

               $start = $request->get('start');
               $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

               $delibsem = $request->get('delibsem');
               $filters = [
                   'query' => @$delibsem['value']
               ];

               $users = $studspecrepo->studspec($idanac, $idsem, $idspecialite, $idses,
                   $filters, $start, $length
               );

               $output = array(
                   'data' => array(),
                   'recordsFiltered' => count($studspecrepo->studspec($idanac, $idsem, $idspecialite, $idses, $filters, 0, false)),
                   'recordsTotal' => count($studspecrepo->studspec($idanac, $idsem, $idspecialite, $idses, 0, false))
               );

               foreach ($users as $user) {

                   $idetudiant = $user['studentid'];
                   $specid= $idspecialite;
                   $semid = $idsem;
                   $sessionid= $idses;
                   $acadid = $idanac;
                   $userdelib = $this->getUser()->getUsername();





                   $pue=$uespecrepo->findBy(array('specialityid' => $specid,'semester' => $semid,'acadyearid'=>$acadid));
                   foreach ($pue as $puev) {



                       $uevalids = $uevalidrepo->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $specid, 'semesterid' =>$semid, 'ueid' => $puev->getUeid()->getId()));



                       if(!$uevalids){



                           if($callfunctiondelib->creditsvalide($idetudiant,$semid,$puev->getUeid()->getId(),$acadid,$specid,$sessionid)==$callfunctiondelib->creditue($idspecialite,$puev->getUeid()->getId(),$semid,$acadid)){

                               $deliberationue = new UeValidated();

                               $deliberationue->setStudentid($idetudiant);

                               $deliberationue->setAcadyearid($acadid);
                               $deliberationue->setSpecialityid($specid);
                               $deliberationue->setUeid($puev->getUeid()->getId());
                               $deliberationue->setSemesterid($semid);
                               $deliberationue->setSessionid($sessionid);
                               $deliberationue->setCreditvalided($callfunctiondelib->creditsvalide($idetudiant,$semid,$puev->getUeid(),$acadid,$specid,$sessionid));
                               $deliberationue->setUeaverage($callfunctiondelib->ueaverage($idetudiant, $specid,$puev->getUeid(), $semid, $sessionid, $acadid));

                               $deliberationue->setDelibDate(new \Datetime());
                               $deliberationue->setDelibUser($userdelib);


                               $em = $this->getDoctrine()->getManager();

                               $em->persist($deliberationue);
                               $em->flush();

                           }







                       }










                   }













                   $creditvalide = $callfunctiondelib->tcredit($idetudiant, $specid, $semid, $sessionid, $acadid);
                   $moyennesemestre = floatval($callfunctiondelib->ecusemaverage($idetudiant, $specid, $semid, $sessionid, $acadid));
                   $decisionsem = $callfunctiondelib->decision($idetudiant, $specid, $semid, $sessionid, $acadid);

                   $deliberation = new HalfYearlyDelib();

                   $deliberation->setStudentid($idetudiant);

                   $deliberation->setAcadyearid($acadid);
                   $deliberation->setSpecialityid($specid);
                   $deliberation->setSemesterid($semid);
                   $deliberation->setSessionid($sessionid);
                   $deliberation->setTcreditvalide($creditvalide);
                   $deliberation->setSemaverage($moyennesemestre);
                   $deliberation->setDecision($decisionsem);
                   $deliberation->setDelibDate(new \Datetime());
                   $deliberation->setDelibUser($userdelib);


                   $em = $this->getDoctrine()->getManager();

                   $em->persist($deliberation);
                   $em->flush();

               }

               return $this->redirectToRoute('siges_startdelib2');
           }else{



               $length = $request->get('length');
               $length = $length && ($length != -1) ? $length : 0;

               $start = $request->get('start');
               $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

               $delibsem = $request->get('delibsem');
               $filters = [
                   'query' => @$delibsem['value']
               ];

               $users = $studspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses,
                   $filters, $start, $length
               );

               $output = array(
                   'data' => array(),
                   'recordsFiltered' => count($studspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses, $filters, 0, false)),
                   'recordsTotal' => count($studspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses, 0, false))
               );

               foreach ($users as $user) {

                   $idetudiant = $user['studentid'];
                   $specid= $idspecialite;
                   $semid = $idsem;
                   $sessionid= $idses;
                   $acadid = $idanac;
                   $userdelib = $this->getUser()->getUsername();





                   $pue=$uespecrepo->findBy(array('specialityid' => $specid,'semester' => $semid,'acadyearid'=>$acadid));
                   foreach ($pue as $puev) {



                       $uevalids = $uevalidrepo->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $specid, 'semesterid' =>$semid, 'ueid' => $puev->getUeid()->getId()));



                       if(!$uevalids){



                           if($callfunctiondelib->creditsvalide($idetudiant,$semid,$puev->getUeid()->getId(),$acadid,$specid,$sessionid)==$callfunctiondelib->creditue($idspecialite,$puev->getUeid()->getId(),$semid,$acadid)){

                               $deliberationue = new UeValidated();

                               $deliberationue->setStudentid($idetudiant);

                               $deliberationue->setAcadyearid($acadid);
                               $deliberationue->setSpecialityid($specid);
                               $deliberationue->setUeid($puev->getUeid()->getId());
                               $deliberationue->setSemesterid($semid);
                               $deliberationue->setSessionid($sessionid);
                               $deliberationue->setCreditvalided($callfunctiondelib->creditsvalide($idetudiant,$semid,$puev->getUeid(),$acadid,$specid,$sessionid));
                               $deliberationue->setUeaverage($callfunctiondelib->ueaverage($idetudiant, $specid,$puev->getUeid(), $semid, $sessionid, $acadid));

                               $deliberationue->setDelibDate(new \Datetime());
                               $deliberationue->setDelibUser($userdelib);


                               $em = $this->getDoctrine()->getManager();

                               $em->persist($deliberationue);
                               $em->flush();

                           }







                       }










                   }













                   $creditvalide = $callfunctiondelib->tcredit($idetudiant, $specid, $semid, $sessionid, $acadid);
                   $moyennesemestre = floatval($callfunctiondelib->ecusemaverage($idetudiant, $specid, $semid, $sessionid, $acadid));
                   $decisionsem = $callfunctiondelib->decision($idetudiant, $specid, $semid, $sessionid, $acadid);

                   $deliberation = new HalfYearlyDelib();

                   $deliberation->setStudentid($idetudiant);

                   $deliberation->setAcadyearid($acadid);
                   $deliberation->setSpecialityid($specid);
                   $deliberation->setSemesterid($semid);
                   $deliberation->setSessionid($sessionid);
                   $deliberation->setTcreditvalide($creditvalide);
                   $deliberation->setSemaverage($moyennesemestre);
                   $deliberation->setDecision($decisionsem);
                   $deliberation->setDelibDate(new \Datetime());
                   $deliberation->setDelibUser($userdelib);


                   $em = $this->getDoctrine()->getManager();

                   $em->persist($deliberation);
                   $em->flush();

               }

               return $this->redirectToRoute('siges_startdelib2');









           }
















    }





    public function tabledelibrtell2sem3()
    {




        return  $this->render('delibsem/tabledelibrtell2sem3.html.twig');
    }


    public function listtabledelibrtell2sem3(Request $request, MyFunctionDelib $callfunctiondelib, StudentSpecialityRepository $studentspecrep, StudentRepository $stdrepo)
    {

        $idses=$this->get('session')->get('idsesdelib');

        $idspecialite=$this->get('session')->get('speciddelib');
        $idsem=$this->get('session')->get('semiddelib');


        $idanac=$this->get('session')->get('anacad');



        if($idses=='SE1') {

            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $delibsem = $request->get('delibsem');
            $filters = [
                'query' => @$delibsem['value']
            ];

            $users = $studentspecrep->studspec($idanac, $idsem, $idspecialite, $idses,
                $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($studentspecrep->studspec($idanac, $idsem, $idspecialite, $idses, $filters, 0, false)),
                'recordsTotal' => count($studentspecrep->studspec($idanac, $idsem, $idspecialite, $idses, 0, false))
            );

            foreach ($users as $user) {
                $idetudiant = $user['studentid'];



                $etudiant = $stdrepo->findOneById($idetudiant);





                $m1=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'ECO3300', $idsem, $idses, $idanac);




                $m2=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'INF3309', $idsem, $idses, $idanac);





                $m3=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'PHY3305', $idsem, $idses, $idanac);



                $m4=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'COM3300', $idsem, $idses, $idanac);


                $m5=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'MTH3302', $idsem, $idses, $idanac);





                $m6=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'PHY3302', $idsem, $idses, $idanac);





                $m7=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'PHY3304', $idsem, $idses, $idanac);






                $m8=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'RES3300', $idsem, $idses, $idanac);





                $output['data'][] = [
                    'idetudiant' => $etudiant->getId(),





                    'moyennesem' =>(float)$callfunctiondelib->moyennesemecusemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses),
                    'ue1' =>(float)$m1,
                    'ue2' =>(float)$m2,
                    'ue3' =>(float)$m3,

                    'moyennesemminor' =>(float)$callfunctiondelib->ueminorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),



                    'ue4' =>(float)$m4,
                    'ue5' =>(float)$m5,

                    'ue6' =>(float)$m6,
                    'ue7' =>(float)$m7,
                    'ue8' =>(float)$m8,

                    'moyennesemmajor' =>(float)$callfunctiondelib->uemajorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),


                    'tcredit' =>$callfunctiondelib->tcreditsemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses)









                ];
            }

            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);


        }





    }




    public function averclassue()
    {


        return $this->render('delibsem/averclassue.html.twig');
    }



    public function listaverclassue(Request $request, MyFunctionDelib $callfunctiondelib, EcuSpecialityRepository $ecuspecrep, EcuRepository $ecurep)
    {
        $idses=$this->get('session')->get('idsesdelib');

        $idspecialite=$this->get('session')->get('speciddelib');
        $idsem=$this->get('session')->get('semiddelib');

        $idniv=$this->get('session')->get('leveliddelib');
        $idanac=$this->get('session')->get('anacad');




        $length = $request->get('length');
        $length = $length && ($length != -1) ? $length : 0;

        $start = $request->get('start');
        $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

        $delibsem = $request->get('delibsem');
        $filters = [
            'query' => @$delibsem['value']
        ];

        $users = $ecuspecrep->spececu($idspecialite,$idsem,$idanac,
            $filters, $start, $length
        );

        $output = array(
            'data' => array(),
            'recordsFiltered' => count($ecuspecrep->spececu($idspecialite,$idsem,$idanac, $filters, 0, false)),
            'recordsTotal' => count($ecuspecrep->spececu($idspecialite,$idsem,$idanac, 0, false))
        );

        foreach ($users as $user) {




            $ecu = $ecurep->findOneBy(array('id' => $user->getEcuid()));




            $output['data'][] = [
                'cecu' => $ecu->getId(),
                'lecu' => $ecu->getEcuname(),
                'msup0'=>$callfunctiondelib->nbaveragegtzclassspec($idspecialite,$user->getEcuid(),$idsem,$idses, $idanac, $idniv),
                'minf10'=>$callfunctiondelib->nbaveragelttclassspec($idspecialite,$user->getEcuid(),$idsem,$idses, $idanac, $idniv),
                'msup10'=>$callfunctiondelib->nbaveragegttclassspec($idspecialite,$user->getEcuid(),$idsem,$idses, $idanac, $idniv),
                'secu'=>$callfunctiondelib->nbaveragemaxclassspec($idspecialite,$user->getEcuid(),$idsem,$idses, $idanac, $idniv),
                'fecu'=>$callfunctiondelib->nbaverageminclassspec($idspecialite,$user->getEcuid(),$idsem,$idses, $idanac, $idniv),

                'moyclasse' => $callfunctiondelib->averageofclassspec($idspecialite,$user->getEcuid(),$idsem,$idses, $idanac, $idniv),



            ];
        }

        return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);
    }


    public function enddelib(Request $request, MyFunctionDelib $callfunctiondelib, StudentRepository $studentrep)
    {


        $idses=$this->get('session')->get('idsesdelib');

        $idspecialite=$this->get('session')->get('speciddelib');
        $idsem=$this->get('session')->get('semiddelib');

        $idniv=$this->get('session')->get('leveliddelib');
        $idanac=$this->get('session')->get('anacad');







        $etudiantfort = $studentrep->findOneById($callfunctiondelib->idmaxaveragesemestrielle( $idspecialite, $idsem, $idses, $idanac));



        $request->getSession()->set('etudiantfort', $etudiantfort);




        $em = $this->getDoctrine()->getManager();


        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('picture', 'picture');
        $rsm->addScalarResult('school_classeid', 'school_classeid');

        $rsm->addScalarResult('state', 'state');

        $sql = "SELECT picture,school_classeid,state FROM `student_speciality`  WHERE student_speciality.studentid=:idstud and student_speciality.specialityid=:idspec and student_speciality.acadyearid=:idanac and student_speciality.levelid=:idlev  ";
        $query = $em->createNativeQuery($sql, $rsm);

        $query->setParameter('idanac', $this->get('session')->get('anacad'));
        $query->setParameter('idniv', $this->get('session')->get('idniv'));

        $query->setParameter('idspec', $idspecialite);
        $query->setParameter('idstud', $callfunctiondelib->idmaxaveragesemestrielle( $idspecialite, $idsem, $idses, $idanac));

        $query->setParameter('idanac', $idanac);
        $query->setParameter('idlev', $idniv);
        $idclasse = $query->getResult();


        foreach ($idclasse as $ne) {


            $classeetud = $ne['school_classeid'];



            $request->getSession()->set('etudclasseforte', $classeetud);
            $statutetud = $ne['state'];


            $request->getSession()->set('etudstatutfort', $statutetud);
            $photoetud = $ne['picture'];


            $request->getSession()->set('etudphotofort', $photoetud);
        }

        $request->getSession()->set('moyfortesemestrielle',$callfunctiondelib->maxaveragesemestrielle( $idspecialite, $idsem, $idses, $idanac));


        $request->getSession()->set('creditfortsemestrielle',$callfunctiondelib->tcreditsemestrielle($callfunctiondelib->idmaxaveragesemestrielle( $idspecialite, $idsem, $idses, $idanac),$idsem,$idanac,$idspecialite,$idses));



        $etudiantfaible = $studentrep->findOneById($callfunctiondelib->idminaveragesemestrielle( $idspecialite, $idsem, $idses, $idanac));

        $request->getSession()->set('etudiantfaible', $etudiantfaible);



        $em = $this->getDoctrine()->getManager();


        $rsm = new ResultSetMapping();

        $rsm->addScalarResult('picture', 'picture');
        $rsm->addScalarResult('school_classeid', 'school_classeid');

        $rsm->addScalarResult('state', 'state');

        $sql = "SELECT picture,school_classeid,state FROM `student_speciality`  WHERE student_speciality.studentid=:idstud and student_speciality.specialityid=:idspec and student_speciality.acadyearid=:idanac and student_speciality.levelid=:idlev  ";
        $query = $em->createNativeQuery($sql, $rsm);

        $query->setParameter('idanac', $this->get('session')->get('anacad'));
        $query->setParameter('idniv', $this->get('session')->get('idniv'));

        $query->setParameter('idspec', $idspecialite);
        $query->setParameter('idstud', $callfunctiondelib->idminaveragesemestrielle( $idspecialite, $idsem, $idses, $idanac));

        $query->setParameter('idanac', $idanac);
        $query->setParameter('idlev', $idniv);




        $idclasse = $query->getResult();


        foreach ($idclasse as $ne) {




            $classeetud = $ne['school_classeid'];



            $request->getSession()->set('etudclassefaible', $classeetud);
            $statutetud = $ne['state'];


            $request->getSession()->set('etudstatutfaible', $statutetud);
            $photoetud = $ne['picture'];


            $request->getSession()->set('etudphotofaible', $photoetud);




        }


        $request->getSession()->set('creditfaiblesemestrielle',$callfunctiondelib->tcreditsemestrielle($callfunctiondelib->idminaveragesemestrielle( $idspecialite, $idsem, $idses, $idanac),$idsem,$idanac,$idspecialite,$idses));




        $request->getSession()->set('moyfaiblesemestrielle',$callfunctiondelib->minaveragesemestrielle( $idspecialite, $idsem, $idses, $idanac));


        $request->getSession()->set('moyclassspecsemestrielle',$callfunctiondelib->averageofspecsemestrielle($idspecialite, $idsem, $idses, $idanac));







        return $this->render('delibsem/enddelib.html.twig');
    }


    public function liststattranche(MyFunctionDelib $callfunctiondelib)
    {




        $idses=$this->get('session')->get('idsesdelib');

        $idspecialite=$this->get('session')->get('speciddelib');
        $idsem=$this->get('session')->get('semiddelib');


        $idanac=$this->get('session')->get('anacad');




        $nbsupz=$callfunctiondelib-> nbmoyennesemecusupzsemestrielle($idspecialite, $idsem, $idses, $idanac);

        $nbinfd=$callfunctiondelib->nbmoyennesemecuinfdsemestrielle($idspecialite, $idsem, $idses, $idanac);

        $nbsupdx=$callfunctiondelib->nbmoyennesemecusupdxsemestrielle($idspecialite, $idsem, $idses, $idanac);



        $output = [
            'nbsupz' =>$nbsupz,
            'nbinfd' => $nbinfd,
            'nbsupdx' => $nbsupdx,




        ];




        return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);
    }

    public function liststatdecision(MyFunctionDelib $callfunctiondelib)
    {



        $idses=$this->get('session')->get('idsesdelib');

        $idspecialite=$this->get('session')->get('speciddelib');
        $idsem=$this->get('session')->get('semiddelib');


        $idanac=$this->get('session')->get('anacad');




        $nbadmissem=$callfunctiondelib-> nbsemadmissemestrielle($idspecialite, $idsem, $idses, $idanac);

        $nbrefusem=$callfunctiondelib->nbsemrefusesemestrielle($idspecialite, $idsem, $idses, $idanac);




        $output1 = [
            'nbre' =>$nbadmissem,
            'decision' => 'ADMIS',
            'color' => '#4caf50',




        ];

        $output2= [
            'nbre' => $nbrefusem,
            'decision' => 'REFUSE',
            'color' => '#ee3639',



        ];
        $output=array($output1,$output2);


        return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);
    }


    public function liststatpercentadan(Request $request, AcademicYearRepository $acadrepo)
    {







        $idses=$this->get('session')->get('idsesdelib');

        $idspecialite=$this->get('session')->get('speciddelib');
        $idsem=$this->get('session')->get('semiddelib');



        $length = $request->get('length');
        $length = $length && ($length != -1) ? $length : 0;

        $start = $request->get('start');
        $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

        $delibsem = $request->get('delibsem');
        $filters = [
            'query' => @$delibsem['value']
        ];

        $users = $acadrepo->searchanac($filters, $start, $length
        );

        $output = array(
            'data' => array(),
            'recordsFiltered' => count($acadrepo->searchanac( $filters, 0, false)),
            'recordsTotal' => count($acadrepo->searchanac( 0, false))
        );
        $id=0;
        foreach ($users as $user) {

            $id=$id+1;

            $em = $this->getDoctrine()->getManager();
            $rsm = new ResultSetMapping();

            $rsm->addScalarResult('nbdelib', 'nbdelib');



            $sql = "SELECT   count(DISTINCT halfyearly_delib.studentid) as nbdelib FROM `halfyearly_delib` WHERE   specialityid=:idspecialite  and acadyearid=:idanac  and semesterid=:idsemestre and sessionid=:idsession  ";
            $query = $em->createNativeQuery($sql, $rsm);



            $query->setParameter('idanac', $user->getId() );

            $query->setParameter('idsemestre', $idsem);

            $query->setParameter('idspecialite', $idspecialite);
            $query->setParameter('idsession', $idses);


            $nbredelib = $query->getResult();
            foreach($nbredelib as $et){
                $nbevalue=$et['nbdelib'];
                $request->getSession()->set('nbevalue', $nbevalue);

            }


            $em = $this->getDoctrine()->getManager();
            $rsm = new ResultSetMapping();

            $rsm->addScalarResult('nbdelibadmis', 'nbdelibadmis');



            $sql = "SELECT   count(DISTINCT halfyearly_delib.studentid) as nbdelibadmis FROM `halfyearly_delib` WHERE   specialityid=:idspecialite  and acadyearid=:idanac  and semesterid=:idsemestre and sessionid=:idsession and decision='ADMIS' ";
            $query = $em->createNativeQuery($sql, $rsm);



            $query->setParameter('idanac', $user->getId() );

            $query->setParameter('idsemestre', $idsem);

            $query->setParameter('idspecialite', $idspecialite);
            $query->setParameter('idsession', $idses);


            $nbredelibadmis = $query->getResult();
            foreach($nbredelibadmis as $et){
                $nbevalueadmis=$et['nbdelibadmis'];


                $request->getSession()->set('nbevalueadmis', $nbevalueadmis);
            }

            if( $this->get('session')->get('leveliddelib')=="L1" and ($idspecialite=="SRIT")) {


                if (($user->getId() == '2012-2013') and ($idsem == "SEM1") and ($idses == "SE1")) {
                    $percent = 42;
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM1") and ($idses == "SE2")) {
                    $percent = 69.57;
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM2") and ($idses == "SE1")) {
                    $percent = 39;
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM2") and ($idses == "SE2")) {
                    $percent = 55.07;
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM1") and ($idses == "SE1")) {
                    $percent = 38.54;
                }
                elseif (($user->getId() == '2013-2014') and ($idsem == "SEM1") and ($idses == "SE2")) {
                    $percent = 69.50;
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM2") and ($idses == "SE1")) {
                    $percent = 44.44;
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM2") and ($idses == "SE2")) {
                    $percent = 75.40;
                }

                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM1") and ($idses == "SE1")) {
                    $percent = 38.5;
                }
                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM1") and ($idses == "SE2")) {
                    $percent = 61.19;
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM2") and ($idses == "SE1")) {
                    $percent = 42.05;
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM2") and ($idses == "SE2")) {
                    $percent = 76.12;
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM1") and ($idses == "SE1")) {
                    $percent = 40.96;
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM1") and ($idses == "SE2")) {
                    $percent = 63.16;
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM2") and ($idses == "SE1")) {
                    $percent = 39.02;
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM2") and ($idses == "SE2")) {
                    $percent = 66.04;
                }

                else {
                    $percent = number_format((($nbevalueadmis * 100) / $nbevalue), 2);
                }

            }

            if($this->get('session')->get('leveliddelib')=="L1" and ($idspecialite=="RTEL")) {


                if (($user->getId() == '2012-2013') and ($idsem == "SEM1") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM1") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM2") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM2") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM1") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2013-2014') and ($idsem == "SEM1") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM2") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM2") and ($idses == "SE2")) {
                    $percent = "-";
                }

                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM1") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM1") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM2") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM2") and ($idses == "SE2")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM1") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM1") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM2") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM2") and ($idses == "SE2")) {
                    $percent ="-";
                }elseif (($user->getId() == '2016-2017') and ($idsem == "SEM1") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2016-2017') and ($idsem == "SEM1") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2016-2017') and ($idsem == "SEM2") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2016-2017') and ($idsem == "SEM2") and ($idses == "SE2")) {
                    $percent ="-";
                }elseif (($user->getId() == '2017-2018') and ($idsem == "SEM1") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2017-2018') and ($idsem == "SEM1") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2017-2018') and ($idsem == "SEM2") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2017-2018') and ($idsem == "SEM2") and ($idses == "SE2")) {
                    $percent ="-";
                }

                else {
                    $percent = number_format((($nbevalueadmis * 100) / $nbevalue), 2);
                }

            }

            if($this->get('session')->get('leveliddelib')=="L1" and ($idspecialite=="SIGL")) {


                if (($user->getId() == '2012-2013') and ($idsem == "SEM1") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM1") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM2") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM2") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM1") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2013-2014') and ($idsem == "SEM1") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM2") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM2") and ($idses == "SE2")) {
                    $percent = "-";
                }

                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM1") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM1") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM2") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM2") and ($idses == "SE2")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM1") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM1") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM2") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM2") and ($idses == "SE2")) {
                    $percent ="-";
                }elseif (($user->getId() == '2016-2017') and ($idsem == "SEM1") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2016-2017') and ($idsem == "SEM1") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2016-2017') and ($idsem == "SEM2") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2016-2017') and ($idsem == "SEM2") and ($idses == "SE2")) {
                    $percent ="-";
                }elseif (($user->getId() == '2017-2018') and ($idsem == "SEM1") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2017-2018') and ($idsem == "SEM1") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2017-2018') and ($idsem == "SEM2") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2017-2018') and ($idsem == "SEM2") and ($idses == "SE2")) {
                    $percent ="-";
                }

                else {
                    $percent = number_format((($nbevalueadmis * 100) / $nbevalue), 2);
                }

            }
            if($this->get('session')->get('leveliddelib')=="L1" and ($idspecialite=="TWIN")) {


                if (($user->getId() == '2012-2013') and ($idsem == "SEM1") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM1") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM2") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM2") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM1") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2013-2014') and ($idsem == "SEM1") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM2") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM2") and ($idses == "SE2")) {
                    $percent = "-";
                }

                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM1") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM1") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM2") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM2") and ($idses == "SE2")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM1") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM1") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM2") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM2") and ($idses == "SE2")) {
                    $percent ="-";
                } elseif (($user->getId() == '2016-2017') and ($idsem == "SEM1") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2016-2017') and ($idsem == "SEM1") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2016-2017') and ($idsem == "SEM2") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2016-2017') and ($idsem == "SEM2") and ($idses == "SE2")) {
                    $percent ="-";
                }

                else {
                    $percent = number_format((($nbevalueadmis * 100) / $nbevalue), 2);
                }

            }



            if($this->get('session')->get('leveliddelib')=="L2" and ($idspecialite=="SRIT")) {


                if (($user->getId() == '2012-2013') and ($idsem == "SEM3") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM3") and ($idses == "SE2")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM4") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM4") and ($idses == "SE2")) {
                    $percent ="-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM3") and ($idses == "SE1")) {
                    $percent = 42.86;
                }
                elseif (($user->getId() == '2013-2014') and ($idsem == "SEM3") and ($idses == "SE2")) {
                    $percent = 87.5;
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM4") and ($idses == "SE1")) {
                    $percent = 71.43;
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM4") and ($idses == "SE2")) {
                    $percent = 75;
                }

                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM3") and ($idses == "SE1")) {
                    $percent = 71.4;
                }
                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM3") and ($idses == "SE2")) {
                    $percent = 100;
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM4") and ($idses == "SE1")) {
                    $percent = 55.17;
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM4") and ($idses == "SE2")) {
                    $percent = 75;
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM3") and ($idses == "SE1")) {
                    $percent = 66.67;
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM3") and ($idses == "SE2")) {
                    $percent = 100;
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM4") and ($idses == "SE1")) {
                    $percent = 59.26;
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM4") and ($idses == "SE2")) {
                    $percent = 90.91;
                }

                else {
                    $percent = number_format((($nbevalueadmis * 100) / $nbevalue), 2);
                }

            }


            if($this->get('session')->get('leveliddelib')=="L2" and ($idspecialite=="RTEL")) {


                if (($user->getId() == '2012-2013') and ($idsem == "SEM3") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM3") and ($idses == "SE2")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM4") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM4") and ($idses == "SE2")) {
                    $percent ="-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM3") and ($idses == "SE1")) {
                    $percent = 52.38;
                }
                elseif (($user->getId() == '2013-2014') and ($idsem == "SEM3") and ($idses == "SE2")) {
                    $percent = 81.8;
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM4") and ($idses == "SE1")) {
                    $percent = 52.38;
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM4") and ($idses == "SE2")) {
                    $percent = 72.7;
                }

                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM3") and ($idses == "SE1")) {
                    $percent = 67.9;
                }
                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM3") and ($idses == "SE2")) {
                    $percent = 66.66;
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM4") and ($idses == "SE1")) {
                    $percent = 64.51;
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM4") and ($idses == "SE2")) {
                    $percent = 100;
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM3") and ($idses == "SE1")) {
                    $percent = 63.41;
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM3") and ($idses == "SE2")) {
                    $percent = 93.33;
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM4") and ($idses == "SE1")) {
                    $percent = 86.84;
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM4") and ($idses == "SE2")) {
                    $percent = 80;
                }

                else {
                    $percent = number_format((($nbevalueadmis * 100) / $nbevalue), 2);
                }

            }


            if($this->get('session')->get('leveliddelib')=="L2" and ($idspecialite=="TWIN")) {


                if (($user->getId() == '2012-2013') and ($idsem == "SEM3") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM3") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM4") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM4") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM3") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2013-2014') and ($idsem == "SEM3") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM4") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM4") and ($idses == "SE2")) {
                    $percent = "-";
                }

                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM3") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM3") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM4") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM4") and ($idses == "SE2")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM3") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM3") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM4") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM4") and ($idses == "SE2")) {
                    $percent ="-";
                } elseif (($user->getId() == '2016-2017') and ($idsem == "SEM3") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2016-2017') and ($idsem == "SEM3") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2016-2017') and ($idsem == "SEM4") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2016-2017') and ($idsem == "SEM4") and ($idses == "SE2")) {
                    $percent ="-";
                }elseif (($user->getId() == '2017-2018') and ($idsem == "SEM3") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2017-2018') and ($idsem == "SEM3") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2017-2018') and ($idsem == "SEM4") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2017-2018') and ($idsem == "SEM4") and ($idses == "SE2")) {
                    $percent ="-";
                }

                else {
                    $percent = number_format((($nbevalueadmis * 100) / $nbevalue), 2);
                }

            }

            if($this->get('session')->get('leveliddelib')=="L2" and ($idspecialite=="SIGL")) {


                if (($user->getId() == '2012-2013') and ($idsem == "SEM3") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM3") and ($idses == "SE2")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM4") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM4") and ($idses == "SE2")) {
                    $percent ="-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM3") and ($idses == "SE1")) {
                    $percent = 90.91;
                }
                elseif (($user->getId() == '2013-2014') and ($idsem == "SEM3") and ($idses == "SE2")) {
                    $percent = 100;
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM4") and ($idses == "SE1")) {
                    $percent = 18.18;
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM4") and ($idses == "SE2")) {
                    $percent = 88.9;
                }

                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM3") and ($idses == "SE1")) {
                    $percent = 54.2;
                }
                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM3") and ($idses == "SE2")) {
                    $percent = 36.36;
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM4") and ($idses == "SE1")) {
                    $percent = 30.76;
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM4") and ($idses == "SE2")) {
                    $percent = 66.66;
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM3") and ($idses == "SE1")) {
                    $percent = 43.48;
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM3") and ($idses == "SE2")) {
                    $percent = 62.23;
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM4") and ($idses == "SE1")) {
                    $percent = 80;
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM4") and ($idses == "SE2")) {
                    $percent = 50;
                }

                else {
                    $percent = number_format((($nbevalueadmis * 100) / $nbevalue), 2);
                }

            }
            if($this->get('session')->get('leveliddelib')=="L3" and ($idspecialite=="SRIT")) {


                if (($user->getId() == '2012-2013') and ($idsem == "SEM5") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM5") and ($idses == "SE2")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM6") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM6") and ($idses == "SE2")) {
                    $percent ="-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM5") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2013-2014') and ($idsem == "SEM5") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM6") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM6") and ($idses == "SE2")) {
                    $percent = "-";
                }

                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM5") and ($idses == "SE1")) {
                    $percent = 73.1;
                }
                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM5") and ($idses == "SE2")) {
                    $percent = 100;
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM6") and ($idses == "SE1")) {
                    $percent = 69.57;
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM6") and ($idses == "SE2")) {
                    $percent = 69.57;
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM5") and ($idses == "SE1")) {
                    $percent = 96.15;
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM5") and ($idses == "SE2")) {
                    $percent = 25;
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM6") and ($idses == "SE1")) {
                    $percent = 69.57;
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM6") and ($idses == "SE2")) {
                    $percent = 69.57;
                }

                else {
                    $percent = number_format((($nbevalueadmis * 100) / $nbevalue), 2);
                }

            }

            if($this->get('session')->get('leveliddelib')=="L3" and ($idspecialite=="SIGL")) {


                if (($user->getId() == '2012-2013') and ($idsem == "SEM5") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM5") and ($idses == "SE2")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM6") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM6") and ($idses == "SE2")) {
                    $percent ="-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM5") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2013-2014') and ($idsem == "SEM5") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM6") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM6") and ($idses == "SE2")) {
                    $percent = "-";
                }

                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM5") and ($idses == "SE1")) {
                    $percent =76.2;
                }
                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM5") and ($idses == "SE2")) {
                    $percent = 100;
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM6") and ($idses == "SE1")) {
                    $percent = 69.57;
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM6") and ($idses == "SE2")) {
                    $percent = 69.57;
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM5") and ($idses == "SE1")) {
                    $percent = 100;
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM5") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM6") and ($idses == "SE1")) {
                    $percent = 69.57;
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM6") and ($idses == "SE2")) {
                    $percent = 69.57;
                }

                else {
                    $percent = number_format((($nbevalueadmis * 100) / $nbevalue), 2);
                }

            }

            if($this->get('session')->get('leveliddelib')=="L3" and ($idspecialite=="RTEL")) {


                if (($user->getId() == '2012-2013') and ($idsem == "SEM5") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM5") and ($idses == "SE2")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM6") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM6") and ($idses == "SE2")) {
                    $percent ="-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM5") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2013-2014') and ($idsem == "SEM5") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM6") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM6") and ($idses == "SE2")) {
                    $percent = "-";
                }

                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM5") and ($idses == "SE1")) {
                    $percent =77.8;
                }
                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM5") and ($idses == "SE2")) {
                    $percent = 100;
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM6") and ($idses == "SE1")) {
                    $percent = 69.57;
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM6") and ($idses == "SE2")) {
                    $percent = 69.57;
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM5") and ($idses == "SE1")) {
                    $percent = 84.62;
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM5") and ($idses == "SE2")) {
                    $percent = 100;
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM6") and ($idses == "SE1")) {
                    $percent = 69.57;
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM6") and ($idses == "SE2")) {
                    $percent = 69.57;
                }

                else {
                    $percent = number_format((($nbevalueadmis * 100) / $nbevalue), 2);
                }

            }


            if($this->get('session')->get('leveliddelib')=="M1" and ($idspecialite=="TCSIGLSITW")) {


                if (($user->getId() == '2012-2013') and ($idsem == "SEM7") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM7") and ($idses == "SE2")) {
                    $percent ="-";
                }  elseif (($user->getId() == '2013-2014') and ($idsem == "SEM7") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2013-2014') and ($idsem == "SEM7") and ($idses == "SE2")) {
                    $percent = "-";
                }

                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM7") and ($idses == "SE1")) {
                    $percent ="-";
                }
                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM7") and ($idses == "SE2")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM7") and ($idses == "SE1")) {
                    $percent = 81.81;
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM7") and ($idses == "SE2")) {
                    $percent = 75;
                }

                else {
                    $percent = number_format((($nbevalueadmis * 100) / $nbevalue), 2);
                }

            }
            if($this->get('session')->get('leveliddelib')=="M1" and ($idspecialite=="SIGL")) {


                if (($user->getId() == '2012-2013') and ($idsem == "SEM8") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM8") and ($idses == "SE2")) {
                    $percent ="-";
                }  elseif (($user->getId() == '2013-2014') and ($idsem == "SEM8") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2013-2014') and ($idsem == "SEM8") and ($idses == "SE2")) {
                    $percent = "-";
                }

                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM8") and ($idses == "SE1")) {
                    $percent ="-";
                }
                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM8") and ($idses == "SE2")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM8") and ($idses == "SE1")) {
                    $percent = 100;
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM8") and ($idses == "SE2")) {
                    $percent = "-";
                }

                else {
                    $percent = number_format((($nbevalueadmis * 100) / $nbevalue), 2);
                }

            }
            if($this->get('session')->get('leveliddelib')=="M1" and ($idspecialite=="SITW")) {


                if (($user->getId() == '2012-2013') and ($idsem == "SEM8") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM8") and ($idses == "SE2")) {
                    $percent ="-";
                }  elseif (($user->getId() == '2013-2014') and ($idsem == "SEM8") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2013-2014') and ($idsem == "SEM8") and ($idses == "SE2")) {
                    $percent = "-";
                }

                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM8") and ($idses == "SE1")) {
                    $percent ="-";
                }
                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM8") and ($idses == "SE2")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM8") and ($idses == "SE1")) {
                    $percent = 69.23;
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM8") and ($idses == "SE2")) {
                    $percent = 100;
                }

                else {
                    $percent = number_format((($nbevalueadmis * 100) / $nbevalue), 2);
                }

            }
            if($this->get('session')->get('leveliddelib')=="M1" and ($idspecialite=="RTEL")) {


                if (($user->getId() == '2012-2013') and ($idsem == "SEM7") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM7") and ($idses == "SE2")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM8") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM8") and ($idses == "SE2")) {
                    $percent ="-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM7") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2013-2014') and ($idsem == "SEM7") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM8") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM8") and ($idses == "SE2")) {
                    $percent = "-";
                }

                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM7") and ($idses == "SE1")) {
                    $percent ="-";
                }
                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM7") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM8") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM8") and ($idses == "SE2")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM7") and ($idses == "SE1")) {
                    $percent = 73.33;
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM7") and ($idses == "SE2")) {
                    $percent = 75;
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM8") and ($idses == "SE1")) {
                    $percent = 86.67;
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM8") and ($idses == "SE2")) {
                    $percent = 100;
                }

                else {
                    $percent = number_format((($nbevalueadmis * 100) / $nbevalue), 2);
                }

            }



            if($this->get('session')->get('leveliddelib')=="M1" and ($idspecialite=="MDSI")) {


                if (($user->getId() == '2012-2013') and ($idsem == "SEM7") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM7") and ($idses == "SE2")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM8") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM8") and ($idses == "SE2")) {
                    $percent ="-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM7") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2013-2014') and ($idsem == "SEM7") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM8") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM8") and ($idses == "SE2")) {
                    $percent = "-";
                }

                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM7") and ($idses == "SE1")) {
                    $percent ="-";
                }
                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM7") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM8") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM8") and ($idses == "SE2")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM7") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM7") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM8") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM8") and ($idses == "SE2")) {
                    $percent = "-";
                }

                else {
                    $percent = number_format((($nbevalueadmis * 100) / $nbevalue), 2);
                }

            }

            if($this->get('session')->get('leveliddelib')=="M1" and ($idspecialite=="MBDS")) {


                if (($user->getId() == '2012-2013') and ($idsem == "SEM7") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM7") and ($idses == "SE2")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM8") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM8") and ($idses == "SE2")) {
                    $percent ="-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM7") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2013-2014') and ($idsem == "SEM7") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM8") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM8") and ($idses == "SE2")) {
                    $percent = "-";
                }

                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM7") and ($idses == "SE1")) {
                    $percent ="-";
                }
                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM7") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM8") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM8") and ($idses == "SE2")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM7") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM7") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM8") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM8") and ($idses == "SE2")) {
                    $percent = "-";
                }

                elseif (($user->getId() == '2016-2017') and ($idsem == "SEM7") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2016-2017') and ($idsem == "SEM7") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2016-2017') and ($idsem == "SEM8") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2016-2017') and ($idsem == "SEM8") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2017-2018') and ($idsem == "SEM7") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2017-2018') and ($idsem == "SEM7") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2017-2018') and ($idsem == "SEM8") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2017-2018') and ($idsem == "SEM8") and ($idses == "SE2")) {
                    $percent = "-";
                }


                else {
                    $percent = number_format((($nbevalueadmis * 100) / $nbevalue), 2);
                }

            }

            if($this->get('session')->get('leveliddelib')=="M2" and ($idspecialite=="MDSI")) {


                if (($user->getId() == '2012-2013') and ($idsem == "SEM9") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM9") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM10") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM10") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM9") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2013-2014') and ($idsem == "SEM9") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM10") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM10") and ($idses == "SE2")) {
                    $percent = "-";
                }

                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM9") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM9") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM10") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM10") and ($idses == "SE2")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM9") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM9") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM10") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM10") and ($idses == "SE2")) {
                    $percent ="-";
                } elseif (($user->getId() == '2016-2017') and ($idsem == "SEM9") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2016-2017') and ($idsem == "SEM9") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2016-2017') and ($idsem == "SEM10") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2016-2017') and ($idsem == "SEM10") and ($idses == "SE2")) {
                    $percent ="-";
                }elseif (($user->getId() == '2017-2018') and ($idsem == "SEM9") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2017-2018') and ($idsem == "SEM9") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2017-2018') and ($idsem == "SEM10") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2017-2018') and ($idsem == "SEM10") and ($idses == "SE2")) {
                    $percent ="-";
                }

                else {
                    $percent = number_format((($nbevalueadmis * 100) / $nbevalue), 2);
                }

            }



            if($this->get('session')->get('leveliddelib')=="M2" and ($idspecialite=="RTEL")) {


                if (($user->getId() == '2012-2013') and ($idsem == "SEM9") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM9") and ($idses == "SE2")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM10") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM10") and ($idses == "SE2")) {
                    $percent ="-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM9") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2013-2014') and ($idsem == "SEM9") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM10") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM10") and ($idses == "SE2")) {
                    $percent = "-";
                }

                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM9") and ($idses == "SE1")) {
                    $percent ="-";
                }
                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM9") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM10") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM10") and ($idses == "SE2")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM9") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM9") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM10") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM10") and ($idses == "SE2")) {
                    $percent = "-";
                }

                else {
                    $percent = number_format((($nbevalueadmis * 100) / $nbevalue), 2);
                }

            }
            if($this->get('session')->get('leveliddelib')=="M2" and ($idspecialite=="SIGL")) {


                if (($user->getId() == '2012-2013') and ($idsem == "SEM9") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM9") and ($idses == "SE2")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM10") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM10") and ($idses == "SE2")) {
                    $percent ="-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM9") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2013-2014') and ($idsem == "SEM9") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM10") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM10") and ($idses == "SE2")) {
                    $percent = "-";
                }

                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM9") and ($idses == "SE1")) {
                    $percent ="-";
                }
                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM9") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM10") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM10") and ($idses == "SE2")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM9") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM9") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM10") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM10") and ($idses == "SE2")) {
                    $percent = "-";
                }

                else {
                    $percent = number_format((($nbevalueadmis * 100) / $nbevalue), 2);
                }

            }
            if($this->get('session')->get('leveliddelib')=="M2" and ($idspecialite=="SITW")) {


                if (($user->getId() == '2012-2013') and ($idsem == "SEM9") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM9") and ($idses == "SE2")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM10") and ($idses == "SE1")) {
                    $percent ="-";
                } elseif (($user->getId() == '2012-2013') and ($idsem == "SEM10") and ($idses == "SE2")) {
                    $percent ="-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM9") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2013-2014') and ($idsem == "SEM9") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM10") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2013-2014') and ($idsem == "SEM10") and ($idses == "SE2")) {
                    $percent = "-";
                }

                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM9") and ($idses == "SE1")) {
                    $percent ="-";
                }
                elseif (($user->getId() == '2014-2015') and ($idsem == "SEM9") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM10") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2014-2015') and ($idsem == "SEM10") and ($idses == "SE2")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM9") and ($idses == "SE1")) {
                    $percent = "-";
                }
                elseif (($user->getId() == '2015-2016') and ($idsem == "SEM9") and ($idses == "SE2")) {
                    $percent = "-";
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM10") and ($idses == "SE1")) {
                    $percent = "-";
                } elseif (($user->getId() == '2015-2016') and ($idsem == "SEM10") and ($idses == "SE2")) {
                    $percent = "-";
                }

                else {
                    $percent = number_format((($nbevalueadmis * 100) / $nbevalue), 2);
                }

            }

            $output['data'][] = [
                'id' => $id,
                'percent' => $percent,
                'anac' => $user->getId()



            ];
        }

        return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);
    }





    public function deliberationsemestreuniq(Request $request, StudentSpecialityRepository $studspecrepo, UeSpecialityRepository $uespecrepo, UeValidatedRepository $uevalidrepo, MyFunctionDelib $callfunctiondelib, HalfYearlyDelibRepository $halfyearlyrep)
    {
        $idetudiant = $request->query->get('idetudiant');
        $specid= $this->get('session')->get('speciddelib');
        $semid = $this->get('session')->get('semiddelib');
        $sessionid= $this->get('session')->get('idsesdelib');
        $acadid = $this->get('session')->get('anacad');
        $userdelib = $this->getUser()->getUsername();





        $pue=$uespecrepo->findBy(array('specialityid' => $specid,'semester' => $semid,'acadyearid'=>$acadid));
        foreach ($pue as $puev) {



            $uevalids = $uevalidrepo->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $specid, 'semesterid' =>$semid, 'ueid' => $puev->getUeid()->getId()));



            if(!$uevalids){

                if($callfunctiondelib->creditsvalide($idetudiant,$semid,$puev->getUeid()->getId(),$acadid,$specid,$sessionid)==$callfunctiondelib->creditue($specid,$puev->getUeid()->getId(),$semid,$acadid)){

                    $deliberationue = new UeValidated();

                    $deliberationue->setStudentid($idetudiant);

                    $deliberationue->setAcadyearid($acadid);
                    $deliberationue->setSpecialityid($specid);
                    $deliberationue->setUeid($puev->getUeid()->getId());
                    $deliberationue->setSemesterid($semid);
                    $deliberationue->setSessionid($sessionid);
                    $deliberationue->setCreditvalided($callfunctiondelib->creditsvalide($idetudiant,$semid,$puev->getUeid(),$acadid,$specid,$sessionid));
                    $deliberationue->setUeaverage($callfunctiondelib->ueaverage($idetudiant, $specid,$puev->getUeid(), $semid, $sessionid, $acadid));

                    $deliberationue->setDelibDate(new \Datetime());
                    $deliberationue->setDelibUser($userdelib);


                    $em = $this->getDoctrine()->getManager();

                    $em->persist($deliberationue);
                    $em->flush();

                }
            }else{

                if($callfunctiondelib->ueaverage($idetudiant, $specid,$puev->getUeid(), $semid, $sessionid, $acadid)!= $uevalids->getUeaverage()){






                    $uevalids->setSemesterid($semid);
                    $uevalids->setSessionid($sessionid);

                    $uevalids->setUeaverage($callfunctiondelib->ueaverage($idetudiant, $specid,$puev->getUeid(), $semid, $sessionid, $acadid));

                    $uevalids->setDelibDate(new \Datetime());
                    $uevalids->setDelibUser($userdelib);


                    $em = $this->getDoctrine()->getManager();

                    $em->persist($uevalids);
                    $em->flush();

                }



            }























            $deliberation = $halfyearlyrep->findOneBy(array('studentid' => $idetudiant,'specialityid' =>$specid,'semesterid' => $semid,'acadyearid'=>$acadid,'sessionid'=>$sessionid));




            $creditvalide = $callfunctiondelib->tcredit($idetudiant, $specid, $semid, $sessionid, $acadid);
            $moyennesemestre = $callfunctiondelib->ecusemaverage($idetudiant, $specid, $semid, $sessionid, $acadid);
            $decisionsem = $callfunctiondelib->decision($idetudiant, $specid, $semid, $sessionid, $acadid);



            $deliberation->setStudentid($idetudiant);

            $deliberation->setAcadyearid($acadid);
            $deliberation->setSpecialityid($specid);
            $deliberation->setSemesterid($semid);
            $deliberation->setSessionid($sessionid);
            $deliberation->setTcreditvalide($creditvalide);
            $deliberation->setSemaverage($moyennesemestre);
            $deliberation->setDecision($decisionsem);
            $deliberation->setDelibDate(new \Datetime());
            $deliberation->setDelibUser($userdelib);


            $em = $this->getDoctrine()->getManager();

            $em->persist($deliberation);
            $em->flush();

        }

        return $this->redirectToRoute('siges_startdelib2');
    }


    public function consultationecu(Request $request, UeRepository $uerepo)
    {


        $request->getSession()->set('ueconsultation', $request->query->get('idue'));

        $request->getSession()->set('idetudiant', $request->query->get('idetudiant'));





        $ue = $uerepo->findOneById($request->query->get('idue'));

        $request->getSession()->set('libueconsultation', $ue->getUename());




        return  $this->render('delibsem/consultecu.html.twig',array('current_menu'=>'startdeliblicence'));
    }




    public function listconsultationecu(Request $request, MyFunctionDelib $callfunctiondelib, EcuSpecialityRepository $ecuspecrepo, EcuRepository $ecurepo, UeValidatedRepository $uevalidrepo, StudentExamNotesRepository $studexamrepo)
    {

        $idses=$this->get('session')->get('idsesdelib');

        $idspecialite=$this->get('session')->get('speciddelib');
        $idsem=$this->get('session')->get('semiddelib');


        $idanac=$this->get('session')->get('anacad');;
        $idue=$this->get('session')->get('ueconsultation') ;
        $idstudent=$this->get('session')->get('idetudiant') ;


        $length = $request->get('length');
        $length = $length && ($length!=-1)?$length:0;

        $start = $request->get('start');
        $start = $length?($start && ($start!=-1)?$start:0)/$length:0;

        $search = $request->get('search');
        $filters = [
            'query' => @$search['value']
        ];

        $users = $ecuspecrepo->ueecu($idspecialite,$idsem,$idue,$idanac,
            $filters, $start, $length
        );

        $output = array(
            'data' => array(),
            'recordsFiltered' => count($ecuspecrepo->ueecu($idspecialite,$idsem,$idue,$idanac,$filters, 0, false)),
            'recordsTotal' => count($ecuspecrepo->ueecu($idspecialite,$idsem,$idue,$idanac, 0, false))
        );

        foreach ($users as $user) {








            $ecu = $ecurepo->findOneById($user->getEcuid());



            $uevalide = $uevalidrepo->findOneBy(array('studentid' => $idstudent, 'specialityid' => $idspecialite, 'semesterid' => $idsem, 'ueid' => $idue));
            if ($uevalide) {

                if ($uevalide->getSessionid() == 'SE1') {



                    $averagcc=$callfunctiondelib->averagecc($idstudent,$idspecialite,$uevalide->getSemesterid(), $idue,$user->getEcuid(),$uevalide->getAcadyearid());
                    $notexam=$callfunctiondelib->examnotes($idstudent,$idspecialite,$uevalide->getSemesterid(),$uevalide->getSessionid(),$idue,$user->getEcuid(),$uevalide->getAcadyearid());


                    $averagcctp=$callfunctiondelib->averagecctp($idstudent,$idspecialite,$uevalide->getSemesterid(), $idue,$user->getEcuid(),$uevalide->getAcadyearid());
                    $notexamtp=$callfunctiondelib->examnotestp($idstudent,$idspecialite,$uevalide->getSemesterid(),$uevalide->getSessionid(),$idue,$user->getEcuid(),$uevalide->getAcadyearid());





                    if ($averagcc == "") {
                        $aversem = "";
                    }else{
                        $aversem = number_format((4 * $averagcc + 6 * $notexam) / 10, 2);
                    }










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



                }
                else {



                    $averagcc=$callfunctiondelib->averagecc($idstudent,$idspecialite,$uevalide->getSemesterid(), $idue,$user->getEcuid(),$uevalide->getAcadyearid());




                    $etudiant101 = $studexamrepo->findOneBy(array(
                        'studentid' => $idstudent, 'specialityid' => $idspecialite, 'ecuid' => $user->getEcuid(), 'semesterid' => $uevalide->getSemesterid(), 'sessionid' => $uevalide->getSessionid(), 'typeofexamnotes' => 'EXCC', 'acadyearid' => $uevalide->getAcadyearid()
                    ));
                    if ($etudiant101 != NULL) {

                        if ($etudiant101->getExamnotes() == 99) {

                            $notexam = "NC";


                        } else {

                            $notexam = $etudiant101->getExamnotes();

                        }

                    } else {
                        $notexam = "";
                    }





                    if ($uevalide->getAcadyearid() == '2015-2016') {
                        $averagcc = number_format((float)$notexam, 2);
                        $aversem = number_format((float)$notexam, 2);

                    } else {
                        $aversem = number_format((4 * $averagcc + 6 * $notexam) / 10, 2);
                    }



                    $averagcctp=$callfunctiondelib->averagecctp($idstudent,$idspecialite,$uevalide->getSemesterid(), $idue,$user->getEcuid(),$uevalide->getAcadyearid());



                    $etudiant103 =$studexamrepo->findOneBy(array('studentid' => $idstudent, 'specialityid' => $idspecialite, 'ecuid' => $user->getEcuid(), 'semesterid' => $uevalide->getSemesterid(), 'sessionid' => $uevalide->getSessionid(), 'typeofexamnotes' => 'EXTP', 'acadyearid' => $uevalide->getAcadyearid()));
                    if($etudiant103!=NULL){

                        if($etudiant103->getExamnotes()==99){

                            $notexamtp="NC";


                        }else{

                            $notexamtp=$etudiant103->getExamnotes();

                        }

                    }else{
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








                }
            }
            else {






                $averagcc=$callfunctiondelib->averagecc($idstudent,$idspecialite,$idsem, $idue,$user->getEcuid(),$idanac);
                $notexam=$callfunctiondelib->examnotes($idstudent,$idspecialite,$idsem,$idses,$idue,$user->getEcuid(),$idanac);





                if($averagcc==""){
                    $aversem = "";
                }else{
                    $aversem = number_format((4 * $averagcc + 6 * $notexam) / 10, 2);
                }









                $averagcctp=$callfunctiondelib->averagecctp($idstudent,$idspecialite,$idsem, $idue,$user->getEcuid(),$idanac);
                $notexamtp=$callfunctiondelib->examnotestp($idstudent,$idspecialite,$idsem,$idses,$idue,$user->getEcuid(),$idanac);




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




















            }

            $lienmoycc='<a style="color:#13b9ce; font-weight:bold"  target="_blank" href="/SIGES/public/delibarea/redirectaverageccedituniq?idue=' . $idue. '&amp;idecu=' . $ecu->getId(). '&amp;idetud=' . $idstudent. '&amp;moycc=' . $averagcc. '&amp;libue=' . $this->get('session')->get('libueconsultation'). '&amp;libecu=' . $ecu->getEcuname(). '&amp;catnote=MCC">'.$averagcc.'  </a>';

            $lienmoyex='<a style="color:#13b9ce; font-weight:bold"  target="_blank" href="/SIGES/public/delibarea/redirectnotexamedituniq?idue=' . $idue. '&amp;idecu=' . $ecu->getId(). '&amp;idetud=' . $idstudent. '&amp;moyex=' . $notexam. '&amp;libue=' . $this->get('session')->get('libueconsultation'). '&amp;libecu=' . $ecu->getEcuname(). '&amp;catnote=EXCC">'.$notexam.'  </a>';

            $lienmoycctp='<a style="color:#13b9ce; font-weight:bold"  target="_blank" href="/SIGES/public/delibarea/redirectaverageccedituniq?idue=' . $idue. '&amp;idecu=' . $ecu->getId(). '&amp;idetud=' . $idstudent. '&amp;moytp=' . $averagcctp. '&amp;libue=' . $this->get('session')->get('libueconsultation'). '&amp;libecu=' . $ecu->getEcuname(). '&amp;catnote=MTP">'.$averagcctp.'  </a>';

            $lienmoyextp='<a style="color:#13b9ce; font-weight:bold"  target="_blank" href="/SIGES/public/delibarea/redirectnotexamedituniq?idue=' . $idue. '&amp;idecu=' . $ecu->getId(). '&amp;idetud=' . $idstudent. '&amp;moyex=' . $notexamtp. '&amp;libue=' . $this->get('session')->get('libueconsultation'). '&amp;libecu=' . $ecu->getEcuname(). '&amp;catnote=EXTP">'.$notexamtp.'  </a>';





















            $output['data'][] = [



                'ecu' => $ecu->getEcuname(),

                'cc' => $lienmoycc,


                'examen' => $lienmoyex,
                'moyenne' =>'<span style="font-weight:bold">'.$aversem.'</span>' ,
                'cctp' => $lienmoycctp,
                'examentp' => $lienmoyextp,
                'moyennetp' => '<span style="font-weight:bold">'.$aversemtp.'</span>',
                'moyenneecu' => '<span style="font-weight:bold">'.$averageecu.'</span>',



            ];
        }

        return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);
    }




    public function redirectaverageccedituniq(Request $request)
    {


        $request->getSession()->set('ueidedituniq', $request->query->get('idue'));
        $request->getSession()->set('ecuidedituniq', $request->query->get('idecu'));
        $request->getSession()->set('typaveredituniq', $request->query->get('catnote'));
        $request->getSession()->set('idetuduniq', $request->query->get('idetud'));
        $request->getSession()->set('uenamedituniq', $request->query->get('libue'));
        $request->getSession()->set('ecunamedituniq', $request->query->get('libecu'));




        $idanac=$this->get('session')->get('anacad');
        $idspec=$this->get('session')->get('speciddelib');
        $idsem=$this->get('session')->get('semiddelib');
        $leconnecte=$this->getUser()->getUsername();
        $idue=$request->query->get('idue') ;
        $idecu=$request->query->get('idecu');
        $typeofaver=$request->query->get('catnote');
        $idetud=$request->query->get('idetud');
        $idses=$this->get('session')->get('idsesdelib');



        return $this->redirect("/SIGES/averageccedituniq.php?idanac=$idanac&&idspec=$idspec&&idsem=$idsem&&idue=$idue&&&idecu=$idecu&&typeofaver=$typeofaver&&idetud=$idetud&&leconnecte=$leconnecte&&idses=$idses");

        //return $this->redirectToRoute('esatic_siges__averagedit');
    }


    public function edituniqaveragecc()
    {
        return  $this->render('delibsem/edituniqaveragecc.html.twig');
    }



    public function redirectnotexamedituniq(Request $request)
    {

        $request->getSession()->set('ueidedituniq', $request->query->get('idue'));
        $request->getSession()->set('ecuidedituniq', $request->query->get('idecu'));
        $request->getSession()->set('typaveredituniq', $request->query->get('catnote'));
        $request->getSession()->set('idetuduniq', $request->query->get('idetud'));
        $request->getSession()->set('uenamedituniq', $request->query->get('libue'));
        $request->getSession()->set('ecunamedituniq', $request->query->get('libecu'));




        $idanac=$this->get('session')->get('anacad');
        $idspec=$this->get('session')->get('speciddelib');
        $idsem=$this->get('session')->get('semiddelib');
        $leconnecte=$this->getUser()->getUsername();
        $idue=$request->query->get('idue') ;
        $idecu=$request->query->get('idecu');
        $typeofaver=$request->query->get('catnote');
        $idetud=$request->query->get('idetud');
        $idses=$this->get('session')->get('idsesdelib');



        return $this->redirect("/SIGES/notexamedituniq.php?idanac=$idanac&&idspec=$idspec&&idsem=$idsem&&idue=$idue&&&idecu=$idecu&&typeofaver=$typeofaver&&idetud=$idetud&&leconnecte=$leconnecte&&idses=$idses");


    }


    public function edituniqnotexam()
    {
        return  $this->render('delibsem/edituniqnotexam.html.twig');
    }




    public function decisionjury()
    {


        return  $this->render('delibsem/decisionjury.html.twig');
    }





    public function tabledecisionjury(Request $request, MyFunctionDelib $callfunctiondelib, StudentSpecialityRepository $studspecrepo, StudentRepository $studrepo, HalfYearlyDelibRepository $halfyeardelibrep)
    {


        $idses=$this->get('session')->get('idsesdelib');

        $idspecialite=$this->get('session')->get('speciddelib');
        $idsem=$this->get('session')->get('semiddelib');


        $idanac=$this->get('session')->get('anacad');
        $idlevel = $this->get('session')->get('leveliddelib');



        if($idses=='SE1') {
            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $delibsem = $request->get('delibsem');
            $filters = [
                'query' => @$delibsem['value']
            ];

            $users = $studspecrepo->studspec($idanac, $idsem, $idspecialite, $idses,
                $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($studspecrepo->studspec($idanac, $idsem, $idspecialite, $idses, $filters, 0, false)),
                'recordsTotal' => count($studspecrepo->studspec($idanac, $idsem, $idspecialite, $idses, 0, false))
            );

            foreach ($users as $user) {


                $specid = $idspecialite;
                $semid = $idsem;
                $sessionid = $idses;
                $acadid = $idanac;


                $idstudent = $user['studentid'];


                $studentecu = $studrepo->findOneById($idstudent);


                $em = $this->getDoctrine()->getManager();


                $rsm = new ResultSetMapping();

                $rsm->addScalarResult('picture', 'picture');
                $rsm->addScalarResult('school_classeid', 'school_classeid');
                $rsm->addScalarResult('state', 'state');

                $sql = "SELECT picture,school_classeid,state FROM `student_speciality`  WHERE student_speciality.studentid=:idstud and student_speciality.specialityid=:idspec and student_speciality.acadyearid=:idanac and student_speciality.levelid=:idlev  ";
                $query = $em->createNativeQuery($sql, $rsm);
                $query->setParameter('idspec', $idspecialite);
                $query->setParameter('idstud', $idstudent);

                $query->setParameter('idanac', $idanac);
                $query->setParameter('idlev', $idlevel);


                $studpic = $query->getResult();


                foreach ($studpic as $ne) {


                    $studentpic = $ne['picture'];
                    $classeid = $ne['school_classeid'];
                    $state= $ne['state'];

                }


                $lientof = '
                                                <img class="img" onclick="window.open(this.src,\'_blank\',\'toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=0, copyhistory=0, menuBar=0, width=\'+this.width+\', height=\'+this.height);" src="/SIGES/public/images/photoetudiant/' . $studentpic . '" />
                                          ';


                $decijury = $halfyeardelibrep->findOneBy(array('studentid' => $idstudent, 'specialityid' => $specid, 'semesterid' => $semid, 'sessionid' => $sessionid, 'acadyearid' => $acadid));


                $creditvalide = $decijury->getTcreditvalide();
                $moyennesemestre = $decijury->getSemaverage();;
                $decisionsem = $decijury->getDecision();

                if ($decisionsem == 'ADMIS') {


                    $decisionaffich = '<button class="btn btn-success btn-xs">
                                        ADMIS
                                    </button>';
                } else {

                    $decisionaffich = '<button class="btn btn-danger btn-xs">
                                        REFUSE
                                    </button>';
                }


                $output['data'][] = [
                    'idetudiant' => $idstudent,
                    'tof' => $lientof,
                    'nom' => $studentecu->getFirstname(),
                    'prenom' =>  $studentecu->getLastname(),
                    'genre' =>  $studentecu->getKind(),
                    'classe' => $classeid,
                    'statut' => $state,


                    'creditva' => $creditvalide,
                    'moyennesem' => $moyennesemestre,
                    'jury' => $decisionaffich


                ];

            }
            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);














        }else{

            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $delibsem = $request->get('delibsem');
            $filters = [
                'query' => @$delibsem['value']
            ];

            $users = $studspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses,
                $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($studspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses, $filters, 0, false)),
                'recordsTotal' => count($studspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses, 0, false))
            );

            foreach ($users as $user) {


                $specid = $idspecialite;
                $semid = $idsem;
                $sessionid = $idses;
                $acadid = $idanac;


                $idstudent = $user['studentid'];


                $studentecu = $studrepo->findOneById($idstudent);


                $em = $this->getDoctrine()->getManager();


                $rsm = new ResultSetMapping();

                $rsm->addScalarResult('picture', 'picture');
                $rsm->addScalarResult('school_classeid', 'school_classeid');
                $rsm->addScalarResult('state', 'state');

                $sql = "SELECT picture,school_classeid,state FROM `student_speciality`  WHERE student_speciality.studentid=:idstud and student_speciality.specialityid=:idspec and student_speciality.acadyearid=:idanac and student_speciality.levelid=:idlev  ";
                $query = $em->createNativeQuery($sql, $rsm);
                $query->setParameter('idspec', $idspecialite);
                $query->setParameter('idstud', $idstudent);

                $query->setParameter('idanac', $idanac);
                $query->setParameter('idlev', $idlevel);


                $studpic = $query->getResult();


                foreach ($studpic as $ne) {


                    $studentpic = $ne['picture'];
                    $classeid = $ne['school_classeid'];
                    $state= $ne['state'];

                }


                $lientof = '
                                                <img class="img" onclick="window.open(this.src,\'_blank\',\'toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=0, copyhistory=0, menuBar=0, width=\'+this.width+\', height=\'+this.height);" src="/SIGES/public/images/photoetudiant/' . $studentpic . '" />
                                          ';


                $decijury = $halfyeardelibrep->findOneBy(array('studentid' => $idstudent, 'specialityid' => $specid, 'semesterid' => $semid, 'sessionid' => $sessionid, 'acadyearid' => $acadid));


                $creditvalide = $decijury->getTcreditvalide();
                $moyennesemestre = $decijury->getSemaverage();;
                $decisionsem = $decijury->getDecision();

                if ($decisionsem == 'ADMIS') {


                    $decisionaffich = '<button class="btn btn-success btn-xs">
                                        ADMIS
                                    </button>';
                } else {

                    $decisionaffich = '<button class="btn btn-danger btn-xs">
                                        REFUSE
                                    </button>';
                }


                $output['data'][] = [
                    'idetudiant' => $idstudent,
                    'tof' => $lientof,
                    'nom' => $studentecu->getFirstname(),
                    'prenom' =>  $studentecu->getLastname(),
                    'genre' =>  $studentecu->getKind(),
                    'classe' => $classeid,
                    'statut' => $state,


                    'creditva' => $creditvalide,
                    'moyennesem' => $moyennesemestre,
                    'jury' => $decisionaffich


                ];

            }
            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);





        }





    }



    public function delibannuel()
    {


        return $this->render('delibsem/delibannuel.html.twig', array('current_menu'=>'delibannuel'));
    }



    public function tabledelibannuel(Request $request, MyFunctionDelib $callfunctiondelib, StudentSpecialityRepository $stdspecrepo, StudentRepository $stdrepo, HalfYearlyDelibRepository $halfyearlydelib)
    {





        $idses=$this->get('session')->get('idsesdelib');

        $idspecialite=$this->get('session')->get('speciddelib');
        $idsem=$this->get('session')->get('semiddelib');


        $idanac=$this->get('session')->get('anacad');
        $idlevel = $this->get('session')->get('leveliddelib');


        if($idses=='SE1'){
            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $delibsem = $request->get('delibsem');
            $filters = [
                'query' => @$delibsem['value']
            ];

            $users = $stdspecrepo->delibannuel($idanac, $idlevel, $idspecialite,
                $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($stdspecrepo->delibannuel($idanac, $idlevel, $idspecialite,  $filters, 0, false)),
                'recordsTotal' => count($stdspecrepo->delibannuel($idanac, $idlevel, $idspecialite, 0, false))
            );

            foreach ($users as $user) {

                $idetudiant = $user['studentid'];



                $etudiant = $stdrepo->findOneById($idetudiant);




                if($idlevel=='L1') {

                    $em = $this->getDoctrine()->getManager();
                    $rsm = new ResultSetMapping();

                    $rsm->addScalarResult('acadyearid', 'acadyearid');



                    $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1  ";
                    $query = $em->createNativeQuery($sql, $rsm);




                    $query->setParameter('idetudiant', $idetudiant);
                    $query->setParameter('idspecialite', $idspecialite);
                    $anacetud = $query->getResult();
                    foreach ($anacetud as $ma){
                        $anacsem1=$ma['acadyearid'];
                    }











                    $decijury = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM1', 'sessionid' => 'SE2', 'acadyearid' => $anacsem1));






                    if(!$decijury){


                        $decijuryse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM1', 'sessionid' => 'SE1', 'acadyearid' => $anacsem1));

                        if($decijuryse1){
                            $creditvalide = $decijuryse1->getTcreditvalide();
                            $moyennesemestre = $decijuryse1->getSemaverage();
                            $decisionsem = $decijuryse1->getDecision();
                        }else{
                            $creditvalide=0;
                            $moyennesemestre=0;
                            $decisionsem="REFUSE";
                        }







                    }else{  $creditvalide = $decijury->getTcreditvalide();
                        $moyennesemestre = $decijury->getSemaverage();
                        $decisionsem = $decijury->getDecision();}



                    $em = $this->getDoctrine()->getManager();
                    $rsm = new ResultSetMapping();

                    $rsm->addScalarResult('acadyearid', 'acadyearid');



                    $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1  ";
                    $query = $em->createNativeQuery($sql, $rsm);




                    $query->setParameter('idetudiant', $idetudiant);
                    $query->setParameter('idspecialite', $idspecialite);
                    $anacetudse = $query->getResult();
                    foreach ($anacetudse as $ma){
                        $anacsem2=$ma['acadyearid'];
                    }







                    $decijurys = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM2', 'sessionid' => 'SE2', 'acadyearid' => $anacsem2));


                    if(!$decijurys){


                        $decijurysse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM2', 'sessionid' => 'SE1', 'acadyearid' => $anacsem2

                        ));
                        if($decijurysse1){
                            $creditvalide2= $decijurysse1->getTcreditvalide();
                            $moyennesemestre2 = $decijurysse1->getSemaverage();
                            $decisionsem2= $decijurysse1->getDecision();

                        }else{ $creditvalide2=0;
                            $moyennesemestre2=0;
                            $decisionsem2="REFUSE";}

                    }else{
                        $creditvalide2= $decijurys->getTcreditvalide();
                        $moyennesemestre2 = $decijurys->getSemaverage();
                        $decisionsem2= $decijurys->getDecision();
                    }


                    $creditan = $creditvalide2 + $creditvalide;
                    $mgan = number_format((($moyennesemestre + $moyennesemestre2) / 2), 2);


                    if ($decisionsem2 == 'ADMIS' && $decisionsem == 'ADMIS') {


                        $decian = 'ADMIS';
                    } else {

                        $decian = 'REFUSE';
                    }


                }

                if($idlevel=='L3') {

                    $em = $this->getDoctrine()->getManager();
                    $rsm = new ResultSetMapping();

                    $rsm->addScalarResult('acadyearid', 'acadyearid');



                    $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1  ";
                    $query = $em->createNativeQuery($sql, $rsm);




                    $query->setParameter('idetudiant', $idetudiant);
                    $query->setParameter('idspecialite', $idspecialite);
                    $anacetud = $query->getResult();
                    foreach ($anacetud as $ma){
                        $anacsem1=$ma['acadyearid'];
                    }











                    $decijury = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM5', 'sessionid' => 'SE2', 'acadyearid' => $anacsem1));






                    if(!$decijury){


                        $decijuryse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM5', 'sessionid' => 'SE1', 'acadyearid' => $anacsem1));

                        if($decijuryse1){
                            $creditvalide = $decijuryse1->getTcreditvalide();
                            $moyennesemestre = $decijuryse1->getSemaverage();
                            $decisionsem = $decijuryse1->getDecision();
                        }else{
                            $creditvalide=0;
                            $moyennesemestre=0;
                            $decisionsem="REFUSE";
                        }







                    }else{  $creditvalide = $decijury->getTcreditvalide();
                        $moyennesemestre = $decijury->getSemaverage();
                        $decisionsem = $decijury->getDecision();}



                    $em = $this->getDoctrine()->getManager();
                    $rsm = new ResultSetMapping();

                    $rsm->addScalarResult('acadyearid', 'acadyearid');



                    $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1  ";
                    $query = $em->createNativeQuery($sql, $rsm);




                    $query->setParameter('idetudiant', $idetudiant);
                    $query->setParameter('idspecialite', $idspecialite);
                    $anacetudse = $query->getResult();
                    foreach ($anacetudse as $ma){
                        $anacsem2=$ma['acadyearid'];
                    }







                    $decijurys = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM6', 'sessionid' => 'SE2', 'acadyearid' => $anacsem2));


                    if(!$decijurys){


                        $decijurysse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM6', 'sessionid' => 'SE1', 'acadyearid' => $anacsem2

                        ));
                        if($decijurysse1){
                            $creditvalide2= $decijurysse1->getTcreditvalide();
                            $moyennesemestre2 = $decijurysse1->getSemaverage();
                            $decisionsem2= $decijurysse1->getDecision();

                        }else{ $creditvalide2=0;
                            $moyennesemestre2=0;
                            $decisionsem2="REFUSE";}

                    }else{
                        $creditvalide2= $decijurys->getTcreditvalide();
                        $moyennesemestre2 = $decijurys->getSemaverage();
                        $decisionsem2= $decijurys->getDecision();
                    }


                    $creditan = $creditvalide2 + $creditvalide;
                    $mgan = number_format((($moyennesemestre + $moyennesemestre2) / 2), 2);


                    if ($decisionsem2 == 'ADMIS' && $decisionsem == 'ADMIS') {


                        $decian = 'ADMIS';
                    } else {

                        $decian = 'REFUSE';
                    }


                }


                if($idlevel=='L2') {

                    $em = $this->getDoctrine()->getManager();
                    $rsm = new ResultSetMapping();

                    $rsm->addScalarResult('acadyearid', 'acadyearid');

                    $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1  ";
                    $query = $em->createNativeQuery($sql, $rsm);

                    $query->setParameter('idetudiant', $idetudiant);
                    $query->setParameter('idspecialite', $idspecialite);
                    $anacetud = $query->getResult();
                    foreach ($anacetud as $ma){
                        $anacsem1=$ma['acadyearid'];
                    }










                    $decijury = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM3', 'sessionid' => 'SE2', 'acadyearid' => $anacsem1));






                    if(!$decijury){


                        $decijuryse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM3', 'sessionid' => 'SE1', 'acadyearid' => $anacsem1));

                        if($decijuryse1){
                            $creditvalide = $decijuryse1->getTcreditvalide();
                            $moyennesemestre = $decijuryse1->getSemaverage();
                            $decisionsem = $decijuryse1->getDecision();
                        }else{
                            $creditvalide=0;
                            $moyennesemestre=0;
                            $decisionsem="REFUSE";
                        }







                    }else{  $creditvalide = $decijury->getTcreditvalide();
                        $moyennesemestre = $decijury->getSemaverage();
                        $decisionsem = $decijury->getDecision();}



                    $em = $this->getDoctrine()->getManager();
                    $rsm = new ResultSetMapping();

                    $rsm->addScalarResult('acadyearid', 'acadyearid');



                    $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1  ";
                    $query = $em->createNativeQuery($sql, $rsm);




                    $query->setParameter('idetudiant', $idetudiant);
                    $query->setParameter('idspecialite', $idspecialite);
                    $anacetudse = $query->getResult();
                    foreach ($anacetudse as $ma){
                        $anacsem2=$ma['acadyearid'];
                    }







                    $decijurys = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM4', 'sessionid' => 'SE2', 'acadyearid' => $anacsem2));


                    if(!$decijurys){


                        $decijurysse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM4', 'sessionid' => 'SE1', 'acadyearid' => $anacsem2

                        ));
                        if($decijurysse1){
                            $creditvalide2= $decijurysse1->getTcreditvalide();
                            $moyennesemestre2 = $decijurysse1->getSemaverage();
                            $decisionsem2= $decijurysse1->getDecision();

                        }else{ $creditvalide2=0;
                            $moyennesemestre2=0;
                            $decisionsem2="REFUSE";}

                    }else{
                        $creditvalide2= $decijurys->getTcreditvalide();
                        $moyennesemestre2 = $decijurys->getSemaverage();
                        $decisionsem2= $decijurys->getDecision();
                    }


                    $creditan = $creditvalide2 + $creditvalide;
                    $mgan = number_format((($moyennesemestre + $moyennesemestre2) / 2), 2);


                    if ($decisionsem2 == 'ADMIS' && $decisionsem == 'ADMIS') {


                        $decian = 'ADMIS';
                    } else {

                        $decian = 'REFUSE';
                    }


                }

                if($idlevel=='M1') {






                    if($idspecialite=='RTEL' || $idspecialite=='MBDS' || $idspecialite=='MDSI' )
                    {


                        $em = $this->getDoctrine()->getManager();
                        $rsm = new ResultSetMapping();

                        $rsm->addScalarResult('acadyearid', 'acadyearid');



                        $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1  ";
                        $query = $em->createNativeQuery($sql, $rsm);




                        $query->setParameter('idetudiant', $idetudiant);
                        $query->setParameter('idspecialite', $idspecialite);
                        $anacetud = $query->getResult();
                        foreach ($anacetud as $ma){
                            $anacsem1=$ma['acadyearid'];
                        }









                        $decijury = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM7', 'sessionid' => 'SE2', 'acadyearid' => $anacsem1));






                        if(!$decijury){


                            $decijuryse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM7', 'sessionid' => 'SE1', 'acadyearid' => $anacsem1));

                            if($decijuryse1){
                                $creditvalide = $decijuryse1->getTcreditvalide();
                                $moyennesemestre = $decijuryse1->getSemaverage();
                                $decisionsem = $decijuryse1->getDecision();
                            }else{
                                $creditvalide=0;
                                $moyennesemestre=0;
                                $decisionsem="REFUSE";
                            }







                        }







                        else{  $creditvalide = $decijury->getTcreditvalide();
                            $moyennesemestre = $decijury->getSemaverage();
                            $decisionsem = $decijury->getDecision();}



                        $em = $this->getDoctrine()->getManager();
                        $rsm = new ResultSetMapping();

                        $rsm->addScalarResult('acadyearid', 'acadyearid');



                        $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1  ";
                        $query = $em->createNativeQuery($sql, $rsm);




                        $query->setParameter('idetudiant', $idetudiant);
                        $query->setParameter('idspecialite', $idspecialite);
                        $anacetudse = $query->getResult();
                        foreach ($anacetudse as $ma){
                            $anacsem2=$ma['acadyearid'];
                        }







                        $decijurys = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM8', 'sessionid' => 'SE2', 'acadyearid' => $anacsem2));


                        if(!$decijurys){


                            $decijurysse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM8', 'sessionid' => 'SE1', 'acadyearid' => $anacsem2

                            ));
                            if($decijurysse1){
                                $creditvalide2= $decijurysse1->getTcreditvalide();
                                $moyennesemestre2 = $decijurysse1->getSemaverage();
                                $decisionsem2= $decijurysse1->getDecision();

                            }else{ $creditvalide2=0;
                                $moyennesemestre2=0;
                                $decisionsem2="REFUSE";}

                        }else{
                            $creditvalide2= $decijurys->getTcreditvalide();
                            $moyennesemestre2 = $decijurys->getSemaverage();
                            $decisionsem2= $decijurys->getDecision();
                        }


                        $creditan = $creditvalide2 + $creditvalide;
                        $mgan = number_format((($moyennesemestre + $moyennesemestre2) / 2), 2);


                        if ($decisionsem2 == 'ADMIS' && $decisionsem == 'ADMIS') {


                            $decian = 'ADMIS';
                        } else {

                            $decian = 'REFUSE';
                        }
                    }else{



                        $em = $this->getDoctrine()->getManager();
                        $rsm = new ResultSetMapping();

                        $rsm->addScalarResult('acadyearid', 'acadyearid');



                        $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1  ";
                        $query = $em->createNativeQuery($sql, $rsm);




                        $query->setParameter('idetudiant', $idetudiant);

                        $anacetud = $query->getResult();
                        foreach ($anacetud as $ma){
                            $anacsem1=$ma['acadyearid'];
                        }






                        $decijury = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => 'TCSIGLSITW', 'semesterid' => 'SEM7', 'sessionid' => 'SE2', 'acadyearid' => $anacsem1));






                        if(!$decijury){


                            $decijuryse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => 'TCSIGLSITW', 'semesterid' => 'SEM7', 'sessionid' => 'SE1', 'acadyearid' => $anacsem1));

                            if($decijuryse1){
                                $creditvalide = $decijuryse1->getTcreditvalide();
                                $moyennesemestre = $decijuryse1->getSemaverage();
                                $decisionsem = $decijuryse1->getDecision();
                            }else{
                                $creditvalide=0;
                                $moyennesemestre=0;
                                $decisionsem="REFUSE";
                            }







                        }







                        else{  $creditvalide = $decijury->getTcreditvalide();
                            $moyennesemestre = $decijury->getSemaverage();
                            $decisionsem = $decijury->getDecision();}



                        $em = $this->getDoctrine()->getManager();
                        $rsm = new ResultSetMapping();

                        $rsm->addScalarResult('acadyearid', 'acadyearid');



                        $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1  ";
                        $query = $em->createNativeQuery($sql, $rsm);




                        $query->setParameter('idetudiant', $idetudiant);
                        $query->setParameter('idspecialite', $idspecialite);
                        $anacetudse = $query->getResult();
                        foreach ($anacetudse as $ma){
                            $anacsem2=$ma['acadyearid'];
                        }







                        $decijurys = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM8', 'sessionid' => 'SE2', 'acadyearid' => $anacsem2));


                        if(!$decijurys){


                            $decijurysse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM8', 'sessionid' => 'SE1', 'acadyearid' => $anacsem2

                            ));
                            if($decijurysse1){
                                $creditvalide2= $decijurysse1->getTcreditvalide();
                                $moyennesemestre2 = $decijurysse1->getSemaverage();
                                $decisionsem2= $decijurysse1->getDecision();

                            }else{ $creditvalide2=0;
                                $moyennesemestre2=0;
                                $decisionsem2="REFUSE";}

                        }else{
                            $creditvalide2= $decijurys->getTcreditvalide();
                            $moyennesemestre2 = $decijurys->getSemaverage();
                            $decisionsem2= $decijurys->getDecision();
                        }


                        $creditan = $creditvalide2 + $creditvalide;
                        $mgan = number_format((($moyennesemestre + $moyennesemestre2) / 2), 2);


                        if ($decisionsem2 == 'ADMIS' && $decisionsem == 'ADMIS') {


                            $decian = 'ADMIS';
                        } else {

                            $decian = 'REFUSE';
                        }



                    }





                }


                if($idlevel=='M2') {

                    $em = $this->getDoctrine()->getManager();
                    $rsm = new ResultSetMapping();

                    $rsm->addScalarResult('acadyearid', 'acadyearid');



                    $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1  ";
                    $query = $em->createNativeQuery($sql, $rsm);




                    $query->setParameter('idetudiant', $idetudiant);
                    $query->setParameter('idspecialite', $idspecialite);
                    $anacetud = $query->getResult();
                    foreach ($anacetud as $ma){
                        $anacsem1=$ma['acadyearid'];
                    }











                    $decijury = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM9', 'sessionid' => 'SE2', 'acadyearid' => $anacsem1));






                    if(!$decijury){


                        $decijuryse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM9', 'sessionid' => 'SE1', 'acadyearid' => $anacsem1));

                        if($decijuryse1){
                            $creditvalide = $decijuryse1->getTcreditvalide();
                            $moyennesemestre = $decijuryse1->getSemaverage();
                            $decisionsem = $decijuryse1->getDecision();
                        }else{
                            $creditvalide=0;
                            $moyennesemestre=0;
                            $decisionsem="REFUSE";
                        }







                    }else{  $creditvalide = $decijury->getTcreditvalide();
                        $moyennesemestre = $decijury->getSemaverage();
                        $decisionsem = $decijury->getDecision();}



                    $em = $this->getDoctrine()->getManager();
                    $rsm = new ResultSetMapping();

                    $rsm->addScalarResult('acadyearid', 'acadyearid');



                    $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1  ";
                    $query = $em->createNativeQuery($sql, $rsm);




                    $query->setParameter('idetudiant', $idetudiant);
                    $query->setParameter('idspecialite', $idspecialite);
                    $anacetudse = $query->getResult();
                    foreach ($anacetudse as $ma){
                        $anacsem2=$ma['acadyearid'];
                    }







                    $decijurys = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM10', 'sessionid' => 'SE2', 'acadyearid' => $anacsem2));


                    if(!$decijurys){


                        $decijurysse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM10', 'sessionid' => 'SE1', 'acadyearid' => $anacsem2

                        ));
                        if($decijurysse1){
                            $creditvalide2= $decijurysse1->getTcreditvalide();
                            $moyennesemestre2 = $decijurysse1->getSemaverage();
                            $decisionsem2= $decijurysse1->getDecision();

                        }else{ $creditvalide2=0;
                            $moyennesemestre2=0;
                            $decisionsem2="REFUSE";}

                    }else{
                        $creditvalide2= $decijurys->getTcreditvalide();
                        $moyennesemestre2 = $decijurys->getSemaverage();
                        $decisionsem2= $decijurys->getDecision();
                    }


                    $creditan = $creditvalide2 + $creditvalide;
                    $mgan = number_format((($moyennesemestre + $moyennesemestre2) / 2), 2);


                    if ($decisionsem2 == 'ADMIS' && $decisionsem == 'ADMIS') {


                        $decian = 'ADMIS';
                    } else {

                        $decian = 'REFUSE';
                    }


                }



                $output['data'][] = [
                    'idetudiant' => $idetudiant,
                    'nom' => $etudiant->getFirstname(),
                    'prenom' => $etudiant->getLastname(),
                    'genre' => $etudiant->getKind(),


                    'moyennesem' => $moyennesemestre,
                    'creditva' => $creditvalide,

                    'jury' => $decisionsem,
                    'moyennesem2' => $moyennesemestre2,
                    'creditva2' => $creditvalide2,

                    'jury2' => $decisionsem2,

                    'moyenneseman' => $mgan,
                    'creditvaan' => $creditan,

                    'juryan' => $decian



                ];






            }

            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);}

        else{

            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $delibsem = $request->get('delibsem');
            $filters = [
                'query' => @$delibsem['value']
            ];

            $users = $stdspecrepo->delibannuelse2($idanac, $idlevel, $idspecialite,$idsem,
                $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($stdspecrepo->delibannuelse2($idanac, $idlevel, $idspecialite,$idsem , $filters, 0, false)),
                'recordsTotal' => count($stdspecrepo->delibannuelse2($idanac, $idlevel, $idspecialite,$idsem ,0, false))
            );

            foreach ($users as $user) {

                $idetudiant = $user['studentid'];



                $etudiant = $stdrepo->findOneById($idetudiant);




                if($idlevel=='L1') {

                    $em = $this->getDoctrine()->getManager();
                    $rsm = new ResultSetMapping();

                    $rsm->addScalarResult('acadyearid', 'acadyearid');



                    $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1  ";
                    $query = $em->createNativeQuery($sql, $rsm);




                    $query->setParameter('idetudiant', $idetudiant);
                    $query->setParameter('idspecialite', $idspecialite);
                    $anacetud = $query->getResult();
                    foreach ($anacetud as $ma){
                        $anacsem1=$ma['acadyearid'];
                    }











                    $decijury = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM1', 'sessionid' => 'SE2', 'acadyearid' => $anacsem1));






                    if(!$decijury){


                        $decijuryse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM1', 'sessionid' => 'SE1', 'acadyearid' => $anacsem1));

                        if($decijuryse1){
                            $creditvalide = $decijuryse1->getTcreditvalide();
                            $moyennesemestre = $decijuryse1->getSemaverage();
                            $decisionsem = $decijuryse1->getDecision();
                        }else{
                            $creditvalide=0;
                            $moyennesemestre=0;
                            $decisionsem="REFUSE";
                        }







                    }else{  $creditvalide = $decijury->getTcreditvalide();
                        $moyennesemestre = $decijury->getSemaverage();
                        $decisionsem = $decijury->getDecision();}



                    $em = $this->getDoctrine()->getManager();
                    $rsm = new ResultSetMapping();

                    $rsm->addScalarResult('acadyearid', 'acadyearid');



                    $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1  ";
                    $query = $em->createNativeQuery($sql, $rsm);




                    $query->setParameter('idetudiant', $idetudiant);
                    $query->setParameter('idspecialite', $idspecialite);
                    $anacetudse = $query->getResult();
                    foreach ($anacetudse as $ma){
                        $anacsem2=$ma['acadyearid'];
                    }







                    $decijurys = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM2', 'sessionid' => 'SE2', 'acadyearid' => $anacsem2));


                    if(!$decijurys){


                        $decijurysse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM2', 'sessionid' => 'SE1', 'acadyearid' => $anacsem2

                        ));
                        if($decijurysse1){
                            $creditvalide2= $decijurysse1->getTcreditvalide();
                            $moyennesemestre2 = $decijurysse1->getSemaverage();
                            $decisionsem2= $decijurysse1->getDecision();

                        }else{ $creditvalide2=0;
                            $moyennesemestre2=0;
                            $decisionsem2="REFUSE";}

                    }else{
                        $creditvalide2= $decijurys->getTcreditvalide();
                        $moyennesemestre2 = $decijurys->getSemaverage();
                        $decisionsem2= $decijurys->getDecision();
                    }


                    $creditan = $creditvalide2 + $creditvalide;
                    $mgan = number_format((($moyennesemestre + $moyennesemestre2) / 2), 2);


                    if ($decisionsem2 == 'ADMIS' && $decisionsem == 'ADMIS') {


                        $decian = 'ADMIS';
                    } else {

                        $decian = 'REFUSE';
                    }


                }

                if($idlevel=='L3') {

                    $em = $this->getDoctrine()->getManager();
                    $rsm = new ResultSetMapping();

                    $rsm->addScalarResult('acadyearid', 'acadyearid');



                    $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1  ";
                    $query = $em->createNativeQuery($sql, $rsm);




                    $query->setParameter('idetudiant', $idetudiant);
                    $query->setParameter('idspecialite', $idspecialite);
                    $anacetud = $query->getResult();
                    foreach ($anacetud as $ma){
                        $anacsem1=$ma['acadyearid'];
                    }











                    $decijury = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM5', 'sessionid' => 'SE2', 'acadyearid' => $anacsem1));






                    if(!$decijury){


                        $decijuryse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM5', 'sessionid' => 'SE1', 'acadyearid' => $anacsem1));

                        if($decijuryse1){
                            $creditvalide = $decijuryse1->getTcreditvalide();
                            $moyennesemestre = $decijuryse1->getSemaverage();
                            $decisionsem = $decijuryse1->getDecision();
                        }else{
                            $creditvalide=0;
                            $moyennesemestre=0;
                            $decisionsem="REFUSE";
                        }







                    }else{  $creditvalide = $decijury->getTcreditvalide();
                        $moyennesemestre = $decijury->getSemaverage();
                        $decisionsem = $decijury->getDecision();}



                    $em = $this->getDoctrine()->getManager();
                    $rsm = new ResultSetMapping();

                    $rsm->addScalarResult('acadyearid', 'acadyearid');



                    $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1  ";
                    $query = $em->createNativeQuery($sql, $rsm);




                    $query->setParameter('idetudiant', $idetudiant);
                    $query->setParameter('idspecialite', $idspecialite);
                    $anacetudse = $query->getResult();
                    foreach ($anacetudse as $ma){
                        $anacsem2=$ma['acadyearid'];
                    }







                    $decijurys = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM6', 'sessionid' => 'SE2', 'acadyearid' => $anacsem2));


                    if(!$decijurys){


                        $decijurysse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM6', 'sessionid' => 'SE1', 'acadyearid' => $anacsem2

                        ));
                        if($decijurysse1){
                            $creditvalide2= $decijurysse1->getTcreditvalide();
                            $moyennesemestre2 = $decijurysse1->getSemaverage();
                            $decisionsem2= $decijurysse1->getDecision();

                        }else{ $creditvalide2=0;
                            $moyennesemestre2=0;
                            $decisionsem2="REFUSE";}

                    }else{
                        $creditvalide2= $decijurys->getTcreditvalide();
                        $moyennesemestre2 = $decijurys->getSemaverage();
                        $decisionsem2= $decijurys->getDecision();
                    }


                    $creditan = $creditvalide2 + $creditvalide;
                    $mgan = number_format((($moyennesemestre + $moyennesemestre2) / 2), 2);


                    if ($decisionsem2 == 'ADMIS' && $decisionsem == 'ADMIS') {


                        $decian = 'ADMIS';
                    } else {

                        $decian = 'REFUSE';
                    }


                }


                if($idlevel=='L2') {

                    $em = $this->getDoctrine()->getManager();
                    $rsm = new ResultSetMapping();

                    $rsm->addScalarResult('acadyearid', 'acadyearid');



                    $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1  ";
                    $query = $em->createNativeQuery($sql, $rsm);




                    $query->setParameter('idetudiant', $idetudiant);
                    $query->setParameter('idspecialite', $idspecialite);
                    $anacetud = $query->getResult();
                    foreach ($anacetud as $ma){
                        $anacsem1=$ma['acadyearid'];
                    }










                    $decijury = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM3', 'sessionid' => 'SE2', 'acadyearid' => $anacsem1));






                    if(!$decijury){


                        $decijuryse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM3', 'sessionid' => 'SE1', 'acadyearid' => $anacsem1));

                        if($decijuryse1){
                            $creditvalide = $decijuryse1->getTcreditvalide();
                            $moyennesemestre = $decijuryse1->getSemaverage();
                            $decisionsem = $decijuryse1->getDecision();
                        }else{
                            $creditvalide=0;
                            $moyennesemestre=0;
                            $decisionsem="REFUSE";
                        }







                    }else{  $creditvalide = $decijury->getTcreditvalide();
                        $moyennesemestre = $decijury->getSemaverage();
                        $decisionsem = $decijury->getDecision();}



                    $em = $this->getDoctrine()->getManager();
                    $rsm = new ResultSetMapping();

                    $rsm->addScalarResult('acadyearid', 'acadyearid');



                    $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1  ";
                    $query = $em->createNativeQuery($sql, $rsm);




                    $query->setParameter('idetudiant', $idetudiant);
                    $query->setParameter('idspecialite', $idspecialite);
                    $anacetudse = $query->getResult();
                    foreach ($anacetudse as $ma){
                        $anacsem2=$ma['acadyearid'];
                    }







                    $decijurys = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM4', 'sessionid' => 'SE2', 'acadyearid' => $anacsem2));


                    if(!$decijurys){


                        $decijurysse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM4', 'sessionid' => 'SE1', 'acadyearid' => $anacsem2

                        ));
                        if($decijurysse1){
                            $creditvalide2= $decijurysse1->getTcreditvalide();
                            $moyennesemestre2 = $decijurysse1->getSemaverage();
                            $decisionsem2= $decijurysse1->getDecision();

                        }else{ $creditvalide2=0;
                            $moyennesemestre2=0;
                            $decisionsem2="REFUSE";}

                    }else{
                        $creditvalide2= $decijurys->getTcreditvalide();
                        $moyennesemestre2 = $decijurys->getSemaverage();
                        $decisionsem2= $decijurys->getDecision();
                    }


                    $creditan = $creditvalide2 + $creditvalide;
                    $mgan = number_format((($moyennesemestre + $moyennesemestre2) / 2), 2);


                    if ($decisionsem2 == 'ADMIS' && $decisionsem == 'ADMIS') {


                        $decian = 'ADMIS';
                    } else {

                        $decian = 'REFUSE';
                    }


                }

                if($idlevel=='M1') {






                    if($idspecialite=='RTEL' || $idspecialite=='MBDS' || $idspecialite=='MDSI' )
                    {


                        $em = $this->getDoctrine()->getManager();
                        $rsm = new ResultSetMapping();

                        $rsm->addScalarResult('acadyearid', 'acadyearid');



                        $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1  ";
                        $query = $em->createNativeQuery($sql, $rsm);




                        $query->setParameter('idetudiant', $idetudiant);
                        $query->setParameter('idspecialite', $idspecialite);
                        $anacetud = $query->getResult();
                        foreach ($anacetud as $ma){
                            $anacsem1=$ma['acadyearid'];
                        }









                        $decijury = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM7', 'sessionid' => 'SE2', 'acadyearid' => $anacsem1));






                        if(!$decijury){


                            $decijuryse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM7', 'sessionid' => 'SE1', 'acadyearid' => $anacsem1));

                            if($decijuryse1){
                                $creditvalide = $decijuryse1->getTcreditvalide();
                                $moyennesemestre = $decijuryse1->getSemaverage();
                                $decisionsem = $decijuryse1->getDecision();
                            }else{
                                $creditvalide=0;
                                $moyennesemestre=0;
                                $decisionsem="REFUSE";
                            }







                        }







                        else{  $creditvalide = $decijury->getTcreditvalide();
                            $moyennesemestre = $decijury->getSemaverage();
                            $decisionsem = $decijury->getDecision();}



                        $em = $this->getDoctrine()->getManager();
                        $rsm = new ResultSetMapping();

                        $rsm->addScalarResult('acadyearid', 'acadyearid');



                        $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1  ";
                        $query = $em->createNativeQuery($sql, $rsm);




                        $query->setParameter('idetudiant', $idetudiant);
                        $query->setParameter('idspecialite', $idspecialite);
                        $anacetudse = $query->getResult();
                        foreach ($anacetudse as $ma){
                            $anacsem2=$ma['acadyearid'];
                        }







                        $decijurys = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM8', 'sessionid' => 'SE2', 'acadyearid' => $anacsem2));


                        if(!$decijurys){


                            $decijurysse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM8', 'sessionid' => 'SE1', 'acadyearid' => $anacsem2

                            ));
                            if($decijurysse1){
                                $creditvalide2= $decijurysse1->getTcreditvalide();
                                $moyennesemestre2 = $decijurysse1->getSemaverage();
                                $decisionsem2= $decijurysse1->getDecision();

                            }else{ $creditvalide2=0;
                                $moyennesemestre2=0;
                                $decisionsem2="REFUSE";}

                        }else{
                            $creditvalide2= $decijurys->getTcreditvalide();
                            $moyennesemestre2 = $decijurys->getSemaverage();
                            $decisionsem2= $decijurys->getDecision();
                        }


                        $creditan = $creditvalide2 + $creditvalide;
                        $mgan = number_format((($moyennesemestre + $moyennesemestre2) / 2), 2);


                        if ($decisionsem2 == 'ADMIS' && $decisionsem == 'ADMIS') {


                            $decian = 'ADMIS';
                        } else {

                            $decian = 'REFUSE';
                        }
                    }else{



                        $em = $this->getDoctrine()->getManager();
                        $rsm = new ResultSetMapping();

                        $rsm->addScalarResult('acadyearid', 'acadyearid');



                        $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1  ";
                        $query = $em->createNativeQuery($sql, $rsm);




                        $query->setParameter('idetudiant', $idetudiant);

                        $anacetud = $query->getResult();
                        foreach ($anacetud as $ma){
                            $anacsem1=$ma['acadyearid'];
                        }






                        $decijury = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => 'TCSIGLSITW', 'semesterid' => 'SEM7', 'sessionid' => 'SE2', 'acadyearid' => $anacsem1));






                        if(!$decijury){


                            $decijuryse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => 'TCSIGLSITW', 'semesterid' => 'SEM7', 'sessionid' => 'SE1', 'acadyearid' => $anacsem1));

                            if($decijuryse1){
                                $creditvalide = $decijuryse1->getTcreditvalide();
                                $moyennesemestre = $decijuryse1->getSemaverage();
                                $decisionsem = $decijuryse1->getDecision();
                            }else{
                                $creditvalide=0;
                                $moyennesemestre=0;
                                $decisionsem="REFUSE";
                            }







                        }







                        else{  $creditvalide = $decijury->getTcreditvalide();
                            $moyennesemestre = $decijury->getSemaverage();
                            $decisionsem = $decijury->getDecision();}



                        $em = $this->getDoctrine()->getManager();
                        $rsm = new ResultSetMapping();

                        $rsm->addScalarResult('acadyearid', 'acadyearid');



                        $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1  ";
                        $query = $em->createNativeQuery($sql, $rsm);




                        $query->setParameter('idetudiant', $idetudiant);
                        $query->setParameter('idspecialite', $idspecialite);
                        $anacetudse = $query->getResult();
                        foreach ($anacetudse as $ma){
                            $anacsem2=$ma['acadyearid'];
                        }







                        $decijurys = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM8', 'sessionid' => 'SE2', 'acadyearid' => $anacsem2));


                        if(!$decijurys){


                            $decijurysse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM8', 'sessionid' => 'SE1', 'acadyearid' => $anacsem2

                            ));
                            if($decijurysse1){
                                $creditvalide2= $decijurysse1->getTcreditvalide();
                                $moyennesemestre2 = $decijurysse1->getSemaverage();
                                $decisionsem2= $decijurysse1->getDecision();

                            }else{ $creditvalide2=0;
                                $moyennesemestre2=0;
                                $decisionsem2="REFUSE";}

                        }else{
                            $creditvalide2= $decijurys->getTcreditvalide();
                            $moyennesemestre2 = $decijurys->getSemaverage();
                            $decisionsem2= $decijurys->getDecision();
                        }


                        $creditan = $creditvalide2 + $creditvalide;
                        $mgan = number_format((($moyennesemestre + $moyennesemestre2) / 2), 2);


                        if ($decisionsem2 == 'ADMIS' && $decisionsem == 'ADMIS') {


                            $decian = 'ADMIS';
                        } else {

                            $decian = 'REFUSE';
                        }



                    }





                }


                if($idlevel=='M2') {

                    $em = $this->getDoctrine()->getManager();
                    $rsm = new ResultSetMapping();

                    $rsm->addScalarResult('acadyearid', 'acadyearid');



                    $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1  ";
                    $query = $em->createNativeQuery($sql, $rsm);




                    $query->setParameter('idetudiant', $idetudiant);
                    $query->setParameter('idspecialite', $idspecialite);
                    $anacetud = $query->getResult();
                    foreach ($anacetud as $ma){
                        $anacsem1=$ma['acadyearid'];
                    }











                    $decijury = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM9', 'sessionid' => 'SE2', 'acadyearid' => $anacsem1));






                    if(!$decijury){


                        $decijuryse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM9', 'sessionid' => 'SE1', 'acadyearid' => $anacsem1));

                        if($decijuryse1){
                            $creditvalide = $decijuryse1->getTcreditvalide();
                            $moyennesemestre = $decijuryse1->getSemaverage();
                            $decisionsem = $decijuryse1->getDecision();
                        }else{
                            $creditvalide=0;
                            $moyennesemestre=0;
                            $decisionsem="REFUSE";
                        }







                    }else{  $creditvalide = $decijury->getTcreditvalide();
                        $moyennesemestre = $decijury->getSemaverage();
                        $decisionsem = $decijury->getDecision();}



                    $em = $this->getDoctrine()->getManager();
                    $rsm = new ResultSetMapping();

                    $rsm->addScalarResult('acadyearid', 'acadyearid');



                    $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1  ";
                    $query = $em->createNativeQuery($sql, $rsm);




                    $query->setParameter('idetudiant', $idetudiant);
                    $query->setParameter('idspecialite', $idspecialite);
                    $anacetudse = $query->getResult();
                    foreach ($anacetudse as $ma){
                        $anacsem2=$ma['acadyearid'];
                    }







                    $decijurys = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM10', 'sessionid' => 'SE2', 'acadyearid' => $anacsem2));


                    if(!$decijurys){


                        $decijurysse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM10', 'sessionid' => 'SE1', 'acadyearid' => $anacsem2

                        ));
                        if($decijurysse1){
                            $creditvalide2= $decijurysse1->getTcreditvalide();
                            $moyennesemestre2 = $decijurysse1->getSemaverage();
                            $decisionsem2= $decijurysse1->getDecision();

                        }else{ $creditvalide2=0;
                            $moyennesemestre2=0;
                            $decisionsem2="REFUSE";}

                    }else{
                        $creditvalide2= $decijurys->getTcreditvalide();
                        $moyennesemestre2 = $decijurys->getSemaverage();
                        $decisionsem2= $decijurys->getDecision();
                    }


                    $creditan = $creditvalide2 + $creditvalide;
                    $mgan = number_format((($moyennesemestre + $moyennesemestre2) / 2), 2);


                    if ($decisionsem2 == 'ADMIS' && $decisionsem == 'ADMIS') {


                        $decian = 'ADMIS';
                    } else {

                        $decian = 'REFUSE';
                    }


                }



                $output['data'][] = [
                    'idetudiant' => $idetudiant,
                    'nom' => $etudiant->getFirstname(),
                    'prenom' => $etudiant->getLastname(),
                    'genre' => $etudiant->getKind(),


                    'moyennesem' => $moyennesemestre,
                    'creditva' => $creditvalide,

                    'jury' => $decisionsem,
                    'moyennesem2' => $moyennesemestre2,
                    'creditva2' => $creditvalide2,

                    'jury2' => $decisionsem2,

                    'moyenneseman' => $mgan,
                    'creditvaan' => $creditan,

                    'juryan' => $decian



                ];






            }

            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);}


    }

    public function resultannuel()
    {


        return $this->render('delibsem/resultannuel.html.twig', array('current_menu'=>'resultannuel'));
    }



    public function tableresultannuel(Request $request, MyFunctionDelib $callfunctiondelib, StudentSpecialityRepository $stdspecrepo, StudentRepository $stdrepo, HalfYearlyDelibRepository $halfyearlydelib)
    {


        $idses=$this->get('session')->get('idsesdelib');

        $idspecialite=$this->get('session')->get('speciddelib');
        $idsem=$this->get('session')->get('semiddelib');


        $idanac=$this->get('session')->get('anacad');
        $idlevel = $this->get('session')->get('leveliddelib');


        $length = $request->get('length');
        $length = $length && ($length != -1) ? $length : 0;

        $start = $request->get('start');
        $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

        $delibsem = $request->get('delibsem');
        $filters = [
            'query' => @$delibsem['value']
        ];

        $users = $stdspecrepo->delibannuel($idanac, $idlevel, $idspecialite,
            $filters, $start, $length
        );

        $output = array(
            'data' => array(),
            'recordsFiltered' => count($stdspecrepo->delibannuel($idanac, $idlevel, $idspecialite,  $filters, 0, false)),
            'recordsTotal' => count($stdspecrepo->delibannuel($idanac, $idlevel, $idspecialite, 0, false))
        );

        foreach ($users as $user) {

            $idetudiant = $user['studentid'];



            $etudiant = $stdrepo->findOneById($idetudiant);




            if($idlevel=='L1') {

                $em = $this->getDoctrine()->getManager();
                $rsm = new ResultSetMapping();

                $rsm->addScalarResult('acadyearid', 'acadyearid');



                $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1  ";
                $query = $em->createNativeQuery($sql, $rsm);




                $query->setParameter('idetudiant', $idetudiant);
                $query->setParameter('idspecialite', $idspecialite);
                $anacetud = $query->getResult();
                foreach ($anacetud as $ma){
                    $anacsem1=$ma['acadyearid'];
                }











                $decijury = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM1', 'sessionid' => 'SE2', 'acadyearid' => $anacsem1));






                if(!$decijury){


                    $decijuryse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM1', 'sessionid' => 'SE1', 'acadyearid' => $anacsem1));

                    if($decijuryse1){
                        $creditvalide = $decijuryse1->getTcreditvalide();
                        $moyennesemestre = $decijuryse1->getSemaverage();
                        $decisionsem = $decijuryse1->getDecision();
                    }else{
                        $creditvalide=0;
                        $moyennesemestre=0;
                        $decisionsem="REFUSE";
                    }







                }else{  $creditvalide = $decijury->getTcreditvalide();
                    $moyennesemestre = $decijury->getSemaverage();
                    $decisionsem = $decijury->getDecision();}



                $em = $this->getDoctrine()->getManager();
                $rsm = new ResultSetMapping();

                $rsm->addScalarResult('acadyearid', 'acadyearid');



                $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1  ";
                $query = $em->createNativeQuery($sql, $rsm);




                $query->setParameter('idetudiant', $idetudiant);
                $query->setParameter('idspecialite', $idspecialite);
                $anacetudse = $query->getResult();
                foreach ($anacetudse as $ma){
                    $anacsem2=$ma['acadyearid'];
                }







                $decijurys = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM2', 'sessionid' => 'SE2', 'acadyearid' => $anacsem2));


                if(!$decijurys){


                    $decijurysse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM2', 'sessionid' => 'SE1', 'acadyearid' => $anacsem2

                    ));
                    if($decijurysse1){
                        $creditvalide2= $decijurysse1->getTcreditvalide();
                        $moyennesemestre2 = $decijurysse1->getSemaverage();
                        $decisionsem2= $decijurysse1->getDecision();

                    }else{ $creditvalide2=0;
                        $moyennesemestre2=0;
                        $decisionsem2="REFUSE";}

                }else{
                    $creditvalide2= $decijurys->getTcreditvalide();
                    $moyennesemestre2 = $decijurys->getSemaverage();
                    $decisionsem2= $decijurys->getDecision();
                }


                $creditan = $creditvalide2 + $creditvalide;
                $mgan = number_format((($moyennesemestre + $moyennesemestre2) / 2), 2);


                if ($decisionsem2 == 'ADMIS' && $decisionsem == 'ADMIS') {


                    $decian = 'ADMIS';
                } else {

                    $decian = 'REFUSE';
                }


            }

            if($idlevel=='L3') {

                $em = $this->getDoctrine()->getManager();
                $rsm = new ResultSetMapping();

                $rsm->addScalarResult('acadyearid', 'acadyearid');



                $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1  ";
                $query = $em->createNativeQuery($sql, $rsm);




                $query->setParameter('idetudiant', $idetudiant);
                $query->setParameter('idspecialite', $idspecialite);
                $anacetud = $query->getResult();
                foreach ($anacetud as $ma){
                    $anacsem1=$ma['acadyearid'];
                }











                $decijury = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM5', 'sessionid' => 'SE2', 'acadyearid' => $anacsem1));






                if(!$decijury){


                    $decijuryse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM5', 'sessionid' => 'SE1', 'acadyearid' => $anacsem1));

                    if($decijuryse1){
                        $creditvalide = $decijuryse1->getTcreditvalide();
                        $moyennesemestre = $decijuryse1->getSemaverage();
                        $decisionsem = $decijuryse1->getDecision();
                    }else{
                        $creditvalide=0;
                        $moyennesemestre=0;
                        $decisionsem="REFUSE";
                    }







                }else{  $creditvalide = $decijury->getTcreditvalide();
                    $moyennesemestre = $decijury->getSemaverage();
                    $decisionsem = $decijury->getDecision();}



                $em = $this->getDoctrine()->getManager();
                $rsm = new ResultSetMapping();

                $rsm->addScalarResult('acadyearid', 'acadyearid');



                $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1  ";
                $query = $em->createNativeQuery($sql, $rsm);




                $query->setParameter('idetudiant', $idetudiant);
                $query->setParameter('idspecialite', $idspecialite);
                $anacetudse = $query->getResult();
                foreach ($anacetudse as $ma){
                    $anacsem2=$ma['acadyearid'];
                }







                $decijurys = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM6', 'sessionid' => 'SE2', 'acadyearid' => $anacsem2));


                if(!$decijurys){


                    $decijurysse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM6', 'sessionid' => 'SE1', 'acadyearid' => $anacsem2

                    ));
                    if($decijurysse1){
                        $creditvalide2= $decijurysse1->getTcreditvalide();
                        $moyennesemestre2 = $decijurysse1->getSemaverage();
                        $decisionsem2= $decijurysse1->getDecision();

                    }else{ $creditvalide2=0;
                        $moyennesemestre2=0;
                        $decisionsem2="REFUSE";}

                }else{
                    $creditvalide2= $decijurys->getTcreditvalide();
                    $moyennesemestre2 = $decijurys->getSemaverage();
                    $decisionsem2= $decijurys->getDecision();
                }


                $creditan = $creditvalide2 + $creditvalide;
                $mgan = number_format((($moyennesemestre + $moyennesemestre2) / 2), 2);


                if ($decisionsem2 == 'ADMIS' && $decisionsem == 'ADMIS') {


                    $decian = 'ADMIS';
                } else {

                    $decian = 'REFUSE';
                }


            }


            if($idlevel=='L2') {

                $em = $this->getDoctrine()->getManager();
                $rsm = new ResultSetMapping();

                $rsm->addScalarResult('acadyearid', 'acadyearid');

                $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1  ";
                $query = $em->createNativeQuery($sql, $rsm);

                $query->setParameter('idetudiant', $idetudiant);
                $query->setParameter('idspecialite', $idspecialite);
                $anacetud = $query->getResult();
                foreach ($anacetud as $ma){
                    $anacsem1=$ma['acadyearid'];
                }










                $decijury = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM3', 'sessionid' => 'SE2', 'acadyearid' => $anacsem1));






                if(!$decijury){


                    $decijuryse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM3', 'sessionid' => 'SE1', 'acadyearid' => $anacsem1));

                    if($decijuryse1){
                        $creditvalide = $decijuryse1->getTcreditvalide();
                        $moyennesemestre = $decijuryse1->getSemaverage();
                        $decisionsem = $decijuryse1->getDecision();
                    }else{
                        $creditvalide=0;
                        $moyennesemestre=0;
                        $decisionsem="REFUSE";
                    }







                }else{  $creditvalide = $decijury->getTcreditvalide();
                    $moyennesemestre = $decijury->getSemaverage();
                    $decisionsem = $decijury->getDecision();}



                $em = $this->getDoctrine()->getManager();
                $rsm = new ResultSetMapping();

                $rsm->addScalarResult('acadyearid', 'acadyearid');



                $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1  ";
                $query = $em->createNativeQuery($sql, $rsm);




                $query->setParameter('idetudiant', $idetudiant);
                $query->setParameter('idspecialite', $idspecialite);
                $anacetudse = $query->getResult();
                foreach ($anacetudse as $ma){
                    $anacsem2=$ma['acadyearid'];
                }







                $decijurys = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM4', 'sessionid' => 'SE2', 'acadyearid' => $anacsem2));


                if(!$decijurys){


                    $decijurysse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM4', 'sessionid' => 'SE1', 'acadyearid' => $anacsem2

                    ));
                    if($decijurysse1){
                        $creditvalide2= $decijurysse1->getTcreditvalide();
                        $moyennesemestre2 = $decijurysse1->getSemaverage();
                        $decisionsem2= $decijurysse1->getDecision();

                    }else{ $creditvalide2=0;
                        $moyennesemestre2=0;
                        $decisionsem2="REFUSE";}

                }else{
                    $creditvalide2= $decijurys->getTcreditvalide();
                    $moyennesemestre2 = $decijurys->getSemaverage();
                    $decisionsem2= $decijurys->getDecision();
                }


                $creditan = $creditvalide2 + $creditvalide;
                $mgan = number_format((($moyennesemestre + $moyennesemestre2) / 2), 2);


                if ($decisionsem2 == 'ADMIS' && $decisionsem == 'ADMIS') {


                    $decian = 'ADMIS';
                } else {

                    $decian = 'REFUSE';
                }


            }

            if($idlevel=='M1') {






                if($idspecialite=='RTEL' || $idspecialite=='MBDS' || $idspecialite=='MDSI' )
                {


                    $em = $this->getDoctrine()->getManager();
                    $rsm = new ResultSetMapping();

                    $rsm->addScalarResult('acadyearid', 'acadyearid');



                    $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1  ";
                    $query = $em->createNativeQuery($sql, $rsm);




                    $query->setParameter('idetudiant', $idetudiant);
                    $query->setParameter('idspecialite', $idspecialite);
                    $anacetud = $query->getResult();
                    foreach ($anacetud as $ma){
                        $anacsem1=$ma['acadyearid'];
                    }









                    $decijury = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM7', 'sessionid' => 'SE2', 'acadyearid' => $anacsem1));






                    if(!$decijury){


                        $decijuryse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM7', 'sessionid' => 'SE1', 'acadyearid' => $anacsem1));

                        if($decijuryse1){
                            $creditvalide = $decijuryse1->getTcreditvalide();
                            $moyennesemestre = $decijuryse1->getSemaverage();
                            $decisionsem = $decijuryse1->getDecision();
                        }else{
                            $creditvalide=0;
                            $moyennesemestre=0;
                            $decisionsem="REFUSE";
                        }







                    }







                    else{  $creditvalide = $decijury->getTcreditvalide();
                        $moyennesemestre = $decijury->getSemaverage();
                        $decisionsem = $decijury->getDecision();}



                    $em = $this->getDoctrine()->getManager();
                    $rsm = new ResultSetMapping();

                    $rsm->addScalarResult('acadyearid', 'acadyearid');



                    $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1  ";
                    $query = $em->createNativeQuery($sql, $rsm);




                    $query->setParameter('idetudiant', $idetudiant);
                    $query->setParameter('idspecialite', $idspecialite);
                    $anacetudse = $query->getResult();
                    foreach ($anacetudse as $ma){
                        $anacsem2=$ma['acadyearid'];
                    }







                    $decijurys = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM8', 'sessionid' => 'SE2', 'acadyearid' => $anacsem2));


                    if(!$decijurys){


                        $decijurysse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM8', 'sessionid' => 'SE1', 'acadyearid' => $anacsem2

                        ));
                        if($decijurysse1){
                            $creditvalide2= $decijurysse1->getTcreditvalide();
                            $moyennesemestre2 = $decijurysse1->getSemaverage();
                            $decisionsem2= $decijurysse1->getDecision();

                        }else{ $creditvalide2=0;
                            $moyennesemestre2=0;
                            $decisionsem2="REFUSE";}

                    }else{
                        $creditvalide2= $decijurys->getTcreditvalide();
                        $moyennesemestre2 = $decijurys->getSemaverage();
                        $decisionsem2= $decijurys->getDecision();
                    }


                    $creditan = $creditvalide2 + $creditvalide;
                    $mgan = number_format((($moyennesemestre + $moyennesemestre2) / 2), 2);


                    if ($decisionsem2 == 'ADMIS' && $decisionsem == 'ADMIS') {


                        $decian = 'ADMIS';
                    } else {

                        $decian = 'REFUSE';
                    }
                }else{



                    $em = $this->getDoctrine()->getManager();
                    $rsm = new ResultSetMapping();

                    $rsm->addScalarResult('acadyearid', 'acadyearid');



                    $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1  ";
                    $query = $em->createNativeQuery($sql, $rsm);




                    $query->setParameter('idetudiant', $idetudiant);

                    $anacetud = $query->getResult();
                    foreach ($anacetud as $ma){
                        $anacsem1=$ma['acadyearid'];
                    }






                    $decijury = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => 'TCSIGLSITW', 'semesterid' => 'SEM7', 'sessionid' => 'SE2', 'acadyearid' => $anacsem1));






                    if(!$decijury){


                        $decijuryse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => 'TCSIGLSITW', 'semesterid' => 'SEM7', 'sessionid' => 'SE1', 'acadyearid' => $anacsem1));

                        if($decijuryse1){
                            $creditvalide = $decijuryse1->getTcreditvalide();
                            $moyennesemestre = $decijuryse1->getSemaverage();
                            $decisionsem = $decijuryse1->getDecision();
                        }else{
                            $creditvalide=0;
                            $moyennesemestre=0;
                            $decisionsem="REFUSE";
                        }







                    }







                    else{  $creditvalide = $decijury->getTcreditvalide();
                        $moyennesemestre = $decijury->getSemaverage();
                        $decisionsem = $decijury->getDecision();}



                    $em = $this->getDoctrine()->getManager();
                    $rsm = new ResultSetMapping();

                    $rsm->addScalarResult('acadyearid', 'acadyearid');



                    $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1  ";
                    $query = $em->createNativeQuery($sql, $rsm);




                    $query->setParameter('idetudiant', $idetudiant);
                    $query->setParameter('idspecialite', $idspecialite);
                    $anacetudse = $query->getResult();
                    foreach ($anacetudse as $ma){
                        $anacsem2=$ma['acadyearid'];
                    }







                    $decijurys = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM8', 'sessionid' => 'SE2', 'acadyearid' => $anacsem2));


                    if(!$decijurys){


                        $decijurysse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM8', 'sessionid' => 'SE1', 'acadyearid' => $anacsem2

                        ));
                        if($decijurysse1){
                            $creditvalide2= $decijurysse1->getTcreditvalide();
                            $moyennesemestre2 = $decijurysse1->getSemaverage();
                            $decisionsem2= $decijurysse1->getDecision();

                        }else{ $creditvalide2=0;
                            $moyennesemestre2=0;
                            $decisionsem2="REFUSE";}

                    }else{
                        $creditvalide2= $decijurys->getTcreditvalide();
                        $moyennesemestre2 = $decijurys->getSemaverage();
                        $decisionsem2= $decijurys->getDecision();
                    }


                    $creditan = $creditvalide2 + $creditvalide;
                    $mgan = number_format((($moyennesemestre + $moyennesemestre2) / 2), 2);


                    if ($decisionsem2 == 'ADMIS' && $decisionsem == 'ADMIS') {


                        $decian = 'ADMIS';
                    } else {

                        $decian = 'REFUSE';
                    }



                }





            }


            if($idlevel=='M2') {

                $em = $this->getDoctrine()->getManager();
                $rsm = new ResultSetMapping();

                $rsm->addScalarResult('acadyearid', 'acadyearid');



                $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1  ";
                $query = $em->createNativeQuery($sql, $rsm);




                $query->setParameter('idetudiant', $idetudiant);
                $query->setParameter('idspecialite', $idspecialite);
                $anacetud = $query->getResult();
                foreach ($anacetud as $ma){
                    $anacsem1=$ma['acadyearid'];
                }











                $decijury = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM9', 'sessionid' => 'SE2', 'acadyearid' => $anacsem1));






                if(!$decijury){


                    $decijuryse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM9', 'sessionid' => 'SE1', 'acadyearid' => $anacsem1));

                    if($decijuryse1){
                        $creditvalide = $decijuryse1->getTcreditvalide();
                        $moyennesemestre = $decijuryse1->getSemaverage();
                        $decisionsem = $decijuryse1->getDecision();
                    }else{
                        $creditvalide=0;
                        $moyennesemestre=0;
                        $decisionsem="REFUSE";
                    }







                }else{  $creditvalide = $decijury->getTcreditvalide();
                    $moyennesemestre = $decijury->getSemaverage();
                    $decisionsem = $decijury->getDecision();}



                $em = $this->getDoctrine()->getManager();
                $rsm = new ResultSetMapping();

                $rsm->addScalarResult('acadyearid', 'acadyearid');



                $sql = "SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1  ";
                $query = $em->createNativeQuery($sql, $rsm);




                $query->setParameter('idetudiant', $idetudiant);
                $query->setParameter('idspecialite', $idspecialite);
                $anacetudse = $query->getResult();
                foreach ($anacetudse as $ma){
                    $anacsem2=$ma['acadyearid'];
                }







                $decijurys = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM10', 'sessionid' => 'SE2', 'acadyearid' => $anacsem2));


                if(!$decijurys){


                    $decijurysse1 = $halfyearlydelib->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $idspecialite, 'semesterid' => 'SEM10', 'sessionid' => 'SE1', 'acadyearid' => $anacsem2

                    ));
                    if($decijurysse1){
                        $creditvalide2= $decijurysse1->getTcreditvalide();
                        $moyennesemestre2 = $decijurysse1->getSemaverage();
                        $decisionsem2= $decijurysse1->getDecision();

                    }else{ $creditvalide2=0;
                        $moyennesemestre2=0;
                        $decisionsem2="REFUSE";}

                }else{
                    $creditvalide2= $decijurys->getTcreditvalide();
                    $moyennesemestre2 = $decijurys->getSemaverage();
                    $decisionsem2= $decijurys->getDecision();
                }


                $creditan = $creditvalide2 + $creditvalide;
                $mgan = number_format((($moyennesemestre + $moyennesemestre2) / 2), 2);


                if ($decisionsem2 == 'ADMIS' && $decisionsem == 'ADMIS') {


                    $decian = 'ADMIS';
                } else {

                    $decian = 'REFUSE';
                }


            }



            $output['data'][] = [
                'idetudiant' => $idetudiant,
                'nom' => $etudiant->getFirstname(),
                'prenom' => $etudiant->getLastname(),
                'genre' => $etudiant->getKind(),


                'moyennesem' => $moyennesemestre,
                'creditva' => $creditvalide,

                'jury' => $decisionsem,
                'moyennesem2' => $moyennesemestre2,
                'creditva2' => $creditvalide2,

                'jury2' => $decisionsem2,

                'moyenneseman' => $mgan,
                'creditvaan' => $creditan,

                'juryan' => $decian



            ];






        }

        return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);



    }


    public function startdelibmaster()
    {

        return $this->render('delibsem/startdelibmaster.html.twig',array('current_menu'=>'startdelibmaster'));


    }


    public function viewaveragesemmaster(Request $request)
    {


        $request->getSession()->set('ecuconsultdelibaver',$request->query->get('idecu'));



        $request->getSession()->set('libecuconsultdelibaver', $request->query->get('libecu'));


        $request->getSession()->set('ueconsultdelibaver', $request->query->get('idue'));


        $request->getSession()->set('libueconsultdelibaver', $request->query->get('libue'));

        return  $this->render('delibsem/viewaveragesemmaster.html.twig');
    }




    public function listviewaveragesemmaster(Request $request, MyFunctionDelib $callfunction, StudentSpecialityRepository $studspecrepo, StudentRepository $studrepo, UeValidatedRepository $uevalidrepo, StudentExamNotesRepository $studexamrepo)
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



                        $averagcc=$callfunction->averagecc($idstudent,$idspecialite,$uevalide->getSemesterid(), $this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$uevalide->getAcadyearid());
                        $notexam=$callfunction->examnotes($idstudent,$idspecialite,$uevalide->getSemesterid(),$uevalide->getSessionid(),$this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$uevalide->getAcadyearid());


                        $averagcctp=$callfunction->averagecctp($idstudent,$idspecialite,$uevalide->getSemesterid(), $this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$uevalide->getAcadyearid());
                        $notexamtp=$callfunction->examnotestp($idstudent,$idspecialite,$uevalide->getSemesterid(),$uevalide->getSessionid(),$this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$uevalide->getAcadyearid());







                        if ($averagcc == "") {
                            $aversem = "";
                        }else{
                            $aversem = number_format((4 * $averagcc + 6 * $notexam) / 10, 2);
                        }





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



                        $averagcc=$callfunction->averagecc($idstudent,$idspecialite,$uevalide->getSemesterid(), $this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$uevalide->getAcadyearid());




                        $etudiant101 = $studexamrepo->findOneBy(array(
                            'studentid' => $idstudent, 'specialityid' => $idspecialite, 'ecuid' => $this->get('session')->get('ecuconsultdelibaver'), 'semesterid' => $uevalide->getSemesterid(), 'sessionid' => $uevalide->getSessionid(), 'typeofexamnotes' => 'EXCC', 'acadyearid' => $uevalide->getAcadyearid()
                        ));
                        if ($etudiant101 != NULL) {

                            if ($etudiant101->getExamnotes() == 99) {

                                $notexam = "NC";


                            } else {

                                $notexam = $etudiant101->getExamnotes();

                            }

                        } else {
                            $notexam = "";
                        }





                        if ($uevalide->getAcadyearid() == '2015-2016') {
                            $averagcc = number_format((float)$notexam, 2);
                            $aversem = number_format((float)$notexam, 2);

                        } else {
                            $aversem = number_format((4 * $averagcc + 6 * $notexam) / 10, 2);
                        }



                        $averagcctp=$callfunction->averagecctp($idstudent,$idspecialite,$uevalide->getSemesterid(), $this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$uevalide->getAcadyearid());



                        $etudiant103 =$studexamrepo->findOneBy(array('studentid' => $idstudent, 'specialityid' => $idspecialite, 'ecuid' => $this->get('session')->get('ecuconsultdelibaver'), 'semesterid' => $uevalide->getSemesterid(), 'sessionid' => $uevalide->getSessionid(), 'typeofexamnotes' => 'EXTP', 'acadyearid' => $uevalide->getAcadyearid()));
                        if($etudiant103!=NULL){

                            if($etudiant103->getExamnotes()==99){

                                $notexamtp="NC";


                            }else{

                                $notexamtp=$etudiant103->getExamnotes();

                            }

                        }else{
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






                    $averagcc=$callfunction->averagecc($idstudent,$idspecialite,$idsem, $this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$idanac);
                    $notexam=$callfunction->examnotes($idstudent,$idspecialite,$idsem,$idses,$this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$this->get('session')->get('anacad'));

                    if($averagcc==""){
                        $aversem = "";
                    }else{
                        $aversem = number_format((4 * $averagcc + 6 * $notexam) / 10, 2);
                    }




                    $averagcctp=$callfunction->averagecctp($idstudent,$idspecialite,$idsem, $this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$idanac);
                    $notexamtp=$callfunction->examnotestp($idstudent,$idspecialite,$idsem,$idses,$this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$this->get('session')->get('anacad'));




                    if($averagcctp==""){
                        $aversemtp = "";
                    }else{
                        $aversemtp = number_format((4 * $averagcctp + 6 * $notexamtp) / 10, 2);
                    }





                    if ($aversemtp == "") {
                        $averageecu = $aversem;
                    } else {
                        $averageecu = number_format((0.6 * $aversem + 0.4 * $aversemtp), 2);
                    }





                    $creditvalideue = $callfunction->creditsvalidemaster($idstudent, $idsem, $this->get('session')->get('ueconsultdelibaver'), $idanac, $idspecialite, $idses);














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





        else{


            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $searchconsulnotexclass = $request->get('searchconsulnotexclass');
            $filters = [
                'query' => @$searchconsulnotexclass['value']
            ];

            $users = $studspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses,
                $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($studspecrepo->studspecse2($idanac,$idanac, $idsem, $idspecialite, $idses, $filters, 0, false)),
                'recordsTotal' => count($studspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses, 0, false))
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



                                                   $averagcc=$callfunction->averagecc($idstudent,$idspecialite,$uevalide->getSemesterid(), $this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$uevalide->getAcadyearid());
                                                   $notexam=$callfunction->examnotes($idstudent,$idspecialite,$uevalide->getSemesterid(),$uevalide->getSessionid(),$this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$uevalide->getAcadyearid());


                                                   $averagcctp=$callfunction->averagecctp($idstudent,$idspecialite,$uevalide->getSemesterid(), $this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$uevalide->getAcadyearid());
                                                   $notexamtp=$callfunction->examnotestp($idstudent,$idspecialite,$uevalide->getSemesterid(),$uevalide->getSessionid(),$this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$uevalide->getAcadyearid());







                                                   if ($averagcc == "") {
                                                       $aversem = "";
                                                   }else{
                                                       $aversem = number_format((4 * $averagcc + 6 * $notexam) / 10, 2);
                                                   }





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



                                                   $averagcc=$callfunction->averagecc($idstudent,$idspecialite,$uevalide->getSemesterid(), $this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$uevalide->getAcadyearid());




                                                   $etudiant101 = $studexamrepo->findOneBy(array(
                                                       'studentid' => $idstudent, 'specialityid' => $idspecialite, 'ecuid' => $this->get('session')->get('ecuconsultdelibaver'), 'semesterid' => $uevalide->getSemesterid(), 'sessionid' => $uevalide->getSessionid(), 'typeofexamnotes' => 'EXCC', 'acadyearid' => $uevalide->getAcadyearid()
                                                   ));
                                                   if ($etudiant101 != NULL) {

                                                       if ($etudiant101->getExamnotes() == 99) {

                                                           $notexam = "NC";


                                                       } else {

                                                           $notexam = $etudiant101->getExamnotes();

                                                       }

                                                   } else {
                                                       $notexam = "";
                                                   }





                                                   if ($uevalide->getAcadyearid() == '2015-2016') {
                                                       $averagcc = number_format((float)$notexam, 2);
                                                       $aversem = number_format((float)$notexam, 2);

                                                   } else {
                                                       $aversem = number_format((4 * $averagcc + 6 * $notexam) / 10, 2);
                                                   }



                                                   $averagcctp=$callfunction->averagecctp($idstudent,$idspecialite,$uevalide->getSemesterid(), $this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$uevalide->getAcadyearid());



                                                   $etudiant103 =$studexamrepo->findOneBy(array('studentid' => $idstudent, 'specialityid' => $idspecialite, 'ecuid' => $this->get('session')->get('ecuconsultdelibaver'), 'semesterid' => $uevalide->getSemesterid(), 'sessionid' => $uevalide->getSessionid(), 'typeofexamnotes' => 'EXTP', 'acadyearid' => $uevalide->getAcadyearid()));
                                                   if($etudiant103!=NULL){

                                                       if($etudiant103->getExamnotes()==99){

                                                           $notexamtp="NC";


                                                       }else{

                                                           $notexamtp=$etudiant103->getExamnotes();

                                                       }

                                                   }else{
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






                                               $averagcc=$callfunction->averagecc($idstudent,$idspecialite,$idsem, $this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$idanac);
                                               $notexam=$callfunction->examnotes($idstudent,$idspecialite,$idsem,$idses,$this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$this->get('session')->get('anacad'));





                                               if($averagcc==""){
                                                   $aversem = "";
                                               }else{
                                                   $aversem = number_format((4 * $averagcc + 6 * $notexam) / 10, 2);
                                               }




                                               $averagcctp=$callfunction->averagecctp($idstudent,$idspecialite,$idsem, $this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$idanac);
                                               $notexamtp=$callfunction->examnotestp($idstudent,$idspecialite,$idsem,$idses,$this->get('session')->get('ueconsultdelibaver'),$this->get('session')->get('ecuconsultdelibaver'),$this->get('session')->get('anacad'));




                                               if($averagcctp==""){
                                                   $aversemtp = "";
                                               }else{
                                                   $aversemtp = number_format((4 * $averagcctp + 6 * $notexamtp) / 10, 2);
                                               }





                                               if ($aversemtp == "") {
                                                   $averageecu = $aversem;
                                               } else {
                                                   $averageecu = number_format((0.6 * $aversem + 0.4 * $aversemtp), 2);
                                               }





                                               $creditvalideue = $callfunction->creditsvalidemaster($idstudent, $idsem, $this->get('session')->get('ueconsultdelibaver'), $idanac, $idspecialite, $idses);














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




    public function deliberationsemestremaster(Request $request, MyFunctionDelib $callfunction, StudentSpecialityRepository $studspecrepo,UeSpecialityRepository $uespecrepo, UeValidatedRepository $uevalidrepo)
    {


        $idses=$this->get('session')->get('idsesdelib');

        $idspecialite=$this->get('session')->get('speciddelib');
        $idsem=$this->get('session')->get('semiddelib');


        $idanac=$this->get('session')->get('anacad');




        if($idses=='SE1'){
            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $delibsem = $request->get('delibsem');
            $filters = [
                'query' => @$delibsem['value']
            ];

            $users = $studspecrepo->studspec($idanac, $idsem, $idspecialite, $idses,
                $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($studspecrepo->studspec($idanac, $idsem, $idspecialite, $idses, $filters, 0, false)),
                'recordsTotal' => count($studspecrepo->studspec($idanac, $idsem, $idspecialite, $idses, 0, false))
            );

            foreach ($users as $user) {

                $idetudiant = $user['studentid'];
                $specid= $idspecialite;
                $semid = $idsem;
                $sessionid= $idses;
                $acadid = $idanac;
                $userdelib = $this->getUser()->getUsername();





                $pue=$uespecrepo->findBy(array('specialityid' => $specid,'semester' => $semid,'acadyearid'=>$acadid));
                foreach ($pue as $puev) {



                    $uevalids = $uevalidrepo->findOneBy(array('acadyearid' => $idetudiant, 'specialityid' => $specid, 'semesterid' =>$semid, 'ueid' => $puev->getUeid()->getId()));



                    if(!$uevalids){



                        if($callfunction->creditsvalidemaster($idetudiant,$semid,$puev->getUeid()->getId(),$acadid,$specid,$sessionid)==$callfunction->creditue($idspecialite,$puev->getUeid()->getId(),$semid,$acadid)){

                            $deliberationue = new UeValidated();

                            $deliberationue->setStudentid($idetudiant);

                            $deliberationue->setAcadyearid($acadid);
                            $deliberationue->setSpecialityid($specid);
                            $deliberationue->setUeid($puev->getUeid()->getId());
                            $deliberationue->setSemesterid($semid);
                            $deliberationue->setSessionid($sessionid);
                            $deliberationue->setCreditvalided($callfunction->creditsvalidemaster($idetudiant,$semid,$puev->getUeid(),$acadid,$specid,$sessionid));
                            $deliberationue->setUeaverage($callfunction->ueaverage($idetudiant, $specid,$puev->getUeid(), $semid, $sessionid, $acadid));

                            $deliberationue->setDelibDate(new \Datetime());
                            $deliberationue->setDelibUser($userdelib);


                            $em = $this->getDoctrine()->getManager();

                            $em->persist($deliberationue);
                            $em->flush();

                        }







                    }










                }













                $creditvalide = $callfunction->tcreditmaster($idetudiant, $specid, $semid, $sessionid, $acadid);
                $moyennesemestre = $callfunction->ecusemaverage($idetudiant, $specid, $semid, $sessionid, $acadid);
                $decisionsem = $callfunction->decisionmaster($idetudiant, $specid, $semid, $sessionid, $acadid);

                $deliberation = new HalfYearlyDelib();

                $deliberation->setStudentid($idetudiant);

                $deliberation->setAcadyearid($acadid);
                $deliberation->setSpecialityid($specid);
                $deliberation->setSemesterid($semid);
                $deliberation->setSessionid($sessionid);
                $deliberation->setTcreditvalide($creditvalide);
                $deliberation->setSemaverage($moyennesemestre);
                $deliberation->setDecision($decisionsem);
                $deliberation->setDelibDate(new \Datetime());
                $deliberation->setDelibUser($userdelib);


                $em = $this->getDoctrine()->getManager();

                $em->persist($deliberation);
                $em->flush();

            }

            return $this->redirectToRoute('siges_startdelib2');
        }else{
            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $delibsem = $request->get('delibsem');
            $filters = [
                'query' => @$delibsem['value']
            ];

            $users = $studspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses,
                $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($studspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses, $filters, 0, false)),
                'recordsTotal' => count($studspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses, 0, false))
            );

            foreach ($users as $user) {

                $idetudiant = $user['studentid'];
                $specid= $idspecialite;
                $semid = $idsem;
                $sessionid= $idses;
                $acadid = $idanac;
                $userdelib = $this->getUser()->getUsername();





                $pue=$uespecrepo->findBy(array('specialityid' => $specid,'semester' => $semid,'acadyearid'=>$acadid));
                foreach ($pue as $puev) {



                    $uevalids = $uevalidrepo->findOneBy(array('acadyearid' => $idetudiant, 'specialityid' => $specid, 'semesterid' =>$semid, 'ueid' => $puev->getUeid()->getId()));



                    if(!$uevalids){



                        if($callfunction->creditsvalidemaster($idetudiant,$semid,$puev->getUeid()->getId(),$acadid,$specid,$sessionid)==$callfunction->creditue($idspecialite,$puev->getUeid()->getId(),$semid,$acadid)){

                            $deliberationue = new UeValidated();

                            $deliberationue->setStudentid($idetudiant);

                            $deliberationue->setAcadyearid($acadid);
                            $deliberationue->setSpecialityid($specid);
                            $deliberationue->setUeid($puev->getUeid()->getId());
                            $deliberationue->setSemesterid($semid);
                            $deliberationue->setSessionid($sessionid);
                            $deliberationue->setCreditvalided($callfunction->creditsvalidemaster($idetudiant,$semid,$puev->getUeid(),$acadid,$specid,$sessionid));
                            $deliberationue->setUeaverage($callfunction->ueaverage($idetudiant, $specid,$puev->getUeid(), $semid, $sessionid, $acadid));

                            $deliberationue->setDelibDate(new \Datetime());
                            $deliberationue->setDelibUser($userdelib);


                            $em = $this->getDoctrine()->getManager();

                            $em->persist($deliberationue);
                            $em->flush();

                        }







                    }










                }













                $creditvalide = $callfunction->tcreditmaster($idetudiant, $specid, $semid, $sessionid, $acadid);
                $moyennesemestre = $callfunction->ecusemaverage($idetudiant, $specid, $semid, $sessionid, $acadid);
                $decisionsem = $callfunction->decisionmaster($idetudiant, $specid, $semid, $sessionid, $acadid);

                $deliberation = new HalfYearlyDelib();

                $deliberation->setStudentid($idetudiant);

                $deliberation->setAcadyearid($acadid);
                $deliberation->setSpecialityid($specid);
                $deliberation->setSemesterid($semid);
                $deliberation->setSessionid($sessionid);
                $deliberation->setTcreditvalide($creditvalide);
                $deliberation->setSemaverage($moyennesemestre);
                $deliberation->setDecision($decisionsem);
                $deliberation->setDelibDate(new \Datetime());
                $deliberation->setDelibUser($userdelib);


                $em = $this->getDoctrine()->getManager();

                $em->persist($deliberation);
                $em->flush();

            }

            return $this->redirectToRoute('siges_startdelib2');
        }








    }

    public function tabledelibm1infosem7()
    {




        return  $this->render('delibsem/tabledelibm1infosem7.html.twig');
    }


    public function listtabledelibm1infosem7(Request $request, MyFunctionDelib $callfunction, StudentSpecialityRepository $studentspecrepo, StudentRepository $studentrepo)
    {

        $idses=$this->get('session')->get('idsesdelib');

        $idspecialite=$this->get('session')->get('speciddelib');
        $idsem=$this->get('session')->get('semiddelib');


        $idanac=$this->get('session')->get('anacad');



        if($idses=='SE1') {

            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $delibsem = $request->get('delibsem');
            $filters = [
                'query' => @$delibsem['value']
            ];

            $users = $studentspecrepo->studspec($idanac, $idsem, $idspecialite, $idses,
                $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($studentspecrepo->studspec($idanac, $idsem, $idspecialite, $idses, $filters, 0, false)),
                'recordsTotal' => count($studentspecrepo->studspec($idanac, $idsem, $idspecialite, $idses, 0, false))
            );

            foreach ($users as $user) {
                $idetudiant = $user['studentid'];



                $etudiant = $studentrepo->findOneById($idetudiant);



                $m1=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1ANG2200', $idsem, $idses, $idanac);




                $m2=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1COM2200', $idsem, $idses, $idanac);




                $m3=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2COM2200', $idsem, $idses, $idanac);




                $m4=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1DRT2101', $idsem, $idses, $idanac);


                $m5=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1INF2103', $idsem, $idses, $idanac);






                $m6=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1INF2100', $idsem, $idses, $idanac);



                $m7=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2INF2100', $idsem, $idses, $idanac);





                $m8=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU3INF2100', $idsem, $idses, $idanac);






                $m9=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1INF2101', $idsem, $idses, $idanac);

                $m10=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2INF2101', $idsem, $idses, $idanac);


                $m11=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1MTH2100', $idsem, $idses, $idanac);
                $m12=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2MTH2100', $idsem, $idses, $idanac);
                $m13=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1ROP2100', $idsem, $idses, $idanac);
                $m14=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2ROP2100', $idsem, $idses, $idanac);
                $m15=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU3ROP2100', $idsem, $idses, $idanac);


                $output['data'][] = [
                    'idetudiant' => $etudiant->getId(),




                    'ue1' =>(float)$m1,
                    'ue2' =>(float)$m2,
                    'ue3' =>(float)$m3,
                    'ue4' =>(float)$m4,
                    'ue5' =>(float)$m5,

                    'moyennesemminor' =>(float)$callfunction->ueminorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),

                    'ue6' =>(float)$m6,
                    'ue7' =>(float)$m7,
                    'ue8' =>(float)$m8,
                    'ue9' =>(float)$m9,
                    'ue10' =>(float)$m10,
                    'ue11' =>(float)$m11,
                    'ue12' =>(float)$m12,

                    'ue13' =>(float)$m13,
                    'ue14' =>(float)$m14,
                    'ue15' =>(float)$m15,

                    'moyennesemmajor' =>(float)$callfunction->uemajorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),



                    'moyennesem' =>(float)$callfunction->moyennesemecusemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses),




                    'tcredit' =>(float)$callfunction->tcreditsemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses)












                ];
            }

            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);


        }




        else{
            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $delibsem = $request->get('delibsem');
            $filters = [
                'query' => @$delibsem['value']
            ];

            $users = $studentspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses,
                $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($studentspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses, $filters, 0, false)),
                'recordsTotal' => count($studentspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses, 0, false))
            );

            foreach ($users as $user) {
                $idetudiant = $user['studentid'];



                $etudiant = $studentrepo->findOneById($idetudiant);


                /*    if($this->moyennesemecu($idetudiant, $idspecialite, $idsem, $idses, $idanac)>=10){


                        $moysem=  '<span style="background-color: green;">'.$this->moyennesemecu($idetudiant, $idspecialite, $idsem, $idses, $idanac).'</span>';



                    }else{

                        $moysem=  '<span style="background-color: red;">'.$this->moyennesemecu($idetudiant, $idspecialite, $idsem, $idses, $idanac).'</span>';

                    } */



                $m1=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1ANG2200', $idsem, $idses, $idanac);




                $m2=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1COM2200', $idsem, $idses, $idanac);




                $m3=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2COM2200', $idsem, $idses, $idanac);




                $m4=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1DRT2101', $idsem, $idses, $idanac);


                $m5=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1INF2103', $idsem, $idses, $idanac);






                $m6=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1INF2100', $idsem, $idses, $idanac);



                $m7=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2INF2100', $idsem, $idses, $idanac);





                $m8=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU3INF2100', $idsem, $idses, $idanac);






                $m9=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1INF2101', $idsem, $idses, $idanac);

                $m10=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2INF2101', $idsem, $idses, $idanac);


                $m11=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1MTH2100', $idsem, $idses, $idanac);
                $m12=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2MTH2100', $idsem, $idses, $idanac);
                $m13=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1ROP2100', $idsem, $idses, $idanac);
                $m14=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2ROP2100', $idsem, $idses, $idanac);
                $m15=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU3ROP2100', $idsem, $idses, $idanac);


                $output['data'][] = [
                    'idetudiant' => $etudiant->getId(),




                    'ue1' =>(float)$m1,
                    'ue2' =>(float)$m2,
                    'ue3' =>(float)$m3,
                    'ue4' =>(float)$m4,
                    'ue5' =>(float)$m5,

                    'moyennesemminor' =>(float)$callfunction->ueminorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),

                    'ue6' =>(float)$m6,
                    'ue7' =>(float)$m7,
                    'ue8' =>(float)$m8,
                    'ue9' =>(float)$m9,
                    'ue10' =>(float)$m10,
                    'ue11' =>(float)$m11,
                    'ue12' =>(float)$m12,

                    'ue13' =>(float)$m13,
                    'ue14' =>(float)$m14,
                    'ue15' =>(float)$m15,

                    'moyennesemmajor' =>(float)$callfunction->uemajorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),



                    'moyennesem' =>(float)$callfunction->moyennesemecusemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses),




                    'tcredit' =>(float)$callfunction->tcreditsemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses)









                ];
            }

            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);


        }




    }







    public function deliberationsemestreuniqmaster(Request $request, MyFunctionDelib $callfunction, UeSpecialityRepository $uespecrepo, UeValidatedRepository $uevalidrepo, HalfYearlyDelibRepository $halfyearlyrepo)
    {
        $idetudiant = $request->query->get('idetudiant');
        $specid= $this->get('session')->get('speciddelib');
        $semid = $this->get('session')->get('semiddelib');
        $sessionid= $this->get('session')->get('idsesdelib');
        $acadid = $this->get('session')->get('anacad');
        $userdelib = $this->getUser()->getUsername();





        $pue=$uespecrepo->findBy(array('specialityid' => $specid,'semester' => $semid,'acadyearid'=>$acadid));
        foreach ($pue as $puev) {



            $uevalids = $uevalidrepo->findOneBy(array('studentid' => $idetudiant, 'specialityid' => $specid, 'semesterid' =>$semid, 'ueid' => $puev->getUeid()->getId()));



            if(!$uevalids){

                if($callfunction->creditsvalidemaster($idetudiant,$semid,$puev->getUeid()->getId(),$acadid,$specid,$sessionid)==$callfunction->creditue($specid,$puev->getUeid()->getId(),$semid,$acadid)){

                    $deliberationue = new UeValidated();

                    $deliberationue->setStudentid($idetudiant);

                    $deliberationue->setAcadyearid($acadid);
                    $deliberationue->setSpecialityid($specid);
                    $deliberationue->setUeid($puev->getUeid()->getId());
                    $deliberationue->setSemesterid($semid);
                    $deliberationue->setSessionid($sessionid);
                    $deliberationue->setCreditvalided($callfunction->creditsvalidemaster($idetudiant,$semid,$puev->getUeid(),$acadid,$specid,$sessionid));
                    $deliberationue->setUeaverage($callfunction->ueaverage($idetudiant, $specid,$puev->getUeid(), $semid, $sessionid, $acadid));

                    $deliberationue->setDelibDate(new \Datetime());
                    $deliberationue->setDelibUser($userdelib);


                    $em = $this->getDoctrine()->getManager();

                    $em->persist($deliberationue);
                    $em->flush();

                }
            }else{

                if($callfunction->ueaverage($idetudiant, $specid,$puev->getUeid(), $semid, $sessionid, $acadid)!= $uevalids->getUeaverage()){






                    $uevalids->setSemesterid($semid);
                    $uevalids->setSessionid($sessionid);

                    $uevalids->setUeaverage($callfunction->ueaverage($idetudiant, $specid,$puev->getUeid(), $semid, $sessionid, $acadid));

                    $uevalids->setDelibDate(new \Datetime());
                    $uevalids->setDelibUser($userdelib);


                    $em = $this->getDoctrine()->getManager();

                    $em->persist($uevalids);
                    $em->flush();

                }



            }
























            $deliberation = $halfyearlyrepo->findOneBy(array('studentid' => $idetudiant,'specialityid' =>$specid,'semesterid' => $semid,'acadyearid'=>$acadid,'sessionid'=>$sessionid));




            $creditvalide = $callfunction->tcreditmaster($idetudiant, $specid, $semid, $sessionid, $acadid);
            $moyennesemestre = $callfunction->ecusemaverage($idetudiant, $specid, $semid, $sessionid, $acadid);
            $decisionsem = $callfunction->decisionmaster($idetudiant, $specid, $semid, $sessionid, $acadid);



            $deliberation->setStudentid($idetudiant);

            $deliberation->setAcadyearid($acadid);
            $deliberation->setSpecialityid($specid);
            $deliberation->setSemesterid($semid);
            $deliberation->setSessionid($sessionid);
            $deliberation->setTcreditvalide($creditvalide);
            $deliberation->setSemaverage($moyennesemestre);
            $deliberation->setDecision($decisionsem);
            $deliberation->setDelibDate(new \Datetime());
            $deliberation->setDelibUser($userdelib);


            $em = $this->getDoctrine()->getManager();

            $em->persist($deliberation);
            $em->flush();

        }

        return $this->redirectToRoute('siges_startdelib2');
    }



    public function tabledelibmdsim1sem8()
    {




        return  $this->render('delibsem/tabledelibmdsim1sem8.html.twig');
    }




    public function listtabledelibmdsim1sem8(Request $request, MyFunctionDelib $callfunction, StudentSpecialityRepository $studentspecrepo, StudentRepository $studentrepo)
    {

        $idses=$this->get('session')->get('idsesdelib');

        $idspecialite=$this->get('session')->get('speciddelib');
        $idsem=$this->get('session')->get('semiddelib');


        $idanac=$this->get('session')->get('anacad');



        if($idses=='SE1') {

            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $delibsem = $request->get('delibsem');
            $filters = [
                'query' => @$delibsem['value']
            ];

            $users = $studentspecrepo->studspec($idanac, $idsem, $idspecialite, $idses,
                $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($studentspecrepo->studspec($idanac, $idsem, $idspecialite, $idses, $filters, 0, false)),
                'recordsTotal' => count($studentspecrepo->studspec($idanac, $idsem, $idspecialite, $idses, 0, false))
            );

            foreach ($users as $user) {
                $idetudiant = $user['studentid'];



                $etudiant = $studentrepo->findOneById($idetudiant);




                $m1=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1ANG2200', $idsem, $idses, $idanac);




                $m2=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1COM2200', $idsem, $idses, $idanac);




                $m3=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2COM2200', $idsem, $idses, $idanac);




                $m4=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1BUS2200', $idsem, $idses, $idanac);


                $m5=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2BUS2200', $idsem, $idses, $idanac);





                $m6=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU3BUS2200', $idsem, $idses, $idanac);





                $m7=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1DSS2200', $idsem, $idses, $idanac);






                $m8=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2DSS2200', $idsem, $idses, $idanac);

                $m9=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1ECO2201', $idsem, $idses, $idanac);

                $m10=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1GES2200', $idsem, $idses, $idanac);
                $m11=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2GES2200', $idsem, $idses, $idanac);
                $m12=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1TDS2200', $idsem, $idses, $idanac);


                $output['data'][] = [
                    'idetudiant' => $etudiant->getId(),





                    'moyennesem' =>(float)$callfunction->moyennesemecusemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses),
                    'ue1' =>(float)$m1,
                    'ue2' =>(float)$m2,
                    'ue3' =>(float)$m3,
                    'ue4' =>(float)$m4,
                    'ue5' =>(float)$m5,

                    'ue6' =>(float)$m6,
                    'ue7' =>(float)$m7,
                    'ue8' =>(float)$m8,
                    'ue9' =>(float)$m9,
                    'ue10' =>(float)$m10,
                    'ue11' =>(float)$m11,
                    'ue12' =>(float)$m12,


                    'tcredit' =>(float)$callfunction->tcreditsemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses)








                ];
            }

            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);


        }




        else{
            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $delibsem = $request->get('delibsem');
            $filters = [
                'query' => @$delibsem['value']
            ];

            $users = $studentspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses,
                $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($studentspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses, $filters, 0, false)),
                'recordsTotal' => count($studentspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses, 0, false))
            );

            foreach ($users as $user) {
                $idetudiant = $user['studentid'];



                $etudiant = $studentrepo->findOneById($idetudiant);


                /*    if($this->moyennesemecu($idetudiant, $idspecialite, $idsem, $idses, $idanac)>=10){


                        $moysem=  '<span style="background-color: green;">'.$this->moyennesemecu($idetudiant, $idspecialite, $idsem, $idses, $idanac).'</span>';



                    }else{

                        $moysem=  '<span style="background-color: red;">'.$this->moyennesemecu($idetudiant, $idspecialite, $idsem, $idses, $idanac).'</span>';

                    } */



                $m1=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1ANG2200', $idsem, $idses, $idanac);




                $m2=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1COM2200', $idsem, $idses, $idanac);




                $m3=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2COM2200', $idsem, $idses, $idanac);




                $m4=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1DRT2101', $idsem, $idses, $idanac);


                $m5=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1INF2103', $idsem, $idses, $idanac);






                $m6=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1INF2100', $idsem, $idses, $idanac);



                $m7=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2INF2100', $idsem, $idses, $idanac);





                $m8=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU3INF2100', $idsem, $idses, $idanac);






                $m9=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1INF2101', $idsem, $idses, $idanac);

                $m10=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2INF2101', $idsem, $idses, $idanac);


                $m11=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1MTH2100', $idsem, $idses, $idanac);
                $m12=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2MTH2100', $idsem, $idses, $idanac);
                $m13=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1ROP2100', $idsem, $idses, $idanac);
                $m14=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2ROP2100', $idsem, $idses, $idanac);
                $m15=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU3ROP2100', $idsem, $idses, $idanac);


                $output['data'][] = [
                    'idetudiant' => $etudiant->getId(),




                    'ue1' =>(float)$m1,
                    'ue2' =>(float)$m2,
                    'ue3' =>(float)$m3,
                    'ue4' =>(float)$m4,
                    'ue5' =>(float)$m5,

                    'moyennesemminor' =>(float)$callfunction->ueminorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),

                    'ue6' =>(float)$m6,
                    'ue7' =>(float)$m7,
                    'ue8' =>(float)$m8,
                    'ue9' =>(float)$m9,
                    'ue10' =>(float)$m10,
                    'ue11' =>(float)$m11,
                    'ue12' =>(float)$m12,

                    'ue13' =>(float)$m13,
                    'ue14' =>(float)$m14,
                    'ue15' =>(float)$m15,

                    'moyennesemmajor' =>(float)$callfunction->uemajorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),



                    'moyennesem' =>(float)$callfunction->moyennesemecusemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses),




                    'tcredit' =>(float)$callfunction->tcreditsemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses)









                ];
            }

            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);


        }




    }





    public function tabledelibm1mdsisem7()
    {




        return  $this->render('delibsem/tabledelibmdsim1sem7.html.twig');
    }








    public function listtabledelibm1mdsisem7(Request $request, MyFunctionDelib $callfunction, StudentSpecialityRepository $studentspecrepo, StudentRepository $studentrepo)
    {

        $idses=$this->get('session')->get('idsesdelib');

        $idspecialite=$this->get('session')->get('speciddelib');
        $idsem=$this->get('session')->get('semiddelib');


        $idanac=$this->get('session')->get('anacad');



        if($idses=='SE1') {

            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $delibsem = $request->get('delibsem');
            $filters = [
                'query' => @$delibsem['value']
            ];

            $users = $studentspecrepo->studspec($idanac, $idsem, $idspecialite, $idses,
                $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($studentspecrepo->studspec($idanac, $idsem, $idspecialite, $idses, $filters, 0, false)),
                'recordsTotal' => count($studentspecrepo->studspec($idanac, $idsem, $idspecialite, $idses, 0, false))
            );

            foreach ($users as $user) {
                $idetudiant = $user['studentid'];



                $etudiant = $studentrepo->findOneById($idetudiant);




                $m1=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1ANG2100', $idsem, $idses, $idanac);




                $m2=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1COM2100', $idsem, $idses, $idanac);




                $m3=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2COM2100', $idsem, $idses, $idanac);




                $m4=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1DRT2102', $idsem, $idses, $idanac);


                $m5=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1ARC2100', $idsem, $idses, $idanac);


                $m6=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1SSI2100', $idsem, $idses, $idanac);


                $m7=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1TEC2100', $idsem, $idses, $idanac);





                $m8=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2TEC2100', $idsem, $idses, $idanac);






                $m9=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1MSI2100', $idsem, $idses, $idanac);

                $m10=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1MAN2100', $idsem, $idses, $idanac);

                $m11=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2MAN2100', $idsem, $idses, $idanac);


                $output['data'][] = [
                    'idetudiant' => $etudiant->getId(),





                    'moyennesem' =>(float)$callfunction->moyennesemecusemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses),
                    'ue1' =>(float)$m1,
                    'ue2' =>(float)$m2,
                    'ue3' =>(float)$m3,
                    'ue4' =>(float)$m4,
                    'ue5' =>(float)$m5,

                    'ue6' =>(float)$m6,
                    'ue7' =>(float)$m7,
                    'ue8' =>(float)$m8,
                    'ue9' =>(float)$m9,
                    'ue10' =>(float)$m10,
                    'ue11' =>(float)$m11,


                    'tcredit' =>(float)$callfunction->tcreditsemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses)









                ];
            }

            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);



        }




        else{
            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $delibsem = $request->get('delibsem');
            $filters = [
                'query' => @$delibsem['value']
            ];

            $users = $studentspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses,
                $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($studentspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses, $filters, 0, false)),
                'recordsTotal' => count($studentspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses, 0, false))
            );

            foreach ($users as $user) {
                $idetudiant = $user['studentid'];



                $etudiant = $studentrepo->findOneById($idetudiant);


                $m1=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1ANG2100', $idsem, $idses, $idanac);




                $m2=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1COM2100', $idsem, $idses, $idanac);




                $m3=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2COM2100', $idsem, $idses, $idanac);




                $m4=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1DRT2102', $idsem, $idses, $idanac);


                $m5=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1ARC2100', $idsem, $idses, $idanac);


                $m6=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1SSI2100', $idsem, $idses, $idanac);


                $m7=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1TEC2100', $idsem, $idses, $idanac);





                $m8=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2TEC2100', $idsem, $idses, $idanac);






                $m9=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1MSI2100', $idsem, $idses, $idanac);

                $m10=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1MAN2100', $idsem, $idses, $idanac);

                $m11=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2MAN2100', $idsem, $idses, $idanac);


                $output['data'][] = [
                    'idetudiant' => $etudiant->getId(),





                    'moyennesem' =>(float)$callfunction->moyennesemecusemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses),
                    'ue1' =>(float)$m1,
                    'ue2' =>(float)$m2,
                    'ue3' =>(float)$m3,
                    'ue4' =>(float)$m4,
                    'ue5' =>(float)$m5,

                    'ue6' =>(float)$m6,
                    'ue7' =>(float)$m7,
                    'ue8' =>(float)$m8,
                    'ue9' =>(float)$m9,
                    'ue10' =>(float)$m10,
                    'ue11' =>(float)$m11,


                    'tcredit' =>(float)$callfunction->tcreditsemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses)









                ];
            }

            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);



        }




    }





    public function tabledelibsritl3sem5()
    {




        return  $this->render('delibsem/tabledelibsritl3sem5.html.twig');
    }




    public function listtabledelibsritl3sem5(Request $request, MyFunctionDelib $callfunctiondelib, StudentSpecialityRepository $studentspecrep, StudentRepository $stdrepo)
    {

        $idses=$this->get('session')->get('idsesdelib');

        $idspecialite=$this->get('session')->get('speciddelib');
        $idsem=$this->get('session')->get('semiddelib');


        $idanac=$this->get('session')->get('anacad');



        if($idses=='SE1') {

            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $delibsem = $request->get('delibsem');
            $filters = [
                'query' => @$delibsem['value']
            ];

            $users = $studentspecrep->studspec($idanac, $idsem, $idspecialite, $idses,
                $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($studentspecrep->studspec($idanac, $idsem, $idspecialite, $idses, $filters, 0, false)),
                'recordsTotal' => count($studentspecrep->studspec($idanac, $idsem, $idspecialite, $idses, 0, false))
            );

            foreach ($users as $user) {
                $idetudiant = $user['studentid'];



                $etudiant = $stdrepo->findOneById($idetudiant);





                $m1=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'PHY3401', $idsem, $idses, $idanac);




                $m2=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'COM3400', $idsem, $idses, $idanac);





                $m3=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'DRT3400', $idsem, $idses, $idanac);



                $m4=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'INF3400', $idsem, $idses, $idanac);


                $m5=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'INF3401', $idsem, $idses, $idanac);





                $m6=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'MTH3400', $idsem, $idses, $idanac);





                $m7=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'PHY3400', $idsem, $idses, $idanac);








                $output['data'][] = [
                    'idetudiant' => $etudiant->getId(),





                    'moyennesem' =>(float)$callfunctiondelib->moyennesemecusemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses),
                    'ue1' =>(float)$m1,


                    'moyennesemminor' =>(float)$callfunctiondelib->ueminorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),

                    'ue2' =>(float)$m2,
                    'ue3' =>(float)$m3,

                    'ue4' =>(float)$m4,
                    'ue5' =>(float)$m5,

                    'ue6' =>(float)$m6,
                    'ue7' =>(float)$m7,


                    'moyennesemmajor' =>(float)$callfunctiondelib->uemajorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),


                    'tcredit' =>$callfunctiondelib->tcreditsemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses)









                ];
            }

            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);


        }





    }






    public function tabledelibrtell3sem5()
    {




        return  $this->render('delibsem/tabledelibrtell3sem5.html.twig');
    }





    public function listtabledelibrtell3sem5(Request $request, MyFunctionDelib $callfunctiondelib, StudentSpecialityRepository $studentspecrep, StudentRepository $stdrepo)
    {

        $idses=$this->get('session')->get('idsesdelib');

        $idspecialite=$this->get('session')->get('speciddelib');
        $idsem=$this->get('session')->get('semiddelib');


        $idanac=$this->get('session')->get('anacad');



        if($idses=='SE1') {

            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $delibsem = $request->get('delibsem');
            $filters = [
                'query' => @$delibsem['value']
            ];

            $users = $studentspecrep->studspec($idanac, $idsem, $idspecialite, $idses,
                $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($studentspecrep->studspec($idanac, $idsem, $idspecialite, $idses, $filters, 0, false)),
                'recordsTotal' => count($studentspecrep->studspec($idanac, $idsem, $idspecialite, $idses, 0, false))
            );

            foreach ($users as $user) {
                $idetudiant = $user['studentid'];



                $etudiant = $stdrepo->findOneById($idetudiant);





                $m1=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'INF3405', $idsem, $idses, $idanac);




                $m2=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'PHY3404', $idsem, $idses, $idanac);





                $m3=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'RES3402', $idsem, $idses, $idanac);



                $m4=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'COM3400', $idsem, $idses, $idanac);


                $m5=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'DRT3400', $idsem, $idses, $idanac);





                $m6=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'PHY3402', $idsem, $idses, $idanac);





                $m7=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'RES3400', $idsem, $idses, $idanac);




                $m8=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'RES3401', $idsem, $idses, $idanac);







                $output['data'][] = [
                    'idetudiant' => $etudiant->getId(),





                    'moyennesem' =>(float)$callfunctiondelib->moyennesemecusemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses),
                    'ue1' =>(float)$m1,
                    'ue2' =>(float)$m2,
                    'ue3' =>(float)$m3,

                    'moyennesemminor' =>(float)$callfunctiondelib->ueminorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),



                    'ue4' =>(float)$m4,
                    'ue5' =>(float)$m5,

                    'ue6' =>(float)$m6,
                    'ue7' =>(float)$m7,
                    'ue8' =>(float)$m8,


                    'moyennesemmajor' =>(float)$callfunctiondelib->uemajorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),


                    'tcredit' =>$callfunctiondelib->tcreditsemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses)









                ];
            }

            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);


        }





    }






    public function tabledelibsigll3sem5()
    {




        return  $this->render('delibsem/tabledelibsigll3sem5.html.twig');
    }





    public function listtabledelibsigll3sem5(Request $request, MyFunctionDelib $callfunctiondelib, StudentSpecialityRepository $studentspecrep, StudentRepository $stdrepo)
    {

        $idses=$this->get('session')->get('idsesdelib');

        $idspecialite=$this->get('session')->get('speciddelib');
        $idsem=$this->get('session')->get('semiddelib');


        $idanac=$this->get('session')->get('anacad');



        if($idses=='SE1') {

            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $delibsem = $request->get('delibsem');
            $filters = [
                'query' => @$delibsem['value']
            ];

            $users = $studentspecrep->studspec($idanac, $idsem, $idspecialite, $idses,
                $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($studentspecrep->studspec($idanac, $idsem, $idspecialite, $idses, $filters, 0, false)),
                'recordsTotal' => count($studentspecrep->studspec($idanac, $idsem, $idspecialite, $idses, 0, false))
            );

            foreach ($users as $user) {
                $idetudiant = $user['studentid'];



                $etudiant = $stdrepo->findOneById($idetudiant);





                $m1=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'INF34055', $idsem, $idses, $idanac);




                $m2=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'INF3410', $idsem, $idses, $idanac);





                $m3=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'INF3451', $idsem, $idses, $idanac);



                $m4=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'COM3400', $idsem, $idses, $idanac);


                $m5=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'DRT3400', $idsem, $idses, $idanac);





                $m6=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'INF3406', $idsem, $idses, $idanac);





                $m7=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'INF3407', $idsem, $idses, $idanac);




                $m8=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'INF3408', $idsem, $idses, $idanac);







                $output['data'][] = [
                    'idetudiant' => $etudiant->getId(),





                    'moyennesem' =>(float)$callfunctiondelib->moyennesemecusemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses),
                    'ue1' =>(float)$m1,
                    'ue2' =>(float)$m2,
                    'ue3' =>(float)$m3,

                    'moyennesemminor' =>(float)$callfunctiondelib->ueminorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),



                    'ue4' =>(float)$m4,
                    'ue5' =>(float)$m5,

                    'ue6' =>(float)$m6,
                    'ue7' =>(float)$m7,
                    'ue8' =>(float)$m8,


                    'moyennesemmajor' =>(float)$callfunctiondelib->uemajorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),


                    'tcredit' =>$callfunctiondelib->tcreditsemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses)









                ];
            }

            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);


        }





    }







    public function tabledelibtwinl3sem5()
    {




        return  $this->render('delibsem/tabledelibtwinl3sem5.html.twig');
    }





    public function listtabledelibtwinl3sem5(Request $request, MyFunctionDelib $callfunctiondelib, StudentSpecialityRepository $studentspecrep, StudentRepository $stdrepo)
    {

        $idses=$this->get('session')->get('idsesdelib');

        $idspecialite=$this->get('session')->get('speciddelib');
        $idsem=$this->get('session')->get('semiddelib');


        $idanac=$this->get('session')->get('anacad');



        if($idses=='SE1') {

            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $delibsem = $request->get('delibsem');
            $filters = [
                'query' => @$delibsem['value']
            ];

            $users = $studentspecrep->studspec($idanac, $idsem, $idspecialite, $idses,
                $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($studentspecrep->studspec($idanac, $idsem, $idspecialite, $idses, $filters, 0, false)),
                'recordsTotal' => count($studentspecrep->studspec($idanac, $idsem, $idspecialite, $idses, 0, false))
            );

            foreach ($users as $user) {
                $idetudiant = $user['studentid'];



                $etudiant = $stdrepo->findOneById($idetudiant);





                $m1=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'ANG3460', $idsem, $idses, $idanac);




                $m2=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'COM3460', $idsem, $idses, $idanac);





                $m3=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'GES3460', $idsem, $idses, $idanac);



                $m4=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'INF3463', $idsem, $idses, $idanac);


                $m5=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'INF3464', $idsem, $idses, $idanac);





                $m6=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'INF3460', $idsem, $idses, $idanac);





                $m7=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'INF3461', $idsem, $idses, $idanac);




                $m8=$callfunctiondelib->ueaverage($idetudiant, $idspecialite,'INF3462', $idsem, $idses, $idanac);







                $output['data'][] = [
                    'idetudiant' => $etudiant->getId(),





                    'moyennesem' =>(float)$callfunctiondelib->moyennesemecusemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses),
                    'ue1' =>(float)$m1,
                    'ue2' =>(float)$m2,
                    'ue3' =>(float)$m3,

                    'ue4' =>(float)$m4,
                    'ue5' =>(float)$m5,

                    'moyennesemminor' =>(float)$callfunctiondelib->ueminorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),





                    'ue6' =>(float)$m6,
                    'ue7' =>(float)$m7,
                    'ue8' =>(float)$m8,


                    'moyennesemmajor' =>(float)$callfunctiondelib->uemajorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),


                    'tcredit' =>$callfunctiondelib->tcreditsemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses)









                ];
            }

            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);


        }





    }



    public function tabledelibm1rtelsem7()
    {




        return  $this->render('delibsem/tabledelibm1rtelsem7.html.twig');
    }


    public function listtabledelibm1rtelsem7(Request $request, MyFunctionDelib $callfunction, StudentSpecialityRepository $studentspecrepo, StudentRepository $studentrepo)
    {

        $idses=$this->get('session')->get('idsesdelib');

        $idspecialite=$this->get('session')->get('speciddelib');
        $idsem=$this->get('session')->get('semiddelib');


        $idanac=$this->get('session')->get('anacad');



        if($idses=='SE1') {

            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $delibsem = $request->get('delibsem');
            $filters = [
                'query' => @$delibsem['value']
            ];

            $users = $studentspecrepo->studspec($idanac, $idsem, $idspecialite, $idses,
                $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($studentspecrepo->studspec($idanac, $idsem, $idspecialite, $idses, $filters, 0, false)),
                'recordsTotal' => count($studentspecrepo->studspec($idanac, $idsem, $idspecialite, $idses, 0, false))
            );

            foreach ($users as $user) {
                $idetudiant = $user['studentid'];



                $etudiant = $studentrepo->findOneById($idetudiant);



                $m1=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1ANG2300', $idsem, $idses, $idanac);




                $m2=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1COM2300', $idsem, $idses, $idanac);




                $m3=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2COM2300', $idsem, $idses, $idanac);




                $m4=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1DRT2100', $idsem, $idses, $idanac);


                $m5=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1INF2102', $idsem, $idses, $idanac);







                $m6=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1INF2100', $idsem, $idses, $idanac);






                $m7=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2INF2100', $idsem, $idses, $idanac);



                $m8=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU3INF2100', $idsem, $idses, $idanac);





                $m9=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1INF2101', $idsem, $idses, $idanac);






                $m10=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2INF2101', $idsem, $idses, $idanac);


                $m11=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1MTH2100', $idsem, $idses, $idanac);
                $m12=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2MTH2100', $idsem, $idses, $idanac);
                $m13=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1ROP2100', $idsem, $idses, $idanac);
                $m14=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2ROP2100', $idsem, $idses, $idanac);
                $m15=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU3ROP2100', $idsem, $idses, $idanac);


                $output['data'][] = [
                    'idetudiant' => $etudiant->getId(),




                    'ue1' =>(float)$m1,
                    'ue2' =>(float)$m2,
                    'ue3' =>(float)$m3,
                    'ue4' =>(float)$m4,

                    'moyennesemminor' =>(float)$callfunction->ueminorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),

                    'ue5' =>(float)$m5,

                    'ue6' =>(float)$m6,
                    'ue7' =>(float)$m7,
                    'ue8' =>(float)$m8,
                    'ue9' =>(float)$m9,
                    'ue10' =>(float)$m10,
                    'ue11' =>(float)$m11,
                    'ue12' =>(float)$m12,

                    'ue13' =>(float)$m13,
                    'ue14' =>(float)$m14,
                    'ue15' =>(float)$m15,

                    'moyennesemmajor' =>(float)$callfunction->uemajorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),



                    'moyennesem' =>(float)$callfunction->moyennesemecusemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses),




                    'tcredit' =>(float)$callfunction->tcreditsemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses)












                ];
            }

            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);


        }




        else{
            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $delibsem = $request->get('delibsem');
            $filters = [
                'query' => @$delibsem['value']
            ];

            $users = $studentspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses,
                $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($studentspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses, $filters, 0, false)),
                'recordsTotal' => count($studentspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses, 0, false))
            );

            foreach ($users as $user) {
                $idetudiant = $user['studentid'];



                $etudiant = $studentrepo->findOneById($idetudiant);


                /*    if($this->moyennesemecu($idetudiant, $idspecialite, $idsem, $idses, $idanac)>=10){


                        $moysem=  '<span style="background-color: green;">'.$this->moyennesemecu($idetudiant, $idspecialite, $idsem, $idses, $idanac).'</span>';



                    }else{

                        $moysem=  '<span style="background-color: red;">'.$this->moyennesemecu($idetudiant, $idspecialite, $idsem, $idses, $idanac).'</span>';

                    } */



                $m1=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1ANG2200', $idsem, $idses, $idanac);




                $m2=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1COM2200', $idsem, $idses, $idanac);




                $m3=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2COM2200', $idsem, $idses, $idanac);




                $m4=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1DRT2101', $idsem, $idses, $idanac);


                $m5=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1INF2103', $idsem, $idses, $idanac);






                $m6=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1INF2100', $idsem, $idses, $idanac);



                $m7=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2INF2100', $idsem, $idses, $idanac);





                $m8=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU3INF2100', $idsem, $idses, $idanac);






                $m9=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1INF2101', $idsem, $idses, $idanac);

                $m10=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2INF2101', $idsem, $idses, $idanac);


                $m11=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1MTH2100', $idsem, $idses, $idanac);
                $m12=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2MTH2100', $idsem, $idses, $idanac);
                $m13=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1ROP2100', $idsem, $idses, $idanac);
                $m14=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2ROP2100', $idsem, $idses, $idanac);
                $m15=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU3ROP2100', $idsem, $idses, $idanac);


                $output['data'][] = [
                    'idetudiant' => $etudiant->getId(),




                    'ue1' =>(float)$m1,
                    'ue2' =>(float)$m2,
                    'ue3' =>(float)$m3,
                    'ue4' =>(float)$m4,
                    'ue5' =>(float)$m5,

                    'moyennesemminor' =>(float)$callfunction->ueminorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),

                    'ue6' =>(float)$m6,
                    'ue7' =>(float)$m7,
                    'ue8' =>(float)$m8,
                    'ue9' =>(float)$m9,
                    'ue10' =>(float)$m10,
                    'ue11' =>(float)$m11,
                    'ue12' =>(float)$m12,

                    'ue13' =>(float)$m13,
                    'ue14' =>(float)$m14,
                    'ue15' =>(float)$m15,

                    'moyennesemmajor' =>(float)$callfunction->uemajorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),



                    'moyennesem' =>(float)$callfunction->moyennesemecusemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses),




                    'tcredit' =>(float)$callfunction->tcreditsemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses)









                ];
            }

            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);


        }




    }




    public function tabledelibm2sitwsem9()
    {




        return  $this->render('delibsem/tabledelibm2sitwsem9.html.twig');
    }


    public function listtabledelibm2sitwsem9(Request $request, MyFunctionDelib $callfunction, StudentSpecialityRepository $studentspecrepo, StudentRepository $studentrepo)
    {

        $idses=$this->get('session')->get('idsesdelib');

        $idspecialite=$this->get('session')->get('speciddelib');
        $idsem=$this->get('session')->get('semiddelib');


        $idanac=$this->get('session')->get('anacad');



        if($idses=='SE1') {

            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $delibsem = $request->get('delibsem');
            $filters = [
                'query' => @$delibsem['value']
            ];

            $users = $studentspecrepo->studspec($idanac, $idsem, $idspecialite, $idses,
                $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($studentspecrepo->studspec($idanac, $idsem, $idspecialite, $idses, $filters, 0, false)),
                'recordsTotal' => count($studentspecrepo->studspec($idanac, $idsem, $idspecialite, $idses, 0, false))
            );

            foreach ($users as $user) {
                $idetudiant = $user['studentid'];



                $etudiant = $studentrepo->findOneById($idetudiant);



                $m1=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1ANG2300', $idsem, $idses, $idanac);




                $m2=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1COM2300', $idsem, $idses, $idanac);




                $m3=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2COM2300', $idsem, $idses, $idanac);




                $m4=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1OGE2300', $idsem, $idses, $idanac);


                $m5=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2OGE2300', $idsem, $idses, $idanac);







                $m6=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1PNS2300', $idsem, $idses, $idanac);






                $m7=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1DTW2300', $idsem, $idses, $idanac);



                $m8=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2DTW2300', $idsem, $idses, $idanac);





                $m9=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU3DTW2300', $idsem, $idses, $idanac);






                $m10=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1INF2302', $idsem, $idses, $idanac);


                $m11=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2INF2302', $idsem, $idses, $idanac);
                $m12=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1SEC2300', $idsem, $idses, $idanac);
                $m13=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2SEC2300', $idsem, $idses, $idanac);
                $m14=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1SEC2301', $idsem, $idses, $idanac);


                $output['data'][] = [
                    'idetudiant' => $etudiant->getId(),




                    'ue1' =>(float)$m1,
                    'ue2' =>(float)$m2,
                    'ue3' =>(float)$m3,
                    'ue4' =>(float)$m4,

                    'ue5' =>(float)$m5,

                    'ue6' =>(float)$m6,


                    'moyennesemminor' =>(float)$callfunction->ueminorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),

                    'ue7' =>(float)$m7,
                    'ue8' =>(float)$m8,
                    'ue9' =>(float)$m9,
                    'ue10' =>(float)$m10,
                    'ue11' =>(float)$m11,
                    'ue12' =>(float)$m12,

                    'ue13' =>(float)$m13,
                    'ue14' =>(float)$m14,


                    'moyennesemmajor' =>(float)$callfunction->uemajorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),



                    'moyennesem' =>(float)$callfunction->moyennesemecusemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses),




                    'tcredit' =>(float)$callfunction->tcreditsemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses)












                ];
            }

            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);


        }




        else{
            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $delibsem = $request->get('delibsem');
            $filters = [
                'query' => @$delibsem['value']
            ];

            $users = $studentspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses,
                $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($studentspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses, $filters, 0, false)),
                'recordsTotal' => count($studentspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses, 0, false))
            );

            foreach ($users as $user) {
                $idetudiant = $user['studentid'];



                $etudiant = $studentrepo->findOneById($idetudiant);


                /*    if($this->moyennesemecu($idetudiant, $idspecialite, $idsem, $idses, $idanac)>=10){


                        $moysem=  '<span style="background-color: green;">'.$this->moyennesemecu($idetudiant, $idspecialite, $idsem, $idses, $idanac).'</span>';



                    }else{

                        $moysem=  '<span style="background-color: red;">'.$this->moyennesemecu($idetudiant, $idspecialite, $idsem, $idses, $idanac).'</span>';

                    } */



                $m1=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1ANG2200', $idsem, $idses, $idanac);




                $m2=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1COM2200', $idsem, $idses, $idanac);




                $m3=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2COM2200', $idsem, $idses, $idanac);




                $m4=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1DRT2101', $idsem, $idses, $idanac);


                $m5=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1INF2103', $idsem, $idses, $idanac);






                $m6=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1INF2100', $idsem, $idses, $idanac);



                $m7=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2INF2100', $idsem, $idses, $idanac);





                $m8=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU3INF2100', $idsem, $idses, $idanac);






                $m9=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1INF2101', $idsem, $idses, $idanac);

                $m10=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2INF2101', $idsem, $idses, $idanac);


                $m11=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1MTH2100', $idsem, $idses, $idanac);
                $m12=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2MTH2100', $idsem, $idses, $idanac);
                $m13=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1ROP2100', $idsem, $idses, $idanac);
                $m14=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2ROP2100', $idsem, $idses, $idanac);
                $m15=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU3ROP2100', $idsem, $idses, $idanac);


                $output['data'][] = [
                    'idetudiant' => $etudiant->getId(),




                    'ue1' =>(float)$m1,
                    'ue2' =>(float)$m2,
                    'ue3' =>(float)$m3,
                    'ue4' =>(float)$m4,
                    'ue5' =>(float)$m5,

                    'moyennesemminor' =>(float)$callfunction->ueminorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),

                    'ue6' =>(float)$m6,
                    'ue7' =>(float)$m7,
                    'ue8' =>(float)$m8,
                    'ue9' =>(float)$m9,
                    'ue10' =>(float)$m10,
                    'ue11' =>(float)$m11,
                    'ue12' =>(float)$m12,

                    'ue13' =>(float)$m13,
                    'ue14' =>(float)$m14,
                    'ue15' =>(float)$m15,

                    'moyennesemmajor' =>(float)$callfunction->uemajorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),



                    'moyennesem' =>(float)$callfunction->moyennesemecusemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses),




                    'tcredit' =>(float)$callfunction->tcreditsemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses)









                ];
            }

            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);


        }




    }




    public function tabledelibm2siglsem9()
    {




        return  $this->render('delibsem/tabledelibm2siglsem9.html.twig');
    }


    public function listtabledelibm2siglsem9(Request $request, MyFunctionDelib $callfunction, StudentSpecialityRepository $studentspecrepo, StudentRepository $studentrepo)
    {

        $idses=$this->get('session')->get('idsesdelib');

        $idspecialite=$this->get('session')->get('speciddelib');
        $idsem=$this->get('session')->get('semiddelib');


        $idanac=$this->get('session')->get('anacad');



        if($idses=='SE1') {

            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $delibsem = $request->get('delibsem');
            $filters = [
                'query' => @$delibsem['value']
            ];

            $users = $studentspecrepo->studspec($idanac, $idsem, $idspecialite, $idses,
                $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($studentspecrepo->studspec($idanac, $idsem, $idspecialite, $idses, $filters, 0, false)),
                'recordsTotal' => count($studentspecrepo->studspec($idanac, $idsem, $idspecialite, $idses, 0, false))
            );

            foreach ($users as $user) {
                $idetudiant = $user['studentid'];



                $etudiant = $studentrepo->findOneById($idetudiant);



                $m1=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1ANG2300', $idsem, $idses, $idanac);




                $m2=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1COM2300', $idsem, $idses, $idanac);




                $m3=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2COM2300', $idsem, $idses, $idanac);




                $m4=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1OGE2300', $idsem, $idses, $idanac);


                $m5=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2OGE2300', $idsem, $idses, $idanac);







                $m6=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1INF2301', $idsem, $idses, $idanac);






                $m7=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1AGL2300', $idsem, $idses, $idanac);



                $m8=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2AGL2300', $idsem, $idses, $idanac);





                $m9=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1IHM2300', $idsem, $idses, $idanac);






                $m10=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2IHM2300', $idsem, $idses, $idanac);


                $m11=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1INF2300', $idsem, $idses, $idanac);
                $m12=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2INF2300', $idsem, $idses, $idanac);
                $m13=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1PRG2300', $idsem, $idses, $idanac);
                $m14=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2PRG2300', $idsem, $idses, $idanac);


                $output['data'][] = [
                    'idetudiant' => $etudiant->getId(),




                    'ue1' =>(float)$m1,
                    'ue2' =>(float)$m2,
                    'ue3' =>(float)$m3,
                    'ue4' =>(float)$m4,

                    'ue5' =>(float)$m5,

                    'ue6' =>(float)$m6,


                    'moyennesemminor' =>(float)$callfunction->ueminorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),

                    'ue7' =>(float)$m7,
                    'ue8' =>(float)$m8,
                    'ue9' =>(float)$m9,
                    'ue10' =>(float)$m10,
                    'ue11' =>(float)$m11,
                    'ue12' =>(float)$m12,

                    'ue13' =>(float)$m13,
                    'ue14' =>(float)$m14,


                    'moyennesemmajor' =>(float)$callfunction->uemajorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),



                    'moyennesem' =>(float)$callfunction->moyennesemecusemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses),




                    'tcredit' =>(float)$callfunction->tcreditsemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses)












                ];
            }

            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);


        }




        else{
            $length = $request->get('length');
            $length = $length && ($length != -1) ? $length : 0;

            $start = $request->get('start');
            $start = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;

            $delibsem = $request->get('delibsem');
            $filters = [
                'query' => @$delibsem['value']
            ];

            $users = $studentspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses,
                $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($studentspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses, $filters, 0, false)),
                'recordsTotal' => count($studentspecrepo->studspecse2($idanac, $idsem, $idspecialite, $idses, 0, false))
            );

            foreach ($users as $user) {
                $idetudiant = $user['studentid'];



                $etudiant = $studentrepo->findOneById($idetudiant);


                /*    if($this->moyennesemecu($idetudiant, $idspecialite, $idsem, $idses, $idanac)>=10){


                        $moysem=  '<span style="background-color: green;">'.$this->moyennesemecu($idetudiant, $idspecialite, $idsem, $idses, $idanac).'</span>';



                    }else{

                        $moysem=  '<span style="background-color: red;">'.$this->moyennesemecu($idetudiant, $idspecialite, $idsem, $idses, $idanac).'</span>';

                    } */



                $m1=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1ANG2200', $idsem, $idses, $idanac);




                $m2=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1COM2200', $idsem, $idses, $idanac);




                $m3=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2COM2200', $idsem, $idses, $idanac);




                $m4=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1DRT2101', $idsem, $idses, $idanac);


                $m5=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1INF2103', $idsem, $idses, $idanac);






                $m6=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1INF2100', $idsem, $idses, $idanac);



                $m7=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2INF2100', $idsem, $idses, $idanac);





                $m8=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU3INF2100', $idsem, $idses, $idanac);






                $m9=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1INF2101', $idsem, $idses, $idanac);

                $m10=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2INF2101', $idsem, $idses, $idanac);


                $m11=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1MTH2100', $idsem, $idses, $idanac);
                $m12=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2MTH2100', $idsem, $idses, $idanac);
                $m13=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU1ROP2100', $idsem, $idses, $idanac);
                $m14=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU2ROP2100', $idsem, $idses, $idanac);
                $m15=$callfunction->ecuaverage($idetudiant, $idspecialite,'ECU3ROP2100', $idsem, $idses, $idanac);


                $output['data'][] = [
                    'idetudiant' => $etudiant->getId(),




                    'ue1' =>(float)$m1,
                    'ue2' =>(float)$m2,
                    'ue3' =>(float)$m3,
                    'ue4' =>(float)$m4,
                    'ue5' =>(float)$m5,

                    'moyennesemminor' =>(float)$callfunction->ueminorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),

                    'ue6' =>(float)$m6,
                    'ue7' =>(float)$m7,
                    'ue8' =>(float)$m8,
                    'ue9' =>(float)$m9,
                    'ue10' =>(float)$m10,
                    'ue11' =>(float)$m11,
                    'ue12' =>(float)$m12,

                    'ue13' =>(float)$m13,
                    'ue14' =>(float)$m14,
                    'ue15' =>(float)$m15,

                    'moyennesemmajor' =>(float)$callfunction->uemajorsemaverage($idetudiant, $idspecialite,  $idsem, $idses, $idanac),



                    'moyennesem' =>(float)$callfunction->moyennesemecusemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses),




                    'tcredit' =>(float)$callfunction->tcreditsemestrielle($idetudiant,$idsem,$idanac,$idspecialite,$idses)









                ];
            }

            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);


        }




    }



    public function tabledelibm2siglsem9adm()
    {




        return  $this->render('delibsem/tabledelibm2siglsem9adm.html.twig');
    }



}
