<?php
include("myfunctions.php");
?>


<page  backbottom="20mm" backtop="1mm" >


    <?php
    include("headerpv.php");
    ?>


    <?php
    include("footerpv.php");
    ?>






    <div  style="margin-top:20px; width:80%; margin-left:100px; text-align:center; font-size:18px; border: double; background-color:#CCC;"> DELIBERATION DE LA <?php echo  $libses;?> DU <?php echo  $libsem;?> <?php echo  $idanac?><BR />LISTE DES ETUDIANTS CONVOQUES A LA DEUXIEME SESSION PAR UE<BR /><span style="font-size:20px; font-weight:bold;"><?php echo  $levelname;?>&nbsp;<?php echo utf8_encode( $libspec);?><br>  </span></div>

    <br />







    <table style="border:solid 1px black;  text-align:center; font-size:7px;  border-collapse:collapse; " align="center">
        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 3%">


        <col style="width: 6.2%">

        <col style="width: 5.5%">
        <col style="width: 8%">

        <col style="width:4%">
        <col style="width: 2.6%">

        <col style="width: 4%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">
        <col style="width: 3%">
        <col style="width: 5%">
        <col style="width: 5%">
        <col style="width: 5%">
        <thead>

        <tr><th style="text-align: center; border: solid 1px black; " rowspan="3" height="30px;"> N°</th>

            <th style="text-align: center; border: solid 1px black; " rowspan="3"> GPE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> STATUT</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> NOM </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> PRENOMS </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3">DATE DE NAISSANCE </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3">GENRE </th>



            <th style="text-align: center; border: solid 1px black;  " colspan="4">UE  ANGLAIS</th>

            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MOYENNE SEMESTRE </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> TOTAL CREDIT VALIDE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> DECISION</th>











        </tr>

        <tr>


            <th style="text-align: center; border: solid 1px black;  " colspan="3">ANGLAIS</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>







        </tr>
        <tr>


            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>








        </tr></thead>
        <?php






        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare('
SELECT  DISTINCT student_examnotes.studentid FROM `student_examnotes` INNER JOIN student on student.id=student_examnotes.studentid  WHERE  student_examnotes.specialityid=:idspec  and student_examnotes.acadyearid=:idanac  and student_examnotes.semesterid=:idsem and student_examnotes.sessionid=:idses and student_examnotes.studentid NOT IN (SELECT studentid from ue_validated where ue_validated.specialityid=:idspec and ue_validated.semesterid=:idsem and  ue_validated.ueid="ANG2300"  ) order by student.firstname,student.lastname' );



        $repos->execute(array('idspec'=> $idspec,'idanac'=>$idanac,'idsem'=>$idsem,'idses'=>$idses));





        $k=1;


        while($resultat = $repos->fetch()){
            $idetudiant= $resultat['studentid'];


            $reposer = $bdd->prepare(' SELECT student.*, DATE_FORMAT(student.birthdate, \' %d/%m/%Y\') AS datenaiss,student_speciality.* FROM student inner join student_speciality ON student.id=student_speciality.studentid WHERE student.id=:idetudiant and student_speciality.specialityid=:idspec and acadyearid=:idanac and levelid=:idniv  ' );

            $reposer->execute(array('idetudiant'=> $idetudiant,'idspec'=> $idspec,'idanac'=>$idanac,'idniv'=>$levelid));

            $result = $reposer->fetch();








            ?>
            <tr><td style="text-align: center; border: solid 1px black; "  height="10px;"> <?php echo $k++;?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php if($result['school_classeid']=="SRITL3A"){echo 'A';}if($result['school_classeid']=="SRITL3B"){echo 'B';}if($result['school_classeid']=="SRITL3C"){echo 'C';}if($result['school_classeid']=="SRITL3D"){echo 'D';}?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['state'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['id'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['lastname']);?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php  echo $result['datenaiss'] ;?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['kind'];?></td>



                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1ANG2300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1ANG2300',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1ANG2300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1ANG2300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideuemaster($idetudiant,$idsem,'ANG2300',$idanac,$idspec,$idses,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php  echo number_format(moyennesemestre($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo tcreditmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php if(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='F') {echo 'ADMISE';}elseif(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='REFUSE' AND $result['kind']=='F'){echo 'REFUSEE';}
                    elseif(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='M') {echo 'ADMIS';}else{echo 'REFUSE';} ?></td>









            </tr>


        <?php }  ?>





    </table>



    <br /> <br />




    <table style="border:solid 1px black;  text-align:center; font-size:7px;  border-collapse:collapse; " align="center">
        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 3%">


        <col style="width: 6.2%">

        <col style="width: 5.5%">
        <col style="width: 8%">

        <col style="width:4%">
        <col style="width: 2.6%">

        <col style="width: 4%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">
        <col style="width: 4%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">

        <col style="width: 3%">



        <col style="width: 5%">
        <col style="width: 5%">
        <col style="width: 5%">
        <thead>

        <tr><th style="text-align: center; border: solid 1px black; " rowspan="3" height="30px;"> N°</th>

            <th style="text-align: center; border: solid 1px black; " rowspan="3"> GPE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> STATUT</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> NOM </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> PRENOMS </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3">DATE DE NAISSANCE </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3">GENRE </th>



            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE GESTION DE PROJET ET ENTREPRENARIAT</th>

            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MOYENNE SEMESTRE </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> TOTAL CREDIT VALIDE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> DECISION</th>











        </tr>

        <tr>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Gestion des projets</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Entrepreneuriat</th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2">Moy. UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > Credits Validés</th>



        </tr>
        <tr>


            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>



            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>






        </tr></thead>
        <?php






        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare('
SELECT  DISTINCT student_examnotes.studentid FROM `student_examnotes` INNER JOIN student on student.id=student_examnotes.studentid  WHERE  student_examnotes.specialityid=:idspec  and student_examnotes.acadyearid=:idanac  and student_examnotes.semesterid=:idsem and student_examnotes.sessionid=:idses and student_examnotes.studentid NOT IN (SELECT studentid from ue_validated where ue_validated.specialityid=:idspec and ue_validated.semesterid=:idsem and  ue_validated.ueid="OGE2300"  ) order by student.firstname,student.lastname' );



        $repos->execute(array('idspec'=> $idspec,'idanac'=>$idanac,'idsem'=>$idsem,'idses'=>$idses));





        $k=1;


        while($resultat = $repos->fetch()){
            $idetudiant= $resultat['studentid'];


            $reposer = $bdd->prepare(' SELECT student.*, DATE_FORMAT(student.birthdate, \' %d/%m/%Y\') AS datenaiss,student_speciality.* FROM student inner join student_speciality ON student.id=student_speciality.studentid WHERE student.id=:idetudiant and student_speciality.specialityid=:idspec and acadyearid=:idanac and levelid=:idniv  ' );

            $reposer->execute(array('idetudiant'=> $idetudiant,'idspec'=> $idspec,'idanac'=>$idanac,'idniv'=>$levelid));

            $result = $reposer->fetch();








            ?>
            <tr><td style="text-align: center; border: solid 1px black; "  height="10px;"> <?php echo $k++;?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php if($result['school_classeid']=="SIGLL2A"){echo 'A';}if($result['school_classeid']=="SIGLL2B"){echo 'B';}if($result['school_classeid']=="SIGLL2C"){echo 'C';}if($result['school_classeid']=="SIGLL2D"){echo 'D';}?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['state'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['id'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['lastname']);?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php  echo $result['datenaiss'] ;?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['kind'];?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1OGE2300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1OGE2300',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1OGE2300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1OGE2300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2OGE2300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2OGE2300',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2OGE2300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2OGE2300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'OGE2300',$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideuemaster($idetudiant,$idsem,'OGE2300',$idanac,$idspec,$idses,$bdd); ?></td>





                <td style="text-align: center; border: solid 1px black; " > <?php  echo number_format(moyennesemestre($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo tcreditmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php if(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='F') {echo 'ADMISE';}elseif(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='REFUSE' AND $result['kind']=='F'){echo 'REFUSEE';}
                    elseif(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='M') {echo 'ADMIS';}else{echo 'REFUSE';} ?></td>










            </tr>


        <?php }  ?>





    </table>


    <br /> <br />






    <table style="border:solid 1px black;  text-align:center; font-size:7px;  border-collapse:collapse; " align="center">
        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 3%">


        <col style="width: 6.2%">

        <col style="width: 5.5%">
        <col style="width: 8%">

        <col style="width:4%">
        <col style="width: 2.6%">

        <col style="width: 4%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">
        <col style="width: 4%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">

        <col style="width: 3%">



        <col style="width: 5%">
        <col style="width: 5%">
        <col style="width: 5%">
        <thead>

        <tr><th style="text-align: center; border: solid 1px black; " rowspan="3" height="30px;"> N°</th>

            <th style="text-align: center; border: solid 1px black; " rowspan="3"> GPE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> STATUT</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> NOM </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> PRENOMS </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3">DATE DE NAISSANCE </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3">GENRE </th>



            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE COMMUNICATION ET DEVELOPPEMENT PERSONNEL</th>

            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MOYENNE SEMESTRE </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> TOTAL CREDIT VALIDE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> DECISION</th>











        </tr>

        <tr>

            <th style="text-align: center; border: solid 1px black;  " colspan="3">Technique d'expression (Français)</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Developpement personnel</th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2">Moy. UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > Credits Validés</th>


        </tr>
        <tr>


            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>



            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>






        </tr></thead>
        <?php






        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare('
SELECT  DISTINCT student_examnotes.studentid FROM `student_examnotes` INNER JOIN student on student.id=student_examnotes.studentid  WHERE  student_examnotes.specialityid=:idspec  and student_examnotes.acadyearid=:idanac  and student_examnotes.semesterid=:idsem and student_examnotes.sessionid=:idses and student_examnotes.studentid NOT IN (SELECT studentid from ue_validated where ue_validated.specialityid=:idspec and ue_validated.semesterid=:idsem and  ue_validated.ueid="COM2300"  ) order by student.firstname,student.lastname' );



        $repos->execute(array('idspec'=> $idspec,'idanac'=>$idanac,'idsem'=>$idsem,'idses'=>$idses));





        $k=1;


        while($resultat = $repos->fetch()){
            $idetudiant= $resultat['studentid'];


            $reposer = $bdd->prepare(' SELECT student.*, DATE_FORMAT(student.birthdate, \' %d/%m/%Y\') AS datenaiss,student_speciality.* FROM student inner join student_speciality ON student.id=student_speciality.studentid WHERE student.id=:idetudiant and student_speciality.specialityid=:idspec and acadyearid=:idanac and levelid=:idniv  ' );

            $reposer->execute(array('idetudiant'=> $idetudiant,'idspec'=> $idspec,'idanac'=>$idanac,'idniv'=>$levelid));

            $result = $reposer->fetch();








            ?>
            <tr><td style="text-align: center; border: solid 1px black; "  height="10px;"> <?php echo $k++;?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php if($result['school_classeid']=="SIGLL2A"){echo 'A';}if($result['school_classeid']=="SIGLL2B"){echo 'B';}if($result['school_classeid']=="SIGLL2C"){echo 'C';}if($result['school_classeid']=="SIGLL2D"){echo 'D';}?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['state'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['id'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['lastname']);?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php  echo $result['datenaiss'] ;?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['kind'];?></td>



                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1COM2300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1COM2300',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1COM2300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1COM2300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2COM2300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2COM2300',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2COM2300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2COM2300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'COM2300',$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideuemaster($idetudiant,$idsem,'COM2300',$idanac,$idspec,$idses,$bdd); ?></td>




                <td style="text-align: center; border: solid 1px black; " > <?php  echo number_format(moyennesemestre($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo tcreditmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php if(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='F') {echo 'ADMISE';}elseif(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='REFUSE' AND $result['kind']=='F'){echo 'REFUSEE';}
                    elseif(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='M') {echo 'ADMIS';}else{echo 'REFUSE';} ?></td>









            </tr>


        <?php }  ?>





    </table>


    <br /> <br />
















    <table style="border:solid 1px black;  text-align:center; font-size:7px;  border-collapse:collapse; " align="center">
        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 3%">


        <col style="width: 6.2%">

        <col style="width: 5.5%">
        <col style="width: 8%">

        <col style="width:4%">
        <col style="width: 2.6%">

        <col style="width: 4%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">
        <col style="width: 3%">
        <col style="width: 5%">
        <col style="width: 5%">
        <col style="width: 5%">
        <thead>

        <tr><th style="text-align: center; border: solid 1px black; " rowspan="3" height="30px;"> N°</th>

            <th style="text-align: center; border: solid 1px black; " rowspan="3"> GPE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> STATUT</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> NOM </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> PRENOMS </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3">DATE DE NAISSANCE </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3">GENRE </th>



            <th style="text-align: center; border: solid 1px black;  " colspan="4">UE  SERVICES MOBILES</th>

            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MOYENNE SEMESTRE </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> TOTAL CREDIT VALIDE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> DECISION</th>











        </tr>

        <tr>

            <th style="text-align: center; border: solid 1px black;  " colspan="3">Service mobile (Android, WAP/ i-mode, JAVA sim card…)</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > Credits Validés</th>







        </tr>
        <tr>


            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>








        </tr></thead>
        <?php






        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare('
SELECT  DISTINCT student_examnotes.studentid FROM `student_examnotes` INNER JOIN student on student.id=student_examnotes.studentid  WHERE  student_examnotes.specialityid=:idspec  and student_examnotes.acadyearid=:idanac  and student_examnotes.semesterid=:idsem and student_examnotes.sessionid=:idses and student_examnotes.studentid NOT IN (SELECT studentid from ue_validated where ue_validated.specialityid=:idspec and ue_validated.semesterid=:idsem and  ue_validated.ueid="RES2301"  ) order by student.firstname,student.lastname' );



        $repos->execute(array('idspec'=> $idspec,'idanac'=>$idanac,'idsem'=>$idsem,'idses'=>$idses));





        $k=1;


        while($resultat = $repos->fetch()){
            $idetudiant= $resultat['studentid'];


            $reposer = $bdd->prepare(' SELECT student.*, DATE_FORMAT(student.birthdate, \' %d/%m/%Y\') AS datenaiss,student_speciality.* FROM student inner join student_speciality ON student.id=student_speciality.studentid WHERE student.id=:idetudiant and student_speciality.specialityid=:idspec and acadyearid=:idanac and levelid=:idniv  ' );

            $reposer->execute(array('idetudiant'=> $idetudiant,'idspec'=> $idspec,'idanac'=>$idanac,'idniv'=>$levelid));

            $result = $reposer->fetch();








            ?>
            <tr><td style="text-align: center; border: solid 1px black; "  height="10px;"> <?php echo $k++;?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php if($result['school_classeid']=="SRITL3A"){echo 'A';}if($result['school_classeid']=="SRITL3B"){echo 'B';}if($result['school_classeid']=="SRITL3C"){echo 'C';}if($result['school_classeid']=="SRITL3D"){echo 'D';}?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['state'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['id'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['lastname']);?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php  echo $result['datenaiss'] ;?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['kind'];?></td>




                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1RES2301',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1RES2301',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1RES2301',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1RES2301',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideuemaster($idetudiant,$idsem,'RES2301',$idanac,$idspec,$idses,$bdd); ?></td>



                <td style="text-align: center; border: solid 1px black; " > <?php  echo number_format(moyennesemestre($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo tcreditmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php if(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='F') {echo 'ADMISE';}elseif(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='REFUSE' AND $result['kind']=='F'){echo 'REFUSEE';}
                    elseif(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='M') {echo 'ADMIS';}else{echo 'REFUSE';} ?></td>









            </tr>


        <?php }  ?>





    </table>



    <br /> <br />









    <table style="border:solid 1px black;  text-align:center; font-size:7px;  border-collapse:collapse; " align="center">
        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 3%">


        <col style="width: 6.2%">

        <col style="width: 5.5%">
        <col style="width: 8%">

        <col style="width:4%">
        <col style="width: 2.6%">

        <col style="width: 4%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">
        <col style="width: 4%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">

        <col style="width: 3%">



        <col style="width: 5%">
        <col style="width: 5%">
        <col style="width: 5%">
        <thead>

        <tr><th style="text-align: center; border: solid 1px black; " rowspan="3" height="30px;"> N°</th>

            <th style="text-align: center; border: solid 1px black; " rowspan="3"> GPE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> STATUT</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> NOM </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> PRENOMS </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3">DATE DE NAISSANCE </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3">GENRE </th>



            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE COMMUTATION</th>

            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MOYENNE SEMESTRE </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> TOTAL CREDIT VALIDE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> DECISION</th>











        </tr>

        <tr>

            <th style="text-align: center; border: solid 1px black;  " colspan="3">Techniques de commutation</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Signalisation et reseaux intelligents</th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2">Moy. UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > Credits Validés</th>




        </tr>
        <tr>


            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>



            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>






        </tr></thead>
        <?php






        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare('
SELECT  DISTINCT student_examnotes.studentid FROM `student_examnotes` INNER JOIN student on student.id=student_examnotes.studentid  WHERE  student_examnotes.specialityid=:idspec  and student_examnotes.acadyearid=:idanac  and student_examnotes.semesterid=:idsem and student_examnotes.sessionid=:idses and student_examnotes.studentid NOT IN (SELECT studentid from ue_validated where ue_validated.specialityid=:idspec and ue_validated.semesterid=:idsem and  ue_validated.ueid="TEL2300"  ) order by student.firstname,student.lastname' );



        $repos->execute(array('idspec'=> $idspec,'idanac'=>$idanac,'idsem'=>$idsem,'idses'=>$idses));





        $k=1;


        while($resultat = $repos->fetch()){
            $idetudiant= $resultat['studentid'];


            $reposer = $bdd->prepare(' SELECT student.*, DATE_FORMAT(student.birthdate, \' %d/%m/%Y\') AS datenaiss,student_speciality.* FROM student inner join student_speciality ON student.id=student_speciality.studentid WHERE student.id=:idetudiant and student_speciality.specialityid=:idspec and acadyearid=:idanac and levelid=:idniv  ' );

            $reposer->execute(array('idetudiant'=> $idetudiant,'idspec'=> $idspec,'idanac'=>$idanac,'idniv'=>$levelid));

            $result = $reposer->fetch();








            ?>
            <tr><td style="text-align: center; border: solid 1px black; "  height="10px;"> <?php echo $k++;?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php if($result['school_classeid']=="SIGLL2A"){echo 'A';}if($result['school_classeid']=="SIGLL2B"){echo 'B';}if($result['school_classeid']=="SIGLL2C"){echo 'C';}if($result['school_classeid']=="SIGLL2D"){echo 'D';}?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['state'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['id'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['lastname']);?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php  echo $result['datenaiss'] ;?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['kind'];?></td>




                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1TEL2300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1TEL2300',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1TEL2300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1TEL2300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2TEL2300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2TEL2300',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2TEL2300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2TEL2300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>




                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'TEL2300',$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideuemaster($idetudiant,$idsem,'TEL2300',$idanac,$idspec,$idses,$bdd); ?></td>




                <td style="text-align: center; border: solid 1px black; " > <?php  echo number_format(moyennesemestre($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo tcreditmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php if(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='F') {echo 'ADMISE';}elseif(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='REFUSE' AND $result['kind']=='F'){echo 'REFUSEE';}
                    elseif(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='M') {echo 'ADMIS';}else{echo 'REFUSE';} ?></td>









            </tr>


        <?php }  ?>





    </table>


    <br /> <br />


    <table style="border:solid 1px black;  text-align:center; font-size:7px;  border-collapse:collapse; " align="center">
        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 3%">


        <col style="width: 6.2%">

        <col style="width: 5.5%">
        <col style="width: 8%">

        <col style="width:4%">
        <col style="width: 2.6%">

        <col style="width: 4%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">
        <col style="width: 4%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">
        <col style="width: 4%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">

        <col style="width: 3%">



        <col style="width: 5%">
        <col style="width: 5%">
        <col style="width: 5%">
        <thead>

        <tr><th style="text-align: center; border: solid 1px black; " rowspan="3" height="30px;"> N°</th>

            <th style="text-align: center; border: solid 1px black; " rowspan="3"> GPE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> STATUT</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> NOM </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> PRENOMS </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3">DATE DE NAISSANCE </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3">GENRE </th>



            <th style="text-align: center; border: solid 1px black;  " colspan="11">UE FIBRE OPTIQUE</th>

            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MOYENNE SEMESTRE </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> TOTAL CREDIT VALIDE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> DECISION</th>











        </tr>
        <tr>


            <th style="text-align: center; border: solid 1px black;  " colspan="3">Caractéristiques FO</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Ingénierie des reseaux optiques (accès, FTTx, xPON...)</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Techniques de multiplexage optique (xWDM) </th>



            <th style="text-align: center; border: solid 1px black;  " rowspan="2">Moy. UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > Credits Validés</th>





        </tr>
        <tr>


            <th style="text-align: center; border: solid 1px black;  ">Moyenne</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">Moy Pond</th>

            <th style="text-align: center; border: solid 1px black;  ">Moyenne</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">Moy Pond</th>

            <th style="text-align: center; border: solid 1px black;  ">Moyenne</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">Moy Pond</th>





        </tr></thead>
        <?php






        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare('
SELECT  DISTINCT student_examnotes.studentid FROM `student_examnotes` INNER JOIN student on student.id=student_examnotes.studentid  WHERE  student_examnotes.specialityid=:idspec  and student_examnotes.acadyearid=:idanac  and student_examnotes.semesterid=:idsem and student_examnotes.sessionid=:idses and student_examnotes.studentid NOT IN (SELECT studentid from ue_validated where ue_validated.specialityid=:idspec and ue_validated.semesterid=:idsem and  ue_validated.ueid="TEL2301"  ) order by student.firstname,student.lastname' );



        $repos->execute(array('idspec'=> $idspec,'idanac'=>$idanac,'idsem'=>$idsem,'idses'=>$idses));





        $k=1;


        while($resultat = $repos->fetch()){
            $idetudiant= $resultat['studentid'];


            $reposer = $bdd->prepare(' SELECT student.*, DATE_FORMAT(student.birthdate, \' %d/%m/%Y\') AS datenaiss,student_speciality.* FROM student inner join student_speciality ON student.id=student_speciality.studentid WHERE student.id=:idetudiant and student_speciality.specialityid=:idspec and acadyearid=:idanac and levelid=:idniv  ' );

            $reposer->execute(array('idetudiant'=> $idetudiant,'idspec'=> $idspec,'idanac'=>$idanac,'idniv'=>$levelid));

            $result = $reposer->fetch();








            ?>
            <tr><td style="text-align: center; border: solid 1px black; "  height="10px;"> <?php echo $k++;?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php if($result['school_classeid']=="SIGLL2A"){echo 'A';}if($result['school_classeid']=="SIGLL2B"){echo 'B';}if($result['school_classeid']=="SIGLL2C"){echo 'C';}if($result['school_classeid']=="SIGLL2D"){echo 'D';}?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['state'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['id'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['lastname']);?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php  echo $result['datenaiss'] ;?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['kind'];?></td>




                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1TEL2301',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1TEL2301',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1TEL2301',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1TEL2301',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2TEL2301',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2TEL2301',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2TEL2301',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2TEL2301',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU3TEL2301',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU3TEL2301',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU3TEL2301',$idanac,$idses,$bdd)*creditecu($idsem,'ECU3TEL2301',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>




                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'TEL2301',$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideuemaster($idetudiant,$idsem,'TEL2301',$idanac,$idspec,$idses,$bdd); ?></td>



                <td style="text-align: center; border: solid 1px black; " > <?php  echo number_format(moyennesemestre($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo tcreditmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php if(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='F') {echo 'ADMISE';}elseif(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='REFUSE' AND $result['kind']=='F'){echo 'REFUSEE';}
                    elseif(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='M') {echo 'ADMIS';}else{echo 'REFUSE';} ?></td>








            </tr>


        <?php }  ?>





    </table>


    <br /> <br />




    <table style="border:solid 1px black;  text-align:center; font-size:7px;  border-collapse:collapse; " align="center">
        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 3%">


        <col style="width: 6.2%">

        <col style="width: 5.5%">
        <col style="width: 8%">

        <col style="width:4%">
        <col style="width: 2.6%">

        <col style="width: 4%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">
        <col style="width: 4%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">
        <col style="width: 4%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">

        <col style="width: 3%">



        <col style="width: 5%">
        <col style="width: 5%">
        <col style="width: 5%">
        <thead>

        <tr><th style="text-align: center; border: solid 1px black; " rowspan="3" height="30px;"> N°</th>

            <th style="text-align: center; border: solid 1px black; " rowspan="3"> GPE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> STATUT</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> NOM </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> PRENOMS </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3">DATE DE NAISSANCE </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3">GENRE </th>



            <th style="text-align: center; border: solid 1px black;  " colspan="11">UE ADMINISTRATION ET QoS</th>

            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MOYENNE SEMESTRE </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> TOTAL CREDIT VALIDE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> DECISION</th>











        </tr>
        <tr>

            <th style="text-align: center; border: solid 1px black;  " colspan="3">Methode d'évaluation de performance et qualité de service</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Administration, sécurité des réseaux</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Virtualisation </th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2">Moy. UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > Credits Validés</th>





        </tr>
        <tr>


            <th style="text-align: center; border: solid 1px black;  ">Moyenne</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">Moy Pond</th>

            <th style="text-align: center; border: solid 1px black;  ">Moyenne</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">Moy Pond</th>

            <th style="text-align: center; border: solid 1px black;  ">Moyenne</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">Moy Pond</th>





        </tr></thead>
        <?php






        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare('
SELECT  DISTINCT student_examnotes.studentid FROM `student_examnotes` INNER JOIN student on student.id=student_examnotes.studentid  WHERE  student_examnotes.specialityid=:idspec  and student_examnotes.acadyearid=:idanac  and student_examnotes.semesterid=:idsem and student_examnotes.sessionid=:idses and student_examnotes.studentid NOT IN (SELECT studentid from ue_validated where ue_validated.specialityid=:idspec and ue_validated.semesterid=:idsem and  ue_validated.ueid="RES2300"  ) order by student.firstname,student.lastname' );



        $repos->execute(array('idspec'=> $idspec,'idanac'=>$idanac,'idsem'=>$idsem,'idses'=>$idses));





        $k=1;


        while($resultat = $repos->fetch()){
            $idetudiant= $resultat['studentid'];


            $reposer = $bdd->prepare(' SELECT student.*, DATE_FORMAT(student.birthdate, \' %d/%m/%Y\') AS datenaiss,student_speciality.* FROM student inner join student_speciality ON student.id=student_speciality.studentid WHERE student.id=:idetudiant and student_speciality.specialityid=:idspec and acadyearid=:idanac and levelid=:idniv  ' );

            $reposer->execute(array('idetudiant'=> $idetudiant,'idspec'=> $idspec,'idanac'=>$idanac,'idniv'=>$levelid));

            $result = $reposer->fetch();








            ?>
            <tr><td style="text-align: center; border: solid 1px black; "  height="10px;"> <?php echo $k++;?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php if($result['school_classeid']=="SIGLL2A"){echo 'A';}if($result['school_classeid']=="SIGLL2B"){echo 'B';}if($result['school_classeid']=="SIGLL2C"){echo 'C';}if($result['school_classeid']=="SIGLL2D"){echo 'D';}?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['state'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['id'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['lastname']);?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php  echo $result['datenaiss'] ;?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['kind'];?></td>




                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1RES2300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1RES2300',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1RES2300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1RES2300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2RES2300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2RES2300',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2RES2300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2RES2300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU3RES2300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU3RES2300',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU3RES2300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU3RES2300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>




                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'RES2300',$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideuemaster($idetudiant,$idsem,'RES2300',$idanac,$idspec,$idses,$bdd); ?></td>



                <td style="text-align: center; border: solid 1px black; " > <?php  echo number_format(moyennesemestre($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo tcreditmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php if(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='F') {echo 'ADMISE';}elseif(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='REFUSE' AND $result['kind']=='F'){echo 'REFUSEE';}
                    elseif(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='M') {echo 'ADMIS';}else{echo 'REFUSE';} ?></td>










            </tr>


        <?php }  ?>





    </table>


    <br /> <br />



    <table style="border:solid 1px black;  text-align:center; font-size:7px;  border-collapse:collapse; " align="center">
        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 3%">


        <col style="width: 6.2%">

        <col style="width: 5.5%">
        <col style="width: 8%">

        <col style="width:4%">
        <col style="width: 2.6%">

        <col style="width: 4%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">
        <col style="width: 4%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">
        <col style="width: 4%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">

        <col style="width: 3%">



        <col style="width: 5%">
        <col style="width: 5%">
        <col style="width: 5%">
        <thead>

        <tr><th style="text-align: center; border: solid 1px black; " rowspan="3" height="30px;"> N°</th>

            <th style="text-align: center; border: solid 1px black; " rowspan="3"> GPE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> STATUT</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> NOM </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> PRENOMS </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3">DATE DE NAISSANCE </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3">GENRE </th>



            <th style="text-align: center; border: solid 1px black;  " colspan="11">UE RESEAUX MOBILES</th>

            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MOYENNE SEMESTRE </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> TOTAL CREDIT VALIDE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> DECISION</th>











        </tr>
        <tr>


            <th style="text-align: center; border: solid 1px black;  " colspan="3">NGN/Core network</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Ingénierie des reseaux mobiles</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Technologies mobiles avancées </th>



            <th style="text-align: center; border: solid 1px black;  " rowspan="2">Moy. UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > Credits Validés</th>






        </tr>
        <tr>


            <th style="text-align: center; border: solid 1px black;  ">Moyenne</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">Moy Pond</th>

            <th style="text-align: center; border: solid 1px black;  ">Moyenne</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">Moy Pond</th>

            <th style="text-align: center; border: solid 1px black;  ">Moyenne</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">Moy Pond</th>





        </tr></thead>
        <?php






        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare('
SELECT  DISTINCT student_examnotes.studentid FROM `student_examnotes` INNER JOIN student on student.id=student_examnotes.studentid  WHERE  student_examnotes.specialityid=:idspec  and student_examnotes.acadyearid=:idanac  and student_examnotes.semesterid=:idsem and student_examnotes.sessionid=:idses and student_examnotes.studentid NOT IN (SELECT studentid from ue_validated where ue_validated.specialityid=:idspec and ue_validated.semesterid=:idsem and  ue_validated.ueid="RMO2300"  ) order by student.firstname,student.lastname' );



        $repos->execute(array('idspec'=> $idspec,'idanac'=>$idanac,'idsem'=>$idsem,'idses'=>$idses));





        $k=1;


        while($resultat = $repos->fetch()){
            $idetudiant= $resultat['studentid'];


            $reposer = $bdd->prepare(' SELECT student.*, DATE_FORMAT(student.birthdate, \' %d/%m/%Y\') AS datenaiss,student_speciality.* FROM student inner join student_speciality ON student.id=student_speciality.studentid WHERE student.id=:idetudiant and student_speciality.specialityid=:idspec and acadyearid=:idanac and levelid=:idniv  ' );

            $reposer->execute(array('idetudiant'=> $idetudiant,'idspec'=> $idspec,'idanac'=>$idanac,'idniv'=>$levelid));

            $result = $reposer->fetch();








            ?>
            <tr><td style="text-align: center; border: solid 1px black; "  height="10px;"> <?php echo $k++;?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php if($result['school_classeid']=="SIGLL2A"){echo 'A';}if($result['school_classeid']=="SIGLL2B"){echo 'B';}if($result['school_classeid']=="SIGLL2C"){echo 'C';}if($result['school_classeid']=="SIGLL2D"){echo 'D';}?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['state'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['id'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['lastname']);?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php  echo $result['datenaiss'] ;?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['kind'];?></td>




                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1RMO2300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1RMO2300',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1RMO2300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1RMO2300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2RMO2300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2RMO2300',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2RMO2300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2RMO2300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU3RMO2300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU3RMO2300',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU3RMO2300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU3RMO2300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>




                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'RMO2300',$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideuemaster($idetudiant,$idsem,'RMO2300',$idanac,$idspec,$idses,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php  echo number_format(moyennesemestre($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo tcreditmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php if(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='F') {echo 'ADMISE';}elseif(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='REFUSE' AND $result['kind']=='F'){echo 'REFUSEE';}
                    elseif(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='M') {echo 'ADMIS';}else{echo 'REFUSE';} ?></td>









            </tr>


        <?php }  ?>





    </table>


    <br /> <br />






</page>
