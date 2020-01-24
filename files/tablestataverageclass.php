<?php
include("filesfunctions.php");
?>

<page backbottom="5mm" backtop="95mm" >

    <page_header>


        <table width="auto" border="0" cellspacing="0" style="margin-top: 10px">
            <tr>
                <td style="font-size:14px;">&nbsp;&nbsp;&nbsp;MINISTERE DE L'ECONOMIE NUMERIQUE </td> <td><span style="font-size:14px; margin-left:800px;">REPUBLIQUE DE C�TE D'IVOIRE</span></td>
            </tr> <tr><td style="font-size:12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ET DE LA POSTE </td> <td><span style="font-size:14px; margin-left:670px;">.....................</span></td> </tr>
            <tr> <td><span style="font-size:14px; margin-left:80px; ">...........................</span></td><td><span style="font-size:14px; margin-left:610px;"><strong>Union_ Discipline _Travail</strong> </span></td></tr> <tr><td><span style="font-size:12px; "><img src="esatic.jpg"  alt="logoesatic" style="margin-left: 20px;" /></span></td><td><span style="font-size:20px; margin-left:40px;"></span></td></tr><tr><td><span style="font-size:12px; margin-left:80px;"> <strong>...........................</strong></span> </td> </tr><tr>  <td><strong>&nbsp;&nbsp;&nbsp;DIRECTION DE LA PEDAGOGIE</strong>  </td> </tr><tr><td><span style="font-size:12px; margin-left:26px;"></span></td></tr><tr><td><span style="font-size:12px; margin-left:26px;"></span></td></tr>
        </table><br>

        <div  style="margin-top:0px;  text-align:center; font-size:18px;  ">STATISTIQUES  MOYENNES DE CONTROLES CONTINUS <?php if($typeaverage=='TP'){echo '(<strong>TP</strong>)';} ?>- ANNEE ACADEMIQUE : <strong><?php echo $idanac; ?></strong><BR /><br><span style="font-size:16px; font-weight:bold;">SPECIALITE :<?php echo $idspec; ?>  &nbsp;&nbsp;- &nbsp;&nbsp;  NIVEAU: <?php echo $levelname; ?><br><br> CLASSE: <?php echo $idclass; ?>&nbsp;&nbsp;- &nbsp;&nbsp;<?php echo $semname; ?></span></div><br>
        <div  style="margin-top:0px;  text-align:center; font-size:16px;  text-decoration: underline ">UE: <?php echo $uename; ?></div><br>



        <div  style=" margin-left:180px;  font-size:18px; background-color:#CCC; text-align: center; font-weight: bold; width: 70%;  " align="center"> ECUE: &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ecuname; ?></div>


    </page_header>





    <page_footer>

        <span style="margin-left:20px; font-size:10px; margin-top:150px;  font-style:italic;"> <?php echo $idclass.'  '. $semname.'  '. $date;?> &nbsp;&nbsp;&copy;SIGES-SMCC</span>   <span style="margin-left:100px;font-size:12px; margin-top:150px; font-weight:bold"></span><span style="margin-left:620px; font-size:10px; margin-top:150px;  font-style:italic;"> [[page_cu]]/[[page_nb]]</span>
    </page_footer>



    <br />

    <table style="border:solid 1px black;  text-align:left; font-size:12px;  border-collapse:collapse;" align="center">



        <col style="width: 4%">
        <col style="width: 4%">
        <col style="width: 5%">

        <col style="width: 8%">


        <col style="width: 3%">
        <col style="width: 3%">
        <col style="width: 3%">
        <col style="width: 5%">


        <col style="width: 3%">
        <col style="width: 3%">
        <col style="width: 3%">
        <col style="width: 5%">

        <col style="width: 3%">
        <col style="width: 3%">
        <col style="width: 3%">
        <col style="width: 5%">

        <col style="width: 10%">
        <col style="width: 10%">
        <col style="width: 10%">






        <thead>

        <tr style="background-color:#d9d9d9;">


            <th style="text-align: center; border: solid 1px black;  " colspan="3" height="20px;">EFFECTIF</th>

            <th style="text-align: center; border: solid 1px black;"rowspan="2"> PRESENT</th>


            <th style="text-align: center; border: solid 1px black;  " colspan="4"> 0&lt;= M.S.&lt;8 </th>
            <th style="text-align: center; border: solid 1px black;  " colspan="4"> 8&lt;= M.S.&lt;10 </th>
            <th style="text-align: center; border: solid 1px black;  " colspan="4"> M.S.>= 10</th>
            <th style="text-align: center; border: solid 1px black;"rowspan="2"> MOYENNE DE LA CLASSE</th>
            <th style="text-align: center; border: solid 1px black;"rowspan="2"> MOYENNE MAXI.</th>
            <th style="text-align: center; border: solid 1px black;"rowspan="2"> MOYENNE MINI.</th>

        </tr>


        <tr style="background-color:#d9d9d9;">



            <th style="text-align: center; border: solid 1px black; " height="20px;"> F</th>
            <th style="text-align: center; border: solid 1px black; ">G </th>
            <th style="text-align: center; border: solid 1px black; "> T</th>

            <th style="text-align: center; border: solid 1px black; "> F</th>
            <th style="text-align: center; border: solid 1px black; ">G </th>
            <th style="text-align: center; border: solid 1px black; "> T</th>
            <th style="text-align: center; border: solid 1px black; "> %</th>

            <th style="text-align: center; border: solid 1px black; "> F</th>
            <th style="text-align: center; border: solid 1px black; ">G </th>
            <th style="text-align: center; border: solid 1px black; "> T</th>
            <th style="text-align: center; border: solid 1px black; "> %</th>

            <th style="text-align: center; border: solid 1px black; "> F</th>
            <th style="text-align: center; border: solid 1px black; ">G </th>
            <th style="text-align: center; border: solid 1px black; "> T</th>
            <th style="text-align: center; border: solid 1px black; "> %</th>






        </tr></thead>

