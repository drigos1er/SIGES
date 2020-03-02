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

        <col style="width: 6.5%">
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

        <thead>

        <tr><th style="text-align: center; border: solid 1px black; " rowspan="3" height="30"> N°</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> GPE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> STATUT</th>

            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> NOM </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> PRENOMS </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3">GENRE </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3">DATE DE NAISSANCE </th>


            <th style="text-align: center; border: solid 1px black;  " colspan="4">UE 1 ANGLAIS </th>

            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE 2 DCOMMUNICATION ET DEVELOPPEMENT PERSONNEL </th>
            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE 3 GESTION DES PROJETS  </th>

            <th style="text-align: center; border: solid 1px black;  " colspan="4">UE 4   MONTAGE VIDEO  </th>

        </tr>

        <tr>

            <!--   ue1 -->
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Anglais </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>
            <!--   ue2 -->
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Méthodologie de rédaction du mémoire  </th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Développement Personnel  </th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2">MOY UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>

            <!--   ue3 -->
            <th style="text-align: center; border: solid 1px black;  " colspan="3"> Outils de Gestion des projets  </th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Méthodologies agiles </th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2">MOY UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>
            <!--   ue4 -->

            <th style="text-align: center; border: solid 1px black;  " colspan="3">   Montage vidéo </th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>
        </tr>
        <tr>

            <!--   bloc ue1 -->
            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>
            <!--   bloc due2  -->
            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>

            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>
            <!--   bloc ue3  -->
            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>

            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>

            <!--   bloc ue4  -->

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
                <td style="text-align: center; border: solid 1px black; " > <?php if($result['school_classeid']=="TWINL3"){echo '';}if($result['school_classeid']=="TWINL3A"){echo 'A';}if($result['school_classeid']=="TWINL3B"){echo 'B';}if($result['school_classeid']=="TWINL3C"){echo 'C';}?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['state'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['id'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['lastname']);?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['kind'];?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php  echo $result['datenaiss'] ;?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1ANG3460',$idanac,$idses,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1ANG3460',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1ANG3460',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1ANG3460',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'ANG3460',$idanac,$idspec,$idses,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1COM3460',$idanac,$idses,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1COM3460',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1COM3460',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1COM3460',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>


                <!--- ue2 Développement Personnel -->
                <td style="text-align: center; border: solid 1px black; "><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2COM3460',$idanac,$idses,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2COM3460',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2COM3460',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2COM3460',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>



                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'COM3460',$idanac,$idspec,$idses,$bdd),2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'COM3460',$idanac,$idspec,$idses,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; "><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1GES3460',$idanac,$idses,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1GES3460',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1GES3460',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1GES3460',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>


                <!--- ue3 Méthodologies agiles -->
                <td style="text-align: center; border: solid 1px black; "><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2GES3460',$idanac,$idses,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2GES3460',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2GES3460',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2GES3460',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'GES3460',$idanac,$idspec,$idses,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'GES3460',$idanac,$idspec,$idses,$bdd),2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3463',$idanac,$idses,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1INF3463',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3463',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1INF3463',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'INF3463',$idanac,$idspec,$idses,$bdd); ?></td>


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

        <col style="width: 6.5%">
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
        <col style="width: 2.2%">
        <col style="width: 3%">
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


            <th style="text-align: center; border: solid 1px black;  " colspan="4">UE 5  E-COMMERCE  </th>

            <th style="text-align: center; border: solid 1px black; background-color: #CCC " rowspan="3"> MOYENNE UE MINEURES </th>   <!--   fin bloc ue mineur  -->

            <!--   debut ue majeure  -->
            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE 6 MODELISATION ET ANIMATION 3D </th>
            <th style="text-align: center; border: solid 1px black;  " colspan="11">UE 7 STRATEGIE WEB </th>



        </tr>

        <tr>

            <!--   ue5 E-commerce-->

            <th style="text-align: center; border: solid 1px black;  " colspan="3"> E-commerce  </th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>
            <!--   bloc ue6  -->
            <th style="text-align: center; border: solid 1px black;  " colspan="3"> Motion & sound design </th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Modélisation 3D	 </th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2">MOY UE</th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>

            <!--   bloc ue7  -->
            <th style="text-align: center; border: solid 1px black;  " colspan="3">  Reférencement et web analytics	  </th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3"> CMS (WordPress, Drupal)	 </th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3"> Community management	 </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2">MOY UE</th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>



        </tr>
        <tr>

            <!--   bloc ue5  -->

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
            <!-- bloc ue7 -->

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
                <td style="text-align: center; border: solid 1px black; " > <?php if($result['school_classeid']=="TWINL3"){echo '';}if($result['school_classeid']=="TWINL3A"){echo 'A';}if($result['school_classeid']=="TWINL3B"){echo 'B';}if($result['school_classeid']=="TWINL3C"){echo 'C';}?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['state'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['id'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['lastname']);?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['kind'];?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php  echo $result['datenaiss'] ;?></td>

                <!--- ue5 ecommerce   -->
                <td style="text-align: center; border: solid 1px black; "><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3464',$idanac,$idses,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1INF3464',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3464',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1INF3464',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'INF3464',$idanac,$idspec,$idses,$bdd); ?></td>

                <!--- TOUS LES MINEUR EN DESSUS -->
                <td style="text-align: center; border: solid 1px black; background-color: #CCC "><?php echo ueminorsemaverage($idetudiant, $idspec,  $idsem, $idses, $idanac,$bdd); ?></td>



                <!--- debut moyenne majeur ue6  -->

                <td style="text-align: center; border: solid 1px black; "><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3462',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1INF3462',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3462',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1INF3462',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>



                <td style="text-align: center; border: solid 1px black; " ><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2INF3462',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2INF3462',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2INF3462',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2INF3462',$idanac,$idspec,$bdd); echo  number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'INF3462',$idanac,$idspec,$idses,$bdd),2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'INF3462',$idanac,$idspec,$idses,$bdd); ?></td>

                <!--- debut moyenne majeur ue7  -->
                <td style="text-align: center; border: solid 1px black; "><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3461',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1INF3461',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3461',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1INF3461',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>



                <td style="text-align: center; border: solid 1px black; " ><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2INF3461',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2INF3461',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2INF3461',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2INF3461',$idanac,$idspec,$bdd); echo  number_format($moyponde,2); ?></td>


                <td style="text-align: center; border: solid 1px black; " ><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU3INF3461',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU3INF3461',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU3INF3461',$idanac,$idses,$bdd)*creditecu($idsem,'ECU3INF3461',$idanac,$idspec,$bdd); echo  number_format($moyponde,2); ?></td>






                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'INF3461',$idanac,$idspec,$idses,$bdd),2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'INF3461',$idanac,$idspec,$idses,$bdd); ?></td>



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

        <col style="width: 7%">
        <col style="width: 10%">
        <col style="width:2.5%">

        <col style="width: 4.5%">
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
        <col style="width: 5%">

        <col style="width: 5%">
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


            <th style="text-align: center; border: solid 1px black;  " colspan="11">UE 8 DESIGN WEB  </th>


            <th style="text-align: center; border: solid 1px black; background-color: #CCC "  rowspan="3"> MOYENNE UE MAJEURES </th>

            <th style="text-align: center; border: solid 1px black; background-color: #CCC  "  rowspan="3"> MOYENNE GENERALE SEMESTRE </th>
            <th style="text-align: center; border: solid 1px black; background-color: #CCC  "  rowspan="3"> TOTAL CREDITS VALIDES</th>
            <th style="text-align: center; border: solid 1px black; background-color: #CCC  " rowspan="3"> DECISION DU JURY</th>


        </tr>

        <tr>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">	Web design	    </th>

            <th style="text-align: center; border: solid 1px black;  " colspan="3">Animation Web    </th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Ux design    </th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2">MOY UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>









        </tr>
        <tr>


            <!-- bloc ue8-->  <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>

            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>

            <th style="text-align: center; border: solid 1px black;  ">MOYENNE</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">MOY POND</th>



        </tr>
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
                <td style="text-align: center; border: solid 1px black; " > <?php if($result['school_classeid']=="TWINL3"){echo '';}if($result['school_classeid']=="TWINL3A"){echo 'A';}if($result['school_classeid']=="TWINL3B"){echo 'B';}if($result['school_classeid']=="TWINL3C"){echo 'C';}?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['state'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['id'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['lastname']);?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['kind'];?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php  echo $result['datenaiss'] ;?></td>



                <!-- bloc ue8-->     <td style="text-align: center; border: solid 1px black; "><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3460',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1INF3460',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF3460',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1INF3460',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>



                <td style="text-align: center; border: solid 1px black; " ><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2INF3460',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2INF3460',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2INF3460',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2INF3460',$idanac,$idspec,$bdd); echo  number_format($moyponde,2); ?></td>



                <td style="text-align: center; border: solid 1px black; " ><?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU3INF3460',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU3INF3460',$idanac,$idspec,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU3INF3460',$idanac,$idses,$bdd)*creditecu($idsem,'ECU3INF3460',$idanac,$idspec,$bdd); echo  number_format($moyponde,2); ?></td>






                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'INF3460',$idanac,$idspec,$idses,$bdd),2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideue($idetudiant,$idsem,'INF3460',$idanac,$idspec,$idses,$bdd); ?></td>





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