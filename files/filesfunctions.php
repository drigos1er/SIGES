<?php
session_start();

include('connection.php');
$date=date("d/m/Y    H:i:s");

$idanac=$_GET['idanac'];
$idspec=$_GET['specid'];
$idsem=$_GET['semid'];

$idue=$_GET['ueid'] ;
$idecu=$_GET['ecuid'];

$idclass=$_GET['classid'];
$uename=$_GET['uename'] ;
$ecuname=$_GET['ecuname'];

$levelname=$_GET['levelname'] ;
$semname=$_GET['semname'];
$typeaver=$_GET['typeaver'];
$idses=$_GET['idses'];



if($levelname=='LICENCE 1'){

    $levelid='L1';
}
if ($levelname=='LICENCE 2'){

    $levelid='L2';}
if ($levelname=='LICENCE 3'){

    $levelid='L3';}

if ($levelname=='MASTER 1'){

    $levelid='M1';}
if ($levelname=='MASTER 2'){

    $levelid='M2';}








if($typeaver=='MCC'){

    $typeaverage='ECRIT';
} else {
    $typeaverage='TP';
}

if($idses=='SE1'){

    $libses='1ERE SESSION';
} else {
    $libses='2EME SESSION';
}


function theoaverages($studentid,$semesterid,$ueid,$ecuid,$idanac,$bdd)
{
    $rep = $bdd->prepare('SELECT average  FROM  student_averages where studentid=:studentid and semesterid=:idsem and typeof_averages=:typeaver and ueid=:idue and ecuid=:idecu and acadyearid=:idanac and valid=1');
    $rep->execute(array('studentid'=> $studentid,'idsem'=>$semesterid,'idue'=>$ueid,'idecu'=>$ecuid,'idanac'=>$idanac,'typeaver'=>'MCC'));
    $theoaver = $rep->fetch();


    if($theoaver){
        $avertheo=$theoaver['average'];
    }else{
        $avertheo="";
    }

    return $avertheo;


}


function theoexamnotes($studentid,$semesterid,$idses,$ueid,$ecuid,$idanac,$bdd)
{
    $rep = $bdd->prepare('SELECT exam_notes  FROM  student_examnotes where studentid=:studentid and semesterid=:idsem and sessionid=:idses and typeof_examnotes=:typeaver and ueid=:idue and ecuid=:idecu and acadyearid=:idanac ');
    $rep->execute(array('studentid'=> $studentid,'idsem'=>$semesterid,'idses'=>$idses,'idue'=>$ueid,'idecu'=>$ecuid,'idanac'=>$idanac,'typeaver'=>'EXCC'));
    $theonex = $rep->fetch();


    if($theonex){
        $nextheo=$theonex['exam_notes'];
    }else{
        $nextheo="";
    }

    return $nextheo;


}


function tpaverages($studentid,$semesterid,$ueid,$ecuid,$idanac,$bdd)
{
    $reptp = $bdd->prepare('SELECT average  FROM  student_averages where studentid=:studentid and semesterid=:idsem and typeof_averages=:typeaver and ueid=:idue and ecuid=:idecu and acadyearid=:idanac and valid=1');
    $reptp->execute(array('studentid'=> $studentid,'idsem'=>$semesterid,'idue'=>$ueid,'idecu'=>$ecuid,'idanac'=>$idanac,'typeaver'=>'MTP'));
    $tpaver = $reptp->fetch();


    if($tpaver){
        $avertp=$tpaver['average'];
    }else{
        $avertp="";
    }

    return $avertp;


}

function tpexamnotes($studentid,$semesterid,$idses,$ueid,$ecuid,$idanac,$bdd)
{
    $rep = $bdd->prepare('SELECT exam_notes  FROM  student_examnotes where studentid=:studentid and semesterid=:idsem and sessionid=:idses and typeof_examnotes=:typeaver and ueid=:idue and ecuid=:idecu and acadyearid=:idanac ');
    $rep->execute(array('studentid'=> $studentid,'idsem'=>$semesterid,'idses'=>$idses,'idue'=>$ueid,'idecu'=>$ecuid,'idanac'=>$idanac,'typeaver'=>'EXTP'));
    $tpnex = $rep->fetch();


    if($tpnex){
        $nextp=$tpnex['exam_notes'];
    }else{
        $nextp="";
    }

    return $nextp;


}


function averagesvalid($studentid,$semesterid,$ueid,$ecuid,$idanac,$typeaver,$bdd)
{
    $reptp = $bdd->prepare('SELECT average  FROM  student_averages where studentid=:studentid and semesterid=:idsem and typeof_averages=:typeaver and ueid=:idue and ecuid=:idecu and acadyearid=:idanac and valid=1');
    $reptp->execute(array('studentid'=> $studentid,'idsem'=>$semesterid,'idue'=>$ueid,'idecu'=>$ecuid,'idanac'=>$idanac,'typeaver'=>$typeaver));
    $tpaver = $reptp->fetch();


    if($tpaver){
        $avertp=$tpaver['average'];
    }else{
        $avertp="";
    }

    return $avertp;


}





function averages($studentid,$semesterid,$ueid,$ecuid,$idanac,$typeaver,$bdd)
{
    $reptp = $bdd->prepare('SELECT average  FROM  student_averages where studentid=:studentid and semesterid=:idsem and typeof_averages=:typeaver and ueid=:idue and ecuid=:idecu and acadyearid=:idanac ');
    $reptp->execute(array('studentid'=> $studentid,'idsem'=>$semesterid,'idue'=>$ueid,'idecu'=>$ecuid,'idanac'=>$idanac,'typeaver'=>$typeaver));
    $tpaver = $reptp->fetch();


    if($tpaver){
        $avertp=$tpaver['average'];
    }else{
        $avertp="";
    }

    return $avertp;


}








function examnotes($studentid,$semesterid,$idses,$ueid,$ecuid,$idanac,$typeaver,$bdd)
{
    $reptp = $bdd->prepare('SELECT exam_notes  FROM  student_examnotes where studentid=:studentid and semesterid=:idsem and sessionid=:idses and typeof_examnotes=:typeaver and ueid=:idue and ecuid=:idecu and acadyearid=:idanac');
    $reptp->execute(array('studentid'=> $studentid,'idsem'=>$semesterid,'idses'=>$idses,'idue'=>$ueid,'idecu'=>$ecuid,'idanac'=>$idanac,'typeaver'=>$typeaver));
    $tpaver = $reptp->fetch();


    if($tpaver){
        $avertp=$tpaver['exam_notes'];
    }else{
        $avertp="";
    }

    return $avertp;


}




