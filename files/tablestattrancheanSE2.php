<?php
include("myfunctions.php");
?>
<page  backbottom="5mm" backtop="1mm" >



    <table width="auto" border="0" cellspacing="0">
        <tr>
            <td><img src="esatic.png"  alt="logoesatic" style="margin-left: 50px;" /> </td> <td><span style="font-size:14px; margin-left:600px;">REPUBLIQUE DE CÔTE D'IVOIRE</span></td>
        </tr> <tr><td style="font-size:14px; margin-left:50px; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.....................</td> <td><span style="font-size:14px; margin-left:670px;">.....................</span></td> </tr>
        <tr> <td><span style="font-size:14px; margin-left:12px; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>DIRECTION DE LA PEDAGOGIE</strong></span></td><td><span style="font-size:14px; margin-left:630px;"><strong>Union-Discipline-Travail</strong> </span></td></tr>
    </table>



    <page_footer>

        <span style="margin-left:10px; font-size:10px; margin-top:150px;  font-style:italic;"> <?php echo $date;?></span>   <span style="margin-left:400px;font-size:10px; margin-top:150px; font-weight:bold; "><strong>  </strong></span><span style="margin-left:480px; font-size:10px; margin-top:150px;  font-style:italic;">  [[page_cu]]/[[page_nb]]</span>
    </page_footer>
    <div  style="margin-top:20px; width:80%; margin-left:100px; text-align:center; font-size:22px; font-weight: bold; border: double; background-color:#CCC;"> STATISTIQUES DE LA DEUXIEME  SESSION DE L'ANNEE ACADEMIQUE    &nbsp;  <strong><?php echo  $idanac;?></strong>&nbsp;  </div>



    <br />

    <table style="border:solid 1px black;  text-align:left; font-size:11px;  border-collapse:collapse;" align="center">


        <col style="width: 9%">
        <col style="width: 9%">
        <col style="width: 5%">
        <col style="width: 5%">
        <col style="width: 5%">
        <col style="width: 8%">



        <col style="width: 3%">
        <col style="width: 3%">
        <col style="width: 3%">
        <col style="width: 6%">


        <col style="width: 3%">
        <col style="width: 3%">
        <col style="width: 3%">
        <col style="width: 6%">

        <col style="width: 3%">
        <col style="width: 3%">
        <col style="width: 3%">
        <col style="width: 6%">

        <col style="width: 3%">
        <col style="width: 3%">
        <col style="width: 3%">
        <col style="width: 4%">





        <thead>

        <tr><td style="text-align: center; border: solid 1px black; " rowspan="2"> NIVEAU</td>

            <td style="text-align: center; border: solid 1px black;"rowspan="2"> SPECIALITE</td>
            <td style="text-align: center; border: solid 1px black;  " colspan="3">EFFECTIF</td>

            <td style="text-align: center; border: solid 1px black;"rowspan="2"> PRESENT</td>

            <td style="text-align: center; border: solid 1px black;  " colspan="4"> 0&lt;= M.A.&lt;8 </td>
            <td style="text-align: center; border: solid 1px black;  " colspan="4"> 8&lt;= M.A.&lt;10 </td>
            <td style="text-align: center; border: solid 1px black;  " colspan="4"> M.A.>= 10</td>
            <td style="text-align: center; border: solid 1px black;  " colspan="4">ADMIS</td>

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



            <td style="text-align: center; border: solid 1px black; "  rowspan="4"> <strong>LICENCE 1</strong></td>
            <td style="text-align: center; border: solid 1px black; ">  SRIT </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbstudentfofclassspecSRITL1=nbstudentfofclassspec($idanac,'SRIT','L1',$bdd); echo $nbstudentfofclassspecSRITL1 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbstudentgofclassspecSRITL1=nbstudentgofclassspec($idanac,'SRIT','L1',$bdd); echo $nbstudentgofclassspecSRITL1;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbstudentofclassspecSRITL1=nbstudentofclassspec($idanac,'SRIT','L1',$bdd);echo $nbstudentofclassspecSRITL1;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanse2SRITL1=nbpresentanse2($idanac,'SRIT','L1',$bdd);echo $nbpresentanse2SRITL1 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanse2SRITL1=nbadmissupzfanse2($idanac,'SRIT','L1',$bdd); echo $nbadmissupzfanse2SRITL1 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzganse2sSRITL1=nbadmissupzganse2($idanac,'SRIT','L1',$bdd); echo $nbadmissupzganse2sSRITL1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanse2SRITL1=nbadmissupzanse2($idanac,'SRIT','L1',$bdd); echo $nbadmissupzanse2SRITL1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzSRITL1= number_format((nbadmissupzanse2($idanac,'SRIT','L1',$bdd)*100)/nbpresentanse2($idanac,'SRIT','L1',$bdd),2); echo $pourcentsupzSRITL1;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanse2SRITL1=nbadmisinfdfanse2($idanac,'SRIT','L1',$bdd); echo $nbadmisinfdfanse2SRITL1 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganse2SRITL1=nbadmisinfdganse2($idanac,'SRIT','L1',$bdd); echo    $nbadmisinfdganse2SRITL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanse2SRITL1=nbadmisinfdanse2($idanac,'SRIT','L1',$bdd); echo   $nbadmisinfdanse2SRITL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdSRITL1= number_format((nbadmisinfdanse2($idanac,'SRIT','L1',$bdd)*100)/nbpresentanse2($idanac,'SRIT','L1',$bdd),2); echo $pourcentinfdSRITL1;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanse2SRITL1=nbadmissupdixfanse2($idanac,'SRIT','L1',$bdd); echo   $nbadmissupdixfanse2SRITL1


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganse2SRITL1=nbadmissupdixganse2($idanac,'SRIT','L1',$bdd); echo   $nbadmissupdixganse2SRITL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanse2SRITL1=nbadmissupdixanse2($idanac,'SRIT','L1',$bdd); echo   $nbadmissupdixanse2SRITL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixSRITL1= number_format((nbadmissupdixanse2($idanac,'SRIT','L1',$bdd)*100)/nbpresentanse2($idanac,'SRIT','L1',$bdd),2); echo $pourcentsupdixSRITL1;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanse2SRITL1=nbadmisdecisfanse2($idanac,'SRIT','L1',$bdd); echo   $nbadmisdecisfanse2SRITL1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganse2SRITL1=nbadmisdecisganse2($idanac,'SRIT','L1',$bdd); echo     $nbadmisdecisganse2SRITL1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanse2SRITL1=nbadmisdecisanse2($idanac,'SRIT','L1',$bdd); echo       $nbadmisdecisanse2SRITL1;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisSRITL1= number_format((nbadmisdecisanse2($idanac,'SRIT','L1',$bdd)*100)/nbpresentanse2($idanac,'SRIT','L1',$bdd),2); echo $pourcentdecisSRITL1;?></td>


        </tr>



        <tr>




            <td style="text-align: center; border: solid 1px black; ">  RTEL </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbstudentfofclassspecRTELL1=nbstudentfofclassspec($idanac,'RTEL','L1',$bdd); echo $nbstudentfofclassspecRTELL1 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbstudentgofclassspecRTELL1=nbstudentgofclassspec($idanac,'RTEL','L1',$bdd); echo $nbstudentgofclassspecRTELL1;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbstudentofclassspecRTELL1=nbstudentofclassspec($idanac,'RTEL','L1',$bdd);echo $nbstudentofclassspecRTELL1;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanse2RTELL1=nbpresentanse2($idanac,'RTEL','L1',$bdd);echo $nbpresentanse2RTELL1 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanse2RTELL1=nbadmissupzfanse2($idanac,'RTEL','L1',$bdd); echo $nbadmissupzfanse2RTELL1 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzganse2sRTELL1=nbadmissupzganse2($idanac,'RTEL','L1',$bdd); echo $nbadmissupzganse2sRTELL1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanse2RTELL1=nbadmissupzanse2($idanac,'RTEL','L1',$bdd); echo $nbadmissupzanse2RTELL1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzRTELL1= number_format((nbadmissupzanse2($idanac,'RTEL','L1',$bdd)*100)/nbpresentanse2($idanac,'RTEL','L1',$bdd),2); echo $pourcentsupzRTELL1;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanse2RTELL1=nbadmisinfdfanse2($idanac,'RTEL','L1',$bdd); echo $nbadmisinfdfanse2RTELL1 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganse2RTELL1=nbadmisinfdganse2($idanac,'RTEL','L1',$bdd); echo    $nbadmisinfdganse2RTELL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanse2RTELL1=nbadmisinfdanse2($idanac,'RTEL','L1',$bdd); echo   $nbadmisinfdanse2RTELL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdRTELL1= number_format((nbadmisinfdanse2($idanac,'RTEL','L1',$bdd)*100)/nbpresentanse2($idanac,'RTEL','L1',$bdd),2); echo $pourcentinfdRTELL1;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanse2RTELL1=nbadmissupdixfanse2($idanac,'RTEL','L1',$bdd); echo   $nbadmissupdixfanse2RTELL1


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganse2RTELL1=nbadmissupdixganse2($idanac,'RTEL','L1',$bdd); echo   $nbadmissupdixganse2RTELL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanse2RTELL1=nbadmissupdixanse2($idanac,'RTEL','L1',$bdd); echo   $nbadmissupdixanse2RTELL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixRTELL1= number_format((nbadmissupdixanse2($idanac,'RTEL','L1',$bdd)*100)/nbpresentanse2($idanac,'RTEL','L1',$bdd),2); echo $pourcentsupdixRTELL1;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanse2RTELL1=nbadmisdecisfanse2($idanac,'RTEL','L1',$bdd); echo   $nbadmisdecisfanse2RTELL1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganse2RTELL1=nbadmisdecisganse2($idanac,'RTEL','L1',$bdd); echo     $nbadmisdecisganse2RTELL1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanse2RTELL1=nbadmisdecisanse2($idanac,'RTEL','L1',$bdd); echo       $nbadmisdecisanse2RTELL1;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisRTELL1= number_format((nbadmisdecisanse2($idanac,'RTEL','L1',$bdd)*100)/nbpresentanse2($idanac,'RTEL','L1',$bdd),2); echo $pourcentdecisRTELL1;?></td>


        </tr>

        <tr>




            <td style="text-align: center; border: solid 1px black; ">  SIGL </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbstudentfofclassspecSIGLL1=nbstudentfofclassspec($idanac,'SIGL','L1',$bdd); echo $nbstudentfofclassspecSIGLL1 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbstudentgofclassspecSIGLL1=nbstudentgofclassspec($idanac,'SIGL','L1',$bdd); echo $nbstudentgofclassspecSIGLL1;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbstudentofclassspecSIGLL1=nbstudentofclassspec($idanac,'SIGL','L1',$bdd);echo $nbstudentofclassspecSIGLL1;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanse2SIGLL1=nbpresentanse2($idanac,'SIGL','L1',$bdd);echo $nbpresentanse2SIGLL1 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanse2SIGLL1=nbadmissupzfanse2($idanac,'SIGL','L1',$bdd); echo $nbadmissupzfanse2SIGLL1 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzganse2sSIGLL1=nbadmissupzganse2($idanac,'SIGL','L1',$bdd); echo $nbadmissupzganse2sSIGLL1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanse2SIGLL1=nbadmissupzanse2($idanac,'SIGL','L1',$bdd); echo $nbadmissupzanse2SIGLL1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzSIGLL1= number_format((nbadmissupzanse2($idanac,'SIGL','L1',$bdd)*100)/nbpresentanse2($idanac,'SIGL','L1',$bdd),2); echo $pourcentsupzSIGLL1;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanse2SIGLL1=nbadmisinfdfanse2($idanac,'SIGL','L1',$bdd); echo $nbadmisinfdfanse2SIGLL1 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganse2SIGLL1=nbadmisinfdganse2($idanac,'SIGL','L1',$bdd); echo    $nbadmisinfdganse2SIGLL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanse2SIGLL1=nbadmisinfdanse2($idanac,'SIGL','L1',$bdd); echo   $nbadmisinfdanse2SIGLL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdSIGLL1= number_format((nbadmisinfdanse2($idanac,'SIGL','L1',$bdd)*100)/nbpresentanse2($idanac,'SIGL','L1',$bdd),2); echo $pourcentinfdSIGLL1;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanse2SIGLL1=nbadmissupdixfanse2($idanac,'SIGL','L1',$bdd); echo   $nbadmissupdixfanse2SIGLL1


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganse2SIGLL1=nbadmissupdixganse2($idanac,'SIGL','L1',$bdd); echo   $nbadmissupdixganse2SIGLL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanse2SIGLL1=nbadmissupdixanse2($idanac,'SIGL','L1',$bdd); echo   $nbadmissupdixanse2SIGLL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixSIGLL1= number_format((nbadmissupdixanse2($idanac,'SIGL','L1',$bdd)*100)/nbpresentanse2($idanac,'SIGL','L1',$bdd),2); echo $pourcentsupdixSIGLL1;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanse2SIGLL1=nbadmisdecisfanse2($idanac,'SIGL','L1',$bdd); echo   $nbadmisdecisfanse2SIGLL1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganse2SIGLL1=nbadmisdecisganse2($idanac,'SIGL','L1',$bdd); echo     $nbadmisdecisganse2SIGLL1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanse2SIGLL1=nbadmisdecisanse2($idanac,'SIGL','L1',$bdd); echo       $nbadmisdecisanse2SIGLL1;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisSIGLL1= number_format((nbadmisdecisanse2($idanac,'SIGL','L1',$bdd)*100)/nbpresentanse2($idanac,'SIGL','L1',$bdd),2); echo $pourcentdecisSIGLL1;?></td>


        </tr>
        <tr>




            <td style="text-align: center; border: solid 1px black; ">  TWIN </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbstudentfofclassspecTWINL1=nbstudentfofclassspec($idanac,'TWIN','L1',$bdd); echo $nbstudentfofclassspecTWINL1 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbstudentgofclassspecTWINL1=nbstudentgofclassspec($idanac,'TWIN','L1',$bdd); echo $nbstudentgofclassspecTWINL1;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbstudentofclassspecTWINL1=nbstudentofclassspec($idanac,'TWIN','L1',$bdd);echo $nbstudentofclassspecTWINL1;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanse2TWINL1=nbpresentanse2($idanac,'TWIN','L1',$bdd);echo $nbpresentanse2TWINL1 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanse2TWINL1=nbadmissupzfanse2($idanac,'TWIN','L1',$bdd); echo $nbadmissupzfanse2TWINL1 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzganse2sTWINL1=nbadmissupzganse2($idanac,'TWIN','L1',$bdd); echo $nbadmissupzganse2sTWINL1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanse2TWINL1=nbadmissupzanse2($idanac,'TWIN','L1',$bdd); echo $nbadmissupzanse2TWINL1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzTWINL1= number_format((nbadmissupzanse2($idanac,'TWIN','L1',$bdd)*100)/nbpresentanse2($idanac,'TWIN','L1',$bdd),2); echo $pourcentsupzTWINL1;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanse2TWINL1=nbadmisinfdfanse2($idanac,'TWIN','L1',$bdd); echo $nbadmisinfdfanse2TWINL1 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganse2TWINL1=nbadmisinfdganse2($idanac,'TWIN','L1',$bdd); echo    $nbadmisinfdganse2TWINL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanse2TWINL1=nbadmisinfdanse2($idanac,'TWIN','L1',$bdd); echo   $nbadmisinfdanse2TWINL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdTWINL1= number_format((nbadmisinfdanse2($idanac,'TWIN','L1',$bdd)*100)/nbpresentanse2($idanac,'TWIN','L1',$bdd),2); echo $pourcentinfdTWINL1;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanse2TWINL1=nbadmissupdixfanse2($idanac,'TWIN','L1',$bdd); echo   $nbadmissupdixfanse2TWINL1


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganse2TWINL1=nbadmissupdixganse2($idanac,'TWIN','L1',$bdd); echo   $nbadmissupdixganse2TWINL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanse2TWINL1=nbadmissupdixanse2($idanac,'TWIN','L1',$bdd); echo   $nbadmissupdixanse2TWINL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixTWINL1= number_format((nbadmissupdixanse2($idanac,'TWIN','L1',$bdd)*100)/nbpresentanse2($idanac,'TWIN','L1',$bdd),2); echo $pourcentsupdixTWINL1;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanse2TWINL1=nbadmisdecisfanse2($idanac,'TWIN','L1',$bdd); echo   $nbadmisdecisfanse2TWINL1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganse2TWINL1=nbadmisdecisganse2($idanac,'TWIN','L1',$bdd); echo     $nbadmisdecisganse2TWINL1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanse2TWINL1=nbadmisdecisanse2($idanac,'TWIN','L1',$bdd); echo       $nbadmisdecisanse2TWINL1;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisTWINL1= number_format((nbadmisdecisanse2($idanac,'TWIN','L1',$bdd)*100)/nbpresentanse2($idanac,'TWIN','L1',$bdd),2); echo $pourcentdecisTWINL1;?></td>


        </tr>
        <tr>




            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ;" height="20px;" colspan="2" >  <strong>TOTAL</strong></td>


            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbstudentfofclassspecL1=$nbstudentfofclassspecSRITL1 + $nbstudentfofclassspecTWINL1 + $nbstudentfofclassspecSIGLL1 +  $nbstudentfofclassspecRTELL1; echo $nbstudentfofclassspecL1;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbstudentgofclassspecL1=$nbstudentgofclassspecSRITL1 +$nbstudentgofclassspecTWINL1  +$nbstudentgofclassspecSIGLL1  +$nbstudentgofclassspecRTELL1;echo $nbstudentgofclassspecL1;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbstudentofclassspecL1=$nbstudentofclassspecSRITL1 + $nbstudentofclassspecTWINL1 + $nbstudentofclassspecSIGLL1 + $nbstudentofclassspecRTELL1; echo $nbstudentofclassspecL1;?></td>


            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbpresentL1= $nbpresentanse2SRITL1 + $nbpresentanse2TWINL1  + $nbpresentanse2SIGLL1  + $nbpresentanse2RTELL1; echo $nbpresentL1 ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzfL1=$nbadmissupzfanse2SRITL1 + $nbadmissupzfanse2TWINL1 + $nbadmissupzfanse2SIGLL1 + $nbadmissupzfanse2RTELL1; echo $nbadmissupzfL1; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzgL1=$nbadmissupzganse2sSRITL1 + $nbadmissupzganse2sTWINL1 + $nbadmissupzganse2sSIGLL1 + $nbadmissupzganse2sRTELL1;echo $nbadmissupzgL1; ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbadmissupzL1=$nbadmissupzanse2TWINL1 + $nbadmissupzanse2SRITL1 + $nbadmissupzanse2SIGLL1 + $nbadmissupzanse2RTELL1; echo $nbadmissupzL1 ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php  $pourcentsupzL1= number_format((($nbadmissupzL1*100)/$nbpresentL1),2); echo $pourcentsupzL1;?></td>



            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmisinfdfL1=$nbadmisinfdfanse2SRITL1 + $nbadmisinfdfanse2TWINL1  + $nbadmisinfdfanse2SIGLL1 + $nbadmisinfdfanse2RTELL1;echo $nbadmisinfdfL1; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $nbadmisinfdgL1=$nbadmisinfdganse2SRITL1 + $nbadmisinfdganse2TWINL1 + $nbadmisinfdganse2SIGLL1 + $nbadmisinfdganse2RTELL1;echo $nbadmisinfdgL1; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisinfdL1=$nbadmisinfdanse2SRITL1 + $nbadmisinfdanse2TWINL1 + $nbadmisinfdanse2SIGLL1 + $nbadmisinfdanse2RTELL1; echo $nbadmisinfdL1; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentinfdL1= number_format((($nbadmisinfdL1*100)/$nbpresentL1),2); echo $pourcentinfdL1;?></td>





            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupdixfL1=$nbadmissupdixfanse2SRITL1 + $nbadmissupdixfanse2TWINL1 + $nbadmissupdixfanse2SIGLL1 + $nbadmissupdixfanse2RTELL1 ; echo $nbadmissupdixfL1 ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmissupdixgL1 = $nbadmissupdixganse2SRITL1 + $nbadmissupdixganse2TWINL1  + $nbadmissupdixganse2SIGLL1  + $nbadmissupdixganse2RTELL1; echo $nbadmissupdixgL1 ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php $nbadmissupdixL1 = $nbadmissupdixanse2SRITL1 + $nbadmissupdixanse2TWINL1 + $nbadmissupdixanse2SIGLL1 + $nbadmissupdixanse2RTELL1; echo $nbadmissupdixL1; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentsupdixL1= number_format((($nbadmissupdixL1*100)/$nbpresentL1),2); echo $pourcentsupdixL1;?></td>

            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisdecisfL1=$nbadmisdecisfanse2SRITL1 + $nbadmisdecisfanse2TWINL1 + $nbadmisdecisfanse2SIGLL1 + $nbadmisdecisfanse2RTELL1 ; echo $nbadmisdecisfL1; ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbadmisdecisgL1= $nbadmisdecisganse2SRITL1 + $nbadmisdecisganse2TWINL1  + $nbadmisdecisganse2SIGLL1  + $nbadmisdecisganse2RTELL1;echo $nbadmisdecisgL1; ?></td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmisdecisL1= $nbadmisdecisanse2SRITL1 + $nbadmisdecisanse2TWINL1 + $nbadmisdecisanse2SIGLL1 + $nbadmisdecisanse2RTELL1; echo $nbadmisdecisL1; ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentdecisL1= number_format((($nbadmisdecisL1*100)/$nbpresentL1),2); echo $pourcentdecisL1;?></td>


        </tr>


        <tr>



            <td style="text-align: center; border: solid 1px black; "  rowspan="4"> <strong>LICENCE 2</strong></td>
            <td style="text-align: center; border: solid 1px black; ">  SRIT </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbstudentfofclassspecSRITL2=nbstudentfofclassspec($idanac,'SRIT','L2',$bdd); echo $nbstudentfofclassspecSRITL2 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbstudentgofclassspecSRITL2=nbstudentgofclassspec($idanac,'SRIT','L2',$bdd); echo $nbstudentgofclassspecSRITL2;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbstudentofclassspecSRITL2=nbstudentofclassspec($idanac,'SRIT','L2',$bdd);echo $nbstudentofclassspecSRITL2;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanse2SRITL2=nbpresentanse2($idanac,'SRIT','L2',$bdd);echo $nbpresentanse2SRITL2 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanse2SRITL2=nbadmissupzfanse2($idanac,'SRIT','L2',$bdd); echo $nbadmissupzfanse2SRITL2 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzganse2sSRITL2=nbadmissupzganse2($idanac,'SRIT','L2',$bdd); echo $nbadmissupzganse2sSRITL2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanse2SRITL2=nbadmissupzanse2($idanac,'SRIT','L2',$bdd); echo $nbadmissupzanse2SRITL2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzSRITL2= number_format((nbadmissupzanse2($idanac,'SRIT','L2',$bdd)*100)/nbpresentanse2($idanac,'SRIT','L2',$bdd),2); echo $pourcentsupzSRITL2;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanse2SRITL2=nbadmisinfdfanse2($idanac,'SRIT','L2',$bdd); echo $nbadmisinfdfanse2SRITL2 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganse2SRITL2=nbadmisinfdganse2($idanac,'SRIT','L2',$bdd); echo    $nbadmisinfdganse2SRITL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanse2SRITL2=nbadmisinfdanse2($idanac,'SRIT','L2',$bdd); echo   $nbadmisinfdanse2SRITL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdSRITL2= number_format((nbadmisinfdanse2($idanac,'SRIT','L2',$bdd)*100)/nbpresentanse2($idanac,'SRIT','L2',$bdd),2); echo $pourcentinfdSRITL2;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanse2SRITL2=nbadmissupdixfanse2($idanac,'SRIT','L2',$bdd); echo   $nbadmissupdixfanse2SRITL2


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganse2SRITL2=nbadmissupdixganse2($idanac,'SRIT','L2',$bdd); echo   $nbadmissupdixganse2SRITL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanse2SRITL2=nbadmissupdixanse2($idanac,'SRIT','L2',$bdd); echo   $nbadmissupdixanse2SRITL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixSRITL2= number_format((nbadmissupdixanse2($idanac,'SRIT','L2',$bdd)*100)/nbpresentanse2($idanac,'SRIT','L2',$bdd),2); echo $pourcentsupdixSRITL2;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanse2SRITL2=nbadmisdecisfanse2($idanac,'SRIT','L2',$bdd); echo   $nbadmisdecisfanse2SRITL2;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganse2SRITL2=nbadmisdecisganse2($idanac,'SRIT','L2',$bdd); echo     $nbadmisdecisganse2SRITL2;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanse2SRITL2=nbadmisdecisanse2($idanac,'SRIT','L2',$bdd); echo       $nbadmisdecisanse2SRITL2;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisSRITL2= number_format((nbadmisdecisanse2($idanac,'SRIT','L2',$bdd)*100)/nbpresentanse2($idanac,'SRIT','L2',$bdd),2); echo $pourcentdecisSRITL2;?></td>


        </tr>

        <tr>



            <td style="text-align: center; border: solid 1px black; ">  RTEL </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbstudentfofclassspecRTELL2=nbstudentfofclassspec($idanac,'RTEL','L2',$bdd); echo $nbstudentfofclassspecRTELL2 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbstudentgofclassspecRTELL2=nbstudentgofclassspec($idanac,'RTEL','L2',$bdd); echo $nbstudentgofclassspecRTELL2;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbstudentofclassspecRTELL2=nbstudentofclassspec($idanac,'RTEL','L2',$bdd);echo $nbstudentofclassspecRTELL2;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanse2RTELL2=nbpresentanse2($idanac,'RTEL','L2',$bdd);echo $nbpresentanse2RTELL2 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanse2RTELL2=nbadmissupzfanse2($idanac,'RTEL','L2',$bdd); echo $nbadmissupzfanse2RTELL2 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzganse2sRTELL2=nbadmissupzganse2($idanac,'RTEL','L2',$bdd); echo $nbadmissupzganse2sRTELL2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanse2RTELL2=nbadmissupzanse2($idanac,'RTEL','L2',$bdd); echo $nbadmissupzanse2RTELL2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzRTELL2= number_format((nbadmissupzanse2($idanac,'RTEL','L2',$bdd)*100)/nbpresentanse2($idanac,'RTEL','L2',$bdd),2); echo $pourcentsupzRTELL2;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanse2RTELL2=nbadmisinfdfanse2($idanac,'RTEL','L2',$bdd); echo $nbadmisinfdfanse2RTELL2 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganse2RTELL2=nbadmisinfdganse2($idanac,'RTEL','L2',$bdd); echo    $nbadmisinfdganse2RTELL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanse2RTELL2=nbadmisinfdanse2($idanac,'RTEL','L2',$bdd); echo   $nbadmisinfdanse2RTELL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdRTELL2= number_format((nbadmisinfdanse2($idanac,'RTEL','L2',$bdd)*100)/nbpresentanse2($idanac,'RTEL','L2',$bdd),2); echo $pourcentinfdRTELL2;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanse2RTELL2=nbadmissupdixfanse2($idanac,'RTEL','L2',$bdd); echo   $nbadmissupdixfanse2RTELL2


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganse2RTELL2=nbadmissupdixganse2($idanac,'RTEL','L2',$bdd); echo   $nbadmissupdixganse2RTELL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanse2RTELL2=nbadmissupdixanse2($idanac,'RTEL','L2',$bdd); echo   $nbadmissupdixanse2RTELL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixRTELL2= number_format((nbadmissupdixanse2($idanac,'RTEL','L2',$bdd)*100)/nbpresentanse2($idanac,'RTEL','L2',$bdd),2); echo $pourcentsupdixRTELL2;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanse2RTELL2=nbadmisdecisfanse2($idanac,'RTEL','L2',$bdd); echo   $nbadmisdecisfanse2RTELL2;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganse2RTELL2=nbadmisdecisganse2($idanac,'RTEL','L2',$bdd); echo     $nbadmisdecisganse2RTELL2;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanse2RTELL2=nbadmisdecisanse2($idanac,'RTEL','L2',$bdd); echo       $nbadmisdecisanse2RTELL2;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisRTELL2= number_format((nbadmisdecisanse2($idanac,'RTEL','L2',$bdd)*100)/nbpresentanse2($idanac,'RTEL','L2',$bdd),2); echo $pourcentdecisRTELL2;?></td>


        </tr>
        <tr>




            <td style="text-align: center; border: solid 1px black; ">  SIGL </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbstudentfofclassspecSIGLL2=nbstudentfofclassspec($idanac,'SIGL','L2',$bdd); echo $nbstudentfofclassspecSIGLL2 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbstudentgofclassspecSIGLL2=nbstudentgofclassspec($idanac,'SIGL','L2',$bdd); echo $nbstudentgofclassspecSIGLL2;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbstudentofclassspecSIGLL2=nbstudentofclassspec($idanac,'SIGL','L2',$bdd);echo $nbstudentofclassspecSIGLL2;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanse2SIGLL2=nbpresentanse2($idanac,'SIGL','L2',$bdd);echo $nbpresentanse2SIGLL2 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanse2SIGLL2=nbadmissupzfanse2($idanac,'SIGL','L2',$bdd); echo $nbadmissupzfanse2SIGLL2 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzganse2sSIGLL2=nbadmissupzganse2($idanac,'SIGL','L2',$bdd); echo $nbadmissupzganse2sSIGLL2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanse2SIGLL2=nbadmissupzanse2($idanac,'SIGL','L2',$bdd); echo $nbadmissupzanse2SIGLL2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzSIGLL2= number_format((nbadmissupzanse2($idanac,'SIGL','L2',$bdd)*100)/nbpresentanse2($idanac,'SIGL','L2',$bdd),2); echo $pourcentsupzSIGLL2;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanse2SIGLL2=nbadmisinfdfanse2($idanac,'SIGL','L2',$bdd); echo $nbadmisinfdfanse2SIGLL2 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganse2SIGLL2=nbadmisinfdganse2($idanac,'SIGL','L2',$bdd); echo    $nbadmisinfdganse2SIGLL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanse2SIGLL2=nbadmisinfdanse2($idanac,'SIGL','L2',$bdd); echo   $nbadmisinfdanse2SIGLL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdSIGLL2= number_format((nbadmisinfdanse2($idanac,'SIGL','L2',$bdd)*100)/nbpresentanse2($idanac,'SIGL','L2',$bdd),2); echo $pourcentinfdSIGLL2;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanse2SIGLL2=nbadmissupdixfanse2($idanac,'SIGL','L2',$bdd); echo   $nbadmissupdixfanse2SIGLL2


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganse2SIGLL2=nbadmissupdixganse2($idanac,'SIGL','L2',$bdd); echo   $nbadmissupdixganse2SIGLL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanse2SIGLL2=nbadmissupdixanse2($idanac,'SIGL','L2',$bdd); echo   $nbadmissupdixanse2SIGLL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixSIGLL2= number_format((nbadmissupdixanse2($idanac,'SIGL','L2',$bdd)*100)/nbpresentanse2($idanac,'SIGL','L2',$bdd),2); echo $pourcentsupdixSIGLL2;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanse2SIGLL2=nbadmisdecisfanse2($idanac,'SIGL','L2',$bdd); echo   $nbadmisdecisfanse2SIGLL2;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganse2SIGLL2=nbadmisdecisganse2($idanac,'SIGL','L2',$bdd); echo     $nbadmisdecisganse2SIGLL2;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanse2SIGLL2=nbadmisdecisanse2($idanac,'SIGL','L2',$bdd); echo       $nbadmisdecisanse2SIGLL2;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisSIGLL2= number_format((nbadmisdecisanse2($idanac,'SIGL','L2',$bdd)*100)/nbpresentanse2($idanac,'SIGL','L2',$bdd),2); echo $pourcentdecisSIGLL2;?></td>


        </tr>


        <tr>




            <td style="text-align: center; border: solid 1px black; ">  TWIN </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbstudentfofclassspecTWINL2=nbstudentfofclassspec($idanac,'TWIN','L2',$bdd); echo $nbstudentfofclassspecTWINL2 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbstudentgofclassspecTWINL2=nbstudentgofclassspec($idanac,'TWIN','L2',$bdd); echo $nbstudentgofclassspecTWINL2;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbstudentofclassspecTWINL2=nbstudentofclassspec($idanac,'TWIN','L2',$bdd);echo $nbstudentofclassspecTWINL2;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanse2TWINL2=nbpresentanse2($idanac,'TWIN','L2',$bdd);echo $nbpresentanse2TWINL2 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanse2TWINL2=nbadmissupzfanse2($idanac,'TWIN','L2',$bdd); echo $nbadmissupzfanse2TWINL2 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzganse2sTWINL2=nbadmissupzganse2($idanac,'TWIN','L2',$bdd); echo $nbadmissupzganse2sTWINL2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanse2TWINL2=nbadmissupzanse2($idanac,'TWIN','L2',$bdd); echo $nbadmissupzanse2TWINL2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzTWINL2= number_format((nbadmissupzanse2($idanac,'TWIN','L2',$bdd)*100)/nbpresentanse2($idanac,'TWIN','L2',$bdd),2); echo $pourcentsupzTWINL2;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanse2TWINL2=nbadmisinfdfanse2($idanac,'TWIN','L2',$bdd); echo $nbadmisinfdfanse2TWINL2 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganse2TWINL2=nbadmisinfdganse2($idanac,'TWIN','L2',$bdd); echo    $nbadmisinfdganse2TWINL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanse2TWINL2=nbadmisinfdanse2($idanac,'TWIN','L2',$bdd); echo   $nbadmisinfdanse2TWINL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdTWINL2= number_format((nbadmisinfdanse2($idanac,'TWIN','L2',$bdd)*100)/nbpresentanse2($idanac,'TWIN','L2',$bdd),2); echo $pourcentinfdTWINL2;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanse2TWINL2=nbadmissupdixfanse2($idanac,'TWIN','L2',$bdd); echo   $nbadmissupdixfanse2TWINL2


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganse2TWINL2=nbadmissupdixganse2($idanac,'TWIN','L2',$bdd); echo   $nbadmissupdixganse2TWINL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanse2TWINL2=nbadmissupdixanse2($idanac,'TWIN','L2',$bdd); echo   $nbadmissupdixanse2TWINL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixTWINL2= number_format((nbadmissupdixanse2($idanac,'TWIN','L2',$bdd)*100)/nbpresentanse2($idanac,'TWIN','L2',$bdd),2); echo $pourcentsupdixTWINL2;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanse2TWINL2=nbadmisdecisfanse2($idanac,'TWIN','L2',$bdd); echo   $nbadmisdecisfanse2TWINL2;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganse2TWINL2=nbadmisdecisganse2($idanac,'TWIN','L2',$bdd); echo     $nbadmisdecisganse2TWINL2;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanse2TWINL2=nbadmisdecisanse2($idanac,'TWIN','L2',$bdd); echo       $nbadmisdecisanse2TWINL2;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisTWINL2= number_format((nbadmisdecisanse2($idanac,'TWIN','L2',$bdd)*100)/nbpresentanse2($idanac,'TWIN','L2',$bdd),2); echo $pourcentdecisTWINL2;?></td>


        </tr>
        <tr>




            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ;" height="20px;"  colspan="2">  <strong>TOTAL</strong></td>


            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbstudentfofclassspecL2=$nbstudentfofclassspecSRITL2+$nbstudentfofclassspecRTELL2 +$nbstudentfofclassspecSIGLL2 +$nbstudentfofclassspecTWINL2 ; echo $nbstudentfofclassspecL2;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbstudentgofclassspecL2=$nbstudentgofclassspecSRITL2 + $nbstudentgofclassspecRTELL2+ $nbstudentgofclassspecSIGLL2 + $nbstudentgofclassspecTWINL2 ;echo $nbstudentgofclassspecL2;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbstudentofclassspecL2=$nbstudentofclassspecSRITL2 + $nbstudentofclassspecRTELL2 + $nbstudentofclassspecSIGLL2  + $nbstudentofclassspecTWINL2; echo $nbstudentofclassspecL2;?></td>


            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbpresentL2= $nbpresentanse2SRITL2+$nbpresentanse2RTELL2 +$nbpresentanse2SIGLL2 +$nbpresentanse2TWINL2; echo $nbpresentL2 ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzfL2=$nbadmissupzfanse2SRITL2+$nbadmissupzfanse2RTELL2+$nbadmissupzfanse2SIGLL2 +$nbadmissupzfanse2TWINL2; echo $nbadmissupzfL2; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzgL2=$nbadmissupzganse2sSRITL2 + $nbadmissupzganse2sRTELL2  + $nbadmissupzganse2sSIGLL2  + $nbadmissupzganse2sTWINL2;echo $nbadmissupzgL2; ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbadmissupzL2=$nbadmissupzanse2RTELL2 + $nbadmissupzanse2SRITL2 + $nbadmissupzanse2SIGLL2 + $nbadmissupzanse2TWINL2; echo $nbadmissupzL2 ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php  $pourcentsupzL2= number_format((($nbadmissupzL2*100)/$nbpresentL2),2); echo $pourcentsupzL2;?></td>



            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmisinfdfL2=$nbadmisinfdfanse2SRITL2+$nbadmisinfdfanse2RTELL2 +$nbadmisinfdfanse2SIGLL2 +$nbadmisinfdfanse2TWINL2;echo $nbadmisinfdfL2; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $nbadmisinfdgL2=$nbadmisinfdganse2SRITL2 + $nbadmisinfdganse2RTELL2+ $nbadmisinfdganse2SIGLL2 + $nbadmisinfdganse2TWINL2;echo $nbadmisinfdgL2; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisinfdL2=$nbadmisinfdanse2SRITL2+ $nbadmisinfdanse2RTELL2 + $nbadmisinfdanse2SIGLL2 + $nbadmisinfdanse2TWINL2; echo $nbadmisinfdL2; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentinfdL2= number_format((($nbadmisinfdL2*100)/$nbpresentL2),2); echo $pourcentinfdL2;?></td>





            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupdixfL2=$nbadmissupdixfanse2SRITL2+$nbadmissupdixfanse2RTELL2+$nbadmissupdixfanse2SIGLL2 +$nbadmissupdixfanse2TWINL2; echo $nbadmissupdixfL2 ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmissupdixgL2 = $nbadmissupdixganse2SRITL2 + $nbadmissupdixganse2RTELL2+ $nbadmissupdixganse2SIGLL2 + $nbadmissupdixganse2TWINL2; echo $nbadmissupdixgL2 ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php $nbadmissupdixL2 = $nbadmissupdixanse2SRITL2 + $nbadmissupdixanse2RTELL2 + $nbadmissupdixanse2SIGLL2 + $nbadmissupdixanse2TWINL2; echo $nbadmissupdixL2; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentsupdixL2= number_format((($nbadmissupdixL2*100)/$nbpresentL2),2); echo $pourcentsupdixL2;?></td>

            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisdecisfL2=$nbadmisdecisfanse2SRITL2 + $nbadmisdecisfanse2RTELL2 + $nbadmisdecisfanse2SIGLL2 + $nbadmisdecisfanse2TWINL2; echo $nbadmisdecisfL2; ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbadmisdecisgL2= $nbadmisdecisganse2SRITL2 + $nbadmisdecisganse2RTELL2  + $nbadmisdecisganse2SIGLL2  + $nbadmisdecisganse2TWINL2;echo $nbadmisdecisgL2; ?></td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmisdecisL2= $nbadmisdecisanse2SRITL2 + $nbadmisdecisanse2RTELL2 + $nbadmisdecisanse2SIGLL2 + $nbadmisdecisanse2TWINL2; echo $nbadmisdecisL2; ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentdecisL2= number_format((($nbadmisdecisL2*100)/$nbpresentL2),2); echo $pourcentdecisL2;?></td>


        </tr>




        <tr>



            <td style="text-align: center; border: solid 1px black; "  rowspan="3"> <strong>LICENCE 3</strong></td>
            <td style="text-align: center; border: solid 1px black; ">  SRIT </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbstudentfofclassspecSRITL3=nbstudentfofclassspec($idanac,'SRIT','L3',$bdd); echo $nbstudentfofclassspecSRITL3 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbstudentgofclassspecSRITL3=nbstudentgofclassspec($idanac,'SRIT','L3',$bdd); echo $nbstudentgofclassspecSRITL3;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbstudentofclassspecSRITL3=nbstudentofclassspec($idanac,'SRIT','L3',$bdd);echo $nbstudentofclassspecSRITL3;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanse2SRITL3=nbpresentanse2($idanac,'SRIT','L3',$bdd);echo $nbpresentanse2SRITL3 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanse2SRITL3=nbadmissupzfanse2($idanac,'SRIT','L3',$bdd); echo $nbadmissupzfanse2SRITL3 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzganse2sSRITL3=nbadmissupzganse2($idanac,'SRIT','L3',$bdd); echo $nbadmissupzganse2sSRITL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanse2SRITL3=nbadmissupzanse2($idanac,'SRIT','L3',$bdd); echo $nbadmissupzanse2SRITL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzSRITL3= number_format((nbadmissupzanse2($idanac,'SRIT','L3',$bdd)*100)/nbpresentanse2($idanac,'SRIT','L3',$bdd),2); echo $pourcentsupzSRITL3;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanse2SRITL3=nbadmisinfdfanse2($idanac,'SRIT','L3',$bdd); echo $nbadmisinfdfanse2SRITL3 ;



        ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
        $nbadmisinfdganse2SRITL3=nbadmisinfdganse2($idanac,'SRIT','L3',$bdd); echo    $nbadmisinfdganse2SRITL3;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanse2SRITL3=nbadmisinfdanse2($idanac,'SRIT','L3',$bdd); echo   $nbadmisinfdanse2SRITL3;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdSRITL3= number_format((nbadmisinfdanse2($idanac,'SRIT','L3',$bdd)*100)/nbpresentanse2($idanac,'SRIT','L3',$bdd),2); echo $pourcentinfdSRITL3;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

        $nbadmissupdixfanse2SRITL3=nbadmissupdixfanse2($idanac,'SRIT','L3',$bdd); echo   $nbadmissupdixfanse2SRITL3


        ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

        $nbadmissupdixganse2SRITL3=nbadmissupdixganse2($idanac,'SRIT','L3',$bdd); echo   $nbadmissupdixganse2SRITL3;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
        $nbadmissupdixanse2SRITL3=nbadmissupdixanse2($idanac,'SRIT','L3',$bdd); echo   $nbadmissupdixanse2SRITL3;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixSRITL3= number_format((nbadmissupdixanse2($idanac,'SRIT','L3',$bdd)*100)/nbpresentanse2($idanac,'SRIT','L3',$bdd),2); echo $pourcentsupdixSRITL3;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

        $nbadmisdecisfanse2SRITL3=nbadmisdecisfanse2($idanac,'SRIT','L3',$bdd); echo   $nbadmisdecisfanse2SRITL3;

        ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


        $nbadmisdecisganse2SRITL3=nbadmisdecisganse2($idanac,'SRIT','L3',$bdd); echo     $nbadmisdecisganse2SRITL3;

        ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

        $nbadmisdecisanse2SRITL3=nbadmisdecisanse2($idanac,'SRIT','L3',$bdd); echo       $nbadmisdecisanse2SRITL3;



        ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisSRITL3= number_format((nbadmisdecisanse2($idanac,'SRIT','L3',$bdd)*100)/nbpresentanse2($idanac,'SRIT','L3',$bdd),2); echo $pourcentdecisSRITL3;?></td>


        </tr>

        <tr>



            <td style="text-align: center; border: solid 1px black; ">  RTEL </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbstudentfofclassspecRTELL3=nbstudentfofclassspec($idanac,'RTEL','L3',$bdd); echo $nbstudentfofclassspecRTELL3 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbstudentgofclassspecRTELL3=nbstudentgofclassspec($idanac,'RTEL','L3',$bdd); echo $nbstudentgofclassspecRTELL3;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbstudentofclassspecRTELL3=nbstudentofclassspec($idanac,'RTEL','L3',$bdd);echo $nbstudentofclassspecRTELL3;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanse2RTELL3=nbpresentanse2($idanac,'RTEL','L3',$bdd);echo $nbpresentanse2RTELL3 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanse2RTELL3=nbadmissupzfanse2($idanac,'RTEL','L3',$bdd); echo $nbadmissupzfanse2RTELL3 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzganse2sRTELL3=nbadmissupzganse2($idanac,'RTEL','L3',$bdd); echo $nbadmissupzganse2sRTELL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanse2RTELL3=nbadmissupzanse2($idanac,'RTEL','L3',$bdd); echo $nbadmissupzanse2RTELL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzRTELL3= number_format((nbadmissupzanse2($idanac,'RTEL','L3',$bdd)*100)/nbpresentanse2($idanac,'RTEL','L3',$bdd),2); echo $pourcentsupzRTELL3;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanse2RTELL3=nbadmisinfdfanse2($idanac,'RTEL','L3',$bdd); echo $nbadmisinfdfanse2RTELL3 ;



        ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
        $nbadmisinfdganse2RTELL3=nbadmisinfdganse2($idanac,'RTEL','L3',$bdd); echo    $nbadmisinfdganse2RTELL3;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanse2RTELL3=nbadmisinfdanse2($idanac,'RTEL','L3',$bdd); echo   $nbadmisinfdanse2RTELL3;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdRTELL3= number_format((nbadmisinfdanse2($idanac,'RTEL','L3',$bdd)*100)/nbpresentanse2($idanac,'RTEL','L3',$bdd),2); echo $pourcentinfdRTELL3;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

        $nbadmissupdixfanse2RTELL3=nbadmissupdixfanse2($idanac,'RTEL','L3',$bdd); echo   $nbadmissupdixfanse2RTELL3


        ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

        $nbadmissupdixganse2RTELL3=nbadmissupdixganse2($idanac,'RTEL','L3',$bdd); echo   $nbadmissupdixganse2RTELL3;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
        $nbadmissupdixanse2RTELL3=nbadmissupdixanse2($idanac,'RTEL','L3',$bdd); echo   $nbadmissupdixanse2RTELL3;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixRTELL3= number_format((nbadmissupdixanse2($idanac,'RTEL','L3',$bdd)*100)/nbpresentanse2($idanac,'RTEL','L3',$bdd),2); echo $pourcentsupdixRTELL3;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

        $nbadmisdecisfanse2RTELL3=nbadmisdecisfanse2($idanac,'RTEL','L3',$bdd); echo   $nbadmisdecisfanse2RTELL3;

        ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


        $nbadmisdecisganse2RTELL3=nbadmisdecisganse2($idanac,'RTEL','L3',$bdd); echo     $nbadmisdecisganse2RTELL3;

        ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

        $nbadmisdecisanse2RTELL3=nbadmisdecisanse2($idanac,'RTEL','L3',$bdd); echo       $nbadmisdecisanse2RTELL3;



        ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisRTELL3= number_format((nbadmisdecisanse2($idanac,'RTEL','L3',$bdd)*100)/nbpresentanse2($idanac,'RTEL','L3',$bdd),2); echo $pourcentdecisRTELL3;?></td>


        </tr>
        <tr>




            <td style="text-align: center; border: solid 1px black; ">  SIGL </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbstudentfofclassspecSIGLL3=nbstudentfofclassspec($idanac,'SIGL','L3',$bdd); echo $nbstudentfofclassspecSIGLL3 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbstudentgofclassspecSIGLL3=nbstudentgofclassspec($idanac,'SIGL','L3',$bdd); echo $nbstudentgofclassspecSIGLL3;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbstudentofclassspecSIGLL3=nbstudentofclassspec($idanac,'SIGL','L3',$bdd);echo $nbstudentofclassspecSIGLL3;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanse2SIGLL3=nbpresentanse2($idanac,'SIGL','L3',$bdd);echo $nbpresentanse2SIGLL3 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanse2SIGLL3=nbadmissupzfanse2($idanac,'SIGL','L3',$bdd); echo $nbadmissupzfanse2SIGLL3 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzganse2sSIGLL3=nbadmissupzganse2($idanac,'SIGL','L3',$bdd); echo $nbadmissupzganse2sSIGLL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanse2SIGLL3=nbadmissupzanse2($idanac,'SIGL','L3',$bdd); echo $nbadmissupzanse2SIGLL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzSIGLL3= number_format((nbadmissupzanse2($idanac,'SIGL','L3',$bdd)*100)/nbpresentanse2($idanac,'SIGL','L3',$bdd),2); echo $pourcentsupzSIGLL3;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanse2SIGLL3=nbadmisinfdfanse2($idanac,'SIGL','L3',$bdd); echo $nbadmisinfdfanse2SIGLL3 ;



        ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
        $nbadmisinfdganse2SIGLL3=nbadmisinfdganse2($idanac,'SIGL','L3',$bdd); echo    $nbadmisinfdganse2SIGLL3;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanse2SIGLL3=nbadmisinfdanse2($idanac,'SIGL','L3',$bdd); echo   $nbadmisinfdanse2SIGLL3;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdSIGLL3= number_format((nbadmisinfdanse2($idanac,'SIGL','L3',$bdd)*100)/nbpresentanse2($idanac,'SIGL','L3',$bdd),2); echo $pourcentinfdSIGLL3;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

        $nbadmissupdixfanse2SIGLL3=nbadmissupdixfanse2($idanac,'SIGL','L3',$bdd); echo   $nbadmissupdixfanse2SIGLL3


        ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

        $nbadmissupdixganse2SIGLL3=nbadmissupdixganse2($idanac,'SIGL','L3',$bdd); echo   $nbadmissupdixganse2SIGLL3;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
        $nbadmissupdixanse2SIGLL3=nbadmissupdixanse2($idanac,'SIGL','L3',$bdd); echo   $nbadmissupdixanse2SIGLL3;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixSIGLL3= number_format((nbadmissupdixanse2($idanac,'SIGL','L3',$bdd)*100)/nbpresentanse2($idanac,'SIGL','L3',$bdd),2); echo $pourcentsupdixSIGLL3;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

        $nbadmisdecisfanse2SIGLL3=nbadmisdecisfanse2($idanac,'SIGL','L3',$bdd); echo   $nbadmisdecisfanse2SIGLL3;

        ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


        $nbadmisdecisganse2SIGLL3=nbadmisdecisganse2($idanac,'SIGL','L3',$bdd); echo     $nbadmisdecisganse2SIGLL3;

        ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

        $nbadmisdecisanse2SIGLL3=nbadmisdecisanse2($idanac,'SIGL','L3',$bdd); echo       $nbadmisdecisanse2SIGLL3;



        ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisSIGLL3= number_format((nbadmisdecisanse2($idanac,'SIGL','L3',$bdd)*100)/nbpresentanse2($idanac,'SIGL','L3',$bdd),2); echo $pourcentdecisSIGLL3;?></td>


        </tr>
        <tr>




            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ;" height="20px;"  colspan="2">  <strong>TOTAL</strong></td>


            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbstudentfofclassspecL3=$nbstudentfofclassspecSRITL3+$nbstudentfofclassspecRTELL3 +$nbstudentfofclassspecSIGLL3 ; echo $nbstudentfofclassspecL3;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbstudentgofclassspecL3=$nbstudentgofclassspecSRITL3 + $nbstudentgofclassspecRTELL3+ $nbstudentgofclassspecSIGLL3 ;echo $nbstudentgofclassspecL3;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbstudentofclassspecL3=$nbstudentofclassspecSRITL3 + $nbstudentofclassspecRTELL3 + $nbstudentofclassspecSIGLL3; echo $nbstudentofclassspecL3;?></td>


            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbpresentL3= $nbpresentanse2SRITL3+$nbpresentanse2RTELL3 +$nbpresentanse2SIGLL3; echo $nbpresentL3 ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzfL3=$nbadmissupzfanse2SRITL3+$nbadmissupzfanse2RTELL3+$nbadmissupzfanse2SIGLL3; echo $nbadmissupzfL3; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzgL3=$nbadmissupzganse2sSRITL3 + $nbadmissupzganse2sRTELL3  + $nbadmissupzganse2sSIGLL3;echo $nbadmissupzgL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbadmissupzL3=$nbadmissupzanse2RTELL3 + $nbadmissupzanse2SRITL3 + $nbadmissupzanse2SIGLL3; echo $nbadmissupzL3 ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php  $pourcentsupzL3= number_format((($nbadmissupzL3*100)/$nbpresentL3),2); echo $pourcentsupzL3;?></td>



            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmisinfdfL3=$nbadmisinfdfanse2SRITL3+$nbadmisinfdfanse2RTELL3 +$nbadmisinfdfanse2SIGLL3;echo $nbadmisinfdfL3; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $nbadmisinfdgL3=$nbadmisinfdganse2SRITL3 + $nbadmisinfdganse2RTELL3+ $nbadmisinfdganse2SIGLL3;echo $nbadmisinfdgL3; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisinfdL3=$nbadmisinfdanse2SRITL3+ $nbadmisinfdanse2RTELL3 + $nbadmisinfdanse2SIGLL3; echo $nbadmisinfdL3; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentinfdL3= number_format((($nbadmisinfdL3*100)/$nbpresentL3),2); echo $pourcentinfdL3;?></td>





            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupdixfL3=$nbadmissupdixfanse2SRITL3+$nbadmissupdixfanse2RTELL3+$nbadmissupdixfanse2SIGLL3; echo $nbadmissupdixfL3 ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmissupdixgL3 = $nbadmissupdixganse2SRITL3 + $nbadmissupdixganse2RTELL3+ $nbadmissupdixganse2SIGLL3; echo $nbadmissupdixgL3 ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php $nbadmissupdixL3 = $nbadmissupdixanse2SRITL3 + $nbadmissupdixanse2RTELL3 + $nbadmissupdixanse2SIGLL3; echo $nbadmissupdixL3; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentsupdixL3= number_format((($nbadmissupdixL3*100)/$nbpresentL3),2); echo $pourcentsupdixL3;?></td>

            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisdecisfL3=$nbadmisdecisfanse2SRITL3 + $nbadmisdecisfanse2RTELL3 + $nbadmisdecisfanse2SIGLL3; echo $nbadmisdecisfL3; ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbadmisdecisgL3= $nbadmisdecisganse2SRITL3 + $nbadmisdecisganse2RTELL3  + $nbadmisdecisganse2SIGLL3;echo $nbadmisdecisgL3; ?></td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmisdecisL3= $nbadmisdecisanse2SRITL3 + $nbadmisdecisanse2RTELL3 + $nbadmisdecisanse2SIGLL3; echo $nbadmisdecisL3; ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentdecisL3= number_format((($nbadmisdecisL3*100)/$nbpresentL3),2); echo $pourcentdecisL3;?></td>


        </tr>



        <tr>




            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ;" height="20px;"  colspan="2">  <strong>TOTAL LICENCE</strong></td>


            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbetudiantfLICENCE=$nbstudentfofclassspecL3+$nbstudentfofclassspecL1 +$nbstudentfofclassspecL2 ; echo $nbetudiantfLICENCE;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbetudiantgLICENCE=$nbstudentgofclassspecL3 + $nbstudentgofclassspecL2+ $nbstudentgofclassspecL3 ;echo $nbetudiantgLICENCE;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbetudiantLICENCE=$nbstudentofclassspecL3 + $nbstudentofclassspecL2+ $nbstudentofclassspecL1; echo $nbetudiantLICENCE;?></td>


            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbpresentLICENCE= $nbpresentL1+$nbpresentL2 +$nbpresentL3; echo $nbpresentLICENCE ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzfLICENCE=$nbadmissupzfL1+$nbadmissupzfL2+$nbadmissupzfL3; echo $nbadmissupzfLICENCE; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzgLICENCE=$nbadmissupzgL1 + $nbadmissupzgL2  + $nbadmissupzgL3;echo $nbadmissupzgLICENCE; ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbadmissupzLICENCE=$nbadmissupzL1 + $nbadmissupzL2 + $nbadmissupzL3; echo $nbadmissupzLICENCE ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php  $pourcentsupzLICENCE= number_format((($nbadmissupzLICENCE*100)/$nbpresentLICENCE),2); echo $pourcentsupzLICENCE;?></td>



            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmisinfdfLICENCE=$nbadmisinfdfL1+$nbadmisinfdfL2 +$nbadmisinfdfL3;echo $nbadmisinfdfLICENCE; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $nbadmisinfdgLICENCE= $nbadmisinfdgL1 +  $nbadmisinfdgL2 +  $nbadmisinfdgL3;echo $nbadmisinfdgLICENCE; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisinfdLICENCE=$nbadmisinfdL1+ $nbadmisinfdL2 + $nbadmisinfdL3; echo $nbadmisinfdLICENCE; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentinfdLICENCE= number_format((($nbadmisinfdLICENCE*100)/$nbpresentLICENCE),2); echo $pourcentinfdLICENCE;?></td>





            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupdixfLICENCE=$nbadmissupdixfL1+$nbadmissupdixfL2+$nbadmissupdixfL3; echo $nbadmissupdixfLICENCE ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmissupdixgLICENCE = $nbadmissupdixgL1 + $nbadmissupdixgL2+ $nbadmissupdixgL3; echo $nbadmissupdixgLICENCE ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php $nbadmissupdixLICENCE = $nbadmissupdixL1 + $nbadmissupdixL2 + $nbadmissupdixL3; echo $nbadmissupdixLICENCE; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentsupdixLICENCE= number_format((($nbadmissupdixLICENCE*100)/$nbpresentLICENCE),2); echo $pourcentsupdixLICENCE;?></td>

            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisdecisfLICENCE= $nbadmisdecisfL1 +  $nbadmisdecisfL2 +  $nbadmisdecisfL3; echo $nbadmisdecisfLICENCE; ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbadmisdecisgLICENCE= $nbadmisdecisgL1 + $nbadmisdecisgL2 + $nbadmisdecisgL3;echo $nbadmisdecisgLICENCE; ?></td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmisdecisLICENCE= $nbadmisdecisL1 + $nbadmisdecisL2+ $nbadmisdecisL3; echo $nbadmisdecisLICENCE; ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentdecisLICENCE= number_format((($nbadmisdecisLICENCE*100)/$nbpresentLICENCE),2); echo $pourcentdecisLICENCE;?></td>


        </tr>






        <tr>



            <td style="text-align: center; border: solid 1px black; "  rowspan="4"> <strong>MASTER 1</strong></td>
            <td style="text-align: center; border: solid 1px black; ">  SIGL </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbstudentfofclassspecSIGLM1=nbstudentfofclassspec($idanac,'SIGL','M1',$bdd) + nbstudentfofclassspec($idanac,'SIGL','M1',$bdd); echo $nbstudentfofclassspecSIGLM1 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbstudentgofclassspecSIGLM1=nbstudentgofclassspec($idanac,'SIGL','M1',$bdd); echo $nbstudentgofclassspecSIGLM1;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbstudentofclassspecSIGLM1=nbstudentofclassspec($idanac,'SIGL','M1',$bdd);echo $nbstudentofclassspecSIGLM1;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanse2SIGLM1=nbpresentanse2($idanac,'SIGL','M1',$bdd);echo $nbpresentanse2SIGLM1 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanse2SIGLM1=nbadmissupzfanse2($idanac,'SIGL','M1',$bdd); echo $nbadmissupzfanse2SIGLM1 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzganse2sSIGLM1=nbadmissupzganse2($idanac,'SIGL','M1',$bdd); echo $nbadmissupzganse2sSIGLM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanse2SIGLM1=nbadmissupzanse2($idanac,'SIGL','M1',$bdd); echo $nbadmissupzanse2SIGLM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzSIGLM1= number_format((nbadmissupzanse2($idanac,'SIGL','M1',$bdd)*100)/nbpresentanse2($idanac,'SIGL','M1',$bdd),2); echo $pourcentsupzSIGLM1;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanse2SIGLM1=nbadmisinfdfanse2($idanac,'SIGL','M1',$bdd); echo $nbadmisinfdfanse2SIGLM1 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganse2SIGLM1=nbadmisinfdganse2($idanac,'SIGL','M1',$bdd); echo    $nbadmisinfdganse2SIGLM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanse2SIGLM1=nbadmisinfdanse2($idanac,'SIGL','M1',$bdd); echo   $nbadmisinfdanse2SIGLM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdSIGLM1= number_format((nbadmisinfdanse2($idanac,'SIGL','M1',$bdd)*100)/nbpresentanse2($idanac,'SIGL','M1',$bdd),2); echo $pourcentinfdSIGLM1;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanse2SIGLM1=nbadmissupdixfanse2($idanac,'SIGL','M1',$bdd); echo   $nbadmissupdixfanse2SIGLM1


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganse2SIGLM1=nbadmissupdixganse2($idanac,'SIGL','M1',$bdd); echo   $nbadmissupdixganse2SIGLM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanse2SIGLM1=nbadmissupdixanse2($idanac,'SIGL','M1',$bdd); echo   $nbadmissupdixanse2SIGLM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixSIGLM1= number_format((nbadmissupdixanse2($idanac,'SIGL','M1',$bdd)*100)/nbpresentanse2($idanac,'SIGL','M1',$bdd),2); echo $pourcentsupdixSIGLM1;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanse2SIGLM1=nbadmisdecisfanse2($idanac,'SIGL','M1',$bdd); echo   $nbadmisdecisfanse2SIGLM1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganse2SIGLM1=nbadmisdecisganse2($idanac,'SIGL','M1',$bdd); echo     $nbadmisdecisganse2SIGLM1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanse2SIGLM1=nbadmisdecisanse2($idanac,'SIGL','M1',$bdd); echo       $nbadmisdecisanse2SIGLM1;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisSIGLM1= number_format((nbadmisdecisanse2($idanac,'SIGL','M1',$bdd)*100)/nbpresentanse2($idanac,'SIGL','M1',$bdd),2); echo $pourcentdecisSIGLM1;?></td>


        </tr>
        <tr>




            <td style="text-align: center; border: solid 1px black; ">  SITW </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbstudentfofclassspecSITWM1=nbstudentfofclassspec($idanac,'SITW','M1',$bdd); echo $nbstudentfofclassspecSITWM1 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbstudentgofclassspecSITWM1=nbstudentgofclassspec($idanac,'SITW','M1',$bdd); echo $nbstudentgofclassspecSITWM1;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbstudentofclassspecSITWM1=nbstudentofclassspec($idanac,'SITW','M1',$bdd);echo $nbstudentofclassspecSITWM1;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanse2SITWM1=nbpresentanse2($idanac,'SITW','M1',$bdd);echo $nbpresentanse2SITWM1 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanse2SITWM1=nbadmissupzfanse2($idanac,'SITW','M1',$bdd); echo $nbadmissupzfanse2SITWM1 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzganse2sSITWM1=nbadmissupzganse2($idanac,'SITW','M1',$bdd); echo $nbadmissupzganse2sSITWM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanse2SITWM1=nbadmissupzanse2($idanac,'SITW','M1',$bdd); echo $nbadmissupzanse2SITWM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzSITWM1= number_format((nbadmissupzanse2($idanac,'SITW','M1',$bdd)*100)/nbpresentanse2($idanac,'SITW','M1',$bdd),2); echo $pourcentsupzSITWM1;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanse2SITWM1=nbadmisinfdfanse2($idanac,'SITW','M1',$bdd); echo $nbadmisinfdfanse2SITWM1 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganse2SITWM1=nbadmisinfdganse2($idanac,'SITW','M1',$bdd); echo    $nbadmisinfdganse2SITWM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanse2SITWM1=nbadmisinfdanse2($idanac,'SITW','M1',$bdd); echo   $nbadmisinfdanse2SITWM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdSITWM1= number_format((nbadmisinfdanse2($idanac,'SITW','M1',$bdd)*100)/nbpresentanse2($idanac,'SITW','M1',$bdd),2); echo $pourcentinfdSITWM1;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanse2SITWM1=nbadmissupdixfanse2($idanac,'SITW','M1',$bdd); echo   $nbadmissupdixfanse2SITWM1


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganse2SITWM1=nbadmissupdixganse2($idanac,'SITW','M1',$bdd); echo   $nbadmissupdixganse2SITWM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanse2SITWM1=nbadmissupdixanse2($idanac,'SITW','M1',$bdd); echo   $nbadmissupdixanse2SITWM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixSITWM1= number_format((nbadmissupdixanse2($idanac,'SITW','M1',$bdd)*100)/nbpresentanse2($idanac,'SITW','M1',$bdd),2); echo $pourcentsupdixSITWM1;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanse2SITWM1=nbadmisdecisfanse2($idanac,'SITW','M1',$bdd); echo   $nbadmisdecisfanse2SITWM1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganse2SITWM1=nbadmisdecisganse2($idanac,'SITW','M1',$bdd); echo     $nbadmisdecisganse2SITWM1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanse2SITWM1=nbadmisdecisanse2($idanac,'SITW','M1',$bdd); echo       $nbadmisdecisanse2SITWM1;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisSITWM1= number_format((nbadmisdecisanse2($idanac,'SITW','M1',$bdd)*100)/nbpresentanse2($idanac,'SITW','M1',$bdd),2); echo $pourcentdecisSITWM1;?></td>


        </tr>

        <tr>




            <td style="text-align: center; border: solid 1px black; ">  RTEL </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbstudentfofclassspecRTELM1=nbstudentfofclassspec($idanac,'RTEL','M1',$bdd); echo $nbstudentfofclassspecRTELM1 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbstudentgofclassspecRTELM1=nbstudentgofclassspec($idanac,'RTEL','M1',$bdd); echo $nbstudentgofclassspecRTELM1;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbstudentofclassspecRTELM1=nbstudentofclassspec($idanac,'RTEL','M1',$bdd);echo $nbstudentofclassspecRTELM1;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanse2RTELM1=nbpresentanse2($idanac,'RTEL','M1',$bdd);echo $nbpresentanse2RTELM1 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanse2RTELM1=nbadmissupzfanse2($idanac,'RTEL','M1',$bdd); echo $nbadmissupzfanse2RTELM1 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzganse2sRTELM1=nbadmissupzganse2($idanac,'RTEL','M1',$bdd); echo $nbadmissupzganse2sRTELM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanse2RTELM1=nbadmissupzanse2($idanac,'RTEL','M1',$bdd); echo $nbadmissupzanse2RTELM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzRTELM1= number_format((nbadmissupzanse2($idanac,'RTEL','M1',$bdd)*100)/nbpresentanse2($idanac,'RTEL','M1',$bdd),2); echo $pourcentsupzRTELM1;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanse2RTELM1=nbadmisinfdfanse2($idanac,'RTEL','M1',$bdd); echo $nbadmisinfdfanse2RTELM1 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganse2RTELM1=nbadmisinfdganse2($idanac,'RTEL','M1',$bdd); echo    $nbadmisinfdganse2RTELM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanse2RTELM1=nbadmisinfdanse2($idanac,'RTEL','M1',$bdd); echo   $nbadmisinfdanse2RTELM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdRTELM1= number_format((nbadmisinfdanse2($idanac,'RTEL','M1',$bdd)*100)/nbpresentanse2($idanac,'RTEL','M1',$bdd),2); echo $pourcentinfdRTELM1;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanse2RTELM1=nbadmissupdixfanse2($idanac,'RTEL','M1',$bdd); echo   $nbadmissupdixfanse2RTELM1


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganse2RTELM1=nbadmissupdixganse2($idanac,'RTEL','M1',$bdd); echo   $nbadmissupdixganse2RTELM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanse2RTELM1=nbadmissupdixanse2($idanac,'RTEL','M1',$bdd); echo   $nbadmissupdixanse2RTELM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixRTELM1= number_format((nbadmissupdixanse2($idanac,'RTEL','M1',$bdd)*100)/nbpresentanse2($idanac,'RTEL','M1',$bdd),2); echo $pourcentsupdixRTELM1;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanse2RTELM1=nbadmisdecisfanse2($idanac,'RTEL','M1',$bdd); echo   $nbadmisdecisfanse2RTELM1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganse2RTELM1=nbadmisdecisganse2($idanac,'RTEL','M1',$bdd); echo     $nbadmisdecisganse2RTELM1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanse2RTELM1=nbadmisdecisanse2($idanac,'RTEL','M1',$bdd); echo       $nbadmisdecisanse2RTELM1;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisRTELM1= number_format((nbadmisdecisanse2($idanac,'RTEL','M1',$bdd)*100)/nbpresentanse2($idanac,'RTEL','M1',$bdd),2); echo $pourcentdecisRTELM1;?></td>


        </tr>


        <tr>




            <td style="text-align: center; border: solid 1px black; ">  MBDS </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbstudentfofclassspecMBDSM1=nbstudentfofclassspec($idanac,'MBDS','M1',$bdd); echo $nbstudentfofclassspecMBDSM1 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbstudentgofclassspecMBDSM1=nbstudentgofclassspec($idanac,'MBDS','M1',$bdd); echo $nbstudentgofclassspecMBDSM1;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbstudentofclassspecMBDSM1=nbstudentofclassspec($idanac,'MBDS','M1',$bdd);echo $nbstudentofclassspecMBDSM1;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanse2MBDSM1=nbpresentanse2($idanac,'MBDS','M1',$bdd);echo $nbpresentanse2MBDSM1 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanse2MBDSM1=nbadmissupzfanse2($idanac,'MBDS','M1',$bdd); echo $nbadmissupzfanse2MBDSM1 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzganse2sMBDSM1=nbadmissupzganse2($idanac,'MBDS','M1',$bdd); echo $nbadmissupzganse2sMBDSM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanse2MBDSM1=nbadmissupzanse2($idanac,'MBDS','M1',$bdd); echo $nbadmissupzanse2MBDSM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzMBDSM1= number_format((nbadmissupzanse2($idanac,'MBDS','M1',$bdd)*100)/nbpresentanse2($idanac,'MBDS','M1',$bdd),2); echo $pourcentsupzMBDSM1;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanse2MBDSM1=nbadmisinfdfanse2($idanac,'MBDS','M1',$bdd); echo $nbadmisinfdfanse2MBDSM1 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganse2MBDSM1=nbadmisinfdganse2($idanac,'MBDS','M1',$bdd); echo    $nbadmisinfdganse2MBDSM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanse2MBDSM1=nbadmisinfdanse2($idanac,'MBDS','M1',$bdd); echo   $nbadmisinfdanse2MBDSM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdMBDSM1= number_format((nbadmisinfdanse2($idanac,'MBDS','M1',$bdd)*100)/nbpresentanse2($idanac,'MBDS','M1',$bdd),2); echo $pourcentinfdMBDSM1;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanse2MBDSM1=nbadmissupdixfanse2($idanac,'MBDS','M1',$bdd); echo   $nbadmissupdixfanse2MBDSM1


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganse2MBDSM1=nbadmissupdixganse2($idanac,'MBDS','M1',$bdd); echo   $nbadmissupdixganse2MBDSM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanse2MBDSM1=nbadmissupdixanse2($idanac,'MBDS','M1',$bdd); echo   $nbadmissupdixanse2MBDSM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixMBDSM1= number_format((nbadmissupdixanse2($idanac,'MBDS','M1',$bdd)*100)/nbpresentanse2($idanac,'MBDS','M1',$bdd),2); echo $pourcentsupdixMBDSM1;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanse2MBDSM1=nbadmisdecisfanse2($idanac,'MBDS','M1',$bdd); echo   $nbadmisdecisfanse2MBDSM1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganse2MBDSM1=nbadmisdecisganse2($idanac,'MBDS','M1',$bdd); echo     $nbadmisdecisganse2MBDSM1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanse2MBDSM1=nbadmisdecisanse2($idanac,'MBDS','M1',$bdd); echo       $nbadmisdecisanse2MBDSM1;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisMBDSM1= number_format((nbadmisdecisanse2($idanac,'MBDS','M1',$bdd)*100)/nbpresentanse2($idanac,'MBDS','M1',$bdd),2); echo $pourcentdecisMBDSM1;?></td>


        </tr>



        <!--
        <tr>




            <td style="text-align: center; border: solid 1px black; ">  MDSI </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbstudentfofclassspecMDSIM1=nbstudentfofclassspec($idanac,'MDSI','M1',$bdd); echo $nbstudentfofclassspecMDSIM1 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbstudentgofclassspecMDSIM1=nbstudentgofclassspec($idanac,'MDSI','M1',$bdd); echo $nbstudentgofclassspecMDSIM1;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbstudentofclassspecMDSIM1=nbstudentofclassspec($idanac,'MDSI','M1',$bdd);echo $nbstudentofclassspecMDSIM1;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanse2MDSIM1=nbpresentanse2($idanac,'MDSI','M1',$bdd);echo $nbpresentanse2MDSIM1 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanse2MDSIM1=nbadmissupzfanse2($idanac,'MDSI','M1',$bdd); echo $nbadmissupzfanse2MDSIM1 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzganse2sMDSIM1=nbadmissupzganse2($idanac,'MDSI','M1',$bdd); echo $nbadmissupzganse2sMDSIM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanse2MDSIM1=nbadmissupzanse2($idanac,'MDSI','M1',$bdd); echo $nbadmissupzanse2MDSIM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzMDSIM1= number_format((nbadmissupzanse2($idanac,'MDSI','M1',$bdd)*100)/nbpresentanse2($idanac,'MDSI','M1',$bdd),2); echo $pourcentsupzMDSIM1;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanse2MDSIM1=nbadmisinfdfanse2($idanac,'MDSI','M1',$bdd); echo $nbadmisinfdfanse2MDSIM1 ;



        ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
        $nbadmisinfdganse2MDSIM1=nbadmisinfdganse2($idanac,'MDSI','M1',$bdd); echo    $nbadmisinfdganse2MDSIM1;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanse2MDSIM1=nbadmisinfdanse2($idanac,'MDSI','M1',$bdd); echo   $nbadmisinfdanse2MDSIM1;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdMDSIM1= number_format((nbadmisinfdanse2($idanac,'MDSI','M1',$bdd)*100)/nbpresentanse2($idanac,'MDSI','M1',$bdd),2); echo $pourcentinfdMDSIM1;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

        $nbadmissupdixfanse2MDSIM1=nbadmissupdixfanse2($idanac,'MDSI','M1',$bdd); echo   $nbadmissupdixfanse2MDSIM1


        ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

        $nbadmissupdixganse2MDSIM1=nbadmissupdixganse2($idanac,'MDSI','M1',$bdd); echo   $nbadmissupdixganse2MDSIM1;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
        $nbadmissupdixanse2MDSIM1=nbadmissupdixanse2($idanac,'MDSI','M1',$bdd); echo   $nbadmissupdixanse2MDSIM1;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixMDSIM1= number_format((nbadmissupdixanse2($idanac,'MDSI','M1',$bdd)*100)/nbpresentanse2($idanac,'MDSI','M1',$bdd),2); echo $pourcentsupdixMDSIM1;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

        $nbadmisdecisfanse2MDSIM1=nbadmisdecisfanse2($idanac,'MDSI','M1',$bdd); echo   $nbadmisdecisfanse2MDSIM1;

        ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


        $nbadmisdecisganse2MDSIM1=nbadmisdecisganse2($idanac,'MDSI','M1',$bdd); echo     $nbadmisdecisganse2MDSIM1;

        ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

        $nbadmisdecisanse2MDSIM1=nbadmisdecisanse2($idanac,'MDSI','M1',$bdd); echo       $nbadmisdecisanse2MDSIM1;



        ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisMDSIM1= number_format((nbadmisdecisanse2($idanac,'MDSI','M1',$bdd)*100)/nbpresentanse2($idanac,'MDSI','M1',$bdd),2); echo $pourcentdecisMDSIM1;?></td>


        </tr>-->


        <tr>




            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ;" height="20px;"  colspan="2" >  <strong>TOTAL </strong></td>


            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbstudentfofclassspecM1=$nbstudentfofclassspecSIGLM1+$nbstudentfofclassspecSITWM1+$nbstudentfofclassspecRTELM1 +$nbstudentfofclassspecMBDSM1 /*+ $nbstudentfofclassspecMDSIM1*/ ; echo $nbstudentfofclassspecM1;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbstudentgofclassspecM1=$nbstudentgofclassspecSIGLM1+$nbstudentgofclassspecSITWM1 + $nbstudentgofclassspecRTELM1 + $nbstudentgofclassspecMBDSM1 /* + $nbstudentgofclassspecMDSIM1*/;echo $nbstudentgofclassspecM1;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbstudentofclassspecM1=$nbstudentofclassspecSIGLM1+$nbstudentofclassspecSITWM1 + $nbstudentofclassspecRTELM1  + $nbstudentofclassspecMBDSM1 /*+ $nbstudentofclassspecMDSIM1*/; echo $nbstudentofclassspecM1;?></td>


            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbpresentM1= $nbpresentanse2SIGLM1+$nbpresentanse2SITWM1+$nbpresentanse2RTELM1 +$nbpresentanse2MBDSM1 /*+ $nbpresentanse2MDSIM1*/; echo $nbpresentM1 ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzfM1=$nbadmissupzfanse2SIGLM1+$nbadmissupzfanse2SITWM1+$nbadmissupzfanse2RTELM1 +$nbadmissupzfanse2MBDSM1 /*+ $nbadmissupzfanse2MDSIM1*/; echo $nbadmissupzfM1; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzgM1=$nbadmissupzganse2sSIGLM1+$nbadmissupzganse2sSITWM1 + $nbadmissupzganse2sRTELM1  + $nbadmissupzganse2sMBDSM1 /*+ $nbadmissupzganse2sMDSIM1*/;echo $nbadmissupzgM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbadmissupzM1=$nbadmissupzanse2SIGLM1 +$nbadmissupzanse2SITWM1 + $nbadmissupzanse2RTELM1 + $nbadmissupzanse2MBDSM1/* + $nbadmissupzanse2MDSIM1*/; echo $nbadmissupzM1 ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php  $pourcentsupzM1= number_format((($nbadmissupzM1*100)/$nbpresentM1),3); echo $pourcentsupzM1;?></td>



            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmisinfdfM1=$nbadmisinfdfanse2SIGLM1+$nbadmisinfdfanse2SITWM1+$nbadmisinfdfanse2RTELM1 +$nbadmisinfdfanse2MBDSM1 /*+ $nbadmisinfdfanse2MDSIM1*/;echo $nbadmisinfdfM1; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $nbadmisinfdgM1=$nbadmisinfdganse2SIGLM1+$nbadmisinfdganse2SITWM1  + $nbadmisinfdganse2RTELM1 + $nbadmisinfdganse2MBDSM1 /*+ $nbadmisinfdganse2MDSIM1*/;echo $nbadmisinfdgM1; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisinfdM1=$nbadmisinfdanse2SIGLM1+$nbadmisinfdanse2SITWM1+ $nbadmisinfdanse2RTELM1 + $nbadmisinfdanse2MBDSM1 /*+ $nbadmisinfdanse2MDSIM1*/; echo $nbadmisinfdM1; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentinfdM1= number_format((($nbadmisinfdM1*100)/$nbpresentM1),2); echo $pourcentinfdM1;?></td>





            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupdixfM1=$nbadmissupdixfanse2SIGLM1+$nbadmissupdixfanse2SITWM1+$nbadmissupdixfanse2RTELM1 +$nbadmissupdixfanse2MBDSM1 /*+ $nbadmissupdixfanse2MDSIM1*/; echo $nbadmissupdixfM1 ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmissupdixgM1 = $nbadmissupdixganse2SIGLM1 +$nbadmissupdixganse2SITWM1+ $nbadmissupdixganse2RTELM1 + $nbadmissupdixganse2MBDSM1 /* + $nbadmissupdixganse2MDSIM1*/; echo $nbadmissupdixgM1 ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php $nbadmissupdixM1 = $nbadmissupdixanse2SIGLM1 +$nbadmissupdixanse2SITWM1 + $nbadmissupdixanse2RTELM1 + $nbadmissupdixanse2MBDSM1 /*+ $nbadmissupdixanse2MDSIM1*/; echo $nbadmissupdixM1; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentsupdixM1= number_format((($nbadmissupdixM1*100)/$nbpresentM1),2); echo $pourcentsupdixM1;?></td>

            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisdecisfM1=$nbadmisdecisfanse2SIGLM1+$nbadmisdecisfanse2SITWM1 + $nbadmisdecisfanse2RTELM1 + $nbadmisdecisfanse2MBDSM1 /*+ $nbadmisdecisfanse2MDSIM1*/; echo $nbadmisdecisfM1; ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbadmisdecisgM1= $nbadmisdecisganse2SIGLM1+$nbadmisdecisganse2SITWM1+ $nbadmisdecisganse2RTELM1 + $nbadmisdecisganse2MBDSM1 /* + $nbadmisdecisganse2MDSIM1*/;echo $nbadmisdecisgM1; ?></td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmisdecisM1= $nbadmisdecisanse2SIGLM1 +$nbadmisdecisanse2SITWM1+ $nbadmisdecisanse2RTELM1 + $nbadmisdecisanse2MBDSM1 /*+ $nbadmisdecisanse2MDSIM1*/; echo $nbadmisdecisM1; ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentdecisM1= number_format((($nbadmisdecisM1*100)/$nbpresentM1),3); echo $pourcentdecisM1;?></td>


        </tr>




        <tr>



            <td style="text-align: center; border: solid 1px black; "  rowspan="4"> <strong>MASTER 2</strong></td>
            <td style="text-align: center; border: solid 1px black; ">  SIGL </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbstudentfofclassspecSIGLM2=nbstudentfofclassspec($idanac,'SIGL','M2',$bdd) + nbstudentfofclassspec($idanac,'SIGL','M2',$bdd); echo $nbstudentfofclassspecSIGLM2 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbstudentgofclassspecSIGLM2=nbstudentgofclassspec($idanac,'SIGL','M2',$bdd); echo $nbstudentgofclassspecSIGLM2;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbstudentofclassspecSIGLM2=nbstudentofclassspec($idanac,'SIGL','M2',$bdd);echo $nbstudentofclassspecSIGLM2;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanse2SIGLM2=nbpresentanse2($idanac,'SIGL','M2',$bdd);echo $nbpresentanse2SIGLM2 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanse2SIGLM2=nbadmissupzfanse2($idanac,'SIGL','M2',$bdd); echo $nbadmissupzfanse2SIGLM2 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzganse2sSIGLM2=nbadmissupzganse2($idanac,'SIGL','M2',$bdd); echo $nbadmissupzganse2sSIGLM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanse2SIGLM2=nbadmissupzanse2($idanac,'SIGL','M2',$bdd); echo $nbadmissupzanse2SIGLM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzSIGLM2= number_format((nbadmissupzanse2($idanac,'SIGL','M2',$bdd)*100)/nbpresentanse2($idanac,'SIGL','M2',$bdd),2); echo $pourcentsupzSIGLM2;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanse2SIGLM2=nbadmisinfdfanse2($idanac,'SIGL','M2',$bdd); echo $nbadmisinfdfanse2SIGLM2 ;



        ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
        $nbadmisinfdganse2SIGLM2=nbadmisinfdganse2($idanac,'SIGL','M2',$bdd); echo    $nbadmisinfdganse2SIGLM2;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanse2SIGLM2=nbadmisinfdanse2($idanac,'SIGL','M2',$bdd); echo   $nbadmisinfdanse2SIGLM2;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdSIGLM2= number_format((nbadmisinfdanse2($idanac,'SIGL','M2',$bdd)*100)/nbpresentanse2($idanac,'SIGL','M2',$bdd),2); echo $pourcentinfdSIGLM2;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

        $nbadmissupdixfanse2SIGLM2=nbadmissupdixfanse2($idanac,'SIGL','M2',$bdd); echo   $nbadmissupdixfanse2SIGLM2


        ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

        $nbadmissupdixganse2SIGLM2=nbadmissupdixganse2($idanac,'SIGL','M2',$bdd); echo   $nbadmissupdixganse2SIGLM2;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
        $nbadmissupdixanse2SIGLM2=nbadmissupdixanse2($idanac,'SIGL','M2',$bdd); echo   $nbadmissupdixanse2SIGLM2;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixSIGLM2= number_format((nbadmissupdixanse2($idanac,'SIGL','M2',$bdd)*100)/nbpresentanse2($idanac,'SIGL','M2',$bdd),2); echo $pourcentsupdixSIGLM2;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

        $nbadmisdecisfanse2SIGLM2=nbadmisdecisfanse2($idanac,'SIGL','M2',$bdd); echo   $nbadmisdecisfanse2SIGLM2;

        ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


        $nbadmisdecisganse2SIGLM2=nbadmisdecisganse2($idanac,'SIGL','M2',$bdd); echo     $nbadmisdecisganse2SIGLM2;

        ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

        $nbadmisdecisanse2SIGLM2=nbadmisdecisanse2($idanac,'SIGL','M2',$bdd); echo       $nbadmisdecisanse2SIGLM2;



        ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisSIGLM2= number_format((nbadmisdecisanse2($idanac,'SIGL','M2',$bdd)*100)/nbpresentanse2($idanac,'SIGL','M2',$bdd),2); echo $pourcentdecisSIGLM2;?></td>


        </tr>
        <tr>




            <td style="text-align: center; border: solid 1px black; ">  SITW </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbstudentfofclassspecSITWM2=nbstudentfofclassspec($idanac,'SITW','M2',$bdd); echo $nbstudentfofclassspecSITWM2 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbstudentgofclassspecSITWM2=nbstudentgofclassspec($idanac,'SITW','M2',$bdd); echo $nbstudentgofclassspecSITWM2;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbstudentofclassspecSITWM2=nbstudentofclassspec($idanac,'SITW','M2',$bdd);echo $nbstudentofclassspecSITWM2;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanse2SITWM2=nbpresentanse2($idanac,'SITW','M2',$bdd);echo $nbpresentanse2SITWM2 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanse2SITWM2=nbadmissupzfanse2($idanac,'SITW','M2',$bdd); echo $nbadmissupzfanse2SITWM2 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzganse2sSITWM2=nbadmissupzganse2($idanac,'SITW','M2',$bdd); echo $nbadmissupzganse2sSITWM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanse2SITWM2=nbadmissupzanse2($idanac,'SITW','M2',$bdd); echo $nbadmissupzanse2SITWM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzSITWM2= number_format((nbadmissupzanse2($idanac,'SITW','M2',$bdd)*100)/nbpresentanse2($idanac,'SITW','M2',$bdd),2); echo $pourcentsupzSITWM2;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanse2SITWM2=nbadmisinfdfanse2($idanac,'SITW','M2',$bdd); echo $nbadmisinfdfanse2SITWM2 ;



        ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
        $nbadmisinfdganse2SITWM2=nbadmisinfdganse2($idanac,'SITW','M2',$bdd); echo    $nbadmisinfdganse2SITWM2;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanse2SITWM2=nbadmisinfdanse2($idanac,'SITW','M2',$bdd); echo   $nbadmisinfdanse2SITWM2;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdSITWM2= number_format((nbadmisinfdanse2($idanac,'SITW','M2',$bdd)*100)/nbpresentanse2($idanac,'SITW','M2',$bdd),2); echo $pourcentinfdSITWM2;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

        $nbadmissupdixfanse2SITWM2=nbadmissupdixfanse2($idanac,'SITW','M2',$bdd); echo   $nbadmissupdixfanse2SITWM2


        ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

        $nbadmissupdixganse2SITWM2=nbadmissupdixganse2($idanac,'SITW','M2',$bdd); echo   $nbadmissupdixganse2SITWM2;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
        $nbadmissupdixanse2SITWM2=nbadmissupdixanse2($idanac,'SITW','M2',$bdd); echo   $nbadmissupdixanse2SITWM2;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixSITWM2= number_format((nbadmissupdixanse2($idanac,'SITW','M2',$bdd)*100)/nbpresentanse2($idanac,'SITW','M2',$bdd),2); echo $pourcentsupdixSITWM2;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

        $nbadmisdecisfanse2SITWM2=nbadmisdecisfanse2($idanac,'SITW','M2',$bdd); echo   $nbadmisdecisfanse2SITWM2;

        ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


        $nbadmisdecisganse2SITWM2=nbadmisdecisganse2($idanac,'SITW','M2',$bdd); echo     $nbadmisdecisganse2SITWM2;

        ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

        $nbadmisdecisanse2SITWM2=nbadmisdecisanse2($idanac,'SITW','M2',$bdd); echo       $nbadmisdecisanse2SITWM2;



        ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisSITWM2= number_format((nbadmisdecisanse2($idanac,'SITW','M2',$bdd)*100)/nbpresentanse2($idanac,'SITW','M2',$bdd),2); echo $pourcentdecisSITWM2;?></td>


        </tr>

        <tr>




            <td style="text-align: center; border: solid 1px black; ">  RTEL </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbstudentfofclassspecRTELM2=nbstudentfofclassspec($idanac,'RTEL','M2',$bdd); echo $nbstudentfofclassspecRTELM2 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbstudentgofclassspecRTELM2=nbstudentgofclassspec($idanac,'RTEL','M2',$bdd); echo $nbstudentgofclassspecRTELM2;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbstudentofclassspecRTELM2=nbstudentofclassspec($idanac,'RTEL','M2',$bdd);echo $nbstudentofclassspecRTELM2;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanse2RTELM2=nbpresentanse2($idanac,'RTEL','M2',$bdd);echo $nbpresentanse2RTELM2 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanse2RTELM2=nbadmissupzfanse2($idanac,'RTEL','M2',$bdd); echo $nbadmissupzfanse2RTELM2 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzganse2sRTELM2=nbadmissupzganse2($idanac,'RTEL','M2',$bdd); echo $nbadmissupzganse2sRTELM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanse2RTELM2=nbadmissupzanse2($idanac,'RTEL','M2',$bdd); echo $nbadmissupzanse2RTELM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzRTELM2= number_format((nbadmissupzanse2($idanac,'RTEL','M2',$bdd)*100)/nbpresentanse2($idanac,'RTEL','M2',$bdd),2); echo $pourcentsupzRTELM2;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanse2RTELM2=nbadmisinfdfanse2($idanac,'RTEL','M2',$bdd); echo $nbadmisinfdfanse2RTELM2 ;



        ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
        $nbadmisinfdganse2RTELM2=nbadmisinfdganse2($idanac,'RTEL','M2',$bdd); echo    $nbadmisinfdganse2RTELM2;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanse2RTELM2=nbadmisinfdanse2($idanac,'RTEL','M2',$bdd); echo   $nbadmisinfdanse2RTELM2;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdRTELM2= number_format((nbadmisinfdanse2($idanac,'RTEL','M2',$bdd)*100)/nbpresentanse2($idanac,'RTEL','M2',$bdd),2); echo $pourcentinfdRTELM2;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

        $nbadmissupdixfanse2RTELM2=nbadmissupdixfanse2($idanac,'RTEL','M2',$bdd); echo   $nbadmissupdixfanse2RTELM2


        ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

        $nbadmissupdixganse2RTELM2=nbadmissupdixganse2($idanac,'RTEL','M2',$bdd); echo   $nbadmissupdixganse2RTELM2;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
        $nbadmissupdixanse2RTELM2=nbadmissupdixanse2($idanac,'RTEL','M2',$bdd); echo   $nbadmissupdixanse2RTELM2;


        ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixRTELM2= number_format((nbadmissupdixanse2($idanac,'RTEL','M2',$bdd)*100)/nbpresentanse2($idanac,'RTEL','M2',$bdd),2); echo $pourcentsupdixRTELM2;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

        $nbadmisdecisfanse2RTELM2=nbadmisdecisfanse2($idanac,'RTEL','M2',$bdd); echo   $nbadmisdecisfanse2RTELM2;

        ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


        $nbadmisdecisganse2RTELM2=nbadmisdecisganse2($idanac,'RTEL','M2',$bdd); echo     $nbadmisdecisganse2RTELM2;

        ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

        $nbadmisdecisanse2RTELM2=nbadmisdecisanse2($idanac,'RTEL','M2',$bdd); echo       $nbadmisdecisanse2RTELM2;



        ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisRTELM2= number_format((nbadmisdecisanse2($idanac,'RTEL','M2',$bdd)*100)/nbpresentanse2($idanac,'RTEL','M2',$bdd),2); echo $pourcentdecisRTELM2;?></td>


        </tr>


        <tr>




            <td style="text-align: center; border: solid 1px black; ">  MDSI </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbstudentfofclassspecMDSIM2=nbstudentfofclassspec($idanac,'MDSI','M2',$bdd); echo $nbstudentfofclassspecMDSIM2 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbstudentgofclassspecMDSIM2=nbstudentgofclassspec($idanac,'MDSI','M2',$bdd); echo $nbstudentgofclassspecMDSIM2;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbstudentofclassspecMDSIM2=nbstudentofclassspec($idanac,'MDSI','M2',$bdd);echo $nbstudentofclassspecMDSIM2;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanse2MDSIM2=nbpresentanse2($idanac,'MDSI','M2',$bdd);echo $nbpresentanse2MDSIM2 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanse2MDSIM2=nbadmissupzfanse2($idanac,'MDSI','M2',$bdd); echo $nbadmissupzfanse2MDSIM2 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzganse2sMDSIM2=nbadmissupzganse2($idanac,'MDSI','M2',$bdd); echo $nbadmissupzganse2sMDSIM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanse2MDSIM2=nbadmissupzanse2($idanac,'MDSI','M2',$bdd); echo $nbadmissupzanse2MDSIM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzMDSIM2= number_format((nbadmissupzanse2($idanac,'MDSI','M2',$bdd)*100)/nbpresentanse2($idanac,'MDSI','M2',$bdd),2); echo $pourcentsupzMDSIM2;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanse2MDSIM2=nbadmisinfdfanse2($idanac,'MDSI','M2',$bdd); echo $nbadmisinfdfanse2MDSIM2 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganse2MDSIM2=nbadmisinfdganse2($idanac,'MDSI','M2',$bdd); echo    $nbadmisinfdganse2MDSIM2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanse2MDSIM2=nbadmisinfdanse2($idanac,'MDSI','M2',$bdd); echo   $nbadmisinfdanse2MDSIM2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdMDSIM2= number_format((nbadmisinfdanse2($idanac,'MDSI','M2',$bdd)*100)/nbpresentanse2($idanac,'MDSI','M2',$bdd),2); echo $pourcentinfdMDSIM2;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanse2MDSIM2=nbadmissupdixfanse2($idanac,'MDSI','M2',$bdd); echo   $nbadmissupdixfanse2MDSIM2


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganse2MDSIM2=nbadmissupdixganse2($idanac,'MDSI','M2',$bdd); echo   $nbadmissupdixganse2MDSIM2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanse2MDSIM2=nbadmissupdixanse2($idanac,'MDSI','M2',$bdd); echo   $nbadmissupdixanse2MDSIM2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixMDSIM2= number_format((nbadmissupdixanse2($idanac,'MDSI','M2',$bdd)*100)/nbpresentanse2($idanac,'MDSI','M2',$bdd),2); echo $pourcentsupdixMDSIM2;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanse2MDSIM2=nbadmisdecisfanse2($idanac,'MDSI','M2',$bdd); echo   $nbadmisdecisfanse2MDSIM2;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganse2MDSIM2=nbadmisdecisganse2($idanac,'MDSI','M2',$bdd); echo     $nbadmisdecisganse2MDSIM2;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanse2MDSIM2=nbadmisdecisanse2($idanac,'MDSI','M2',$bdd); echo       $nbadmisdecisanse2MDSIM2;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisMDSIM2= number_format((nbadmisdecisanse2($idanac,'MDSI','M2',$bdd)*100)/nbpresentanse2($idanac,'MDSI','M2',$bdd),2); echo $pourcentdecisMDSIM2;?></td>


        </tr>

        <tr>




            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ;" height="20px;"  colspan="2" >  <strong>TOTAL </strong></td>


            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbstudentfofclassspecM2=$nbstudentfofclassspecSIGLM2+$nbstudentfofclassspecSITWM2+$nbstudentfofclassspecRTELM2 +$nbstudentfofclassspecMDSIM2 ; echo $nbstudentfofclassspecM2;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbstudentgofclassspecM2=$nbstudentgofclassspecSIGLM2+$nbstudentgofclassspecSITWM2 + $nbstudentgofclassspecRTELM2  + $nbstudentgofclassspecMDSIM2;echo $nbstudentgofclassspecM2;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbstudentofclassspecM2=$nbstudentofclassspecSIGLM2+$nbstudentofclassspecSITWM2 + $nbstudentofclassspecRTELM2 + $nbstudentofclassspecMDSIM2 ; echo $nbstudentofclassspecM2;?></td>


            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbpresentM2= $nbpresentanse2SIGLM2+$nbpresentanse2SITWM2+$nbpresentanse2RTELM2 +$nbpresentanse2MDSIM2 ; echo $nbpresentM2 ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzfM2=$nbadmissupzfanse2SIGLM2+$nbadmissupzfanse2SITWM2+$nbadmissupzfanse2RTELM2 +$nbadmissupzfanse2MDSIM2 ; echo $nbadmissupzfM2; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzgM2=$nbadmissupzganse2sSIGLM2+$nbadmissupzganse2sSITWM2 + $nbadmissupzganse2sRTELM2 + $nbadmissupzganse2sMDSIM2 ;echo $nbadmissupzgM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbadmissupzM2=$nbadmissupzanse2SIGLM2 +$nbadmissupzanse2SITWM2 + $nbadmissupzanse2RTELM2 + $nbadmissupzanse2MDSIM2 ; echo $nbadmissupzM2 ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php  $pourcentsupzM2= number_format((($nbadmissupzM2*100)/$nbpresentM2),3); echo $pourcentsupzM2;?></td>



            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmisinfdfM2=$nbadmisinfdfanse2SIGLM2+$nbadmisinfdfanse2SITWM2+$nbadmisinfdfanse2RTELM2 +$nbadmisinfdfanse2MDSIM2 ;echo $nbadmisinfdfM2; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $nbadmisinfdgM2=$nbadmisinfdganse2SIGLM2+$nbadmisinfdganse2SITWM2  + $nbadmisinfdganse2RTELM2 + $nbadmisinfdganse2MDSIM2 ;echo $nbadmisinfdgM2; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisinfdM2=$nbadmisinfdanse2SIGLM2+$nbadmisinfdanse2SITWM2+ $nbadmisinfdanse2RTELM2 + $nbadmisinfdanse2MDSIM2; echo $nbadmisinfdM2; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentinfdM2= number_format((($nbadmisinfdM2*100)/$nbpresentM2),2); echo $pourcentinfdM2;?></td>





            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupdixfM2=$nbadmissupdixfanse2SIGLM2+$nbadmissupdixfanse2SITWM2+$nbadmissupdixfanse2RTELM2 +$nbadmissupdixfanse2MDSIM2 ; echo $nbadmissupdixfM2 ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmissupdixgM2 = $nbadmissupdixganse2SIGLM2 +$nbadmissupdixganse2SITWM2+ $nbadmissupdixganse2RTELM2  + $nbadmissupdixganse2MDSIM2; echo $nbadmissupdixgM2 ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php $nbadmissupdixM2 = $nbadmissupdixanse2SIGLM2 +$nbadmissupdixanse2SITWM2 + $nbadmissupdixanse2RTELM2 + $nbadmissupdixanse2MDSIM2 ; echo $nbadmissupdixM2; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentsupdixM2= number_format((($nbadmissupdixM2*100)/$nbpresentM2),2); echo $pourcentsupdixM2;?></td>

            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisdecisfM2=$nbadmisdecisfanse2SIGLM2+$nbadmisdecisfanse2SITWM2 + $nbadmisdecisfanse2RTELM2 + $nbadmisdecisfanse2MDSIM2 ; echo $nbadmisdecisfM2; ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbadmisdecisgM2= $nbadmisdecisganse2SIGLM2+$nbadmisdecisganse2SITWM2+ $nbadmisdecisganse2RTELM2  + $nbadmisdecisganse2MDSIM2;echo $nbadmisdecisgM2; ?></td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmisdecisM2= $nbadmisdecisanse2SIGLM2 +$nbadmisdecisanse2SITWM2+ $nbadmisdecisanse2RTELM2 + $nbadmisdecisanse2MDSIM2 ; echo $nbadmisdecisM2; ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentdecisM2= number_format((($nbadmisdecisM2*100)/$nbpresentM2),3); echo $pourcentdecisM2;?></td>


        </tr>




        <tr>




            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ;" height="20px;"  colspan="2" >  <strong>TOTAL MASTER </strong></td>


            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbetudiantfMASTER=$nbstudentfofclassspecM2+ $nbstudentfofclassspecM1; echo $nbetudiantfMASTER;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbetudiantgMASTER=$nbstudentgofclassspecM2+ $nbstudentgofclassspecM1 ;echo $nbetudiantgMASTER;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbetudiantMASTER=$nbstudentofclassspecM2+ $nbstudentofclassspecM1; echo $nbetudiantMASTER;?></td>


            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbpresentMASTER= $nbpresentM1+$nbpresentM2; echo $nbpresentMASTER ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzfMASTER=$nbadmissupzfM1+$nbadmissupzfM2 ; echo $nbadmissupzfMASTER; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzgMASTER=$nbadmissupzgM1+$nbadmissupzgM2  ;echo $nbadmissupzgMASTER; ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbadmissupzMASTER=$nbadmissupzM1 + $nbadmissupzM2 ; echo $nbadmissupzMASTER ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php  $pourcentsupzMASTER= number_format((($nbadmissupzMASTER*100)/$nbpresentMASTER),3); echo $pourcentsupzMASTER;?></td>



            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmisinfdfMASTER=$nbadmisinfdfM1+$nbadmisinfdfM2;echo $nbadmisinfdfMASTER; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $nbadmisinfdgMASTER= $nbadmisinfdgM1+ $nbadmisinfdgM2 ;echo $nbadmisinfdgMASTER; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisinfdMASTER=$nbadmisinfdM1+$nbadmisinfdM2 ; echo $nbadmisinfdMASTER; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentinfdMASTER= number_format((($nbadmisinfdMASTER*100)/$nbpresentMASTER),2); echo $pourcentinfdMASTER;?></td>





            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupdixfMASTER=$nbadmissupdixfM1+$nbadmissupdixfM2; echo $nbadmissupdixfMASTER ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmissupdixgMASTER = $nbadmissupdixgM1+$nbadmissupdixgM2 ; echo $nbadmissupdixgMASTER ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php $nbadmissupdixMASTER = $nbadmissupdixM1+$nbadmissupdixM2  ; echo $nbadmissupdixMASTER; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentsupdixMASTER= number_format((($nbadmissupdixMASTER*100)/$nbpresentMASTER),2); echo $pourcentsupdixMASTER;?></td>

            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisdecisfMASTER=$nbadmisdecisfM1+$nbadmisdecisfM2 ; echo $nbadmisdecisfMASTER; ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbadmisdecisgMASTER= $nbadmisdecisgM1+$nbadmisdecisgM2 ;echo $nbadmisdecisgMASTER; ?></td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmisdecisMASTER= $nbadmisdecisM1 +$nbadmisdecisM2 ; echo $nbadmisdecisMASTER; ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentdecisMASTER= number_format((($nbadmisdecisMASTER*100)/$nbpresentMASTER),3); echo $pourcentdecisMASTER;?></td>


        </tr>


        <tr>




            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ;" height="20px;"  colspan="2" >  <strong>TOTAL ANNEE-ACADEMIQUE </strong></td>


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




