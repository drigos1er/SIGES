<?php
include("myfunctions.php");
?>


<page  backbottom="50mm" backtop="1mm" >


    <?php
    include("headerpv.php");
    ?>


    <?php
    include("footerpv.php");
    ?>






    <div  style="margin-top:20px; width:80%; margin-left:100px; text-align:center; font-size:18px; border: double; background-color:#CCC;"> DELIBERATION DE LA <?php echo  $libses;?> DU <?php echo  $libsem;?> <?php echo  $idanac?><BR /><span style="font-size:20px; font-weight:bold;"><?php echo  $levelname;?>&nbsp;<?php echo  $libspec;?><br>  </span></div>

    <br />

    <table style="border:solid 1px black;  text-align:center; font-size:7px;  border-collapse:collapse; " align="center">
        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 3%">

        <col style="width: 7%">

        <col style="width: 5%">
        <col style="width: 9%">
        <col style="width:2.5%">

        <col style="width: 4.5%">
        <col style="width: 3.5%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">

        <col style="width: 3%">

        <col style="width: 3.5%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">

        <col style="width: 3%">

        <col style="width: 3.5%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">

        <col style="width: 3%">
        <col style="width: 3.5%">

        <col style="width: 3.5%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">
        <col style="width: 3.5%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">
        <col style="width: 3.5%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">
        <col style="width: 3%">
        <thead>

        <tr><th style="text-align: center; border: solid 1px black; " rowspan="3" height="30"> N°</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> GPE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> STATUT</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> NOM </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> PRENOMS </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3">GENRE </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3">DATE DE NAISSANCE </th>

            <th style="text-align: center; border: solid 1px black;  " colspan="4">UE 1 OGE (ORGANISATION ET GESTION DES ENTREPRISES)</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="4">UE 2 PROGRAMMATION ORIENTE  (JAVA)</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="4">UE 3 FILTRAGE ANALOGIQUE </th>


            <th style="text-align: center; border: solid 1px black; background-color: #CCC " rowspan="3"> MOYENNE UE MINEURES </th>

            <th style="text-align: center; border: solid 1px black;  " colspan="11">UE 4 COMMUNICATION ET DEVELOPPEMENT PERSONNEL  </th>

        </tr>

        <tr>


            <th style="text-align: center; border: solid 1px black;  " colspan="3">Organisation et gestion des entreprises</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>

            <th style="text-align: center; border: solid 1px black;  " colspan="3">Programmation Orienté Objet (JAVA)</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>

            <th style="text-align: center; border: solid 1px black;  " colspan="3">Filtrage analogique</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>

                      <th style="text-align: center; border: solid 1px black;  " colspan="3">Anglais</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Français</th>


            <th style="text-align: center; border: solid 1px black;  " colspan="3">Développement personnel</th>


            <th style="text-align: center; border: solid 1px black;  " rowspan="2">MOY UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>








        </tr>
        <tr>


            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>

            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>

            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>



            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>

            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>

            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>




        </tr></thead>
        <?php






        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");
        $repos=$bdd->query("SET @@global.sql_mode=(SELECT REPLACE(@@global.sql_mode, 'ONLY_FULL_GROUP_BY', ''))");

        $repos = $bdd->prepare('SELECT  DISTINCT student_examnotes.studentid FROM `student_examnotes` INNER JOIN student on student.id=student_examnotes.studentid  WHERE  student_examnotes.specialityid=:idspec  and student_examnotes.acadyearid=:idanac  and student_examnotes.semesterid=:idsem and student_examnotes.sessionid=:idses order by student.firstname,student.lastname' );

        $repos->execute(array('idspec'=> $idspec,'idanac'=>$idanac,'idsem'=>$idsem,'idses'=>$idses));





        $k=1;


        while($resultat = $repos->fetch()){
            $idetudiant= $resultat['studentid'];


            $reposer = $bdd->prepare(' SELECT student.*, DATE_FORMAT(student.birthdate, \' %d/%m/%Y\') AS datenaiss,student_speciality.* FROM student inner join student_speciality ON student.id=student_speciality.studentid WHERE student.id=:idetudiant and student_speciality.specialityid=:idspec and acadyearid=:idanac and levelid=:idniv  ' );

            $reposer->execute(array('idetudiant'=> $idetudiant,'idspec'=> $idspec,'idanac'=>$idanac,'idniv'=>$levelid));

            $result = $reposer->fetch();








            ?>
            <tr><td style="text-align: center; border: solid 1px black; "  height="10px;"> <?php echo $k++;?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php if($result['school_classeid']=="RTELL2"){echo '';}if($result['school_classeid']=="RTELL2A"){echo 'A';}if($result['school_classeid']=="RTELL2B"){echo 'B';}if($result['school_classeid']=="RTELL2C"){echo 'C';}?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['state'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $idetudiant;?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['lastname']);?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['kind'];?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php  echo $result['datenaiss'] ;?></td>


                <td style="text-align: center; border: solid 1px black; "><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1ECO3300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1ECO3300',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1ECO3300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1ECO3300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>
                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'ECO3300',$idanac,$idspec,$idses,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; "><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3309',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1INF3309',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3309',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1INF3309',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>
                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'INF3309',$idanac,$idspec,$idses,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; "><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1PHY3305',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1PHY3305',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1PHY3305',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1PHY3305',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>
                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'PHY3305',$idanac,$idspec,$idses,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; background-color: #CCC "><?php echo ueminorsemaverage($idetudiant, $idspec,  $idsem, $idses, $idanac,$bdd); ?></td>



                <td style="text-align: center; border: solid 1px black; "><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1COM3300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1COM3300',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1COM3300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1COM3300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>



                <td style="text-align: center; border: solid 1px black; " ><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2COM3300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2COM3300',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2COM3300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2COM3300',$idanac,$idspec,$bdd); echo  number_format($moyponde,2); ?></td>
                <td style="text-align: center; border: solid 1px black; " ><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU3COM3300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU3COM3300',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU3COM3300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU3COM3300',$idanac,$idspec,$bdd); echo  number_format($moyponde,2); ?></td>



                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'COM3300',$idanac,$idspec,$idses,$bdd),2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'COM3300',$idanac,$idspec,$idses,$bdd); ?></td>



            </tr>


        <?php }  ?>





    </table>
