function ecuaverage($studentid,$idspec,$idsem,$idecu,$idanac,$idses,$bdd){

    $results = $bdd->prepare('SELECT *  FROM  ecu_speciality  where  semester_id=:idsem  and specialityid_id=:idspec and acadyearid=:idanac and ecuid_id=:idecu ');
    $results->execute(array('idsem' => $idsem, 'idspec' => $idspec, 'idanac' => $idanac,'idecu' => $idecu));
    $resecu= $results->fetch();




    if($resecu){
         $resul = $bdd->prepare('SELECT *  FROM  ue_validated  where studentid=:idstud and  smesterid=:idsem  and specialityid=:idspec  and ueid=:idue ');
         $resul->execute(array('idstud'=> $studentid,'idsem' => $idsem, 'idspec' => $idspec,'idue' => $resecu['ueid_id']));
         $uevalid = $resul->fetch();
         if(!$uevalid){


             if($idses=='SE1'){

                 $rep = $bdd->prepare('SELECT average  FROM  student_averages  where studentid=:idstud and semesterid=:idsem and typeof_averages=:typaver and ecuid=:idecu and acadyearid=:idanac');
                 $rep->execute(array('idstud'=> $studentid,'idsem'=>$idsem,'idecu'=>$idecu,'idanac'=>$idanac,'typaver'=>'MCC'));
                 $reso = $rep->fetch();

                 $reposes = $bdd->prepare('SELECT exam_notes  FROM  student_examnotes  where studentid=:idstud and semesterid=:idsem and typeof_examnotes=:typexamn and ecuid=:idecu and sessionid=:idses and acadyearid=:idanac ' );
                 $reposes->execute(array('idstud'=> $studentid,'idsem'=>$idsem,'idecu'=>$idecu,'idanac'=>$idanac,'idses'=>$idses,'typexamn'=>'EXCC'));
                 $resx = $reposes->fetch();


                 $moyccs = 0.4 * $reso['average'] + 0.6 * $resx['exam_notes'];

                 $reptp = $bdd->prepare('SELECT average  FROM  student_averages  where studentid=:idstud and semesterid=:idsem and typeof_averages=:typaver and ecuid=:idecu and acadyearid=:idanac ');
                 $reptp->execute(array('idstud'=> $studentid,'idsem'=>$idsem,'idecu'=>$idecu,'idanac'=>$idanac,'typaver'=>'MTP'));
                 $resotp = $reptp->fetch();

                 $reptpx = $bdd->prepare('SELECT exam_notes  FROM  student_examnotes  where studentid=:idstud and semesterid=:idsem and typeof_examnotes=:typexamn and ecuid=:idecu and sessionid=:idses and acadyearid=:idanac');
                 $reptpx->execute(array('idstud'=> $studentid,'idsem'=>$idsem,'idecu'=>$idecu,'idanac'=>$idanac,'idses'=>$idses,'typexamn'=>'EXTP'));
                 $resotpx = $reptpx->fetch();



                 if ( $resotp=="") {
                     $moytps ="";
                 } else {
                     $moytps = 0.4 * $resotp['average'] + 0.6 * $resotpx['exam_notes'];
                 }




                 if ($moytps=="") {
                     $moyenneecu = number_format((float)($moyccs),2);
                 } else {
                     $moyenneecu = number_format((0.6 * $moyccs + 0.4 * $moytps), 2);
                 }

                 return $moyenneecu;






             }else{



                 $rep = $bdd->prepare('SELECT average  FROM  student_averages  where studentid=:idstud and semesterid=:idsem and typeof_averages=:typaver and ecuid=:idecu and acadyearid=:idanac ');
                 $rep->execute(array('idstud'=> $studentid,'idsem'=>$idsem,'idecu'=>$idecu,'idanac'=>$idanac,'typaver'=>'MCC'));
                 $reso = $rep->fetch();

                 $reposes = $bdd->prepare('SELECT exam_notes,entry_user  FROM  student_examnotes  where studentid=:idstud and semesterid=:idsem and typeof_examnotes=:typexamn and ecuid=:idecu and sessionid=:idses and acadyearid=:idanac ' );
                 $reposes->execute(array('idstud'=> $studentid,'idsem'=>$idsem,'idecu'=>$idecu,'idanac'=>$idanac,'idses'=>$idses,'typexamn'=>'EXCC'));
                 $resx = $reposes->fetch();


                 $moyccs = 0.4 * $reso['average'] + 0.6 * $resx['exam_notes'];

                 $reptp = $bdd->prepare('SELECT average  FROM  student_averages  where studentid=:idstud and semesterid=:idsem and typeof_averages=:typaver and ecuid=:idecu and acadyearid=:idanac ');
                 $reptp->execute(array('idstud'=> $studentid,'idsem'=>$idsem,'idecu'=>$idecu,'idanac'=>$idanac,'typaver'=>'MTP'));
                 $resotp = $reptp->fetch();

                 $reptpx = $bdd->prepare('SELECT exam_notes,entry_user  FROM  student_examnotes  where studentid=:idstud and semesterid=:idsem and typeof_examnotes=:typexamn and ecuid=:idecu and sessionid=:idses and acadyearid=:idanac');
                 $reptpx->execute(array('idstud'=> $studentid,'idsem'=>$idsem,'idecu'=>$idecu,'idanac'=>$idanac,'idses'=>$idses,'typexamn'=>'EXTP'));
                 $resotpx = $reptpx->fetch();





                 if ( $resotp=="") {
                     $moytps ="";
                 } else {
                     $moytps = 0.4 * $resotp['average'] + 0.6 * $resotpx['exam_notes'];
                 }





                 if($moytps==""){



                     if($resx['entry_user']=='admin'){
                         $moyenneecu=number_format((float)($moyccs),2);

                     }else{


                         $moyenneecu1=$moyccs ;
                         if($moyenneecu1 < $resx['exam_notes']){
                             $moyenneecu=number_format((float)($resx['exam_notes']),2);
                         }else{
                             $moyenneecu=number_format((float)($moyenneecu1),2);
                         }

                     }









                 }else{

                     if($resx['entry_user']=='admin'){
                         $m1=$moyccs;

                     }else{



                         $moyenneecu1=$moyccs ;
                         if($moyenneecu1 < $resx['exam_notes']){
                             $m1=$resx['exam_notes'];
                         }else{
                             $m1=$moyenneecu1;
                         }


                     }


                     if($resotpx['entry_user']=='admin'){
                         $m2=$moytps;
                     }else{





                         $moyenneecu2=$moytps ;
                         if($moyenneecu2 < $resotpx['exam_notes']){
                             $m2=$resotpx['exam_notes'];
                         }else{
                             $m2=$moyenneecu2;
                         }
                     }










                     $moyenneecu=number_format((0.6*$m1+0.4*$m2),2);


                 }






                 return $moyenneecu;














             }




         }
         else{

             if($uevalid['idsession']=='SE1')
             {


                 $rep = $bdd->prepare('SELECT average  FROM  student_averages  where studentid=:idstud and semesterid=:idsem and typeof_averages=:typaver and ecuid=:idecu and acadyearid=:idanac');
                 $rep->execute(array('idstud'=> $studentid,'idsem'=>$uevalid['idsemestre'],'idecu'=>$idecu,'idanac'=>$uevalid['idanacademie'],'typaver'=>'MCC'));
                 $reso = $rep->fetch();

                 $reposes = $bdd->prepare('SELECT exam_notes  FROM  student_examnotes  where studentid=:idstud and semesterid=:idsem and typeof_examnotes=:typexamn and ecuid=:idecu and sessionid=:idses and acadyearid=:idanac ' );
                 $reposes->execute(array('idstud'=> $studentid,'idsem'=>$uevalid['idsemestre'],'idecu'=>$idecu,'idanac'=>$uevalid['idanacademie'],'idses'=>$uevalid['idsession'],'typexamn'=>'EXCC'));
                 $resx = $reposes->fetch();



                 $moyccs = 0.4 * $reso['average'] + 0.6 * $resx['exam_notes'];





                 $reptp = $bdd->prepare('SELECT average  FROM  student_averages  where studentid=:idstud and semesterid=:idsem and typeof_averages=:typaver and ecuid=:idecu and acadyearid=:idanac ');
                 $reptp->execute(array('idstud'=> $studentid,'idsem'=>$uevalid['idsemestre'],'idecu'=>$idecu,'idanac'=>$uevalid['idanacademie'],'typaver'=>'MTP'));
                 $resotp = $reptp->fetch();

                 $reptpx = $bdd->prepare('SELECT exam_notes  FROM  student_examnotes  where studentid=:idstud and semesterid=:idsem and typeof_examnotes=:typexamn and ecuid=:idecu and sessionid=:idses and acadyearid=:idanac');
                 $reptpx->execute(array('idstud'=> $studentid,'idsem'=>$uevalid['idsemestre'],'idecu'=>$idecu,'idanac'=>$uevalid['idanacademie'],'idses'=>$uevalid['idsession'],'typexamn'=>'EXCC'));
                 $resotpx = $reptpx->fetch();






                 if ( $resotp=="") {
                     $moytps ="";
                 } else {
                     $moytps = 0.4 * $resotp['average'] + 0.6 * $resotpx['exam_notes'];
                 }








                 if ($moytps=="") {
                     $moyenneecu = number_format((float)($moyccs),2);
                 } else {
                     $moyenneecu = number_format((0.6 * $moyccs + 0.4 * $moytps), 2);
                 }




                 return $moyenneecu;

             }else{

                 $rep = $bdd->prepare('SELECT average  FROM  student_averages  where studentid=:idstud and semesterid=:idsem and typeof_averages=:typaver and ecuid=:idecu and acadyearid=:idanac');
                 $rep->execute(array('idstud'=> $studentid,'idsem'=>$uevalid['idsemestre'],'idecu'=>$idecu,'idanac'=>$uevalid['idanacademie'],'typaver'=>'MCC'));
                 $reso = $rep->fetch();

                 $reposes = $bdd->prepare('SELECT exam_notes,entry_user  FROM  student_examnotes  where studentid=:idstud and semesterid=:idsem and typeof_examnotes=:typexamn and ecuid=:idecu and sessionid=:idses and acadyearid=:idanac ' );
                 $reposes->execute(array('idstud'=> $studentid,'idsem'=>$uevalid['idsemestre'],'idecu'=>$idecu,'idanac'=>$uevalid['idanacademie'],'idses'=>$uevalid['idsession'],'typexamn'=>'EXCC'));
                 $resx = $reposes->fetch();



                 if($uevalid['idanacademie']=='2015-2016'){

                     $moyccs =  $resx['exam_notes'];

                 }else{
                     $moyccs = 0.4 * $reso['average'] + 0.6 * $resx['exam_notes'];
                 }




                 $reptp = $bdd->prepare('SELECT average  FROM  student_averages  where studentid=:idstud and semesterid=:idsem and typeof_averages=:typaver and ecuid=:idecu and acadyearid=:idanac ');
                 $reptp->execute(array('idstud'=> $studentid,'idsem'=>$uevalid['idsemestre'],'idecu'=>$idecu,'idanac'=>$uevalid['idanacademie'],'typaver'=>'MTP'));
                 $resotp = $reptp->fetch();

                 $reptpx = $bdd->prepare('SELECT exam_notes,entry_user  FROM  student_examnotes  where studentid=:idstud and semesterid=:idsem and typeof_examnotes=:typexamn and ecuid=:idecu and sessionid=:idses and acadyearid=:idanac');
                 $reptpx->execute(array('idstud'=> $studentid,'idsem'=>$uevalid['idsemestre'],'idecu'=>$idecu,'idanac'=>$uevalid['idanacademie'],'idses'=>$uevalid['idsession'],'typexamn'=>'EXTP'));
                 $resotpx = $reptpx->fetch();







                 if ( $resotp=="") {
                     $moytps ="";
                 } else {
                     $moytps = 0.4 * $resotp['average'] + 0.6 * $resotpx['exam_notes'];
                 }



                 if($moytps==""){



                     if($resx['entry_user']=='admin'){
                         $moyenneecu=number_format((float)($moyccs),2);

                     }else{


                         $moyenneecu1=$moyccs ;
                         if($moyenneecu1 < $resx['exam_notes']){

                             $moyenneecu=number_format((float)($resx['exam_notes']),2);
                         }else{
                             $moyenneecu=number_format((float)($moyenneecu1),2);
                         }

                     }









                 }else{

                     if($resx['entry_user']=='admin'){
                         $m1=$moyccs;

                     }else{



                         $moyenneecu1=$moyccs ;
                         if($moyenneecu1 < $resx['exam_notes']){
                             $m1=$resx['exam_notes'];
                         }else{
                             $m1=$moyenneecu1;
                         }


                     }


                     if($resotpx['entry_user']=='admin'){
                         $m2=$moytps;
                     }else{





                         $moyenneecu2=$moytps ;
                         if($moyenneecu2 < $resotpx['exam_notes']){
                             $m2=$resotpx['exam_notes'];
                         }else{
                             $m2=$moyenneecu2;
                         }
                     }










                     $moyenneecu=number_format((0.6*$m1+0.4*$m2),2);


                 }





                 return $moyenneecu;








             }





         }

     }




}
















