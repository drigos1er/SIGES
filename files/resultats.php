<?php
include("myfunctions.php");
?>
<page  backbottom="50mm" backtop="50mm" >


    <page_header>



        <table width="auto" border="0" cellspacing="0" style="margin-top: 10px">
            <tr>
                <td style="font-size:12px;">&nbsp;&nbsp;&nbsp;MINISTERE DE L'ECONOMIE NUMERIQUE </td> <td><span style="font-size:12px; margin-left:260px;">REPUBLIQUE DE CÔTE D'IVOIRE</span></td>
            </tr> <tr><td style="font-size:12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ET DE LA POSTE </td> <td><span style="font-size:14px; margin-left:320px;">.....................</span></td> </tr>
            <tr> <td><span style="font-size:14px; margin-left:80px; ">...........................</span></td><td><span style="font-size:14px; margin-left:280px;"><strong>Union_ Discipline _Travail</strong> </span></td></tr> <tr><td><span style="font-size:12px; "><img src="esatic.jpg"  alt="logoesatic" style="margin-left: 50px;" /></span></td><td><span style="font-size:20px; margin-left:40px;"></span></td></tr><tr><td><span style="font-size:12px; margin-left:80px;"> <strong>...........................</strong></span> </td> </tr><tr>  <td><strong>&nbsp;&nbsp;&nbsp;DIRECTION DE LA PEDAGOGIE</strong>  </td> </tr><tr><td><span style="font-size:12px; margin-left:26px;"></span></td></tr><tr><td><span style="font-size:12px; margin-left:26px;"></span></td></tr>
        </table><br><br>
        <span style="margin-left:100px;font-size:18px; "><strong> RESULTATS DE LA <?php echo  $libses;?> DU <?php echo  $libsem;?> <?php echo  $idanac;?></strong></span><br><span style="margin-left:300px;font-size:18px; "><strong><?php echo  $levelname;?> : <?php if($idspec=="TCSIGLSITW"){echo "INFORMATIQUE";} else {echo $idspec;} ?></strong></span><br><span style="margin-left:270px;font-size:12px; "><strong>(LISTE DES ADMIS PAR ORDRE DE MERITE)</strong></span><br><br><br>

    </page_header>

    <br><br>

    <page_footer>

        <span style="margin-left:10px; font-size:10px; margin-top:150px;  font-style:italic;">DELIBERATION  <?php echo  $libses;?> DU <?php echo  $libsem;?> &nbsp;&nbsp; <?php echo  $idanac;?>  &nbsp;&nbsp;<?php echo  $levelname;?> <?php echo  $idspec;?>&nbsp;&nbsp;<?php echo  $date;?> </span>   <span style="margin-left:200px; font-size:10px; margin-top:150px;  font-style:italic;">  [[page_cu]]/[[page_nb]]</span>
    </page_footer>

    <br><br><br>

    <table style="border:solid 1px black;  text-align:center; font-size:11px;  border-collapse:collapse; " align="center">
        <col style="width: 5%">
        <col style="width: 7%">

        <col style="width: 14%">

        <col style="width: 13%">

        <col style="width:25%">
        <col style="width: 6%">
        <col style="width:15%">
        <col style="width: 10%">

        <col style="width: 15%">











        <thead>

        <tr style="background-color:#d9d9d9;"><th style="text-align: center; border: solid 1px black; "  height="60px;"> N°</th>

            <th style="text-align: center; border: solid 1px black; " > CLASSE</th>

            <th style="text-align: center; border: solid 1px black; " > MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " > NOM </th>
            <th style="text-align: center; border: solid 1px black; " > PRENOMS </th>
            <th style="text-align: center; border: solid 1px black; " >GENRE </th>
            <th style="text-align: center; border: solid 1px black;  " >DATE DE NAISSANCE </th>


            <th style="text-align: center; border: solid 1px black;  " >MOYENNE DU SEMESTRE </th>









        </tr>

        </thead>
        <?php




        $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");
        $repos=$bdd->query("SET @@global.sql_mode=(SELECT REPLACE(@@global.sql_mode, 'ONLY_FULL_GROUP_BY', ''))");

        $repos = $bdd->prepare('SELECT DISTINCT halfyearly_delib.studentid FROM `halfyearly_delib` INNER JOIN student on student.id=halfyearly_delib.studentid WHERE halfyearly_delib.semesterid=:idsem and halfyearly_delib.sessionid=:idses and halfyearly_delib.specialityid=:idspec and halfyearly_delib.acadyearid=:idanac order by student.firstname,student.lastname ' );

        $repos->execute(array('idspec'=> $idspec,'idanac'=>$idanac,'idsem'=>$idsem,'idses'=>$idses));




        $k=1;


        while($resultat = $repos->fetch()) {





            $tabidsem[]=$resultat['studentid'];
            $tabmgsem[]=moyennnesemestrielle($resultat['studentid'],$idsem,$idanac,$idspec,$idses,$bdd);


        }
        array_multisort($tabmgsem,SORT_DESC,$tabidsem);



        foreach($tabidsem as $idetud) {




            $moyennesemestreid = moyennnesemestrielle($idetud,$idsem,$idanac,$idspec,$idses,$bdd);





            $repro = $bdd->prepare(' SELECT student.*, DATE_FORMAT(student.birthdate, \' %d/%m/%Y\') AS datenaiss,student_speciality.* FROM student inner join student_speciality ON student.id=student_speciality.studentid WHERE student.id=:idetudiant and  acadyearid=:idanac  ');
            $repro->execute(array('idetudiant' => $idetud, 'idanac'=> $idanac));
            $identite = $repro->fetch();



            if(decisionsemestrielle($identite['id'],$idsem,$idanac,$idspec,$idses,$bdd)=='ADMIS'){
                ?>









                <tr>  <td style="text-align: center; border: solid 1px black; " height="30px;"> <?php echo $k++;?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php if($identite['school_classeid']=="TCSIGLSITWM1"){echo "M1INFO";} else {echo $identite['school_classeid'];} ?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $identite['id'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($identite['firstname']);?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo strtoupper($identite['lastname']);?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $identite['kind'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $identite['datenaiss'];?></td>


                <td style="text-align: center; border: solid 1px black; " > <?php echo moyennnesemestrielle($identite['id'],$idsem,$idanac,$idspec,$idses,$bdd);?></td>



                </tr><?php }}
        ?>

        <tr><td colspan="8"><span style="margin-left:350px;font-size:12px; margin-top:50px; font-weight:bold"><strong> LE DIRECTEUR</strong></span></td></tr>

    </table>
















</page>





