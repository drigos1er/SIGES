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

            <th style="text-align: center; border: solid 1px black;  " colspan="4">UE 1 TRANSMISSIONS ANALOGIQUE ET NUMERIQUE </th>

            <th style="text-align: center; border: solid 1px black; background-color: #CCC " rowspan="3"> MOYENNE UE MINEURES </th>


            <!--   ue majeur  -->
            <th style="text-align: center; border: solid 1px black;  " colspan="11">UE 2 COMMUNICATION ET DEVELOPPEMENT PERSONNEL  </th>

            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE 3  ENTREPREUNARIAT ET DROIT  </th>


            <!--   ue majeur  -->





        </tr>

        <tr>


            <!--   ue1 -->
            <!--   ue3 -->
            <th style="text-align: center; border: solid 1px black;  " colspan="3">  Transmissions analogique et numerique </th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>

            <th style="text-align: center; border: solid 1px black;  " colspan="3">Anglais</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Français</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Développement personnel</th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2">MOY UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>

            <!--   ue2 -->
            <th style="text-align: center; border: solid 1px black;  " colspan="3">  Droit des Télécoms/TIC</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">   Entrepreunariat </th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2">MOY UE</th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>





        </tr>
        <tr>

            <!--   bloc ue1 -->
            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>

            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>

            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>

            <!--   bloc ue2 -->
            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>

            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>

            <!--   bloc ue3 -->
            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th></tr>

        </thead>
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

                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1PHY3401',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1PHY3401',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1PHY3401',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1PHY3401',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'PHY3401',$idanac,$idspec,$idses,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; background-color: #CCC "><?php echo ueminorsemaverage($idetudiant, $idspec,  $idsem, $idses, $idanac,$bdd); ?></td>





                <!--- debut UE1 moyenne majeur   -->

                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1COM3400',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1COM3400',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1COM3400',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1COM3400',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>



                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2COM3400',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2COM3400',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2COM3400',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2COM3400',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>



                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU3COM3400',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU3COM3400',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU3COM3400',$idanac,$idses,$bdd)*creditecu($idsem,'ECU3COM3400',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>







                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'COM3400',$idanac,$idspec,$idses,$bdd),2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'COM3400',$idanac,$idspec,$idses,$bdd); ?></td>

                <!--- UE2 moyenne majeur   -->
                <td style="text-align: center; border: solid 1px black; "><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1DRT3400',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1DRT3400',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1DRT3400',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1DRT3400',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>



                <td style="text-align: center; border: solid 1px black; " ><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2DRT3400',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2DRT3400',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2DRT3400',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2DRT3400',$idanac,$idspec,$bdd); echo  number_format($moyponde,2); ?></td>


                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'DRT3400',$idanac,$idspec,$idses,$bdd),2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'DRT3400',$idanac,$idspec,$idses,$bdd); ?></td>
                <!--- UE3 moyenne majeur   -->







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






    <div  style="margin-top:20px; width:80%; margin-left:100px; text-align:center; font-size:18px; border: double; background-color:#CCC;"> DELIBERATION DE LA <?php echo  $libses;?> DU <?php echo  $libsem;?> <?php echo  $idanac?><BR /><span style="font-size:20px; font-weight:bold;"><?php echo  $levelname;?> <?php echo $libspec;?><br>  </span></div>

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

            <!--   ue majeur  -->
            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE 4 STUCTURES DE DONNEES ET PROGRAMMATION      </th>
            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE 5 RESEAUX INFORMATIQUE ET ADMINISTRATION  </th>

            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE 6 RECHERCHE OPERATIONNELLE </th>


        </tr>

        <tr>

            <!--   ue4 -->

            <th style="text-align: center; border: solid 1px black;  " colspan="3"> Structure de données complexes   </th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Programmation en python   </th>


            <th style="text-align: center; border: solid 1px black;  " rowspan="2">MOY UE</th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>
            <!--   bloc ue5  -->
            <th style="text-align: center; border: solid 1px black;  " colspan="3"> Réseaux informatiques  </th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3"> Administration et sécurité des réseaux </th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2">MOY UE</th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>

            <!--   bloc ue6  -->
            <th style="text-align: center; border: solid 1px black;  " colspan="3"> Optimisation linéaire</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Graphes et applications  </th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2">MOY UE</th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>



        </tr>
        <tr>

            <!--   bloc ue4  -->

            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>

            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>


            <!-- bloc ue5 -->

            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>

            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>
            <!-- bloc ue6 -->

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



                <!--- debut moyenne majeur ue4  -->

                <td style="text-align: center; border: solid 1px black; "><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3400',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1INF3400',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3400',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1INF3400',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>



                <td style="text-align: center; border: solid 1px black; " ><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2INF3400',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2INF3400',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2INF3400',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2INF3400',$idanac,$idspec,$bdd); echo  number_format($moyponde,2); ?></td>




                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'INF3400',$idanac,$idspec,$idses,$bdd),2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'INF3400',$idanac,$idspec,$idses,$bdd); ?></td>

                <!---  moyenne majeur ue5  -->
                <td style="text-align: center; border: solid 1px black; "><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3401',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1INF3401',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3401',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1INF3401',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>



                <td style="text-align: center; border: solid 1px black; " ><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2INF3401',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2INF3401',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2INF3401',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2INF3401',$idanac,$idspec,$bdd); echo  number_format($moyponde,2); ?></td>







                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'INF3401',$idanac,$idspec,$idses,$bdd),2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'INF3401',$idanac,$idspec,$idses,$bdd); ?></td>



                <!---  moyenne majeur ue6  -->
                <td style="text-align: center; border: solid 1px black; "><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1MTH3400',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1MTH3400',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1MTH3400',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1MTH3400',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>



                <td style="text-align: center; border: solid 1px black; " ><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2MTH3400',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2MTH3400',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2MTH3400',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2MTH3400',$idanac,$idspec,$bdd); echo  number_format($moyponde,2); ?></td>







                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'MTH3400',$idanac,$idspec,$idses,$bdd),2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'MTH3400',$idanac,$idspec,$idses,$bdd); ?></td>



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






    <div  style="margin-top:20px; width:80%; margin-left:100px; text-align:center; font-size:18px; border: double; background-color:#CCC;"> DELIBERATION DE LA <?php echo  $libses;?> DU <?php echo  $libsem;?> <?php echo  $idanac?><BR /><span style="font-size:20px; font-weight:bold;"><?php echo  $levelname;?> <?php echo $libspec;?><br>  </span></div>

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
        <col style="width: 5%">
        <col style="width: 5%">
        <col style="width: 5%">


        <thead>

        <tr><th style="text-align: center; border: solid 1px black; " rowspan="3" height="30"> N°</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> GPE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> STATUT</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> NOM </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> PRENOMS </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3">GENRE </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3">DATE DE NAISSANCE </th>
            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE 7 SIGNAUX ET SYSTEMES </th>


            <th style="text-align: center; border: solid 1px black; background-color: #CCC "  rowspan="3"> MOYENNE UE MAJEURES </th>

            <th style="text-align: center; border: solid 1px black; background-color: #CCC  "  rowspan="3"> MOYENNE GENERALE SEMESTRE </th>
            <th style="text-align: center; border: solid 1px black; background-color: #CCC  "  rowspan="3"> TOTAL CREDITS VALIDES</th>
            <th style="text-align: center; border: solid 1px black; background-color: #CCC  " rowspan="3"> DECISION DU JURY</th>


        </tr>

        <tr>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Traitement du signal</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Automatique</th>


            <th style="text-align: center; border: solid 1px black;  " rowspan="2">MOY UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>









        </tr>
        <tr>


            <!-- bloc ue7-->  <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
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


                <!-- bloc ue7 -->
                <td style="text-align: center; border: solid 1px black; "><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1PHY3400',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1PHY3400',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1PHY3400',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1PHY3400',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>



                <td style="text-align: center; border: solid 1px black; " ><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2PHY3400',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2PHY3400',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2PHY3400',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2PHY3400',$idanac,$idspec,$bdd); echo  number_format($moyponde,2); ?></td>


                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'PHY3400',$idanac,$idspec,$idses,$bdd),2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'PHY3400',$idanac,$idspec,$idses,$bdd); ?></td>





                <!-- Laisser intact code cidessous -->
                <td style="text-align: center; border: solid 1px black; background-color: #CCC "><?php echo uemajorsemaverage($idetudiant, $idspec,  $idsem, $idses, $idanac,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; background-color: #CCC  " > <?php  echo number_format(moyennesemestre($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; background-color: #CCC " > <?php echo tcredit($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd); ?></td>



                <td style="text-align: center; border: solid 1px black; background-color: #CCC  " ><?php if(decision($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='F') {echo 'ADMISE';}elseif(decision($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='REFUSE' AND $result['kind']=='F'){echo 'REFUSEE';}
                    elseif(decision($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='M') {echo 'ADMIS';}else{echo 'REFUSE';} ?></td>




            </tr>


        <?php }  ?>





    </table>
















</page>