function teachervalid($semesterid,$ueid,$ecuid,$idanac,$idclasse,$bdd)
{
    $tc = $bdd->prepare('SELECT DISTINCT teacherid  FROM  teach_speciality where  semesterid=:idsem and classeid=:classeid and ueid=:idue and ecuid=:idecu and acadyearid=:idanac ');
    $tc->execute(array('idsem'=>$semesterid,'idue'=>$ueid,'idecu'=>$ecuid,'idanac'=>$idanac,'classeid'=>$idclasse));
    $tcv = $tc->fetch();


    if($tcv){

        $tcn = $bdd->prepare('SELECT  firstname,lastname  FROM  siges_user where  username=:username');
        $tcn->execute(array('username'=>$tcv['teacherid']));
        $teacher = $tcn->fetch();
       $teachername=$teacher['lastname'].'  '.$teacher['firstname'];


    }else{
        $teachername="";
    }

    return $teachername;


}

function nbstudentofclass($idanac,$idspec,$idclass,$bdd)
{

    $repns=$bdd->prepare(" SELECT count(student.id)as  nbstudent FROM `student` INNER JOIN student_speciality on student.id=student_speciality.studentid WHERE student_speciality.school_classeid=:idclass and student_speciality.specialityid=:idspec and student_speciality.acadyearid=:idanac  ");
    $repns->execute(array('idanac'=> $idanac, 'idclass'=> $idclass,'idspec'=> $idspec));
    $nbstud = $repns->fetch();



    $numbstudent=$nbstud['nbstudent'];




    return $numbstudent;

}

function nbstudentofclassspec($idanac,$idspec,$idlevel,$bdd)
{

    $repns=$bdd->prepare(" SELECT count(student.id)as  nbstudent FROM `student` INNER JOIN student_speciality on student.id=student_speciality.studentid WHERE student_speciality.levelid=:idlevel and student_speciality.specialityid=:idspec and student_speciality.acadyearid=:idanac  ");
    $repns->execute(array('idanac'=> $idanac, 'idlevel'=> $idlevel,'idspec'=> $idspec));
    $nbstud = $repns->fetch();



    $numbstudentspec=$nbstud['nbstudent'];




    return $numbstudentspec;

}
function nbstudentfofclass($idanac,$idspec,$idclass,$bdd)
{

    $repns=$bdd->prepare(" SELECT count(student.id)as  nbstudent FROM `student` INNER JOIN student_speciality on student.id=student_speciality.studentid WHERE student_speciality.school_classeid=:idclass and student_speciality.specialityid=:idspec and student_speciality.acadyearid=:idanac and student.kind like '%F%' ");
    $repns->execute(array('idanac'=> $idanac, 'idclass'=> $idclass,'idspec'=> $idspec));
    $nbstudf = $repns->fetch();



    $numbstudentf=$nbstudf['nbstudent'];




    return $numbstudentf;

}

function nbstudentfofclassspec($idanac,$idspec,$idlevel,$bdd)
{

    $repns=$bdd->prepare(" SELECT count(student.id)as  nbstudent FROM `student` INNER JOIN student_speciality on student.id=student_speciality.studentid WHERE student_speciality.levelid=:levelid and student_speciality.specialityid=:idspec and student_speciality.acadyearid=:idanac and student.kind like '%F%' ");
    $repns->execute(array('idanac'=> $idanac, 'levelid'=> $idlevel,'idspec'=> $idspec));
    $nbstudf = $repns->fetch();



    $numbstudentf=$nbstudf['nbstudent'];




    return $numbstudentf;

}







function nbstudentgofclass($idanac,$idspec,$idclass,$bdd)
{

    $repns=$bdd->prepare(" SELECT count(student.id)as  nbstudent FROM `student` INNER JOIN student_speciality on student.id=student_speciality.studentid WHERE student_speciality.school_classeid=:idclass and student_speciality.specialityid=:idspec and student_speciality.acadyearid=:idanac and student.kind like '%M%' ");
    $repns->execute(array('idanac'=> $idanac, 'idclass'=> $idclass,'idspec'=> $idspec));
    $nbstudg = $repns->fetch();



    $numbstudentg=$nbstudg['nbstudent'];




    return $numbstudentg;

}

function nbstudentgofclassspec($idanac,$idspec,$idlevel,$bdd)
{

    $repns=$bdd->prepare(" SELECT count(student.id)as  nbstudent FROM `student` INNER JOIN student_speciality on student.id=student_speciality.studentid WHERE student_speciality.levelid=:levelid and student_speciality.specialityid=:idspec and student_speciality.acadyearid=:idanac and student.kind like '%M%' ");
    $repns->execute(array('idanac'=> $idanac, 'levelid'=> $idlevel,'idspec'=> $idspec));
    $nbstudg = $repns->fetch();



    $numbstudentg=$nbstudg['nbstudent'];




    return $numbstudentg;

}

function nbpresentofclass($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idclass,$bdd)
{



    $repns=$bdd->prepare("SELECT count(  DISTINCT student_averages.`studentid`) as nbpresent FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid 
WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeaver  and student_averages.average !='' and student_speciality.school_classeid=:idclasse ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'typeaver'=> $typeaver,'idclasse'=> $idclass));
    $nbpre = $repns->fetch();



    $numpresent=$nbpre['nbpresent'];




    return $numpresent;




}

function nbpresentofclassaverspec($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idlevel,$bdd)
{



    $repns=$bdd->prepare("SELECT count(  DISTINCT student_averages.`studentid`) as nbpresent FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid 
WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeaver  and student_averages.average !='' and student_speciality.levelid=:levelid ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'typeaver'=> $typeaver,'levelid'=> $idlevel));
    $nbpre = $repns->fetch();



    $numpresent=$nbpre['nbpresent'];




    return $numpresent;




}