</page>


<page  backbottom="50mm" backtop="1mm" >


    <?php
    include("headerpv.php");
    ?>


    <?php
    include("footerpv.php");
    ?>






    <div  style="margin-top:20px; width:80%; margin-left:100px; text-align:center; font-size:18px; border: double; background-color:#CCC;"> DELIBERATION DE LA <?php echo  $libses;?> DU <?php echo  $libsem;?> <?php echo  $idanac?><BR /><span style="font-size:20px; font-weight:bold;"><?php echo  $levelname;?>&nbsp;<?php echo  $libspec;?><br>  </span></div>

    <br />

    <table style="border:solid 1px black;  text-align:center; font-size:7px;  border-collapse:collapse; " align="center">
        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 3%">

        <col style="width: 7%">

        <col style="width: 5%">
        <col style="width: 9%">
        <col style="width:2.5%">

        <col style="width: 4.5%">
        <col style="width: 3.5%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">
        <col style="width: 3.5%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">

        <col style="width: 2.2%">
        <col style="width: 3%">

        <col style="width: 3.5%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">
        <col style="width: 3.5%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">

        <col style="width: 2.2%">
        <col style="width: 3%">

        <col style="width: 3.5%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">
        <col style="width: 3%">

        <col style="width: 3.5%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">
        <col style="width: 3%">
        <col style="width: 3%">
        <thead>

        <tr><th style="text-align: center; border: solid 1px black; " rowspan="3" height="30"> N°</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> GPE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> STATUT</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> NOM </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> PRENOMS </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3">GENRE </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3">DATE DE NAISSANCE </th>

            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE 5 MATHEMATIQUES APPLIQUEES </th>
            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE 6 PHYSIQUE DES ONDES </th>
            <th style="text-align: center; border: solid 1px black;  " colspan="4">UE 7 TRANSMISSIONS ANALOGIQUE / NUMERIQUE </th>

            <th style="text-align: center; border: solid 1px black;  " colspan="4">UE 8 RESEAUX  </th>




        </tr>

        <tr>


            <th style="text-align: center; border: solid 1px black;  " colspan="3">Probabilité / Statistique</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Mathématique du signal</th>





            <th style="text-align: center; border: solid 1px black;  " rowspan="2">MOY UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>





            <th style="text-align: center; border: solid 1px black;  " colspan="3">Optique Ondulatoire</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Propagation des ondes électromagnétiques</th>





            <th style="text-align: center; border: solid 1px black;  " rowspan="2">MOY UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>





            <th style="text-align: center; border: solid 1px black;  " colspan="3">Transmissions analogique/numérique</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>

            <th style="text-align: center; border: solid 1px black;  " colspan="3">Réseaux</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>










        </tr>
        <tr>


            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>

            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>

            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>



            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>

            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>

            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>




        </tr></thead>
        <?php






        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");
        $repos=$bdd->query("SET @@global.sql_mode=(SELECT REPLACE(@@global.sql_mode, 'ONLY_FULL_GROUP_BY', ''))");

        $repos = $bdd->prepare('SELECT  DISTINCT student_examnotes.studentid FROM `student_examnotes` INNER JOIN student on student.id=student_examnotes.studentid  WHERE  student_examnotes.specialityid=:idspec  and student_examnotes.acadyearid=:idanac  and student_examnotes.semesterid=:idsem and student_examnotes.sessionid=:idses order by student.firstname,student.lastname' );

        $repos->execute(array('idspec'=> $idspec,'idanac'=>$idanac,'idsem'=>$idsem,'idses'=>$idses));





        $k=1;


        while($resultat = $repos->fetch()){
            $idetudiant= $resultat['studentid'];


            $reposer = $bdd->prepare(' SELECT student.*, DATE_FORMAT(student.birthdate, \' %d/%m/%Y\') AS datenaiss,student_speciality.* FROM student inner join student_speciality ON student.id=student_speciality.studentid WHERE student.id=:idetudiant and student_speciality.specialityid=:idspec and acadyearid=:idanac and levelid=:idniv  ' );

            $reposer->execute(array('idetudiant'=> $idetudiant,'idspec'=> $idspec,'idanac'=>$idanac,'idniv'=>$levelid));

            $result = $reposer->fetch();








            ?>
            <tr><td style="text-align: center; border: solid 1px black; "  height="10px;"> <?php echo $k++;?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php if($result['school_classeid']=="RTELL2"){echo '';}if($result['school_classeid']=="RTELL2A"){echo 'A';}if($result['school_classeid']=="RTELL2B"){echo 'B';}if($result['school_classeid']=="RTELL2C"){echo 'C';}?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['state'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $idetudiant;?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['lastname']);?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['kind'];?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php  echo $result['datenaiss'] ;?></td>




                <td style="text-align: center; border: solid 1px black; "><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1MTH3302',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1MTH3302',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1MTH3302',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1MTH3302',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>



                <td style="text-align: center; border: solid 1px black; " ><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2MTH3302',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2MTH3302',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2MTH3302',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2MTH3302',$idanac,$idspec,$bdd); echo  number_format($moyponde,2); ?></td>



                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'MTH3302',$idanac,$idspec,$idses,$bdd),2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'MTH3302',$idanac,$idspec,$idses,$bdd); ?></td>





                <td style="text-align: center; border: solid 1px black; "><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1PHY3302',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1PHY3302',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1PHY3302',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1PHY3302',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>



                <td style="text-align: center; border: solid 1px black; " ><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2PHY3302',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2PHY3302',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2PHY3302',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2PHY3302',$idanac,$idspec,$bdd); echo  number_format($moyponde,2); ?></td>



                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'PHY3302',$idanac,$idspec,$idses,$bdd),2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'PHY3302',$idanac,$idspec,$idses,$bdd); ?></td>









                <td style="text-align: center; border: solid 1px black; "><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1PHY3304',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1PHY3304',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1PHY3304',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1PHY3304',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>
                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'PHY3304',$idanac,$idspec,$idses,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; "><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1RES3300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1RES3300',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1RES3300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1RES3300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>
                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'RES3300',$idanac,$idspec,$idses,$bdd); ?></td>





            </tr>


        <?php }  ?>





    </table>
















