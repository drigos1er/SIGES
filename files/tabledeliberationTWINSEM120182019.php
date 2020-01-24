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






    <div  style="margin-top:20px; width:80%; margin-left:100px; text-align:center; font-size:18px; border: double; background-color:#CCC;">RECLAMATIONS DE LA  DELIBERATION DE LA <?php echo  $libses;?> DU <?php echo  $libsem;?> <?php echo  $idanac?><BR /><span style="font-size:20px; font-weight:bold;"><?php echo  $levelname;?>&nbsp;<?php echo utf8_encode( $libspec);?><br>  </span></div>

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

        <col style="width: 4%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">
        <col style="width: 4%">

        <col style="width: 2.2%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">
        <col style="width: 3%">

        <col style="width: 4%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">
        <col style="width: 3%">

        <col style="width: 4%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">

        <col style="width: 4%">
        <col style="width: 2.2%">
        <col style="width: 2.2%">
        <col style="width: 2%">
        <col style="width: 2.8%">

        <thead>

        <tr><th style="text-align: center; border: solid 1px black; " rowspan="3" height="30px;"> N°</th>

            <th style="text-align: center; border: solid 1px black; " rowspan="3"> GPE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> STATUT</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> NOM </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> PRENOMS </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3">DATE DE NAISSANCE </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3">GENRE </th>



            <th style="text-align: center; border: solid 1px black;  " colspan="4">UE 1 ANGLAIS</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE 2 COMMUNICATION ET DEVELOPPEMENT PERSONNEL</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="4">UE 3 DROIT</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE 4 ARCHITECTURES DES ORDINATEURS ET LOGICIELS SCIENTIFIQUES</th>














        </tr>

        <tr>


            <th style="text-align: center; border: solid 1px black;  " colspan="3">ANGLAIS</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>

            <th style="text-align: center; border: solid 1px black;  " colspan="3">TECCHNIQUE D'EXPRESSION FRANCAISE</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">DEVELOPPEMENT PERSONNEL</th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2">MOY UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>








            <th style="text-align: center; border: solid 1px black;  " colspan="3">INTRODUCTION AU DROIT</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>

            <th style="text-align: center; border: solid 1px black;  " colspan="3">ARCHITECTURES DES ORDINATEURS</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">LOGICIELS SCIENTIFIQUES</th>

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

        $repos = $bdd->prepare('
SELECT  DISTINCT student_examnotes.studentid FROM `student_examnotes` INNER JOIN student on student.id=student_examnotes.studentid  WHERE  student_examnotes.specialityid=:idspec  and student_examnotes.acadyearid=:idanac  and student_examnotes.semesterid=:idsem and student_examnotes.sessionid=:idses  and `entry_date` >= "2019-09-01 00:00:00" order by student.firstname,student.lastname' );

        $repos->execute(array('idspec'=> $idspec,'idanac'=>$idanac,'idsem'=>$idsem,'idses'=>$idses));





        $k=1;


        while($resultat = $repos->fetch()){
            $idetudiant= $resultat['studentid'];


            $reposer = $bdd->prepare(' SELECT student.*, DATE_FORMAT(student.birthdate, \' %d/%m/%Y\') AS datenaiss,student_speciality.* FROM student inner join student_speciality ON student.id=student_speciality.studentid WHERE student.id=:idetudiant and student_speciality.specialityid=:idspec and acadyearid=:idanac and levelid=:idniv  ' );

            $reposer->execute(array('idetudiant'=> $idetudiant,'idspec'=> $idspec,'idanac'=>$idanac,'idniv'=>$levelid));

            $result = $reposer->fetch();








            ?>
            <tr><td style="text-align: center; border: solid 1px black; "  height="10px;"> <?php echo $k++;?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php if($result['school_classeid']=="TWINL1"){echo '';}if($result['school_classeid']=="TWINL1A"){echo 'A';}if($result['school_classeid']=="TWINL1B"){echo 'B';}if($result['school_classeid']=="TWINL1C"){echo 'C';}?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['state'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['id'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['lastname']);?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php  echo $result['datenaiss'] ;?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['kind'];?></td>




                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1ANG3100',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1ANG3100',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1ANG3100',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1ANG3100',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'ANG3100',$idanac,$idspec,$idses,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1COM3100',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1COM3100',$idanac,$idspec,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1COM3100',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1COM3100',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2COM3100',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2COM3100',$idanac,$idspec,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2COM3100',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2COM3100',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>
                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'COM3100',$idanac,$idspec,$idses,$bdd),2); ?></td>


                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'COM3100',$idanac,$idspec,$idses,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; "><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1DRT3100',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1DRT3100',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1DRT3100',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1DRT3100',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'DRT3100',$idanac,$idspec,$idses,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3101',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1INF3101',$idanac,$idspec,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3101',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1INF3101',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2INF3101',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2INF3101',$idanac,$idspec,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2INF3101',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2INF3101',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>
                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'INF3101',$idanac,$idspec,$idses,$bdd),2); ?></td>


                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'INF3101',$idanac,$idspec,$idses,$bdd); ?></td>














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






    <div  style="margin-top:20px; width:80%; margin-left:100px; text-align:center; font-size:18px; border: double; background-color:#CCC;">RECLAMATIONS DE LA  DELIBERATION DE LA <?php echo  $libses;?> DU <?php echo  $libsem;?> <?php echo  $idanac?><BR /><span style="font-size:20px; font-weight:bold;"><?php echo  $levelname;?> <?php echo utf8_encode( $libspec);?><br>  </span></div>

    <br />

    <table style="border:solid 1px black;  text-align:center; font-size:7px;  border-collapse:collapse; " align="center">

        <thead>
        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 3%">


        <col style="width: 6.2%">

        <col style="width: 5.5%">
        <col style="width: 8%">

        <col style="width:4%">
        <col style="width: 2.6%">
        <col style="width: 3.4%">



        <col style="width: 1.8%">
        <col style="width: 2%">

        <col style="width: 3.2%">



        <col style="width: 1.8%">
        <col style="width: 2%">

        <col style="width: 1.8%">
        <col style="width: 2.8%">


        <col style="width: 3.2%">



        <col style="width: 1.8%">
        <col style="width: 2%">

        <col style="width: 3.2%">



        <col style="width: 1.8%">
        <col style="width: 2.5%">

        <col style="width: 2.2%">
        <col style="width: 2.8%">

        <col style="width: 3.2%">



        <col style="width: 1.8%">
        <col style="width: 2%">

        <col style="width: 3.2%">



        <col style="width: 1.8%">
        <col style="width: 2.5%">

        <col style="width: 2%">
        <col style="width: 3%">

        <col style="width: 3.5%">
        <col style="width: 3%">
        <col style="width: 3.2%">

        <tr><<th style="text-align: center; border: solid 1px black; " rowspan="3" height="30px;"> N°</th>

            <th style="text-align: center; border: solid 1px black; " rowspan="3"> GPE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> STATUT</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> NOM </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> PRENOMS </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3">DATE DE NAISSANCE </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3">GENRE </th>




            <th style="text-align: center; border: solid 1px black;  " colspan="8">INITIATION AUX SYSTEMES D'EXPLOITATION</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="8">INITIATION A LA PROGRAMMATION</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="8">FONCTIONS A VARIABLES REELLES</th>





        </tr>

        <tr>






            <th style="text-align: center; border: solid 1px black;  " colspan="3">INTRODUCTION AUX SYSTEMES D'EXPLOITATION</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">INTRODUCTION A LINUX/UNIX</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2">MOY UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2">CREDITS VALIDES</th>


            <th style="text-align: center; border: solid 1px black;  " colspan="3">INITIATION A L'ALGORITHMIQUE </th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">PROGRAMMATION PYTHON</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2">MOY UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2">CREDITS VALIDES</th>


            <th style="text-align: center; border: solid 1px black;  " colspan="3">FONCTION D'UNE VARIABLE REELLE</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">GEOMETRIE DIFFERENTIELLE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2">MOY UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2">CREDITS VALIDES</th>
















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

        $repos = $bdd->prepare('
SELECT  DISTINCT student_examnotes.studentid FROM `student_examnotes` INNER JOIN student on student.id=student_examnotes.studentid  WHERE  student_examnotes.specialityid=:idspec  and student_examnotes.acadyearid=:idanac  and student_examnotes.semesterid=:idsem and student_examnotes.sessionid=:idses and `entry_date` >= "2019-09-01 00:00:00" order by student.firstname,student.lastname' );

        $repos->execute(array('idspec'=> $idspec,'idanac'=>$idanac,'idsem'=>$idsem,'idses'=>$idses));





        $k=1;


        while($resultat = $repos->fetch()){
            $idetudiant= $resultat['studentid'];


            $reposer = $bdd->prepare(' SELECT student.*, DATE_FORMAT(student.birthdate, \' %d/%m/%Y\') AS datenaiss,student_speciality.* FROM student inner join student_speciality ON student.id=student_speciality.studentid WHERE student.id=:idetudiant and student_speciality.specialityid=:idspec and acadyearid=:idanac and levelid=:idniv  ' );

            $reposer->execute(array('idetudiant'=> $idetudiant,'idspec'=> $idspec,'idanac'=>$idanac,'idniv'=>$levelid));

            $result = $reposer->fetch();








            ?>
            <tr><td style="text-align: center; border: solid 1px black; "  height="10px;"> <?php echo $k++;?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php if($result['school_classeid']=="TWINL1"){echo '';}if($result['school_classeid']=="TWINL1A"){echo 'A';}if($result['school_classeid']=="TWINL1B"){echo 'B';}if($result['school_classeid']=="TWINL1C"){echo 'C';}?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['state'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['id'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['lastname']);?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php  echo $result['datenaiss'] ;?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['kind'];?></td>


                <td style="text-align: center; border: solid 1px black; " ><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3102',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1INF3102',$idanac,$idspec,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3102',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1INF3102',$idanac,$idspec,$bdd); echo  number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2INF3102',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2INF3102',$idanac,$idspec,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2INF3102',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2INF3102',$idanac,$idspec,$bdd); echo  number_format($moyponde,2); ?></td>
                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'INF3102',$idanac,$idspec,$idses,$bdd),2); ?></td>


                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'INF3102',$idanac,$idspec,$idses,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3103',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1INF3103',$idanac,$idspec,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3103',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1INF3103',$idanac,$idspec,$bdd); echo  number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2INF3103',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2INF3103',$idanac,$idspec,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2INF3103',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2INF3103',$idanac,$idspec,$bdd); echo  number_format($moyponde,2); ?></td>
                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'INF3103',$idanac,$idspec,$idses,$bdd),2); ?></td>


                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'INF3103',$idanac,$idspec,$idses,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; " ><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1MTH3101',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1MTH3101',$idanac,$idspec,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1MTH3101',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1MTH3101',$idanac,$idspec,$bdd); echo  number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2MTH3101',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2MTH3101',$idanac,$idspec,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2MTH3101',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2MTH3101',$idanac,$idspec,$bdd); echo  number_format($moyponde,2); ?></td>
                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'MTH3101',$idanac,$idspec,$idses,$bdd),2); ?></td>


                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'MTH3101',$idanac,$idspec,$idses,$bdd); ?></td>








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






    <div  style="margin-top:20px; width:80%; margin-left:100px; text-align:center; font-size:18px; border: double; background-color:#CCC;"> RECLAMATIONS DE LA  DELIBERATION DE LA <?php echo  $libses;?> DU <?php echo  $libsem;?> <?php echo  $idanac?><BR /><span style="font-size:20px; font-weight:bold;"><?php echo  $levelname;?> <?php echo utf8_encode( $libspec);?><br>  </span></div>

    <br />

    <table style="border:solid 1px black;  text-align:center; font-size:7px;  border-collapse:collapse; " align="center">


        <thead>
        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 3%">


        <col style="width: 6.2%">

        <col style="width: 5.5%">
        <col style="width: 10%">

        <col style="width:5%">
        <col style="width: 2.6%">
        <col style="width: 4%">



        <col style="width: 2.2%">
        <col style="width: 2.2%">

        <col style="width: 4%">



        <col style="width: 2.2%">
        <col style="width: 2.2%">
        <col style="width: 3%">
        <col style="width: 4%">
        <col style="width: 4%">
        <col style="width: 4%">

        <tr><<th style="text-align: center; border: solid 1px black; " rowspan="3" height="30px;"> N°</th>

            <th style="text-align: center; border: solid 1px black; " rowspan="3"> GPE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> STATUT</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> NOM </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> PRENOMS </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3">DATE DE NAISSANCE </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3">GENRE </th>




            <th style="text-align: center; border: solid 1px black;  " colspan="8">ELEMENTS D'ALGEBRE</th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="3">MOYENNE DU SEMESTRE</th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="3">TOTAL CREDIT</th>





            <th style="text-align: center; border: solid 1px black;  " rowspan="3">DECISION DU JURY</th>



        </tr>

        <tr>






            <th style="text-align: center; border: solid 1px black;  " colspan="3">LOGIQUE ET RAISONNEMENTS MATHEMATIQUES</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">STRUCTURES ALGEBRIQUES</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2">MOY UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2">CREDITS VALIDES</th>















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
SELECT  DISTINCT student_examnotes.studentid FROM `student_examnotes` INNER JOIN student on student.id=student_examnotes.studentid  WHERE  student_examnotes.specialityid=:idspec  and student_examnotes.acadyearid=:idanac  and student_examnotes.semesterid=:idsem and student_examnotes.sessionid=:idses and `entry_date` >= "2019-09-01 00:00:00" order by student.firstname,student.lastname' );

        $repos->execute(array('idspec'=> $idspec,'idanac'=>$idanac,'idsem'=>$idsem,'idses'=>$idses));





        $k=1;


        while($resultat = $repos->fetch()){
            $idetudiant= $resultat['studentid'];


            $reposer = $bdd->prepare(' SELECT student.*, DATE_FORMAT(student.birthdate, \' %d/%m/%Y\') AS datenaiss,student_speciality.* FROM student inner join student_speciality ON student.id=student_speciality.studentid WHERE student.id=:idetudiant and student_speciality.specialityid=:idspec and acadyearid=:idanac and levelid=:idniv  ' );

            $reposer->execute(array('idetudiant'=> $idetudiant,'idspec'=> $idspec,'idanac'=>$idanac,'idniv'=>$levelid));

            $result = $reposer->fetch();








            ?>
            <tr><td style="text-align: center; border: solid 1px black; "  height="10px;"> <?php echo $k++;?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php if($result['school_classeid']=="TWINL1"){echo '';}if($result['school_classeid']=="TWINL1A"){echo 'A';}if($result['school_classeid']=="TWINL1B"){echo 'B';}if($result['school_classeid']=="TWINL1C"){echo 'C';}?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['state'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['id'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['lastname']);?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php  echo $result['datenaiss'] ;?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['kind'];?></td>


                <td style="text-align: center; border: solid 1px black; " ><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1MTH3100',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1MTH3100',$idanac,$idspec,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1MTH3100',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1MTH3100',$idanac,$idspec,$bdd); echo  number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2MTH3100',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2MTH3100',$idanac,$idspec,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2MTH3100',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2MTH3100',$idanac,$idspec,$bdd); echo  number_format($moyponde,2); ?></td>
                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'MTH3100',$idanac,$idspec,$idses,$bdd),2); ?></td>


                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'MTH3100',$idanac,$idspec,$idses,$bdd); ?></td>




                <td style="text-align: center; border: solid 1px black; " > <?php  echo number_format(moyennesemestre($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo tcredit($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd); ?></td>





                <td style="text-align: center; border: solid 1px black; " ><?php if(decision($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='F') {echo 'ADMISE';}elseif(decision($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='REFUSE' AND $result['kind']=='F'){echo 'REFUSEE';}
                    elseif(decision($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='M') {echo 'ADMIS';}else{echo 'REFUSE';} ?></td>




            </tr>


        <?php }  ?>





    </table>
















</page>