function nbpresentofclasssem($idanac,$idspec,$idsem,$idses,$idue,$idecu,$idclass,$bdd)
{



    $repns=$bdd->prepare("SELECT count(  DISTINCT student_examnotes.`studentid`) as nbpresent FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses  and student_examnotes.exam_notes !='' and student_speciality.school_classeid=:idclasse ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'idclasse'=> $idclass));
    $nbpre = $repns->fetch();



    $numpresentsem=$nbpre['nbpresent'];




    return $numpresentsem;




}


function nbpresentofclassspec($idanac,$idspec,$idsem,$idses,$idue,$idecu,$idlevel,$bdd)
{



    $repns=$bdd->prepare("SELECT count(  DISTINCT student_examnotes.`studentid`) as nbpresent FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses  and student_examnotes.exam_notes !='' and student_speciality.levelid=:levelid ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'levelid'=> $idlevel));
    $nbpre = $repns->fetch();



    $numpresentsem=$nbpre['nbpresent'];




    return $numpresentsem;




}




function nbpresentofclassexam($idanac,$idspec,$idsem,$idses,$idue,$idecu,$typeaver,$idclass,$bdd)
{



    $repns=$bdd->prepare("SELECT count(  DISTINCT student_examnotes.`studentid`) as nbpresent FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses and student_examnotes.typeof_examnotes=:typeaver  and student_examnotes.exam_notes !='' and student_speciality.school_classeid=:idclasse ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'typeaver'=> $typeaver,'idclasse'=> $idclass));
    $nbpre = $repns->fetch();



    $numpresentsem=$nbpre['nbpresent'];




    return $numpresentsem;




}




function nbpresentofclassexamspec($idanac,$idspec,$idsem,$idses,$idue,$idecu,$typeaver,$idlevel,$bdd)
{



    $repns=$bdd->prepare("SELECT count(  DISTINCT student_examnotes.`studentid`) as nbpresent FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses and student_examnotes.typeof_examnotes=:typeaver  and student_examnotes.exam_notes !='' and student_speciality.levelid=:levelid ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'typeaver'=> $typeaver,'levelid'=> $idlevel));
    $nbpre = $repns->fetch();



    $numpresentsem=$nbpre['nbpresent'];




    return $numpresentsem;




}







function nbavergtzofclass($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idclass,$bdd)
{




    $repns=$bdd->prepare("SELECT DISTINCT student_averages.studentid FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid
WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeaver  and student_averages.average !='' and student_speciality.school_classeid=:idclasse ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'typeaver'=> $typeaver,'idclasse'=> $idclass));



    $nbgtz=0;

    while( $idstud = $repns->fetch()){





        if(averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)>=0 and averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)<8){
            $nbgtz=$nbgtz + 1;
        }









    }
    $nbstudgtz=$nbgtz;


    return $nbstudgtz;









}


function nbavergtzofclassaverspec($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idlevel,$bdd)
{




    $repns=$bdd->prepare("SELECT DISTINCT student_averages.studentid FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid
WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeaver  and student_averages.average !='' and student_speciality.levelid=:levelid ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'typeaver'=> $typeaver,'levelid'=> $idlevel));



    $nbgtz=0;

    while( $idstud = $repns->fetch()){





        if(averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)>=0 and averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)<8){
            $nbgtz=$nbgtz + 1;
        }









    }
    $nbstudgtz=$nbgtz;


    return $nbstudgtz;









}

function nbavergtzofclassexam($idanac,$idspec,$idsem,$idses,$idue,$idecu,$typeaver,$idclass,$bdd)
{



    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses and student_examnotes.typeof_examnotes=:typeaver and student_examnotes.exam_notes !='' and student_speciality.school_classeid=:idclasse  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'typeaver'=> $typeaver,'idclasse'=> $idclass));





    $nbgtz=0;

    while( $idstud = $repns->fetch()){





        if(examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)>=0 and examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)<8){
            $nbgtz=$nbgtz + 1;
        }









    }
    $nbstudgtz=$nbgtz;


    return $nbstudgtz;









}

function nbavergtzofclassexamspec($idanac,$idspec,$idsem,$idses,$idue,$idecu,$typeaver,$idlevel,$bdd)
{



    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses and student_examnotes.typeof_examnotes=:typeaver and student_examnotes.exam_notes !='' and student_speciality.levelid=:levelid  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'typeaver'=> $typeaver,'levelid'=> $idlevel));





    $nbgtz=0;

    while( $idstud = $repns->fetch()){





        if(examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)>=0 and examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)<8){
            $nbgtz=$nbgtz + 1;
        }









    }
    $nbstudgtz=$nbgtz;


    return $nbstudgtz;









}



function nbavergtzofclasssem($idanac,$idspec,$idsem,$idses,$idue,$idecu,$idclass,$bdd)
{




    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses  and student_examnotes.exam_notes !='' and student_speciality.school_classeid=:idclasse  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'idclasse'=> $idclass));



    $nbgtz=0;

    while( $idstud = $repns->fetch()){





        if(ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)>=0 and ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)<8){
            $nbgtz=$nbgtz + 1;
        }









    }
    $nbstudgtz=$nbgtz;


    return $nbstudgtz;









}

function nbavergtzofclassspec($idanac,$idspec,$idsem,$idses,$idue,$idecu,$idlevel,$bdd)
{




    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses  and student_examnotes.exam_notes !='' and student_speciality.levelid=:levelid  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'levelid'=> $idlevel));



    $nbgtz=0;

    while( $idstud = $repns->fetch()){





        if(ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)>=0 and ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)<8){
            $nbgtz=$nbgtz + 1;
        }









    }
    $nbstudgtz=$nbgtz;


    $nbstudgtz=$nbgtz;


    return $nbstudgtz;









}

function nbavergtzfofclass($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idclass,$bdd)
{




    $repns=$bdd->prepare("SELECT DISTINCT student_averages.studentid FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid
WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeaver  and student_averages.average !='' and student_speciality.school_classeid=:idclasse ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'typeaver'=> $typeaver,'idclasse'=> $idclass));



    $nbgtzf=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)>=0 and averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)<8 and $kindstud['kind']=='F'){
            $nbgtzf=$nbgtzf+ 1;
        }









    }
    $nbstudgtzf=$nbgtzf;


    return $nbstudgtzf;









}
function nbavergtzfofclassaverspec($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idlevel,$bdd)
{




    $repns=$bdd->prepare("SELECT DISTINCT student_averages.studentid FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid
WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeaver  and student_averages.average !='' and student_speciality.levelid=:levelid ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'typeaver'=> $typeaver,'levelid'=> $idlevel));



    $nbgtzf=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)>=0 and averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)<8 and $kindstud['kind']=='F'){
            $nbgtzf=$nbgtzf+ 1;
        }









    }
    $nbstudgtzf=$nbgtzf;


    return $nbstudgtzf;









}


function nbavergtzfofclassexam($idanac,$idspec,$idsem,$idses,$idue,$idecu,$typeaver,$idclass,$bdd)
{



    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses and student_examnotes.typeof_examnotes=:typeaver and student_examnotes.exam_notes !='' and student_speciality.school_classeid=:idclasse  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'typeaver'=> $typeaver,'idclasse'=> $idclass));



    $nbgtzf=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)>=0 and examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)<8 and $kindstud['kind']=='F'){
            $nbgtzf=$nbgtzf+ 1;
        }









    }
    $nbstudgtzf=$nbgtzf;


    return $nbstudgtzf;









}


function nbavergtzfofclassexamspec($idanac,$idspec,$idsem,$idses,$idue,$idecu,$typeaver,$idlevel,$bdd)
{



    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses and student_examnotes.typeof_examnotes=:typeaver and student_examnotes.exam_notes !='' and student_speciality.levelid=:levelid  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'typeaver'=> $typeaver,'levelid'=> $idlevel));



    $nbgtzf=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)>=0 and examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)<8 and $kindstud['kind']=='F'){
            $nbgtzf=$nbgtzf+ 1;
        }









    }
    $nbstudgtzf=$nbgtzf;


    return $nbstudgtzf;









}





function nbavergtzfofclasssem($idanac,$idspec,$idsem,$idses,$idue,$idecu,$idclass,$bdd)
{





    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses  and student_examnotes.exam_notes !='' and student_speciality.school_classeid=:idclasse  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'idclasse'=> $idclass));



    $nbgtzf=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)>=0 and ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)<8 and $kindstud['kind']=='F'){
            $nbgtzf=$nbgtzf+ 1;
        }









    }
    $nbstudgtzf=$nbgtzf;


    return $nbstudgtzf;









}


function nbavergtzfofclassspec($idanac,$idspec,$idsem,$idses,$idue,$idecu,$idlevel,$bdd)
{





    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses  and student_examnotes.exam_notes !='' and student_speciality.levelid=:levelid  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'levelid'=> $idlevel));



    $nbgtzf=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)>=0 and ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)<8 and $kindstud['kind']=='F'){
            $nbgtzf=$nbgtzf+ 1;
        }









    }
    $nbstudgtzf=$nbgtzf;


    return $nbstudgtzf;









}








function nbavergtzgofclass($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idclass,$bdd)
{




    $repns=$bdd->prepare("SELECT DISTINCT student_averages.studentid FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid
WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeaver  and student_averages.average !='' and student_speciality.school_classeid=:idclasse ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'typeaver'=> $typeaver,'idclasse'=> $idclass));



    $nbgtzg=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)>=0 and averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)<8 and $kindstud['kind']=='M'){
            $nbgtzg=$nbgtzg+ 1;
        }









    }
    $nbstudgtzg=$nbgtzg;


    return $nbstudgtzg;









}
function nbavergtzgofclassaverspec($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idlevel,$bdd)
{




    $repns=$bdd->prepare("SELECT DISTINCT student_averages.studentid FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid
WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeaver  and student_averages.average !='' and student_speciality.levelid=:levelid ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'typeaver'=> $typeaver,'levelid'=> $idlevel));



    $nbgtzg=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)>=0 and averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)<8 and $kindstud['kind']=='M'){
            $nbgtzg=$nbgtzg+ 1;
        }









    }
    $nbstudgtzg=$nbgtzg;


    return $nbstudgtzg;









}

