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
        <col style="width: 2%" >

        <col style="width: 2.5%">
        <col style="width: 6%">

        <col style="width: 6%">

        <col style="width: 10%">
        <col style="width: 2.5%">
        <col style="width:4%">


        <col style="width: 3%">

        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 2.6%">

        <col style="width: 3%">

        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 3%">

        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 2.6%">


        <col style="width: 3%">

        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 2.6%">

        <col style="width: 3%">

        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 2.6%">
        <col style="width: 3%">

        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 3%">

        <col style="width: 3.5%">

        <thead>

        <tr><th style="text-align: center; border: solid 1px black; " rowspan="3" height="30px;"> N°</th>


            <th style="text-align: center; border: solid 1px black; " rowspan="3"> STATUT</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> NOM </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> PRENOMS </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3">GENRE </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3">DATE DE NAISSANCE </th>
            <th style="text-align: center; border: solid 1px black;  " colspan="4">UE1 ANGLAIS</th>

            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE2 GESTION DE PROJET ET ENTREPRENARIAT</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE3 COMMUNICATION ET DEVELOPPEMENT PERSONNEL</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="4">UE4 VERIFICATION FORMELLE</th>



            <th style="text-align: center; border: solid 1px black; background-color: #CCC " rowspan="3"> MOYENNE UE MINEURES </th>   <!--   fin bloc ue mineur  -->















        </tr>

        <tr>


            <th style="text-align: center; border: solid 1px black;  " colspan="3">Anglais</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > Credits Validés</th>


            <th style="text-align: center; border: solid 1px black;  " colspan="3">Gestion des projets</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Entrepreneuriat</th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2">Moy. UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > Credits Validés</th>



            <th style="text-align: center; border: solid 1px black;  " colspan="3">Technique d'expression (Français)</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Developpement personnel</th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2">Moy. UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > Credits Validés</th>



            <th style="text-align: center; border: solid 1px black;  " colspan="3">Verification formelle</th>
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
SELECT  DISTINCT student_examnotes.studentid FROM `student_examnotes` INNER JOIN student on student.id=student_examnotes.studentid  WHERE  student_examnotes.specialityid=:idspec  and student_examnotes.acadyearid=:idanac  and student_examnotes.semesterid=:idsem and student_examnotes.sessionid=:idses AND `entry_date` >= "2019-09-01 00:00:00" order by student.firstname,student.lastname' );

        $repos->execute(array('idspec'=> $idspec,'idanac'=>$idanac,'idsem'=>$idsem,'idses'=>$idses));





        $k=1;


        while($resultat = $repos->fetch()){
            $idetudiant= $resultat['studentid'];


            $reposer = $bdd->prepare(' SELECT student.*, DATE_FORMAT(student.birthdate, \' %d/%m/%Y\') AS datenaiss,student_speciality.* FROM student inner join student_speciality ON student.id=student_speciality.studentid WHERE student.id=:idetudiant and student_speciality.specialityid=:idspec and acadyearid=:idanac and levelid=:idniv  ' );

            $reposer->execute(array('idetudiant'=> $idetudiant,'idspec'=> $idspec,'idanac'=>$idanac,'idniv'=>$levelid));

            $result = $reposer->fetch();








            ?>
            <tr><td style="text-align: center; border: solid 1px black; "  height="10px;"> <?php echo $k++;?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['state'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['id'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['lastname']);?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['kind'];?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php  echo $result['datenaiss'] ;?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1ANG2300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1ANG2300',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1ANG2300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1ANG2300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideuemaster($idetudiant,$idsem,'ANG2300',$idanac,$idspec,$idses,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1OGE2300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1OGE2300',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1OGE2300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1OGE2300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2OGE2300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2OGE2300',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2OGE2300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2OGE2300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'OGE2300',$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideuemaster($idetudiant,$idsem,'OGE2300',$idanac,$idspec,$idses,$bdd); ?></td>




                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1COM2300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1COM2300',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1COM2300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1COM2300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2COM2300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2COM2300',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2COM2300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2COM2300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'COM2300',$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideuemaster($idetudiant,$idsem,'COM2300',$idanac,$idspec,$idses,$bdd); ?></td>







                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF2301',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1INF2301',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF2301',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1INF2301',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideuemaster($idetudiant,$idsem,'INF2301',$idanac,$idspec,$idses,$bdd); ?></td>






                <!--- TOUS LES MINEUR EN DESSUS -->
                <td style="text-align: center; border: solid 1px black; background-color: #CCC "><?php echo ueminorsemaverage($idetudiant, $idspec,  $idsem, $idses, $idanac,$bdd); ?></td>









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

        <col style="width: 2%" >

        <col style="width: 2.5%">
        <col style="width: 6%">

        <col style="width: 6%">

        <col style="width: 10%">
        <col style="width: 2.5%">
        <col style="width:4%">


        <col style="width: 3%">

        <col style="width: 1.8%">
        <col style="width: 2%">

        <col style="width: 3%">

        <col style="width: 1.8%">
        <col style="width: 2%">

        <col style="width: 3%">

        <col style="width: 3%">
        <col style="width: 3%">

        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 3%">

        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 3%">
        <col style="width: 3%">

        <col style="width: 3%">

        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 3%">

        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 3%">
        <col style="width: 3%">

        <thead>

        <tr><th style="text-align: center; border: solid 1px black; " rowspan="3" height="30px;"> N°</th>


            <th style="text-align: center; border: solid 1px black; " rowspan="3"> STATUT</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> NOM </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> PRENOMS </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3">GENRE </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3">DATE DE NAISSANCE </th>
            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE5 BUSINESS INTELLIGENCE ET MULTIMEDIA</th>

            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE6 BDD ET JAVA</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE7 DEVELOPPEMENT</th>













        </tr>

        <tr>



            <th style="text-align: center; border: solid 1px black;  " colspan="3">Business intelligence</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">IHM et acquisition et gestion de contenus numériques</th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2">Moy. UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > Credits Validés</th>




            <th style="text-align: center; border: solid 1px black;  " colspan="3">BDD avancée</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">JAVA avancé</th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2">Moy. UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > Credits Validés</th>






            <th style="text-align: center; border: solid 1px black;  " colspan="3">Developpement mobile</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Programmation.NET</th>

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
SELECT  DISTINCT student_examnotes.studentid FROM `student_examnotes` INNER JOIN student on student.id=student_examnotes.studentid  WHERE  student_examnotes.specialityid=:idspec  and student_examnotes.acadyearid=:idanac  and student_examnotes.semesterid=:idsem and student_examnotes.sessionid=:idses AND `entry_date` >= "2019-09-01 00:00:00" order by student.firstname,student.lastname' );

        $repos->execute(array('idspec'=> $idspec,'idanac'=>$idanac,'idsem'=>$idsem,'idses'=>$idses));





        $k=1;


        while($resultat = $repos->fetch()){
            $idetudiant= $resultat['studentid'];


            $reposer = $bdd->prepare(' SELECT student.*, DATE_FORMAT(student.birthdate, \' %d/%m/%Y\') AS datenaiss,student_speciality.* FROM student inner join student_speciality ON student.id=student_speciality.studentid WHERE student.id=:idetudiant and student_speciality.specialityid=:idspec and acadyearid=:idanac and levelid=:idniv  ' );

            $reposer->execute(array('idetudiant'=> $idetudiant,'idspec'=> $idspec,'idanac'=>$idanac,'idniv'=>$levelid));

            $result = $reposer->fetch();








            ?>
            <tr><td style="text-align: center; border: solid 1px black; "  height="10px;"> <?php echo $k++;?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['state'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['id'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['lastname']);?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['kind'];?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php  echo $result['datenaiss'] ;?></td>



                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1IHM2300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1IHM2300',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1IHM2300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1IHM2300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2IHM2300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2IHM2300',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2IHM2300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2IHM2300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>




                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'IHM2300',$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideuemaster($idetudiant,$idsem,'IHM2300',$idanac,$idspec,$idses,$bdd); ?></td>





                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF2300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1INF2300',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1INF2300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1INF2300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2INF2300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2INF2300',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2INF2300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2INF2300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>




                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'INF2300',$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideuemaster($idetudiant,$idsem,'INF2300',$idanac,$idspec,$idses,$bdd); ?></td>







                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1PRG2300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1PRG2300',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1PRG2300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1PRG2300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2PRG2300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2PRG2300',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2PRG2300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2PRG2300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>




                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'PRG2300',$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideuemaster($idetudiant,$idsem,'PRG2300',$idanac,$idspec,$idses,$bdd); ?></td>





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

        <col style="width: 2%" >

        <col style="width: 2.5%">
        <col style="width: 6%">

        <col style="width: 6%">

        <col style="width: 15%">
        <col style="width: 2.5%">
        <col style="width:4%">


        <col style="width: 4%">
        <col style="width:2%">
        <col style="width: 3%">


        <col style="width: 4%">
        <col style="width:2%">
        <col style="width: 3%">
        <col style="width: 3%">
        <col style="width: 3%">
        <col style="width: 5%">
        <col style="width: 5%">
        <col style="width: 5%">
        <col style="width: 5%">
        <thead>

        <tr><th style="text-align: center; border: solid 1px black; " rowspan="3" height="30px;"> N°</th>


            <th style="text-align: center; border: solid 1px black; " rowspan="3"> STATUT</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> NOM </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> PRENOMS </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3">GENRE </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3">DATE DE NAISSANCE </th>

            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE8 ATELIER DE GENIE LOGICIEL</th>
            <th style="text-align: center; border: solid 1px black; background-color: #CCC "  rowspan="3"> MOYENNE UE MAJEURES </th>

            <th style="text-align: center; border: solid 1px black; background-color: #CCC" rowspan="3"> MOYENNE SEMESTRE </th>
            <th style="text-align: center; border: solid 1px black; background-color: #CCC" rowspan="3"> TOTAL CREDITS VALIDES</th>
            <th style="text-align: center; border: solid 1px black; background-color: #CCC" rowspan="3"> DECISION DU JURY</th>












        </tr>

        <tr>






            <th style="text-align: center; border: solid 1px black;  " colspan="3">Atelier de genie logiciel</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Methode de test et validation de logiciel</th>



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






        </tr>
        </thead>
        <?php






        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare('
SELECT  DISTINCT student_examnotes.studentid FROM `student_examnotes` INNER JOIN student on student.id=student_examnotes.studentid  WHERE  student_examnotes.specialityid=:idspec  and student_examnotes.acadyearid=:idanac  and student_examnotes.semesterid=:idsem and student_examnotes.sessionid=:idses And `entry_date` >= "2019-09-01 00:00:00" order by student.firstname,student.lastname' );

        $repos->execute(array('idspec'=> $idspec,'idanac'=>$idanac,'idsem'=>$idsem,'idses'=>$idses));





        $k=1;


        while($resultat = $repos->fetch()){
            $idetudiant= $resultat['studentid'];


            $reposer = $bdd->prepare(' SELECT student.*, DATE_FORMAT(student.birthdate, \' %d/%m/%Y\') AS datenaiss,student_speciality.* FROM student inner join student_speciality ON student.id=student_speciality.studentid WHERE student.id=:idetudiant and student_speciality.specialityid=:idspec and acadyearid=:idanac and levelid=:idniv  ' );

            $reposer->execute(array('idetudiant'=> $idetudiant,'idspec'=> $idspec,'idanac'=>$idanac,'idniv'=>$levelid));

            $result = $reposer->fetch();








            ?>
            <tr><td style="text-align: center; border: solid 1px black; "  height="10px;"> <?php echo $k++;?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['state'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['id'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['lastname']);?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['kind'];?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php  echo $result['datenaiss'] ;?></td>




                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1AGL2300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1AGL2300',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1AGL2300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1AGL2300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2AGL2300',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2AGL2300',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2AGL2300',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2AGL2300',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>




                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'AGL2300',$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideuemaster($idetudiant,$idsem,'AGL2300',$idanac,$idspec,$idses,$bdd); ?></td>




                <!-- Laisser intact code cidessous -->
                <td style="text-align: center; border: solid 1px black; background-color: #CCC "><?php echo uemajorsemaverage($idetudiant, $idspec,  $idsem, $idses, $idanac,$bdd); ?></td>





                <td style="text-align: center; border: solid 1px black; background-color: #CCC " > <?php  echo number_format(moyennesemestre($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; background-color: #CCC " > <?php echo tcreditmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; background-color: #CCC " ><?php if(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='F') {echo 'ADMISE';}elseif(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='REFUSE' AND $result['kind']=='F'){echo 'REFUSEE';}
                    elseif(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='M') {echo 'ADMIS';}else{echo 'REFUSE';} ?></td>



            </tr>


        <?php }  ?>





    </table>
















</page>