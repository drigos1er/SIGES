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







                if ( $moyccs=="") {
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




public function sumcreditmajor($idspec,$idsem,$idanac,$bdd)
{

    $credmaj= $bdd->prepare('SELECT SUM(creditvalue) as somcreditmajor FROM `ue_speciality`   WHERE specialityid_id=:idspec and semester_id=:idsem and acadyearid=:idanac and creditvalue BETWEEN 4 AND 6 ' );
    $credmaj->execute(array('idsem'=> $idsem,'idspec'=>$idspec,'idanac'=>$idanac));

    $sumcredmaj = $credmaj->fetch();

    $sumcreditmajor=$sumcredmaj['somcreditmajor'];



    return $sumcreditmajor;






}

public function sumcreditminor($idspec,$idsem,$idanac,$bdd)
{

    $credmin= $bdd->prepare('SELECT SUM(creditvalue) as somcreditminor FROM `ue_speciality`   WHERE specialityid_id=:idspec and semester_id=:idsem and acadyearid=:idanac and creditvalue BETWEEN 2 AND 3 ' );
    $credmin->execute(array('idsem'=> $idsem,'idspec'=>$idspec,'idanac'=>$idanac));

    $sumcredmin = $credmin->fetch();

    $sumcreditminor=$sumcredmin['somcreditminor'];

    return $sumcreditminor;




}



public function uemajorsemaverage($studentid, $idspec,  $idsem, $idsession, $idanac,$bdd)
{



    $resulmaj= $bdd->prepare('SELECT  DISTINCT ueid_id,creditvalue FROM `ue_speciality`   WHERE  specialityid_id=:idspec  and  acadyearid=:idanac and creditvalue BETWEEN 4 AND 6 and semester_id=:idsem ' );
    $resulmaj->execute(array('idsem'=> $idsem,'idspec'=> $idspec,'idanac'=> $idanac));


    $moyennemajorpondere = 0;
    while($uemaj = $resulmaj->fetch()) {


        $moyennemajorpondere = number_format(($moyennemajorpondere + (moyenneue($studentid, $idsem, $uemaj['ueid_id'], $idsem, $idsession, $idanac)* $uemaj['creditvalue'])), 2);

    }



    $moyennesemestremajor = number_format(($moyennemajorpondere /sumcreditmajor($idspec,$idsem,$idanac)), 2);

    return $moyennesemestremajor;



}






public function ueminorsemaverage($studentid, $idspec,  $idsem, $idsession, $idanac,$bdd)
{



    $resulmin= $bdd->prepare('SELECT  DISTINCT ueid_id,creditvalue FROM `ue_speciality`   WHERE  specialityid_id=:idspec  and  acadyearid=:idanac and creditvalue BETWEEN 2 AND 3 and semester_id=:idsem ' );
    $resulmin->execute(array('idsem'=> $idsem,'idspec'=> $idspec,'idanac'=> $idanac));


    $moyenneminorpondere = 0;
    while($uemin = $resulmin->fetch()) {


        $moyenneminorpondere = number_format(($moyenneminorpondere + (moyenneue($studentid, $idsem, $uemin['ueid_id'], $idsem, $idsession, $idanac)* $uemin['creditvalue'])), 2);

    }



    $moyennesemestreminor = number_format(($moyenneminorpondere /sumcreditminor($idspec,$idsem,$idanac)), 2);

    return $moyennesemestreminor;


}









function creditvalideue($idetudiant,$idsem,$idue,$idanac,$idspec,$idses,$bdd)
{

  if($idanac=='2019-2020'){

      $creditvalideue=0;

      if(moyenneue($idetudiant,$idsem,$idue,$idanac,$idspec,$idses,$bdd) >= 10){

          $creditvalideue=creditue($idsem,$idue,$idanac,$idspec,$bdd);
      }else{

          $credmin= $bdd->prepare('SELECT * FROM `ue_speciality`   WHERE specialityid_id=:idspec and semester_id=:idsem and acadyearid=:idanac and creditvalue BETWEEN 2 AND 3 ' );
          $credmin->execute(array('idsem'=> $idsem,'idspec'=>$idspec,'idanac'=>$idanac));

          $sumcredmin = $credmin->fetch();


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


    $res = $bdd->prepare('SELECT *  FROM  `ue_speciality`   WHERE semester_id=:idsem  and specialityid_id=:idspec and acadyearid=:idanac  ');
    $res->execute(array('idsem' => $idsem, 'idspec' => $idspec,'idanac' => $idanac));
    $tcredit=0;
    while ($resecucred = $res->fetch()) {

        $idues=$resecucred['ueid_id'];






        if (moyenneue($idetudiant,$idsem,$idues,$idanac,$idspec,$idses,$bdd) >= 10) {

            $tcredit = $tcredit + $resecucred['creditvalue'];


        }
        elseif (moyennesemestre($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd) >= 10) {

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



function nbpresent($idanac,$idspec,$idsem,$idses,$bdd)
{



    $repns=$bdd->prepare(" SELECT  count(DISTINCT halfyearly_delib.studentid) as nbetudiant  FROM `halfyearly_delib` WHERE   specialityid=:idspecialite  and acadyearid=:idanac  and semesterid=:idsemestre and sessionid=:idsession  ");
    $repns->execute(array('idanac'=> $idanac, 'idsemestre'=> $idsem,'idspecialite'=> $idspec,'idsession'=> $idses));
    $nbetudp = $repns->fetch();



    $nombrepresent=$nbetudp['nbetudiant'];




    return $nombrepresent;




}




function nbpresentan($idanac,$idspec,$idniv,$bdd)
{

    $repns=$bdd->prepare(" SELECT  count(DISTINCT halfyearly_delib.studentid) as nbetudiant  FROM `halfyearly_delib`   INNER JOIN student_speciality on student_speciality.studentid=halfyearly_delib.studentid WHERE student_speciality.levelid=:idniv and student_speciality.specialityid=:idspec and student_speciality.acadyearid=:idanac  ");
    $repns->execute(array('idanac'=> $idanac, 'idniv'=> $idniv,'idspec'=> $idspec));
    $nbetudpan = $repns->fetch();



    $nombrepresentan=$nbetudpan['nbetudiant'];




    return $nombrepresentan;

}



function nbpresentanse2($idanac,$idspec,$idniv,$bdd)
{



    if(($idniv=='M1' and $idspec=='SIGL')|| ($idniv=='M1' and $idspec=='SITW')){


        $repns=$bdd->prepare("  SELECT count( DISTINCT halfyearly_delib.studentid)as  nbetudiant FROM `halfyearly_delib` WHERE halfyearly_delib.specialityid='TCSIGLSITW' and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid='SE1' and halfyearly_delib.decision='REFUSE' and halfyearly_delib.semesterid='SEM7' and halfyearly_delib.studentid in (select studentid from student_speciality where levelid=:idniv and acadyearid=:idanac and specialityid=:idspec) ");
        $repns->execute(array('idanac'=> $idanac, 'idniv'=> $idniv,'idspec'=> $idspec));
        $nbetudpan = $repns->fetch();



        $nombrepresentan=$nbetudpan['nbetudiant'];




        return $nombrepresentan;
    }else{


        $repns=$bdd->prepare("
  SELECT count( DISTINCT halfyearly_delib.studentid)as  nbetudiant FROM `halfyearly_delib` WHERE halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid='SE1' and halfyearly_delib.decision='REFUSE'  and halfyearly_delib.studentid in (select studentid from student_speciality where levelid=:idniv and acadyearid=:idanac and specialityid=:idspec)
  
  
  ");
        $repns->execute(array('idanac'=> $idanac, 'idniv'=> $idniv,'idspec'=> $idspec));
        $nbetudpan = $repns->fetch();



        $nombrepresentan=$nbetudpan['nbetudiant'];




        return $nombrepresentan;

    }



}









function moyennesemestrielle($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)
{

    $repns=$bdd->prepare(" SELECT semaverage  FROM `halfyearly_delib`  WHERE halfyearly_delib.studentid=:idstudent and halfyearly_delib.semesterid=:idsem and halfyearly_delib.sessionid=:idses and halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac  ");
    $repns->execute(array('idstudent'=> $idetudiant,'idanac'=> $idanac, 'idsem'=> $idsem,'idspec'=> $idspec,'idses'=> $idses));
    $nbetudadf = $repns->fetch();








    $moysemestrielle=$nbetudadf['semaverage'];













    return $moysemestrielle;

}



function nbadmissupzf($idanac,$idspec,$idsem,$idses,$bdd)
{

    $repns=$bdd->prepare(" SELECT count(DISTINCT halfyearly_delib.studentid) as nbetudiant  FROM `halfyearly_delib` INNER JOIN student on student.id=halfyearly_delib.studentid WHERE halfyearly_delib.semesterid=:idsem and halfyearly_delib.sessionid=:idses and halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac  and halfyearly_delib.semaverage >=0 and halfyearly_delib.semaverage < 8  and student.kind like '%F%' ");
    $repns->execute(array('idanac'=> $idanac, 'idsem'=> $idsem,'idspec'=> $idspec,'idses'=> $idses));
    $nbetudadf = $repns->fetch();



    $nombreadmissupzf=$nbetudadf['nbetudiant'];




    return $nombreadmissupzf;

}



function nbadmissupzfan($idanac,$idspec,$idniv,$bdd)
{


    $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

    $repos = $bdd->prepare(' SELECT  DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib` INNER JOIN student on student.id=halfyearly_delib.studentid INNER JOIN student_speciality on student_speciality.studentid=student.id WHERE student_speciality.specialityid=:idspec  and student_speciality.acadyearid=:idanac and student_speciality.levelid=:idniv   order by student.firstname,student.lastname ' );

    $repos->execute(array('idspec'=>$idspec,'idanac'=>$idanac,'idniv'=>$idniv));

    $nombreadmissupzfan=0;



    while($resultat = $repos->fetch()) {

        if($idniv=="L1"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



        if($idniv=="L2"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



        if($idniv=="L3"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




        if($idniv=="M1"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();



           if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


               $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

               $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

               $anac1 = $repost->fetch();


               if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                   $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
               }else{
                   $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
               }




               $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

               $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

               $anac2 = $repost2->fetch();

               if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                   $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
               }else{
                   $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
               }







               $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);




           }else{




               $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

               $repost->execute(array('idetudiant'=>$resultat['studentid']));

               $anac1 = $repost->fetch();


               if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                   $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
               }else{
                   $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
               }




               $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

               $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

               $anac2 = $repost2->fetch();

               if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                   $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
               }else{
                   $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
               }







               $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);


           }

          }



        if($idniv=="M2"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}





        if($moyennean >=0 and $moyennean <8 and $genreetud['kind']=="F" )

        {
            $nombreadmissupzfan=$nombreadmissupzfan+ 1;
        }




    }















    return     $nombreadmissupzfan;

















}






function nbadmissupzfanse2($idanac,$idspec,$idniv,$bdd)
{







    if(($idniv=='M1' and $idspec=='SIGL')|| ($idniv=='M1' and $idspec=='SITW')){


        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare('  
  
  SELECT DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib` WHERE halfyearly_delib.specialityid="TCSIGLSITW" and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid="SE1" and halfyearly_delib.decision="REFUSE" and halfyearly_delib.semesterid="SEM7" and halfyearly_delib.studentid in (select studentid from student_speciality where levelid=:idniv and acadyearid=:idanac and specialityid=:idspec)
  
  
  ' );

        $repos->execute(array('idspec'=>$idspec,'idanac'=>$idanac,'idniv'=>$idniv));

        $nombreadmissupzfan=0;



        while($resultat = $repos->fetch()) {




            if($idniv=="L1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L3"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




            if($idniv=="M1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();



                if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);




                }else{




                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);


                }

            }



            if($idniv=="M2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}





            if($moyennean >=0 and $moyennean <8 and $genreetud['kind']=="F" )

            {
                $nombreadmissupzfan=$nombreadmissupzfan+ 1;
            }










        }















        return     $nombreadmissupzfan;









    }else{



        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare('  
 
  SELECT DISTINCT halfyearly_delib.studentid   FROM `halfyearly_delib` WHERE halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid="SE1" and halfyearly_delib.decision="REFUSE"  and halfyearly_delib.studentid in (select studentid from student_speciality where levelid=:idniv and acadyearid=:idanac and specialityid=:idspec)
  
 
 
 ' );

        $repos->execute(array('idspec'=>$idspec,'idanac'=>$idanac,'idniv'=>$idniv));

        $nombreadmissupzfan=0;



        while($resultat = $repos->fetch()) {



            if($idniv=="L1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L3"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




            if($idniv=="M1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();



                if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);




                }else{




                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);


                }

            }



            if($idniv=="M2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




            if($moyennean >=0 and $moyennean <8 and $genreetud['kind']=="F" )

            {
                $nombreadmissupzfan=$nombreadmissupzfan+ 1;
            }




        }















        return     $nombreadmissupzfan;






    }






















}







function nbadmissupzg($idanac,$idspec,$idsem,$idses,$bdd)
{

    $repns=$bdd->prepare(" SELECT count(DISTINCT halfyearly_delib.studentid) as nbetudiant  FROM `halfyearly_delib` INNER JOIN student on student.id=halfyearly_delib.studentid WHERE halfyearly_delib.semesterid=:idsem and halfyearly_delib.sessionid=:idses and halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac  and halfyearly_delib.semaverage >=0 and halfyearly_delib.semaverage < 8  and student.kind like '%M%'  ");
    $repns->execute(array('idanac'=> $idanac, 'idsem'=> $idsem,'idspec'=> $idspec,'idses'=> $idses));
    $nbetudadg = $repns->fetch();



    $nombreadmissupzg=$nbetudadg['nbetudiant'];




    return $nombreadmissupzg;

}








function nbadmissupzgan($idanac,$idspec,$idniv,$bdd)
{


    $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

    $repos = $bdd->prepare(' SELECT  DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib` INNER JOIN student on student.id=halfyearly_delib.studentid INNER JOIN student_speciality on student_speciality.studentid=student.id WHERE student_speciality.specialityid=:idspec  and student_speciality.acadyearid=:idanac and student_speciality.levelid=:idniv   order by student.firstname,student.lastname ' );

    $repos->execute(array('idspec'=>$idspec,'idanac'=>$idanac,'idniv'=>$idniv));

    $nombreadmissupzgan=0;



    while($resultat = $repos->fetch()) {

        if($idniv=="L1"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



        if($idniv=="L2"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



        if($idniv=="L3"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




        if($idniv=="M1"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();



            if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);




            }else{




                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);


            }

        }



        if($idniv=="M2"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}





        if($moyennean >=0 and $moyennean <8 and $genreetud['kind']=="M" )

        {
            $nombreadmissupzgan= $nombreadmissupzgan+ 1;
        }


    }
















    return      $nombreadmissupzgan;

















}




function nbadmissupzganse2($idanac,$idspec,$idniv,$bdd)
{



    if(($idniv=='M1' and $idspec=='SIGL')|| ($idniv=='M1' and $idspec=='SITW')){


        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare('  
  SELECT DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib` WHERE halfyearly_delib.specialityid="TCSIGLSITW" and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid="SE1" and halfyearly_delib.decision="REFUSE" and halfyearly_delib.semesterid="SEM7" and halfyearly_delib.studentid in (select studentid from student_speciality where levelid=:idniv and acadyearid=:idanac and specialityid=:idspec)
   ' );

        $repos->execute(array('idspec'=>$idspec,'idanac'=>$idanac,'idniv'=>$idniv));



        $nombreadmissupzgan=0;



        while($resultat = $repos->fetch()) {



            if($idniv=="L1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L3"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




            if($idniv=="M1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();



                if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);




                }else{




                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);


                }

            }



            if($idniv=="M2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}


            if($moyennean >=0 and $moyennean <8 and $genreetud['kind']=="M" )

            {
                $nombreadmissupzgan= $nombreadmissupzgan+ 1;
            }




        }















        return      $nombreadmissupzgan;







    }else {


        $repos = $bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare(' 
  SELECT DISTINCT halfyearly_delib.studentid   FROM `halfyearly_delib` WHERE halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid="SE1" and halfyearly_delib.decision="REFUSE"  and halfyearly_delib.studentid in (select studentid from student_speciality where levelid=:idniv and acadyearid=:idanac and specialityid=:idspec)
  
  ');

        $repos->execute(array('idspec' => $idspec, 'idanac' => $idanac, 'idniv' => $idniv));

        $nombreadmissupzgan = 0;


        while ($resultat = $repos->fetch()) {



            if($idniv=="L1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L3"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




            if($idniv=="M1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();



                if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);




                }else{




                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);


                }

            }



            if($idniv=="M2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}


            if ($moyennean >= 0 and $moyennean < 8 and $genreetud['kind'] == "M") {
                $nombreadmissupzgan = $nombreadmissupzgan + 1;
            }


        }


        return $nombreadmissupzgan;


    }











}









function nbadmissupz($idanac,$idspec,$idsem,$idses,$bdd)
{

    $repns=$bdd->prepare(" SELECT count(DISTINCT halfyearly_delib.studentid) as nbetudiant  FROM `halfyearly_delib` INNER JOIN student on student.id=halfyearly_delib.studentid WHERE halfyearly_delib.semesterid=:idsem and halfyearly_delib.sessionid=:idses and halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac  and halfyearly_delib.semaverage >=0 and halfyearly_delib.semaverage < 8   ");
    $repns->execute(array('idanac'=> $idanac, 'idsem'=> $idsem,'idspec'=> $idspec,'idses'=> $idses));
    $nbetudad = $repns->fetch();



    $nombreadmissupz=$nbetudad['nbetudiant'];




    return $nombreadmissupz;

}







function nbadmissupzan($idanac,$idspec,$idniv,$bdd)
{


    $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

    $repos = $bdd->prepare(' SELECT  DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib` INNER JOIN student on student.id=halfyearly_delib.studentid INNER JOIN student_speciality on student_speciality.studentid=student.id WHERE student_speciality.specialityid=:idspec  and student_speciality.acadyearid=:idanac and student_speciality.levelid=:idniv   order by student.firstname,student.lastname ' );

    $repos->execute(array('idspec'=>$idspec,'idanac'=>$idanac,'idniv'=>$idniv));

    $nombreadmissupzan=0;



    while($resultat = $repos->fetch()) {

        if($idniv=="L1"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



        if($idniv=="L2"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



        if($idniv=="L3"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




        if($idniv=="M1"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();



            if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);




            }else{




                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);


            }

        }



        if($idniv=="M2"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}





        if($moyennean >=0 and $moyennean <8 )

        {
            $nombreadmissupzan=$nombreadmissupzan+ 1;
        }


    }
















    return $nombreadmissupzan;

















}




function nbadmissupzanse2($idanac,$idspec,$idniv,$bdd)
{


    if(($idniv=='M1' and $idspec=='SIGL')|| ($idniv=='M1' and $idspec=='SITW')){


        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare('  
  SELECT DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib` WHERE halfyearly_delib.specialityid="TCSIGLSITW" and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid="SE1" and halfyearly_delib.decision="REFUSE" and halfyearly_delib.semesterid="SEM7" and halfyearly_delib.studentid in (select studentid from student_speciality where levelid=:idniv and acadyearid=:idanac and specialityid=:idspec)
  ' );

        $repos->execute(array('idspec'=>$idspec,'idanac'=>$idanac,'idniv'=>$idniv));





        $nombreadmissupzan=0;



        while($resultat = $repos->fetch()) {



            if($idniv=="L1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L3"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




            if($idniv=="M1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();



                if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);




                }else{




                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);


                }

            }



            if($idniv=="M2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($moyennean >=0 and $moyennean <8 )

            {
                $nombreadmissupzan=$nombreadmissupzan+ 1;
            }




        }















        return $nombreadmissupzan;






    }else{









        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare(' 


  SELECT DISTINCT  halfyearly_delib.studentid   FROM `halfyearly_delib` WHERE halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid="SE1" and halfyearly_delib.decision="REFUSE"  and halfyearly_delib.studentid in (select studentid from student_speciality where levelid=:idniv and acadyearid=:idanac and specialityid=:idspec)
  
  ' );

        $repos->execute(array('idspec'=>$idspec,'idanac'=>$idanac,'idniv'=>$idniv));

        $nombreadmissupzan=0;



        while($resultat = $repos->fetch()) {



            if($idniv=="L1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L3"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




            if($idniv=="M1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();



                if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);




                }else{




                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);


                }

            }



            if($idniv=="M2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}


            if($moyennean >=0 and $moyennean <8 )

            {
                $nombreadmissupzan=$nombreadmissupzan+ 1;
            }




        }















        return $nombreadmissupzan;}

}





function nbadmisinfdf($idanac,$idspec,$idsem,$idses,$bdd)
{

    $repns=$bdd->prepare(" SELECT count(DISTINCT halfyearly_delib.studentid) as nbetudiant  FROM `halfyearly_delib` INNER JOIN student on student.id=halfyearly_delib.studentid WHERE halfyearly_delib.semesterid=:idsem and halfyearly_delib.sessionid=:idses and halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac  and halfyearly_delib.semaverage >=8 and halfyearly_delib.semaverage < 10  and student.kind like '%F%' ");
    $repns->execute(array('idanac'=> $idanac, 'idsem'=> $idsem,'idspec'=> $idspec,'idses'=> $idses));
    $nbetudadf = $repns->fetch();



    $nombreadmisinfdf=$nbetudadf['nbetudiant'];




    return $nombreadmisinfdf;

}





function nbadmisinfdfan($idanac,$idspec,$idniv,$bdd)
{


    $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

    $repos = $bdd->prepare(' SELECT  DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib` INNER JOIN student on student.id=halfyearly_delib.studentid INNER JOIN student_speciality on student_speciality.studentid=student.id WHERE student_speciality.specialityid=:idspec  and student_speciality.acadyearid=:idanac and student_speciality.levelid=:idniv   order by student.firstname,student.lastname ' );

    $repos->execute(array('idspec'=>$idspec,'idanac'=>$idanac,'idniv'=>$idniv));

    $nombreadmisinfdfan=0;



    while($resultat = $repos->fetch()) {

        if($idniv=="L1"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



        if($idniv=="L2"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



        if($idniv=="L3"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




        if($idniv=="M1"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();



            if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);




            }else{




                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);


            }

        }



        if($idniv=="M2"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}





        if($moyennean >=8 and $moyennean <10 and  $genreetud['kind']=="F")

        {
            $nombreadmisinfdfan=  $nombreadmisinfdfan+ 1;
        }


    }

















    return       $nombreadmisinfdfan;

















}




function nbadmisinfdfanse2($idanac,$idspec,$idniv,$bdd)
{

    if(($idniv=='M1' and $idspec=='SIGL')|| ($idniv=='M1' and $idspec=='SITW')){


        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare('  
  SELECT DISTINCT   halfyearly_delib.studentid FROM `halfyearly_delib` WHERE halfyearly_delib.specialityid="TCSIGLSITW" and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid="SE1" and halfyearly_delib.decision="REFUSE" and halfyearly_delib.semesterid="SEM7" and halfyearly_delib.studentid in (select studentid from student_speciality where levelid=:idniv and acadyearid=:idanac and specialityid=:idspec)
   ' );

        $repos->execute(array('idspec'=>$idspec,'idanac'=>$idanac,'idniv'=>$idniv));



        $nombreadmisinfdfan=0;



        while($resultat = $repos->fetch()) {


            if($idniv=="L1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L3"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




            if($idniv=="M1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();



                if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);




                }else{




                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);


                }

            }



            if($idniv=="M2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}


            if($moyennean >=8 and $moyennean <10 and  $genreetud['kind']=="F")

            {
                $nombreadmisinfdfan=  $nombreadmisinfdfan+ 1;
            }




        }















        return       $nombreadmisinfdfan;









    }else {
        $repos = $bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare(' 
  SELECT DISTINCT halfyearly_delib.studentid   FROM `halfyearly_delib` WHERE halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid="SE1" and halfyearly_delib.decision="REFUSE"  and halfyearly_delib.studentid in (select studentid from student_speciality where levelid=:idniv and acadyearid=:idanac and specialityid=:idspec)
  
   ');

        $repos->execute(array('idspec' => $idspec, 'idanac' => $idanac, 'idniv' => $idniv));

        $nombreadmisinfdfan = 0;


        while ($resultat = $repos->fetch()) {



            if($idniv=="L1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L3"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




            if($idniv=="M1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();



                if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);




                }else{




                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);


                }

            }



            if($idniv=="M2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}


            if ($moyennean >= 8 and $moyennean < 10 and $genreetud['kind'] == "F") {
                $nombreadmisinfdfan = $nombreadmisinfdfan + 1;
            }


        }


        return $nombreadmisinfdfan;


    }













}






function nbadmisinfdg($idanac,$idspec,$idsem,$idses,$bdd)
{

    $repns=$bdd->prepare(" SELECT count(DISTINCT halfyearly_delib.studentid) as nbetudiant  FROM `halfyearly_delib` INNER JOIN student on student.id=halfyearly_delib.studentid WHERE halfyearly_delib.semesterid=:idsem and halfyearly_delib.sessionid=:idses and halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac  and halfyearly_delib.semaverage >=8 and halfyearly_delib.semaverage < 10  and student.kind like '%M%'");
    $repns->execute(array('idanac'=> $idanac, 'idsem'=> $idsem,'idspec'=> $idspec,'idses'=> $idses));
    $nbetudadg = $repns->fetch();



    $nombreadmisinfdg=$nbetudadg['nbetudiant'];




    return $nombreadmisinfdg;

}






function nbadmisinfdgan($idanac,$idspec,$idniv,$bdd)
{


    $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

    $repos = $bdd->prepare(' SELECT  DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib` INNER JOIN student on student.id=halfyearly_delib.studentid INNER JOIN student_speciality on student_speciality.studentid=student.id WHERE student_speciality.specialityid=:idspec  and student_speciality.acadyearid=:idanac and student_speciality.levelid=:idniv   order by student.firstname,student.lastname ' );

    $repos->execute(array('idspec'=>$idspec,'idanac'=>$idanac,'idniv'=>$idniv));

    $nombreadmisinfdgan=0;



    while($resultat = $repos->fetch()) {

        if($idniv=="L1"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



        if($idniv=="L2"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



        if($idniv=="L3"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




        if($idniv=="M1"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();



            if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);




            }else{




                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);


            }

        }



        if($idniv=="M2"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}






        if($moyennean >=8 and $moyennean <10 and  $genreetud['kind']=="M")

        {
            $nombreadmisinfdgan=   $nombreadmisinfdgan+ 1;
        }


    }


















    return        $nombreadmisinfdgan;

















}





function nbadmisinfdganse2($idanac,$idspec,$idniv,$bdd)
{

    if(($idniv=='M1' and $idspec=='SIGL')|| ($idniv=='M1' and $idspec=='SITW')){


        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare('  
  SELECT DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib` WHERE halfyearly_delib.specialityid="TCSIGLSITW" and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid="SE1" and halfyearly_delib.decision="REFUSE" and halfyearly_delib.semesterid="SEM7" and halfyearly_delib.studentid in (select studentid from student_speciality where levelid=:idniv and acadyearid=:idanac and specialityid=:idspec)
   ' );

        $repos->execute(array('idspec'=>$idspec,'idanac'=>$idanac,'idniv'=>$idniv));


        $nombreadmisinfdgan=0;



        while($resultat = $repos->fetch()) {



            if($idniv=="L1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L3"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




            if($idniv=="M1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();



                if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);




                }else{




                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);


                }

            }



            if($idniv=="M2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($moyennean >=8 and $moyennean <10 and  $genreetud['kind']=="M")

            {
                $nombreadmisinfdgan=   $nombreadmisinfdgan+ 1;
            }




        }















        return        $nombreadmisinfdgan;










    }else {

        $repos = $bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare('
  SELECT DISTINCT halfyearly_delib.studentid   FROM `halfyearly_delib` WHERE halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid="SE1" and halfyearly_delib.decision="REFUSE"  and halfyearly_delib.studentid in (select studentid from student_speciality where levelid=:idniv and acadyearid=:idanac and specialityid=:idspec)
  
   ');

        $repos->execute(array('idspec' => $idspec, 'idanac' => $idanac, 'idniv' => $idniv));

        $nombreadmisinfdgan = 0;


        while ($resultat = $repos->fetch()) {



            if($idniv=="L1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L3"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




            if($idniv=="M1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();



                if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);




                }else{




                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);


                }

            }



            if($idniv=="M2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}

            if ($moyennean >= 8 and $moyennean < 10 and $genreetud['kind'] == "M") {
                $nombreadmisinfdgan = $nombreadmisinfdgan + 1;
            }


        }


        return $nombreadmisinfdgan;


    }










}



function nbadmisinfd($idanac,$idspec,$idsem,$idses,$bdd)
{

    $repns=$bdd->prepare(" SELECT count(DISTINCT halfyearly_delib.studentid) as nbetudiant  FROM `halfyearly_delib` INNER JOIN student on student.id=halfyearly_delib.studentid WHERE halfyearly_delib.semesterid=:idsem and halfyearly_delib.sessionid=:idses and halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac  and halfyearly_delib.semaverage >=8 and halfyearly_delib.semaverage < 10 ");
    $repns->execute(array('idanac'=> $idanac, 'idsem'=> $idsem,'idspec'=> $idspec,'idses'=> $idses));
    $nbetudad = $repns->fetch();



    $nombreadmisinfd=$nbetudad['nbetudiant'];




    return $nombreadmisinfd;

}






function nbadmisinfdan($idanac,$idspec,$idniv,$bdd)
{


    $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

    $repos = $bdd->prepare(' SELECT  DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib` INNER JOIN student on student.id=halfyearly_delib.studentid INNER JOIN student_speciality on student_speciality.studentid=student.id WHERE student_speciality.specialityid=:idspec  and student_speciality.acadyearid=:idanac and student_speciality.levelid=:idniv   order by student.firstname,student.lastname ' );

    $repos->execute(array('idspec'=>$idspec,'idanac'=>$idanac,'idniv'=>$idniv));

    $nombreadmisinfdan=0;



    while($resultat = $repos->fetch()) {


        if($idniv=="L1"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



        if($idniv=="L2"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



        if($idniv=="L3"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




        if($idniv=="M1"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();



            if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);




            }else{




                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);


            }

        }



        if($idniv=="M2"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




        if($moyennean >=8 and $moyennean <10 )

        {
            $nombreadmisinfdan=  $nombreadmisinfdan+ 1;
        }


    }


















    return       $nombreadmisinfdan;

















}






function nbadmisinfdanse2($idanac,$idspec,$idniv,$bdd)
{


    if(($idniv=='M1' and $idspec=='SIGL')|| ($idniv=='M1' and $idspec=='SITW')){


        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare('  
  SELECT DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib` WHERE halfyearly_delib.specialityid="TCSIGLSITW" and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid="SE1" and halfyearly_delib.decision="REFUSE" and halfyearly_delib.semesterid="SEM7" and halfyearly_delib.studentid in (select studentid from student_speciality where levelid=:idniv and acadyearid=:idanac and specialityid=:idspec)
   ' );

        $repos->execute(array('idspec'=>$idspec,'idanac'=>$idanac,'idniv'=>$idniv));


        $nombreadmisinfdan=0;



        while($resultat = $repos->fetch()) {



            if($idniv=="L1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L3"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




            if($idniv=="M1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();



                if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);




                }else{




                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);


                }

            }



            if($idniv=="M2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}


            if($moyennean >=8 and $moyennean <10 )

            {
                $nombreadmisinfdan=  $nombreadmisinfdan+ 1;
            }




        }















        return       $nombreadmisinfdan;










    }else {


        $repos = $bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare(' 
  SELECT DISTINCT halfyearly_delib.studentid   FROM `halfyearly_delib` WHERE halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid="SE1" and halfyearly_delib.decision="REFUSE"  and halfyearly_delib.studentid in (select studentid from student_speciality where levelid=:idniv and acadyearid=:idanac and specialityid=:idspec)
  
  ');

        $repos->execute(array('idspec' => $idspec, 'idanac' => $idanac, 'idniv' => $idniv));

        $nombreadmisinfdan = 0;


        while ($resultat = $repos->fetch()) {



            if($idniv=="L1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L3"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




            if($idniv=="M1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();



                if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);




                }else{




                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);


                }

            }



            if($idniv=="M2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}


            if ($moyennean >= 8 and $moyennean < 10) {
                $nombreadmisinfdan = $nombreadmisinfdan + 1;
            }


        }


        return $nombreadmisinfdan;


    }





}




function nbadmissupdixf($idanac,$idspec,$idsem,$idses,$bdd)
{

    $repns=$bdd->prepare(" SELECT count(DISTINCT halfyearly_delib.studentid) as nbetudiant  FROM `halfyearly_delib` INNER JOIN student on student.id=halfyearly_delib.studentid WHERE halfyearly_delib.semesterid=:idsem and halfyearly_delib.sessionid=:idses and halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac  and halfyearly_delib.semaverage >=10  and student.kind like '%F%' ");
    $repns->execute(array('idanac'=> $idanac, 'idsem'=> $idsem,'idspec'=> $idspec,'idses'=> $idses));
    $nbetudadf = $repns->fetch();



    $nombreadmisf=$nbetudadf['nbetudiant'];




    return $nombreadmisf;

}





function nbadmissupdixfan($idanac,$idspec,$idniv,$bdd)
{


    $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

    $repos = $bdd->prepare(' SELECT  DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib` INNER JOIN student on student.id=halfyearly_delib.studentid INNER JOIN student_speciality on student_speciality.studentid=student.id WHERE student_speciality.specialityid=:idspec  and student_speciality.acadyearid=:idanac and student_speciality.levelid=:idniv   order by student.firstname,student.lastname ' );

    $repos->execute(array('idspec'=>$idspec,'idanac'=>$idanac,'idniv'=>$idniv));

    $nombreadmisfan=0;



    while($resultat = $repos->fetch()) {


        if($idniv=="L1"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



        if($idniv=="L2"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



        if($idniv=="L3"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




        if($idniv=="M1"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();



            if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);




            }else{




                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);


            }

        }



        if($idniv=="M2"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




        if($moyennean >=10 and  $genreetud['kind']=="F")

        {
            $nombreadmisfan=   $nombreadmisfan+ 1;
        }


    }


















    return         $nombreadmisfan;

















}



function nbadmissupdixfanse2($idanac,$idspec,$idniv,$bdd)
{

    if(($idniv=='M1' and $idspec=='SIGL')|| ($idniv=='M1' and $idspec=='SITW')){


        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare('  
  SELECT DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib` WHERE halfyearly_delib.specialityid="TCSIGLSITW" and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid="SE1" and halfyearly_delib.decision="REFUSE" and halfyearly_delib.semesterid="SEM7" and halfyearly_delib.studentid in (select studentid from student_speciality where levelid=:idniv and acadyearid=:idanac and specialityid=:idspec)
   ' );

        $repos->execute(array('idspec'=>$idspec,'idanac'=>$idanac,'idniv'=>$idniv));



        $nombreadmisfan=0;



        while($resultat = $repos->fetch()) {



            if($idniv=="L1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L3"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




            if($idniv=="M1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();



                if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);




                }else{




                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);


                }

            }



            if($idniv=="M2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($moyennean >=10 and  $genreetud['kind']=="F")

            {
                $nombreadmisfan=   $nombreadmisfan+ 1;
            }




        }















        return         $nombreadmisfan;








    }else {

        $repos = $bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare('
  SELECT DISTINCT halfyearly_delib.studentid   FROM `halfyearly_delib` WHERE halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid="SE1" and halfyearly_delib.decision="REFUSE"  and halfyearly_delib.studentid in (select studentid from student_speciality where levelid=:idniv and acadyearid=:idanac and specialityid=:idspec)
  
  ');

        $repos->execute(array('idspec' => $idspec, 'idanac' => $idanac, 'idniv' => $idniv));

        $nombreadmisfan = 0;


        while ($resultat = $repos->fetch()) {



            if($idniv=="L1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L3"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




            if($idniv=="M1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();



                if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);




                }else{




                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);


                }

            }



            if($idniv=="M2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}

            if ($moyennean >= 10 and $genreetud['kind'] == "F") {
                $nombreadmisfan = $nombreadmisfan + 1;
            }


        }


        return $nombreadmisfan;


    }









}





function nbadmissupdixg($idanac,$idspec,$idsem,$idses,$bdd)
{

    $repns=$bdd->prepare(" SELECT count(DISTINCT halfyearly_delib.studentid) as nbetudiant  FROM `halfyearly_delib` INNER JOIN student on student.id=halfyearly_delib.studentid WHERE halfyearly_delib.semesterid=:idsem and halfyearly_delib.sessionid=:idses and halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac  and halfyearly_delib.semaverage >=10  and student.kind like '%M%' ");
    $repns->execute(array('idanac'=> $idanac, 'idsem'=> $idsem,'idspec'=> $idspec,'idses'=> $idses));
    $nbetudadg = $repns->fetch();



    $nombreadmisg=$nbetudadg['nbetudiant'];




    return $nombreadmisg;

}






function nbadmissupdixgan($idanac,$idspec,$idniv,$bdd)
{


    $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

    $repos = $bdd->prepare(' SELECT  DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib` INNER JOIN student on student.id=halfyearly_delib.studentid INNER JOIN student_speciality on student_speciality.studentid=student.id WHERE student_speciality.specialityid=:idspec  and student_speciality.acadyearid=:idanac and student_speciality.levelid=:idniv   order by student.firstname,student.lastname ' );

    $repos->execute(array('idspec'=>$idspec,'idanac'=>$idanac,'idniv'=>$idniv));

    $nombreadmisgan=0;



    while($resultat = $repos->fetch()) {


        if($idniv=="L1"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



        if($idniv=="L2"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



        if($idniv=="L3"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




        if($idniv=="M1"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();



            if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);




            }else{




                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);


            }

        }



        if($idniv=="M2"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}

        if($moyennean >=10 and  $genreetud['kind']=="M")

        {
            $nombreadmisgan=  $nombreadmisgan+ 1;
        }



    }


















    return         $nombreadmisgan;

















}






function nbadmissupdixganse2($idanac,$idspec,$idniv,$bdd)
{

    if(($idniv=='M1' and $idspec=='SIGL')|| ($idniv=='M1' and $idspec=='SITW')){


        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare('  
  SELECT DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib` WHERE halfyearly_delib.specialityid="TCSIGLSITW" and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid="SE1" and halfyearly_delib.decision="REFUSE" and halfyearly_delib.semesterid="SEM7" and halfyearly_delib.studentid in (select studentid from student_speciality where levelid=:idniv and acadyearid=:idanac and specialityid=:idspec)
   ' );

        $repos->execute(array('idspec'=>$idspec,'idanac'=>$idanac,'idniv'=>$idniv));


        $nombreadmisgan=0;



        while($resultat = $repos->fetch()) {


            if($idniv=="L1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L3"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




            if($idniv=="M1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();



                if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);




                }else{




                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);


                }

            }



            if($idniv=="M2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}


            if($moyennean >=10 and  $genreetud['kind']=="M")

            {
                $nombreadmisgan=  $nombreadmisgan+ 1;
            }




        }















        return         $nombreadmisgan;










    }else {

        $repos = $bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare(' 
  SELECT DISTINCT halfyearly_delib.studentid   FROM `halfyearly_delib` WHERE halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid="SE1" and halfyearly_delib.decision="REFUSE"  and halfyearly_delib.studentid in (select studentid from student_speciality where levelid=:idniv and acadyearid=:idanac and specialityid=:idspec)
  
   ');

        $repos->execute(array('idspec' => $idspec, 'idanac' => $idanac, 'idniv' => $idniv));

        $nombreadmisgan = 0;


        while ($resultat = $repos->fetch()) {



            if($idniv=="L1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L3"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




            if($idniv=="M1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();



                if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);




                }else{




                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);


                }

            }



            if($idniv=="M2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}


            if ($moyennean >= 10 and $genreetud['kind'] == "M") {
                $nombreadmisgan = $nombreadmisgan + 1;
            }


        }


        return $nombreadmisgan;


    }











}






function nbadmissupdix($idanac,$idspec,$idsem,$idses,$bdd)
{

    $repns=$bdd->prepare(" SELECT count(DISTINCT halfyearly_delib.studentid) as nbetudiant  FROM `halfyearly_delib` INNER JOIN student on student.id=halfyearly_delib.studentid WHERE halfyearly_delib.semesterid=:idsem and halfyearly_delib.sessionid=:idses and halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac  and halfyearly_delib.semaverage >=10");
    $repns->execute(array('idanac'=> $idanac, 'idsem'=> $idsem,'idspec'=> $idspec,'idses'=> $idses));
    $nbetudad = $repns->fetch();



    $nombreadmis=$nbetudad['nbetudiant'];




    return $nombreadmis;

}






function nbadmissupdixan($idanac,$idspec,$idniv,$bdd)
{


    $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

    $repos = $bdd->prepare(' SELECT  DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib` INNER JOIN student on student.id=halfyearly_delib.studentid INNER JOIN student_speciality on student_speciality.studentid=student.id WHERE student_speciality.specialityid=:idspec  and student_speciality.acadyearid=:idanac and student_speciality.levelid=:idniv   order by student.firstname,student.lastname ' );

    $repos->execute(array('idspec'=>$idspec,'idanac'=>$idanac,'idniv'=>$idniv));

    $nombreadmisan=0;



    while($resultat = $repos->fetch()) {


        if($idniv=="L1"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



        if($idniv=="L2"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



        if($idniv=="L3"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




        if($idniv=="M1"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();



            if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);




            }else{




                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);


            }

        }



        if($idniv=="M2"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



        if($moyennean >=10 )

        {
            $nombreadmisan=  $nombreadmisan+ 1;
        }



    }


















    return        $nombreadmisan;

















}





function nbadmissupdixanse2($idanac,$idspec,$idniv,$bdd)
{

    if(($idniv=='M1' and $idspec=='SIGL')|| ($idniv=='M1' and $idspec=='SITW')){


        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare('  
  SELECT DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib` WHERE halfyearly_delib.specialityid="TCSIGLSITW" and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid="SE1" and halfyearly_delib.decision="REFUSE" and halfyearly_delib.semesterid="SEM7" and halfyearly_delib.studentid in (select studentid from student_speciality where levelid=:idniv and acadyearid=:idanac and specialityid=:idspec)
   ' );

        $repos->execute(array('idspec'=>$idspec,'idanac'=>$idanac,'idniv'=>$idniv));




        $nombreadmisan=0;



        while($resultat = $repos->fetch()) {



            if($idniv=="L1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L3"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




            if($idniv=="M1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();



                if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);




                }else{




                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);


                }

            }



            if($idniv=="M2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}


            if($moyennean >=10 )

            {
                $nombreadmisan=  $nombreadmisan+ 1;
            }




        }















        return        $nombreadmisan;









    }else {


        $repos = $bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare(' 
  SELECT DISTINCT halfyearly_delib.studentid   FROM `halfyearly_delib` WHERE halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid="SE1" and halfyearly_delib.decision="REFUSE"  and halfyearly_delib.studentid in (select studentid from student_speciality where levelid=:idniv and acadyearid=:idanac and specialityid=:idspec)
  
   ');

        $repos->execute(array('idspec' => $idspec, 'idanac' => $idanac, 'idniv' => $idniv));

        $nombreadmisan = 0;


        while ($resultat = $repos->fetch()) {



            if($idniv=="L1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($idniv=="L3"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




            if($idniv=="M1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();



                if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);




                }else{




                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }







                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);


                }

            }



            if($idniv=="M2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}


            if ($moyennean >= 10) {
                $nombreadmisan = $nombreadmisan + 1;
            }


        }


        return $nombreadmisan;


    }














}







function nbadmisdecisf($idanac,$idspec,$idsem,$idses,$bdd)
{

    $repns=$bdd->prepare("  SELECT count(DISTINCT halfyearly_delib.studentid) as nbetudiant  FROM `halfyearly_delib` INNER JOIN student on student.id=halfyearly_delib.studentid WHERE halfyearly_delib.semesterid=:idsem and halfyearly_delib.sessionid=:idses and halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac  and halfyearly_delib.decision='ADMIS'  and student.kind like '%F%' ");
    $repns->execute(array('idanac'=> $idanac, 'idsem'=> $idsem,'idspec'=> $idspec,'idses'=> $idses));
    $nbetudaddcf = $repns->fetch();



    $nombreadmisdecisf=$nbetudaddcf['nbetudiant'];




    return $nombreadmisdecisf;

}



function nbadmisdecisfan($idanac,$idspec,$idniv,$bdd)
{


    $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

    $repos = $bdd->prepare(' SELECT  DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib` INNER JOIN student on student.id=halfyearly_delib.studentid INNER JOIN student_speciality on student_speciality.studentid=student.id WHERE student_speciality.specialityid=:idspec  and student_speciality.acadyearid=:idanac and student_speciality.levelid=:idniv   order by student.firstname,student.lastname ' );

    $repos->execute(array('idspec'=>$idspec,'idanac'=>$idanac,'idniv'=>$idniv));

    $nombreadmisdecisfan=0;



    while($resultat = $repos->fetch()) {


        if($idniv=="L1"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            }



        if($idniv=="L2"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            }



        if($idniv=="L3"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            }




        if($idniv=="M1"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();



            if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }












            }else{




                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }










            }

        }



        if($idniv=="M2"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







            }














        if($decisionsem1=='ADMIS' and  $decisionsem2=='ADMIS' and $genreetud['kind']=="F")

        {
            $nombreadmisdecisfan=   $nombreadmisdecisfan+ 1;
        }




    }


















    return          $nombreadmisdecisfan;

















}






function nbadmisdecisfanse2($idanac,$idspec,$idniv,$bdd)
{


    if(($idniv=='M1' and $idspec=='SIGL')|| ($idniv=='M1' and $idspec=='SITW')){


        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare(' 
  SELECT DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib` WHERE halfyearly_delib.specialityid="TCSIGLSITW" and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid="SE1" and halfyearly_delib.decision="REFUSE" and halfyearly_delib.semesterid="SEM7" and halfyearly_delib.studentid in (select studentid from student_speciality where levelid=:idniv and acadyearid=:idanac and specialityid=:idspec)
  ' );

        $repos->execute(array('idspec'=>$idspec,'idanac'=>$idanac,'idniv'=>$idniv));

        $nombreadmisdecisfan=0;



        while($resultat = $repos->fetch()) {

            if($idniv=="L1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







            }



            if($idniv=="L2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







            }



            if($idniv=="L3"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







            }




            if($idniv=="M1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();



                if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }












                }else{




                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }










                }

            }



            if($idniv=="M2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







            }





            if($decisionsem1=='ADMIS' and  $decisionsem2=='ADMIS' and $genreetud['kind']=="F")

            {
                $nombreadmisdecisfan=   $nombreadmisdecisfan+ 1;
            }




        }















        return          $nombreadmisdecisfan;











    }else {


        $repos = $bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare(' 
  SELECT DISTINCT halfyearly_delib.studentid   FROM `halfyearly_delib` WHERE halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid="SE1" and halfyearly_delib.decision="REFUSE"  and halfyearly_delib.studentid in (select studentid from student_speciality where levelid=:idniv and acadyearid=:idanac and specialityid=:idspec)
  
  ');

        $repos->execute(array('idspec' => $idspec, 'idanac' => $idanac, 'idniv' => $idniv));

        $nombreadmisdecisfan = 0;


        while ($resultat = $repos->fetch()) {

            if($idniv=="L1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







            }



            if($idniv=="L2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







            }



            if($idniv=="L3"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







            }




            if($idniv=="M1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();



                if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }












                }else{




                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }










                }

            }



            if($idniv=="M2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







            }


            if ($decisionsem1 == 'ADMIS' and $decisionsem2 == 'ADMIS' and $genreetud['kind'] == "F") {
                $nombreadmisdecisfan = $nombreadmisdecisfan + 1;
            }


        }


        return $nombreadmisdecisfan;


    }












}








function nbadmisdecisg($idanac,$idspec,$idsem,$idses,$bdd)
{

    $repns=$bdd->prepare(" SELECT count(DISTINCT halfyearly_delib.studentid) as nbetudiant  FROM `halfyearly_delib` INNER JOIN student on student.id=halfyearly_delib.studentid WHERE halfyearly_delib.semesterid=:idsem and halfyearly_delib.sessionid=:idses and halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac  and halfyearly_delib.decision='ADMIS'  and student.kind like '%M%' ");
    $repns->execute(array('idanac'=> $idanac, 'idsem'=> $idsem,'idspec'=> $idspec,'idses'=> $idses));
    $nbetudaddcg = $repns->fetch();



    $nombreadmisdecisg=$nbetudaddcg['nbetudiant'];




    return $nombreadmisdecisg;

}




function nbadmisdecisgan($idanac,$idspec,$idniv,$bdd)
{


    $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

    $repos = $bdd->prepare(' SELECT  DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib` INNER JOIN student on student.id=halfyearly_delib.studentid INNER JOIN student_speciality on student_speciality.studentid=student.id WHERE student_speciality.specialityid=:idspec  and student_speciality.acadyearid=:idanac and student_speciality.levelid=:idniv   order by student.firstname,student.lastname ' );

    $repos->execute(array('idspec'=>$idspec,'idanac'=>$idanac,'idniv'=>$idniv));

    $nombreadmisdecisgan=0;



    while($resultat = $repos->fetch()) {


        if($idniv=="L1"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







        }



        if($idniv=="L2"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







        }



        if($idniv=="L3"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







        }




        if($idniv=="M1"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();



            if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }












            }else{




                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }










            }

        }



        if($idniv=="M2"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







        }




        if($decisionsem1=='ADMIS' and  $decisionsem2=='ADMIS' and $genreetud['kind']=="M")

        {
            $nombreadmisdecisgan=    $nombreadmisdecisgan+ 1;
        }



    }


















    return           $nombreadmisdecisgan;

















}




function nbadmisdecisganse2($idanac,$idspec,$idniv,$bdd)
{

    if(($idniv=='M1' and $idspec=='SIGL')|| ($idniv=='M1' and $idspec=='SITW')){


        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare('   SELECT DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib` WHERE halfyearly_delib.specialityid="TCSIGLSITW" and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid="SE1" and halfyearly_delib.decision="REFUSE" and halfyearly_delib.semesterid="SEM7" and halfyearly_delib.studentid in (select studentid from student_speciality where levelid=:idniv and acadyearid=:idanac and specialityid=:idspec)
   ' );

        $repos->execute(array('idspec'=>$idspec,'idanac'=>$idanac,'idniv'=>$idniv));


        $nombreadmisdecisgan=0;



        while($resultat = $repos->fetch()) {


            if($idniv=="L1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







            }



            if($idniv=="L2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







            }



            if($idniv=="L3"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







            }




            if($idniv=="M1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();



                if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }












                }else{




                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }










                }

            }



            if($idniv=="M2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







            }



            if($decisionsem1=='ADMIS' and  $decisionsem2=='ADMIS' and $genreetud['kind']=="M")

            {
                $nombreadmisdecisgan=    $nombreadmisdecisgan+ 1;
            }




        }















        return           $nombreadmisdecisgan;












    }else {
        $repos = $bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare(' 
  SELECT  DISTINCT halfyearly_delib.studentid   FROM `halfyearly_delib` WHERE halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid="SE1" and halfyearly_delib.decision="REFUSE"  and halfyearly_delib.studentid in (select studentid from student_speciality where levelid=:idniv and acadyearid=:idanac and specialityid=:idspec)
  
   ');

        $repos->execute(array('idspec' => $idspec, 'idanac' => $idanac, 'idniv' => $idniv));

        $nombreadmisdecisgan = 0;


        while ($resultat = $repos->fetch()) {


            if($idniv=="L1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







            }



            if($idniv=="L2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







            }



            if($idniv=="L3"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







            }




            if($idniv=="M1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();



                if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }












                }else{




                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }










                }

            }



            if($idniv=="M2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







            }



            if ($decisionsem1 == 'ADMIS' and $decisionsem2 == 'ADMIS' and $genreetud['kind'] == "M") {
                $nombreadmisdecisgan = $nombreadmisdecisgan + 1;
            }


        }


        return $nombreadmisdecisgan;


    }








}




function nbadmisdecis($idanac,$idspec,$idsem,$idses,$bdd)
{

    $repns=$bdd->prepare(" SELECT count(DISTINCT halfyearly_delib.studentid) as nbetudiant  FROM `halfyearly_delib` INNER JOIN student on student.id=halfyearly_delib.studentid WHERE halfyearly_delib.semesterid=:idsem and halfyearly_delib.sessionid=:idses and halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac  and halfyearly_delib.decision='ADMIS' ");
    $repns->execute(array('idanac'=> $idanac, 'idsem'=> $idsem,'idspec'=> $idspec,'idses'=> $idses));
    $nbetudaddc = $repns->fetch();



    $nombreadmisdecis=$nbetudaddc['nbetudiant'];




    return $nombreadmisdecis;

}





function nbadmisdecisan($idanac,$idspec,$idniv,$bdd)
{


    $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

    $repos = $bdd->prepare(' SELECT  DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib` INNER JOIN student on student.id=halfyearly_delib.studentid INNER JOIN student_speciality on student_speciality.studentid=student.id WHERE student_speciality.specialityid=:idspec  and student_speciality.acadyearid=:idanac and student_speciality.levelid=:idniv   order by student.firstname,student.lastname ' );

    $repos->execute(array('idspec'=>$idspec,'idanac'=>$idanac,'idniv'=>$idniv));

    $nombreadmisdecisan=0;



    while($resultat = $repos->fetch()) {




        if($idniv=="L1"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







        }



        if($idniv=="L2"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







        }



        if($idniv=="L3"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







        }




        if($idniv=="M1"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();



            if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }












            }else{




                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }










            }

        }



        if($idniv=="M2"){
            $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
            $repns->execute(array('idetudiant'=> $resultat['studentid']));
            $genreetud = $repns->fetch();





            $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

            $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac1 = $repost->fetch();


            if(decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
            }




            $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

            $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

            $anac2 = $repost2->fetch();

            if(decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
            }else{
                $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
            }







        }


        if($decisionsem1=='ADMIS' and  $decisionsem2=='ADMIS')

        {
            $nombreadmisdecisan=  $nombreadmisdecisan+ 1;
        }


    }


















    return         $nombreadmisdecisan;

















}






function nbadmisdecisanse2($idanac,$idspec,$idniv,$bdd)
{

    if(($idniv=='M1' and $idspec=='SIGL')|| ($idniv=='M1' and $idspec=='SITW')){


        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare('   SELECT DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib` WHERE halfyearly_delib.specialityid="TCSIGLSITW" and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid="SE1" and halfyearly_delib.decision="REFUSE" and halfyearly_delib.semesterid="SEM7" and halfyearly_delib.studentid in (select studentid from student_speciality where levelid=:idniv and acadyearid=:idanac and specialityid=:idspec)
   ' );

        $repos->execute(array('idspec'=>$idspec,'idanac'=>$idanac,'idniv'=>$idniv));



        $nombreadmisdecisan = 0;


        while ($resultat = $repos->fetch()) {


            if($idniv=="L1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







            }



            if($idniv=="L2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







            }



            if($idniv=="L3"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







            }




            if($idniv=="M1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();



                if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }












                }else{




                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }










                }

            }



            if($idniv=="M2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







            }

            if ($decisionsem1 == 'ADMIS' and $decisionsem2 == 'ADMIS') {
                $nombreadmisdecisan = $nombreadmisdecisan + 1;
            }


        }


        return $nombreadmisdecisan;








    }else {


        $repos = $bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare(' 
  SELECT DISTINCT halfyearly_delib.studentid   FROM `halfyearly_delib` WHERE halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid="SE1" and halfyearly_delib.decision="REFUSE"  and halfyearly_delib.studentid in (select studentid from student_speciality where levelid=:idniv and acadyearid=:idanac and specialityid=:idspec)
  
   ');

        $repos->execute(array('idspec' => $idspec, 'idanac' => $idanac, 'idniv' => $idniv));

        $nombreadmisdecisan = 0;


        while ($resultat = $repos->fetch()) {


            if($idniv=="L1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







            }



            if($idniv=="L2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







            }



            if($idniv=="L3"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







            }




            if($idniv=="M1"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();



                if($idspec=='RTEL'|| $idspec=="MDSI" || $idspec=='MBDS'){


                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }












                }else{




                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }










                }

            }



            if($idniv=="M2"){
                $repns=$bdd->prepare(" SELECT kind FROM student WHERE id=:idetudiant");
                $repns->execute(array('idetudiant'=> $resultat['studentid']));
                $genreetud = $repns->fetch();





                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }







            }

            if ($decisionsem1 == 'ADMIS' and $decisionsem2 == 'ADMIS') {
                $nombreadmisdecisan = $nombreadmisdecisan + 1;
            }


        }


        return $nombreadmisdecisan;


    }














}





function maxaveragesemestrielle( $idspec, $idsem, $idses, $idanac,$bdd)
{

    $repns=$bdd->prepare("SELECT  DISTINCT studentid FROM `halfyearly_delib` WHERE   specialityid=:idspecialite  and acadyearid=:idanac  and semesterid=:idsemestre and sessionid=:idsession  ");
    $repns->execute(array('idanac'=> $idanac, 'idsemestre'=> $idsem,'idspecialite'=> $idspec,'idsession'=> $idses));






    $avermax=0;

    while( $idstud = $repns->fetch()){







        if(moyennesemestrielle($idstud['studentid'],$idsem,$idanac,$idspec,$idses,$bdd)>=$avermax){
            $avermax=moyennesemestrielle($idstud['studentid'],$idsem,$idanac,$idspec,$idses,$bdd);
        }









    }
    $maxaverage=$avermax;


    return $maxaverage;








}



function minaveragesemestrielle( $idspec, $idsem, $idses, $idanac,$bdd)
{



    $repns=$bdd->prepare("SELECT  DISTINCT studentid FROM `halfyearly_delib` WHERE   specialityid=:idspecialite  and acadyearid=:idanac  and semesterid=:idsemestre and sessionid=:idsession  ");
    $repns->execute(array('idanac'=> $idanac, 'idsemestre'=> $idsem,'idspecialite'=> $idspec,'idsession'=> $idses));





    $moyfai=21;
    while( $idstud = $repns->fetch()){









        if(moyennesemestrielle($idstud['studentid'],$idsem,$idanac,$idspec,$idses,$bdd) <= $moyfai){

            $moyfai=moyennesemestrielle($idstud['studentid'],$idsem,$idanac,$idspec,$idses,$bdd);

        }


    }
    $faiblemoyennesemestrielle=$moyfai ;

    return $faiblemoyennesemestrielle ;












}



function averageofspecsemestrielle($idspec, $idsem, $idses, $idanac,$bdd)
{





    $repns=$bdd->prepare("SELECT  DISTINCT studentid FROM `halfyearly_delib` WHERE   specialityid=:idspecialite  and acadyearid=:idanac  and semesterid=:idsemestre and sessionid=:idsession  ");
    $repns->execute(array('idanac'=> $idanac, 'idsemestre'=> $idsem,'idspecialite'=> $idspec,'idsession'=> $idses));




    $nbstudclass=0;
    $averclass=0;


    while( $idstud = $repns->fetch()){

        $nbstudclass=$nbstudclass + 1;

        $avercl=moyennesemestrielle($idstud['studentid'],$idsem,$idanac,$idspec,$idses,$bdd);
        $averclass=$averclass + $avercl;











    }
    $numstdclass=$nbstudclass;
    $averofclass=$averclass;

    $averageofclass=number_format(($averofclass/$numstdclass),2);

    return $averageofclass ;










}