function nbavergtzgofclassexam($idanac,$idspec,$idsem,$idses,$idue,$idecu,$typeaver,$idclass,$bdd)
{



    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses and student_examnotes.typeof_examnotes=:typeaver and student_examnotes.exam_notes !='' and student_speciality.school_classeid=:idclasse  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'typeaver'=> $typeaver,'idclasse'=> $idclass));



    $nbgtzg=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)>=0 and examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)<8 and $kindstud['kind']=='M'){
            $nbgtzg=$nbgtzg+ 1;
        }









    }
    $nbstudgtzg=$nbgtzg;


    return $nbstudgtzg;









}


function nbavergtzgofclassexamspec($idanac,$idspec,$idsem,$idses,$idue,$idecu,$typeaver,$idlevel,$bdd)
{



    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses and student_examnotes.typeof_examnotes=:typeaver and student_examnotes.exam_notes !='' and student_speciality.levelid=:levelid  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'typeaver'=> $typeaver,'levelid'=> $idlevel));



    $nbgtzg=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)>=0 and examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)<8 and $kindstud['kind']=='M'){
            $nbgtzg=$nbgtzg+ 1;
        }









    }
    $nbstudgtzg=$nbgtzg;


    return $nbstudgtzg;









}


function nbavergtzgofclasssem($idanac,$idspec,$idsem,$idses,$idue,$idecu,$idclass,$bdd)
{





    $repns=$bdd->prepare("SELECT  DISTINCT student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses  and student_examnotes.exam_notes !='' and student_speciality.school_classeid=:idclasse  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'idclasse'=> $idclass));



    $nbgtzg=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)>=0 and ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)<8 and $kindstud['kind']=='M'){
            $nbgtzg=$nbgtzg+ 1;
        }









    }
    $nbstudgtzg=$nbgtzg;


    return $nbstudgtzg;









}

function nbavergtzgofclassspec($idanac,$idspec,$idsem,$idses,$idue,$idecu,$idlevel,$bdd)
{





    $repns=$bdd->prepare("SELECT  DISTINCT student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses  and student_examnotes.exam_notes !='' and student_speciality.levelid=:levelid  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'levelid'=> $idlevel));



    $nbgtzg=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)>=0 and ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)<8 and $kindstud['kind']=='M'){
            $nbgtzg=$nbgtzg+ 1;
        }









    }
    $nbstudgtzg=$nbgtzg;


    return $nbstudgtzg;









}





function nbaverlttofclass($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idclass,$bdd)
{




    $repns=$bdd->prepare("SELECT DISTINCT student_averages.studentid FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid
WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeaver  and student_averages.average !='' and student_speciality.school_classeid=:idclasse ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'typeaver'=> $typeaver,'idclasse'=> $idclass));



    $nbltt=0;

    while( $idstud = $repns->fetch()){





        if(averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)>=8 and averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)<10){
            $nbltt=$nbltt + 1;
        }









    }
    $nbstudltt=$nbltt;


    return $nbstudltt;









}

function nbaverlttofclassaverspec($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idlevel,$bdd)
{




    $repns=$bdd->prepare("SELECT DISTINCT student_averages.studentid FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid
WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeaver  and student_averages.average !='' and student_speciality.levelid=:levelid ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'typeaver'=> $typeaver,'levelid'=> $idlevel));



    $nbltt=0;

    while( $idstud = $repns->fetch()){





        if(averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)>=8 and averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)<10){
            $nbltt=$nbltt + 1;
        }









    }
    $nbstudltt=$nbltt;


    return $nbstudltt;









}


function nbaverlttofclassexam($idanac,$idspec,$idsem,$idses,$idue,$idecu,$typeaver,$idclass,$bdd)
{


    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses and student_examnotes.typeof_examnotes=:typeaver and student_examnotes.exam_notes !='' and student_speciality.school_classeid=:idclasse  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'typeaver'=> $typeaver,'idclasse'=> $idclass));



    $nbltt=0;

    while( $idstud = $repns->fetch()){





        if(examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)>=8 and examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)<10){
            $nbltt=$nbltt + 1;
        }









    }
    $nbstudltt=$nbltt;


    return $nbstudltt;









}


function nbaverlttofclassexamspec($idanac,$idspec,$idsem,$idses,$idue,$idecu,$typeaver,$idlevel,$bdd)
{


    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses and student_examnotes.typeof_examnotes=:typeaver and student_examnotes.exam_notes !='' and student_speciality.levelid=:levelid  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'typeaver'=> $typeaver,'levelid'=> $idlevel));



    $nbltt=0;

    while( $idstud = $repns->fetch()){





        if(examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)>=8 and examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)<10){
            $nbltt=$nbltt + 1;
        }









    }
    $nbstudltt=$nbltt;


    return $nbstudltt;









}








function nbaverlttofclasssem($idanac,$idspec,$idsem,$idses,$idue,$idecu,$idclass,$bdd)
{




    $repns=$bdd->prepare("SELECT  DISTINCT student_examnotes.`studentid` FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses  and student_examnotes.exam_notes !='' and student_speciality.school_classeid=:idclasse  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'idclasse'=> $idclass));



    $nbltt=0;

    while( $idstud = $repns->fetch()){





        if(ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)>=8 and ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)<10){
            $nbltt=$nbltt + 1;
        }









    }
    $nbstudltt=$nbltt;


    return $nbstudltt;









}

function nbaverlttofclassspec($idanac,$idspec,$idsem,$idses,$idue,$idecu,$idlevel,$bdd)
{




    $repns=$bdd->prepare("SELECT  DISTINCT student_examnotes.`studentid` FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses  and student_examnotes.exam_notes !='' and student_speciality.levelid=:levelid  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'levelid'=> $idlevel));



    $nbltt=0;

    while( $idstud = $repns->fetch()){





        if(ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)>=8 and ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)<10){
            $nbltt=$nbltt + 1;
        }









    }
    $nbstudltt=$nbltt;


    return $nbstudltt;









}

function nbaverlttfofclass($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idclass,$bdd)
{




    $repns=$bdd->prepare("SELECT DISTINCT student_averages.studentid FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid
WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeaver  and student_averages.average !='' and student_speciality.school_classeid=:idclasse ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'typeaver'=> $typeaver,'idclasse'=> $idclass));



    $nblttf=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)>=8 and averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)<10 and $kindstud['kind']=='F'){
            $nblttf=$nblttf+ 1;
        }









    }
    $nbstudlttf=$nblttf;


    return $nbstudlttf;









}


function nbaverlttfofclassaverspec($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idlevel,$bdd)
{




    $repns=$bdd->prepare("SELECT DISTINCT student_averages.studentid FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid
WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeaver  and student_averages.average !='' and student_speciality.levelid=:levelid ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'typeaver'=> $typeaver,'levelid'=> $idlevel));



    $nblttf=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)>=8 and averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)<10 and $kindstud['kind']=='F'){
            $nblttf=$nblttf+ 1;
        }









    }
    $nbstudlttf=$nblttf;


    return $nbstudlttf;









}




function nbaverlttfofclassexam($idanac,$idspec,$idsem,$idses,$idue,$idecu,$typeaver,$idclass,$bdd)
{



    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses and student_examnotes.typeof_examnotes=:typeaver and student_examnotes.exam_notes !='' and student_speciality.school_classeid=:idclasse  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'typeaver'=> $typeaver,'idclasse'=> $idclass));




    $nblttf=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)>=8 and examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)<10 and $kindstud['kind']=='F'){
            $nblttf=$nblttf+ 1;
        }









    }
    $nbstudlttf=$nblttf;


    return $nbstudlttf;









}




function nbaverlttfofclassexamspec($idanac,$idspec,$idsem,$idses,$idue,$idecu,$typeaver,$idlevel,$bdd)
{



    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses and student_examnotes.typeof_examnotes=:typeaver and student_examnotes.exam_notes !='' and student_speciality.levelid=:levelid  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'typeaver'=> $typeaver,'levelid'=> $idlevel));




    $nblttf=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)>=8 and examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)<10 and $kindstud['kind']=='F'){
            $nblttf=$nblttf+ 1;
        }









    }
    $nbstudlttf=$nblttf;


    return $nbstudlttf;









}






function nbaverlttfofclasssem($idanac,$idspec,$idsem,$idses,$idue,$idecu,$idclass,$bdd)
{




    $repns=$bdd->prepare("SELECT  DISTINCT student_examnotes.`studentid` FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses  and student_examnotes.exam_notes !='' and student_speciality.school_classeid=:idclasse  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'idclasse'=> $idclass));


    $nblttf=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)>=8 and ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)<10 and $kindstud['kind']=='F'){
            $nblttf=$nblttf+ 1;
        }









    }
    $nbstudlttf=$nblttf;


    return $nbstudlttf;









}

