<?php
include('filesfunctions.php');
?>
<page  backbottom="10mm" backtop="95mm" >


    <page_header>


    <table width="auto" border="0" cellspacing="0" style="margin-top: 10px">
        <tr>
            <td style="font-size:12px;">&nbsp;&nbsp;&nbsp;MINISTERE DE L'ECONOMIE NUMERIQUE </td> <td><span style="font-size:12px; margin-left:260px;">REPUBLIQUE DE CÔTE D'IVOIRE</span></td>
        </tr> <tr><td style="font-size:12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ET DE LA POSTE </td> <td><span style="font-size:14px; margin-left:320px;">.....................</span></td> </tr>
        <tr> <td><span style="font-size:14px; margin-left:80px; ">...........................</span></td><td><span style="font-size:14px; margin-left:280px;"><strong>Union_ Discipline _Travail</strong> </span></td></tr> <tr><td><span style="font-size:12px; "><img src="esatic.jpg"  alt="logoesatic" style="margin-left: 50px;" /></span></td><td><span style="font-size:20px; margin-left:40px;"></span></td></tr><tr><td><span style="font-size:12px; margin-left:80px;"> <strong>...........................</strong></span> </td> </tr><tr>  <td><strong>&nbsp;&nbsp;&nbsp;DIRECTION DE LA PEDAGOGIE</strong>  </td> </tr><tr><td><span style="font-size:12px; margin-left:26px;"></span></td></tr><tr><td><span style="font-size:12px; margin-left:26px;"></span></td></tr>
    </table><br>

        <div  style="margin-top:0px;  text-align:center; font-size:18px;  "> NOTES D'EXAMENS- ANNEE ACADEMIQUE : <strong><?php echo $idanac; ?></strong><BR /><br><span style="font-size:16px; font-weight:bold;">SPECIALITE :<?php echo $idspec; ?>  &nbsp;&nbsp;- &nbsp;&nbsp;  NIVEAU: <?php echo $levelname; ?><br><br> CLASSE: <?php echo $idclass; ?>&nbsp;&nbsp;- &nbsp;&nbsp;<?php echo $semname; ?>- &nbsp;&nbsp;<?php echo $libses; ?></span></div><br>
        <div  style="margin-top:0px;  text-align:center; font-size:16px;  text-decoration: underline ">UE: <?php echo $uename; ?></div><br>



        <div  style=" margin-left:100px;  font-size:18px; background-color:#CCC; text-align: center; font-weight: bold; width: 70%;  " align="center"> ECUE: &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ecuname; ?></div>


    </page_header>



    <page_footer>

        <span style="margin-left:20px; font-size:10px; margin-top:150px;  font-style:italic;"> <?php echo $idclass.'  '. $semname.'  '. $date;?> &nbsp;&nbsp;&copy;SIGES-SMCC</span>   <span style="margin-left:100px;font-size:12px; margin-top:150px; font-weight:bold"></span><span style="margin-left:320px; font-size:10px; margin-top:150px;  font-style:italic;"> [[page_cu]]/[[page_nb]]</span>
    </page_footer>


    <table style="border:solid 1px black;  text-align:center; font-size:11px;  border-collapse:collapse; " align="center">
        <col style="width: 5%">
        <col style="width: 14%">

        <col style="width: 15%">

        <col style="width: 28%">

        <col style="width:10%">
        <col style="width: 6%">
        <col style="width:8%">
        <col style="width:8%">










        <thead>


        <tr style="background-color:#d9d9d9;"><th style="text-align: center; border: solid 1px black; "  height="60px;"> N°</th>



            <th style="text-align: center; border: solid 1px black; " > MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " > NOM </th>
            <th style="text-align: center; border: solid 1px black; " > PRENOMS </th>

            <th style="text-align: center; border: solid 1px black;  " >DATE DE NAISSANCE </th>
            <th style="text-align: center; border: solid 1px black; " >GENRE </th>

            <th style="text-align: center; border: solid 1px black;  " >NOTE EXAMEN</th>

            <th style="text-align: center; border: solid 1px black;  " >NOTE EXAMEN  TP</th>







        </tr>

        </thead>



        <?php

if($idses=='SE1'){





        $rep=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $rep = $bdd->prepare('SELECT student.*, DATE_FORMAT(student.birthdate, \' %d/%m/%Y\') AS birthd,student_speciality.* FROM  student INNER JOIN student_speciality on student.id=student_speciality.studentid  where student_speciality.acadyearid=:idanac and student_speciality.specialityid=:idspec and school_classeid=:idclasse order by student.firstname,student.lastname ');
        $rep->execute(array('idspec' => $idspec, 'idanac'=> $idanac,'idclasse'=> $idclass));





        $k=1;


        while ($identity = $rep->fetch()) {
            ?>



            <tr>  <td style="text-align: center; border: solid 1px black; " height="30px;"> <?php echo $k++;?></td>

            <td style="text-align: center; border: solid 1px black; " > <?php echo $identity['id'];?></td>
            <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($identity['firstname']);?></td>
            <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($identity['lastname']);?></td>
            <td style="text-align: center; border: solid 1px black; " > <?php echo $identity['birthd'];?></td>
            <td style="text-align: center; border: solid 1px black; " > <?php echo $identity['kind'];?></td>
                <td style="text-align: center; border: solid 1px black; " ><?php echo theoexamnotes($identity['id'],$idsem,$idses,$idue,$idecu,$idanac,$bdd)?> </td>
                <td style="text-align: center; border: solid 1px black; " ><?php echo tpexamnotes($identity['id'],$idsem,$idses,$idue,$idecu,$idanac,$bdd)?> </td>
            </tr>
        <?php }}else{




    $rep=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

    $rep = $bdd->prepare('SELECT DISTINCT student_examnotes.studentid FROM  student INNER JOIN student_examnotes on student.id=student_examnotes.studentid  where student_examnotes.acadyearid=:idanac and student_examnotes.specialityid=:idspec and student_examnotes.semesterid=:idsem and student_examnotes.sessionid=:idses  order by student.firstname,student.lastname ');
    $rep->execute(array('idspec' => $idspec, 'idanac'=> $idanac,'idsem'=> $idsem,'idses'=> $idses));





    $k=1;


    while ($identitys = $rep->fetch()) {
        $reps = $bdd->prepare('SELECT DISTINCT student.*, DATE_FORMAT(student.birthdate, \' %d/%m/%Y\') AS birthd FROM  student   where id=:studentid ');
        $reps->execute(array('studentid' => $identitys['studentid']));
        $identity = $reps->fetch();
        ?>



        <tr>  <td style="text-align: center; border: solid 1px black; " height="30px;"> <?php echo $k++;?></td>

            <td style="text-align: center; border: solid 1px black; " > <?php echo $identity['id'];?></td>
            <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($identity['firstname']);?></td>
            <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($identity['lastname']);?></td>
            <td style="text-align: center; border: solid 1px black; " > <?php echo $identity['birthd'];?></td>
            <td style="text-align: center; border: solid 1px black; " > <?php echo $identity['kind'];?></td>
            <td style="text-align: center; border: solid 1px black; " ><?php echo theoexamnotes($identity['id'],$idsem,$idses,$idue,$idecu,$idanac,$bdd)?> </td>
            <td style="text-align: center; border: solid 1px black; " ><?php echo tpexamnotes($identity['id'],$idsem,$idses,$idue,$idecu,$idanac,$bdd)?> </td>
        </tr>
    <?php }




}







?>

        <tr><td colspan="7">&nbsp;</td>

        </tr>
        <tr><td colspan="7">&nbsp;</td>

        </tr>



    </table>
















</page>





