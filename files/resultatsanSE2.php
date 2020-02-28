<?php
include("myfunctions.php");
?>
<page  backbottom="15mm" backtop="70mm" >


    <page_header>



        <table width="auto" border="0" cellspacing="0" style="margin-top: 10px">
            <tr>
                <td style="font-size:12px;">&nbsp;&nbsp;&nbsp;MINISTERE DE L'ECONOMIE NUMERIQUE </td> <td><span style="font-size:12px; margin-left:260px;">REPUBLIQUE DE CÔTE D'IVOIRE</span></td>
            </tr> <tr><td style="font-size:12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ET DE LA POSTE </td> <td><span style="font-size:14px; margin-left:320px;">.....................</span></td> </tr>
            <tr> <td><span style="font-size:14px; margin-left:80px; ">...........................</span></td><td><span style="font-size:14px; margin-left:280px;"><strong>Union_ Discipline _Travail</strong> </span></td></tr> <tr><td><span style="font-size:12px; "><img src="esatic.jpg"  alt="logoesatic" style="margin-left: 50px;" /></span></td><td><span style="font-size:20px; margin-left:40px;"></span></td></tr><tr><td><span style="font-size:12px; margin-left:80px;"> <strong>...........................</strong></span> </td> </tr><tr>  <td><strong>&nbsp;&nbsp;&nbsp;DIRECTION DE LA PEDAGOGIE</strong>  </td> </tr><tr><td><span style="font-size:12px; margin-left:26px;"></span></td></tr><tr><td><span style="font-size:12px; margin-left:26px;"></span></td></tr>
        </table><br><br>
        <span style="margin-left:100px;font-size:16px; "><strong> RESULTATS  DE LA 2<sup>ème</sup> SESSION DE L'ANNEE ACADEMIQUE <?php echo  $idanac;?></strong></span><br><span style="margin-left:300px;font-size:18px; "><strong><?php echo  $levelid;?> :<?php echo  $idspec;?></strong></span><br><span style="margin-left:220px;font-size:14px; "><strong>(LISTE DES ADMIS PAR ORDRE DE MERITE)</strong></span><br><br>

    </page_header>

    <br><br>


    <page_footer>

        <span style="margin-left:20px; font-size:10px; margin-top:150px;  font-style:italic;"> <?php echo $date;?></span>   <span style="margin-left:220px;font-size:12px; margin-top:150px; font-weight:bold"></span><span style="margin-left:320px; font-size:10px; margin-top:150px;  font-style:italic;"> [[page_cu]]/[[page_nb]]</span>
    </page_footer>



    <table style="border:solid 1px black;  text-align:center; font-size:11px;  border-collapse:collapse; " align="center">
        <col style="width: 3%">
        <col style="width: 7%">

        <col style="width: 15%">

        <col style="width: 13%">

        <col style="width:25%">
        <col style="width: 6%">
        <col style="width:15%">
        <col style="width: 10%">

        <col style="width: 15%">











        <thead>

        <tr><th style="text-align: center; border: solid 1px black; " > N°</th>

            <th style="text-align: center; border: solid 1px black; " > CLASSE</th>

            <th style="text-align: center; border: solid 1px black; " > MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " > NOM </th>
            <th style="text-align: center; border: solid 1px black; " > PRENOMS </th>
            <th style="text-align: center; border: solid 1px black; " >GENRE </th>



            <th style="text-align: center; border: solid 1px black;  " >MOYENNE ANNUELLE </th>


            <th style="text-align: center; border: solid 1px black;  " >DECISION DU JURY </th>






        </tr>


        </thead>
        <?php $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");
        $repos=$bdd->query("SET @@global.sql_mode=(SELECT REPLACE(@@global.sql_mode, 'ONLY_FULL_GROUP_BY', ''))");


        $repos = $bdd->prepare('  
 
 SELECT DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib` WHERE halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac and halfyearly_delib.sessionid="SE1" and halfyearly_delib.decision="REFUSE" and halfyearly_delib.studentid in (select studentid from student_speciality where levelid=:idniv and acadyearid=:idanac)
 
 
 ' );

        $repos->execute(array('idspec'=>$idspec,'idanac'=>$idanac,'idniv'=>$levelid));


        $k=1;


        while($resultat = $repos->fetch()) {

            if($levelid=="L1"){

                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }
                if(decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }

                if(decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }






                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}



            if($levelid=="L2"){

                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }
                if(decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }

                if(decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }






                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}






            if($levelid=="M1"){


                if($idspec=='RTEL'|| $idspec=='MDSI'|| $idspec=='MBDS'){
                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }
                    if(decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }

                    if(decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }






                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);
                }
                else
                {
                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idetudiant'=>$resultat['studentid']));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }
                    if(decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }

                    if(decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }






                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);
                }

            }






            if($levelid=="L3"){

                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }
                if(decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }

                if(decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }






                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}


            if($levelid=="M2"){

                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }
                if(decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($resultat['studentid'],'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$resultat['studentid']));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }

                if(decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($resultat['studentid'],'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }






                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);



            }















            $tabidsem[]=$resultat['studentid'];
            $tabmgsem[]=$moyennean;


        }


        array_multisort($tabmgsem,SORT_DESC,$tabidsem);




        foreach($tabidsem as $idetud) {




            $repro = $bdd->prepare('SELECT student.*, DATE_FORMAT(student.birthdate, \' %d/%m /%Y\') AS datenaiss,student_speciality.* FROM  student INNER JOIN student_speciality on student.id=student_speciality.studentid  where student.id=:idetudiant and student_speciality.acadyearid=:idanac ');
            $repro->execute(array('idetudiant' => $idetud, 'idanac'=> $idanac));
            $identite = $repro->fetch();





            if($levelid="L1"){

                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM1'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$idetud));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($idetud,'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($idetud,'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($idetud,'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }
                if(decisionsemestrielle($idetud,'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($idetud,'SEM1',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($idetud,'SEM1',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM2'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$idetud));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($idetud,'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($idetud,'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($idetud,'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }

                if(decisionsemestrielle($idetud,'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($idetud,'SEM2',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($idetud,'SEM2',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }






                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




            if($levelid="L2"){

                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM3'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$idetud));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($idetud,'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($idetud,'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($idetud,'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }
                if(decisionsemestrielle($idetud,'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($idetud,'SEM3',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($idetud,'SEM3',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM4'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$idetud));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($idetud,'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($idetud,'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($idetud,'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }

                if(decisionsemestrielle($idetud,'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($idetud,'SEM4',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($idetud,'SEM4',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }






                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




            if($levelid="M1"){


                if($idspec=='MDSI'|| $idspec=='RTEL'|| $idspec=='MBDS'){




                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$idetud));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($idetud,'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($idetud,'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($idetud,'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }
                    if(decisionsemestrielle($idetud,'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $decisionsem1=decisionsemestrielle($idetud,'SEM7',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $decisionsem1=decisionsemestrielle($idetud,'SEM7',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$idetud));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($idetud,'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($idetud,'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($idetud,'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }

                    if(decisionsemestrielle($idetud,'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $decisionsem2=decisionsemestrielle($idetud,'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $decisionsem2=decisionsemestrielle($idetud,'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }






                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);





                }else{





                    $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid='TCSIGLSITW' and semesterid='SEM7'  order by acadyearid DESC  LIMIT 1 " );

                    $repost->execute(array('idetudiant'=>$idetud));

                    $anac1 = $repost->fetch();


                    if(moyennnesemestrielle($idetud,'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $moyennesem1=moyennnesemestrielle($idetud,'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $moyennesem1=moyennnesemestrielle($idetud,'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }
                    if(decisionsemestrielle($idetud,'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd)==""){
                        $decisionsem1=decisionsemestrielle($idetud,'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE1',$bdd);
                    }else{
                        $decisionsem1=decisionsemestrielle($idetud,'SEM7',$anac1['acadyearid'],'TCSIGLSITW','SE2',$bdd);
                    }




                    $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM8'  order by acadyearid DESC  LIMIT 1 " );

                    $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$idetud));

                    $anac2 = $repost2->fetch();

                    if(moyennnesemestrielle($idetud,'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $moyennesem2=moyennnesemestrielle($idetud,'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $moyennesem2=moyennnesemestrielle($idetud,'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }

                    if(decisionsemestrielle($idetud,'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                        $decisionsem2=decisionsemestrielle($idetud,'SEM8',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                    }else{
                        $decisionsem2=decisionsemestrielle($idetud,'SEM8',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                    }






                    $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);







                }



            }













            if($levelid=="L3"){

                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM5'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$idetud));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($idetud,'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($idetud,'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($idetud,'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }
                if(decisionsemestrielle($idetud,'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($idetud,'SEM5',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($idetud,'SEM5',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM6'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$idetud));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($idetud,'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($idetud,'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($idetud,'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }

                if(decisionsemestrielle($idetud,'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($idetud,'SEM6',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($idetud,'SEM6',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }






                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}


            if($levelid=="M2"){

                $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

                $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$idetud));

                $anac1 = $repost->fetch();


                if(moyennnesemestrielle($idetud,'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem1=moyennnesemestrielle($idetud,'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem1=moyennnesemestrielle($idetud,'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }
                if(decisionsemestrielle($idetud,'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem1=decisionsemestrielle($idetud,'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem1=decisionsemestrielle($idetud,'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
                }




                $repost2 = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM10'  order by acadyearid DESC  LIMIT 1 " );

                $repost2->execute(array('idspecialite'=>$idspec,'idetudiant'=>$idetud));

                $anac2 = $repost2->fetch();

                if(moyennnesemestrielle($idetud,'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $moyennesem2=moyennnesemestrielle($idetud,'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $moyennesem2=moyennnesemestrielle($idetud,'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }

                if(decisionsemestrielle($idetud,'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd)==""){
                    $decisionsem2=decisionsemestrielle($idetud,'SEM10',$anac2['acadyearid'],$idspec,'SE1',$bdd);
                }else{
                    $decisionsem2=decisionsemestrielle($idetud,'SEM10',$anac2['acadyearid'],$idspec,'SE2',$bdd);
                }






                $moyennean=number_format((($moyennesem1 +$moyennesem2)/2),2);}




            if( $decisionsem1=='ADMIS' and  $decisionsem2=='ADMIS'){
                ?>









                <tr>  <td style="text-align: center; border: solid 1px black; "  height="20px;"> <?php echo $k++;?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $identite['school_classeid'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $identite['id'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($identite['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($identite['lastname']);?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $identite['kind'];?></td>



                <td style="text-align: center; border: solid 1px black; " > <?php echo $moyennean;?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php if($identite['kind']=='M'){echo 'ADMIS';}else{echo 'ADMISE';

                    };?></td>

                </tr><?php



            }} ?>

        <tr><td colspan="8"><span style="margin-left:350px;font-size:12px; margin-top:50px; font-weight:bold"><strong> LE DIRECTEUR</strong></span></td></tr>

    </table>
















</page>