function nbaverlttfofclassspec($idanac,$idspec,$idsem,$idses,$idue,$idecu,$idlevel,$bdd)
{




    $repns=$bdd->prepare("SELECT  DISTINCT student_examnotes.`studentid` FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses  and student_examnotes.exam_notes !='' and student_speciality.levelid=:levelid  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'levelid'=> $idlevel));


    $nblttf=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)>=8 and ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)<10 and $kindstud['kind']=='F'){
            $nblttf=$nblttf+ 1;
        }









    }
    $nbstudlttf=$nblttf;


    return $nbstudlttf;









}


function nbaverlttgofclass($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idclass,$bdd)
{




    $repns=$bdd->prepare("SELECT DISTINCT student_averages.studentid FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid
WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeaver  and student_averages.average !='' and student_speciality.school_classeid=:idclasse ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'typeaver'=> $typeaver,'idclasse'=> $idclass));



    $nblttg=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)>=8 and averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)<10 and $kindstud['kind']=='M'){
            $nblttg=$nblttg+ 1;
        }









    }
    $nbstudlttg=$nblttg;


    return $nbstudlttg;









}



function nbaverlttgofclassaverspec($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idlevel,$bdd)
{




    $repns=$bdd->prepare("SELECT DISTINCT student_averages.studentid FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid
WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeaver  and student_averages.average !='' and student_speciality.levelid=:levelid ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'typeaver'=> $typeaver,'levelid'=> $idlevel));



    $nblttg=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)>=8 and averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)<10 and $kindstud['kind']=='M'){
            $nblttg=$nblttg+ 1;
        }









    }
    $nbstudlttg=$nblttg;


    return $nbstudlttg;









}


function nbaverlttgofclassexam($idanac,$idspec,$idsem,$idses,$idue,$idecu,$typeaver,$idclass,$bdd)
{



    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses and student_examnotes.typeof_examnotes=:typeaver and student_examnotes.exam_notes !='' and student_speciality.school_classeid=:idclasse  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'typeaver'=> $typeaver,'idclasse'=> $idclass));


    $nblttg=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)>=8 and examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)<10 and $kindstud['kind']=='M'){
            $nblttg=$nblttg+ 1;
        }









    }
    $nbstudlttg=$nblttg;


    return $nbstudlttg;









}


function nbaverlttgofclassexamspec($idanac,$idspec,$idsem,$idses,$idue,$idecu,$typeaver,$idlevel,$bdd)
{



    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses and student_examnotes.typeof_examnotes=:typeaver and student_examnotes.exam_notes !='' and student_speciality.levelid=:levelid  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'typeaver'=> $typeaver,'levelid'=> $idlevel));


    $nblttg=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)>=8 and examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)<10 and $kindstud['kind']=='M'){
            $nblttg=$nblttg+ 1;
        }









    }
    $nbstudlttg=$nblttg;


    return $nbstudlttg;









}






function nbaverlttgofclasssem($idanac,$idspec,$idsem,$idses,$idue,$idecu,$idclass,$bdd)
{






    $repns=$bdd->prepare("SELECT  DISTINCT student_examnotes.`studentid` FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses  and student_examnotes.exam_notes !='' and student_speciality.school_classeid=:idclasse  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'idclasse'=> $idclass));


    $nblttg=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)>=8 and ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)<10 and $kindstud['kind']=='M'){
            $nblttg=$nblttg+ 1;
        }









    }
    $nbstudlttg=$nblttg;


    return $nbstudlttg;









}

function nbaverlttgofclassspec($idanac,$idspec,$idsem,$idses,$idue,$idecu,$idlevel,$bdd)
{






    $repns=$bdd->prepare("SELECT  DISTINCT student_examnotes.`studentid` FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses  and student_examnotes.exam_notes !='' and student_speciality.levelid=:levelid  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'levelid'=> $idlevel));


    $nblttg=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)>=8 and ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)<10 and $kindstud['kind']=='M'){
            $nblttg=$nblttg+ 1;
        }









    }
    $nbstudlttg=$nblttg;


    return $nbstudlttg;









}

function nbavergttofclass($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idclass,$bdd)
{




    $repns=$bdd->prepare("SELECT DISTINCT student_averages.studentid FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid
WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeaver  and student_averages.average !='' and student_speciality.school_classeid=:idclasse ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'typeaver'=> $typeaver,'idclasse'=> $idclass));



    $nbgtt=0;

    while( $idstud = $repns->fetch()){





        if(averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)>=10){
            $nbgtt=$nbgtt + 1;
        }









    }
    $nbstudgtt=$nbgtt;


    return $nbstudgtt;









}

function nbavergttofclassaverspec($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idlevel,$bdd)
{




    $repns=$bdd->prepare("SELECT DISTINCT student_averages.studentid FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid
WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeaver  and student_averages.average !='' and student_speciality.levelid=:levelid ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'typeaver'=> $typeaver,'levelid'=> $idlevel));



    $nbgtt=0;

    while( $idstud = $repns->fetch()){





        if(averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)>=10){
            $nbgtt=$nbgtt + 1;
        }









    }
    $nbstudgtt=$nbgtt;


    return $nbstudgtt;









}

function nbavergttofclassexam($idanac,$idspec,$idsem,$idses,$idue,$idecu,$typeaver,$idclass,$bdd)
{



    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses and student_examnotes.typeof_examnotes=:typeaver and student_examnotes.exam_notes !='' and student_speciality.school_classeid=:idclasse  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'typeaver'=> $typeaver,'idclasse'=> $idclass));


    $nbgtt=0;

    while( $idstud = $repns->fetch()){





        if(examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)>=10){
            $nbgtt=$nbgtt + 1;
        }









    }
    $nbstudgtt=$nbgtt;


    return $nbstudgtt;









}

function nbavergttofclassexamspec($idanac,$idspec,$idsem,$idses,$idue,$idecu,$typeaver,$idlevel,$bdd)
{



    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses and student_examnotes.typeof_examnotes=:typeaver and student_examnotes.exam_notes !='' and student_speciality.levelid=:levelid  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'typeaver'=> $typeaver,'levelid'=> $idlevel));


    $nbgtt=0;

    while( $idstud = $repns->fetch()){





        if(examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)>=10){
            $nbgtt=$nbgtt + 1;
        }









    }
    $nbstudgtt=$nbgtt;


    return $nbstudgtt;









}


function nbavergttofclasssem($idanac,$idspec,$idsem,$idses,$idue,$idecu,$idclass,$bdd)
{




    $repns=$bdd->prepare("SELECT  DISTINCT student_examnotes.`studentid` FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses  and student_examnotes.exam_notes !='' and student_speciality.school_classeid=:idclasse  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'idclasse'=> $idclass));



    $nbgtt=0;

    while( $idstud = $repns->fetch()){





        if(ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)>=10){
            $nbgtt=$nbgtt + 1;
        }









    }
    $nbstudgtt=$nbgtt;


    return $nbstudgtt;









}

function nbavergttofclassspec($idanac,$idspec,$idsem,$idses,$idue,$idecu,$idlevel,$bdd)
{




    $repns=$bdd->prepare("SELECT  DISTINCT student_examnotes.`studentid` FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses  and student_examnotes.exam_notes !='' and student_speciality.levelid=:levelid  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'levelid'=> $idlevel));



    $nbgtt=0;

    while( $idstud = $repns->fetch()){





        if(ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)>=10){
            $nbgtt=$nbgtt + 1;
        }









    }
    $nbstudgtt=$nbgtt;


    return $nbstudgtt;









}




function nbavergttfofclass($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idclass,$bdd)
{




    $repns=$bdd->prepare("SELECT DISTINCT student_averages.studentid FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid
WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeaver  and student_averages.average !='' and student_speciality.school_classeid=:idclasse ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'typeaver'=> $typeaver,'idclasse'=> $idclass));



    $nbgttf=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)>=10 and $kindstud['kind']=='F'){
            $nbgttf=$nbgttf+ 1;
        }









    }
    $nbstudgttf=$nbgttf;


    return $nbstudgttf;









}

function nbavergttfofclassaverspec($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idlevel,$bdd)
{




    $repns=$bdd->prepare("SELECT DISTINCT student_averages.studentid FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid
WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeaver  and student_averages.average !='' and student_speciality.levelid=:levelid ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'typeaver'=> $typeaver,'levelid'=> $idlevel));



    $nbgttf=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)>=10 and $kindstud['kind']=='F'){
            $nbgttf=$nbgttf+ 1;
        }









    }
    $nbstudgttf=$nbgttf;


    return $nbstudgttf;









}

function nbavergttfofclassexam($idanac,$idspec,$idsem,$idses,$idue,$idecu,$typeaver,$idclass,$bdd)
{



    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses and student_examnotes.typeof_examnotes=:typeaver and student_examnotes.exam_notes !='' and student_speciality.school_classeid=:idclasse  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'typeaver'=> $typeaver,'idclasse'=> $idclass));



    $nbgttf=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)>=10 and $kindstud['kind']=='F'){
            $nbgttf=$nbgttf+ 1;
        }









    }
    $nbstudgttf=$nbgttf;


    return $nbstudgttf;









}

