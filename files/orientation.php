<?php
include("myfunctions.php");
?>
<page  backbottom="20mm" backtop="80mm" >

    <page_header>



        <table width="auto" border="0" cellspacing="0" style="margin-top: 10px">
            <tr>
                <td style="font-size:12px;">&nbsp;&nbsp;&nbsp;MINISTERE DE L'ECONOMIE NUMERIQUE </td> <td><span style="font-size:12px; margin-left:260px;">REPUBLIQUE DE CÔTE D'IVOIRE</span></td>
            </tr> <tr><td style="font-size:12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ET DE LA POSTE </td> <td><span style="font-size:14px; margin-left:320px;">.....................</span></td> </tr>
            <tr> <td><span style="font-size:14px; margin-left:80px; ">...........................</span></td><td><span style="font-size:14px; margin-left:280px;"><strong>Union_ Discipline _Travail</strong> </span></td></tr> <tr><td><span style="font-size:12px; "><img src="esatic.jpg"  alt="logoesatic" style="margin-left: 50px;" /></span></td><td><span style="font-size:20px; margin-left:40px;"></span></td></tr><tr><td><span style="font-size:12px; margin-left:80px;"> <strong>...........................</strong></span> </td> </tr><tr>  <td><strong>&nbsp;&nbsp;&nbsp;DIRECTION DE LA PEDAGOGIE</strong>  </td> </tr><tr><td><span style="font-size:12px; margin-left:26px;"></span></td></tr><tr><td><span style="font-size:12px; margin-left:26px;"></span></td></tr>
        </table><br><br>

      <!--  <span style="margin-left:100px;font-size:18px; "><strong> RESULTATS DE LA <?php echo  $libses;?> DU <?php echo  $libsem;?> <?php echo  $idanac;?></strong></span><br><span style="margin-left:300px;font-size:18px; "><strong><?php echo  $levelname;?> : <?php if($idspec=="TCSIGLSITW"){echo "INFORMATIQUE";} else {echo $idspec;} ?></strong></span><br><span style="margin-left:200px;font-size:12px; "><strong>(LISTE DES ORIENTES EN  SIGL PAR ORDRE ALPHABETIQUE)</strong></span><br><br>-->



        <span style="margin-left:120px;font-size:18px; "><strong> RESULTAT DE L 'ANNEE ACADEMIQUE  &nbsp; <?php echo  $idanac;?></strong> <strong><?php echo  $levelname;?>  </strong></span><br><span style="margin-left:300px;font-size:18px; "></span><br><span style="margin-left:200px;font-size:12px; "><strong>(LISTE DES ORIENTES EN MASTER 1 INFORMATIQUE PAR ORDRE ALPHABETIQUE)</strong></span><br><br>

    </page_header>



    <page_footer>

        <span style="margin-left:10px; font-size:10px; margin-top:150px;  font-style:italic;">RESULTAT DE L 'ANNEE ACADEMIQUE  &nbsp;&nbsp; <?php echo  $idanac;?>  &nbsp;&nbsp;<?php echo  $levelname;?> &nbsp;&nbsp;<?php echo  $date;?> </span>   <span style="margin-left:280px; font-size:10px; margin-top:150px;  font-style:italic;">  [[page_cu]]/[[page_nb]]</span>

       <!-- <span style="margin-left:10px; font-size:10px; margin-top:150px;  font-style:italic;">DELIBERATION  <?php echo  $libses;?> DU <?php echo  $libsem;?> &nbsp;&nbsp; <?php echo  $idanac;?>  &nbsp;&nbsp;<?php echo  $levelname;?> <?php echo  $idspec;?>&nbsp;&nbsp;<?php echo  $date;?> </span>   <span style="margin-left:220px; font-size:10px; margin-top:150px;  font-style:italic;">  [[page_cu]]/[[page_nb]]</span>-->



    </page_footer>



    <table style="border:solid 1px black;  text-align:center; font-size:11px;  border-collapse:collapse; " align="center">
        <col style="width: 5%">
        <col style="width: 15%">

        <col style="width: 15%">

        <col style="width: 30%">

        <col style="width:15%">

        <col style="width:15%">







        <thead>

        <tr style="background-color:#d9d9d9;" ><th style="text-align: center; border: solid 1px black; "  height="50"> N°</th>



            <th style="text-align: center; border: solid 1px black; " > MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " > NOM </th>
            <th style="text-align: center; border: solid 1px black; " > PRENOMS </th>
            <th style="text-align: center; border: solid 1px black; " >GENRE </th>





            <th style="text-align: center; border: solid 1px black;  " >ORIENTATION  </th>



        </tr>

        </thead>
        <?php $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare(' SELECT orientation.*,student.*, DATE_FORMAT(student.birthdate, \' %d/%m/%Y\') AS datenaiss FROM `orientation`  INNER JOIN student on student.id=orientation.studentid where specialityid="SRIT" and acadyearid=:idanac  order by student.firstname,student.lastname ' );

        $repos->execute(array(/*'idspec'=> $idspec,*/'idanac'=>$idanac));




        $k=1;


        while($resultat = $repos->fetch()) {














            if(   $resultat['orientation'] =='INFO'	){

            ?>









            <tr>  <td style="text-align: center; border: solid 1px black; " height="20px;" > <?php echo $k++;?></td>

            <td style="text-align: center; border: solid 1px black; " > <?php echo $resultat['id'];?></td>
            <td style="text-align: left; border: solid 1px black; " > <?php echo $resultat['firstname'];?></td>
            <td style="text-align: left; border: solid 1px black; " > <?php echo $resultat['lastname'];?></td>
            <td style="text-align: center; border: solid 1px black; " > <?php echo $resultat['kind'];?></td>




                <td style="text-align: center; border: solid 1px black; " >INFORMATIQUE</td>

            </tr><?php }} ?>

         <tr><td colspan="6"><span style="margin-left:350px;font-size:12px; margin-top:50px; font-weight:bold"><strong> LE DIRECTEUR</strong></span></td></tr>

    </table>
















