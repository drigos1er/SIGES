<?php
include("myfunctions.php");


if($typesem=='IMPAIR'){



?>

<page backtop="1mm" >


    <?php
    include("header.php");
    ?>

    <page_footer>

        <span style="margin-left:10px; font-size:10px; margin-top:150px;  font-style:italic;"> <?php echo $date;?></span>   <span style="margin-left:400px;font-size:10px; margin-top:150px; font-weight:bold; "><strong>  </strong></span><span style="margin-left:480px; font-size:10px; margin-top:150px;  font-style:italic;">  &copy;SIGES</span>
    </page_footer>






    <table style="border:solid 1px black;  text-align:left; font-size:10px;  border-collapse:collapse; margin-top: 230px;" align="center">


        <col style="width: 6%">
        <col style="width: 7%">
        <col style="width: 3%">
        <col style="width: 3%">
        <col style="width: 3%">

        <col style="width: 5%">


        <col style="width: 3%">
        <col style="width: 3%">
        <col style="width: 3%">
        <col style="width: 4%">


        <col style="width: 3%">
        <col style="width: 3%">
        <col style="width: 3%">
        <col style="width: 4%">


        <col style="width: 3%">
        <col style="width: 3%">
        <col style="width: 3%">
        <col style="width: 4%">



        <col style="width: 3%">
        <col style="width: 3%">
        <col style="width: 3%">
        <col style="width: 4%">


        <col style="width: 6%">
        <col style="width: 6%">
        <col style="width: 6%">
        <thead>

        <tr><td style="text-align: center; border: solid 1px black; " rowspan="2">NIVEAU</td>

            <td style="text-align: center; border: solid 1px black;" rowspan="2"> SPECIALITE</td>
            <td style="text-align: center; border: solid 1px black;  " colspan="3">EFFECTIF</td>

            <td style="text-align: center; border: solid 1px black;"rowspan="2"> PRESENT</td>


            <td style="text-align: center; border: solid 1px black;  " colspan="4"> 0&lt;= M.S.&lt;8 </td>
            <td style="text-align: center; border: solid 1px black;  " colspan="4"> 8&lt;= M.S.&lt;10 </td>
            <td style="text-align: center; border: solid 1px black;  " colspan="4"> M.S.>= 10</td>
            <td style="text-align: center; border: solid 1px black;  " colspan="4">ADMIS</td>
          <!--  <th style="text-align: center; border: solid 1px black;"rowspan="2"> MOYENNE SPECIALITE</th>

            <th style="text-align: center; border: solid 1px black;"rowspan="2"> MOYENNE MINI.</th>
            <th style="text-align: center; border: solid 1px black;"rowspan="2"> MOYENNE MAXI.</th>-->
        </tr>


        <tr>



            <th style="text-align: center; border: solid 1px black; "> F</th>
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



            <th style="text-align: center; border: solid 1px black; "> F</th>
            <th style="text-align: center; border: solid 1px black; ">G </th>
            <th style="text-align: center; border: solid 1px black; "> T</th>
            <th style="text-align: center; border: solid 1px black; "> %</th>


        </tr></thead>


        <tr>



            <td style="text-align: center; border: solid 1px black; " rowspan="2"  height="10px;"> <strong>LICENCE 2</strong></td>
        </tr>

        <tr>




            <td style="text-align: center; border: solid 1px black; ">  <strong>RTEL </strong></td>



            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfRTEL2=nbstudentfofclassspec($idanac,'RTEL','L2',$bdd); echo $nbetudiantfRTEL2;?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgRTEL2=nbstudentgofclassspec($idanac,'RTEL','L2',$bdd); echo $nbetudiantgRTEL2;?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantRTEL2=nbstudentofclassspec($idanac,'RTEL','L2',$bdd); echo $nbetudiantRTEL2;?></td>


            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentRTEL2=nbpresent($idanac,'RTEL','SEM3',$idses,$bdd); echo $nbpresentRTEL2; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfRTEL2=nbadmissupzf($idanac,'RTEL','SEM3',$idses,$bdd); echo $nbadmissupzfRTEL2; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgRTEL2=nbadmissupzg($idanac,'RTEL','SEM3',$idses,$bdd); echo $nbadmissupzgRTEL2; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzRTEL2=nbadmissupz($idanac,'RTEL','SEM3',$idses,$bdd); echo $nbadmissupzRTEL2; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzRTEL2= number_format((nbadmissupz($idanac,'RTEL','SEM3',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM3',$idses,$bdd),2); echo $pourcentsupzRTEL2;?></td>



            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfRTEL2=nbadmisinfdf($idanac,'RTEL','SEM3',$idses,$bdd); echo $nbadmisinfdfRTEL2; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgRTEL2=nbadmisinfdg($idanac,'RTEL','SEM3',$idses,$bdd); echo $nbadmisinfdgRTEL2; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdRTEL2=nbadmisinfd($idanac,'RTEL','SEM3',$idses,$bdd); echo $nbadmisinfdRTEL2; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdRTEL2= number_format((nbadmisinfd($idanac,'RTEL','SEM3',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM3',$idses,$bdd),2); echo $pourcentinfdRTEL2;?></td>





            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfRTEL2=nbadmissupdixf($idanac,'RTEL','SEM3',$idses,$bdd); echo $nbadmissupdixfRTEL2; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgRTEL2=nbadmissupdixg($idanac,'RTEL','SEM3',$idses,$bdd); echo $nbadmissupdixgRTEL2; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixRTEL2=nbadmissupdix($idanac,'RTEL','SEM3',$idses,$bdd); echo  $nbadmissupdixRTEL2;?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixRTEL2= number_format((nbadmissupdix($idanac,'RTEL','SEM3',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM3',$idses,$bdd),2); echo $pourcentsupdixRTEL2;?></td>

            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfRTEL2=nbadmisdecisf($idanac,'RTEL','SEM3',$idses,$bdd); echo $nbadmisdecisfRTEL2; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgRTEL2=nbadmisdecisg($idanac,'RTEL','SEM3',$idses,$bdd); echo $nbadmisdecisgRTEL2; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisRTEL2=nbadmisdecis($idanac,'RTEL','SEM3',$idses,$bdd);echo $nbadmisdecisRTEL2; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisRTEL2= number_format((nbadmisdecis($idanac,'RTEL','SEM3',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM3',$idses,$bdd),2); echo $pourcentdecisRTEL2;?></td>



        </tr>
        <tr>
            <td style="text-align: center; border: solid 1px black; " rowspan="4" height="10px;" > <strong>LICENCE 3</strong></td>
            <td style="text-align: center; border: solid 1px black; ">  <strong>SRIT </strong></td>




            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfSRIT3=nbstudentfofclassspec($idanac,'SRIT','L3',$bdd); echo $nbetudiantfSRIT3;?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgSRIT3=nbstudentgofclassspec($idanac,'SRIT','L3',$bdd); echo $nbetudiantgSRIT3;?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantSRIT3=nbstudentofclassspec($idanac,'SRIT','L3',$bdd); echo $nbetudiantSRIT3;?></td>


            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentSRIT3=nbpresent($idanac,'SRIT','SEM5',$idses,$bdd); echo $nbpresentSRIT3; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfSRIT3=nbadmissupzf($idanac,'SRIT','SEM5',$idses,$bdd); echo $nbadmissupzfSRIT3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgSRIT3=nbadmissupzg($idanac,'SRIT','SEM5',$idses,$bdd); echo $nbadmissupzgSRIT3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzSRIT3=nbadmissupz($idanac,'SRIT','SEM5',$idses,$bdd); echo $nbadmissupzSRIT3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzSRIT3= number_format((nbadmissupz($idanac,'SRIT','SEM5',$idses,$bdd)*100)/nbpresent($idanac,'SRIT','SEM5',$idses,$bdd),2); echo $pourcentsupzSRIT3;?></td>



            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfSRIT3=nbadmisinfdf($idanac,'SRIT','SEM5',$idses,$bdd); echo $nbadmisinfdfSRIT3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgSRIT3=nbadmisinfdg($idanac,'SRIT','SEM5',$idses,$bdd); echo $nbadmisinfdgSRIT3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdSRIT3=nbadmisinfd($idanac,'SRIT','SEM5',$idses,$bdd); echo $nbadmisinfdSRIT3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdSRIT3= number_format((nbadmisinfd($idanac,'SRIT','SEM5',$idses,$bdd)*100)/nbpresent($idanac,'SRIT','SEM5',$idses,$bdd),2); echo $pourcentinfdSRIT3;?></td>





            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfSRIT3=nbadmissupdixf($idanac,'SRIT','SEM5',$idses,$bdd); echo $nbadmissupdixfSRIT3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgSRIT3=nbadmissupdixg($idanac,'SRIT','SEM5',$idses,$bdd); echo $nbadmissupdixgSRIT3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixSRIT3=nbadmissupdix($idanac,'SRIT','SEM5',$idses,$bdd); echo  $nbadmissupdixSRIT3;?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixSRIT3= number_format((nbadmissupdix($idanac,'SRIT','SEM5',$idses,$bdd)*100)/nbpresent($idanac,'SRIT','SEM5',$idses,$bdd),2); echo $pourcentsupdixSRIT3;?></td>

            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfSRIT3=nbadmisdecisf($idanac,'SRIT','SEM5',$idses,$bdd); echo $nbadmisdecisfSRIT3; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgSRIT3=nbadmisdecisg($idanac,'SRIT','SEM5',$idses,$bdd); echo $nbadmisdecisgSRIT3; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisSRIT3=nbadmisdecis($idanac,'SRIT','SEM5',$idses,$bdd);echo $nbadmisdecisSRIT3; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisSRIT3= number_format((nbadmisdecis($idanac,'SRIT','SEM5',$idses,$bdd)*100)/nbpresent($idanac,'SRIT','SEM5',$idses,$bdd),2); echo $pourcentdecisSRIT3;?></td>


        </tr>

        <tr>

            <td style="text-align: center; border: solid 1px black; ">  <strong>RTEL </strong></td>



            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfRTEL3=nbstudentfofclassspec($idanac,'RTEL','L3',$bdd); echo $nbetudiantfRTEL3;?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgRTEL3=nbstudentgofclassspec($idanac,'RTEL','L3',$bdd); echo $nbetudiantgRTEL3;?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantRTEL3=nbstudentofclassspec($idanac,'RTEL','L3',$bdd); echo $nbetudiantRTEL3;?></td>


            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentRTEL3=nbpresent($idanac,'RTEL','SEM5',$idses,$bdd); echo $nbpresentRTEL3; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfRTEL3=nbadmissupzf($idanac,'RTEL','SEM5',$idses,$bdd); echo $nbadmissupzfRTEL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgRTEL3=nbadmissupzg($idanac,'RTEL','SEM5',$idses,$bdd); echo $nbadmissupzgRTEL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzRTEL3=nbadmissupz($idanac,'RTEL','SEM5',$idses,$bdd); echo $nbadmissupzRTEL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzRTEL3= number_format((nbadmissupz($idanac,'RTEL','SEM5',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM5',$idses,$bdd),2); echo $pourcentsupzRTEL3;?></td>



            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfRTEL3=nbadmisinfdf($idanac,'RTEL','SEM5',$idses,$bdd); echo $nbadmisinfdfRTEL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgRTEL3=nbadmisinfdg($idanac,'RTEL','SEM5',$idses,$bdd); echo $nbadmisinfdgRTEL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdRTEL3=nbadmisinfd($idanac,'RTEL','SEM5',$idses,$bdd); echo $nbadmisinfdRTEL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdRTEL3= number_format((nbadmisinfd($idanac,'RTEL','SEM5',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM5',$idses,$bdd),2); echo $pourcentinfdRTEL3;?></td>





            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfRTEL3=nbadmissupdixf($idanac,'RTEL','SEM5',$idses,$bdd); echo $nbadmissupdixfRTEL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgRTEL3=nbadmissupdixg($idanac,'RTEL','SEM5',$idses,$bdd); echo $nbadmissupdixgRTEL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixRTEL3=nbadmissupdix($idanac,'RTEL','SEM5',$idses,$bdd); echo  $nbadmissupdixRTEL3;?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixRTEL3= number_format((nbadmissupdix($idanac,'RTEL','SEM5',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM5',$idses,$bdd),2); echo $pourcentsupdixRTEL3;?></td>

            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfRTEL3=nbadmisdecisf($idanac,'RTEL','SEM5',$idses,$bdd); echo $nbadmisdecisfRTEL3; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgRTEL3=nbadmisdecisg($idanac,'RTEL','SEM5',$idses,$bdd); echo $nbadmisdecisgRTEL3; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisRTEL3=nbadmisdecis($idanac,'RTEL','SEM5',$idses,$bdd);echo $nbadmisdecisRTEL3; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisRTEL3= number_format((nbadmisdecis($idanac,'RTEL','SEM5',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM5',$idses,$bdd),2); echo $pourcentdecisRTEL3;?></td>



        </tr>

        <tr>

            <td style="text-align: center; border: solid 1px black; ">  <strong>SIGL </strong></td>



            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfSIGL3=nbstudentfofclassspec($idanac,'SIGL','L3',$bdd); echo $nbetudiantfSIGL3;?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgSIGL3=nbstudentgofclassspec($idanac,'SIGL','L3',$bdd); echo $nbetudiantgSIGL3;?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantSIGL3=nbstudentofclassspec($idanac,'SIGL','L3',$bdd); echo $nbetudiantSIGL3;?></td>


            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentSIGL3=nbpresent($idanac,'SIGL','SEM5',$idses,$bdd); echo $nbpresentSIGL3; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfSIGL3=nbadmissupzf($idanac,'SIGL','SEM5',$idses,$bdd); echo $nbadmissupzfSIGL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgSIGL3=nbadmissupzg($idanac,'SIGL','SEM5',$idses,$bdd); echo $nbadmissupzgSIGL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzSIGL3=nbadmissupz($idanac,'SIGL','SEM5',$idses,$bdd); echo $nbadmissupzSIGL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzSIGL3= number_format((nbadmissupz($idanac,'SIGL','SEM5',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM5',$idses,$bdd),2); echo $pourcentsupzSIGL3;?></td>



            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfSIGL3=nbadmisinfdf($idanac,'SIGL','SEM5',$idses,$bdd); echo $nbadmisinfdfSIGL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgSIGL3=nbadmisinfdg($idanac,'SIGL','SEM5',$idses,$bdd); echo $nbadmisinfdgSIGL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdSIGL3=nbadmisinfd($idanac,'SIGL','SEM5',$idses,$bdd); echo $nbadmisinfdSIGL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdSIGL3= number_format((nbadmisinfd($idanac,'SIGL','SEM5',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM5',$idses,$bdd),2); echo $pourcentinfdSIGL3;?></td>





            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfSIGL3=nbadmissupdixf($idanac,'SIGL','SEM5',$idses,$bdd); echo $nbadmissupdixfSIGL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgSIGL3=nbadmissupdixg($idanac,'SIGL','SEM5',$idses,$bdd); echo $nbadmissupdixgSIGL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixSIGL3=nbadmissupdix($idanac,'SIGL','SEM5',$idses,$bdd); echo  $nbadmissupdixSIGL3;?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixSIGL3= number_format((nbadmissupdix($idanac,'SIGL','SEM5',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM5',$idses,$bdd),2); echo $pourcentsupdixSIGL3;?></td>

            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfSIGL3=nbadmisdecisf($idanac,'SIGL','SEM5',$idses,$bdd); echo $nbadmisdecisfSIGL3; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgSIGL3=nbadmisdecisg($idanac,'SIGL','SEM5',$idses,$bdd); echo $nbadmisdecisgSIGL3; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisSIGL3=nbadmisdecis($idanac,'SIGL','SEM5',$idses,$bdd);echo $nbadmisdecisSIGL3; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisSIGL3= number_format((nbadmisdecis($idanac,'SIGL','SEM5',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM5',$idses,$bdd),2); echo $pourcentdecisSIGL3;?></td>


        </tr>



        <tr>

            <td style="text-align: center; border: solid 1px black; ">  <strong>TWIN </strong></td>



            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfTWIN3=nbstudentfofclassspec($idanac,'TWIN','L3',$bdd); echo $nbetudiantfTWIN3;?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgTWIN3=nbstudentgofclassspec($idanac,'TWIN','L3',$bdd); echo $nbetudiantgTWIN3;?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantTWIN3=nbstudentofclassspec($idanac,'TWIN','L3',$bdd); echo $nbetudiantTWIN3;?></td>


            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentTWIN3=nbpresent($idanac,'TWIN','SEM5',$idses,$bdd); echo $nbpresentTWIN3; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfTWIN3=nbadmissupzf($idanac,'TWIN','SEM5',$idses,$bdd); echo $nbadmissupzfTWIN3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgTWIN3=nbadmissupzg($idanac,'TWIN','SEM5',$idses,$bdd); echo $nbadmissupzgTWIN3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzTWIN3=nbadmissupz($idanac,'TWIN','SEM5',$idses,$bdd); echo $nbadmissupzTWIN3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzTWIN3= number_format((nbadmissupz($idanac,'TWIN','SEM5',$idses,$bdd)*100)/nbpresent($idanac,'TWIN','SEM5',$idses,$bdd),2); echo $pourcentsupzTWIN3;?></td>



            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfTWIN3=nbadmisinfdf($idanac,'TWIN','SEM5',$idses,$bdd); echo $nbadmisinfdfTWIN3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgTWIN3=nbadmisinfdg($idanac,'TWIN','SEM5',$idses,$bdd); echo $nbadmisinfdgTWIN3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdTWIN3=nbadmisinfd($idanac,'TWIN','SEM5',$idses,$bdd); echo $nbadmisinfdTWIN3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdTWIN3= number_format((nbadmisinfd($idanac,'TWIN','SEM5',$idses,$bdd)*100)/nbpresent($idanac,'TWIN','SEM5',$idses,$bdd),2); echo $pourcentinfdTWIN3;?></td>





            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfTWIN3=nbadmissupdixf($idanac,'TWIN','SEM5',$idses,$bdd); echo $nbadmissupdixfTWIN3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgTWIN3=nbadmissupdixg($idanac,'TWIN','SEM5',$idses,$bdd); echo $nbadmissupdixgTWIN3; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixTWIN3=nbadmissupdix($idanac,'TWIN','SEM5',$idses,$bdd); echo  $nbadmissupdixTWIN3;?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixTWIN3= number_format((nbadmissupdix($idanac,'TWIN','SEM5',$idses,$bdd)*100)/nbpresent($idanac,'TWIN','SEM5',$idses,$bdd),2); echo $pourcentsupdixTWIN3;?></td>

            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfTWIN3=nbadmisdecisf($idanac,'TWIN','SEM5',$idses,$bdd); echo $nbadmisdecisfTWIN3; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgTWIN3=nbadmisdecisg($idanac,'TWIN','SEM5',$idses,$bdd); echo $nbadmisdecisgTWIN3; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisTWIN3=nbadmisdecis($idanac,'TWIN','SEM5',$idses,$bdd);echo $nbadmisdecisTWIN3; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisTWIN3= number_format((nbadmisdecis($idanac,'TWIN','SEM5',$idses,$bdd)*100)/nbpresent($idanac,'TWIN','SEM5',$idses,$bdd),2); echo $pourcentdecisTWIN3;?></td>


        </tr>



        <tr>



            <td style="text-align: center; border: solid 1px black; " rowspan="4" height="10px;" > <strong>MASTER I</strong></td>
            <td style="text-align: center; border: solid 1px black; ">  <strong>INFORMATIQUE</strong></td>

            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfSIGLM1=nbstudentfofclassspec($idanac,'TCSIGLSITW','M1',$bdd); echo $nbetudiantfSIGLM1;?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgSIGLM1=nbstudentgofclassspec($idanac,'TCSIGLSITW','M1',$bdd); echo $nbetudiantgSIGLM1;?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantSIGLM1=nbstudentofclassspec($idanac,'TCSIGLSITW','M1',$bdd); echo $nbetudiantSIGLM1;?></td>


            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentSIGLM1=nbpresent($idanac,'TCSIGLSITW','SEM7',$idses,$bdd); echo $nbpresentSIGLM1; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfSIGLM1=nbadmissupzf($idanac,'TCSIGLSITW','SEM7',$idses,$bdd); echo $nbadmissupzfSIGLM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgSIGLM1=nbadmissupzg($idanac,'TCSIGLSITW','SEM7',$idses,$bdd); echo $nbadmissupzgSIGLM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzSIGLM1=nbadmissupz($idanac,'TCSIGLSITW','SEM7',$idses,$bdd); echo $nbadmissupzSIGLM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzSIGLM1= number_format((nbadmissupz($idanac,'TCSIGLSITW','SEM7',$idses,$bdd)*100)/nbpresent($idanac,'TCSIGLSITW','SEM7',$idses,$bdd),2); echo $pourcentsupzSIGLM1;?></td>



            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfSIGLM1=nbadmisinfdf($idanac,'TCSIGLSITW','SEM7',$idses,$bdd); echo $nbadmisinfdfSIGLM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgSIGLM1=nbadmisinfdg($idanac,'TCSIGLSITW','SEM7',$idses,$bdd); echo $nbadmisinfdgSIGLM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdSIGLM1=nbadmisinfd($idanac,'TCSIGLSITW','SEM7',$idses,$bdd); echo $nbadmisinfdSIGLM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdSIGLM1= number_format((nbadmisinfd($idanac,'TCSIGLSITW','SEM7',$idses,$bdd)*100)/nbpresent($idanac,'TCSIGLSITW','SEM7',$idses,$bdd),2); echo $pourcentinfdSIGLM1;?></td>





            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfSIGLM1=nbadmissupdixf($idanac,'TCSIGLSITW','SEM7',$idses,$bdd); echo $nbadmissupdixfSIGLM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgSIGLM1=nbadmissupdixg($idanac,'TCSIGLSITW','SEM7',$idses,$bdd); echo $nbadmissupdixgSIGLM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixSIGLM1=nbadmissupdix($idanac,'TCSIGLSITW','SEM7',$idses,$bdd); echo  $nbadmissupdixSIGLM1;?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixSIGLM1= number_format((nbadmissupdix($idanac,'TCSIGLSITW','SEM7',$idses,$bdd)*100)/nbpresent($idanac,'TCSIGLSITW','SEM7',$idses,$bdd),2); echo $pourcentsupdixSIGLM1;?></td>

            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfSIGLM1=nbadmisdecisf($idanac,'TCSIGLSITW','SEM7',$idses,$bdd); echo $nbadmisdecisfSIGLM1; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgSIGLM1=nbadmisdecisg($idanac,'TCSIGLSITW','SEM7',$idses,$bdd); echo $nbadmisdecisgSIGLM1; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisSIGLM1=nbadmisdecis($idanac,'TCSIGLSITW','SEM7',$idses,$bdd);echo $nbadmisdecisSIGLM1; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisSIGLM1= number_format((nbadmisdecis($idanac,'TCSIGLSITW','SEM7',$idses,$bdd)*100)/nbpresent($idanac,'TCSIGLSITW','SEM7',$idses,$bdd),2); echo $pourcentdecisSIGLM1;?></td>


        </tr>





        <tr>




            <td style="text-align: center; border: solid 1px black; ">  <strong>TELECOMS</strong></td>

            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfRTELM1=nbstudentfofclassspec($idanac,'RTEL','M1',$bdd); echo $nbetudiantfRTELM1;?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgRTELM1=nbstudentgofclassspec($idanac,'RTEL','M1',$bdd); echo $nbetudiantgRTELM1;?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantRTELM1=nbstudentofclassspec($idanac,'RTEL','M1',$bdd); echo $nbetudiantRTELM1;?></td>


            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentRTELM1=nbpresent($idanac,'RTEL','SEM7',$idses,$bdd); echo $nbpresentRTELM1; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfRTELM1=nbadmissupzf($idanac,'RTEL','SEM7',$idses,$bdd); echo $nbadmissupzfRTELM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgRTELM1=nbadmissupzg($idanac,'RTEL','SEM7',$idses,$bdd); echo $nbadmissupzgRTELM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzRTELM1=nbadmissupz($idanac,'RTEL','SEM7',$idses,$bdd); echo $nbadmissupzRTELM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzRTELM1= number_format((nbadmissupz($idanac,'RTEL','SEM7',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM7',$idses,$bdd),2); echo $pourcentsupzRTELM1;?></td>



            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfRTELM1=nbadmisinfdf($idanac,'RTEL','SEM7',$idses,$bdd); echo $nbadmisinfdfRTELM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgRTELM1=nbadmisinfdg($idanac,'RTEL','SEM7',$idses,$bdd); echo $nbadmisinfdgRTELM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdRTELM1=nbadmisinfd($idanac,'RTEL','SEM7',$idses,$bdd); echo $nbadmisinfdRTELM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdRTELM1= number_format((nbadmisinfd($idanac,'RTEL','SEM7',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM7',$idses,$bdd),2); echo $pourcentinfdRTELM1;?></td>





            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfRTELM1=nbadmissupdixf($idanac,'RTEL','SEM7',$idses,$bdd); echo $nbadmissupdixfRTELM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgRTELM1=nbadmissupdixg($idanac,'RTEL','SEM7',$idses,$bdd); echo $nbadmissupdixgRTELM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixRTELM1=nbadmissupdix($idanac,'RTEL','SEM7',$idses,$bdd); echo  $nbadmissupdixRTELM1;?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixRTELM1= number_format((nbadmissupdix($idanac,'RTEL','SEM7',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM7',$idses,$bdd),2); echo $pourcentsupdixRTELM1;?></td>

            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfRTELM1=nbadmisdecisf($idanac,'RTEL','SEM7',$idses,$bdd); echo $nbadmisdecisfRTELM1; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgRTELM1=nbadmisdecisg($idanac,'RTEL','SEM7',$idses,$bdd); echo $nbadmisdecisgRTELM1; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisRTELM1=nbadmisdecis($idanac,'RTEL','SEM7',$idses,$bdd);echo $nbadmisdecisRTELM1; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisRTELM1= number_format((nbadmisdecis($idanac,'RTEL','SEM7',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM7',$idses,$bdd),2); echo $pourcentdecisRTELM1;?></td>



        </tr>

        <tr>




            <td style="text-align: center; border: solid 1px black;" height="10px; ">  <strong>MBDS</strong></td>

            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfMBDSM1=nbstudentfofclassspec($idanac,'MBDS','M1',$bdd); echo $nbetudiantfMBDSM1;?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgMBDSM1=nbstudentgofclassspec($idanac,'MBDS','M1',$bdd); echo $nbetudiantgMBDSM1;?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantMBDSM1=nbstudentofclassspec($idanac,'MBDS','M1',$bdd); echo $nbetudiantMBDSM1;?></td>


            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentMBDSM1=nbpresent($idanac,'MBDS','SEM7',$idses,$bdd); echo $nbpresentMBDSM1; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfMBDSM1=nbadmissupzf($idanac,'MBDS','SEM7',$idses,$bdd); echo $nbadmissupzfMBDSM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgMBDSM1=nbadmissupzg($idanac,'MBDS','SEM7',$idses,$bdd); echo $nbadmissupzgMBDSM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzMBDSM1=nbadmissupz($idanac,'MBDS','SEM7',$idses,$bdd); echo $nbadmissupzMBDSM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzMBDSM1= number_format((nbadmissupz($idanac,'MBDS','SEM7',$idses,$bdd)*100)/nbpresent($idanac,'MBDS','SEM7',$idses,$bdd),2); echo $pourcentsupzMBDSM1;?></td>



            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfMBDSM1=nbadmisinfdf($idanac,'MBDS','SEM7',$idses,$bdd); echo $nbadmisinfdfMBDSM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgMBDSM1=nbadmisinfdg($idanac,'MBDS','SEM7',$idses,$bdd); echo $nbadmisinfdgMBDSM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdMBDSM1=nbadmisinfd($idanac,'MBDS','SEM7',$idses,$bdd); echo $nbadmisinfdMBDSM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdMBDSM1= number_format((nbadmisinfd($idanac,'MBDS','SEM7',$idses,$bdd)*100)/nbpresent($idanac,'MBDS','SEM7',$idses,$bdd),2); echo $pourcentinfdMBDSM1;?></td>





            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfMBDSM1=nbadmissupdixf($idanac,'MBDS','SEM7',$idses,$bdd); echo $nbadmissupdixfMBDSM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgMBDSM1=nbadmissupdixg($idanac,'MBDS','SEM7',$idses,$bdd); echo $nbadmissupdixgMBDSM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixMBDSM1=nbadmissupdix($idanac,'MBDS','SEM7',$idses,$bdd); echo  $nbadmissupdixMBDSM1;?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixMBDSM1= number_format((nbadmissupdix($idanac,'MBDS','SEM7',$idses,$bdd)*100)/nbpresent($idanac,'MBDS','SEM7',$idses,$bdd),2); echo $pourcentsupdixMBDSM1;?></td>

            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfMBDSM1=nbadmisdecisf($idanac,'MBDS','SEM7',$idses,$bdd); echo $nbadmisdecisfMBDSM1; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgMBDSM1=nbadmisdecisg($idanac,'MBDS','SEM7',$idses,$bdd); echo $nbadmisdecisgMBDSM1; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisMBDSM1=nbadmisdecis($idanac,'MBDS','SEM7',$idses,$bdd);echo $nbadmisdecisMBDSM1; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisMBDSM1= number_format((nbadmisdecis($idanac,'MBDS','SEM7',$idses,$bdd)*100)/nbpresent($idanac,'MBDS','SEM7',$idses,$bdd),2); echo $pourcentdecisMBDSM1;?></td>



        </tr>

        <tr>



            <td style="text-align: center; border: solid 1px black; " rowspan="3" height="10px;" > <strong>MASTER II</strong></td>
        </tr>

        <tr>




            <td style="text-align: center; border: solid 1px black; ">  <strong>SITW </strong></td>


            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfSITWM2=nbstudentfofclassspec($idanac,'SITW','M2',$bdd); echo $nbetudiantfSITWM2;?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgSITWM2=nbstudentgofclassspec($idanac,'SITW','M2',$bdd); echo $nbetudiantgSITWM2;?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantSITWM2=nbstudentofclassspec($idanac,'SITW','M2',$bdd); echo $nbetudiantSITWM2;?></td>


            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentSITWM2=nbpresent($idanac,'SITW','SEM9',$idses,$bdd); echo $nbpresentSITWM2; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfSITWM2=nbadmissupzf($idanac,'SITW','SEM9',$idses,$bdd); echo $nbadmissupzfSITWM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgSITWM2=nbadmissupzg($idanac,'SITW','SEM9',$idses,$bdd); echo $nbadmissupzgSITWM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzSITWM2=nbadmissupz($idanac,'SITW','SEM9',$idses,$bdd); echo $nbadmissupzSITWM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzSITWM2= number_format((nbadmissupz($idanac,'SITW','SEM9',$idses,$bdd)*100)/nbpresent($idanac,'SITW','SEM9',$idses,$bdd),2); echo $pourcentsupzSITWM2;?></td>



            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfSITWM2=nbadmisinfdf($idanac,'SITW','SEM9',$idses,$bdd); echo $nbadmisinfdfSITWM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgSITWM2=nbadmisinfdg($idanac,'SITW','SEM9',$idses,$bdd); echo $nbadmisinfdgSITWM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdSITWM2=nbadmisinfd($idanac,'SITW','SEM9',$idses,$bdd); echo $nbadmisinfdSITWM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdSITWM2= number_format((nbadmisinfd($idanac,'SITW','SEM9',$idses,$bdd)*100)/nbpresent($idanac,'SITW','SEM9',$idses,$bdd),2); echo $pourcentinfdSITWM2;?></td>





            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfSITWM2=nbadmissupdixf($idanac,'SITW','SEM9',$idses,$bdd); echo $nbadmissupdixfSITWM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgSITWM2=nbadmissupdixg($idanac,'SITW','SEM9',$idses,$bdd); echo $nbadmissupdixgSITWM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixSITWM2=nbadmissupdix($idanac,'SITW','SEM9',$idses,$bdd); echo  $nbadmissupdixSITWM2;?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixSITWM2= number_format((nbadmissupdix($idanac,'SITW','SEM9',$idses,$bdd)*100)/nbpresent($idanac,'SITW','SEM9',$idses,$bdd),2); echo $pourcentsupdixSITWM2;?></td>

            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfSITWM2=nbadmisdecisf($idanac,'SITW','SEM9',$idses,$bdd); echo $nbadmisdecisfSITWM2; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgSITWM2=nbadmisdecisg($idanac,'SITW','SEM9',$idses,$bdd); echo $nbadmisdecisgSITWM2; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisSITWM2=nbadmisdecis($idanac,'SITW','SEM9',$idses,$bdd);echo $nbadmisdecisSITWM2; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisSITWM2= number_format((nbadmisdecis($idanac,'SITW','SEM9',$idses,$bdd)*100)/nbpresent($idanac,'SITW','SEM9',$idses,$bdd),2); echo $pourcentdecisSITWM2;?></td>

        </tr>









    </table>

    </page>





<?php

}
else{








?>





    <page backtop="1mm" >


        <?php
        include("header.php");
        ?>

        <page_footer>

            <span style="margin-left:10px; font-size:10px; margin-top:150px;  font-style:italic;"> <?php echo $date;?></span>   <span style="margin-left:400px;font-size:10px; margin-top:150px; font-weight:bold; "><strong>  </strong></span><span style="margin-left:480px; font-size:10px; margin-top:150px;  font-style:italic;">  &copy;SIGES</span>
        </page_footer>






        <table style="border:solid 1px black;  text-align:left; font-size:10px;  border-collapse:collapse; margin-top: 230px;" align="center">


            <col style="width: 6%">
            <col style="width: 7%">
            <col style="width: 3%">
            <col style="width: 3%">
            <col style="width: 3%">

            <col style="width: 5%">


            <col style="width: 3%">
            <col style="width: 3%">
            <col style="width: 3%">
            <col style="width: 4%">


            <col style="width: 3%">
            <col style="width: 3%">
            <col style="width: 3%">
            <col style="width: 4%">


            <col style="width: 3%">
            <col style="width: 3%">
            <col style="width: 3%">
            <col style="width: 4%">



            <col style="width: 3%">
            <col style="width: 3%">
            <col style="width: 3%">
            <col style="width: 4%">


            <col style="width: 6%">
            <col style="width: 6%">
            <col style="width: 6%">
            <thead>

            <tr><td style="text-align: center; border: solid 1px black; " rowspan="2">NIVEAU</td>

                <td style="text-align: center; border: solid 1px black;" rowspan="2"> SPECIALITE</td>
                <td style="text-align: center; border: solid 1px black;  " colspan="3">EFFECTIF</td>

                <td style="text-align: center; border: solid 1px black;"rowspan="2"> PRESENT</td>


                <td style="text-align: center; border: solid 1px black;  " colspan="4"> 0&lt;= M.S.&lt;8 </td>
                <td style="text-align: center; border: solid 1px black;  " colspan="4"> 8&lt;= M.S.&lt;10 </td>
                <td style="text-align: center; border: solid 1px black;  " colspan="4"> M.S.>= 10</td>
                <td style="text-align: center; border: solid 1px black;  " colspan="4">ADMIS</td>
                <th style="text-align: center; border: solid 1px black;"rowspan="2"> MOYENNE SPECIALITE</th>

                <th style="text-align: center; border: solid 1px black;"rowspan="2"> MOYENNE MINI.</th>
                <th style="text-align: center; border: solid 1px black;"rowspan="2"> MOYENNE MAXI.</th>
            </tr>


            <tr>



                <th style="text-align: center; border: solid 1px black; "> F</th>
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



                <th style="text-align: center; border: solid 1px black; "> F</th>
                <th style="text-align: center; border: solid 1px black; ">G </th>
                <th style="text-align: center; border: solid 1px black; "> T</th>
                <th style="text-align: center; border: solid 1px black; "> %</th>


            </tr></thead>





            <tr>



                <td style="text-align: center; border: solid 1px black; " rowspan="5"  height="10px;"> <strong>LICENCE 1</strong></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <strong>SRIT </strong></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfSRIT=nbstudentfofclassspec($idanac,'SRIT','L1',$bdd); echo $nbetudiantfSRIT;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgSRIT=nbstudentgofclassspec($idanac,'SRIT','L1',$bdd); echo $nbetudiantgSRIT;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantSRIT=nbstudentofclassspec($idanac,'SRIT','L1',$bdd); echo $nbetudiantSRIT;?></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentSRIT=nbpresent($idanac,'SRIT','SEM2',$idses,$bdd); echo $nbpresentSRIT; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfSRIT=nbadmissupzf($idanac,'SRIT','SEM2',$idses,$bdd); echo $nbadmissupzfSRIT; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgSRIT=nbadmissupzg($idanac,'SRIT','SEM2',$idses,$bdd); echo $nbadmissupzgSRIT; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzSRIT=nbadmissupz($idanac,'SRIT','SEM2',$idses,$bdd); echo $nbadmissupzSRIT; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzSRIT= number_format((nbadmissupz($idanac,'SRIT','SEM2',$idses,$bdd)*100)/nbpresent($idanac,'SRIT','SEM2',$idses,$bdd),2); echo $pourcentsupzSRIT;?></td>



                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfSRIT=nbadmisinfdf($idanac,'SRIT','SEM2',$idses,$bdd); echo $nbadmisinfdfSRIT; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgSRIT=nbadmisinfdg($idanac,'SRIT','SEM2',$idses,$bdd); echo $nbadmisinfdgSRIT; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdSRIT=nbadmisinfd($idanac,'SRIT','SEM2',$idses,$bdd); echo $nbadmisinfdSRIT; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdSRIT= number_format((nbadmisinfd($idanac,'SRIT','SEM2',$idses,$bdd)*100)/nbpresent($idanac,'SRIT','SEM2',$idses,$bdd),2); echo $pourcentinfdSRIT;?></td>





                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfSRIT=nbadmissupdixf($idanac,'SRIT','SEM2',$idses,$bdd); echo $nbadmissupdixfSRIT; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgSRIT=nbadmissupdixg($idanac,'SRIT','SEM2',$idses,$bdd); echo $nbadmissupdixgSRIT; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixSRIT=nbadmissupdix($idanac,'SRIT','SEM2',$idses,$bdd); echo  $nbadmissupdixSRIT;?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixSRIT= number_format((nbadmissupdix($idanac,'SRIT','SEM2',$idses,$bdd)*100)/nbpresent($idanac,'SRIT','SEM2',$idses,$bdd),2); echo $pourcentsupdixSRIT;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfSRIT=nbadmisdecisf($idanac,'SRIT','SEM2',$idses,$bdd); echo $nbadmisdecisfSRIT; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgSRIT=nbadmisdecisg($idanac,'SRIT','SEM2',$idses,$bdd); echo $nbadmisdecisgSRIT; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisSRIT=nbadmisdecis($idanac,'SRIT','SEM2',$idses,$bdd);echo $nbadmisdecisSRIT; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisSRIT= number_format((nbadmisdecis($idanac,'SRIT','SEM2',$idses,$bdd)*100)/nbpresent($idanac,'SRIT','SEM2',$idses,$bdd),2); echo $pourcentdecisSRIT;?></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecSRIT=averageofspecsemestrielle( 'SRIT','SEM2', $idses, $idanac,$bdd); echo $averspecSRIT; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemSRIT=minaveragesemestrielle( 'SRIT','SEM2', $idses, $idanac,$bdd); echo $minaversemSRIT; ?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemSRIT=maxaveragesemestrielle( 'SRIT','SEM2', $idses, $idanac,$bdd); echo $maxaversemSRIT; ?></td>


            </tr>
            <tr>




                <td style="text-align: center; border: solid 1px black; " height="10px;">  <strong>RTEL </strong></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfRTEL=nbstudentfofclassspec($idanac,'RTEL','L1',$bdd); echo $nbetudiantfRTEL;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgRTEL=nbstudentgofclassspec($idanac,'RTEL','L1',$bdd); echo $nbetudiantgRTEL;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantRTEL=nbstudentofclassspec($idanac,'RTEL','L1',$bdd); echo $nbetudiantRTEL;?></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentRTEL=nbpresent($idanac,'RTEL','SEM2',$idses,$bdd); echo $nbpresentRTEL; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfRTEL=nbadmissupzf($idanac,'RTEL','SEM2',$idses,$bdd); echo $nbadmissupzfRTEL; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgRTEL=nbadmissupzg($idanac,'RTEL','SEM2',$idses,$bdd); echo $nbadmissupzgRTEL; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzRTEL=nbadmissupz($idanac,'RTEL','SEM2',$idses,$bdd); echo $nbadmissupzRTEL; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzRTEL= number_format((nbadmissupz($idanac,'RTEL','SEM2',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM2',$idses,$bdd),2); echo $pourcentsupzRTEL;?></td>



                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfRTEL=nbadmisinfdf($idanac,'RTEL','SEM2',$idses,$bdd); echo $nbadmisinfdfRTEL; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgRTEL=nbadmisinfdg($idanac,'RTEL','SEM2',$idses,$bdd); echo $nbadmisinfdgRTEL; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdRTEL=nbadmisinfd($idanac,'RTEL','SEM2',$idses,$bdd); echo $nbadmisinfdRTEL; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdRTEL= number_format((nbadmisinfd($idanac,'RTEL','SEM2',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM2',$idses,$bdd),2); echo $pourcentinfdRTEL;?></td>





                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfRTEL=nbadmissupdixf($idanac,'RTEL','SEM2',$idses,$bdd); echo $nbadmissupdixfRTEL; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgRTEL=nbadmissupdixg($idanac,'RTEL','SEM2',$idses,$bdd); echo $nbadmissupdixgRTEL; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixRTEL=nbadmissupdix($idanac,'RTEL','SEM2',$idses,$bdd); echo  $nbadmissupdixRTEL;?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixRTEL= number_format((nbadmissupdix($idanac,'RTEL','SEM2',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM2',$idses,$bdd),2); echo $pourcentsupdixRTEL;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfRTEL=nbadmisdecisf($idanac,'RTEL','SEM2',$idses,$bdd); echo $nbadmisdecisfRTEL; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgRTEL=nbadmisdecisg($idanac,'RTEL','SEM2',$idses,$bdd); echo $nbadmisdecisgRTEL; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisRTEL=nbadmisdecis($idanac,'RTEL','SEM2',$idses,$bdd);echo $nbadmisdecisRTEL; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisRTEL= number_format((nbadmisdecis($idanac,'RTEL','SEM2',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM2',$idses,$bdd),2); echo $pourcentdecisRTEL;?></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecRTEL=averageofspecsemestrielle( 'RTEL','SEM2', $idses, $idanac,$bdd); echo $averspecRTEL; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemRTEL=minaveragesemestrielle( 'RTEL','SEM2', $idses, $idanac,$bdd); echo $minaversemRTEL; ?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemRTEL=maxaveragesemestrielle( 'RTEL','SEM2', $idses, $idanac,$bdd); echo $maxaversemRTEL; ?></td>


            </tr>
            <tr>




                <td style="text-align: center; border: solid 1px black; " height="10px;">  <strong>SIGL </strong></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfSIGL=nbstudentfofclassspec($idanac,'SIGL','L1',$bdd); echo $nbetudiantfSIGL;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgSIGL=nbstudentgofclassspec($idanac,'SIGL','L1',$bdd); echo $nbetudiantgSIGL;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantSIGL=nbstudentofclassspec($idanac,'SIGL','L1',$bdd); echo $nbetudiantSIGL;?></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentSIGL=nbpresent($idanac,'SIGL','SEM2',$idses,$bdd); echo $nbpresentSIGL; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfSIGL=nbadmissupzf($idanac,'SIGL','SEM2',$idses,$bdd); echo $nbadmissupzfSIGL; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgSIGL=nbadmissupzg($idanac,'SIGL','SEM2',$idses,$bdd); echo $nbadmissupzgSIGL; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzSIGL=nbadmissupz($idanac,'SIGL','SEM2',$idses,$bdd); echo $nbadmissupzSIGL; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzSIGL= number_format((nbadmissupz($idanac,'SIGL','SEM2',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM2',$idses,$bdd),2); echo $pourcentsupzSIGL;?></td>



                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfSIGL=nbadmisinfdf($idanac,'SIGL','SEM2',$idses,$bdd); echo $nbadmisinfdfSIGL; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgSIGL=nbadmisinfdg($idanac,'SIGL','SEM2',$idses,$bdd); echo $nbadmisinfdgSIGL; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdSIGL=nbadmisinfd($idanac,'SIGL','SEM2',$idses,$bdd); echo $nbadmisinfdSIGL; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdSIGL= number_format((nbadmisinfd($idanac,'SIGL','SEM2',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM2',$idses,$bdd),2); echo $pourcentinfdSIGL;?></td>





                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfSIGL=nbadmissupdixf($idanac,'SIGL','SEM2',$idses,$bdd); echo $nbadmissupdixfSIGL; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgSIGL=nbadmissupdixg($idanac,'SIGL','SEM2',$idses,$bdd); echo $nbadmissupdixgSIGL; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixSIGL=nbadmissupdix($idanac,'SIGL','SEM2',$idses,$bdd); echo  $nbadmissupdixSIGL;?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixSIGL= number_format((nbadmissupdix($idanac,'SIGL','SEM2',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM2',$idses,$bdd),2); echo $pourcentsupdixSIGL;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfSIGL=nbadmisdecisf($idanac,'SIGL','SEM2',$idses,$bdd); echo $nbadmisdecisfSIGL; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgSIGL=nbadmisdecisg($idanac,'SIGL','SEM2',$idses,$bdd); echo $nbadmisdecisgSIGL; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisSIGL=nbadmisdecis($idanac,'SIGL','SEM2',$idses,$bdd);echo $nbadmisdecisSIGL; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisSIGL= number_format((nbadmisdecis($idanac,'SIGL','SEM2',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM2',$idses,$bdd),2); echo $pourcentdecisSIGL;?></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecSIGL=averageofspecsemestrielle( 'SIGL','SEM2', $idses, $idanac,$bdd); echo $averspecSIGL; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemSIGL=minaveragesemestrielle( 'SIGL','SEM2', $idses, $idanac,$bdd); echo $minaversemSIGL; ?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemSIGL=maxaveragesemestrielle( 'SIGL','SEM2', $idses, $idanac,$bdd); echo $maxaversemSIGL; ?></td>


            </tr>

            <tr>




                <td style="text-align: center; border: solid 1px black; " height="10px;">  <strong>TWIN </strong></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfTWIN=nbstudentfofclassspec($idanac,'TWIN','L1',$bdd); echo $nbetudiantfTWIN;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgTWIN=nbstudentgofclassspec($idanac,'TWIN','L1',$bdd); echo $nbetudiantgTWIN;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantTWIN=nbstudentofclassspec($idanac,'TWIN','L1',$bdd); echo $nbetudiantTWIN;?></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentTWIN=nbpresent($idanac,'TWIN','SEM2',$idses,$bdd); echo $nbpresentTWIN; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfTWIN=nbadmissupzf($idanac,'TWIN','SEM2',$idses,$bdd); echo $nbadmissupzfTWIN; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgTWIN=nbadmissupzg($idanac,'TWIN','SEM2',$idses,$bdd); echo $nbadmissupzgTWIN; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzTWIN=nbadmissupz($idanac,'TWIN','SEM2',$idses,$bdd); echo $nbadmissupzTWIN; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzTWIN= number_format((nbadmissupz($idanac,'TWIN','SEM2',$idses,$bdd)*100)/nbpresent($idanac,'TWIN','SEM2',$idses,$bdd),2); echo $pourcentsupzTWIN;?></td>



                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfTWIN=nbadmisinfdf($idanac,'TWIN','SEM2',$idses,$bdd); echo $nbadmisinfdfTWIN; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgTWIN=nbadmisinfdg($idanac,'TWIN','SEM2',$idses,$bdd); echo $nbadmisinfdgTWIN; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdTWIN=nbadmisinfd($idanac,'TWIN','SEM2',$idses,$bdd); echo $nbadmisinfdTWIN; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdTWIN= number_format((nbadmisinfd($idanac,'TWIN','SEM2',$idses,$bdd)*100)/nbpresent($idanac,'TWIN','SEM2',$idses,$bdd),2); echo $pourcentinfdTWIN;?></td>





                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfTWIN=nbadmissupdixf($idanac,'TWIN','SEM2',$idses,$bdd); echo $nbadmissupdixfTWIN; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgTWIN=nbadmissupdixg($idanac,'TWIN','SEM2',$idses,$bdd); echo $nbadmissupdixgTWIN; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixTWIN=nbadmissupdix($idanac,'TWIN','SEM2',$idses,$bdd); echo  $nbadmissupdixTWIN;?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixTWIN= number_format((nbadmissupdix($idanac,'TWIN','SEM2',$idses,$bdd)*100)/nbpresent($idanac,'TWIN','SEM2',$idses,$bdd),2); echo $pourcentsupdixTWIN;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfTWIN=nbadmisdecisf($idanac,'TWIN','SEM2',$idses,$bdd); echo $nbadmisdecisfTWIN; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgTWIN=nbadmisdecisg($idanac,'TWIN','SEM2',$idses,$bdd); echo $nbadmisdecisgTWIN; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisTWIN=nbadmisdecis($idanac,'TWIN','SEM2',$idses,$bdd);echo $nbadmisdecisTWIN; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisTWIN= number_format((nbadmisdecis($idanac,'TWIN','SEM2',$idses,$bdd)*100)/nbpresent($idanac,'TWIN','SEM2',$idses,$bdd),2); echo $pourcentdecisTWIN;?></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecTWIN=averageofspecsemestrielle( 'TWIN','SEM2', $idses, $idanac,$bdd); echo $averspecTWIN; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemTWIN=minaveragesemestrielle( 'TWIN','SEM2', $idses, $idanac,$bdd); echo $minaversemTWIN; ?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemTWIN=maxaveragesemestrielle( 'TWIN','SEM2', $idses, $idanac,$bdd); echo $maxaversemTWIN; ?></td>


            </tr>
            <tr>




                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ;" height="10px;" >  <strong>TOTAL</strong></td>


                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;">  <?php $nbetudiantfL1=$nbetudiantfSRIT + $nbetudiantfTWIN + $nbetudiantfRTEL + $nbetudiantfSIGL; echo $nbetudiantfL1;?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;">  <?php $nbetudiantgL1=$nbetudiantgSRIT +$nbetudiantgTWIN + $nbetudiantgRTEL + $nbetudiantgSIGL;echo $nbetudiantgL1;?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbetudiantL1=$nbetudiantSRIT + $nbetudiantTWIN + $nbetudiantRTEL + $nbetudiantSIGL; echo $nbetudiantL1;?></td>


                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"><?php $nbpresentL1= $nbpresentSRIT + $nbpresentTWIN+ $nbpresentRTEL + $nbpresentSIGL; echo $nbpresentL1 ?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmissupzfL1=$nbadmissupzfSRIT + $nbadmissupzfTWIN + $nbadmissupzfRTEL + $nbadmissupzfSIGL ; echo $nbadmissupzfL1; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmissupzgL1=$nbadmissupzgSRIT + $nbadmissupzgTWIN + $nbadmissupzgRTEL + $nbadmissupzgSIGL;echo $nbadmissupzgL1; ?> </td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"><?php $nbadmissupzL1=$nbadmissupzTWIN + $nbadmissupzSRIT + $nbadmissupzRTEL + $nbadmissupzSIGL; echo $nbadmissupzL1 ?> </td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"> <?php  $pourcentsupzL1= number_format((($nbadmissupzL1*100)/$nbpresentL1),2); echo $pourcentsupzL1;?></td>



                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmisinfdfL1=$nbadmisinfdfSRIT + $nbadmisinfdfTWIN + $nbadmisinfdfRTEL + $nbadmisinfdfSIGL;echo $nbadmisinfdfL1; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $nbadmisinfdgL1=$nbadmisinfdgSRIT + $nbadmisinfdgTWIN + $nbadmisinfdgRTEL + $nbadmisinfdgSIGL;echo $nbadmisinfdgL1; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"><?php  $nbadmisinfdL1=$nbadmisinfdSRIT + $nbadmisinfdTWIN + $nbadmisinfdRTEL + $nbadmisinfdSIGL; echo $nbadmisinfdL1; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $pourcentinfdL1= number_format((($nbadmisinfdL1*100)/$nbpresentL1),2); echo $pourcentinfdL1;?></td>





                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmissupdixfL1=$nbadmissupdixfSRIT + $nbadmissupdixfTWIN + $nbadmissupdixfRTEL + $nbadmissupdixfSIGL; echo $nbadmissupdixfL1 ?> </td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"> <?php $nbadmissupdixgL1 = $nbadmissupdixgSRIT + $nbadmissupdixgTWIN + $nbadmissupdixgRTEL+ $nbadmissupdixgSIGL ; echo $nbadmissupdixgL1 ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"><?php $nbadmissupdixL1 = $nbadmissupdixSRIT + $nbadmissupdixTWIN + $nbadmissupdixRTEL + $nbadmissupdixSIGL; echo $nbadmissupdixL1; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $pourcentsupdixL1= number_format((($nbadmissupdixL1*100)/$nbpresentL1),2); echo $pourcentsupdixL1;?></td>

                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"><?php  $nbadmisdecisfL1=$nbadmisdecisfSRIT + $nbadmisdecisfTWIN + $nbadmisdecisfRTEL + $nbadmisdecisfSIGL ; echo $nbadmisdecisfL1; ?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;">  <?php $nbadmisdecisgL1= $nbadmisdecisgSRIT + $nbadmisdecisgTWIN + $nbadmisdecisgRTEL + $nbadmisdecisgSIGL;echo $nbadmisdecisgL1; ?></td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"> <?php $nbadmisdecisL1= $nbadmisdecisSRIT + $nbadmisdecisTWIN + $nbadmisdecisRTEL + $nbadmisdecisSIGL ; echo $nbadmisdecisL1; ?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $pourcentdecisL1= number_format((($nbadmisdecisL1*100)/$nbpresentL1),2); echo $pourcentdecisL1;?></td>

                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;" colspan="3"> </td>
            </tr>

            <tr>



                <td style="text-align: center; border: solid 1px black; " rowspan="5" height="10px;" > <strong>LICENCE 2</strong></td>
                <td style="text-align: center; border: solid 1px black; ">  <strong>SRIT </strong></td>



                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfSRIT2=nbstudentfofclassspec($idanac,'SRIT','L2',$bdd); echo $nbetudiantfSRIT2;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgSRIT2=nbstudentgofclassspec($idanac,'SRIT','L2',$bdd); echo $nbetudiantgSRIT2;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantSRIT2=nbstudentofclassspec($idanac,'SRIT','L2',$bdd); echo $nbetudiantSRIT2;?></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentSRIT2=nbpresent($idanac,'SRIT','SEM4',$idses,$bdd); echo $nbpresentSRIT2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfSRIT2=nbadmissupzf($idanac,'SRIT','SEM4',$idses,$bdd); echo $nbadmissupzfSRIT2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgSRIT2=nbadmissupzg($idanac,'SRIT','SEM4',$idses,$bdd); echo $nbadmissupzgSRIT2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzSRIT2=nbadmissupz($idanac,'SRIT','SEM4',$idses,$bdd); echo $nbadmissupzSRIT2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzSRIT2= number_format((nbadmissupz($idanac,'SRIT','SEM4',$idses,$bdd)*100)/nbpresent($idanac,'SRIT','SEM4',$idses,$bdd),2); echo $pourcentsupzSRIT2;?></td>



                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfSRIT2=nbadmisinfdf($idanac,'SRIT','SEM4',$idses,$bdd); echo $nbadmisinfdfSRIT2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgSRIT2=nbadmisinfdg($idanac,'SRIT','SEM4',$idses,$bdd); echo $nbadmisinfdgSRIT2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdSRIT2=nbadmisinfd($idanac,'SRIT','SEM4',$idses,$bdd); echo $nbadmisinfdSRIT2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdSRIT2= number_format((nbadmisinfd($idanac,'SRIT','SEM4',$idses,$bdd)*100)/nbpresent($idanac,'SRIT','SEM4',$idses,$bdd),2); echo $pourcentinfdSRIT2;?></td>





                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfSRIT2=nbadmissupdixf($idanac,'SRIT','SEM4',$idses,$bdd); echo $nbadmissupdixfSRIT2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgSRIT2=nbadmissupdixg($idanac,'SRIT','SEM4',$idses,$bdd); echo $nbadmissupdixgSRIT2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixSRIT2=nbadmissupdix($idanac,'SRIT','SEM4',$idses,$bdd); echo  $nbadmissupdixSRIT2;?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixSRIT2= number_format((nbadmissupdix($idanac,'SRIT','SEM4',$idses,$bdd)*100)/nbpresent($idanac,'SRIT','SEM4',$idses,$bdd),2); echo $pourcentsupdixSRIT2;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfSRIT2=nbadmisdecisf($idanac,'SRIT','SEM4',$idses,$bdd); echo $nbadmisdecisfSRIT2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgSRIT2=nbadmisdecisg($idanac,'SRIT','SEM4',$idses,$bdd); echo $nbadmisdecisgSRIT2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisSRIT2=nbadmisdecis($idanac,'SRIT','SEM4',$idses,$bdd);echo $nbadmisdecisSRIT2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisSRIT2= number_format((nbadmisdecis($idanac,'SRIT','SEM4',$idses,$bdd)*100)/nbpresent($idanac,'SRIT','SEM4',$idses,$bdd),2); echo $pourcentdecisSRIT2;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecSRIT2=averageofspecsemestrielle( 'SRIT','SEM4', $idses, $idanac,$bdd); echo $averspecSRIT2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemSRIT2=minaveragesemestrielle( 'SRIT','SEM4', $idses, $idanac,$bdd); echo $minaversemSRIT2; ?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemSRIT2=maxaveragesemestrielle( 'SRIT','SEM4', $idses, $idanac,$bdd); echo $maxaversemSRIT2; ?></td>


            </tr>

            <tr>




                <td style="text-align: center; border: solid 1px black; ">  <strong>RTEL </strong></td>



                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfRTEL2=nbstudentfofclassspec($idanac,'RTEL','L2',$bdd); echo $nbetudiantfRTEL2;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgRTEL2=nbstudentgofclassspec($idanac,'RTEL','L2',$bdd); echo $nbetudiantgRTEL2;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantRTEL2=nbstudentofclassspec($idanac,'RTEL','L2',$bdd); echo $nbetudiantRTEL2;?></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentRTEL2=nbpresent($idanac,'RTEL','SEM4',$idses,$bdd); echo $nbpresentRTEL2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfRTEL2=nbadmissupzf($idanac,'RTEL','SEM4',$idses,$bdd); echo $nbadmissupzfRTEL2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgRTEL2=nbadmissupzg($idanac,'RTEL','SEM4',$idses,$bdd); echo $nbadmissupzgRTEL2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzRTEL2=nbadmissupz($idanac,'RTEL','SEM4',$idses,$bdd); echo $nbadmissupzRTEL2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzRTEL2= number_format((nbadmissupz($idanac,'RTEL','SEM4',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM4',$idses,$bdd),2); echo $pourcentsupzRTEL2;?></td>



                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfRTEL2=nbadmisinfdf($idanac,'RTEL','SEM4',$idses,$bdd); echo $nbadmisinfdfRTEL2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgRTEL2=nbadmisinfdg($idanac,'RTEL','SEM4',$idses,$bdd); echo $nbadmisinfdgRTEL2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdRTEL2=nbadmisinfd($idanac,'RTEL','SEM4',$idses,$bdd); echo $nbadmisinfdRTEL2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdRTEL2= number_format((nbadmisinfd($idanac,'RTEL','SEM4',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM4',$idses,$bdd),2); echo $pourcentinfdRTEL2;?></td>





                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfRTEL2=nbadmissupdixf($idanac,'RTEL','SEM4',$idses,$bdd); echo $nbadmissupdixfRTEL2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgRTEL2=nbadmissupdixg($idanac,'RTEL','SEM4',$idses,$bdd); echo $nbadmissupdixgRTEL2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixRTEL2=nbadmissupdix($idanac,'RTEL','SEM4',$idses,$bdd); echo  $nbadmissupdixRTEL2;?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixRTEL2= number_format((nbadmissupdix($idanac,'RTEL','SEM4',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM4',$idses,$bdd),2); echo $pourcentsupdixRTEL2;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfRTEL2=nbadmisdecisf($idanac,'RTEL','SEM4',$idses,$bdd); echo $nbadmisdecisfRTEL2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgRTEL2=nbadmisdecisg($idanac,'RTEL','SEM4',$idses,$bdd); echo $nbadmisdecisgRTEL2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisRTEL2=nbadmisdecis($idanac,'RTEL','SEM4',$idses,$bdd);echo $nbadmisdecisRTEL2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisRTEL2= number_format((nbadmisdecis($idanac,'RTEL','SEM4',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM4',$idses,$bdd),2); echo $pourcentdecisRTEL2;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecRTEL2=averageofspecsemestrielle( 'RTEL','SEM4', $idses, $idanac,$bdd); echo $averspecRTEL2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemRTEL2=minaveragesemestrielle( 'RTEL','SEM4', $idses, $idanac,$bdd); echo $minaversemRTEL2; ?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemRTEL2=maxaveragesemestrielle( 'RTEL','SEM4', $idses, $idanac,$bdd); echo $maxaversemRTEL2; ?></td>


            </tr>


            <tr>




                <td style="text-align: center; border: solid 1px black; ">  <strong>SIGL </strong></td>



                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfSIGL2=nbstudentfofclassspec($idanac,'SIGL','L2',$bdd); echo $nbetudiantfSIGL2;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgSIGL2=nbstudentgofclassspec($idanac,'SIGL','L2',$bdd); echo $nbetudiantgSIGL2;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantSIGL2=nbstudentofclassspec($idanac,'SIGL','L2',$bdd); echo $nbetudiantSIGL2;?></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentSIGL2=nbpresent($idanac,'SIGL','SEM4',$idses,$bdd); echo $nbpresentSIGL2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfSIGL2=nbadmissupzf($idanac,'SIGL','SEM4',$idses,$bdd); echo $nbadmissupzfSIGL2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgSIGL2=nbadmissupzg($idanac,'SIGL','SEM4',$idses,$bdd); echo $nbadmissupzgSIGL2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzSIGL2=nbadmissupz($idanac,'SIGL','SEM4',$idses,$bdd); echo $nbadmissupzSIGL2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzSIGL2= number_format((nbadmissupz($idanac,'SIGL','SEM4',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM4',$idses,$bdd),2); echo $pourcentsupzSIGL2;?></td>



                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfSIGL2=nbadmisinfdf($idanac,'SIGL','SEM4',$idses,$bdd); echo $nbadmisinfdfSIGL2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgSIGL2=nbadmisinfdg($idanac,'SIGL','SEM4',$idses,$bdd); echo $nbadmisinfdgSIGL2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdSIGL2=nbadmisinfd($idanac,'SIGL','SEM4',$idses,$bdd); echo $nbadmisinfdSIGL2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdSIGL2= number_format((nbadmisinfd($idanac,'SIGL','SEM4',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM4',$idses,$bdd),2); echo $pourcentinfdSIGL2;?></td>





                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfSIGL2=nbadmissupdixf($idanac,'SIGL','SEM4',$idses,$bdd); echo $nbadmissupdixfSIGL2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgSIGL2=nbadmissupdixg($idanac,'SIGL','SEM4',$idses,$bdd); echo $nbadmissupdixgSIGL2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixSIGL2=nbadmissupdix($idanac,'SIGL','SEM4',$idses,$bdd); echo  $nbadmissupdixSIGL2;?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixSIGL2= number_format((nbadmissupdix($idanac,'SIGL','SEM4',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM4',$idses,$bdd),2); echo $pourcentsupdixSIGL2;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfSIGL2=nbadmisdecisf($idanac,'SIGL','SEM4',$idses,$bdd); echo $nbadmisdecisfSIGL2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgSIGL2=nbadmisdecisg($idanac,'SIGL','SEM4',$idses,$bdd); echo $nbadmisdecisgSIGL2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisSIGL2=nbadmisdecis($idanac,'SIGL','SEM4',$idses,$bdd);echo $nbadmisdecisSIGL2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisSIGL2= number_format((nbadmisdecis($idanac,'SIGL','SEM4',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM4',$idses,$bdd),2); echo $pourcentdecisSIGL2;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecSIGL2=averageofspecsemestrielle( 'SIGL','SEM4', $idses, $idanac,$bdd); echo $averspecSIGL2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemSIGL2=minaveragesemestrielle( 'SIGL','SEM4', $idses, $idanac,$bdd); echo $minaversemSIGL2; ?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemSIGL2=maxaveragesemestrielle( 'SIGL','SEM4', $idses, $idanac,$bdd); echo $maxaversemSIGL2; ?></td>


            </tr>


            <tr>




                <td style="text-align: center; border: solid 1px black; ">  <strong>TWIN </strong></td>



                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfTWIN2=nbstudentfofclassspec($idanac,'TWIN','L2',$bdd); echo $nbetudiantfTWIN2;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgTWIN2=nbstudentgofclassspec($idanac,'TWIN','L2',$bdd); echo $nbetudiantgTWIN2;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantTWIN2=nbstudentofclassspec($idanac,'TWIN','L2',$bdd); echo $nbetudiantTWIN2;?></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentTWIN2=nbpresent($idanac,'TWIN','SEM4',$idses,$bdd); echo $nbpresentTWIN2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfTWIN2=nbadmissupzf($idanac,'TWIN','SEM4',$idses,$bdd); echo $nbadmissupzfTWIN2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgTWIN2=nbadmissupzg($idanac,'TWIN','SEM4',$idses,$bdd); echo $nbadmissupzgTWIN2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzTWIN2=nbadmissupz($idanac,'TWIN','SEM4',$idses,$bdd); echo $nbadmissupzTWIN2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzTWIN2= number_format((nbadmissupz($idanac,'TWIN','SEM4',$idses,$bdd)*100)/nbpresent($idanac,'TWIN','SEM4',$idses,$bdd),2); echo $pourcentsupzTWIN2;?></td>



                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfTWIN2=nbadmisinfdf($idanac,'TWIN','SEM4',$idses,$bdd); echo $nbadmisinfdfTWIN2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgTWIN2=nbadmisinfdg($idanac,'TWIN','SEM4',$idses,$bdd); echo $nbadmisinfdgTWIN2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdTWIN2=nbadmisinfd($idanac,'TWIN','SEM4',$idses,$bdd); echo $nbadmisinfdTWIN2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdTWIN2= number_format((nbadmisinfd($idanac,'TWIN','SEM4',$idses,$bdd)*100)/nbpresent($idanac,'TWIN','SEM4',$idses,$bdd),2); echo $pourcentinfdTWIN2;?></td>





                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfTWIN2=nbadmissupdixf($idanac,'TWIN','SEM4',$idses,$bdd); echo $nbadmissupdixfTWIN2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgTWIN2=nbadmissupdixg($idanac,'TWIN','SEM4',$idses,$bdd); echo $nbadmissupdixgTWIN2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixTWIN2=nbadmissupdix($idanac,'TWIN','SEM4',$idses,$bdd); echo  $nbadmissupdixTWIN2;?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixTWIN2= number_format((nbadmissupdix($idanac,'TWIN','SEM4',$idses,$bdd)*100)/nbpresent($idanac,'TWIN','SEM4',$idses,$bdd),2); echo $pourcentsupdixTWIN2;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfTWIN2=nbadmisdecisf($idanac,'TWIN','SEM4',$idses,$bdd); echo $nbadmisdecisfTWIN2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgTWIN2=nbadmisdecisg($idanac,'TWIN','SEM4',$idses,$bdd); echo $nbadmisdecisgTWIN2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisTWIN2=nbadmisdecis($idanac,'TWIN','SEM4',$idses,$bdd);echo $nbadmisdecisTWIN2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisTWIN2= number_format((nbadmisdecis($idanac,'TWIN','SEM4',$idses,$bdd)*100)/nbpresent($idanac,'TWIN','SEM4',$idses,$bdd),2); echo $pourcentdecisTWIN2;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecTWIN2=averageofspecsemestrielle( 'TWIN','SEM4', $idses, $idanac,$bdd); echo $averspecTWIN2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemTWIN2=minaveragesemestrielle( 'TWIN','SEM4', $idses, $idanac,$bdd); echo $minaversemTWIN2; ?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemTWIN2=maxaveragesemestrielle( 'TWIN','SEM4', $idses, $idanac,$bdd); echo $maxaversemTWIN2; ?></td>


            </tr>

            <tr>




                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ;" height="10px;" >  <strong>TOTAL</strong></td>


                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;">  <?php $nbetudiantfL2=$nbetudiantfSRIT2+$nbetudiantfRTEL2 +$nbetudiantfSIGL2 +$nbetudiantfTWIN2 ; echo $nbetudiantfL2;?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;">  <?php $nbetudiantgL2=$nbetudiantgSRIT2 + $nbetudiantgRTEL2 + $nbetudiantgSIGL2 + $nbetudiantgTWIN2 ;echo $nbetudiantgL2;?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbetudiantL2=$nbetudiantSRIT2 + $nbetudiantRTEL2 + $nbetudiantSIGL2 + $nbetudiantTWIN2; echo $nbetudiantL2;?></td>


                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"><?php $nbpresentL2= $nbpresentSRIT2+$nbpresentRTEL2 +$nbpresentSIGL2 + $nbpresentTWIN2 ; echo $nbpresentL2 ?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmissupzfL2=$nbadmissupzfSRIT2+$nbadmissupzfRTEL2+$nbadmissupzfSIGL2+$nbadmissupzfTWIN2; echo $nbadmissupzfL2; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmissupzgL2=$nbadmissupzgSRIT2 + $nbadmissupzgRTEL2  + $nbadmissupzgSIGL2 + $nbadmissupzgTWIN2;echo $nbadmissupzgL2; ?> </td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"><?php $nbadmissupzL2=$nbadmissupzRTEL2 + $nbadmissupzSRIT2 + $nbadmissupzSIGL2+ $nbadmissupzTWIN2; echo $nbadmissupzL2 ?> </td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"> <?php  $pourcentsupzL2= number_format((($nbadmissupzL2*100)/$nbpresentL2),2); echo $pourcentsupzL2;?></td>



                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmisinfdfL2=$nbadmisinfdfSRIT2+$nbadmisinfdfRTEL2 +$nbadmisinfdfSIGL2 +$nbadmisinfdfTWIN2;echo $nbadmisinfdfL2; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $nbadmisinfdgL2=$nbadmisinfdgSRIT2 + $nbadmisinfdgRTEL2+ $nbadmisinfdgSIGL2+ $nbadmisinfdgTWIN2;echo $nbadmisinfdgL2; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"><?php  $nbadmisinfdL2=$nbadmisinfdSRIT2+ $nbadmisinfdRTEL2 + $nbadmisinfdSIGL2 + $nbadmisinfdTWIN2; echo $nbadmisinfdL2; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $pourcentinfdL2= number_format((($nbadmisinfdL2*100)/$nbpresentL2),2); echo $pourcentinfdL2;?></td>





                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmissupdixfL2=$nbadmissupdixfSRIT2+$nbadmissupdixfRTEL2+$nbadmissupdixfSIGL2 +$nbadmissupdixfTWIN2; echo $nbadmissupdixfL2 ?> </td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"> <?php $nbadmissupdixgL2 = $nbadmissupdixgSRIT2 + $nbadmissupdixgRTEL2+ $nbadmissupdixgSIGL2+ $nbadmissupdixgTWIN2; echo $nbadmissupdixgL2 ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"><?php $nbadmissupdixL2 = $nbadmissupdixSRIT2 + $nbadmissupdixRTEL2 + $nbadmissupdixSIGL2+ $nbadmissupdixTWIN2; echo $nbadmissupdixL2; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $pourcentsupdixL2= number_format((($nbadmissupdixL2*100)/$nbpresentL2),2); echo $pourcentsupdixL2;?></td>

                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"><?php  $nbadmisdecisfL2=$nbadmisdecisfSRIT2 + $nbadmisdecisfRTEL2 + $nbadmisdecisfSIGL2+ $nbadmisdecisfTWIN2 ; echo $nbadmisdecisfL2; ?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;">  <?php $nbadmisdecisgL2= $nbadmisdecisgSRIT2 + $nbadmisdecisgRTEL2  + $nbadmisdecisgSIGL2 + $nbadmisdecisgTWIN2;echo $nbadmisdecisgL2; ?></td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"> <?php $nbadmisdecisL2= $nbadmisdecisSRIT2 + $nbadmisdecisRTEL2 + $nbadmisdecisSIGL2 + $nbadmisdecisTWIN2; echo $nbadmisdecisL2; ?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $pourcentdecisL2= number_format((($nbadmisdecisL2*100)/$nbpresentL2),2); echo $pourcentdecisL2;?></td>

                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;" colspan="3"> </td>

            </tr>


            <tr>
                <td style="text-align: center; border: solid 1px black; " rowspan="4" height="10px;" > <strong>LICENCE 3</strong></td>
                <td style="text-align: center; border: solid 1px black; ">  <strong>SRIT </strong></td>




                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfSRIT3=nbstudentfofclassspec($idanac,'SRIT','L3',$bdd); echo $nbetudiantfSRIT3;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgSRIT3=nbstudentgofclassspec($idanac,'SRIT','L3',$bdd); echo $nbetudiantgSRIT3;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantSRIT3=nbstudentofclassspec($idanac,'SRIT','L3',$bdd); echo $nbetudiantSRIT3;?></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentSRIT3=nbpresent($idanac,'SRIT','SEM6',$idses,$bdd); echo $nbpresentSRIT3; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfSRIT3=nbadmissupzf($idanac,'SRIT','SEM6',$idses,$bdd); echo $nbadmissupzfSRIT3; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgSRIT3=nbadmissupzg($idanac,'SRIT','SEM6',$idses,$bdd); echo $nbadmissupzgSRIT3; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzSRIT3=nbadmissupz($idanac,'SRIT','SEM6',$idses,$bdd); echo $nbadmissupzSRIT3; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzSRIT3= number_format((nbadmissupz($idanac,'SRIT','SEM6',$idses,$bdd)*100)/nbpresent($idanac,'SRIT','SEM6',$idses,$bdd),2); echo $pourcentsupzSRIT3;?></td>



                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfSRIT3=nbadmisinfdf($idanac,'SRIT','SEM6',$idses,$bdd); echo $nbadmisinfdfSRIT3; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgSRIT3=nbadmisinfdg($idanac,'SRIT','SEM6',$idses,$bdd); echo $nbadmisinfdgSRIT3; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdSRIT3=nbadmisinfd($idanac,'SRIT','SEM6',$idses,$bdd); echo $nbadmisinfdSRIT3; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdSRIT3= number_format((nbadmisinfd($idanac,'SRIT','SEM6',$idses,$bdd)*100)/nbpresent($idanac,'SRIT','SEM6',$idses,$bdd),2); echo $pourcentinfdSRIT3;?></td>





                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfSRIT3=nbadmissupdixf($idanac,'SRIT','SEM6',$idses,$bdd); echo $nbadmissupdixfSRIT3; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgSRIT3=nbadmissupdixg($idanac,'SRIT','SEM6',$idses,$bdd); echo $nbadmissupdixgSRIT3; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixSRIT3=nbadmissupdix($idanac,'SRIT','SEM6',$idses,$bdd); echo  $nbadmissupdixSRIT3;?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixSRIT3= number_format((nbadmissupdix($idanac,'SRIT','SEM6',$idses,$bdd)*100)/nbpresent($idanac,'SRIT','SEM6',$idses,$bdd),2); echo $pourcentsupdixSRIT3;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfSRIT3=nbadmisdecisf($idanac,'SRIT','SEM6',$idses,$bdd); echo $nbadmisdecisfSRIT3; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgSRIT3=nbadmisdecisg($idanac,'SRIT','SEM6',$idses,$bdd); echo $nbadmisdecisgSRIT3; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisSRIT3=nbadmisdecis($idanac,'SRIT','SEM6',$idses,$bdd);echo $nbadmisdecisSRIT3; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisSRIT3= number_format((nbadmisdecis($idanac,'SRIT','SEM6',$idses,$bdd)*100)/nbpresent($idanac,'SRIT','SEM6',$idses,$bdd),2); echo $pourcentdecisSRIT3;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecSRIT3=averageofspecsemestrielle( 'SRIT','SEM6', $idses, $idanac,$bdd); echo $averspecSRIT3; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemSRIT3=minaveragesemestrielle( 'SRIT','SEM6', $idses, $idanac,$bdd); echo $minaversemSRIT3; ?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemSRIT3=maxaveragesemestrielle( 'SRIT','SEM6', $idses, $idanac,$bdd); echo $maxaversemSRIT3; ?></td>


            </tr>

            <tr>

                <td style="text-align: center; border: solid 1px black; ">  <strong>RTEL </strong></td>



                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfRTEL3=nbstudentfofclassspec($idanac,'RTEL','L3',$bdd); echo $nbetudiantfRTEL3;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgRTEL3=nbstudentgofclassspec($idanac,'RTEL','L3',$bdd); echo $nbetudiantgRTEL3;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantRTEL3=nbstudentofclassspec($idanac,'RTEL','L3',$bdd); echo $nbetudiantRTEL3;?></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentRTEL3=nbpresent($idanac,'RTEL','SEM6',$idses,$bdd); echo $nbpresentRTEL3; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfRTEL3=nbadmissupzf($idanac,'RTEL','SEM6',$idses,$bdd); echo $nbadmissupzfRTEL3; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgRTEL3=nbadmissupzg($idanac,'RTEL','SEM6',$idses,$bdd); echo $nbadmissupzgRTEL3; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzRTEL3=nbadmissupz($idanac,'RTEL','SEM6',$idses,$bdd); echo $nbadmissupzRTEL3; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzRTEL3= number_format((nbadmissupz($idanac,'RTEL','SEM6',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM6',$idses,$bdd),2); echo $pourcentsupzRTEL3;?></td>



                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfRTEL3=nbadmisinfdf($idanac,'RTEL','SEM6',$idses,$bdd); echo $nbadmisinfdfRTEL3; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgRTEL3=nbadmisinfdg($idanac,'RTEL','SEM6',$idses,$bdd); echo $nbadmisinfdgRTEL3; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdRTEL3=nbadmisinfd($idanac,'RTEL','SEM6',$idses,$bdd); echo $nbadmisinfdRTEL3; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdRTEL3= number_format((nbadmisinfd($idanac,'RTEL','SEM6',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM6',$idses,$bdd),2); echo $pourcentinfdRTEL3;?></td>





                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfRTEL3=nbadmissupdixf($idanac,'RTEL','SEM6',$idses,$bdd); echo $nbadmissupdixfRTEL3; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgRTEL3=nbadmissupdixg($idanac,'RTEL','SEM6',$idses,$bdd); echo $nbadmissupdixgRTEL3; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixRTEL3=nbadmissupdix($idanac,'RTEL','SEM6',$idses,$bdd); echo  $nbadmissupdixRTEL3;?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixRTEL3= number_format((nbadmissupdix($idanac,'RTEL','SEM6',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM6',$idses,$bdd),2); echo $pourcentsupdixRTEL3;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfRTEL3=nbadmisdecisf($idanac,'RTEL','SEM6',$idses,$bdd); echo $nbadmisdecisfRTEL3; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgRTEL3=nbadmisdecisg($idanac,'RTEL','SEM6',$idses,$bdd); echo $nbadmisdecisgRTEL3; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisRTEL3=nbadmisdecis($idanac,'RTEL','SEM6',$idses,$bdd);echo $nbadmisdecisRTEL3; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisRTEL3= number_format((nbadmisdecis($idanac,'RTEL','SEM6',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM6',$idses,$bdd),2); echo $pourcentdecisRTEL3;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecRTEL3=averageofspecsemestrielle( 'RTEL','SEM6', $idses, $idanac,$bdd); echo $averspecRTEL3; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemRTEL3=minaveragesemestrielle( 'RTEL','SEM6', $idses, $idanac,$bdd); echo $minaversemRTEL3; ?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemRTEL3=maxaveragesemestrielle( 'RTEL','SEM6', $idses, $idanac,$bdd); echo $maxaversemRTEL3; ?></td>


            </tr>

            <tr>

                <td style="text-align: center; border: solid 1px black; ">  <strong>SIGL </strong></td>



                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfSIGL3=nbstudentfofclassspec($idanac,'SIGL','L3',$bdd); echo $nbetudiantfSIGL3;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgSIGL3=nbstudentgofclassspec($idanac,'SIGL','L3',$bdd); echo $nbetudiantgSIGL3;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantSIGL3=nbstudentofclassspec($idanac,'SIGL','L3',$bdd); echo $nbetudiantSIGL3;?></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentSIGL3=nbpresent($idanac,'SIGL','SEM6',$idses,$bdd); echo $nbpresentSIGL3; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfSIGL3=nbadmissupzf($idanac,'SIGL','SEM6',$idses,$bdd); echo $nbadmissupzfSIGL3; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgSIGL3=nbadmissupzg($idanac,'SIGL','SEM6',$idses,$bdd); echo $nbadmissupzgSIGL3; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzSIGL3=nbadmissupz($idanac,'SIGL','SEM6',$idses,$bdd); echo $nbadmissupzSIGL3; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzSIGL3= number_format((nbadmissupz($idanac,'SIGL','SEM6',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM6',$idses,$bdd),2); echo $pourcentsupzSIGL3;?></td>



                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfSIGL3=nbadmisinfdf($idanac,'SIGL','SEM6',$idses,$bdd); echo $nbadmisinfdfSIGL3; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgSIGL3=nbadmisinfdg($idanac,'SIGL','SEM6',$idses,$bdd); echo $nbadmisinfdgSIGL3; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdSIGL3=nbadmisinfd($idanac,'SIGL','SEM6',$idses,$bdd); echo $nbadmisinfdSIGL3; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdSIGL3= number_format((nbadmisinfd($idanac,'SIGL','SEM6',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM6',$idses,$bdd),2); echo $pourcentinfdSIGL3;?></td>





                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfSIGL3=nbadmissupdixf($idanac,'SIGL','SEM6',$idses,$bdd); echo $nbadmissupdixfSIGL3; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgSIGL3=nbadmissupdixg($idanac,'SIGL','SEM6',$idses,$bdd); echo $nbadmissupdixgSIGL3; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixSIGL3=nbadmissupdix($idanac,'SIGL','SEM6',$idses,$bdd); echo  $nbadmissupdixSIGL3;?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixSIGL3= number_format((nbadmissupdix($idanac,'SIGL','SEM6',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM6',$idses,$bdd),2); echo $pourcentsupdixSIGL3;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfSIGL3=nbadmisdecisf($idanac,'SIGL','SEM6',$idses,$bdd); echo $nbadmisdecisfSIGL3; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgSIGL3=nbadmisdecisg($idanac,'SIGL','SEM6',$idses,$bdd); echo $nbadmisdecisgSIGL3; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisSIGL3=nbadmisdecis($idanac,'SIGL','SEM6',$idses,$bdd);echo $nbadmisdecisSIGL3; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisSIGL3= number_format((nbadmisdecis($idanac,'SIGL','SEM6',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM6',$idses,$bdd),2); echo $pourcentdecisSIGL3;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecSIGL3=averageofspecsemestrielle( 'SIGL','SEM6', $idses, $idanac,$bdd); echo $averspecSIGL3; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemSIGL3=minaveragesemestrielle( 'SIGL','SEM6', $idses, $idanac,$bdd); echo $minaversemSIGL3; ?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemSIGL3=maxaveragesemestrielle( 'SIGL','SEM6', $idses, $idanac,$bdd); echo $maxaversemSIGL3; ?></td>


            </tr>

            <tr>




                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ;" height="10px;" >  <strong>TOTAL</strong></td>


                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;">  <?php $nbetudiantfL3=$nbetudiantfSRIT3+$nbetudiantfRTEL3 +$nbetudiantfSIGL3 ; echo $nbetudiantfL3;?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;">  <?php $nbetudiantgL3=$nbetudiantgSRIT3 + $nbetudiantgRTEL3 + $nbetudiantgSIGL3 ;echo $nbetudiantgL3;?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbetudiantL3=$nbetudiantSRIT3 + $nbetudiantRTEL3 + $nbetudiantSIGL3; echo $nbetudiantL3;?></td>

                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"><?php $nbpresentL3= $nbpresentSRIT3+$nbpresentRTEL3 +$nbpresentSIGL3; echo $nbpresentL3 ?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmissupzfL3=$nbadmissupzfSRIT3+$nbadmissupzfRTEL3+$nbadmissupzfSIGL3; echo $nbadmissupzfL3; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmissupzgL3=$nbadmissupzgSRIT3 + $nbadmissupzgRTEL3  + $nbadmissupzgSIGL3;echo $nbadmissupzgL3; ?> </td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"><?php $nbadmissupzL3=$nbadmissupzRTEL3 + $nbadmissupzSRIT3 + $nbadmissupzSIGL3; echo $nbadmissupzL3 ?> </td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"> <?php  $pourcentsupzL3= number_format((($nbadmissupzL3*100)/$nbpresentL3),2); echo $pourcentsupzL3;?></td>



                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmisinfdfL3=$nbadmisinfdfSRIT3+$nbadmisinfdfRTEL3 +$nbadmisinfdfSIGL3;echo $nbadmisinfdfL3; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $nbadmisinfdgL3=$nbadmisinfdgSRIT3 + $nbadmisinfdgRTEL3+ $nbadmisinfdgSIGL3;echo $nbadmisinfdgL3; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"><?php  $nbadmisinfdL3=$nbadmisinfdSRIT3+ $nbadmisinfdRTEL3 + $nbadmisinfdSIGL3; echo $nbadmisinfdL3; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $pourcentinfdL3= number_format((($nbadmisinfdL3*100)/$nbpresentL3),2); echo $pourcentinfdL3;?></td>





                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmissupdixfL3=$nbadmissupdixfSRIT3+$nbadmissupdixfRTEL3+$nbadmissupdixfSIGL3; echo $nbadmissupdixfL3 ?> </td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"> <?php $nbadmissupdixgL3 = $nbadmissupdixgSRIT3 + $nbadmissupdixgRTEL3+ $nbadmissupdixgSIGL3; echo $nbadmissupdixgL3 ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"><?php $nbadmissupdixL3 = $nbadmissupdixSRIT3 + $nbadmissupdixRTEL3 + $nbadmissupdixSIGL3; echo $nbadmissupdixL3; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $pourcentsupdixL3= number_format((($nbadmissupdixL3*100)/$nbpresentL3),2); echo $pourcentsupdixL3;?></td>

                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"><?php  $nbadmisdecisfL3=$nbadmisdecisfSRIT3 + $nbadmisdecisfRTEL3 + $nbadmisdecisfSIGL3; echo $nbadmisdecisfL3; ?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;">  <?php $nbadmisdecisgL3= $nbadmisdecisgSRIT3 + $nbadmisdecisgRTEL3  + $nbadmisdecisgSIGL3;echo $nbadmisdecisgL3; ?></td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"> <?php $nbadmisdecisL3= $nbadmisdecisSRIT3 + $nbadmisdecisRTEL3 + $nbadmisdecisSIGL3; echo $nbadmisdecisL3; ?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $pourcentdecisL3= number_format((($nbadmisdecisL3*100)/$nbpresentL3),2); echo $pourcentdecisL3;?></td>

                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;" colspan="3"> </td>
            </tr>

            <tr>




                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ;" height="10px;" COLSPAN="2" >  <strong>TOTAL LICENCE</strong></td>



                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;">  <?php $nbetudiantfLICENCE=$nbetudiantfL1+$nbetudiantfL2 +$nbetudiantfL3; echo $nbetudiantfLICENCE;?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;">  <?php $nbetudiantgLICENCE=$nbetudiantgL1+$nbetudiantgL2 +$nbetudiantgL3; echo $nbetudiantgLICENCE;?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbetudiantLICENCE=$nbetudiantL1 + $nbetudiantL2 + $nbetudiantL3; echo $nbetudiantLICENCE;?></td>


                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"><?php $nbpresentLICENCE= $nbpresentL1+$nbpresentL2+$nbpresentL3; echo $nbpresentLICENCE ?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmissupzfLICENCE=$nbadmissupzfL1+$nbadmissupzfL2+$nbadmissupzfL3; echo $nbadmissupzfLICENCE; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmissupzgLICENCE=$nbadmissupzgL1 + $nbadmissupzgL2  + $nbadmissupzgL3;echo $nbadmissupzgLICENCE; ?> </td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"><?php $nbadmissupzLICENCE=$nbadmissupzL1 + $nbadmissupzL2 +$nbadmissupzL3; echo $nbadmissupzLICENCE ?> </td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"> <?php  $pourcentsupzLICENCE= number_format((($nbadmissupzLICENCE*100)/$nbpresentLICENCE),2); echo $pourcentsupzLICENCE;?></td>



                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmisinfdfLICENCE=$nbadmisinfdfL1+$nbadmisinfdfL2 +$nbadmisinfdfL3;echo $nbadmisinfdfLICENCE; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $nbadmisinfdgLICENCE=$nbadmisinfdgL1 + $nbadmisinfdgL2+ $nbadmisinfdgL3;echo $nbadmisinfdgLICENCE; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"><?php  $nbadmisinfdLICENCE=$nbadmisinfdL1+ $nbadmisinfdL2 + $nbadmisinfdL3; echo $nbadmisinfdLICENCE; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $pourcentinfdLICENCE= number_format((($nbadmisinfdLICENCE*100)/$nbpresentLICENCE),2); echo $pourcentinfdLICENCE;?></td>





                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmissupdixfLICENCE=$nbadmissupdixfL1+$nbadmissupdixfL2+$nbadmissupdixfL3; echo $nbadmissupdixfLICENCE ?> </td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"> <?php $nbadmissupdixgLICENCE = $nbadmissupdixgL1 + $nbadmissupdixgL2+ $nbadmissupdixgL3; echo $nbadmissupdixgLICENCE ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"><?php $nbadmissupdixLICENCE = $nbadmissupdixL1 + $nbadmissupdixL2 + $nbadmissupdixL3; echo $nbadmissupdixLICENCE; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $pourcentsupdixLICENCE= number_format((($nbadmissupdixLICENCE*100)/$nbpresentLICENCE),2); echo $pourcentsupdixLICENCE;?></td>

                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"><?php  $nbadmisdecisfLICENCE=$nbadmisdecisfL1 + $nbadmisdecisfL2 + $nbadmisdecisfL3; echo $nbadmisdecisfLICENCE; ?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;">  <?php $nbadmisdecisgLICENCE= $nbadmisdecisgL1 + $nbadmisdecisgL2  + $nbadmisdecisgL3;echo $nbadmisdecisgLICENCE; ?></td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"> <?php $nbadmisdecisLICENCE= $nbadmisdecisL1 + $nbadmisdecisL2 + $nbadmisdecisL3; echo $nbadmisdecisLICENCE; ?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $pourcentdecisLICENCE= number_format((($nbadmisdecisLICENCE*100)/$nbpresentLICENCE),2); echo $pourcentdecisLICENCE;?></td>


                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;" colspan="3"> </td>
            </tr>
            <tr>



                <td style="text-align: center; border: solid 1px black; " rowspan="5" height="10px;" > <strong>MASTER I</strong></td>
                <td style="text-align: center; border: solid 1px black; ">  <strong>SIGL</strong></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfSIGLM1=nbstudentfofclassspec($idanac,'SIGL','M1',$bdd); echo $nbetudiantfSIGLM1;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgSIGLM1=nbstudentgofclassspec($idanac,'SIGL','M1',$bdd); echo $nbetudiantgSIGLM1;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantSIGLM1=nbstudentofclassspec($idanac,'SIGL','M1',$bdd); echo $nbetudiantSIGLM1;?></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentSIGLM1=nbpresent($idanac,'SIGL','SEM8',$idses,$bdd); echo $nbpresentSIGLM1; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfSIGLM1=nbadmissupzf($idanac,'SIGL','SEM8',$idses,$bdd); echo $nbadmissupzfSIGLM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgSIGLM1=nbadmissupzg($idanac,'SIGL','SEM8',$idses,$bdd); echo $nbadmissupzgSIGLM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzSIGLM1=nbadmissupz($idanac,'SIGL','SEM8',$idses,$bdd); echo $nbadmissupzSIGLM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzSIGLM1= number_format((nbadmissupz($idanac,'SIGL','SEM8',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM8',$idses,$bdd),2); echo $pourcentsupzSIGLM1;?></td>



                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfSIGLM1=nbadmisinfdf($idanac,'SIGL','SEM8',$idses,$bdd); echo $nbadmisinfdfSIGLM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgSIGLM1=nbadmisinfdg($idanac,'SIGL','SEM8',$idses,$bdd); echo $nbadmisinfdgSIGLM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdSIGLM1=nbadmisinfd($idanac,'SIGL','SEM8',$idses,$bdd); echo $nbadmisinfdSIGLM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdSIGLM1= number_format((nbadmisinfd($idanac,'SIGL','SEM8',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM8',$idses,$bdd),2); echo $pourcentinfdSIGLM1;?></td>





                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfSIGLM1=nbadmissupdixf($idanac,'SIGL','SEM8',$idses,$bdd); echo $nbadmissupdixfSIGLM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgSIGLM1=nbadmissupdixg($idanac,'SIGL','SEM8',$idses,$bdd); echo $nbadmissupdixgSIGLM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixSIGLM1=nbadmissupdix($idanac,'SIGL','SEM8',$idses,$bdd); echo  $nbadmissupdixSIGLM1;?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixSIGLM1= number_format((nbadmissupdix($idanac,'SIGL','SEM8',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM8',$idses,$bdd),2); echo $pourcentsupdixSIGLM1;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfSIGLM1=nbadmisdecisf($idanac,'SIGL','SEM8',$idses,$bdd); echo $nbadmisdecisfSIGLM1; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgSIGLM1=nbadmisdecisg($idanac,'SIGL','SEM8',$idses,$bdd); echo $nbadmisdecisgSIGLM1; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisSIGLM1=nbadmisdecis($idanac,'SIGL','SEM8',$idses,$bdd);echo $nbadmisdecisSIGLM1; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisSIGLM1= number_format((nbadmisdecis($idanac,'SIGL','SEM8',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM8',$idses,$bdd),2); echo $pourcentdecisSIGLM1;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecSIGLM1=averageofspecsemestrielle( 'SIGL','SEM8', $idses, $idanac,$bdd); echo $averspecSIGLM1; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemSIGLM1=minaveragesemestrielle( 'SIGL','SEM8', $idses, $idanac,$bdd); echo $minaversemSIGLM1; ?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemSIGLM1=maxaveragesemestrielle( 'SIGL','SEM8', $idses, $idanac,$bdd); echo $maxaversemSIGLM1; ?></td>


            </tr>


            <tr>




                <td style="text-align: center; border: solid 1px black; ">  <strong>SITW</strong></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfSITWM1=nbstudentfofclassspec($idanac,'SITW','M1',$bdd); echo $nbetudiantfSITWM1;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgSITWM1=nbstudentgofclassspec($idanac,'SITW','M1',$bdd); echo $nbetudiantgSITWM1;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantSITWM1=nbstudentofclassspec($idanac,'SITW','M1',$bdd); echo $nbetudiantSITWM1;?></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentSITWM1=nbpresent($idanac,'SITW','SEM8',$idses,$bdd); echo $nbpresentSITWM1; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfSITWM1=nbadmissupzf($idanac,'SITW','SEM8',$idses,$bdd); echo $nbadmissupzfSITWM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgSITWM1=nbadmissupzg($idanac,'SITW','SEM8',$idses,$bdd); echo $nbadmissupzgSITWM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzSITWM1=nbadmissupz($idanac,'SITW','SEM8',$idses,$bdd); echo $nbadmissupzSITWM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzSITWM1= number_format((nbadmissupz($idanac,'SITW','SEM8',$idses,$bdd)*100)/nbpresent($idanac,'SITW','SEM8',$idses,$bdd),2); echo $pourcentsupzSITWM1;?></td>



                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfSITWM1=nbadmisinfdf($idanac,'SITW','SEM8',$idses,$bdd); echo $nbadmisinfdfSITWM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgSITWM1=nbadmisinfdg($idanac,'SITW','SEM8',$idses,$bdd); echo $nbadmisinfdgSITWM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdSITWM1=nbadmisinfd($idanac,'SITW','SEM8',$idses,$bdd); echo $nbadmisinfdSITWM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdSITWM1= number_format((nbadmisinfd($idanac,'SITW','SEM8',$idses,$bdd)*100)/nbpresent($idanac,'SITW','SEM8',$idses,$bdd),2); echo $pourcentinfdSITWM1;?></td>





                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfSITWM1=nbadmissupdixf($idanac,'SITW','SEM8',$idses,$bdd); echo $nbadmissupdixfSITWM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgSITWM1=nbadmissupdixg($idanac,'SITW','SEM8',$idses,$bdd); echo $nbadmissupdixgSITWM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixSITWM1=nbadmissupdix($idanac,'SITW','SEM8',$idses,$bdd); echo  $nbadmissupdixSITWM1;?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixSITWM1= number_format((nbadmissupdix($idanac,'SITW','SEM8',$idses,$bdd)*100)/nbpresent($idanac,'SITW','SEM8',$idses,$bdd),2); echo $pourcentsupdixSITWM1;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfSITWM1=nbadmisdecisf($idanac,'SITW','SEM8',$idses,$bdd); echo $nbadmisdecisfSITWM1; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgSITWM1=nbadmisdecisg($idanac,'SITW','SEM8',$idses,$bdd); echo $nbadmisdecisgSITWM1; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisSITWM1=nbadmisdecis($idanac,'SITW','SEM8',$idses,$bdd);echo $nbadmisdecisSITWM1; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisSITWM1= number_format((nbadmisdecis($idanac,'SITW','SEM8',$idses,$bdd)*100)/nbpresent($idanac,'SITW','SEM8',$idses,$bdd),2); echo $pourcentdecisSITWM1;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecSITWM1=averageofspecsemestrielle( 'SITW','SEM8', $idses, $idanac,$bdd); echo $averspecSITWM1; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemSITWM1=minaveragesemestrielle( 'SITW','SEM8', $idses, $idanac,$bdd); echo $minaversemSITWM1; ?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemSITWM1=maxaveragesemestrielle( 'SITW','SEM8', $idses, $idanac,$bdd); echo $maxaversemSITWM1; ?></td>


            </tr>


            <tr>




                <td style="text-align: center; border: solid 1px black; ">  <strong>RTEL</strong></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfRTELM1=nbstudentfofclassspec($idanac,'RTEL','M1',$bdd); echo $nbetudiantfRTELM1;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgRTELM1=nbstudentgofclassspec($idanac,'RTEL','M1',$bdd); echo $nbetudiantgRTELM1;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantRTELM1=nbstudentofclassspec($idanac,'RTEL','M1',$bdd); echo $nbetudiantRTELM1;?></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentRTELM1=nbpresent($idanac,'RTEL','SEM8',$idses,$bdd); echo $nbpresentRTELM1; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfRTELM1=nbadmissupzf($idanac,'RTEL','SEM8',$idses,$bdd); echo $nbadmissupzfRTELM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgRTELM1=nbadmissupzg($idanac,'RTEL','SEM8',$idses,$bdd); echo $nbadmissupzgRTELM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzRTELM1=nbadmissupz($idanac,'RTEL','SEM8',$idses,$bdd); echo $nbadmissupzRTELM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzRTELM1= number_format((nbadmissupz($idanac,'RTEL','SEM8',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM8',$idses,$bdd),2); echo $pourcentsupzRTELM1;?></td>



                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfRTELM1=nbadmisinfdf($idanac,'RTEL','SEM8',$idses,$bdd); echo $nbadmisinfdfRTELM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgRTELM1=nbadmisinfdg($idanac,'RTEL','SEM8',$idses,$bdd); echo $nbadmisinfdgRTELM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdRTELM1=nbadmisinfd($idanac,'RTEL','SEM8',$idses,$bdd); echo $nbadmisinfdRTELM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdRTELM1= number_format((nbadmisinfd($idanac,'RTEL','SEM8',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM8',$idses,$bdd),2); echo $pourcentinfdRTELM1;?></td>





                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfRTELM1=nbadmissupdixf($idanac,'RTEL','SEM8',$idses,$bdd); echo $nbadmissupdixfRTELM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgRTELM1=nbadmissupdixg($idanac,'RTEL','SEM8',$idses,$bdd); echo $nbadmissupdixgRTELM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixRTELM1=nbadmissupdix($idanac,'RTEL','SEM8',$idses,$bdd); echo  $nbadmissupdixRTELM1;?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixRTELM1= number_format((nbadmissupdix($idanac,'RTEL','SEM8',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM8',$idses,$bdd),2); echo $pourcentsupdixRTELM1;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfRTELM1=nbadmisdecisf($idanac,'RTEL','SEM8',$idses,$bdd); echo $nbadmisdecisfRTELM1; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgRTELM1=nbadmisdecisg($idanac,'RTEL','SEM8',$idses,$bdd); echo $nbadmisdecisgRTELM1; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisRTELM1=nbadmisdecis($idanac,'RTEL','SEM8',$idses,$bdd);echo $nbadmisdecisRTELM1; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisRTELM1= number_format((nbadmisdecis($idanac,'RTEL','SEM8',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM8',$idses,$bdd),2); echo $pourcentdecisRTELM1;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecRTELM1=averageofspecsemestrielle( 'RTEL','SEM8', $idses, $idanac,$bdd); echo $averspecRTELM1; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemRTELM1=minaveragesemestrielle( 'RTEL','SEM8', $idses, $idanac,$bdd); echo $minaversemRTELM1; ?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemRTELM1=maxaveragesemestrielle( 'RTEL','SEM8', $idses, $idanac,$bdd); echo $maxaversemRTELM1; ?></td>


            </tr>


           <tr>




                <td style="text-align: center; border: solid 1px black;" height="10px; ">  <strong>MBDS</strong></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfMBDSM1=nbstudentfofclassspec($idanac,'MBDS','M1',$bdd); echo $nbetudiantfMBDSM1;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgMBDSM1=nbstudentgofclassspec($idanac,'MBDS','M1',$bdd); echo $nbetudiantgMBDSM1;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantMBDSM1=nbstudentofclassspec($idanac,'MBDS','M1',$bdd); echo $nbetudiantMBDSM1;?></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentMBDSM1=nbpresent($idanac,'MBDS','SEM8',$idses,$bdd); echo $nbpresentMBDSM1; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfMBDSM1=nbadmissupzf($idanac,'MBDS','SEM8',$idses,$bdd); echo $nbadmissupzfMBDSM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgMBDSM1=nbadmissupzg($idanac,'MBDS','SEM8',$idses,$bdd); echo $nbadmissupzgMBDSM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzMBDSM1=nbadmissupz($idanac,'MBDS','SEM8',$idses,$bdd); echo $nbadmissupzMBDSM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzMBDSM1= number_format((nbadmissupz($idanac,'MBDS','SEM8',$idses,$bdd)*100)/nbpresent($idanac,'MBDS','SEM8',$idses,$bdd),2); echo $pourcentsupzMBDSM1;?></td>



                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfMBDSM1=nbadmisinfdf($idanac,'MBDS','SEM8',$idses,$bdd); echo $nbadmisinfdfMBDSM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgMBDSM1=nbadmisinfdg($idanac,'MBDS','SEM8',$idses,$bdd); echo $nbadmisinfdgMBDSM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdMBDSM1=nbadmisinfd($idanac,'MBDS','SEM8',$idses,$bdd); echo $nbadmisinfdMBDSM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdMBDSM1= number_format((nbadmisinfd($idanac,'MBDS','SEM8',$idses,$bdd)*100)/nbpresent($idanac,'MBDS','SEM8',$idses,$bdd),2); echo $pourcentinfdMBDSM1;?></td>





                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfMBDSM1=nbadmissupdixf($idanac,'MBDS','SEM8',$idses,$bdd); echo $nbadmissupdixfMBDSM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgMBDSM1=nbadmissupdixg($idanac,'MBDS','SEM8',$idses,$bdd); echo $nbadmissupdixgMBDSM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixMBDSM1=nbadmissupdix($idanac,'MBDS','SEM8',$idses,$bdd); echo  $nbadmissupdixMBDSM1;?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixMBDSM1= number_format((nbadmissupdix($idanac,'MBDS','SEM8',$idses,$bdd)*100)/nbpresent($idanac,'MBDS','SEM8',$idses,$bdd),2); echo $pourcentsupdixMBDSM1;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfMBDSM1=nbadmisdecisf($idanac,'MBDS','SEM8',$idses,$bdd); echo $nbadmisdecisfMBDSM1; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgMBDSM1=nbadmisdecisg($idanac,'MBDS','SEM8',$idses,$bdd); echo $nbadmisdecisgMBDSM1; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisMBDSM1=nbadmisdecis($idanac,'MBDS','SEM8',$idses,$bdd);echo $nbadmisdecisMBDSM1; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisMBDSM1= number_format((nbadmisdecis($idanac,'MBDS','SEM8',$idses,$bdd)*100)/nbpresent($idanac,'MBDS','SEM8',$idses,$bdd),2); echo $pourcentdecisMBDSM1;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecMBDSM1=averageofspecsemestrielle( 'MBDS','SEM8', $idses, $idanac,$bdd); echo $averspecMBDSM1; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemMBDSM1=minaveragesemestrielle( 'MBDS','SEM8', $idses, $idanac,$bdd); echo $minaversemMBDSM1; ?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemMBDSM1=maxaveragesemestrielle( 'MBDS','SEM8', $idses, $idanac,$bdd); echo $maxaversemMBDSM1; ?></td>


            </tr>

          <!--  <tr>




                <td style="text-align: center; border: solid 1px black;" height="10px; ">  <strong>MDSI</strong></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfMDSIM1=nbstudentfofclassspec($idanac,'MDSI','M1',$bdd); echo $nbetudiantfMDSIM1;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgMDSIM1=nbstudentgofclassspec($idanac,'MDSI','M1',$bdd); echo $nbetudiantgMDSIM1;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantMDSIM1=nbstudentofclassspec($idanac,'MDSI','M1',$bdd); echo $nbetudiantMDSIM1;?></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentMDSIM1=nbpresent($idanac,'MDSI','SEM8',$idses,$bdd); echo $nbpresentMDSIM1; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfMDSIM1=nbadmissupzf($idanac,'MDSI','SEM8',$idses,$bdd); echo $nbadmissupzfMDSIM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgMDSIM1=nbadmissupzg($idanac,'MDSI','SEM8',$idses,$bdd); echo $nbadmissupzgMDSIM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzMDSIM1=nbadmissupz($idanac,'MDSI','SEM8',$idses,$bdd); echo $nbadmissupzMDSIM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzMDSIM1= number_format((nbadmissupz($idanac,'MDSI','SEM8',$idses,$bdd)*100)/nbpresent($idanac,'MDSI','SEM8',$idses,$bdd),2); echo $pourcentsupzMDSIM1;?></td>



                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfMDSIM1=nbadmisinfdf($idanac,'MDSI','SEM8',$idses,$bdd); echo $nbadmisinfdfMDSIM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgMDSIM1=nbadmisinfdg($idanac,'MDSI','SEM8',$idses,$bdd); echo $nbadmisinfdgMDSIM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdMDSIM1=nbadmisinfd($idanac,'MDSI','SEM8',$idses,$bdd); echo $nbadmisinfdMDSIM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdMDSIM1= number_format((nbadmisinfd($idanac,'MDSI','SEM8',$idses,$bdd)*100)/nbpresent($idanac,'MDSI','SEM8',$idses,$bdd),2); echo $pourcentinfdMDSIM1;?></td>





                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfMDSIM1=nbadmissupdixf($idanac,'MDSI','SEM8',$idses,$bdd); echo $nbadmissupdixfMDSIM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgMDSIM1=nbadmissupdixg($idanac,'MDSI','SEM8',$idses,$bdd); echo $nbadmissupdixgMDSIM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixMDSIM1=nbadmissupdix($idanac,'MDSI','SEM8',$idses,$bdd); echo  $nbadmissupdixMDSIM1;?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixMDSIM1= number_format((nbadmissupdix($idanac,'MDSI','SEM8',$idses,$bdd)*100)/nbpresent($idanac,'MDSI','SEM8',$idses,$bdd),2); echo $pourcentsupdixMDSIM1;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfMDSIM1=nbadmisdecisf($idanac,'MDSI','SEM8',$idses,$bdd); echo $nbadmisdecisfMDSIM1; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgMDSIM1=nbadmisdecisg($idanac,'MDSI','SEM8',$idses,$bdd); echo $nbadmisdecisgMDSIM1; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisMDSIM1=nbadmisdecis($idanac,'MDSI','SEM8',$idses,$bdd);echo $nbadmisdecisMDSIM1; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisMDSIM1= number_format((nbadmisdecis($idanac,'MDSI','SEM8',$idses,$bdd)*100)/nbpresent($idanac,'MDSI','SEM8',$idses,$bdd),2); echo $pourcentdecisMDSIM1;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecMDSIM1=averageofspecsemestrielle( 'MDSI','SEM8', $idses, $idanac,$bdd); echo $averspecMDSIM1; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemMDSIM1=minaveragesemestrielle( 'MDSI','SEM8', $idses, $idanac,$bdd); echo $minaversemMDSIM1; ?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemMDSIM1=maxaveragesemestrielle( 'MDSI','SEM8', $idses, $idanac,$bdd); echo $maxaversemMDSIM1; ?></td>


            </tr>-->







            <tr>




                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ;" height="10px;"   >  <strong>TOTAL </strong></td>


                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;">  <?php $nbetudiantfM1=$nbetudiantfSIGLM1 + $nbetudiantfRTELM1 + $nbetudiantfMBDSM1  + $nbetudiantfSITWM1 /*+ $nbetudiantfMDSIM1 */; echo $nbetudiantfM1;?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;">  <?php $nbetudiantgM1=$nbetudiantgSIGLM1 + $nbetudiantgRTELM1 + $nbetudiantgMBDSM1 + $nbetudiantgSITWM1/* + $nbetudiantgMDSIM1*/;echo $nbetudiantgM1;?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbetudiantM1=$nbetudiantSIGLM1 + $nbetudiantRTELM1 + $nbetudiantMBDSM1 + $nbetudiantSITWM1 /*+ $nbetudiantMDSIM1*/; echo $nbetudiantM1;?></td>


                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"><?php $nbpresentM1= $nbpresentSIGLM1+$nbpresentRTELM1 + $nbpresentMBDSM1 + $nbpresentSITWM1  /*+ $nbpresentMDSIM1*/; echo $nbpresentM1 ?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmissupzfM1=$nbadmissupzfSIGLM1+$nbadmissupzfRTELM1 + $nbadmissupzfMBDSM1  + $nbadmissupzfSITWM1 /*+ $nbadmissupzfMDSIM1*/; echo $nbadmissupzfM1; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmissupzgM1=$nbadmissupzgSIGLM1 + $nbadmissupzgRTELM1 + $nbadmissupzgMBDSM1  + $nbadmissupzgSITWM1 /*+ $nbadmissupzgMDSIM1*/;echo $nbadmissupzgM1; ?> </td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"><?php $nbadmissupzM1=$nbadmissupzSIGLM1 + $nbadmissupzRTELM1+ $nbadmissupzMBDSM1 + $nbadmissupzSITWM1 /*+ $nbadmissupzMDSIM1*/; echo $nbadmissupzM1 ?> </td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"> <?php  $pourcentsupzM1= number_format((($nbadmissupzM1*100)/$nbpresentM1),3); echo $pourcentsupzM1;?></td>



                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmisinfdfM1=$nbadmisinfdfSIGLM1+$nbadmisinfdfRTELM1+ $nbadmisinfdfMBDSM1 + $nbadmisinfdfSITWM1  /*+ $nbadmisinfdfMDSIM1*/;echo $nbadmisinfdfM1; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $nbadmisinfdgM1=$nbadmisinfdgSIGLM1  + $nbadmisinfdgRTELM1  + $nbadmisinfdgMBDSM1  + $nbadmisinfdgSITWM1/* + $nbadmisinfdgMDSIM1*/;echo $nbadmisinfdgM1; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"><?php  $nbadmisinfdM1=$nbadmisinfdSIGLM1+ $nbadmisinfdRTELM1 + $nbadmisinfdMBDSM1 + $nbadmisinfdSITWM1 /*+ $nbadmisinfdMDSIM1*/; echo $nbadmisinfdM1; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $pourcentinfdM1= number_format((($nbadmisinfdM1*100)/$nbpresentM1),2); echo $pourcentinfdM1;?></td>





                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmissupdixfM1=$nbadmissupdixfSIGLM1+$nbadmissupdixfRTELM1 + $nbadmissupdixfMBDSM1  + $nbadmissupdixfSITWM1 /* + $nbadmissupdixfMDSIM1*/; echo $nbadmissupdixfM1 ?> </td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"> <?php $nbadmissupdixgM1 = $nbadmissupdixgSIGLM1 + $nbadmissupdixgRTELM1+ $nbadmissupdixgMBDSM1 + $nbadmissupdixgSITWM1 /*+ $nbadmissupdixgMDSIM1*/; echo $nbadmissupdixgM1 ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"><?php $nbadmissupdixM1 = $nbadmissupdixSIGLM1+ $nbadmissupdixRTELM1+ $nbadmissupdixMBDSM1 + $nbadmissupdixSITWM1 /*+ $nbadmissupdixMDSIM1*/; echo $nbadmissupdixM1; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $pourcentsupdixM1= number_format((($nbadmissupdixM1*100)/$nbpresentM1),2); echo $pourcentsupdixM1;?></td>

                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"><?php  $nbadmisdecisfM1=$nbadmisdecisfSIGLM1+ $nbadmisdecisfRTELM1 + $nbadmisdecisfMBDSM1  + $nbadmisdecisfSITWM1 /*+ $nbadmisdecisfMDSIM1*/; echo $nbadmisdecisfM1; ?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;">  <?php $nbadmisdecisgM1= $nbadmisdecisgSIGLM1+ $nbadmisdecisgRTELM1 + $nbadmisdecisgMBDSM1 + $nbadmisdecisgSITWM1 /*+ $nbadmisdecisgMDSIM1*/;echo $nbadmisdecisgM1; ?></td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"> <?php $nbadmisdecisM1= $nbadmisdecisSIGLM1 + $nbadmisdecisRTELM1  + $nbadmisdecisMBDSM1 + $nbadmisdecisSITWM1/* + $nbadmisdecisMDSIM1*/; echo $nbadmisdecisM1; ?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $pourcentdecisM1= number_format((($nbadmisdecisM1*100)/$nbpresentM1),2); echo $pourcentdecisM1;?></td>

                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;" COLSPAN="3"> </td>

            </tr>


            <tr>



                <td style="text-align: center; border: solid 1px black; " rowspan="5" height="10px;" > <strong>MASTER II</strong></td>
                <td style="text-align: center; border: solid 1px black; ">  <strong>SIGL </strong></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfSIGLM2=nbstudentfofclassspec($idanac,'SIGL','M2',$bdd); echo $nbetudiantfSIGLM2;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgSIGLM2=nbstudentgofclassspec($idanac,'SIGL','M2',$bdd); echo $nbetudiantgSIGLM2;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantSIGLM2=nbstudentofclassspec($idanac,'SIGL','M2',$bdd); echo $nbetudiantSIGLM2;?></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentSIGLM2=nbpresent($idanac,'SIGL','SEM10',$idses,$bdd); echo $nbpresentSIGLM2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfSIGLM2=nbadmissupzf($idanac,'SIGL','SEM10',$idses,$bdd); echo $nbadmissupzfSIGLM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgSIGLM2=nbadmissupzg($idanac,'SIGL','SEM10',$idses,$bdd); echo $nbadmissupzgSIGLM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzSIGLM2=nbadmissupz($idanac,'SIGL','SEM10',$idses,$bdd); echo $nbadmissupzSIGLM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzSIGLM2= number_format((nbadmissupz($idanac,'SIGL','SEM10',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM10',$idses,$bdd),2); echo $pourcentsupzSIGLM2;?></td>



                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfSIGLM2=nbadmisinfdf($idanac,'SIGL','SEM10',$idses,$bdd); echo $nbadmisinfdfSIGLM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgSIGLM2=nbadmisinfdg($idanac,'SIGL','SEM10',$idses,$bdd); echo $nbadmisinfdgSIGLM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdSIGLM2=nbadmisinfd($idanac,'SIGL','SEM10',$idses,$bdd); echo $nbadmisinfdSIGLM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdSIGLM2= number_format((nbadmisinfd($idanac,'SIGL','SEM10',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM10',$idses,$bdd),2); echo $pourcentinfdSIGLM2;?></td>





                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfSIGLM2=nbadmissupdixf($idanac,'SIGL','SEM10',$idses,$bdd); echo $nbadmissupdixfSIGLM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgSIGLM2=nbadmissupdixg($idanac,'SIGL','SEM10',$idses,$bdd); echo $nbadmissupdixgSIGLM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixSIGLM2=nbadmissupdix($idanac,'SIGL','SEM10',$idses,$bdd); echo  $nbadmissupdixSIGLM2;?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixSIGLM2= number_format((nbadmissupdix($idanac,'SIGL','SEM10',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM10',$idses,$bdd),2); echo $pourcentsupdixSIGLM2;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfSIGLM2=nbadmisdecisf($idanac,'SIGL','SEM10',$idses,$bdd); echo $nbadmisdecisfSIGLM2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgSIGLM2=nbadmisdecisg($idanac,'SIGL','SEM10',$idses,$bdd); echo $nbadmisdecisgSIGLM2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisSIGLM2=nbadmisdecis($idanac,'SIGL','SEM10',$idses,$bdd);echo $nbadmisdecisSIGLM2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisSIGLM2= number_format((nbadmisdecis($idanac,'SIGL','SEM10',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM10',$idses,$bdd),2); echo $pourcentdecisSIGLM2;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecSIGLM2=averageofspecsemestrielle( 'SIGL','SEM10', $idses, $idanac,$bdd); echo $averspecSIGLM2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemSIGLM2=minaveragesemestrielle( 'SIGL','SEM10', $idses, $idanac,$bdd); echo $minaversemSIGLM2; ?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemSIGLM2=maxaveragesemestrielle( 'SIGL','SEM10', $idses, $idanac,$bdd); echo $maxaversemSIGLM2; ?></td>

            </tr>


            <tr>




                <td style="text-align: center; border: solid 1px black; ">  <strong>SITW </strong></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfSITWM2=nbstudentfofclassspec($idanac,'SITW','M2',$bdd); echo $nbetudiantfSITWM2;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgSITWM2=nbstudentgofclassspec($idanac,'SITW','M2',$bdd); echo $nbetudiantgSITWM2;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantSITWM2=nbstudentofclassspec($idanac,'SITW','M2',$bdd); echo $nbetudiantSITWM2;?></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentSITWM2=nbpresent($idanac,'SITW','SEM10',$idses,$bdd); echo $nbpresentSITWM2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfSITWM2=nbadmissupzf($idanac,'SITW','SEM10',$idses,$bdd); echo $nbadmissupzfSITWM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgSITWM2=nbadmissupzg($idanac,'SITW','SEM10',$idses,$bdd); echo $nbadmissupzgSITWM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzSITWM2=nbadmissupz($idanac,'SITW','SEM10',$idses,$bdd); echo $nbadmissupzSITWM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzSITWM2= number_format((nbadmissupz($idanac,'SITW','SEM10',$idses,$bdd)*100)/nbpresent($idanac,'SITW','SEM10',$idses,$bdd),2); echo $pourcentsupzSITWM2;?></td>



                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfSITWM2=nbadmisinfdf($idanac,'SITW','SEM10',$idses,$bdd); echo $nbadmisinfdfSITWM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgSITWM2=nbadmisinfdg($idanac,'SITW','SEM10',$idses,$bdd); echo $nbadmisinfdgSITWM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdSITWM2=nbadmisinfd($idanac,'SITW','SEM10',$idses,$bdd); echo $nbadmisinfdSITWM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdSITWM2= number_format((nbadmisinfd($idanac,'SITW','SEM10',$idses,$bdd)*100)/nbpresent($idanac,'SITW','SEM10',$idses,$bdd),2); echo $pourcentinfdSITWM2;?></td>





                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfSITWM2=nbadmissupdixf($idanac,'SITW','SEM10',$idses,$bdd); echo $nbadmissupdixfSITWM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgSITWM2=nbadmissupdixg($idanac,'SITW','SEM10',$idses,$bdd); echo $nbadmissupdixgSITWM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixSITWM2=nbadmissupdix($idanac,'SITW','SEM10',$idses,$bdd); echo  $nbadmissupdixSITWM2;?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixSITWM2= number_format((nbadmissupdix($idanac,'SITW','SEM10',$idses,$bdd)*100)/nbpresent($idanac,'SITW','SEM10',$idses,$bdd),2); echo $pourcentsupdixSITWM2;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfSITWM2=nbadmisdecisf($idanac,'SITW','SEM10',$idses,$bdd); echo $nbadmisdecisfSITWM2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgSITWM2=nbadmisdecisg($idanac,'SITW','SEM10',$idses,$bdd); echo $nbadmisdecisgSITWM2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisSITWM2=nbadmisdecis($idanac,'SITW','SEM10',$idses,$bdd);echo $nbadmisdecisSITWM2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisSITWM2= number_format((nbadmisdecis($idanac,'SITW','SEM10',$idses,$bdd)*100)/nbpresent($idanac,'SITW','SEM10',$idses,$bdd),2); echo $pourcentdecisSITWM2;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecSITWM2=averageofspecsemestrielle( 'SITW','SEM10', $idses, $idanac,$bdd); echo $averspecSITWM2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemSITWM2=minaveragesemestrielle( 'SITW','SEM10', $idses, $idanac,$bdd); echo $minaversemSITWM2; ?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemSITWM2=maxaveragesemestrielle( 'SITW','SEM10', $idses, $idanac,$bdd); echo $maxaversemSITWM2; ?></td>

            </tr>

            <tr>




                <td style="text-align: center; border: solid 1px black; ">  <strong>MDSI</strong></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfMDSIM2=nbstudentfofclassspec($idanac,'MDSI','M2',$bdd); echo $nbetudiantfMDSIM2;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgMDSIM2=nbstudentgofclassspec($idanac,'MDSI','M2',$bdd); echo $nbetudiantgMDSIM2;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantMDSIM2=nbstudentofclassspec($idanac,'MDSI','M2',$bdd); echo $nbetudiantMDSIM2;?></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentMDSIM2=nbpresent($idanac,'MDSI','SEM10',$idses,$bdd); echo $nbpresentMDSIM2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfMDSIM2=nbadmissupzf($idanac,'MDSI','SEM10',$idses,$bdd); echo $nbadmissupzfMDSIM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgMDSIM2=nbadmissupzg($idanac,'MDSI','SEM10',$idses,$bdd); echo $nbadmissupzgMDSIM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzMDSIM2=nbadmissupz($idanac,'MDSI','SEM10',$idses,$bdd); echo $nbadmissupzMDSIM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzMDSIM2= number_format((nbadmissupz($idanac,'MDSI','SEM10',$idses,$bdd)*100)/nbpresent($idanac,'MDSI','SEM10',$idses,$bdd),2); echo $pourcentsupzMDSIM2;?></td>



                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfMDSIM2=nbadmisinfdf($idanac,'MDSI','SEM10',$idses,$bdd); echo $nbadmisinfdfMDSIM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgMDSIM2=nbadmisinfdg($idanac,'MDSI','SEM10',$idses,$bdd); echo $nbadmisinfdgMDSIM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdMDSIM2=nbadmisinfd($idanac,'MDSI','SEM10',$idses,$bdd); echo $nbadmisinfdMDSIM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdMDSIM2= number_format((nbadmisinfd($idanac,'MDSI','SEM10',$idses,$bdd)*100)/nbpresent($idanac,'MDSI','SEM10',$idses,$bdd),2); echo $pourcentinfdMDSIM2;?></td>





                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfMDSIM2=nbadmissupdixf($idanac,'MDSI','SEM10',$idses,$bdd); echo $nbadmissupdixfMDSIM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgMDSIM2=nbadmissupdixg($idanac,'MDSI','SEM10',$idses,$bdd); echo $nbadmissupdixgMDSIM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixMDSIM2=nbadmissupdix($idanac,'MDSI','SEM10',$idses,$bdd); echo  $nbadmissupdixMDSIM2;?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixMDSIM2= number_format((nbadmissupdix($idanac,'MDSI','SEM10',$idses,$bdd)*100)/nbpresent($idanac,'MDSI','SEM10',$idses,$bdd),2); echo $pourcentsupdixMDSIM2;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfMDSIM2=nbadmisdecisf($idanac,'MDSI','SEM10',$idses,$bdd); echo $nbadmisdecisfMDSIM2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgMDSIM2=nbadmisdecisg($idanac,'MDSI','SEM10',$idses,$bdd); echo $nbadmisdecisgMDSIM2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisMDSIM2=nbadmisdecis($idanac,'MDSI','SEM10',$idses,$bdd);echo $nbadmisdecisMDSIM2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisMDSIM2= number_format((nbadmisdecis($idanac,'MDSI','SEM10',$idses,$bdd)*100)/nbpresent($idanac,'MDSI','SEM10',$idses,$bdd),2); echo $pourcentdecisMDSIM2;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecMDSIM2=averageofspecsemestrielle( 'MDSI','SEM10', $idses, $idanac,$bdd); echo $averspecMDSIM2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemMDSIM2=minaveragesemestrielle( 'MDSI','SEM10', $idses, $idanac,$bdd); echo $minaversemMDSIM2; ?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemMDSIM2=maxaveragesemestrielle( 'MDSI','SEM10', $idses, $idanac,$bdd); echo $maxaversemMDSIM2; ?></td>

            </tr>
            <tr>




                <td style="text-align: center; border: solid 1px black; ">  <strong>RTEL</strong></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfRTELM2=nbstudentfofclassspec($idanac,'RTEL','M2',$bdd); echo $nbetudiantfRTELM2;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgRTELM2=nbstudentgofclassspec($idanac,'RTEL','M2',$bdd); echo $nbetudiantgRTELM2;?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantRTELM2=nbstudentofclassspec($idanac,'RTEL','M2',$bdd); echo $nbetudiantRTELM2;?></td>


                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentRTELM2=nbpresent($idanac,'RTEL','SEM10',$idses,$bdd); echo $nbpresentRTELM2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfRTELM2=nbadmissupzf($idanac,'RTEL','SEM10',$idses,$bdd); echo $nbadmissupzfRTELM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgRTELM2=nbadmissupzg($idanac,'RTEL','SEM10',$idses,$bdd); echo $nbadmissupzgRTELM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzRTELM2=nbadmissupz($idanac,'RTEL','SEM10',$idses,$bdd); echo $nbadmissupzRTELM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzRTELM2= number_format((nbadmissupz($idanac,'RTEL','SEM10',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM10',$idses,$bdd),2); echo $pourcentsupzRTELM2;?></td>



                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfRTELM2=nbadmisinfdf($idanac,'RTEL','SEM10',$idses,$bdd); echo $nbadmisinfdfRTELM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgRTELM2=nbadmisinfdg($idanac,'RTEL','SEM10',$idses,$bdd); echo $nbadmisinfdgRTELM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdRTELM2=nbadmisinfd($idanac,'RTEL','SEM10',$idses,$bdd); echo $nbadmisinfdRTELM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdRTELM2= number_format((nbadmisinfd($idanac,'RTEL','SEM10',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM10',$idses,$bdd),2); echo $pourcentinfdRTELM2;?></td>





                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfRTELM2=nbadmissupdixf($idanac,'RTEL','SEM10',$idses,$bdd); echo $nbadmissupdixfRTELM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgRTELM2=nbadmissupdixg($idanac,'RTEL','SEM10',$idses,$bdd); echo $nbadmissupdixgRTELM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixRTELM2=nbadmissupdix($idanac,'RTEL','SEM10',$idses,$bdd); echo  $nbadmissupdixRTELM2;?> </td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixRTELM2= number_format((nbadmissupdix($idanac,'RTEL','SEM10',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM10',$idses,$bdd),2); echo $pourcentsupdixRTELM2;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfRTELM2=nbadmisdecisf($idanac,'RTEL','SEM10',$idses,$bdd); echo $nbadmisdecisfRTELM2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgRTELM2=nbadmisdecisg($idanac,'RTEL','SEM10',$idses,$bdd); echo $nbadmisdecisgRTELM2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisRTELM2=nbadmisdecis($idanac,'RTEL','SEM10',$idses,$bdd);echo $nbadmisdecisRTELM2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisRTELM2= number_format((nbadmisdecis($idanac,'RTEL','SEM10',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM10',$idses,$bdd),2); echo $pourcentdecisRTELM2;?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecRTELM2=averageofspecsemestrielle( 'RTEL','SEM10', $idses, $idanac,$bdd); echo $averspecRTELM2; ?></td>
                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemRTELM2=minaveragesemestrielle( 'RTEL','SEM10', $idses, $idanac,$bdd); echo $minaversemRTELM2; ?></td>

                <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemRTELM2=maxaveragesemestrielle( 'RTEL','SEM10', $idses, $idanac,$bdd); echo $maxaversemRTELM2; ?></td>

            </tr>
            <tr>




                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ;" height="10px;"  >  <strong>TOTAL </strong></td>


                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;">  <?php $nbetudiantfM2=$nbetudiantfSIGLM2+$nbetudiantfRTELM2 +$nbetudiantfSITWM2 +$nbetudiantfMDSIM2; echo $nbetudiantfM2;?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;">  <?php $nbetudiantgM2=$nbetudiantgSIGLM2 + $nbetudiantgRTELM2+ $nbetudiantgSITWM2+ $nbetudiantgMDSIM2  ;echo $nbetudiantgM2;?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbetudiantM2=$nbetudiantSIGLM2 + $nbetudiantRTELM2 + $nbetudiantSITWM2 + $nbetudiantMDSIM2; echo $nbetudiantM2;?></td>


                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"><?php $nbpresentM2= $nbpresentSIGLM2+$nbpresentRTELM2+$nbpresentSITWM2 +$nbpresentMDSIM2; echo $nbpresentM2 ?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmissupzfM2=$nbadmissupzfSIGLM2+$nbadmissupzfRTELM2+$nbadmissupzfSITWM2 +$nbadmissupzfMDSIM2; echo $nbadmissupzfM2; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmissupzgM2=$nbadmissupzgSIGLM2 + $nbadmissupzgRTELM2  + $nbadmissupzgSITWM2 + $nbadmissupzgMDSIM2;echo $nbadmissupzgM2; ?> </td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"><?php $nbadmissupzM2=$nbadmissupzSIGLM2 + $nbadmissupzRTELM2+ $nbadmissupzSITWM2 + $nbadmissupzMDSIM2; echo $nbadmissupzM2 ?> </td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"> <?php  $pourcentsupzM2= number_format((($nbadmissupzM2*100)/$nbpresentM2),2); echo $pourcentsupzM2;?></td>



                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmisinfdfM2=$nbadmisinfdfSIGLM2+$nbadmisinfdfRTELM2 +$nbadmisinfdfSITWM2 +$nbadmisinfdfMDSIM2;echo $nbadmisinfdfM2; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $nbadmisinfdgM2=$nbadmisinfdgSIGLM2 + $nbadmisinfdgRTELM2+ $nbadmisinfdgSITWM2 + $nbadmisinfdgMDSIM2;echo $nbadmisinfdgM2; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"><?php  $nbadmisinfdM2=$nbadmisinfdSIGLM2+ $nbadmisinfdRTELM2 + $nbadmisinfdSITWM2 + $nbadmisinfdMDSIM2; echo $nbadmisinfdM2; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $pourcentinfdM2= number_format((($nbadmisinfdM2*100)/$nbpresentM2),2); echo $pourcentinfdM2;?></td>





                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmissupdixfM2=$nbadmissupdixfSIGLM2+$nbadmissupdixfRTELM2+$nbadmissupdixfSITWM2 +$nbadmissupdixfMDSIM2; echo $nbadmissupdixfM2 ?> </td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"> <?php $nbadmissupdixgM2 = $nbadmissupdixgSIGLM2 + $nbadmissupdixgRTELM2+ $nbadmissupdixgSITWM2 + $nbadmissupdixgMDSIM2; echo $nbadmissupdixgM2 ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"><?php $nbadmissupdixM2 = $nbadmissupdixSIGLM2 + $nbadmissupdixRTELM2 + $nbadmissupdixSITWM2 + $nbadmissupdixMDSIM2; echo $nbadmissupdixM2; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $pourcentsupdixM2= number_format((($nbadmissupdixM2*100)/$nbpresentM2),2); echo $pourcentsupdixM2;?></td>

                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"><?php  $nbadmisdecisfM2=$nbadmisdecisfSIGLM2 + $nbadmisdecisfRTELM2 + $nbadmisdecisfSITWM2 + $nbadmisdecisfMDSIM2; echo $nbadmisdecisfM2; ?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;">  <?php $nbadmisdecisgM2= $nbadmisdecisgSIGLM2 + $nbadmisdecisgRTELM2  + $nbadmisdecisgSITWM2  + $nbadmisdecisgMDSIM2;echo $nbadmisdecisgM2; ?></td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"> <?php $nbadmisdecisM2= $nbadmisdecisSIGLM2 + $nbadmisdecisRTELM2 + $nbadmisdecisSITWM2 + $nbadmisdecisMDSIM2; echo $nbadmisdecisM2; ?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $pourcentdecisM2= number_format((($nbadmisdecisM2*100)/$nbpresentM2),2); echo $pourcentdecisM2;?></td>


                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;" colspan="3"></td>
            </tr>
            <tr>




                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ;" height="10px;" COLSPAN="2" >  <strong>TOTAL MASTER</strong></td>





                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;">  <?php $nbetudiantfMASTER=$nbetudiantfM1+$nbetudiantfM2; echo $nbetudiantfMASTER;?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;">  <?php $nbetudiantgMASTER=$nbetudiantgM1 + $nbetudiantgM2 ;echo $nbetudiantgMASTER;?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbetudiantMASTER=$nbetudiantM1 + $nbetudiantM2; echo $nbetudiantMASTER;?></td>


                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"><?php $nbpresentMASTER= $nbpresentM1+$nbpresentM2; echo $nbpresentMASTER ?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmissupzfMASTER=$nbadmissupzfM1+$nbadmissupzfM2; echo $nbadmissupzfMASTER; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmissupzgMASTER=$nbadmissupzgM1 + $nbadmissupzgM2;echo $nbadmissupzgMASTER; ?> </td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"><?php $nbadmissupzMASTER=$nbadmissupzM2 +  $nbadmissupzM1; echo $nbadmissupzMASTER ?> </td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"> <?php  $pourcentsupzMASTER= number_format((($nbadmissupzMASTER*100)/$nbpresentMASTER),2); echo $pourcentsupzMASTER;?></td>



                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmisinfdfMASTER=$nbadmisinfdfM1+$nbadmisinfdfM2;echo $nbadmisinfdfMASTER; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $nbadmisinfdgMASTER=$nbadmisinfdgM1 + $nbadmisinfdgM2;echo $nbadmisinfdgMASTER; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"><?php  $nbadmisinfdMASTER=$nbadmisinfdM1+ $nbadmisinfdM2; echo $nbadmisinfdMASTER; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $pourcentinfdMASTER= number_format((($nbadmisinfdMASTER*100)/$nbpresentMASTER),2); echo $pourcentinfdMASTER;?></td>





                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmissupdixfMASTER=$nbadmissupdixfM1+$nbadmissupdixfM2; echo $nbadmissupdixfMASTER ?> </td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"> <?php $nbadmissupdixgMASTER = $nbadmissupdixgM1 + $nbadmissupdixgM2; echo $nbadmissupdixgMASTER ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"><?php $nbadmissupdixMASTER = $nbadmissupdixM1 + $nbadmissupdixM2; echo $nbadmissupdixMASTER; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $pourcentsupdixMASTER= number_format((($nbadmissupdixMASTER*100)/$nbpresentMASTER),2); echo $pourcentsupdixMASTER;?></td>

                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"><?php  $nbadmisdecisfMASTER=$nbadmisdecisfM1 + $nbadmisdecisfM2; echo $nbadmisdecisfMASTER; ?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;">  <?php $nbadmisdecisgMASTER= $nbadmisdecisgM1 + $nbadmisdecisgM2;echo $nbadmisdecisgMASTER; ?></td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"> <?php $nbadmisdecisMASTER= $nbadmisdecisM1 + $nbadmisdecisM2;; echo $nbadmisdecisMASTER; ?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $pourcentdecisMASTER= number_format((($nbadmisdecisMASTER*100)/$nbpresentMASTER),2); echo $pourcentdecisMASTER;?></td>

                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;" colspan="3"></td>
            </tr>

            <tr>




                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ;" height="20px;"  colspan="2" >  <strong>TOTAL </strong></td>


                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbetudiantfAN=$nbetudiantfLICENCE+$nbetudiantfMASTER ; echo $nbetudiantfAN;?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbetudiantgAN=$nbetudiantgLICENCE +$nbetudiantgMASTER ;echo $nbetudiantgAN;?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbetudiantAN=$nbetudiantMASTER+$nbetudiantLICENCE ; echo $nbetudiantAN;?></td>


                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbpresentAN= $nbpresentMASTER+$nbpresentLICENCE ; echo $nbpresentAN ?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzfAN=$nbadmissupzfMASTER+$nbadmissupzfLICENCE ; echo $nbadmissupzfAN; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzgAN=$nbadmissupzgMASTER+$nbadmissupzgLICENCE  ;echo $nbadmissupzgAN; ?> </td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbadmissupzAN=$nbadmissupzMASTER + $nbadmissupzLICENCE ; echo $nbadmissupzAN ?> </td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php  $pourcentsupzAN= number_format((($nbadmissupzAN*100)/$nbpresentAN),3); echo $pourcentsupzAN;?></td>



                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmisinfdfAN=$nbadmisinfdfMASTER+$nbadmisinfdfLICENCE;echo $nbadmisinfdfAN; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $nbadmisinfdgAN= $nbadmisinfdgMASTER+ $nbadmisinfdgLICENCE;echo $nbadmisinfdgAN; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisinfdAN=$nbadmisinfdMASTER+$nbadmisinfdLICENCE ; echo $nbadmisinfdAN; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentinfdAN= number_format((($nbadmisinfdAN*100)/$nbpresentAN),2); echo $pourcentinfdAN;?></td>





                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupdixfAN=$nbadmissupdixfMASTER+$nbadmissupdixfLICENCE ; echo $nbadmissupdixfAN ?> </td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmissupdixgAN = $nbadmissupdixgLICENCE+$nbadmissupdixgMASTER ; echo $nbadmissupdixgAN ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php $nbadmissupdixAN = $nbadmissupdixMASTER +$nbadmissupdixLICENCE ; echo $nbadmissupdixAN; ?> </td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentsupdixAN= number_format((($nbadmissupdixAN*100)/$nbpresentAN),2); echo $pourcentsupdixAN;?></td>

                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisdecisfAN=$nbadmisdecisfMASTER+$nbadmisdecisfLICENCE ; echo $nbadmisdecisfAN; ?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbadmisdecisgAN=  $nbadmisdecisgMASTER+ $nbadmisdecisgLICENCE ;echo $nbadmisdecisgAN; ?></td>
                <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmisdecisAN= $nbadmisdecisMASTER +$nbadmisdecisLICENCE ; echo $nbadmisdecisAN; ?></td>
                <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentdecisAN= number_format((($nbadmisdecisAN*100)/$nbpresentAN),3); echo $pourcentdecisAN;?></td>


            </tr>

        </table>

    </page>





<?php

}


?>