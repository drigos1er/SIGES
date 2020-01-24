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






    <div  style="margin-top:20px; width:80%; margin-left:100px; text-align:center; font-size:18px; border: double; background-color:#CCC;"> DELIBERATION DE LA <?php echo  $libses;?> DU <?php echo  $libsem;?> <?php echo  $idanac?><BR /><span style="font-size:20px; font-weight:bold;"><?php echo  $levelname;?>&nbsp;<?php echo utf8_encode( $libspec);?><br>  </span></div>

    <br />

    <table style="border:solid 1px black;  text-align:center; font-size:7px;  border-collapse:collapse; " align="center">
        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 2.5%">
        <col style="width: 4.5%">

        <col style="width: 4.5%">

        <col style="width: 8%">
        <col style="width: 2%">
        <col style="width:3.8%">
        <col style="width: 3%">

        <col style="width: 1.8%">
        <col style="width: 1.8%">
        <col style="width: 2.4%">
        <col style="width: 3%">

        <col style="width: 1.8%">
        <col style="width: 1.8%">
        <col style="width: 2.4%"> <col style="width: 3%">

        <col style="width: 1.8%">
        <col style="width: 1.8%">
        <col style="width: 2.4%"> <col style="width: 3%">

        <col style="width: 1.8%">
        <col style="width: 1.8%">
        <col style="width: 2.4%">

        <col style="width: 3%">

        <col style="width: 1.8%">
        <col style="width: 1.8%">
        <col style="width: 3%">

        <col style="width: 1.8%">
        <col style="width: 1.8%">
        <col style="width: 2%">
        <col style="width: 2.4%">
        <col style="width: 3%">

        <col style="width: 1.8%">
        <col style="width: 1.8%">
        <col style="width: 3%">

        <col style="width: 1.8%">
        <col style="width: 1.8%">
        <col style="width: 2%">
        <col style="width: 2.8%">
        <thead>

        <tr><th style="text-align: center; border: solid 1px black; " rowspan="3" height="30"> N°</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> GPE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> STATUT</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> NOM </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> PRENOMS </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3">GENRE </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3">DATE DE NAISSANCE </th>

            <th style="text-align: center; border: solid 1px black;  " colspan="4">UE 1 ANGLAIS</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="4">UE 2 ENTREPRENARIAT</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="4">UE 3 DROIT</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="4">UE 4 PROJET TUTORES</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE 5 RECHERCHE OPERATIONNELLE</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE 6 STRUCTURE DES DONNEES ET PROGRAMMATION</th>



        </tr>

        <tr>


            <th style="text-align: center; border: solid 1px black;  " colspan="3">ANGLAIS</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>

            <th style="text-align: center; border: solid 1px black;  " colspan="3">ENTREPRENARIAT</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>

            <th style="text-align: center; border: solid 1px black;  " colspan="3">DROIT DES TELECOMS/TIC</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>

            <th style="text-align: center; border: solid 1px black;  " colspan="3">PROJET RT OU BDD</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>

            <th style="text-align: center; border: solid 1px black;  " colspan="3">OPTIMISATION LINEAIRE</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">GRAPHES ET APPLICATIONS</th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2">MOY UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>

            <th style="text-align: center; border: solid 1px black;  " colspan="3">STRUCTURE DE DONNEES COMPLEXES</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">PROGRAMMATIONS EN PYTHON</th>

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
SELECT  DISTINCT student_examnotes.studentid FROM `student_examnotes` INNER JOIN student on student.id=student_examnotes.studentid  WHERE  student_examnotes.specialityid=:idspec  and student_examnotes.acadyearid=:idanac  and student_examnotes.semesterid=:idsem and student_examnotes.sessionid=:idses order by student.firstname,student.lastname' );

        $repos->execute(array('idspec'=> $idspec,'idanac'=>$idanac,'idsem'=>$idsem,'idses'=>$idses));





        $k=1;


        while($resultat = $repos->fetch()){
            $idetudiant= $resultat['studentid'];


            $reposer = $bdd->prepare(' SELECT student.*, DATE_FORMAT(student.birthdate, \' %d/%m/%Y\') AS datenaiss,student_speciality.* FROM student inner join student_speciality ON student.id=student_speciality.studentid WHERE student.id=:idetudiant and student_speciality.specialityid=:idspec and acadyearid=:idanac and levelid=:idniv  ' );

            $reposer->execute(array('idetudiant'=> $idetudiant,'idspec'=> $idspec,'idanac'=>$idanac,'idniv'=>$levelid));

            $result = $reposer->fetch();








            ?>
            <tr><td style="text-align: center; border: solid 1px black; "  height="10px;"> <?php echo $k++;?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php if($result['school_classeid']=="SRITL3"){echo '';} if($result['school_classeid']=="SRITL3A"){echo 'A';}if($result['school_classeid']=="SRITL3B"){echo 'B';}if($result['school_classeid']=="SRITL3C"){echo 'C';}if($result['school_classeid']=="SRITL3D"){echo 'D';}?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['state'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['id'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['lastname']);?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['kind'];?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php  echo $result['datenaiss'] ;?></td>



                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1ANG3400',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1ANG3400',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1ANG3400',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1ANG3400',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'ANG3400',$idanac,$idspec,$idses,$bdd); ?></td>




                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1ENT3400',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1ENT3400',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1ENT3400',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1ENT3400',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'ENT3400',$idanac,$idspec,$idses,$bdd); ?></td>




                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1DRT3400',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1DRT3400',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1DRT3400',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1DRT3400',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'DRT3400',$idanac,$idspec,$idses,$bdd); ?></td>






                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1PRJ3400',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1PRJ3400',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1PRJ3400',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1PRJ3400',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'PRJ3400',$idanac,$idspec,$idses,$bdd); ?></td>



                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1MTH3400',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1MTH3400',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1MTH3400',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1MTH3400',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>




                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2MTH3400',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2MTH3400',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2MTH3400',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2MTH3400',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>




                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'MTH3400',$idanac,$idspec,$idses,$bdd),2); ?></td>


                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'MTH3400',$idanac,$idspec,$idses,$bdd); ?></td>






                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3400',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1INF3400',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3400',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1INF3400',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>




                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2INF3400',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2INF3400',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2INF3400',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2INF3400',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>





                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'INF3400',$idanac,$idspec,$idses,$bdd),2); ?></td>


                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'INF3400',$idanac,$idspec,$idses,$bdd); ?></td>











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






    <div  style="margin-top:20px; width:80%; margin-left:100px; text-align:center; font-size:18px; border: double; background-color:#CCC;"> DELIBERATION DE LA <?php echo  $libses;?> DU <?php echo  $libsem;?> <?php echo  $idanac?><BR /><span style="font-size:20px; font-weight:bold;"><?php echo  $levelname;?> <?php echo utf8_encode( $libspec);?><br>  </span></div>

    <br />

    <table style="border:solid 1px black;  text-align:center; font-size:7px;  border-collapse:collapse; " align="center">
        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 2.5%">
        <col style="width: 5%">

        <col style="width: 5.5%">

        <col style="width: 10%">
        <col style="width: 2.5%">
        <col style="width:3.8%">
        <col style="width: 3.5%">



        <col style="width: 2%">
        <col style="width: 2%"> <col style="width: 3.5%">



        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 2.8%">

        <col style="width: 3.5%">



        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 2.8%">
        <col style="width: 3.5%">



        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 2.8%"> <col style="width: 3.5%">



        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 2.8%">
        <col style="width: 4%">
        <col style="width: 3.5%">
        <col style="width: 3.5%">

        <thead>

        <tr><th style="text-align: center; border: solid 1px black; " rowspan="3" height="30"> N°</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> GPE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> STATUT</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> NOM </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> PRENOMS </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3">GENRE </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3">DATE DE NAISSANCE </th>

            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE 7 SIGNAUX ET SYSTEMES</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="4">UE 8 RESEAUX INFORMATIQUES</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="4">UE 9 TRANSMISSION ANALOGIQUE ET NUMERIQUE</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="4">UE 10 ADMINISTRATION ET SECURITE DES RESEAUX</th>

            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MOYENNE SEMESTRE </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> TOTAL CREDIT VALIDE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> DECISION</th>




        </tr>

        <tr>






            <th style="text-align: center; border: solid 1px black;  " colspan="3">TRAITEMENT DU SIGNAL</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">AUTOMATIQUE</th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2">MOY UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>

            <th style="text-align: center; border: solid 1px black;  " colspan="3">RESEAUX INFORMATIQUES</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>


            <th style="text-align: center; border: solid 1px black;  " colspan="3">TRANSMISSION ANALOGIQUE ET NUMERIQUE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>

            <th style="text-align: center; border: solid 1px black;  " colspan="3">ADMINISTRATION ET SECURITE DES RESEAUX</th>
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

        </tr></thead>
        <?php






        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare('
SELECT  DISTINCT student_examnotes.studentid FROM `student_examnotes` INNER JOIN student on student.id=student_examnotes.studentid  WHERE  student_examnotes.specialityid=:idspec  and student_examnotes.acadyearid=:idanac  and student_examnotes.semesterid=:idsem and student_examnotes.sessionid=:idses order by student.firstname,student.lastname' );

        $repos->execute(array('idspec'=> $idspec,'idanac'=>$idanac,'idsem'=>$idsem,'idses'=>$idses));





        $k=1;


        while($resultat = $repos->fetch()){
            $idetudiant= $resultat['studentid'];


            $reposer = $bdd->prepare(' SELECT student.*, DATE_FORMAT(student.birthdate, \' %d/%m/%Y\') AS datenaiss,student_speciality.* FROM student inner join student_speciality ON student.id=student_speciality.studentid WHERE student.id=:idetudiant and student_speciality.specialityid=:idspec and acadyearid=:idanac and levelid=:idniv  ' );

            $reposer->execute(array('idetudiant'=> $idetudiant,'idspec'=> $idspec,'idanac'=>$idanac,'idniv'=>$levelid));

            $result = $reposer->fetch();








            ?>
            <tr><td style="text-align: center; border: solid 1px black; "  height="10px;"> <?php echo $k++;?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php if($result['school_classeid']=="SRITL3"){echo '';} if($result['school_classeid']=="SRITL3A"){echo 'A';}if($result['school_classeid']=="SRITL3B"){echo 'B';}if($result['school_classeid']=="SRITL3C"){echo 'C';}if($result['school_classeid']=="SRITL3D"){echo 'D';}?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['state'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['id'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['lastname']);?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['kind'];?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php  echo $result['datenaiss'] ;?></td>




                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1PHY3400',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1PHY3400',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1PHY3400',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1PHY3400',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>



                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2PHY3400',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2PHY3400',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2PHY3400',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2PHY3400',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>



                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'PHY3400',$idanac,$idspec,$idses,$bdd),2); ?></td>


                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'PHY3400',$idanac,$idspec,$idses,$bdd); ?></td>




                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3401',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1INF3401',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3401',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1INF3401',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'INF3401',$idanac,$idspec,$idses,$bdd); ?></td>





                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1PHY3401',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1PHY3401',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1PHY3401',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1PHY3401',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'PHY3401',$idanac,$idspec,$idses,$bdd); ?></td>




                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3402',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1INF3402',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3402',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1INF3402',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'INF3402',$idanac,$idspec,$idses,$bdd); ?></td>



























                <td style="text-align: center; border: solid 1px black; " > <?php  echo number_format(moyennesemestre($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo tcredit($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd); ?></td>



                <td style="text-align: center; border: solid 1px black; " ><?php if(decision($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='F') {echo 'ADMISE';}elseif(decision($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='REFUSE' AND $result['kind']=='F'){echo 'REFUSEE';}
                    elseif(decision($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='M') {echo 'ADMIS';}else{echo 'REFUSE';} ?></td>





            </tr>


        <?php }  ?>





    </table>
















</page>


