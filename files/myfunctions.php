<?php
session_start();

include('connection.php');
$date=date("d/m/Y    H:i:s");
if($_GET['idanac']){

    $idanac=$_GET['idanac'];
}

if($_GET['specid']){

    $idspec=$_GET['specid'];
}

if($_GET['idsem']){

    $idsem=$_GET['idsem'];
}

if($_GET['idses']){

    $idses=$_GET['idses'];
}

if($_GET['levelid']){

    $levelid=$_GET['levelid'];
}


if($_GET['typesem']){

    $typesem=$_GET['typesem'];
}


if($idses=='SE1'){

    $libses='1ère SESSION';
} else {
    $libses='2ème SESSION';
}





if($idsem=='SEM1'){

    $libsem='SEMESTRE 1';
}




if($idsem=='SEM2'){

    $libsem='SEMESTRE 2';
}




if($idsem=='SEM3'){

    $libsem='SEMESTRE 3';
}






if($idsem=='SEM4'){

    $libsem='SEMESTRE 4';
}




if($idsem=='SEM5'){

    $libsem='SEMESTRE 5';
}





if($idsem=='SEM6'){

    $libsem='SEMESTRE 6';
}





if($idsem=='SEM7'){

    $libsem='SEMESTRE 7';
}




if($idsem=='SEM8'){

    $libsem='SEMESTRE 8';
}




if($idsem=='SEM9'){

    $libsem='SEMESTRE 9';
}




if($idsem=='SEM10'){

    $libsem='SEMESTRE 10';
}


if($levelid=='L1'){

    $levelname='LICENCE 1';
}
if ($levelid=='L2'){


    $levelname='LICENCE 2';

}
if (  $levelid=='L3'){



    $levelname='LICENCE 3';

}

if ($levelid=='M1'){



    $levelname='MASTER 1';
}
if (  $levelid=='M2'){



    $levelname='MASTER 2';

}


$result = $bdd->prepare('SELECT *  FROM  speciality where id=:idspec  ');
$result->execute(array( 'idspec' => $idspec));


$respec = $result->fetch();


$libspec=$respec['specname'];



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