</page>



<!--<page  backbottom="5mm" backtop="1mm" >




    <table width="auto" border="0" cellspacing="0" style="margin-top: 10px">
        <tr>
            <td style="font-size:12px;">MINISTERE DE LA COMMUNICATION </td> <td><span style="font-size:12px; margin-left:260px;">REPUBLIQUE DE CÔTE D'IVOIRE</span></td>
        </tr> <tr><td style="font-size:12px;">DE L'ECONOMIE NUMERIQUE ET DE LA POSTE </td> <td><span style="font-size:14px; margin-left:320px;">.....................</span></td> </tr>
        <tr> <td><span style="font-size:14px; margin-left:80px; ">...........................</span></td><td><span style="font-size:14px; margin-left:280px;"><strong>Union_ Discipline _Travail</strong> </span></td></tr> <tr><td><span style="font-size:12px; "><img src="esatic.png"  alt="logoesatic" style="margin-left: 50px;" /></span></td><td><span style="font-size:20px; margin-left:40px;"></span></td></tr><tr><td><span style="font-size:12px; margin-left:80px;"> <strong>...........................</strong></span> </td> </tr><tr>  <td><strong>DIRECTION DE LA PEDAGOGIE</strong>  </td> </tr><tr><td><span style="font-size:12px; margin-left:26px;"></span></td></tr><tr><td><span style="font-size:12px; margin-left:26px;"></span></td></tr>
    </table>



    <page_footer>

        <span style="margin-left:20px; font-size:10px; margin-top:150px;  font-style:italic;"> <?php echo $date;?></span>   <span style="margin-left:220px;font-size:12px; margin-top:150px; font-weight:bold"></span><span style="margin-left:320px; font-size:10px; margin-top:150px;  font-style:italic;"> [[page_cu]]/[[page_nb]]</span>
    </page_footer>
    <span style="margin-left:100px;font-size:16px; "><strong> RESULTATS  DE LA 1<sup>ère</sup> SESSION DE L'ANNEE ACADEMIQUE <?php echo  $_SESSION['anacademie'];?></strong></span><br><span style="margin-left:300px;font-size:18px; "><strong><?php echo  $_SESSION['niv'];?> :<?php echo  $_SESSION['idspec'];?></strong></span><br><span style="margin-left:200px;font-size:14px; "><strong>(LISTE DES ORIENTES EN RTEL PAR ORDRE DE MERITE)</strong></span><br><br>


    <table style="border:solid 1px black;  text-align:center; font-size:11px;  border-collapse:collapse; " align="center">
        <col style="width: 3%">
        <col style="width: 7%">

        <col style="width: 15%">

        <col style="width: 13%">

        <col style="width:25%">
        <col style="width: 6%">
        <col style="width:15%">
        <col style="width: 10%">












        <thead>

        <tr><th style="text-align: center; border: solid 1px black; " > N°</th>

            <th style="text-align: center; border: solid 1px black; " > CLASSE</th>

            <th style="text-align: center; border: solid 1px black; " > MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " > NOM </th>
            <th style="text-align: center; border: solid 1px black; " > PRENOMS </th>
            <th style="text-align: center; border: solid 1px black; " >GENRE </th>



            <th style="text-align: center; border: solid 1px black;  " >MOYENNE ANNUELLE </th>

            <th style="text-align: center; border: solid 1px black;  " >MOYENNE ORIENTATION </th>





        </tr>

        </thead>
        <?php $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare(' SELECT  DISTINCT orientation.idetudiant, orientation.moyan FROM `orientation` INNER JOIN etudiantspecialite on etudiantspecialite.idetudiant=orientation.idetudiant  WHERE  orientation.idspecialite=:idspec  and orientation.idanacademie=:idanac  and etudiantspecialite.idniveau=:idniveau  ' );

        $repos->execute(array('idspec'=> $idspec,'idanac'=>$idanac,'idniveau'=>$idniv));




        $k=1;


        while($resultat = $repos->fetch()) {







            $tabidsem[]=$resultat['idetudiant'];
            $tabmgsem[]=$resultat['moyan'];


        }
        array_multisort($tabmgsem,SORT_DESC,$tabidsem);



        foreach($tabidsem as $idetud) {


            $repro = $bdd->prepare('SELECT etudiant.*, DATE_FORMAT(etudiant.datenais, \' %d/%m /%Y\') AS datenaiss,etudiantspecialite.* FROM  etudiant INNER JOIN etudiantspecialite on etudiant.id=etudiantspecialite.idetudiant  where etudiant.id=:idetudiant and etudiantspecialite.idanacademie=:idanac ');
            $repro->execute(array('idetudiant' => $idetud, 'idanac'=> $idanac));
            $identite = $repro->fetch();




            $repos = $bdd->prepare(' SELECT * FROM `orientation`  WHERE  orientation.idspecialite=:idspec  and orientation.idanacademie=:idanac  and orientation.idetudiant=:idetudiant ' );

            $repos->execute(array('idspec'=> $idspec,'idanac'=>$idanac,'idetudiant'=>$idetud));

            $etudor = $repos->fetch();




            if( $etudor['decisan']=='ADMIS' and  $etudor['orientation'] =='RTEL'	){

                ?>









                <tr>  <td style="text-align: center; border: solid 1px black; " height="20px;" > <?php echo $k++;?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $identite['idclasse'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $identite['id'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo $identite['nom'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo $identite['prenom'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $identite['genre'];?></td>



                <td style="text-align: center; border: solid 1px black; " > <?php echo   $etudor['moyan'];?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo   $etudor['moyscient'];?></td>

                </tr><?php }} ?>

        <tr><td colspan="7"><span style="margin-left:350px;font-size:12px; margin-top:50px; font-weight:bold"><strong> LE DIRECTEUR</strong></span></td></tr>

    </table>
















</page>

<page  backbottom="5mm" backtop="1mm" >




    <table width="auto" border="0" cellspacing="0" style="margin-top: 10px">
        <tr>
            <td style="font-size:12px;">MINISTERE DE LA COMMUNICATION </td> <td><span style="font-size:12px; margin-left:260px;">REPUBLIQUE DE CÔTE D'IVOIRE</span></td>
        </tr> <tr><td style="font-size:12px;">DE L'ECONOMIE NUMERIQUE ET DE LA POSTE </td> <td><span style="font-size:14px; margin-left:320px;">.....................</span></td> </tr>
        <tr> <td><span style="font-size:14px; margin-left:80px; ">...........................</span></td><td><span style="font-size:14px; margin-left:280px;"><strong>Union_ Discipline _Travail</strong> </span></td></tr> <tr><td><span style="font-size:12px; "><img src="esatic.png"  alt="logoesatic" style="margin-left: 50px;" /></span></td><td><span style="font-size:20px; margin-left:40px;"></span></td></tr><tr><td><span style="font-size:12px; margin-left:80px;"> <strong>...........................</strong></span> </td> </tr><tr>  <td><strong>DIRECTION DE LA PEDAGOGIE</strong>  </td> </tr><tr><td><span style="font-size:12px; margin-left:26px;"></span></td></tr><tr><td><span style="font-size:12px; margin-left:26px;"></span></td></tr>
    </table>



    <page_footer>

        <span style="margin-left:20px; font-size:10px; margin-top:150px;  font-style:italic;"> <?php echo $date;?></span>   <span style="margin-left:220px;font-size:12px; margin-top:150px; font-weight:bold"></span><span style="margin-left:320px; font-size:10px; margin-top:150px;  font-style:italic;"> [[page_cu]]/[[page_nb]]</span>
    </page_footer>
    <span style="margin-left:100px;font-size:16px; "><strong> RESULTATS  DE LA 1<sup>ère</sup> SESSION DE L'ANNEE ACADEMIQUE <?php echo  $_SESSION['anacademie'];?></strong></span><br><span style="margin-left:300px;font-size:18px; "><strong><?php echo  $_SESSION['niv'];?> :<?php echo  $_SESSION['idspec'];?></strong></span><br><span style="margin-left:200px;font-size:14px; "><strong>(LISTE DES ORIENTES EN SIGL PAR ORDRE DE MERITE)</strong></span><br><br>


    <table style="border:solid 1px black;  text-align:center; font-size:11px;  border-collapse:collapse; " align="center">
        <col style="width: 3%">
        <col style="width: 7%">

        <col style="width: 15%">

        <col style="width: 13%">

        <col style="width:25%">
        <col style="width: 6%">
        <col style="width:15%">
        <col style="width: 10%">












        <thead>

        <tr><th style="text-align: center; border: solid 1px black; " > N°</th>

            <th style="text-align: center; border: solid 1px black; " > CLASSE</th>

            <th style="text-align: center; border: solid 1px black; " > MATRICULE</th>
            <th style="text-align: center; border: solid 1px black; " > NOM </th>
            <th style="text-align: center; border: solid 1px black; " > PRENOMS </th>
            <th style="text-align: center; border: solid 1px black; " >GENRE </th>



            <th style="text-align: center; border: solid 1px black;  " >MOYENNE ANNUELLE </th>

            <th style="text-align: center; border: solid 1px black;  " >MOYENNE ORIENTATION </th>





        </tr>

        </thead>
        <?php $repos=$bdd->query("SET OPTION SQL_BIG_SELECTS=1");

        $repos = $bdd->prepare(' SELECT  DISTINCT orientation.idetudiant, orientation.moyan FROM `orientation` INNER JOIN etudiantspecialite on etudiantspecialite.idetudiant=orientation.idetudiant  WHERE  orientation.idspecialite=:idspec  and orientation.idanacademie=:idanac  and etudiantspecialite.idniveau=:idniveau  ' );

        $repos->execute(array('idspec'=> $idspec,'idanac'=>$idanac,'idniveau'=>$idniv));




        $k=1;


        while($resultat = $repos->fetch()) {







            $tabidsem[]=$resultat['idetudiant'];
            $tabmgsem[]=$resultat['moyan'];


        }
        array_multisort($tabmgsem,SORT_DESC,$tabidsem);



        foreach($tabidsem as $idetud) {


            $repro = $bdd->prepare('SELECT etudiant.*, DATE_FORMAT(etudiant.datenais, \' %d/%m /%Y\') AS datenaiss,etudiantspecialite.* FROM  etudiant INNER JOIN etudiantspecialite on etudiant.id=etudiantspecialite.idetudiant  where etudiant.id=:idetudiant and etudiantspecialite.idanacademie=:idanac ');
            $repro->execute(array('idetudiant' => $idetud, 'idanac'=> $idanac));
            $identite = $repro->fetch();




            $repos = $bdd->prepare(' SELECT * FROM `orientation`  WHERE  orientation.idspecialite=:idspec  and orientation.idanacademie=:idanac  and orientation.idetudiant=:idetudiant ' );

            $repos->execute(array('idspec'=> $idspec,'idanac'=>$idanac,'idetudiant'=>$idetud));

            $etudor = $repos->fetch();




            if( $etudor['decisan']=='ADMIS' and  $etudor['orientation'] =='SIGL'	){

                ?>









                <tr>  <td style="text-align: center; border: solid 1px black; " height="20px;" > <?php echo $k++;?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $identite['idclasse'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $identite['id'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo $identite['nom'];?></td>
                <td style="text-align: left; border: solid 1px black; " > <?php echo $identite['prenom'];?></td>
                <td style="text-align: center; border: solid 1px black; " > <?php echo $identite['genre'];?></td>



                <td style="text-align: center; border: solid 1px black; " > <?php echo   $etudor['moyan'];?></td>

                <td style="text-align: center; border: solid 1px black; " > <?php echo   $etudor['moyscient'];?></td>

                </tr><?php }} ?>

        <tr><td colspan="7"><span style="margin-left:350px;font-size:12px; margin-top:50px; font-weight:bold"><strong> LE DIRECTEUR</strong></span></td></tr>

    </table>
















</page> -->