function nbavergttfofclassexamspec($idanac,$idspec,$idsem,$idses,$idue,$idecu,$typeaver,$idlevel,$bdd)
{



    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses and student_examnotes.typeof_examnotes=:typeaver and student_examnotes.exam_notes !='' and student_speciality.levelid=:levelid  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'typeaver'=> $typeaver,'levelid'=> $idlevel));



    $nbgttf=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)>=10 and $kindstud['kind']=='F'){
            $nbgttf=$nbgttf+ 1;
        }









    }
    $nbstudgttf=$nbgttf;


    return $nbstudgttf;









}







function nbavergttfofclasssem($idanac,$idspec,$idsem,$idses,$idue,$idecu,$idclass,$bdd)
{




    $repns=$bdd->prepare("SELECT  DISTINCT student_examnotes.`studentid` FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses  and student_examnotes.exam_notes !='' and student_speciality.school_classeid=:idclasse  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'idclasse'=> $idclass));




    $nbgttf=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)>=10 and $kindstud['kind']=='F'){
            $nbgttf=$nbgttf+ 1;
        }









    }
    $nbstudgttf=$nbgttf;


    return $nbstudgttf;









}

function nbavergttfofclassspec($idanac,$idspec,$idsem,$idses,$idue,$idecu,$idlevel,$bdd)
{




    $repns=$bdd->prepare("SELECT  DISTINCT student_examnotes.`studentid` FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses  and student_examnotes.exam_notes !='' and student_speciality.levelid=:levelid  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'levelid'=> $idlevel));




    $nbgttf=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)>=10 and $kindstud['kind']=='F'){
            $nbgttf=$nbgttf+ 1;
        }









    }
    $nbstudgttf=$nbgttf;


    return $nbstudgttf;









}


function nbavergttgofclass($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idclass,$bdd)
{




    $repns=$bdd->prepare("SELECT DISTINCT student_averages.studentid FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid
WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeaver  and student_averages.average !='' and student_speciality.school_classeid=:idclasse ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'typeaver'=> $typeaver,'idclasse'=> $idclass));



    $nbgttg=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)>=10 and $kindstud['kind']=='M'){
            $nbgttg=$nbgttg+ 1;
        }









    }
    $nbstudgttg=$nbgttg;


    return $nbstudgttg;









}


function nbavergttgofclassaverspec($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idlevel,$bdd)
{




    $repns=$bdd->prepare("SELECT DISTINCT student_averages.studentid FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid
WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeaver  and student_averages.average !='' and student_speciality.levelid=:levelid ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'typeaver'=> $typeaver,'levelid'=> $idlevel));



    $nbgttg=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)>=10 and $kindstud['kind']=='M'){
            $nbgttg=$nbgttg+ 1;
        }









    }
    $nbstudgttg=$nbgttg;


    return $nbstudgttg;









}


function nbavergttgofclassexam($idanac,$idspec,$idsem,$idses,$idue,$idecu,$typeaver,$idclass,$bdd)
{




    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses and student_examnotes.typeof_examnotes=:typeaver and student_examnotes.exam_notes !='' and student_speciality.school_classeid=:idclasse  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'typeaver'=> $typeaver,'idclasse'=> $idclass));



    $nbgttg=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)>=10 and $kindstud['kind']=='M'){
            $nbgttg=$nbgttg+ 1;
        }









    }
    $nbstudgttg=$nbgttg;


    return $nbstudgttg;









}


function nbavergttgofclassexamspec($idanac,$idspec,$idsem,$idses,$idue,$idecu,$typeaver,$idlevel,$bdd)
{




    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses and student_examnotes.typeof_examnotes=:typeaver and student_examnotes.exam_notes !='' and student_speciality.levelid=:levelid  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'typeaver'=> $typeaver,'levelid'=> $idlevel));



    $nbgttg=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)>=10 and $kindstud['kind']=='M'){
            $nbgttg=$nbgttg+ 1;
        }









    }
    $nbstudgttg=$nbgttg;


    return $nbstudgttg;









}


function nbavergttgofclasssem($idanac,$idspec,$idsem,$idses,$idue,$idecu,$idclass,$bdd)
{





    $repns=$bdd->prepare("SELECT  DISTINCT student_examnotes.`studentid` FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses  and student_examnotes.exam_notes !='' and student_speciality.school_classeid=:idclasse  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'idclasse'=> $idclass));



    $nbgttg=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)>=10 and $kindstud['kind']=='M'){
            $nbgttg=$nbgttg+ 1;
        }









    }
    $nbstudgttg=$nbgttg;


    return $nbstudgttg;









}

function nbavergttgofclassspec($idanac,$idspec,$idsem,$idses,$idue,$idecu,$idlevel,$bdd)
{





    $repns=$bdd->prepare("SELECT  DISTINCT student_examnotes.`studentid` FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses  and student_examnotes.exam_notes !='' and student_speciality.levelid=:levelid  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'levelid'=> $idlevel));



    $nbgttg=0;

    while( $idstud = $repns->fetch()){


        $repnse=$bdd->prepare("SELECT kind FROM `student` WHERE  id=:id");
        $repnse->execute(array('id'=>$idstud['studentid']));
        $kindstud = $repnse->fetch();




        if(ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)>=10 and $kindstud['kind']=='M'){
            $nbgttg=$nbgttg+ 1;
        }









    }
    $nbstudgttg=$nbgttg;


    return $nbstudgttg;









}



function averageofclass($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idclass,$bdd)
{




    $repns=$bdd->prepare("SELECT DISTINCT student_averages.studentid FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid
WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeaver  and student_averages.average !='' and student_speciality.school_classeid=:idclasse ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'typeaver'=> $typeaver,'idclasse'=> $idclass));






    $nbstudclass=0;
    $averclass=0;

    while( $idstud = $repns->fetch()){


        $nbstudclass=$nbstudclass + 1;

        $avercl=averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd);
        $averclass=$averclass + $avercl;



    }
    $numstdclass=$nbstudclass;
    $averofclass=$averclass;

    $averageofclass=number_format(($averofclass/$numstdclass),2);

    return $averageofclass ;














}




function averageofclassaverspec($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idlevel,$bdd)
{




    $repns=$bdd->prepare("SELECT DISTINCT student_averages.studentid FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid
WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeaver  and student_averages.average !='' and student_speciality.levelid=:levelid ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'typeaver'=> $typeaver,'levelid'=> $idlevel));






    $nbstudclass=0;
    $averclass=0;

    while( $idstud = $repns->fetch()){


        $nbstudclass=$nbstudclass + 1;

        $avercl=averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd);
        $averclass=$averclass + $avercl;



    }
    $numstdclass=$nbstudclass;
    $averofclass=$averclass;

    $averageofclass=number_format(($averofclass/$numstdclass),2);

    return $averageofclass ;














}






function averageofclassexam($idanac,$idspec,$idsem,$idses,$idue,$idecu,$typeaver,$idclass,$bdd)
{



    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses and student_examnotes.typeof_examnotes=:typeaver and student_examnotes.exam_notes !='' and student_speciality.school_classeid=:idclasse  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'typeaver'=> $typeaver,'idclasse'=> $idclass));





    $nbstudclass=0;
    $averclass=0;

    while( $idstud = $repns->fetch()){


        $nbstudclass=$nbstudclass + 1;

        $avercl=examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd);
        $averclass=$averclass + $avercl;



    }
    $numstdclass=$nbstudclass;
    $averofclass=$averclass;

    $averageofclass=number_format(($averofclass/$numstdclass),2);

    return $averageofclass ;














}

function averageofclassexamspec($idanac,$idspec,$idsem,$idses,$idue,$idecu,$typeaver,$idlevel,$bdd)
{



    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses and student_examnotes.typeof_examnotes=:typeaver and student_examnotes.exam_notes !='' and student_speciality.levelid=:levelid  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'typeaver'=> $typeaver,'levelid'=> $idlevel));





    $nbstudclass=0;
    $averclass=0;

    while( $idstud = $repns->fetch()){


        $nbstudclass=$nbstudclass + 1;

        $avercl=examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd);
        $averclass=$averclass + $avercl;



    }
    $numstdclass=$nbstudclass;
    $averofclass=$averclass;

    $averageofclass=number_format(($averofclass/$numstdclass),2);

    return $averageofclass ;














}


function averageofclasssem($idanac,$idspec,$idsem,$idses,$idue,$idecu,$idclass,$bdd)
{




    $repns=$bdd->prepare("SELECT  DISTINCT student_examnotes.`studentid` FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses  and student_examnotes.exam_notes !='' and student_speciality.school_classeid=:idclasse  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'idclasse'=> $idclass));






    $nbstudclass=0;
    $averclass=0;

    while( $idstud = $repns->fetch()){


        $nbstudclass=$nbstudclass + 1;

        $avercl=ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd);
        $averclass=$averclass + $avercl;



    }
    $numstdclass=$nbstudclass;
    $averofclass=$averclass;

   $averageofclass=number_format(($averofclass/$numstdclass),2);

    return $averageofclass;














}