</page>


<page  backbottom="50mm" backtop="1mm" >


    <?php
    include("headerpv.php");
    ?>


    <?php
    include("footerpv.php");
    ?>






    <div  style="margin-top:20px; width:80%; margin-left:100px; text-align:center; font-size:18px; border: double; background-color:#CCC;"> DELIBERATION DE LA <?php echo  $libses;?> DU <?php echo  $libsem;?> <?php echo  $idanac?><BR /><span style="font-size:20px; font-weight:bold;"><?php echo  $levelname;?>&nbsp;<?php echo  $libspec;?><br>  </span></div>

    <br />

    <table style="border:solid 1px black;  text-align:center; font-size:7px;  border-collapse:collapse; " align="center">
        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 3%">

        <col style="width: 7%">

        <col style="width: 8%">
        <col style="width: 15%">
        <col style="width:2.5%">

        <col style="width: 4.5%">
        <col style="width: 5%">
        <col style="width: 5%">
        <col style="width: 5%">
        <col style="width: 5%">
        <thead>

        <tr><th style="text-align: center; border: solid 1px black; " height="30"> N°</th>
            <th style="text-align: center; border: solid 1px black; " > GPE</th>
            <th style="text-align: center; border: solid 1px black; " > STATUT</th>
            <th style="text-align: center; border: solid 1px black; " > MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " > NOM </th>
            <th style="text-align: center; border: solid 1px black; " > PRENOMS </th>
            <th style="text-align: center; border: solid 1px black; " >GENRE </th>
            <th style="text-align: center; border: solid 1px black;  " >DATE DE NAISSANCE </th>


            <th style="text-align: center; border: solid 1px black; background-color: #CCC " > MOYENNE UE MAJEURES </th>

            <th style="text-align: center; border: solid 1px black; background-color: #CCC  " > MOYENNE GENERALE SEMESTRE </th>
            <th style="text-align: center; border: solid 1px black; background-color: #CCC  " > TOTAL CREDITS VALIDES</th>
            <th style="text-align: center; border: solid 1px black; background-color: #CCC  "> DECISION DU JURY</th>


        </tr>

        <tr>









        </tr>
        <tr>





        </tr></thead>
        <?php






        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");
        $repos=$bdd->query("SET @@global.sql_mode=(SELECT REPLACE(@@global.sql_mode, 'ONLY_FULL_GROUP_BY', ''))");

        $repos = $bdd->prepare('SELECT  DISTINCT student_examnotes.studentid FROM `student_examnotes` INNER JOIN student on student.id=student_examnotes.studentid  WHERE  student_examnotes.specialityid=:idspec  and student_examnotes.acadyearid=:idanac  and student_examnotes.semesterid=:idsem and student_examnotes.sessionid=:idses order by student.firstname,student.lastname' );

        $repos->execute(array('idspec'=> $idspec,'idanac'=>$idanac,'idsem'=>$idsem,'idses'=>$idses));





        $k=1;


        while($resultat = $repos->fetch()){
            $idetudiant= $resultat['studentid'];


            $reposer = $bdd->prepare(' SELECT student.*, DATE_FORMAT(student.birthdate, \' %d/%m/%Y\') AS datenaiss,student_speciality.* FROM student inner join student_speciality ON student.id=student_speciality.studentid WHERE student.id=:idetudiant and student_speciality.specialityid=:idspec and acadyearid=:idanac and levelid=:idniv  ' );

            $reposer->execute(array('idetudiant'=> $idetudiant,'idspec'=> $idspec,'idanac'=>$idanac,'idniv'=>$levelid));

            $result = $reposer->fetch();








            ?>
            <tr><td style="text-align: center; border: solid 1px black; "  height="10px;"> <?php echo $k++;?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php if($result['school_classeid']=="RTELL2"){echo '';}if($result['school_classeid']=="RTELL2A"){echo 'A';}if($result['school_classeid']=="RTELL2B"){echo 'B';}if($result['school_classeid']=="RTELL2C"){echo 'C';}?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['state'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $idetudiant;?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['lastname']);?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['kind'];?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php  echo $result['datenaiss'] ;?></td>



                <td style="text-align: center; border: solid 1px black; background-color: #CCC "><?php echo uemajorsemaverage($idetudiant, $idspec,  $idsem, $idses, $idanac,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; background-color: #CCC  " > <?php  echo number_format(moyennesemestre($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; background-color: #CCC " > <?php echo tcredit($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd); ?></td>



                <td style="text-align: center; border: solid 1px black; background-color: #CCC  " ><?php if(decision($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='F') {echo 'ADMISE';}elseif(decision($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='REFUSE' AND $result['kind']=='F'){echo 'REFUSEE';}
                    elseif(decision($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='M') {echo 'ADMIS';}else{echo 'REFUSE';} ?></td>




            </tr>


        <?php }  ?>





    </table>
















</page>