<tbody>
        <tr>





            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbsudentf=nbstudentfofclass($idanac,$idspec,$idclass,$bdd); echo $nbsudentf;?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbsudentg=nbstudentgofclass($idanac,$idspec,$idclass,$bdd); echo $nbsudentg;?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbsudent=nbstudentofclass($idanac,$idspec,$idclass,$bdd); echo $nbsudent;?> </td>


            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresent=nbpresentofclass($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idclass,$bdd); echo $nbpresent;?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbavergtzf=nbavergtzfofclass($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idclass,$bdd); echo $nbavergtzf;?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbavergtzg=nbavergtzgofclass($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idclass,$bdd); echo $nbavergtzg;?>   </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbavergtz=nbavergtzofclass($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idclass,$bdd); echo $nbavergtz;?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php  $percentgtz= number_format(($nbavergtz*100)/$nbpresent,2); echo $percentgtz;?> </td>



            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbaverlttf=nbaverlttfofclass($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idclass,$bdd); echo $nbaverlttf;?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbaverlttg=nbaverlttgofclass($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idclass,$bdd); echo $nbaverlttg;?>   </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbaverltt=nbaverlttofclass($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idclass,$bdd); echo $nbaverltt;?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php  $percentltt= number_format(($nbaverltt*100)/$nbpresent,2); echo $percentltt;?> </td>






            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbavergttf=nbavergttfofclass($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idclass,$bdd); echo $nbavergttf;?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbavergttg=nbavergttgofclass($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idclass,$bdd); echo $nbavergttg;?>   </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbavergtt=nbavergttofclass($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idclass,$bdd); echo $nbavergtt;?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php  $percentgtt= number_format(($nbavergtt*100)/$nbpresent,2); echo $percentgtt;?> </td>



            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averofclasse=averageofclass($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idclass,$bdd); echo $averofclasse;?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $avermaxofclasse=averagemaxofclass($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idclass,$bdd); echo $avermaxofclasse;?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averminofclasse=averageminofclass($idanac,$idspec,$idsem,$idue,$idecu,$typeaver,$idclass,$bdd); echo $averminofclasse;?> </td>

        </tr>

</tbody>
    </table>

    </page>

























