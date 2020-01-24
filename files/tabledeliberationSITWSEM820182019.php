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

        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 2%">
        <col style="width: 2.6%">

        <thead>

        <tr><th style="text-align: center; border: solid 1px black; " rowspan="3" height="30px;"> N°</th>


            <th style="text-align: center; border: solid 1px black; " rowspan="3"> STATUT</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> NOM </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> PRENOMS </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3">GENRE </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3">DATE DE NAISSANCE </th>
            <th style="text-align: center; border: solid 1px black;  " colspan="4">UE1 ANGLAIS</th>

            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE2 COMMUNICATION ET DEVELOPPEMENT PERSONNEL</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE3 IP ET DATA</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE4 ECONOMIE</th>















        </tr>

        <tr>


            <th style="text-align: center; border: solid 1px black;  " colspan="3">Anglais</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > Credits Validés</th>

            <th style="text-align: center; border: solid 1px black;  " colspan="3">Technique d'expression (Français)</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Developpement personnel</th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2">Moy. UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > Credits Validés</th>

            <th style="text-align: center; border: solid 1px black;  " colspan="3">Technologies IP avancées</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Securité Big Data et Cloud Computing</th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2">Moy. UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > Credits Validés</th>

            <th style="text-align: center; border: solid 1px black;  " colspan="3">Economie numérique</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Management des organisations</th>

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

            <th style="text-align: center; border: solid 1px black;  ">Moyenne</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">Moy Pond</th>



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

                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['state'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['id'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['lastname']);?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['kind'];?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php  echo $result['datenaiss'] ;?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1ANG2200',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1ANG2200',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1ANG2200',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1ANG2200',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideuemaster($idetudiant,$idsem,'ANG2200',$idanac,$idspec,$idses,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1COM2200',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1COM2200',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1COM2200',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1COM2200',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2COM2200',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2COM2200',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2COM2200',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2COM2200',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'COM2200',$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideuemaster($idetudiant,$idsem,'COM2200',$idanac,$idspec,$idses,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1DAT2200',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1DAT2200',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1DAT2200',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1DAT2200',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2DAT2200',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2DAT2200',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2DAT2200',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2DAT2200',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'DAT2200',$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideuemaster($idetudiant,$idsem,'DAT2200',$idanac,$idspec,$idses,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1ECO2200',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1ECO2200',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1ECO2200',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1ECO2200',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2ECO2200',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2ECO2200',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2ECO2200',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2ECO2200',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'ECO2200',$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideuemaster($idetudiant,$idsem,'ECO2200',$idanac,$idspec,$idses,$bdd); ?></td>










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
        <col style="width: 1.8%">
        <col style="width: 2%">


        <col style="width: 3%">

        <col style="width: 3%">
        <col style="width: 1.8%">
        <col style="width: 2%">

        <col style="width: 2.2%">


        <col style="width: 3%">
        <col style="width: 1.8%">
        <col style="width: 2%">

        <col style="width: 2.2%">
        <col style="width: 3%">
        <col style="width: 1.8%">
        <col style="width: 2%">

        <col style="width: 2.2%">

        <col style="width: 3%">
        <col style="width: 1.8%">
        <col style="width: 2%">

        <col style="width: 2.2%">
        <col style="width: 3%">
        <col style="width: 1.8%">
        <col style="width: 2%">

        <col style="width: 2.2%">
        <thead>

        <tr><th style="text-align: center; border: solid 1px black; " rowspan="3" height="30px;"> N°</th>


            <th style="text-align: center; border: solid 1px black; " rowspan="3"> STATUT</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> NOM </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> PRENOMS </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3">GENRE </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3">DATE DE NAISSANCE </th>

            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE5 PHP ET PROGRAMMATION ORIENTEE OBJET </th>

            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE6 PROGRAMMATION SYSTEMES ET RESEAUX</th>

            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE7 SECURITE SYSTEMES ET RESEAUX </th>











        </tr>

        <tr>








            <th style="text-align: center; border: solid 1px black;  " colspan="3">PHP avancé</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Programmation.NET</th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2">Moy. UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > Credits Validés</th>


            <th style="text-align: center; border: solid 1px black;  " colspan="3">Programmation systèmes et réseaux sous linux </th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Programmation systèmes et réseaux sous dotnet</th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2">Moy. UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > Credits Validés</th>



            <th style="text-align: center; border: solid 1px black;  " colspan="3">Sécurité des réseaux</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Sécurité des OS</th>

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

                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['state'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['id'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['lastname']);?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['kind'];?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php  echo $result['datenaiss'] ;?></td>





                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1POO2200',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1POO2200',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1POO2200',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1POO2200',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2POO2200',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2POO2200',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2POO2200',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2POO2200',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'POO2200',$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideuemaster($idetudiant,$idsem,'POO2200',$idanac,$idspec,$idses,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1PSR2200',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1PSR2200',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1PSR2200',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1PSR2200',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2PSR2200',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2PSR2200',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2PSR2200',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2PSR2200',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'PSR2200',$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideuemaster($idetudiant,$idsem,'PSR2200',$idanac,$idspec,$idses,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1SRS2200',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1SRS2200',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1SRS2200',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1SRS2200',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2SRS2200',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2SRS2200',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2SRS2200',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2SRS2200',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'SRS2200',$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideuemaster($idetudiant,$idsem,'SRS2200',$idanac,$idspec,$idses,$bdd); ?></td>






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
        <col style="width: 2%" >

        <col style="width: 2.5%">
        <col style="width: 6%">

        <col style="width: 6%">

        <col style="width: 15%">
        <col style="width: 2.5%">
        <col style="width:4%">






        <thead>

        <tr><th style="text-align: center; border: solid 1px black; " rowspan="3" height="30px;"> N°</th>


            <th style="text-align: center; border: solid 1px black; " rowspan="3"> STATUT</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> NOM </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> PRENOMS </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3">GENRE </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3">DATE DE NAISSANCE </th>






            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE8 SYSTEMES D'INFORMATION </th>





            <th style="text-align: center; border: solid 1px black;  " rowspan="3">MOYENNE DU SEMESTRE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3">NOMBRE DE CREDITS VALIDES </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3"> DECISION DU JURY</th>






        </tr><tr>









            <th style="text-align: center; border: solid 1px black;  " colspan="3">Sécurité des systèmes d'information</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">Sécurité des infrastructures web</th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2">Moy. UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > Credits Validés</th>


        </tr> <tr>



            <th style="text-align: center; border: solid 1px black;  ">Moyenne</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">Moy Pond</th>

            <th style="text-align: center; border: solid 1px black;  ">Moyenne</th>
            <th style="text-align: center; border: solid 1px black;  ">CECT</th>
            <th style="text-align: center; border: solid 1px black;  ">Moy Pond</th>


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

                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['state'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['id'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['lastname']);?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['kind'];?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php  echo $result['datenaiss'] ;?></td>




                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1SSI2200',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1SSI2200',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1SSI2200',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1SSI2200',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2SSI2200',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2SSI2200',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2SSI2200',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2SSI2200',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'SSI2200',$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideuemaster($idetudiant,$idsem,'SSI2200',$idanac,$idspec,$idses,$bdd); ?></td>







                <td style="text-align: center; border: solid 1px black; " > <?php  echo number_format(moyennesemestre($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo tcreditmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php if(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='F') {echo 'ADMISE';}elseif(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='REFUSE' AND $result['kind']=='F'){echo 'REFUSEE';}
                    elseif(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='M') {echo 'ADMIS';}else{echo 'REFUSE';} ?></td>



            </tr>


        <?php }  ?>





    </table>
















</page>