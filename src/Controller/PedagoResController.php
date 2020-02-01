<?php

namespace App\Controller;
use App\Repository\SchoolClassRepository;
use App\Repository\EcuRepository;
use App\Repository\EcuSpecialityRepository;
use App\Repository\StudentSpecialityRepository;
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







            if ($nbcptecusaiexspec >= 1) {
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


        if($this->get('session')->get('idsesoversight')=='SE1'){


            $nbcptecu=$callfunction->nbecuteachingse1($this->get('session')->get('anacad'),$this->get('session')->get('semtypeoversight'));

        }
        else{

            $nbcptecu=$callfunction->nbecuteachingse2($this->get('session')->get('anacad'),$this->get('session')->get('semtypeoversight'));
        }



        if($this->get('session')->get('idsesoversight')=='SE1'){



            $nbcptecusai=$callfunction->nbecuentryaverages($this->get('session')->get('anacad'),$this->get('session')->get('semtypeoversight'));



            $percentecusai=number_format((($nbcptecusai*100)/$nbcptecu),2);






            $nbcptecusaiex=$callfunction->nbecuentryexamnotes($this->get('session')->get('anacad'),$this->get('session')->get('semtypeoversight'));








            $percentecusaiex=number_format((($nbcptecusaiex*100)/$nbcptecu),2);




        }




        return $this->render('@ESATICSiges/Smcc/receptionrp.html.twig', array('nbecu'=> $nbcptecu,'percentecusai'=> $percentecusai,'percentecusaiex'=> $percentecusaiex));
    }




    public function listreceptionrpAction(Request $request )
    {


        $callfunction=  $this->get('esatic_siges.myfunction');


        if($this->get('session')->get('idsesrep')=='SE1'){


            $nbcptecu=$callfunction->nbecuteachingse1($this->get('session')->get('idanacademiq'),$this->get('session')->get('semtyperep'));

        }
        else{

            /*   $em = $this->getDoctrine()->getManager();


               $rsm = new ResultSetMapping();
               $rsm->addScalarResult('nbecu', 'nbecu');

               $sql = "SELECT count( DISTINCT `ecuid`) as nbecu FROM `student_examnotes` where acadyearid=:acadyearid and sessionid=:idses and semesterid in (select id from semester where semtype=:semtype)  ";
               $query = $em->createNativeQuery($sql, $rsm);
               $query->setParameter('acadyearid', $this->get('session')->get('idanacademiq'));
               $query->setParameter('semtype', $this->get('session')->get('semtyperep'));
               $query->setParameter('idses', $this->get('session')->get('idsesrep'));

               $cptecu= $query->getResult();


               foreach ($cptecu as $nt) {

                   $nbcptecu= $nt['nbecu'];



               }*/

            $nbcptecu=$callfunction->nbecuteachingse2($this->get('session')->get('idanacademiq'),$this->get('session')->get('semtyperep'));


        }






        if($this->get('session')->get('idsesrep')=='SE1'){







            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();
            $rsm->addScalarResult('ecuid', 'ecuid');
            $rsm->addScalarResult('classeid', 'classeid');
            $rsm->addScalarResult('ueid', 'ueid');
            $rsm->addScalarResult('semesterid', 'semesterid');

            $sql = "SELECT ecuid,classeid,ueid,semesterid FROM `teach_speciality` where acadyearid=:acadyearid and semesterid in (select id from semester where semtype=:semtype)  ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('acadyearid', $this->get('session')->get('idanacademiq'));
            $query->setParameter('semtype', $this->get('session')->get('semtyperep'));

            $cptecu= $query->getResult();

            $nbecusai=0;
            foreach ($cptecu as $ncc) {


                $em = $this->getDoctrine()
                    ->getManager()
                    ->getRepository('ESATICSigesBundle:SchoolClass');

                $classecu = $em->findOneById($ncc['classeid']);






                $em = $this->getDoctrine()->getManager();


                $rsm = new ResultSetMapping();
                $rsm->addScalarResult('nbstudent', 'nbstudent');

                $sql = "SELECT count(  DISTINCT `studentid`) as nbstudent FROM `student_speciality`  WHERE  acadyearid=:acadyearid and specialityid=:specialityid  and school_classeid=:school_classid  ";
                $query = $em->createNativeQuery($sql, $rsm);
                $query->setParameter('acadyearid', $this->get('session')->get('idanacademiq'));
                $query->setParameter('specialityid', $classecu->getSpecialityid());
                $query->setParameter('school_classid', $ncc['classeid']);


                $nbstdcc = $query->getResult();

                foreach ($nbstdcc as $nst) {
                    $nbstudcc= $nst['nbstudent'];

                }













                $em = $this->getDoctrine()->getManager();
                $rsm = new ResultSetMapping();

                $rsm->addScalarResult('nbaverage', 'nbaverage');
                $sql = "  SELECT  count(average) as nbaverage FROM  student_averages   WHERE   acadyearid=:idanac and  average  BETWEEN 0 AND 20 and semesterid=:idsem and ecuid=:ecuid and ueid=:ueid and typeof_averages='MCC' and valid=1  and studentid in (select studentid from student_speciality where acadyearid=:idanac and school_classeid=:idclasse)   ";
                $query = $em->createNativeQuery($sql, $rsm);
                $query->setParameter('idanac', $this->get('session')->get('idanacademiq'));
                $query->setParameter('idsem', $ncc['semesterid']);
                $query->setParameter('ueid', $ncc['ueid']);
                $query->setParameter('ecuid', $ncc['ecuid']);
                $query->setParameter('idclasse', $ncc['classeid']);

                $idecucc = $query->getResult();


                foreach ($idecucc as $necc){
                    $averagenb=$necc['nbaverage'];
                }







                if($nbstudcc==$averagenb){

                    $nbecusai=$nbecusai+1;
                }










            }


            $nbcptecusai= $nbecusai;


            $nbecunosai=$nbcptecu-$nbcptecusai;



























        }
        else {
            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();
            $rsm->addScalarResult('ecuid', 'ecuid');
            $rsm->addScalarResult('specialityid', 'specialityid');
            $rsm->addScalarResult('ueid', 'ueid');
            $rsm->addScalarResult('semesterid', 'semesterid');

            $sql = "SELECT  DISTINCT ecuid,specialityid,ueid,semesterid FROM `student_examnotes` where acadyearid=:acadyearid AND sessionid='SE2' and typeof_examnotes='EXCC' and semesterid in (select id from semester where semtype=:semtype)  ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('acadyearid', $this->get('session')->get('idanacademiq'));
            $query->setParameter('semtype', $this->get('session')->get('semtyperep'));

            $cptecu= $query->getResult();

            $nbecusai=0;


            foreach ($cptecu as $ncc) {



                $em = $this->getDoctrine()->getManager();


                $rsm = new ResultSetMapping();
                $rsm->addScalarResult('nbstudent', 'nbstudent');

                $sql = "SELECT count(  DISTINCT `studentid`) as nbstudent FROM `student_examnotes`  WHERE  acadyearid=:acadyearid and specialityid=:specialityid and typeof_examnotes='EXCC' and sessionid='SE2' and semesterid=:idsem and ecuid=:ecuid and ueid=:ueid ";
                $query = $em->createNativeQuery($sql, $rsm);
                $query->setParameter('acadyearid', $this->get('session')->get('idanacademiq'));
                $query->setParameter('specialityid', $ncc['specialityid']);

                $query->setParameter('idsem', $ncc['semesterid']);
                $query->setParameter('ueid', $ncc['ueid']);
                $query->setParameter('ecuid', $ncc['ecuid']);

                $nbstdex = $query->getResult();

                foreach ($nbstdex as $nstex) {
                    $nbstud = $nstex['nbstudent'];

                }




                $em = $this->getDoctrine()->getManager();
                $rsm = new ResultSetMapping();

                $rsm->addScalarResult('nbaverage', 'nbaverage');
                $sql = " SELECT count(average) as nbaverage FROM student_averages WHERE acadyearid=:idanac and average BETWEEN 0 AND 20 and typeof_averages='MCC' and semesterid=:idsem and ecuid=:ecuid and ueid=:ueid and valid=1 and specialityid=:specialityid and studentid in (SELECT studentid from student_examnotes WHERE acadyearid=:idanac and `specialityid`=:specialityid and `semesterid`=:idsem and `typeof_examnotes`='EXCC' and sessionid='SE2') ";
                $query = $em->createNativeQuery($sql, $rsm);
                $query->setParameter('idanac', $this->get('session')->get('idanacademiq'));
                $query->setParameter('idsem', $ncc['semesterid']);
                $query->setParameter('ueid', $ncc['ueid']);
                $query->setParameter('ecuid', $ncc['ecuid']);
                $query->setParameter('specialityid', $ncc['specialityid']);


                $averstuds = $query->getResult();


                foreach ($averstuds as $sex) {
                    $averagenb = $sex['nbaverage'];

                }





                if($nbstud==$averagenb){

                    $nbecusai=$nbecusai + 1;
                }













            }
            $nbcptecusai=$nbecusai;
            $nbecunosai=$nbcptecu-$nbcptecusai;

        }

        $output1 = [


            'nbecu' =>$nbecunosai,

            'title' =>'ECUE non Saisie',
            'color' =>'#ee3639',






        ];






        $output2 = [
            'nbecu' =>$nbcptecusai,


            'title' =>'ECUE Saisie',
            'color' =>'#0dc143'






        ];




        $output=array($output1,$output2);


        return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);
    }


    public function listreceptionrpexamAction(Request $request )
    {

        $callfunction=  $this->get('esatic_siges.myfunction');


        if($this->get('session')->get('idsesrep')=='SE1'){


            $nbcptecu=$callfunction->nbecuteachingse1($this->get('session')->get('idanacademiq'),$this->get('session')->get('semtyperep'));

        }
        else{

            /*   $em = $this->getDoctrine()->getManager();


               $rsm = new ResultSetMapping();
               $rsm->addScalarResult('nbecu', 'nbecu');

               $sql = "SELECT count( DISTINCT `ecuid`) as nbecu FROM `student_examnotes` where acadyearid=:acadyearid and sessionid=:idses and semesterid in (select id from semester where semtype=:semtype)  ";
               $query = $em->createNativeQuery($sql, $rsm);
               $query->setParameter('acadyearid', $this->get('session')->get('idanacademiq'));
               $query->setParameter('semtype', $this->get('session')->get('semtyperep'));
               $query->setParameter('idses', $this->get('session')->get('idsesrep'));

               $cptecu= $query->getResult();


               foreach ($cptecu as $nt) {

                   $nbcptecu= $nt['nbecu'];



               }*/

            $nbcptecu=$callfunction->nbecuteachingse2($this->get('session')->get('idanacademiq'),$this->get('session')->get('semtyperep'));


        }




        if($this->get('session')->get('idsesrep')=='SE1'){







            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();
            $rsm->addScalarResult('ecuid', 'ecuid');
            $rsm->addScalarResult('classeid', 'classeid');
            $rsm->addScalarResult('ueid', 'ueid');
            $rsm->addScalarResult('semesterid', 'semesterid');

            $sql = "SELECT ecuid,classeid,ueid,semesterid FROM `teach_speciality` where acadyearid=:acadyearid and semesterid in (select id from semester where semtype=:semtype)  ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('acadyearid', $this->get('session')->get('idanacademiq'));
            $query->setParameter('semtype', $this->get('session')->get('semtyperep'));

            $cptecu= $query->getResult();

            $nbecusaiex=0;
            foreach ($cptecu as $n) {


                $em = $this->getDoctrine()
                    ->getManager()
                    ->getRepository('ESATICSigesBundle:SchoolClass');

                $classecu = $em->findOneById($n['classeid']);








                $em = $this->getDoctrine()->getManager();


                $rsm = new ResultSetMapping();
                $rsm->addScalarResult('nbstudent', 'nbstudent');

                $sql = "SELECT count(  DISTINCT `studentid`) as nbstudent FROM `student_speciality`  WHERE  acadyearid=:acadyearid and specialityid=:specialityid  and school_classeid=:school_classid  ";
                $query = $em->createNativeQuery($sql, $rsm);
                $query->setParameter('acadyearid', $this->get('session')->get('idanacademiq'));
                $query->setParameter('specialityid', $classecu->getSpecialityid());
                $query->setParameter('school_classid', $n['classeid']);


                $nbstdex = $query->getResult();

                foreach ($nbstdex as $nstex) {
                    $nbstud= $nstex['nbstudent'];

                }


                $em = $this->getDoctrine()->getManager();
                $rsm = new ResultSetMapping();

                $rsm->addScalarResult('nbexamnotes', 'nbexamnotes');
                $sql = "  SELECT   count(exam_notes) as nbexamnotes FROM  student_examnotes   WHERE   acadyearid=:idanac and  exam_notes BETWEEN 0 AND 20 and semesterid=:idsem and sessionid=:idses and ecuid=:ecuid and ueid=:ueid and typeof_examnotes='EXCC' and studentid in (select studentid from student_speciality where acadyearid=:idanac and school_classeid=:idclasse)   ";
                $query = $em->createNativeQuery($sql, $rsm);
                $query->setParameter('idanac', $this->get('session')->get('idanacademiq'));
                $query->setParameter('idsem', $n['semesterid']);
                $query->setParameter('idses', $this->get('session')->get('idsesrep'));
                $query->setParameter('ueid', $n['ueid']);
                $query->setParameter('ecuid', $n['ecuid']);
                $query->setParameter('idclasse', $n['classeid']);

                $idecu = $query->getResult();


                foreach ($idecu as $ne){
                    $examnotenb=$ne['nbexamnotes'];
                }






                if($nbstud==$examnotenb){

                    $nbecusaiex=$nbecusaiex+1;
                }










            }


            $nbcptecusaiex=$nbecusaiex;






























        }
        else {


            $em = $this->getDoctrine()->getManager();


            $rsm = new ResultSetMapping();
            $rsm->addScalarResult('ecuid', 'ecuid');
            $rsm->addScalarResult('specialityid', 'specialityid');
            $rsm->addScalarResult('ueid', 'ueid');
            $rsm->addScalarResult('semesterid', 'semesterid');

            $sql = "SELECT  DISTINCT ecuid,specialityid,ueid,semesterid FROM `student_examnotes` where acadyearid=:acadyearid AND sessionid=:idses and semesterid in (select id from semester where semtype=:semtype)  ";
            $query = $em->createNativeQuery($sql, $rsm);
            $query->setParameter('acadyearid', $this->get('session')->get('idanacademiq'));
            $query->setParameter('semtype', $this->get('session')->get('semtyperep'));
            $query->setParameter('idses', $this->get('session')->get('idsesrep'));

            $cptecu= $query->getResult();

            $nbecusaiex=0;
            foreach ($cptecu as $n) {







                $em = $this->getDoctrine()->getManager();


                $rsm = new ResultSetMapping();
                $rsm->addScalarResult('nbstudent', 'nbstudent');

                $sql = "SELECT count(  DISTINCT `studentid`) as nbstudent FROM `student_examnotes`  WHERE  acadyearid=:acadyearid and specialityid=:specialityid  and sessionid=:idses and semesterid=:idsem and ecuid=:ecuid and ueid=:ueid and typeof_examnotes='EXCC'";
                $query = $em->createNativeQuery($sql, $rsm);
                $query->setParameter('acadyearid', $this->get('session')->get('idanacademiq'));
                $query->setParameter('specialityid', $n['specialityid']);
                $query->setParameter('idses', $this->get('session')->get('idsesrep'));
                $query->setParameter('idsem', $n['semesterid']);
                $query->setParameter('ueid', $n['ueid']);
                $query->setParameter('ecuid', $n['ecuid']);


                $nbstdex = $query->getResult();

                foreach ($nbstdex as $nstex) {
                    $nbstud= $nstex['nbstudent'];

                }








                $em = $this->getDoctrine()->getManager();
                $rsm = new ResultSetMapping();

                $rsm->addScalarResult('nbexamnotes', 'nbexamnotes');
                $sql = "  SELECT   count(exam_notes) as nbexamnotes FROM  student_examnotes   WHERE   acadyearid=:idanac and  exam_notes BETWEEN  0 AND 20 and semesterid=:idsem and sessionid=:idses and ecuid=:ecuid and ueid=:ueid  and specialityid=:specialityid  and typeof_examnotes='EXCC' ";
                $query = $em->createNativeQuery($sql, $rsm);
                $query->setParameter('idanac', $this->get('session')->get('idanacademiq'));
                $query->setParameter('idsem', $n['semesterid']);
                $query->setParameter('idses', $this->get('session')->get('idsesrep'));
                $query->setParameter('ueid', $n['ueid']);
                $query->setParameter('ecuid', $n['ecuid']);
                $query->setParameter('specialityid', $n['specialityid']);

                $idecu = $query->getResult();


                foreach ($idecu as $ne){
                    $examnotenb=$ne['nbexamnotes'];
                }






                if($nbstud==$examnotenb){

                    $nbecusaiex=$nbecusaiex+1;
                }







            }



            $nbcptecusaiex=$nbecusaiex;

        }






















        $nbecunosaiex=$nbcptecu-$nbcptecusaiex;






        $output1 = [
            'nbecu' =>$nbecunosaiex,
            'title' =>'ECUE non Saisie',
            'color' =>'#ee3639',






        ];






        $output2 = [
            'nbecu' =>$nbcptecusaiex,
            'title' =>'ECUE Saisie',
            'color' =>'#0dc143'






        ];




        $output=array($output1,$output2);


        return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);
    }












}
