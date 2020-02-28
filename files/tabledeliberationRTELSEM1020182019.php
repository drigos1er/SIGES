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

        <col style="width: 3%">
        <col style="width: 6%">

        <col style="width: 7%">

        <col style="width: 9%">
        <col style="width: 3%">
        <col style="width:5%">


        <col style="width: 4%">

        <col style="width: 2.5%">
        <col style="width: 2.5%">

        <col style="width: 4%">

        <col style="width: 2.5%">
        <col style="width: 2.5%">

        <col style="width: 2.5%">
        <col style="width: 3.3%">

        <col style="width: 4%">

        <col style="width: 2.5%">
        <col style="width: 2.5%">

        <col style="width: 3.3%">
        <col style="width: 4%">

        <col style="width: 2.5%">
        <col style="width: 2.5%">

        <col style="width: 3.3%">
        <col style="width: 5.5%">
        <col style="width: 5.5%">
        <col style="width: 5.5%">
        <thead>

        <tr><th style="text-align: center; border: solid 1px black; " rowspan="3"> N°</th>


            <th style="text-align: center; border: solid 1px black; " rowspan="3"> STATUT</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> NOM </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3"> PRENOMS </th>
            <th style="text-align: center; border: solid 1px black; " rowspan="3">GENRE </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3">DATE DE NAISSANCE </th>
            <th style="text-align: center; border: solid 1px black;  " colspan="8">UE1 PROJET INTERNE</th>
            <th style="text-align: center; border: solid 1px black;  " colspan="4">UE2 STAGE</th>

            <th style="text-align: center; border: solid 1px black;  " colspan="4">UE3 SEMINAIRES</th>


            <th style="text-align: center; border: solid 1px black;  " rowspan="3">MOYENNE DU SEMESTRE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3">NOMBRE DE CREDITS VALIDES </th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="3"> DECISION DU JURY</th>











        </tr>

        <tr>



            <th style="text-align: center; border: solid 1px black;  " colspan="3">PROJET INTERNE (CAHIER DE CHARGE) </th>
            <th style="text-align: center; border: solid 1px black;  " colspan="3">PROJET INTERNE (DEVELOPPEMENT) </th>

            <th style="text-align: center; border: solid 1px black;  " rowspan="2">MOY UE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>





            <th style="text-align: center; border: solid 1px black;  " colspan="3">STAGE</th>
            <th style="text-align: center; border: solid 1px black;  " rowspan="2" > CREDITS VALIDES</th>

            <th style="text-align: center; border: solid 1px black;  " colspan="3">SEMINAIRES   (Gestion de projet, E-commerce, Gestion des spectres, Attribution de fréquences, Big Data, Cloud…)</th>
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








        </tr></thead>
        <?php






        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare('
SELECT  DISTINCT student_examnotes.studentid FROM `student_examnotes` INNER JOIN student on student.id=student_examnotes.studentid  WHERE  student_examnotes.specialityid=:idspec  and student_examnotes.acadyearid=:idanac and entry_date >="2020-02-01 13:00:06"  and student_examnotes.semesterid=:idsem and student_examnotes.sessionid=:idses order by student.firstname,student.lastname' );

        $repos->execute(array('idspec'=> $idspec,'idanac'=>$idanac,'idsem'=>$idsem,'idses'=>$idses));





        $k=1;


        while($resultat = $repos->fetch()){
            $idetudiant= $resultat['studentid'];


            $reposer = $bdd->prepare(' SELECT student.*, DATE_FORMAT(student.birthdate, \' %d/%m/%Y\') AS datenaiss,student_speciality.* FROM student inner join student_speciality ON student.id=student_speciality.studentid WHERE student.id=:idetudiant and student_speciality.specialityid=:idspec and acadyearid=:idanac and levelid=:idniv  ' );

            $reposer->execute(array('idetudiant'=> $idetudiant,'idspec'=> $idspec,'idanac'=>$idanac,'idniv'=>$levelid));

            $result = $reposer->fetch();





        $repost = $bdd->prepare("SELECT  acadyearid FROM `halfyearly_delib` WHERE  studentid=:idetudiant and specialityid=:idspecialite and semesterid='SEM9'  order by acadyearid DESC  LIMIT 1 " );

        $repost->execute(array('idspecialite'=>$idspec,'idetudiant'=>$idetudiant));

        $anac1 = $repost->fetch();



        if(decisionsemestrielle($idetudiant,'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd)==""){
            $decisionsem1=decisionsemestrielle($idetudiant,'SEM9',$anac1['acadyearid'],$idspec,'SE1',$bdd);
        }else{
            $decisionsem1=decisionsemestrielle($idetudiant,'SEM9',$anac1['acadyearid'],$idspec,'SE2',$bdd);
        }







        if($decisionsem1=='ADMIS' and tcreditmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)>=10)
        {



            ?>
            <tr><td style="text-align: center; border: solid 1px black; "  height="10px;"> <?php echo $k++;?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['state'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['id'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($result['lastname']);?></td>




                <td style="text-align: center; border: solid 1px black; " > <?php echo $result['kind'];?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php  echo $result['datenaiss'] ;?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1PRJ2400',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1PRJ2400',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1PRJ2400',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1PRJ2400',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>



                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU2PRJ2400',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU2PRJ2400',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU2PRJ2400',$idanac,$idses,$bdd)*creditecu($idsem,'ECU2PRJ2400',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>


                <td style="text-align: center; border: solid 1px black; " ><?php echo number_format(moyenneue($idetudiant,$idsem,'PRJ2400',$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideuemaster($idetudiant,$idsem,'PRJ2400',$idanac,$idspec,$idses,$bdd); ?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1STA2400',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1STA2400',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1STA2400',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1STA2400',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideuemaster($idetudiant,$idsem,'STA2400',$idanac,$idspec,$idses,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo moyenneecu($idetudiant,$idspec,$idsem,'ECU1MUL2400',$idanac,$idses,$bdd); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo creditecu($idsem,'ECU1MUL2400',$idanac,$idspec,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php $moyponde=moyenneecu($idetudiant,$idspec,$idsem,'ECU1MUL2400',$idanac,$idses,$bdd)*creditecu($idsem,'ECU1MUL2400',$idanac,$idspec,$bdd); echo number_format($moyponde,2); ?></td>

                <td style="text-align: center; border: solid 1px black; "><?php echo creditvalideuemaster($idetudiant,$idsem,'MUL2400',$idanac,$idspec,$idses,$bdd); ?></td>





                <td style="text-align: center; border: solid 1px black; " > <?php  echo number_format(moyennesemestre($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd),2); ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo tcreditmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd); ?></td>

                <td style="text-align: center; border: solid 1px black; " ><?php if(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='F') {echo 'ADMISE';}elseif(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='REFUSE' AND $result['kind']=='F'){echo 'REFUSEE';}
                    elseif(decisionmaster($idetudiant,$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS' AND $result['kind']=='M') {echo 'ADMIS';}else{echo 'REFUSE';} ?></td>




            </tr>


        <?php } } ?>





    </table>
















</page>