function theoaveragespv($studentid,$semesterid,$ueid,$ecuid,$idanac,$bdd)
{
    $rep = $bdd->prepare('SELECT average  FROM  student_averages where studentid=:studentid and semesterid=:idsem and typeof_averages=:typeaver and ueid=:idue and ecuid=:idecu and acadyearid=:idanac ');
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
function tpaveragespv($studentid,$semesterid,$ueid,$ecuid,$idanac,$bdd)
{
    $reptp = $bdd->prepare('SELECT average  FROM  student_averages where studentid=:studentid and semesterid=:idsem and typeof_averages=:typeaver and ueid=:idue and ecuid=:idecu and acadyearid=:idanac');
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
function moyenneecu($studentid,$idspec,$idsem,$idecu,$idanac,$idses,$bdd){

    $results = $bdd->prepare('SELECT *  FROM  ecu_speciality  where  semester_id=:idsem  and specialityid_id=:idspec and acadyearid=:idanac and ecuid_id=:idecu ');
    $results->execute(array('idsem' => $idsem, 'idspec' => $idspec, 'idanac' => $idanac,'idecu' => $idecu));
    $resecu= $results->fetch();




    if($resecu){
        $resul = $bdd->prepare('SELECT *  FROM  ue_validated  where studentid=:idstud and  smesterid=:idsem  and specialityid=:idspec  and ueid=:idue ');
        $resul->execute(array('idstud'=> $studentid,'idsem' => $idsem, 'idspec' => $idspec,'idue' => $resecu['ueid_id']));
        $uevalid = $resul->fetch();
        if(!$uevalid){


            if($idses=='SE1'){


                $avercc=theoaveragespv($studentid,$idsem,$resecu['ueid_id'],$idecu,$idanac,$bdd);
                $notex=theoexamnotes($studentid,$idsem,$idses,$resecu['ueid_id'],$idecu,$idanac,$bdd);





                if ($avercc =="") {
                    $moyccs ="";
                } else {
                    $moyccs = 0.4 * $avercc + 0.6 * $notex;
                }




                $avercctp=tpaveragespv($studentid,$idsem,$resecu['ueid_id'],$idecu,$idanac,$bdd);
                $notextp=tpexamnotes($studentid,$idsem,$idses,$resecu['ueid_id'],$idecu,$idanac,$bdd);






                if ($avercctp =="") {
                    $moytps ="";
                } else {
                    $moytps = 0.4 * $avercctp + 0.6 * $notextp;
                }







                if ($moytps=="") {
                    $moyenneecu = number_format((float)($moyccs),2);
                } else {
                    $moyenneecu = number_format((0.6 * $moyccs + 0.4 * $moytps), 2);
                }

                return $moyenneecu;






            }
            else{



                $rep = $bdd->prepare('SELECT average  FROM  student_averages  where studentid=:idstud and semesterid=:idsem and typeof_averages=:typaver and ecuid=:idecu and acadyearid=:idanac ');
                $rep->execute(array('idstud'=> $studentid,'idsem'=>$idsem,'idecu'=>$idecu,'idanac'=>$idanac,'typaver'=>'MCC'));
                $reso = $rep->fetch();

                $reposes = $bdd->prepare('SELECT exam_notes,entry_user  FROM  student_examnotes  where studentid=:idstud and semesterid=:idsem and typeof_examnotes=:typexamn and ecuid=:idecu and sessionid=:idses and acadyearid=:idanac ' );
                $reposes->execute(array('idstud'=> $studentid,'idsem'=>$idsem,'idecu'=>$idecu,'idanac'=>$idanac,'idses'=>$idses,'typexamn'=>'EXCC'));
                $resx = $reposes->fetch();





                if ( $reso['average']=="") {
                    $moyccs ="";
                } else {
                    $moyccs = 0.4 * $reso['average'] + 0.6 * $resx['exam_notes'];
                }





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

            if($uevalid['sessionid']=='SE1')
            {


                $rep = $bdd->prepare('SELECT average  FROM  student_averages  where studentid=:idstud and semesterid=:idsem and typeof_averages=:typaver and ecuid=:idecu and acadyearid=:idanac');
                $rep->execute(array('idstud'=> $studentid,'idsem'=>$uevalid['idsemestre'],'idecu'=>$idecu,'idanac'=>$uevalid['idanacademie'],'typaver'=>'MCC'));
                $reso = $rep->fetch();

                $reposes = $bdd->prepare('SELECT exam_notes  FROM  student_examnotes  where studentid=:idstud and semesterid=:idsem and typeof_examnotes=:typexamn and ecuid=:idecu and sessionid=:idses and acadyearid=:idanac ' );
                $reposes->execute(array('idstud'=> $studentid,'idsem'=>$uevalid['idsemestre'],'idecu'=>$idecu,'idanac'=>$uevalid['idanacademie'],'idses'=>$uevalid['idsession'],'typexamn'=>'EXCC'));
                $resx = $reposes->fetch();







                if ( $reso['average']=="") {
                    $moyccs ="";
                } else {
                    $moyccs = 0.4 * $reso['average'] + 0.6 * $resx['exam_notes'];
                }





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






                if( $moytps==""){



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


function creditue($idsem,$idue,$idanac,$idspec,$bdd){


    $credue= $bdd->prepare('SELECT creditvalue  FROM  ue_speciality  where  semester_id=:idsem  and specialityid_id=:idspec and acadyearid=:idanac and ueid_id=:idue  ' );
    $credue->execute(array('idsem'=> $idsem,'idspec'=>$idspec,'idue'=>$idue,'idanac'=>$idanac));

    $credituefra = $credue->fetch();


    $creditue=$credituefra['creditvalue'];



    return $creditue;












}


function moyenneue($idetudiant,$idsem,$idue,$idanac,$idspec,$idses,$bdd){


    $result = $bdd->prepare('SELECT *  FROM  ecu_speciality   where  semester_id=:idsem  and specialityid_id=:idspec and acadyearid=:idanac and ueid_id=:idue ');
    $result->execute(array('idsem' => $idsem, 'idspec' => $idspec, 'idanac' => $idanac,'idue' => $idue));
    $moyennetpondereecu = 0;
    while ($resecu = $result->fetch()) {


        $moyennetpondereecu =$moyennetpondereecu + (moyenneecu($idetudiant,$idspec, $idsem,  $resecu['ecuid_id'], $idanac, $idses,$bdd)* creditecu($idsem,$resecu['ecuid_id'],$idanac,$idspec,$bdd));


    }


    $moyenneue=$moyennetpondereecu /creditue($idsem,$idue,$idanac,$idspec,$bdd);

    return $moyenneue ;


}

function somcred($idsem,$idanac,$idspec,$bdd)
{





    $ret = $bdd->prepare('SELECT SUM(creditvalue) as somcredit FROM `ue_speciality`   WHERE semester_id=:idsem  and specialityid_id=:idspec and acadyearid=:idanac' );
    $ret->execute(array('idspec'=> $idspec,'idsem'=> $idsem,'idanac' => $idanac));
    $rcredva = $ret->fetch();

    $somcred = $rcredva['somcredit'];



    return $somcred;

}


function moyennesemestre($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)
{

    $result = $bdd->prepare('SELECT *  FROM   ecu_speciality  where  semester_id=:idsem  and specialityid_id=:idspec and acadyearid=:idanac  ');
    $result->execute(array('idsem' => $idsem, 'idspec' => $idspec, 'idanac' => $idanac));
    $moyennetsemestrepondere = 0;
    while ($resecu = $result->fetch()) {
        $idecus=$resecu['ecuid_id'];


        $moyennetsemestrepondere=number_format(($moyennetsemestrepondere + (moyenneecu($idetudiant,$idspec,$idsem,$idecus,$idanac,$idses,$bdd) * $resecu['creditvalue'])),2);



    }





    $moyennesemestre=number_format(($moyennetsemestrepondere/somcred($idsem,$idanac,$idspec,$bdd)),2);

    return $moyennesemestre;

}



function creditecu($idsem,$idecu,$idanac,$idspec,$bdd){


    $credue= $bdd->prepare('SELECT creditvalue  FROM  ecu_speciality  where  semester_id=:idsem  and specialityid_id=:idspec and acadyearid=:idanac and ecuid_id=:idecu' );
    $credue->execute(array('idsem'=> $idsem,'idspec'=>$idspec,'idecu'=>$idecu,'idanac'=>$idanac));

    $creditecufra = $credue->fetch();


    $creditecu=$creditecufra['creditvalue'];



    return $creditecu;



}


 function sumcreditmajor($idspec,$idsem,$idanac,$bdd)
{

    $credmaj= $bdd->prepare('SELECT SUM(creditvalue) as somcreditmajor FROM `ue_speciality`   WHERE specialityid_id=:idspec and semester_id=:idsem and acadyearid=:idanac and creditvalue BETWEEN 4 AND 6 ' );
    $credmaj->execute(array('idsem'=> $idsem,'idspec'=>$idspec,'idanac'=>$idanac));

    $sumcredmaj = $credmaj->fetch();

    $sumcreditmajor=$sumcredmaj['somcreditmajor'];



    return $sumcreditmajor;


}

function sumcreditminor($idspec,$idsem,$idanac,$bdd)
{

    $credmin= $bdd->prepare('SELECT SUM(creditvalue) as somcreditminor FROM `ue_speciality`   WHERE specialityid_id=:idspec and semester_id=:idsem and acadyearid=:idanac and creditvalue BETWEEN 2 AND 3 ' );
    $credmin->execute(array('idsem'=> $idsem,'idspec'=>$idspec,'idanac'=>$idanac));

    $sumcredmin = $credmin->fetch();

    $sumcreditminor=$sumcredmin['somcreditminor'];

    return $sumcreditminor;




}



function uemajorsemaverage($studentid, $idspec,  $idsem, $idsession, $idanac,$bdd)
{



    $resulmaj= $bdd->prepare('SELECT  DISTINCT ueid_id,creditvalue FROM `ue_speciality`   WHERE  specialityid_id=:idspec  and  acadyearid=:idanac and creditvalue BETWEEN 4 AND 6 and semester_id=:idsem ' );
    $resulmaj->execute(array('idsem'=> $idsem,'idspec'=> $idspec,'idanac'=> $idanac));


    $moyennemajorpondere = 0;
    while($uemaj = $resulmaj->fetch()) {


        $moyennemajorpondere = number_format(($moyennemajorpondere + (moyenneue($studentid, $idsem, $uemaj['ueid_id'], $idanac, $idspec, $idsession,$bdd)* $uemaj['creditvalue'])), 2);

    }



    $moyennesemestremajor = number_format(($moyennemajorpondere /sumcreditmajor($idspec,$idsem,$idanac,$bdd)), 2);

    return $moyennesemestremajor;



}






function ueminorsemaverage($studentid, $idspec,  $idsem, $idsession, $idanac,$bdd)
{



    $resulmin= $bdd->prepare('SELECT  DISTINCT ueid_id,creditvalue FROM `ue_speciality`   WHERE  specialityid_id=:idspec  and  acadyearid=:idanac and creditvalue BETWEEN 2 AND 3 and semester_id=:idsem ' );
    $resulmin->execute(array('idsem'=> $idsem,'idspec'=> $idspec,'idanac'=> $idanac));


    $moyenneminorpondere = 0;
    while($uemin = $resulmin->fetch()) {


        $moyenneminorpondere = number_format(($moyenneminorpondere + (moyenneue($studentid, $idsem, $uemin['ueid_id'], $idanac, $idspec, $idsession,$bdd)* $uemin['creditvalue'])), 2);

    }



    $moyennesemestreminor = number_format(($moyenneminorpondere /sumcreditminor($idspec,$idsem,$idanac,$bdd)), 2);

    return $moyennesemestreminor;


}









function creditvalideue($idetudiant,$idsem,$idue,$idanac,$idspec,$idses,$bdd)
{

    if($idanac=='2019-2020'){

        $creditvalideue=0;

        if(moyenneue($idetudiant,$idsem,$idue,$idanac,$idspec,$idses,$bdd) >= 10){

            $creditvalideue=creditue($idsem,$idue,$idanac,$idspec,$bdd);
        }else{

            $typeue= $bdd->prepare('SELECT * FROM `ue_speciality`   WHERE specialityid_id=:idspec and semester_id=:idsem and acadyearid=:idanac and ueid_id=:ueid ' );
            $typeue->execute(array('idsem'=> $idsem,'idspec'=>$idspec,'idanac'=>$idanac,'ueid'=>$idue));

            $uetype = $typeue->fetch();



            if ($uetype['creditvalue'] >= 4 and $uetype['creditvalue'] <= 6 and uemajorsemaverage($idetudiant, $idspec,  $idsem, $idses, $idanac,$bdd) >=10 ) {





                $resmaj= $bdd->prepare('SELECT  DISTINCT ueid_id,creditvalue FROM `ue_speciality`   WHERE  specialityid_id=:idspec  and  acadyearid=:idanac and creditvalue BETWEEN 4 AND 6 and semester_id=:idsem ' );
                $resmaj->execute(array('idsem'=> $idsem,'idspec'=> $idspec,'idanac'=> $idanac));


                $credit = 1;
                while($uemajo = $resmaj->fetch()) {

                    $resulecu= $bdd->prepare('SELECT  * FROM `ecu_speciality`   WHERE  specialityid_id=:idspec  and  acadyearid=:idanac and ueid_id=:ueid and semester_id=:idsem ' );
                    $resulecu->execute(array('idsem'=> $idsem,'idspec'=> $idspec,'idanac'=> $idanac,'ueid' => $uemajo['ueid_id']));


                    $moyennetotalponderec = 0;
                    while($ecumaj = $resulecu->fetch()) {



                        $moyennetotalponderec = $moyennetotalponderec + (moyenneecu($idetudiant,$idspec,$idsem,$ecumaj['ecuid_id'], $idanac, $idses,$bdd) * $ecumaj['creditvalue']);

                    }

                    $moyenneuecreduev = number_format(($moyennetotalponderec / $uemajo['creditvalue']), 2);



                    if ($moyenneuecreduev < 7) {

                        $credit = 0 * $credit;

                    } else {

                        $credit = 1 * $credit;

                    }




                }

                if ($credit == 0) {


                    $creditvalideue = 0;


                } else {


                    $creditvalideue=creditue($idsem,$idue,$idanac,$idspec,$bdd);


                }











            }


            elseif ($uetype['creditvalue'] >= 2 and $uetype['creditvalue'] <= 3 and ueminorsemaverage($idetudiant, $idspec,  $idsem, $idses, $idanac,$bdd) >=10 ) {





                $resmin= $bdd->prepare('SELECT  DISTINCT ueid_id,creditvalue FROM `ue_speciality`   WHERE  specialityid_id=:idspec  and  acadyearid=:idanac and creditvalue BETWEEN 2 AND 3 and semester_id=:idsem ' );
                $resmin->execute(array('idsem'=> $idsem,'idspec'=> $idspec,'idanac'=> $idanac));


                $credit = 1;
                while($uemino = $resmin->fetch()) {

                    $resulecu= $bdd->prepare('SELECT  * FROM `ecu_speciality`   WHERE  specialityid_id=:idspec  and  acadyearid=:idanac and ueid_id=:ueid and semester_id=:idsem ' );
                    $resulecu->execute(array('idsem'=> $idsem,'idspec'=> $idspec,'idanac'=> $idanac,'ueid' => $uemino['ueid_id']));


                    $moyennetotalponderec = 0;
                    while($ecumin = $resulecu->fetch()) {
                        $moyennetotalponderec = $moyennetotalponderec + (moyenneecu($idetudiant, $idspec,  $idsem,$ecumin['ecuid_id'], $idanac, $idses,$bdd) * $ecumin['creditvalue']);

                    }

                    $moyenneuecreduev = number_format(($moyennetotalponderec / $uemino['creditvalue']), 2);



                    if ($moyenneuecreduev < 7) {

                        $credit = 0 * $credit;

                    } else {

                        $credit = 1 * $credit;

                    }




                }

                if ($credit == 0) {


                    $creditvalideue = 0;


                } else {


                    $creditvalideue=creditue($idsem,$idue,$idanac,$idspec,$bdd);


                }











            }



            else{

                $creditvalideue=0;
            }



        }


        return $creditvalideue;









    }
    else{


        $creditvalideue=0;

        if(moyenneue($idetudiant,$idsem,$idue,$idanac,$idspec,$idses,$bdd) >= 10){

            $creditvalideue=creditue($idsem,$idue,$idanac,$idspec,$bdd);
        }

        elseif(moyennesemestre($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)>= 10)
        {

            $resul= $bdd->prepare('SELECT *  FROM  `ue_speciality`   WHERE semester_id=:idsem  and specialityid_id=:idspec and acadyearid=:idanac' );
            $resul->execute(array('idsem'=> $idsem,'idspec'=> $idspec,'idanac'=> $idanac));
            $uecredit=1;
            while($rue = $resul->fetch()){

                $iduec=$rue['ueid_id'];




                if(moyenneue($idetudiant,$idsem,$iduec,$idanac,$idspec,$idses,$bdd) < 7){

                    $uecredit= 0 * $uecredit;

                }else{

                    $uecredit= 1 * $uecredit;

                }
                $_SESSION['valcred']=$uecredit;
            }

            if( $_SESSION['valcred']==0){


                $creditvalideue=0;



            }else{


                $creditvalideue=creditue($idsem,$idue,$idanac,$idspec,$bdd);


            }





        }else{

            $creditvalideue=0;
        }

        return $creditvalideue;



    }




}


function creditvalideuemaster($idetudiant,$idsem,$idue,$idanac,$idspec,$idses,$bdd)
{
    $creditvalideuem=0;

    if(moyenneue($idetudiant,$idsem,$idue,$idanac,$idspec,$idses,$bdd) >= 10){


        $resul= $bdd->prepare('SELECT *  FROM   ecu_speciality  where  semester_id=:idsem  and specialityid_id=:idspec and acadyearid=:idanac  and ueid_id=:idue' );
        $resul->execute(array('idsem'=> $idsem,'idspec'=> $idspec,'idanac'=> $idanac,'idue'=> $idue));


        $creditvm=1;
        while($rue = $resul->fetch()) {

            $iduec = $rue['ecuid_id'];


            if (moyenneecu($idetudiant, $idspec, $idsem, $iduec, $idanac, $idses, $bdd) >= 7) {

                $creditvm = 1 * $creditvm;

            } else {

                $creditvm = 0 * $creditvm;

            }


        }
        if ($creditvm == 0) {


            $creditvalideuem=$creditvalideuem + 0;


        } else {


            $creditvalideuem=$creditvalideuem + creditue($idsem,$idue,$idanac,$idspec,$bdd);


        }



    } else {


        if (moyennesemestre($idetudiant, $idsem, $idanac, $idspec, $idses, $bdd) >= 10) {

            $ress = $bdd->prepare('SELECT *  FROM   ecu_speciality  where  semester_id=:idsem  and specialityid_id=:idspec and acadyearid=:idanac ');
            $ress->execute(array('idsem' => $idsem, 'idspec' => $idspec, 'idanac' => $idanac));
            $creditvms = 1;
            while ($resecucredvm = $ress->fetch()) {

                $iduesvms = $resecucredvm['ecuid_id'];


                if (moyenneecu($idetudiant, $idspec, $idsem, $iduesvms, $idanac, $idses, $bdd) < 7) {

                    $creditvms = 0 * $creditvms;

                } else {

                    $creditvms = 1 * $creditvms;

                }


            }


            if ($creditvms == 0) {


                $creditvalideuem = $creditvalideuem + 0;


            } else {


                $creditvalideuem = $creditvalideuem + creditue($idsem, $idue, $idanac, $idspec, $bdd);


            }


        }


    }



    return $creditvalideuem;


}



function tcredit($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)
{


    if($idanac=='2019-2020'){



        $res = $bdd->prepare('SELECT *  FROM  `ue_speciality`   WHERE semester_id=:idsem  and specialityid_id=:idspec and acadyearid=:idanac  ');
        $res->execute(array('idsem' => $idsem, 'idspec' => $idspec,'idanac' => $idanac));
        $tcredit=0;
        while ($resecucred = $res->fetch()) {

            $idues=$resecucred['ueid_id'];






            if (moyenneue($idetudiant,$idsem,$idues,$idanac,$idspec,$idses,$bdd) >= 10) {

                $tcredit = $tcredit + $resecucred['creditvalue'];
            }else{

                if ($resecucred['creditvalue'] >= 4 and $resecucred['creditvalue'] <= 6 and uemajorsemaverage($idetudiant, $idspec, $idsem, $idses, $idanac, $bdd) >= 10) {

                    $resmaj = $bdd->prepare('SELECT  DISTINCT ueid_id,creditvalue FROM `ue_speciality`   WHERE  specialityid_id=:idspec  and  acadyearid=:idanac and creditvalue BETWEEN 4 AND 6 and semester_id=:idsem ');
                    $resmaj->execute(array('idsem' => $idsem, 'idspec' => $idspec, 'idanac' => $idanac));
                    $creditv = 1;
                    while ($uemajo = $resmaj->fetch()) {


                        if (moyenneue($idetudiant,$idsem,$uemajo['ueid_id'],$idanac,$idspec,$idses,$bdd)< 7) {

                            $creditv = 0 * $creditv;

                        } else {

                            $creditv = 1 * $creditv;

                        }



                    }


                    if ($creditv == 0) {


                        $tcredit = $tcredit + 0;


                    } else {


                        $tcredit = $tcredit + $resecucred['creditvalue'];


                    }






                }

                elseif ($resecucred['creditvalue'] >= 2 and $resecucred['creditvalue'] <= 3 and ueminorsemaverage($idetudiant, $idspec, $idsem, $idses, $idanac, $bdd) >= 10) {


                    $resmin = $bdd->prepare('SELECT  DISTINCT ueid_id,creditvalue FROM `ue_speciality`   WHERE  specialityid_id=:idspec  and  acadyearid=:idanac and creditvalue BETWEEN 2 AND 3 and semester_id=:idsem ');
                    $resmin->execute(array('idsem' => $idsem, 'idspec' => $idspec, 'idanac' => $idanac));


                    $creditv = 1;
                    while ($uemino = $resmin->fetch()) {


                        if (moyenneue($idetudiant,$idsem,$uemino['ueid_id'],$idanac,$idspec,$idses,$bdd)< 7) {

                            $creditv = 0 * $creditv;

                        } else {

                            $creditv = 1 * $creditv;

                        }


                    }

                    if ($creditv == 0) {


                        $tcredit = $tcredit + 0;


                    } else {


                        $tcredit = $tcredit + $resecucred['creditvalue'];


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



        $res = $bdd->prepare('SELECT *  FROM  `ue_speciality`   WHERE semester_id=:idsem  and specialityid_id=:idspec and acadyearid=:idanac  ');
        $res->execute(array('idsem' => $idsem, 'idspec' => $idspec,'idanac' => $idanac));
        $tcredit=0;
        while ($resecucred = $res->fetch()) {

            $idues=$resecucred['ueid_id'];






            if (moyenneue($idetudiant,$idsem,$idues,$idanac,$idspec,$idses,$bdd) >= 10) {

                $tcredit = $tcredit + $resecucred['creditvalue'];
            } elseif (moyennesemestre($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd) >= 10) {

                if (moyenneue($idetudiant,$idsem,$idues,$idanac,$idspec,$idses,$bdd) >= 7) {



                    $ress = $bdd->prepare('SELECT *  FROM  `ue_speciality`   WHERE semester_id=:idsem  and specialityid_id=:idspec and acadyearid=:idanac  ');
                    $ress->execute(array('idsem' => $idsem, 'idspec' => $idspec,'idanac'=> $idanac));
                    $creditv = 1;
                    while ($resecucredv = $ress->fetch()) {

                        $iduesv=$resecucredv['ueid_id'];




                        if (moyenneue($idetudiant,$idsem,$iduesv,$idanac,$idspec,$idses,$bdd) < 7) {

                            $creditv = 0 * $creditv;

                        } else {

                            $creditv = 1 * $creditv;

                        }


                    }

                    if ($creditv == 0) {


                        $tcredit = $tcredit + 0;


                    } else {


                        $tcredit = $tcredit + $resecucred['creditvalue'];


                    }

                }
                else {
                    $tcredit = $tcredit + 0;
                }

            }





            else {

                $tcredit = $tcredit + 0;
            }




        }





        return $tcredit;



    }















}

function tcreditmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)
{



    $res = $bdd->prepare('SELECT *  FROM  `ue_speciality`   WHERE semester_id=:idsem  and specialityid_id=:idspec and acadyearid=:idanac');
    $res->execute(array('idsem' => $idsem, 'idspec' => $idspec,'idanac' => $idanac));
    $tcreditm=0;
    while ($resecucred = $res->fetch()) {

        $idues=$resecucred['ueid_id'];


        $tcreditm=$tcreditm+creditvalideuemaster($idetudiant,$idsem,$idues,$idanac,$idspec,$idses,$bdd);








    }


    return $tcreditm;


}

function decision($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)
{

    if(tcredit($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)==somcred($idsem,$idanac,$idspec,$bdd)) {


        $decision = 'ADMIS';
    }
    else{

        $decision = 'REFUSE';
    }

    return $decision;
}



function decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)
{

    if(tcreditmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)==somcred($idsem,$idanac,$idspec,$bdd)) {


        $decisionm = 'ADMIS';
    }
    else{

        $decisionm = 'REFUSE';
    }

    return $decisionm;
}


function moyennnesemestrielle($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)
{

    $result = $bdd->prepare('SELECT *  FROM  halfyearly_delib  where  studentid=:idetudiant and  halfyearly_delib.semesterid=:idsem and halfyearly_delib.sessionid=:idses and halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac  ');
    $result->execute(array('idetudiant' => $idetudiant,'idsem' => $idsem, 'idspec' => $idspec, 'idanac' => $idanac,'idses' => $idses));

    $resecu = $result->fetch();


    $moyennesemestrielle=$resecu['semaverage'];








    return $moyennesemestrielle;

}


function decisionsemestrielle($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)
{

    $result = $bdd->prepare('SELECT *  FROM  halfyearly_delib  where  studentid=:idetudiant and  halfyearly_delib.semesterid=:idsem and halfyearly_delib.sessionid=:idses and halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac  ');
    $result->execute(array('idetudiant' => $idetudiant,'idsem' => $idsem, 'idspec' => $idspec, 'idanac' => $idanac,'idses' => $idses));


    $resecus = $result->fetch();


    $decisionsemestrielle=$resecus['decision'];








    return $decisionsemestrielle;

}





function teachervalid($semesterid,$ueid,$ecuid,$idanac,$idclasse,$bdd)
{
    $tc = $bdd->prepare('SELECT DISTINCT teacherid  FROM  teach_speciality where  semesterid=:idsem and classeid=:classeid and ueid=:idue and ecuid=:idecu and acadyearid=:idanac ');
    $tc->execute(array('idsem'=>$semesterid,'idue'=>$ueid,'idecu'=>$ecuid,'idanac'=>$idanac,'classeid'=>$idclasse));
    $tcv = $tc->fetch();


    if($tcv){

        $tcn = $bdd->prepare('SELECT  firstname,lastname  FROM  full_users where  username=:username');
        $tcn->execute(array('username'=>$tcv['teacherid']));
        $teacher = $tcn->fetch();
        $teachername=$teacher['lastname'].'  '.$teacher['firstname'];


    }else{
        $teachername="";
    }

    return $teachername;


}






