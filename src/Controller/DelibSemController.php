<?php

namespace App\Controller;

use App\Entity\AcademicYear;
use App\Entity\HalfYearlyDelib;
use App\Entity\StudentAverages;
use App\Entity\StudentExamNotes;
use App\Entity\UeSpeciality;
use App\Entity\UeValidated;
use App\Form\AcademicYearType;
use App\Repository\EcuRepository;
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







}
