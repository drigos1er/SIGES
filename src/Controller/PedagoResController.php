<?php

namespace App\Controller;
use App\Entity\SchoolClass;
use App\Repository\LevelRepository;
use App\Repository\SchoolClassRepository;
use App\Repository\EcuRepository;
use App\Repository\EcuSpecialityRepository;
use App\Repository\SemesterRepository;
use App\Repository\SigesUserRepository;
use App\Repository\SpecialityRepository;
use App\Repository\StudentSpecialityRepository;
use App\Repository\TeachSpecialityRepository;
use App\Repository\UeRepository;
use App\Service\MyFunction;
use Doctrine\ORM\Query\ResultSetMapping;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PedagoResController extends AbstractController
{
    /**
     * Choice  PEDAGORES Action
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function dashboardpedagores()
    {
        return $this->render('pedagores/dashboardpedagores.html.twig', [
            'controller_name' => 'PedagoresController',
        ]);
    }

    /**
     * Dashboard Average Teacher
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function averagedashpedagores()
    {

        return $this->render('pedagores/averagedashpedagores.html.twig', [
            'current_menu' => 'averagedashpedagores',
        ]);
    }




    public function redirectspecsemnex(Request $request)
    {


        $request->getSession()->set('idsesentrynex', $request->query->get('idses'));
        $request->getSession()->set('semtypeentrynex', $request->query->get('semtype'));

        return $this->redirectToRoute('siges_specsemnex');
    }









    public function specsemnex()
    {
        return  $this->render('pedagores/specsemnex.html.twig',array('current_menu'=>'specsemnex'));
    }








    public function listspecsemnex(Request $request, StudentSpecialityRepository $studentspecrepo)
    {
        $idanac=$this->get('session')->get('anacad');
        $semtype=$this->get('session')->get('semtypeentrynex');
        $idses=$this->get('session')->get('idsesentrynex');

        $length = $request->get('length');
        $length = $length && ($length!=-1)?$length:0;

        $start = $request->get('start');
        $start = $length?($start && ($start!=-1)?$start:0)/$length:0;

        $search = $request->get('search');
        $filters = [
            'query' => @$search['value']
        ];

        $users = $studentspecrepo->levelspec($idanac, $filters, $start, $length
        );

        $output = array(
            'data' => array(),
            'recordsFiltered' => count($studentspecrepo->levelspec($idanac, $filters, 0, false)),
            'recordsTotal' => count($studentspecrepo->levelspec($idanac, 0, false))
        );

        foreach ($users as $levelspec) {

            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();
            $rsm->addScalarResult('id', 'id');

            $sql = "SELECT id FROM `semester`  WHERE  level_id=:levelid and semtype=:semtype  ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('levelid', $levelspec['levelid']);
            $query->setParameter('semtype', $semtype);



            $seme= $query->getResult();


            foreach ($seme as $sm) {
                $semster= $sm['id'];

            }





            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();
            $rsm->addScalarResult('nbecuspec', 'nbecuspec');

            $sql = "SELECT count( DISTINCT `ecuid`,ueid,specialityid,semesterid,sessionid) as nbecuspec FROM `student_examnotes` where acadyearid=:acadyearid    and sessionid=:idses and semesterid=:idsem and specialityid=:specid ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('acadyearid', $idanac);
            $query->setParameter('semtype', $semtype);
            $query->setParameter('idses', $idses);
            $query->setParameter('specid', $levelspec['specialityid']);
            $query->setParameter('idsem', $semster);



            $nbecus= $query->getResult();


            foreach ($nbecus as $nb) {
                $nbecusemspec= $nb['nbecuspec'];

            }











            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();
            $rsm->addScalarResult('ecuid', 'ecuid');
            $rsm->addScalarResult('specialityid', 'specialityid');
            $rsm->addScalarResult('ueid', 'ueid');
            $rsm->addScalarResult('semesterid', 'semesterid');
            $rsm->addScalarResult('sessionid', 'sessionid');

            $sql = "SELECT  DISTINCT ecuid,specialityid,ueid,semesterid,sessionid FROM `student_examnotes` where acadyearid=:acadyearid  AND sessionid=:idses  and semesterid=:idsem and specialityid=:specid  ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('acadyearid', $idanac);
            $query->setParameter('semtype', $semtype);
            $query->setParameter('idses', $idses);
            $query->setParameter('idsem', $semster);
            $query->setParameter('specid', $levelspec['specialityid']);






            $cptecu= $query->getResult();

            $nbecusaiexspec=0;
            foreach ($cptecu as $ns) {



                $em = $this->getDoctrine()->getManager();


                $rsm = new ResultSetMapping();
                $rsm->addScalarResult('nbstudent', 'nbstudent');

                $sql = "SELECT count(  DISTINCT `studentid`) as nbstudent FROM `student_examnotes`  WHERE  acadyearid=:acadyearid and specialityid=:specid  and sessionid=:idses and semesterid=:idsem and  ecuid=:ecuid and ueid=:ueid and student_examnotes.typeof_examnotes='EXCC'   ";
                $query = $em->createNativeQuery($sql, $rsm);
                $query->setParameter('acadyearid', $idanac);
                $query->setParameter('specid', $ns['specialityid']);
                $query->setParameter('idsem', $ns['semesterid']);
                $query->setParameter('idses', $ns['sessionid']);
                $query->setParameter('ueid', $ns['ueid']);
                $query->setParameter('ecuid', $ns['ecuid']);


                $nbstdcc = $query->getResult();

                foreach ($nbstdcc as $nst) {
                    $nbstudcc= $nst['nbstudent'];

                }





                $em = $this->getDoctrine()->getManager();
                $rsm = new ResultSetMapping();

                $rsm->addScalarResult('nbexamnotes', 'nbexamnotes');
                $sql = "  SELECT   count(exam_notes) as nbexamnotes FROM  student_examnotes   WHERE   acadyearid=:idanac and  exam_notes BETWEEN 0 AND 20 and semesterid=:idsem and sessionid=:idses and ecuid=:ecuid and ueid=:ueid   and specialityid=:specid  and student_examnotes.typeof_examnotes='EXCC'   ";
                $query = $em->createNativeQuery($sql, $rsm);
                $query->setParameter('idanac', $idanac);
                $query->setParameter('idsem', $ns['semesterid']);
                $query->setParameter('idses', $ns['sessionid']);
                $query->setParameter('ueid', $ns['ueid']);
                $query->setParameter('ecuid', $ns['ecuid']);
                $query->setParameter('specid', $ns['specialityid']);



                $idecuspec = $query->getResult();


                foreach ($idecuspec as $ner){
                    $examnotenbspec=$ner['nbexamnotes'];
                }






                if($nbstudcc==$examnotenbspec){

                    $nbecusaiexspec=$nbecusaiexspec+1;
                }







            }



            $nbcptecusaiexspec=$nbecusaiexspec;







            if ($nbcptecusaiexspec >= 1 and  $nbcptecusaiexspec < $nbecusemspec) {
                $pathurl=  $this->generateUrl('siges_redirectecusemnex', array('levelid'=>$levelspec['levelid'],'specid'=>$levelspec['specialityid'],'idsem'=>$semster,'idses'=>$idses))  ;


                $incorpo = '<a href="'.$pathurl.'" class="btn btn-warning btn-xs">' . $nbcptecusaiexspec . '/' . $nbecusemspec . '&nbsp;&nbsp;<i class="fa fa-search"></i> </a>';

            } elseif ($nbcptecusaiexspec==$nbecusemspec){

                $pathurl=  $this->generateUrl('siges_redirectecusemnex', array('levelid'=>$levelspec['levelid'],'specid'=>$levelspec['specialityid'],'idsem'=>$semster,'idses'=>$idses))  ;

                $incorpo = '<a href="'.$pathurl.'" class="btn btn-success btn-xs">' . $nbcptecusaiexspec . '/' . $nbecusemspec . '&nbsp;&nbsp;<i class="fa fa-search"></i> </a>';
            }




            else {
                $pathurl=  $this->generateUrl('siges_redirectecusemnex', array('levelid'=>$levelspec['levelid'],'specid'=>$levelspec['specialityid'],'idsem'=>$semster,'idses'=>$idses))  ;

                $incorpo = '<a href="'.$pathurl.'" class="btn btn-danger btn-xs">' . $nbcptecusaiexspec . '/' . $nbecusemspec . '&nbsp;&nbsp;<i class="fa fa-search"></i> </a>';
            }




            if($levelspec['specialityid']=='TCSIGLSITW'){

                $libspec='INFORMATIQUE';
            }else{
                $libspec=$levelspec['specialityid'];
            }





            $output['data'][] = [
                'levelid' =>$levelspec['levelid'],
                'specid' => $libspec,
                'idsem' => $semster,
                'nbecu' => $incorpo,




            ];
        }

        return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);
    }




    public function redirectecusemnex(Request $request)
    {



        $request->getSession()->set('levelidecusemnex', $request->query->get('levelid'));
        $request->getSession()->set('specidecusemnex', $request->query->get('specid'));
        $request->getSession()->set('semidecusemnex', $request->query->get('idsem'));
        $request->getSession()->set('sesidecusemnex', $request->query->get('idses'));


        return $this->redirectToRoute('siges_ecusemnex');
    }

    public function ecusemnex()
    {
        return  $this->render('pedagores/ecusemnex.html.twig',array('current_menu'=>'ecusemnex'));
    }




    public function listecusemnex(Request $request, EcuSpecialityRepository $ecuspecrepo, UeRepository $uerepo, EcuRepository $ecurepo)
    {
        $idspecs=$this->get('session')->get('specidecusemnex');
        $idsems=$this->get('session')->get('semidecusemnex');
        $idanacs=$this->get('session')->get('anacad');
        $idsess=$this->get('session')->get('sesidecusemnex');

        $length = $request->get('length');
        $length = $length && ($length!=-1)?$length:0;

        $start = $request->get('start');
        $start = $length?($start && ($start!=-1)?$start:0)/$length:0;

        $search = $request->get('search');
        $filters = [
            'query' => @$search['value']
        ];

        $users = $ecuspecrepo->spececu($idspecs,$idsems,$idanacs,
            $filters, $start, $length
        );

        $output = array(
            'data' => array(),
            'recordsFiltered' => count($ecuspecrepo->spececu($idspecs,$idsems,$idanacs,$filters, 0, false)),
            'recordsTotal' => count($ecuspecrepo->spececu($idspecs,$idsems,$idanacs ,0, false))
        );

        foreach ($users as $ecuspec) {



            $ue = $uerepo->findOneById($ecuspec->getUeid());



            $ecu = $ecurepo->findOneById($ecuspec->getEcuid());




            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();
            $rsm->addScalarResult('nbstudent', 'nbstudent');

            $sql = "SELECT count(  DISTINCT `studentid`) as nbstudent FROM `student_examnotes`  WHERE  acadyearid=:acadyearid and specialityid=:specid  and sessionid=:idses and semesterid=:idsem and  ecuid=:ecuid and ueid=:ueid and student_examnotes.typeof_examnotes='EXCC'   ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('acadyearid', $idanacs);
            $query->setParameter('specid', $idspecs);
            $query->setParameter('idsem', $idsems);
            $query->setParameter('idses', $idsess);
            $query->setParameter('ueid', $ecuspec->getUeid());
            $query->setParameter('ecuid', $ecuspec->getEcuid());


            $nbstdcc = $query->getResult();

            foreach ($nbstdcc as $nst) {
                $nbstudcc= $nst['nbstudent'];

            }











            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();
            $rsm->addScalarResult('nbnotexam', 'nbnotexam');

            $sql = "SELECT count(  DISTINCT `studentid`) as nbnotexam FROM `student_examnotes`  WHERE  acadyearid=:idanac and specialityid=:idspec and semesterid=:idsem and  sessionid=:idses and  ueid=:idue and ecuid=:idecu and typeof_examnotes='EXCC'  and exam_notes BETWEEN 0 and 20 ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('idanac', $idanacs );
            $query->setParameter('idspec', $idspecs);
            $query->setParameter('idsem', $idsems );
            $query->setParameter('idses', $idsess );


            $query->setParameter('idue', $ecuspec->getUeid());
            $query->setParameter('idecu', $ecuspec->getEcuid());


            $cptnotexam= $query->getResult();


            foreach ($cptnotexam as $n) {


                $nbcptnotexam= $n['nbnotexam'];

            }



            if ($nbcptnotexam >= 1 and $nbcptnotexam < $nbstudcc)  {


                $pathurl=  $this->generateUrl('siges_redirectentrynotexam', array('idue'=>$ue->getId(),'idecu'=>$ecu->getId(),'libue'=>$ue->getUename(),'libecu'=>$ecu->getEcuname(),'typeaver'=>'EXCC'))  ;



                $incorpo = '<a href="'.$pathurl.'" class="btn btn-warning btn-xs">' . $nbcptnotexam . '/' . $nbstudcc . '&nbsp;&nbsp;<i class="fa fa-edit"></i> </a>';




            } elseif ($nbcptnotexam == $nbstudcc)
            {


                $pathurl=  $this->generateUrl('siges_redirectentrynotexam', array('idue'=>$ue->getId(),'idecu'=>$ecu->getId(),'libue'=>$ue->getUename(),'libecu'=>$ecu->getEcuname(),'typeaver'=>'EXCC'))  ;



                $incorpo = '<a href="'.$pathurl.'" class="btn btn-success btn-xs">' . $nbcptnotexam . '/' . $nbstudcc . '&nbsp;&nbsp;<i class="fa fa-edit"></i> </a>';





            }


            else{


                $pathurl=  $this->generateUrl('siges_redirectentrynotexam', array('idue'=>$ue->getId(),'idecu'=>$ecu->getId(),'libue'=>$ue->getUename(),'libecu'=>$ecu->getEcuname(),'typeaver'=>'EXCC'))  ;



                $incorpo = '<a href="'.$pathurl.'" class="btn btn-danger btn-xs">' . $nbcptnotexam . '/' . $nbstudcc . '&nbsp;&nbsp;<i class="fa fa-edit"></i> </a>';


            }


            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();
            $rsm->addScalarResult('nbnotexamtp', 'nbnotexamtp');

            $sql = "SELECT count(  DISTINCT `studentid`) as nbnotexamtp FROM `student_examnotes`  WHERE  acadyearid=:idanac and specialityid=:idspec and semesterid=:idsem and  sessionid=:idses and  ueid=:idue and ecuid=:idecu and typeof_examnotes='EXTP'  and exam_notes BETWEEN 0 and 20 ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('idanac', $idanacs );
            $query->setParameter('idspec', $idspecs);
            $query->setParameter('idsem', $idsems );
            $query->setParameter('idses', $idsess );


            $query->setParameter('idue', $ecuspec->getUeid());
            $query->setParameter('idecu', $ecuspec->getEcuid());


            $cptnotexamtp= $query->getResult();


            foreach ($cptnotexamtp as $n) {


                $nbcptnotexamtp= $n['nbnotexamtp'];

            }



            if ($nbcptnotexamtp >= 1 and $nbcptnotexamtp < $nbstudcc) {



                $pathurltp=  $this->generateUrl('siges_redirectentrynotexam', array('idue'=>$ue->getId(),'idecu'=>$ecu->getId(),'libue'=>$ue->getUename(),'libecu'=>$ecu->getEcuname(),'typeaver'=>'EXTP'))  ;



                $incorpotp = '<a href="'.$pathurltp.'" class="btn btn-warning btn-xs">' . $nbcptnotexamtp . '/' . $nbstudcc . '&nbsp;&nbsp;<i class="fa fa-edit"></i> </a>';







            } elseif ($nbcptnotexamtp ==$nbstudcc) {


                $pathurltp=  $this->generateUrl('siges_redirectentrynotexam', array('idue'=>$ue->getId(),'idecu'=>$ecu->getId(),'libue'=>$ue->getUename(),'libecu'=>$ecu->getEcuname(),'typeaver'=>'EXTP'))  ;



                $incorpotp = '<a href="'.$pathurltp.'" class="btn btn-success btn-xs">' . $nbcptnotexamtp . '/' . $nbstudcc . '&nbsp;&nbsp;<i class="fa fa-edit"></i> </a>';



            }




            else{

                $pathurltp=  $this->generateUrl('siges_redirectentrynotexam', array('idue'=>$ue->getId(),'idecu'=>$ecu->getId(),'libue'=>$ue->getUename(),'libecu'=>$ecu->getEcuname(),'typeaver'=>'EXTP'))  ;



                $incorpotp = '<a href="'.$pathurltp.'" class="btn btn-danger btn-xs">' . $nbcptnotexamtp . '/' . $nbstudcc . '&nbsp;&nbsp;<i class="fa fa-edit"></i> </a>';



            }












            $output['data'][] = [


                'ue' => $ue->getUename(),
                'ecu' => $ecu->getEcuname(),
                'incorpo' =>$incorpo,
                'MODIFIER'=>$incorpotp



            ];
        }

        return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);
    }






    public function redirectentrynotexam(Request $request)
    {


        $request->getSession()->set('ueideditnex', $request->query->get('idue'));
        $request->getSession()->set('ecuideditnex', $request->query->get('idecu'));
        $request->getSession()->set('typenexedit', $request->query->get('typeaver'));
        $request->getSession()->set('uenamenexedit', $request->query->get('libue'));
        $request->getSession()->set('ecunamenexedit', $request->query->get('libecu'));

        $idanac=$this->get('session')->get('anacad');
        $idspec=$this->get('session')->get('specidecusemnex');
        $idsem=$this->get('session')->get('semidecusemnex');
        $leconnecte=$this->getUser()->getUsername();
        $idue=$request->query->get('idue') ;
        $idecu=$request->query->get('idecu');
        $typeofaver=$request->query->get('typeaver');
        $idses=$this->get('session')->get('sesidecusemnex');


        return $this->redirect("http://localhost:8888/SIGES/nexeditrp.php?idanac=$idanac&&idspec=$idspec&&idsem=$idsem&&idue=$idue&&&idecu=$idecu&&typeofaver=$typeofaver&&idses=$idses&&leconnecte=$leconnecte");



    }





    public function entrynotexam()
    {
        return  $this->render('pedagores/entrynotexam.html.twig');
    }




    /**
     * Dashboard Average Teacher
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function oversightdashpedagores()
    {

        return $this->render('pedagores/oversightdashpedagores.html.twig', [
            'current_menu' => 'oversightdashpedagores',
        ]);
    }



    public function redirectoversightrp(Request $request)
    {


        $request->getSession()->set('idsesoversight', $request->query->get('idses'));
        $request->getSession()->set('semtypeoversight', $request->query->get('semtype'));

        return $this->redirectToRoute('siges_oversightrp');
    }



    public function oversightrp(myFunction $callfunction)
    {

        $callfunction->setIdanac($this->get('session')->get('anacad'));
        $callfunction->setSemtype($this->get('session')->get('semtypeoversight'));
        $callfunction->setEntityClass(SchoolClass::class);

        if($this->get('session')->get('idsesoversight')=='SE1'){

            $nbcptecu=$callfunction->nbecuteachingse1();
            $nbcptecusai=$callfunction->nbecuentryaverages();


            $percentecusai=number_format((($nbcptecusai*100)/$nbcptecu),2);


            $nbcptecusaiex=$callfunction->nbecuentryexamnotes($this->get('session')->get('idsesoversight'));


            $percentecusaiex=number_format((($nbcptecusaiex*100)/$nbcptecu),2);

        }else{


            $nbcptecu=$callfunction->nbecuteachingse2();
            $nbcptecusai=$callfunction->nbecuentryaveragesse2();


            $percentecusai=number_format((($nbcptecusai*100)/$nbcptecu),2);


            $nbcptecusaiex=$callfunction->nbecuentryexamnotesse2();


            $percentecusaiex=number_format((($nbcptecusaiex*100)/$nbcptecu),2);




        }




        return $this->render('pedagores/oversightrp.html.twig', array('nbecu'=> $nbcptecu,'percentecusai'=> $percentecusai,'percentecusaiex'=> $percentecusaiex));




    }




    public function listaverrp(MyFunction $callfunction )
    {


        $callfunction->setIdanac($this->get('session')->get('anacad'));
        $callfunction->setSemtype($this->get('session')->get('semtypeoversight'));
        $callfunction->setEntityClass(SchoolClass::class);

        if($this->get('session')->get('idsesoversight')=='SE1'){

            $nbcptecu=$callfunction->nbecuteachingse1();
            $nbcptecusai=$callfunction->nbecuentryaverages();

            $nbecunosai=$nbcptecu-$nbcptecusai;


        }else{


            $nbcptecu=$callfunction->nbecuteachingse2();
            $nbcptecusai=$callfunction->nbecuentryaveragesse2();

            $nbecunosai=$nbcptecu-$nbcptecusai;


        }




        $output1 = [


            'nbecu' =>$nbecunosai,

            'title' =>'Non Saisie',
            'color' =>'#ee3639',






        ];






        $output2 = [
            'nbecu' =>$nbcptecusai,


            'title' =>' Saisie',
            'color' =>'#0dc143'






        ];




        $output=array($output1,$output2);


        return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);
    }






    public function listnexrp(MyFunction $callfunction )
    {


        $callfunction->setIdanac($this->get('session')->get('anacad'));
        $callfunction->setSemtype($this->get('session')->get('semtypeoversight'));
        $callfunction->setEntityClass(SchoolClass::class);

        if($this->get('session')->get('idsesoversight')=='SE1'){

            $nbcptecu=$callfunction->nbecuteachingse1();

            $nbcptecusaiex=$callfunction->nbecuentryexamnotes($this->get('session')->get('idsesoversight'));

            $nbecunosaiex=$nbcptecu-$nbcptecusaiex;


        }else
            {
                $nbcptecu=$callfunction->nbecuteachingse2();

                $nbcptecusaiex=$callfunction->nbecuentryexamnotesse2();

                $nbecunosaiex=$nbcptecu-$nbcptecusaiex;
            }




        $output1 = [


            'nbecu' =>$nbecunosaiex,

            'title' =>'Non Saisie',
            'color' =>'#ee3639',






        ];






        $output2 = [
            'nbecu' =>$nbcptecusaiex,


            'title' =>'Saisie',
            'color' =>'#0dc143'






        ];




        $output=array($output1,$output2);


        return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);
    }








    public function specmccoversight()
    {
        return  $this->render('pedagores/specmccoversight.html.twig',array('current_menu'=>'specmccoversight'));
    }




    public function listspecmccoversight(Request $request, StudentSpecialityRepository $studspecrepo, MyFunction $callfunction, SchoolClassRepository $schoolcrepo)
    {
        $idanac=$this->get('session')->get('anacad');
        $semtype=$this->get('session')->get('semtypeoversight');
        $idses=$this->get('session')->get('idsesoversight');

        $callfunction->setIdanac($this->get('session')->get('anacad'));
        $callfunction->setSemtype($this->get('session')->get('semtypeoversight'));
        $callfunction->setEntityClass(SchoolClass::class);

        if($this->get('session')->get('idsesoversight')=='SE1')

        {

            $length = $request->get('length');
            $length = $length && ($length!=-1)?$length:0;

            $start = $request->get('start');
            $start = $length?($start && ($start!=-1)?$start:0)/$length:0;

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

            foreach ($users as $levspec) {

                $em = $this->getDoctrine()->getManager();


                $rsm = new ResultSetMapping();
                $rsm->addScalarResult('id', 'id');

                $sql = "SELECT id FROM `semester`  WHERE  level_id=:levelid and semtype=:semtype  ";
                $query = $em->createNativeQuery($sql, $rsm);
                $query->setParameter('levelid', $levspec['levelid']);
                $query->setParameter('semtype', $semtype);



                $seme= $query->getResult();


                foreach ($seme as $sm) {
                    $semster= $sm['id'];

                }


                $nbecusemspec = $callfunction->nbeculevelspec($idanac,$levspec['specialityid'],$semster);



                $nbcptecusaispec= $callfunction->nbecuentryaveragesbyspec($idanac,$semster,$levspec['specialityid']);



                if ($nbcptecusaispec >= 1 and $nbcptecusaispec < $nbecusemspec) {


                    $pathurl=  $this->generateUrl('siges_redirectecumccover', array('levelid'=>$levspec['levelid'],'specid'=>$levspec['specialityid'],'idsem'=>$semster,'idses'=>$idses))  ;




                    $incorpo = '<a href="'.$pathurl.'" class="btn btn-warning btn-xs">' . $nbcptecusaispec . '/' . $nbecusemspec . '&nbsp;&nbsp;<i class="fa fa-search"></i> </a>';






                } elseif ($nbcptecusaispec ==$nbecusemspec){



                    $pathurl=  $this->generateUrl('siges_redirectecumccover', array('levelid'=>$levspec['levelid'],'specid'=>$levspec['specialityid'],'idsem'=>$semster,'idses'=>$idses))  ;




                    $incorpo = '<a href="'.$pathurl.'" class="btn btn-success btn-xs">' . $nbcptecusaispec . '/' . $nbecusemspec . '&nbsp;&nbsp;<i class="fa fa-search"></i> </a>';


                }





                else{


                    $pathurl=  $this->generateUrl('siges_redirectecumccover', array('levelid'=>$levspec['levelid'],'specid'=>$levspec['specialityid'],'idsem'=>$semster,'idses'=>$idses))  ;




                    $incorpo = '<a href="'.$pathurl.'" class="btn btn-danger btn-xs">' . $nbcptecusaispec . '/' . $nbecusemspec . '&nbsp;&nbsp;<i class="fa fa-search"></i> </a>';

                }



                if($levspec['specialityid']=='TCSIGLSITW'){

                    $libspec='INFORMATIQUE';
                }else{
                    $libspec=$levspec['specialityid'];
                }






                $output['data'][] = [
                    'levelid' =>$levspec['levelid'],
                    'specid' => $libspec,
                    'idsem' => $semster,
                    'saiecue' => $incorpo,





                ];
            }

            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);
        }




    }






    public function redirectecumccover(Request $request)
    {

        $request->getSession()->set('levelidecumcc', $request->query->get('levelid'));
        $request->getSession()->set('specidecumcc', $request->query->get('specid'));
        $request->getSession()->set('semidecumcc', $request->query->get('idsem'));

        return $this->redirectToRoute('siges_ecumccoversight');
    }




    public function ecumccoversight()
    {
        return  $this->render('pedagores/ecumccoversight.html.twig',array('current_menu'=>'ecumccoversight'));
    }




    public function listecumccoversight(Request $request, TeachSpecialityRepository $teachspecrepo, SchoolClassRepository $schoolclassrepo,
                                        SigesUserRepository $sigesuser, UeRepository $uerepo, EcuRepository $ecurepo,
                                        SpecialityRepository $specrepo, LevelRepository $levelrepo, SemesterRepository $semrepo, MyFunction $callfunction)
    {
        $idanac=$this->get('session')->get('anacad');

        $idsem= $this->get('session')->get('semidecumcc');
        $idspec=$this->get('session')->get('specidecumcc');
        $levelid=$this->get('session')->get('levelidecumcc');
        $semtype=$this->get('session')->get('semtypeoversight');
        $idses=$this->get('session')->get('idsesoversight');



        if($idses=='SE1')

        {
            $length = $request->get('length');
            $length = $length && ($length!=-1)?$length:0;

            $start = $request->get('start');
            $start = $length?($start && ($start!=-1)?$start:0)/$length:0;

            $search = $request->get('search');
            $filters = [
                'query' => @$search['value']
            ];

            $users = $teachspecrepo->searchsemspec($idanac,$idsem,$idspec,$levelid, $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($teachspecrepo->searchsemspec($idanac,$idsem,$idspec,$levelid, $filters, 0, false)),
                'recordsTotal' => count($teachspecrepo->searchsemspec($idanac,$idsem,$idspec,$levelid, 0, false))
            );

            foreach ($users as $tspec) {


                $classincor = $schoolclassrepo->findOneById($tspec['classeid']);


                $ens = $sigesuser->findOneByUsername($tspec['teacherid']);


                $ue = $uerepo->findOneById($tspec['ueid']);


                $ecu = $ecurepo->findOneById($tspec['ecuid']);

                $spe = $specrepo->findOneById($classincor->getSpecialityId());


                $lev = $levelrepo->findOneById($classincor->getLevelid());

                $sem = $semrepo->findOneById($tspec['semesterid']);



                    $nbcptetud= $callfunction->nbstudentclass($idanac,$classincor->getSpecialityid(),$tspec['classeid']);




                    $nbcptnotemoycc= $callfunction->nbaveragebyschoolclass($idanac,$idsem,$tspec['ueid'],$tspec['ecuid'],$classincor->getId());




                if ($nbcptnotemoycc >= 1) {
                    $incorpo = '<span class="btn btn-success btn-xs">' .$nbcptnotemoycc  . '/' . $nbcptetud . '</span>';
                } else {
                    $incorpo = '<span class="btn btn-danger btn-xs">' .$nbcptnotemoycc  . '/' . $nbcptetud . '</span>';
                }
                if ($nbcptnotemoycc==0) {
                    $listing = '';
                } elseif($nbcptnotemoycc <$nbcptetud){

                    $listing = '<a href="http://localhost:8888/SIGES/files/calllisting.php?levelname=' .$lev->getLevelname(). '&amp;semname=' .$sem->getSemname(). '&amp;classid=' .$tspec['classeid']. '&amp;specid=' .$spe->getId(). '&amp;ueid=' . $tspec['ueid']. '&amp;ecuid=' .$tspec['ecuid']. '&amp;uename=' . $ue->getUename(). '&amp;classname=' . $classincor->getClassname(). ' &amp;semid=' . $tspec['semesterid']. ' &amp;ecuname=' . $ecu->getEcuname(). '&amp;idanac='.$idanac.'&amp;idses=&amp;typeaver=" class="btn btn-warning btn-xs"><i class="fa fa-file-pdf-o"></i>  </a>';
                }



                else{

                    $listing = '<a href="http://localhost:8888/SIGES/files/calllisting.php?levelname=' .$lev->getLevelname(). '&amp;semname=' .$sem->getSemname(). '&amp;classid=' .$tspec['classeid']. '&amp;specid=' .$spe->getId(). '&amp;ueid=' . $tspec['ueid']. '&amp;ecuid=' . $tspec['ecuid']. '&amp;uename=' . $ue->getUename(). '&amp;classname=' . $classincor->getClassname(). ' &amp;semid=' . $tspec['semesterid']. ' &amp;ecuname=' . $ecu->getEcuname(). '&amp;idanac='.$idanac.'&amp;idses=&amp;typeaver=" class="btn btn-success btn-xs"><i class="fa fa-file-pdf-o"></i>  </a>';
                }





                $enseignant='<div>'.$ens->getLastname().' '.$ens->getFirstname().'  <br> Contact:'.$ens->getPhone().'</div>';




                $output['data'][] = [
                    'classename' =>$tspec['classeid'],
                    'specid' => $classincor->getSpecialityId(),
                    'levelid' => $classincor->getLevelid(),
                    'ecuname' => $ecu->getEcuname(),
                    'semester' => $tspec['semesterid'],
                    'ens' => $enseignant,


                    'averageva' => $incorpo,
                    'listing' => $listing,



                ];
            }

            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);






        }













    }







    public function specnexoversight()
    {
        return  $this->render('pedagores/specnexoversight.html.twig',array('current_menu'=>'specmccoversight'));
    }




    public function listspecnexoversight(Request $request, StudentSpecialityRepository $studspecrepo, MyFunction $callfunction, SchoolClassRepository $schoolcrepo)
    {
        $idanac=$this->get('session')->get('anacad');
        $semtype=$this->get('session')->get('semtypeoversight');
        $idses=$this->get('session')->get('idsesoversight');

        $callfunction->setIdanac($this->get('session')->get('anacad'));
        $callfunction->setSemtype($this->get('session')->get('semtypeoversight'));
        $callfunction->setEntityClass(SchoolClass::class);

        if($this->get('session')->get('idsesoversight')=='SE1')

        {

            $length = $request->get('length');
            $length = $length && ($length!=-1)?$length:0;

            $start = $request->get('start');
            $start = $length?($start && ($start!=-1)?$start:0)/$length:0;

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

            foreach ($users as $levspec) {

                $em = $this->getDoctrine()->getManager();


                $rsm = new ResultSetMapping();
                $rsm->addScalarResult('id', 'id');

                $sql = "SELECT id FROM `semester`  WHERE  level_id=:levelid and semtype=:semtype  ";
                $query = $em->createNativeQuery($sql, $rsm);
                $query->setParameter('levelid', $levspec['levelid']);
                $query->setParameter('semtype', $semtype);



                $seme= $query->getResult();


                foreach ($seme as $sm) {
                    $semster= $sm['id'];

                }


                $nbecusemspec = $callfunction->nbeculevelspec($idanac,$levspec['specialityid'],$semster);



                $nbcptecusaispec= $callfunction->nbecuentryexamnotesbyspec($idanac,$semster,$levspec['specialityid'],$idses);



                if ($nbcptecusaispec >= 1 and $nbcptecusaispec < $nbecusemspec) {


                    $pathurl=  $this->generateUrl('siges_redirectecunexover', array('levelid'=>$levspec['levelid'],'specid'=>$levspec['specialityid'],'idsem'=>$semster,'idses'=>$idses))  ;




                    $incorpo = '<a href="'.$pathurl.'" class="btn btn-warning btn-xs">' . $nbcptecusaispec . '/' . $nbecusemspec . '&nbsp;&nbsp;<i class="fa fa-search"></i> </a>';






                } elseif ($nbcptecusaispec ==$nbecusemspec){



                    $pathurl=  $this->generateUrl('siges_redirectecunexover', array('levelid'=>$levspec['levelid'],'specid'=>$levspec['specialityid'],'idsem'=>$semster,'idses'=>$idses))  ;




                    $incorpo = '<a href="'.$pathurl.'" class="btn btn-success btn-xs">' . $nbcptecusaispec . '/' . $nbecusemspec . '&nbsp;&nbsp;<i class="fa fa-search"></i> </a>';


                }





                else{


                    $pathurl=  $this->generateUrl('siges_redirectecunexover', array('levelid'=>$levspec['levelid'],'specid'=>$levspec['specialityid'],'idsem'=>$semster,'idses'=>$idses))  ;




                    $incorpo = '<a href="'.$pathurl.'" class="btn btn-danger btn-xs">' . $nbcptecusaispec . '/' . $nbecusemspec . '&nbsp;&nbsp;<i class="fa fa-search"></i> </a>';

                }



                if($levspec['specialityid']=='TCSIGLSITW'){

                    $libspec='INFORMATIQUE';
                }else{
                    $libspec=$levspec['specialityid'];
                }






                $output['data'][] = [
                    'levelid' =>$levspec['levelid'],
                    'specid' => $libspec,
                    'idsem' => $semster,
                    'saiecue' => $incorpo,





                ];
            }

            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);
        }




    }






    public function redirectecunexover(Request $request)
    {

        $request->getSession()->set('levelidecunex', $request->query->get('levelid'));
        $request->getSession()->set('specidecunex', $request->query->get('specid'));
        $request->getSession()->set('semidecunex', $request->query->get('idsem'));

        return $this->redirectToRoute('siges_ecunexoversight');
    }




    public function ecunexoversight()
    {
        return  $this->render('pedagores/ecunexoversight.html.twig',array('current_menu'=>'ecunexoversight'));
    }




    public function listecunexoversight(Request $request, TeachSpecialityRepository $teachspecrepo, SchoolClassRepository $schoolclassrepo,
                                        SigesUserRepository $sigesuser, UeRepository $uerepo, EcuRepository $ecurepo,
                                        SpecialityRepository $specrepo, LevelRepository $levelrepo, SemesterRepository $semrepo, MyFunction $callfunction)
    {
        $idanac=$this->get('session')->get('anacad');

        $idsem= $this->get('session')->get('semidecunex');
        $idspec=$this->get('session')->get('specidecunex');
        $levelid=$this->get('session')->get('levelidecunex');
        $semtype=$this->get('session')->get('semtypeoversight');
        $idses=$this->get('session')->get('idsesoversight');



        if($idses=='SE1')

        {
            $length = $request->get('length');
            $length = $length && ($length!=-1)?$length:0;

            $start = $request->get('start');
            $start = $length?($start && ($start!=-1)?$start:0)/$length:0;

            $search = $request->get('search');
            $filters = [
                'query' => @$search['value']
            ];

            $users = $teachspecrepo->searchsemspec($idanac,$idsem,$idspec,$levelid, $filters, $start, $length
            );

            $output = array(
                'data' => array(),
                'recordsFiltered' => count($teachspecrepo->searchsemspec($idanac,$idsem,$idspec,$levelid, $filters, 0, false)),
                'recordsTotal' => count($teachspecrepo->searchsemspec($idanac,$idsem,$idspec,$levelid, 0, false))
            );

            foreach ($users as $tspec) {


                $classincor = $schoolclassrepo->findOneById($tspec['classeid']);


                $ens = $sigesuser->findOneByUsername($tspec['teacherid']);


                $ue = $uerepo->findOneById($tspec['ueid']);


                $ecu = $ecurepo->findOneById($tspec['ecuid']);

                $spe = $specrepo->findOneById($classincor->getSpecialityId());


                $lev = $levelrepo->findOneById($classincor->getLevelid());

                $sem = $semrepo->findOneById($tspec['semesterid']);



                $nbcptetud= $callfunction->nbstudentclass($idanac,$classincor->getSpecialityid(),$tspec['classeid']);




                $nbcptnotemoycc= $callfunction->nbexamnotesbyschoolclass($idanac,$idsem,$idses,$tspec['ueid'],$tspec['ecuid'],$classincor->getId());




                if ($nbcptnotemoycc >= 1) {
                    $incorpo = '<span class="btn btn-success btn-xs">' .$nbcptnotemoycc  . '/' . $nbcptetud . '</span>';
                } else {
                    $incorpo = '<span class="btn btn-danger btn-xs">' .$nbcptnotemoycc  . '/' . $nbcptetud . '</span>';
                }
                if ($nbcptnotemoycc==0) {
                    $listing = '';
                } elseif($nbcptnotemoycc <$nbcptetud){

                    $listing = '<a href="http://localhost:8888/SIGES/files/calllistingnex.php?levelname=' .$lev->getLevelname(). '&amp;semname=' .$sem->getSemname(). '&amp;classid=' .$tspec['classeid']. '&amp;specid=' .$spe->getId(). '&amp;ueid=' . $tspec['ueid']. '&amp;ecuid=' .$tspec['ecuid']. '&amp;uename=' . $ue->getUename(). '&amp;classname=' . $classincor->getClassname(). ' &amp;semid=' . $tspec['semesterid']. ' &amp;ecuname=' . $ecu->getEcuname(). '&amp;idanac='.$idanac.'&amp;idses='.$idses.'&amp;typeaver=" class="btn btn-warning btn-xs"><i class="fa fa-file-pdf-o"></i>  </a>';
                }



                else{

                    $listing = '<a href="http://localhost:8888/SIGES/files/calllistingnex.php?levelname=' .$lev->getLevelname(). '&amp;semname=' .$sem->getSemname(). '&amp;classid=' .$tspec['classeid']. '&amp;specid=' .$spe->getId(). '&amp;ueid=' . $tspec['ueid']. '&amp;ecuid=' . $tspec['ecuid']. '&amp;uename=' . $ue->getUename(). '&amp;classname=' . $classincor->getClassname(). ' &amp;semid=' . $tspec['semesterid']. ' &amp;ecuname=' . $ecu->getEcuname(). '&amp;idanac='.$idanac.'&amp;idses='.$idses.'&amp;typeaver=" class="btn btn-success btn-xs"><i class="fa fa-file-pdf-o"></i>  </a>';
                }





                $enseignant='<div>'.$ens->getLastname().' '.$ens->getFirstname().'  <br> Contact:'.$ens->getPhone().'</div>';




                $output['data'][] = [
                    'classename' =>$tspec['classeid'],
                    'specid' => $classincor->getSpecialityId(),
                    'levelid' => $classincor->getLevelid(),
                    'ecuname' => $ecu->getEcuname(),
                    'semester' => $tspec['semesterid'],
                    'ens' => $enseignant,


                    'averageva' => $incorpo,
                    'listing' => $listing,



                ];
            }

            return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);






        }













    }







}