function averageofclassspec($idanac,$idspec,$idsem,$idses,$idue,$idecu,$idlevel,$bdd)
{




    $repns=$bdd->prepare("SELECT  DISTINCT student_examnotes.`studentid` FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses  and student_examnotes.exam_notes !='' and student_speciality.levelid=:levelid  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'levelid'=> $idlevel));






    $nbstudclass=0;
    $averclass=0;

    while( $idstud = $repns->fetch()){


        $nbstudclass=$nbstudclass + 1;

        $avercl=ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd);
        $averclass=$averclass + $avercl;



    }
    $numstdclass=$nbstudclass;
    $averofclass=$averclass;

    $averageofclass=number_format(($averofclass/$numstdclass),2);

    return $averageofclass;














}




function averagemaxofclass($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idclass,$bdd)
{



    $repns=$bdd->prepare("SELECT DISTINCT student_averages.studentid FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid
WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeaver  and student_averages.average !='' and student_speciality.school_classeid=:idclasse ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'typeaver'=> $typeaver,'idclasse'=> $idclass));






    $avermax=0;

    while( $idstud = $repns->fetch()){







            if(averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)>=$avermax){
                $avermax=averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd);
            }









        }
        $maxaverage=$avermax;


        return $maxaverage;
















    }

function averagemaxofclassaverspec($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idlevel,$bdd)
{



    $repns=$bdd->prepare("SELECT DISTINCT student_averages.studentid FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid
WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeaver  and student_averages.average !='' and student_speciality.levelid=:levelid ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'typeaver'=> $typeaver,'levelid'=> $idlevel));






    $avermax=0;

    while( $idstud = $repns->fetch()){







        if(averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)>=$avermax){
            $avermax=averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd);
        }









    }
    $maxaverage=$avermax;


    return $maxaverage;
















}

function averagemaxofclassexam($idanac,$idspec,$idsem,$idses,$idue,$idecu,$typeaver,$idclass,$bdd)
{



    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses and student_examnotes.typeof_examnotes=:typeaver and student_examnotes.exam_notes !='' and student_speciality.school_classeid=:idclasse  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'typeaver'=> $typeaver,'idclasse'=> $idclass));






    $avermax=0;

    while( $idstud = $repns->fetch()){







        if(examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)>=$avermax){
            $avermax=examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd);
        }









    }
    $maxaverage=$avermax;


    return $maxaverage;
















}

function averagemaxofclassexamspec($idanac,$idspec,$idsem,$idses,$idue,$idecu,$typeaver,$idlevel,$bdd)
{



    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses and student_examnotes.typeof_examnotes=:typeaver and student_examnotes.exam_notes !='' and student_speciality.levelid=:levelid  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'typeaver'=> $typeaver,'levelid'=> $idlevel));






    $avermax=0;

    while( $idstud = $repns->fetch()){







        if(examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)>=$avermax){
            $avermax=examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd);
        }









    }
    $maxaverage=$avermax;


    return $maxaverage;
















}





function averagemaxofclasssem($idanac,$idspec,$idsem,$idses,$idue,$idecu,$idclass,$bdd)
{


    $repns=$bdd->prepare("SELECT  DISTINCT student_examnotes.`studentid` FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses  and student_examnotes.exam_notes !='' and student_speciality.school_classeid=:idclasse  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'idclasse'=> $idclass));






    $avermax=0;

    while( $idstud = $repns->fetch()){







        if(ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)>=$avermax){
            $avermax=ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd);
        }









    }
    $maxaverage=$avermax;


    return $maxaverage;
















}



function averagemaxofclassspec($idanac,$idspec,$idsem,$idses,$idue,$idecu,$idlevel,$bdd)
{


    $repns=$bdd->prepare("SELECT  DISTINCT student_examnotes.`studentid` FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses  and student_examnotes.exam_notes !='' and student_speciality.levelid=:levelid  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'levelid'=> $idlevel));






    $avermax=0;

    while( $idstud = $repns->fetch()){







        if(ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)>=$avermax){
            $avermax=ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd);
        }









    }
    $maxaverage=$avermax;


    return $maxaverage;
















}

function averageminofclass($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idclass,$bdd)
{



    $repns=$bdd->prepare("SELECT DISTINCT student_averages.studentid FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid
WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeaver  and student_averages.average !='' and student_speciality.school_classeid=:idclasse ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'typeaver'=> $typeaver,'idclasse'=> $idclass));






    $avermin=21;

    while( $idstud = $repns->fetch()){







        if(averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)<=$avermin){
            $avermin=averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd);
        }









    }
    $minaverage=$avermin;


    return $minaverage;
















}


function averageminofclassaverspec($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idlevel,$bdd)
{



    $repns=$bdd->prepare("SELECT DISTINCT student_averages.studentid FROM `student_averages` INNER JOIN student_speciality on student_speciality.studentid=student_averages.studentid
WHERE  student_averages.acadyearid=:acadyearid and student_averages.specialityid=:specialityid and student_averages.semesterid=:semesterid and  student_averages.ueid=:ueid and student_averages.ecuid=:ecuid and student_averages.typeof_averages=:typeaver  and student_averages.average !='' and student_speciality.levelid=:levelid ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'typeaver'=> $typeaver,'levelid'=> $idlevel));






    $avermin=21;

    while( $idstud = $repns->fetch()){







        if(averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd)<=$avermin){
            $avermin=averages($idstud['studentid'],$idsem,$idue,$idecu,$idanac,$typeaver,$bdd);
        }









    }
    $minaverage=$avermin;


    return $minaverage;
















}



function averageminofclassexam($idanac,$idspec,$idsem,$idses,$idue,$idecu,$typeaver,$idclass,$bdd)
{



    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses and student_examnotes.typeof_examnotes=:typeaver and student_examnotes.exam_notes !='' and student_speciality.school_classeid=:idclasse  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'typeaver'=> $typeaver,'idclasse'=> $idclass));





    $avermin=21;

    while( $idstud = $repns->fetch()){







        if(examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)<=$avermin){
            $avermin=examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd);
        }









    }
    $minaverage=$avermin;


    return $minaverage;
















}


function averageminofclassexamspec($idanac,$idspec,$idsem,$idses,$idue,$idecu,$typeaver,$idlevel,$bdd)
{



    $repns=$bdd->prepare("SELECT DISTINCT  student_examnotes.`studentid`  FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses and student_examnotes.typeof_examnotes=:typeaver and student_examnotes.exam_notes !='' and student_speciality.levelid=:levelid  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'typeaver'=> $typeaver,'levelid'=> $idlevel));





    $avermin=21;

    while( $idstud = $repns->fetch()){







        if(examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd)<=$avermin){
            $avermin=examnotes($idstud['studentid'],$idsem,$idses,$idue,$idecu,$idanac,$typeaver,$bdd);
        }









    }
    $minaverage=$avermin;


    return $minaverage;
















}





function averageminofclasssem($idanac,$idspec,$idsem,$idses,$idue,$idecu,$idclass,$bdd)
{


    $repns=$bdd->prepare("SELECT  DISTINCT student_examnotes.`studentid` FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses  and student_examnotes.exam_notes !='' and student_speciality.school_classeid=:idclasse  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'idclasse'=> $idclass));






    $avermin=21;

    while( $idstud = $repns->fetch()){







        if(ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)<=$avermin){
            $avermin=ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd);
        }









    }
    $minaverage=$avermin;


    return $minaverage;
















}


function averageminofclassspec($idanac,$idspec,$idsem,$idses,$idue,$idecu,$idlevel,$bdd)
{


    $repns=$bdd->prepare("SELECT  DISTINCT student_examnotes.`studentid` FROM `student_examnotes` INNER JOIN student_speciality on student_speciality.studentid=student_examnotes.studentid 
WHERE  student_examnotes.acadyearid=:acadyearid and student_examnotes.specialityid=:specialityid and student_examnotes.semesterid=:semesterid and  student_examnotes.ueid=:ueid and student_examnotes.ecuid=:ecuid and student_examnotes.sessionid=:idses  and student_examnotes.exam_notes !='' and student_speciality.levelid=:levelid  ");
    $repns->execute(array('acadyearid'=> $idanac, 'semesterid'=> $idsem,'specialityid'=> $idspec,'ueid'=> $idue,'ecuid'=> $idecu,'idses'=> $idses,'levelid'=> $idlevel));






    $avermin=21;

    while( $idstud = $repns->fetch()){







        if(ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd)<=$avermin){
            $avermin=ecuaverage($idstud['studentid'],$idspec,$idsem,$idecu,$idanac,$idses,$bdd);
        }









    }
    $minaverage=$avermin;


    return $minaverage;
















}