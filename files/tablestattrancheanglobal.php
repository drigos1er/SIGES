<?php
include("myfunctions.php");
?>
<page  backbottom="5mm" backtop="1mm" >



    <table width="auto" border="0" cellspacing="0">
        <tr>
            <td><img src="esatic.jpg"  alt="logoesatic" style="margin-left: 50px;" /> </td> <td><span style="font-size:14px; margin-left:600px;">REPUBLIQUE DE CÔTE D'IVOIRE</span></td>
        </tr> <tr><td style="font-size:14px; margin-left:50px; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.....................</td> <td><span style="font-size:14px; margin-left:670px;">.....................</span></td> </tr>
        <tr> <td><span style="font-size:14px; margin-left:12px; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>DIRECTION DE LA PEDAGOGIE</strong></span></td><td><span style="font-size:14px; margin-left:630px;"><strong>Union-Discipline-Travail</strong> </span></td></tr>
    </table>



    <page_footer>

        <span style="margin-left:10px; font-size:10px; margin-top:150px;  font-style:italic;"> <?php echo $date;?></span>   <span style="margin-left:400px;font-size:10px; margin-top:150px; font-weight:bold; "><strong>  </strong></span><span style="margin-left:480px; font-size:10px; margin-top:150px;  font-style:italic;">  [[page_cu]]/[[page_nb]]</span>
    </page_footer>
    <div  style="margin-top:20px; width:80%; margin-left:100px; text-align:center; font-size:22px; font-weight: bold; border: double; background-color:#CCC;"> STATISTIQUES  DE L'ANNEE ACADEMIQUE    &nbsp;  <strong><?php echo $idanac;?></strong>&nbsp;  </div>



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

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbetudiantfSRITL1=nbstudentfofclassspec($idanac,'SRIT','L1',$bdd); echo $nbetudiantfSRITL1 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbetudiantgSRITL1=nbstudentgofclassspec($idanac,'SRIT','L1',$bdd); echo $nbetudiantgSRITL1;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbetudiantSRITL1=nbstudentofclassspec($idanac,'SRIT','L1',$bdd);echo $nbetudiantSRITL1;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanSRITL1=nbpresentan($idanac,'SRIT','L1',$bdd);echo $nbpresentanSRITL1 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanSRITL1=nbadmissupzfan($idanac,'SRIT','L1',$bdd); echo $nbadmissupzfanSRITL1 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzgansSRITL1=nbadmissupzgan($idanac,'SRIT','L1',$bdd); echo $nbadmissupzgansSRITL1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanSRITL1=nbadmissupzan($idanac,'SRIT','L1',$bdd); echo $nbadmissupzanSRITL1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzSRITL1= number_format((nbadmissupzan($idanac,'SRIT','L1',$bdd)*100)/nbpresentan($idanac,'SRIT','L1',$bdd),2); echo $pourcentsupzSRITL1;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanSRITL1=nbadmisinfdfan($idanac,'SRIT','L1',$bdd); echo $nbadmisinfdfanSRITL1 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganSRITL1=nbadmisinfdgan($idanac,'SRIT','L1',$bdd); echo    $nbadmisinfdganSRITL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanSRITL1=nbadmisinfdan($idanac,'SRIT','L1',$bdd); echo   $nbadmisinfdanSRITL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdSRITL1= number_format((nbadmisinfdan($idanac,'SRIT','L1',$bdd)*100)/nbpresentan($idanac,'SRIT','L1',$bdd),2); echo $pourcentinfdSRITL1;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanSRITL1=nbadmissupdixfan($idanac,'SRIT','L1',$bdd); echo   $nbadmissupdixfanSRITL1


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganSRITL1=nbadmissupdixgan($idanac,'SRIT','L1',$bdd); echo   $nbadmissupdixganSRITL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanSRITL1=nbadmissupdixan($idanac,'SRIT','L1',$bdd); echo   $nbadmissupdixanSRITL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixSRITL1= number_format((nbadmissupdixan($idanac,'SRIT','L1',$bdd)*100)/nbpresentan($idanac,'SRIT','L1',$bdd),2); echo $pourcentsupdixSRITL1;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanSRITL1=nbadmisdecisfan($idanac,'SRIT','L1',$bdd); echo   $nbadmisdecisfanSRITL1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganSRITL1=nbadmisdecisgan($idanac,'SRIT','L1',$bdd); echo     $nbadmisdecisganSRITL1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanSRITL1=nbadmisdecisan($idanac,'SRIT','L1',$bdd); echo       $nbadmisdecisanSRITL1;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisSRITL1= number_format((nbadmisdecisan($idanac,'SRIT','L1',$bdd)*100)/nbpresentan($idanac,'SRIT','L1',$bdd),2); echo $pourcentdecisSRITL1;?></td>


        </tr>

        <tr>




            <td style="text-align: center; border: solid 1px black; ">  RTEL </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbetudiantfRTELL1=nbstudentfofclassspec($idanac,'RTEL','L1',$bdd); echo $nbetudiantfRTELL1 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbetudiantgRTELL1=nbstudentgofclassspec($idanac,'RTEL','L1',$bdd); echo $nbetudiantgRTELL1;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbetudiantRTELL1=nbstudentofclassspec($idanac,'RTEL','L1',$bdd);echo $nbetudiantRTELL1;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanRTELL1=nbpresentan($idanac,'RTEL','L1',$bdd);echo $nbpresentanRTELL1 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanRTELL1=nbadmissupzfan($idanac,'RTEL','L1',$bdd); echo $nbadmissupzfanRTELL1 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzgansRTELL1=nbadmissupzgan($idanac,'RTEL','L1',$bdd); echo $nbadmissupzgansRTELL1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanRTELL1=nbadmissupzan($idanac,'RTEL','L1',$bdd); echo $nbadmissupzanRTELL1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzRTELL1= number_format((nbadmissupzan($idanac,'RTEL','L1',$bdd)*100)/nbpresentan($idanac,'RTEL','L1',$bdd),2); echo $pourcentsupzRTELL1;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanRTELL1=nbadmisinfdfan($idanac,'RTEL','L1',$bdd); echo $nbadmisinfdfanRTELL1 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganRTELL1=nbadmisinfdgan($idanac,'RTEL','L1',$bdd); echo    $nbadmisinfdganRTELL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanRTELL1=nbadmisinfdan($idanac,'RTEL','L1',$bdd); echo   $nbadmisinfdanRTELL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdRTELL1= number_format((nbadmisinfdan($idanac,'RTEL','L1',$bdd)*100)/nbpresentan($idanac,'RTEL','L1',$bdd),2); echo $pourcentinfdRTELL1;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanRTELL1=nbadmissupdixfan($idanac,'RTEL','L1',$bdd); echo   $nbadmissupdixfanRTELL1


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganRTELL1=nbadmissupdixgan($idanac,'RTEL','L1',$bdd); echo   $nbadmissupdixganRTELL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanRTELL1=nbadmissupdixan($idanac,'RTEL','L1',$bdd); echo   $nbadmissupdixanRTELL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixRTELL1= number_format((nbadmissupdixan($idanac,'RTEL','L1',$bdd)*100)/nbpresentan($idanac,'RTEL','L1',$bdd),2); echo $pourcentsupdixRTELL1;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanRTELL1=nbadmisdecisfan($idanac,'RTEL','L1',$bdd); echo   $nbadmisdecisfanRTELL1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganRTELL1=nbadmisdecisgan($idanac,'RTEL','L1',$bdd); echo     $nbadmisdecisganRTELL1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanRTELL1=nbadmisdecisan($idanac,'RTEL','L1',$bdd); echo       $nbadmisdecisanRTELL1;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisRTELL1= number_format((nbadmisdecisan($idanac,'RTEL','L1',$bdd)*100)/nbpresentan($idanac,'RTEL','L1',$bdd),2); echo $pourcentdecisRTELL1;?></td>


        </tr>

        <tr>




            <td style="text-align: center; border: solid 1px black; ">  SIGL </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbetudiantfSIGLL1=nbstudentfofclassspec($idanac,'SIGL','L1',$bdd); echo $nbetudiantfSIGLL1 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbetudiantgSIGLL1=nbstudentgofclassspec($idanac,'SIGL','L1',$bdd); echo $nbetudiantgSIGLL1;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbetudiantSIGLL1=nbstudentofclassspec($idanac,'SIGL','L1',$bdd);echo $nbetudiantSIGLL1;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanSIGLL1=nbpresentan($idanac,'SIGL','L1',$bdd);echo $nbpresentanSIGLL1 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanSIGLL1=nbadmissupzfan($idanac,'SIGL','L1',$bdd); echo $nbadmissupzfanSIGLL1 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzgansSIGLL1=nbadmissupzgan($idanac,'SIGL','L1',$bdd); echo $nbadmissupzgansSIGLL1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanSIGLL1=nbadmissupzan($idanac,'SIGL','L1',$bdd); echo $nbadmissupzanSIGLL1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzSIGLL1= number_format((nbadmissupzan($idanac,'SIGL','L1',$bdd)*100)/nbpresentan($idanac,'SIGL','L1',$bdd),2); echo $pourcentsupzSIGLL1;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanSIGLL1=nbadmisinfdfan($idanac,'SIGL','L1',$bdd); echo $nbadmisinfdfanSIGLL1 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganSIGLL1=nbadmisinfdgan($idanac,'SIGL','L1',$bdd); echo    $nbadmisinfdganSIGLL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanSIGLL1=nbadmisinfdan($idanac,'SIGL','L1',$bdd); echo   $nbadmisinfdanSIGLL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdSIGLL1= number_format((nbadmisinfdan($idanac,'SIGL','L1',$bdd)*100)/nbpresentan($idanac,'SIGL','L1',$bdd),2); echo $pourcentinfdSIGLL1;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanSIGLL1=nbadmissupdixfan($idanac,'SIGL','L1',$bdd); echo   $nbadmissupdixfanSIGLL1


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganSIGLL1=nbadmissupdixgan($idanac,'SIGL','L1',$bdd); echo   $nbadmissupdixganSIGLL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanSIGLL1=nbadmissupdixan($idanac,'SIGL','L1',$bdd); echo   $nbadmissupdixanSIGLL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixSIGLL1= number_format((nbadmissupdixan($idanac,'SIGL','L1',$bdd)*100)/nbpresentan($idanac,'SIGL','L1',$bdd),2); echo $pourcentsupdixSIGLL1;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanSIGLL1=nbadmisdecisfan($idanac,'SIGL','L1',$bdd); echo   $nbadmisdecisfanSIGLL1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganSIGLL1=nbadmisdecisgan($idanac,'SIGL','L1',$bdd); echo     $nbadmisdecisganSIGLL1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanSIGLL1=nbadmisdecisan($idanac,'SIGL','L1',$bdd); echo       $nbadmisdecisanSIGLL1;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisSIGLL1= number_format((nbadmisdecisan($idanac,'SIGL','L1',$bdd)*100)/nbpresentan($idanac,'SIGL','L1',$bdd),2); echo $pourcentdecisSIGLL1;?></td>


        </tr>


        <tr>




            <td style="text-align: center; border: solid 1px black; ">  TWIN </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbetudiantfTWINL1=nbstudentfofclassspec($idanac,'TWIN','L1',$bdd); echo $nbetudiantfTWINL1 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbetudiantgTWINL1=nbstudentgofclassspec($idanac,'TWIN','L1',$bdd); echo $nbetudiantgTWINL1;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbetudiantTWINL1=nbstudentofclassspec($idanac,'TWIN','L1',$bdd);echo $nbetudiantTWINL1;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanTWINL1=nbpresentan($idanac,'TWIN','L1',$bdd);echo $nbpresentanTWINL1 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanTWINL1=nbadmissupzfan($idanac,'TWIN','L1',$bdd); echo $nbadmissupzfanTWINL1 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzgansTWINL1=nbadmissupzgan($idanac,'TWIN','L1',$bdd); echo $nbadmissupzgansTWINL1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanTWINL1=nbadmissupzan($idanac,'TWIN','L1',$bdd); echo $nbadmissupzanTWINL1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzTWINL1= number_format((nbadmissupzan($idanac,'TWIN','L1',$bdd)*100)/nbpresentan($idanac,'TWIN','L1',$bdd),2); echo $pourcentsupzTWINL1;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanTWINL1=nbadmisinfdfan($idanac,'TWIN','L1',$bdd); echo $nbadmisinfdfanTWINL1 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganTWINL1=nbadmisinfdgan($idanac,'TWIN','L1',$bdd); echo    $nbadmisinfdganTWINL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanTWINL1=nbadmisinfdan($idanac,'TWIN','L1',$bdd); echo   $nbadmisinfdanTWINL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdTWINL1= number_format((nbadmisinfdan($idanac,'TWIN','L1',$bdd)*100)/nbpresentan($idanac,'TWIN','L1',$bdd),2); echo $pourcentinfdTWINL1;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanTWINL1=nbadmissupdixfan($idanac,'TWIN','L1',$bdd); echo   $nbadmissupdixfanTWINL1


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganTWINL1=nbadmissupdixgan($idanac,'TWIN','L1',$bdd); echo   $nbadmissupdixganTWINL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanTWINL1=nbadmissupdixan($idanac,'TWIN','L1',$bdd); echo   $nbadmissupdixanTWINL1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixTWINL1= number_format((nbadmissupdixan($idanac,'TWIN','L1',$bdd)*100)/nbpresentan($idanac,'TWIN','L1',$bdd),2); echo $pourcentsupdixTWINL1;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanTWINL1=nbadmisdecisfan($idanac,'TWIN','L1',$bdd); echo   $nbadmisdecisfanTWINL1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganTWINL1=nbadmisdecisgan($idanac,'TWIN','L1',$bdd); echo     $nbadmisdecisganTWINL1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanTWINL1=nbadmisdecisan($idanac,'TWIN','L1',$bdd); echo       $nbadmisdecisanTWINL1;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisTWINL1= number_format((nbadmisdecisan($idanac,'TWIN','L1',$bdd)*100)/nbpresentan($idanac,'TWIN','L1',$bdd),2); echo $pourcentdecisTWINL1;?></td>


        </tr>



        <tr>




            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ;" height="20px;" colspan="2" >  <strong>TOTAL</strong></td>


            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbetudiantfL1=$nbetudiantfSRITL1 + $nbetudiantfSIGLL1 + $nbetudiantfRTELL1+ $nbetudiantfTWINL1; echo $nbetudiantfL1;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbetudiantgL1=$nbetudiantgSRITL1 +$nbetudiantgSIGLL1+$nbetudiantgRTELL1 +$nbetudiantgTWINL1;echo $nbetudiantgL1;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbetudiantL1=$nbetudiantSRITL1 + $nbetudiantSIGLL1 + $nbetudiantRTELL1 + $nbetudiantTWINL1; echo $nbetudiantL1;?></td>


            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbpresentL1= $nbpresentanSRITL1  + $nbpresentanSIGLL1   + $nbpresentanRTELL1 + $nbpresentanTWINL1; echo $nbpresentL1 ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzfL1=$nbadmissupzfanSRITL1 + $nbadmissupzfanSIGLL1 + $nbadmissupzfanRTELL1 + $nbadmissupzfanTWINL1; echo $nbadmissupzfL1; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzgL1=$nbadmissupzgansSRITL1 + $nbadmissupzgansSIGLL1 + $nbadmissupzgansRTELL1 + $nbadmissupzgansTWINL1;echo $nbadmissupzgL1; ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbadmissupzL1=$nbadmissupzanTWINL1 + $nbadmissupzanSRITL1  + $nbadmissupzanRTELL1  + $nbadmissupzanSIGLL1; echo $nbadmissupzL1 ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php  $pourcentsupzL1= number_format((($nbadmissupzL1*100)/$nbpresentL1),2); echo $pourcentsupzL1;?></td>



            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmisinfdfL1=$nbadmisinfdfanSRITL1 + $nbadmisinfdfanSIGLL1 + $nbadmisinfdfanRTELL1 + $nbadmisinfdfanTWINL1 ;echo $nbadmisinfdfL1; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $nbadmisinfdgL1=$nbadmisinfdganSRITL1+ $nbadmisinfdganSIGLL1 + $nbadmisinfdganRTELL1 + $nbadmisinfdganTWINL1;echo $nbadmisinfdgL1; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisinfdL1=$nbadmisinfdanSRITL1  + $nbadmisinfdanSIGLL1 + $nbadmisinfdanRTELL1+ $nbadmisinfdanTWINL1; echo $nbadmisinfdL1; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentinfdL1= number_format((($nbadmisinfdL1*100)/$nbpresentL1),2); echo $pourcentinfdL1;?></td>





            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupdixfL1=$nbadmissupdixfanSRITL1 + $nbadmissupdixfanSIGLL1 + $nbadmissupdixfanRTELL1 + $nbadmissupdixfanTWINL1 ; echo $nbadmissupdixfL1 ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmissupdixgL1 = $nbadmissupdixganSRITL1 + $nbadmissupdixganTWINL1 + $nbadmissupdixganSIGLL1 + $nbadmissupdixganRTELL1; echo $nbadmissupdixgL1 ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php $nbadmissupdixL1 = $nbadmissupdixanSRITL1 + $nbadmissupdixanTWINL1 + $nbadmissupdixanSIGLL1 + $nbadmissupdixanRTELL1; echo $nbadmissupdixL1; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentsupdixL1= number_format((($nbadmissupdixL1*100)/$nbpresentL1),2); echo $pourcentsupdixL1;?></td>

            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisdecisfL1=$nbadmisdecisfanSRITL1 + $nbadmisdecisfanTWINL1 + $nbadmisdecisfanSIGLL1 + $nbadmisdecisfanRTELL1; echo $nbadmisdecisfL1; ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbadmisdecisgL1= $nbadmisdecisganSRITL1 + $nbadmisdecisganTWINL1 + $nbadmisdecisganSIGLL1 + $nbadmisdecisganRTELL1;echo $nbadmisdecisgL1; ?></td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmisdecisL1= $nbadmisdecisanSRITL1 + $nbadmisdecisanTWINL1 + $nbadmisdecisanSIGLL1 + $nbadmisdecisanRTELL1 ; echo $nbadmisdecisL1; ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentdecisL1= number_format((($nbadmisdecisL1*100)/$nbpresentL1),2); echo $pourcentdecisL1;?></td>


        </tr>

        <tr>



            <td style="text-align: center; border: solid 1px black; "  rowspan="4"> <strong>LICENCE 2</strong></td>
            <td style="text-align: center; border: solid 1px black; ">  SRIT </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbetudiantfSRITL2=nbstudentfofclassspec($idanac,'SRIT','L2',$bdd); echo $nbetudiantfSRITL2 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbetudiantgSRITL2=nbstudentgofclassspec($idanac,'SRIT','L2',$bdd); echo $nbetudiantgSRITL2;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbetudiantSRITL2=nbstudentofclassspec($idanac,'SRIT','L2',$bdd);echo $nbetudiantSRITL2;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanSRITL2=nbpresentan($idanac,'SRIT','L2',$bdd);echo $nbpresentanSRITL2 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanSRITL2=nbadmissupzfan($idanac,'SRIT','L2',$bdd); echo $nbadmissupzfanSRITL2 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzgansSRITL2=nbadmissupzgan($idanac,'SRIT','L2',$bdd); echo $nbadmissupzgansSRITL2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanSRITL2=nbadmissupzan($idanac,'SRIT','L2',$bdd); echo $nbadmissupzanSRITL2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzSRITL2= number_format((nbadmissupzan($idanac,'SRIT','L2',$bdd)*100)/nbpresentan($idanac,'SRIT','L2',$bdd),2); echo $pourcentsupzSRITL2;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanSRITL2=nbadmisinfdfan($idanac,'SRIT','L2',$bdd); echo $nbadmisinfdfanSRITL2 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganSRITL2=nbadmisinfdgan($idanac,'SRIT','L2',$bdd); echo    $nbadmisinfdganSRITL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanSRITL2=nbadmisinfdan($idanac,'SRIT','L2',$bdd); echo   $nbadmisinfdanSRITL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdSRITL2= number_format((nbadmisinfdan($idanac,'SRIT','L2',$bdd)*100)/nbpresentan($idanac,'SRIT','L2',$bdd),2); echo $pourcentinfdSRITL2;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanSRITL2=nbadmissupdixfan($idanac,'SRIT','L2',$bdd); echo   $nbadmissupdixfanSRITL2


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganSRITL2=nbadmissupdixgan($idanac,'SRIT','L2',$bdd); echo   $nbadmissupdixganSRITL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanSRITL2=nbadmissupdixan($idanac,'SRIT','L2',$bdd); echo   $nbadmissupdixanSRITL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixSRITL2= number_format((nbadmissupdixan($idanac,'SRIT','L2',$bdd)*100)/nbpresentan($idanac,'SRIT','L2',$bdd),2); echo $pourcentsupdixSRITL2;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanSRITL2=nbadmisdecisfan($idanac,'SRIT','L2',$bdd); echo   $nbadmisdecisfanSRITL2;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganSRITL2=nbadmisdecisgan($idanac,'SRIT','L2',$bdd); echo     $nbadmisdecisganSRITL2;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanSRITL2=nbadmisdecisan($idanac,'SRIT','L2',$bdd); echo       $nbadmisdecisanSRITL2;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisSRITL2= number_format((nbadmisdecisan($idanac,'SRIT','L2',$bdd)*100)/nbpresentan($idanac,'SRIT','L2',$bdd),2); echo $pourcentdecisSRITL2;?></td>


        </tr>

        <tr>



            <td style="text-align: center; border: solid 1px black; ">  RTEL </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbetudiantfRTELL2=nbstudentfofclassspec($idanac,'RTEL','L2',$bdd); echo $nbetudiantfRTELL2 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbetudiantgRTELL2=nbstudentgofclassspec($idanac,'RTEL','L2',$bdd); echo $nbetudiantgRTELL2;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbetudiantRTELL2=nbstudentofclassspec($idanac,'RTEL','L2',$bdd);echo $nbetudiantRTELL2;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanRTELL2=nbpresentan($idanac,'RTEL','L2',$bdd);echo $nbpresentanRTELL2 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanRTELL2=nbadmissupzfan($idanac,'RTEL','L2',$bdd); echo $nbadmissupzfanRTELL2 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzgansRTELL2=nbadmissupzgan($idanac,'RTEL','L2',$bdd); echo $nbadmissupzgansRTELL2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanRTELL2=nbadmissupzan($idanac,'RTEL','L2',$bdd); echo $nbadmissupzanRTELL2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzRTELL2= number_format((nbadmissupzan($idanac,'RTEL','L2',$bdd)*100)/nbpresentan($idanac,'RTEL','L2',$bdd),2); echo $pourcentsupzRTELL2;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanRTELL2=nbadmisinfdfan($idanac,'RTEL','L2',$bdd); echo $nbadmisinfdfanRTELL2 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganRTELL2=nbadmisinfdgan($idanac,'RTEL','L2',$bdd); echo    $nbadmisinfdganRTELL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanRTELL2=nbadmisinfdan($idanac,'RTEL','L2',$bdd); echo   $nbadmisinfdanRTELL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdRTELL2= number_format((nbadmisinfdan($idanac,'RTEL','L2',$bdd)*100)/nbpresentan($idanac,'RTEL','L2',$bdd),2); echo $pourcentinfdRTELL2;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanRTELL2=nbadmissupdixfan($idanac,'RTEL','L2',$bdd); echo   $nbadmissupdixfanRTELL2


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganRTELL2=nbadmissupdixgan($idanac,'RTEL','L2',$bdd); echo   $nbadmissupdixganRTELL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanRTELL2=nbadmissupdixan($idanac,'RTEL','L2',$bdd); echo   $nbadmissupdixanRTELL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixRTELL2= number_format((nbadmissupdixan($idanac,'RTEL','L2',$bdd)*100)/nbpresentan($idanac,'RTEL','L2',$bdd),2); echo $pourcentsupdixRTELL2;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanRTELL2=nbadmisdecisfan($idanac,'RTEL','L2',$bdd); echo   $nbadmisdecisfanRTELL2;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganRTELL2=nbadmisdecisgan($idanac,'RTEL','L2',$bdd); echo     $nbadmisdecisganRTELL2;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanRTELL2=nbadmisdecisan($idanac,'RTEL','L2',$bdd); echo       $nbadmisdecisanRTELL2;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisRTELL2= number_format((nbadmisdecisan($idanac,'RTEL','L2',$bdd)*100)/nbpresentan($idanac,'RTEL','L2',$bdd),2); echo $pourcentdecisRTELL2;?></td>


        </tr>
        <tr>




            <td style="text-align: center; border: solid 1px black; ">  SIGL </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbetudiantfSIGLL2=nbstudentfofclassspec($idanac,'SIGL','L2',$bdd); echo $nbetudiantfSIGLL2 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbetudiantgSIGLL2=nbstudentgofclassspec($idanac,'SIGL','L2',$bdd); echo $nbetudiantgSIGLL2;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbetudiantSIGLL2=nbstudentofclassspec($idanac,'SIGL','L2',$bdd);echo $nbetudiantSIGLL2;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanSIGLL2=nbpresentan($idanac,'SIGL','L2',$bdd);echo $nbpresentanSIGLL2 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanSIGLL2=nbadmissupzfan($idanac,'SIGL','L2',$bdd); echo $nbadmissupzfanSIGLL2 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzgansSIGLL2=nbadmissupzgan($idanac,'SIGL','L2',$bdd); echo $nbadmissupzgansSIGLL2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanSIGLL2=nbadmissupzan($idanac,'SIGL','L2',$bdd); echo $nbadmissupzanSIGLL2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzSIGLL2= number_format((nbadmissupzan($idanac,'SIGL','L2',$bdd)*100)/nbpresentan($idanac,'SIGL','L2',$bdd),2); echo $pourcentsupzSIGLL2;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanSIGLL2=nbadmisinfdfan($idanac,'SIGL','L2',$bdd); echo $nbadmisinfdfanSIGLL2 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganSIGLL2=nbadmisinfdgan($idanac,'SIGL','L2',$bdd); echo    $nbadmisinfdganSIGLL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanSIGLL2=nbadmisinfdan($idanac,'SIGL','L2',$bdd); echo   $nbadmisinfdanSIGLL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdSIGLL2= number_format((nbadmisinfdan($idanac,'SIGL','L2',$bdd)*100)/nbpresentan($idanac,'SIGL','L2',$bdd),2); echo $pourcentinfdSIGLL2;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanSIGLL2=nbadmissupdixfan($idanac,'SIGL','L2',$bdd); echo   $nbadmissupdixfanSIGLL2


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganSIGLL2=nbadmissupdixgan($idanac,'SIGL','L2',$bdd); echo   $nbadmissupdixganSIGLL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanSIGLL2=nbadmissupdixan($idanac,'SIGL','L2',$bdd); echo   $nbadmissupdixanSIGLL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixSIGLL2= number_format((nbadmissupdixan($idanac,'SIGL','L2',$bdd)*100)/nbpresentan($idanac,'SIGL','L2',$bdd),2); echo $pourcentsupdixSIGLL2;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanSIGLL2=nbadmisdecisfan($idanac,'SIGL','L2',$bdd); echo   $nbadmisdecisfanSIGLL2;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganSIGLL2=nbadmisdecisgan($idanac,'SIGL','L2',$bdd); echo     $nbadmisdecisganSIGLL2;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanSIGLL2=nbadmisdecisan($idanac,'SIGL','L2',$bdd); echo       $nbadmisdecisanSIGLL2;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisSIGLL2= number_format((nbadmisdecisan($idanac,'SIGL','L2',$bdd)*100)/nbpresentan($idanac,'SIGL','L2',$bdd),2); echo $pourcentdecisSIGLL2;?></td>


        </tr>


        <tr>




            <td style="text-align: center; border: solid 1px black; ">  TWIN </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbetudiantfTWINL2=nbstudentfofclassspec($idanac,'TWIN','L2',$bdd); echo $nbetudiantfTWINL2 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbetudiantgTWINL2=nbstudentgofclassspec($idanac,'TWIN','L2',$bdd); echo $nbetudiantgTWINL2;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbetudiantTWINL2=nbstudentofclassspec($idanac,'TWIN','L2',$bdd);echo $nbetudiantTWINL2;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanTWINL2=nbpresentan($idanac,'TWIN','L2',$bdd);echo $nbpresentanTWINL2 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanTWINL2=nbadmissupzfan($idanac,'TWIN','L2',$bdd); echo $nbadmissupzfanTWINL2 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzgansTWINL2=nbadmissupzgan($idanac,'TWIN','L2',$bdd); echo $nbadmissupzgansTWINL2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanTWINL2=nbadmissupzan($idanac,'TWIN','L2',$bdd); echo $nbadmissupzanTWINL2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzTWINL2= number_format((nbadmissupzan($idanac,'TWIN','L2',$bdd)*100)/nbpresentan($idanac,'TWIN','L2',$bdd),2); echo $pourcentsupzTWINL2;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanTWINL2=nbadmisinfdfan($idanac,'TWIN','L2',$bdd); echo $nbadmisinfdfanTWINL2 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganTWINL2=nbadmisinfdgan($idanac,'TWIN','L2',$bdd); echo    $nbadmisinfdganTWINL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanTWINL2=nbadmisinfdan($idanac,'TWIN','L2',$bdd); echo   $nbadmisinfdanTWINL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdTWINL2= number_format((nbadmisinfdan($idanac,'TWIN','L2',$bdd)*100)/nbpresentan($idanac,'TWIN','L2',$bdd),2); echo $pourcentinfdTWINL2;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanTWINL2=nbadmissupdixfan($idanac,'TWIN','L2',$bdd); echo   $nbadmissupdixfanTWINL2


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganTWINL2=nbadmissupdixgan($idanac,'TWIN','L2',$bdd); echo   $nbadmissupdixganTWINL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanTWINL2=nbadmissupdixan($idanac,'TWIN','L2',$bdd); echo   $nbadmissupdixanTWINL2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixTWINL2= number_format((nbadmissupdixan($idanac,'TWIN','L2',$bdd)*100)/nbpresentan($idanac,'TWIN','L2',$bdd),2); echo $pourcentsupdixTWINL2;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanTWINL2=nbadmisdecisfan($idanac,'TWIN','L2',$bdd); echo   $nbadmisdecisfanTWINL2;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganTWINL2=nbadmisdecisgan($idanac,'TWIN','L2',$bdd); echo     $nbadmisdecisganTWINL2;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanTWINL2=nbadmisdecisan($idanac,'TWIN','L2',$bdd); echo       $nbadmisdecisanTWINL2;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisTWINL2= number_format((nbadmisdecisan($idanac,'TWIN','L2',$bdd)*100)/nbpresentan($idanac,'TWIN','L2',$bdd),2); echo $pourcentdecisTWINL2;?></td>


        </tr>








        <tr>




            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ;" height="20px;"  colspan="2">  <strong>TOTAL</strong></td>


            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbetudiantfL2=$nbetudiantfSRITL2+$nbetudiantfRTELL2 +$nbetudiantfSIGLL2 +$nbetudiantfTWINL2 ; echo $nbetudiantfL2;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbetudiantgL2=$nbetudiantgSRITL2 + $nbetudiantgRTELL2+ $nbetudiantgSIGLL2  + $nbetudiantgTWINL2;echo $nbetudiantgL2;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbetudiantL2=$nbetudiantSRITL2 + $nbetudiantRTELL2 + $nbetudiantSIGLL2 + $nbetudiantTWINL2; echo $nbetudiantL2;?></td>


            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbpresentL2= $nbpresentanSRITL2+$nbpresentanRTELL2 +$nbpresentanSIGLL2 +$nbpresentanTWINL2; echo $nbpresentL2 ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzfL2=$nbadmissupzfanSRITL2+$nbadmissupzfanRTELL2+$nbadmissupzfanSIGLL2 +$nbadmissupzfanTWINL2; echo $nbadmissupzfL2; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzgL2=$nbadmissupzgansSRITL2 + $nbadmissupzgansRTELL2  + $nbadmissupzgansSIGLL2 + $nbadmissupzgansTWINL2;echo $nbadmissupzgL2; ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbadmissupzL2=$nbadmissupzanRTELL2 + $nbadmissupzanSRITL2 + $nbadmissupzanTWINL2  + $nbadmissupzanSIGLL2; echo $nbadmissupzL2 ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php  $pourcentsupzL2= number_format((($nbadmissupzL2*100)/$nbpresentL2),2); echo $pourcentsupzL2;?></td>



            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmisinfdfL2=$nbadmisinfdfanSRITL2+$nbadmisinfdfanRTELL2 +$nbadmisinfdfanSIGLL2  +$nbadmisinfdfanTWINL2;echo $nbadmisinfdfL2; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $nbadmisinfdgL2=$nbadmisinfdganSRITL2 + $nbadmisinfdganRTELL2+ $nbadmisinfdganSIGLL2 + $nbadmisinfdganTWINL2;echo $nbadmisinfdgL2; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisinfdL2=$nbadmisinfdanSRITL2+ $nbadmisinfdanRTELL2 + $nbadmisinfdanSIGLL2 + $nbadmisinfdanTWINL2; echo $nbadmisinfdL2; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentinfdL2= number_format((($nbadmisinfdL2*100)/$nbpresentL2),2); echo $pourcentinfdL2;?></td>





            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupdixfL2=$nbadmissupdixfanSRITL2+$nbadmissupdixfanRTELL2+$nbadmissupdixfanSIGLL2 +$nbadmissupdixfanTWINL2; echo $nbadmissupdixfL2 ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmissupdixgL2 = $nbadmissupdixganSRITL2 + $nbadmissupdixganRTELL2+ $nbadmissupdixganSIGLL2 + $nbadmissupdixganTWINL2; echo $nbadmissupdixgL2 ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php $nbadmissupdixL2 = $nbadmissupdixanSRITL2 + $nbadmissupdixanRTELL2 + $nbadmissupdixanSIGLL2  + $nbadmissupdixanTWINL2; echo $nbadmissupdixL2; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentsupdixL2= number_format((($nbadmissupdixL2*100)/$nbpresentL2),2); echo $pourcentsupdixL2;?></td>

            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisdecisfL2=$nbadmisdecisfanSRITL2 + $nbadmisdecisfanRTELL2 + $nbadmisdecisfanSIGLL2 + $nbadmisdecisfanTWINL2; echo $nbadmisdecisfL2; ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbadmisdecisgL2= $nbadmisdecisganSRITL2 + $nbadmisdecisganRTELL2  + $nbadmisdecisganSIGLL2 + $nbadmisdecisganTWINL2;echo $nbadmisdecisgL2; ?></td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmisdecisL2= $nbadmisdecisanSRITL2 + $nbadmisdecisanRTELL2 + $nbadmisdecisanSIGLL2  + $nbadmisdecisanTWINL2; echo $nbadmisdecisL2; ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentdecisL2= number_format((($nbadmisdecisL2*100)/$nbpresentL2),2); echo $pourcentdecisL2;?></td>


        </tr>



        <tr>



            <td style="text-align: center; border: solid 1px black; "  rowspan="3"> <strong>LICENCE 3</strong></td>
            <td style="text-align: center; border: solid 1px black; ">  SRIT </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbetudiantfSRITL3=nbstudentfofclassspec($idanac,'SRIT','L3',$bdd); echo $nbetudiantfSRITL3 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbetudiantgSRITL3=nbstudentgofclassspec($idanac,'SRIT','L3',$bdd); echo $nbetudiantgSRITL3;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbetudiantSRITL3=nbstudentofclassspec($idanac,'SRIT','L3',$bdd);echo $nbetudiantSRITL3;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanSRITL3=nbpresentan($idanac,'SRIT','L3',$bdd);echo $nbpresentanSRITL3 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanSRITL3=nbadmissupzfan($idanac,'SRIT','L3',$bdd); echo $nbadmissupzfanSRITL3 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzgansSRITL3=nbadmissupzgan($idanac,'SRIT','L3',$bdd); echo $nbadmissupzgansSRITL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanSRITL3=nbadmissupzan($idanac,'SRIT','L3',$bdd); echo $nbadmissupzanSRITL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzSRITL3= number_format((nbadmissupzan($idanac,'SRIT','L3',$bdd)*100)/nbpresentan($idanac,'SRIT','L3',$bdd),2); echo $pourcentsupzSRITL3;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanSRITL3=nbadmisinfdfan($idanac,'SRIT','L3',$bdd); echo $nbadmisinfdfanSRITL3 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganSRITL3=nbadmisinfdgan($idanac,'SRIT','L3',$bdd); echo    $nbadmisinfdganSRITL3;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanSRITL3=nbadmisinfdan($idanac,'SRIT','L3',$bdd); echo   $nbadmisinfdanSRITL3;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdSRITL3= number_format((nbadmisinfdan($idanac,'SRIT','L3',$bdd)*100)/nbpresentan($idanac,'SRIT','L3',$bdd),2); echo $pourcentinfdSRITL3;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanSRITL3=nbadmissupdixfan($idanac,'SRIT','L3',$bdd); echo   $nbadmissupdixfanSRITL3


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganSRITL3=nbadmissupdixgan($idanac,'SRIT','L3',$bdd); echo   $nbadmissupdixganSRITL3;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanSRITL3=nbadmissupdixan($idanac,'SRIT','L3',$bdd); echo   $nbadmissupdixanSRITL3;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixSRITL3= number_format((nbadmissupdixan($idanac,'SRIT','L3',$bdd)*100)/nbpresentan($idanac,'SRIT','L3',$bdd),2); echo $pourcentsupdixSRITL3;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanSRITL3=nbadmisdecisfan($idanac,'SRIT','L3',$bdd); echo   $nbadmisdecisfanSRITL3;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganSRITL3=nbadmisdecisgan($idanac,'SRIT','L3',$bdd); echo     $nbadmisdecisganSRITL3;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanSRITL3=nbadmisdecisan($idanac,'SRIT','L3',$bdd); echo       $nbadmisdecisanSRITL3;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisSRITL3= number_format((nbadmisdecisan($idanac,'SRIT','L3',$bdd)*100)/nbpresentan($idanac,'SRIT','L3',$bdd),2); echo $pourcentdecisSRITL3;?></td>


        </tr>
        <tr>




            <td style="text-align: center; border: solid 1px black; ">  SIGL </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbetudiantfSIGLL3=nbstudentfofclassspec($idanac,'SIGL','L3',$bdd); echo $nbetudiantfSIGLL3 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbetudiantgSIGLL3=nbstudentgofclassspec($idanac,'SIGL','L3',$bdd); echo $nbetudiantgSIGLL3;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbetudiantSIGLL3=nbstudentofclassspec($idanac,'SIGL','L3',$bdd);echo $nbetudiantSIGLL3;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanSIGLL3=nbpresentan($idanac,'SIGL','L3',$bdd);echo $nbpresentanSIGLL3 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanSIGLL3=nbadmissupzfan($idanac,'SIGL','L3',$bdd); echo $nbadmissupzfanSIGLL3 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzgansSIGLL3=nbadmissupzgan($idanac,'SIGL','L3',$bdd); echo $nbadmissupzgansSIGLL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanSIGLL3=nbadmissupzan($idanac,'SIGL','L3',$bdd); echo $nbadmissupzanSIGLL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzSIGLL3= number_format((nbadmissupzan($idanac,'SIGL','L3',$bdd)*100)/nbpresentan($idanac,'SIGL','L3',$bdd),2); echo $pourcentsupzSIGLL3;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanSIGLL3=nbadmisinfdfan($idanac,'SIGL','L3',$bdd); echo $nbadmisinfdfanSIGLL3 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganSIGLL3=nbadmisinfdgan($idanac,'SIGL','L3',$bdd); echo    $nbadmisinfdganSIGLL3;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanSIGLL3=nbadmisinfdan($idanac,'SIGL','L3',$bdd); echo   $nbadmisinfdanSIGLL3;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdSIGLL3= number_format((nbadmisinfdan($idanac,'SIGL','L3',$bdd)*100)/nbpresentan($idanac,'SIGL','L3',$bdd),2); echo $pourcentinfdSIGLL3;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanSIGLL3=nbadmissupdixfan($idanac,'SIGL','L3',$bdd); echo   $nbadmissupdixfanSIGLL3


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganSIGLL3=nbadmissupdixgan($idanac,'SIGL','L3',$bdd); echo   $nbadmissupdixganSIGLL3;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanSIGLL3=nbadmissupdixan($idanac,'SIGL','L3',$bdd); echo   $nbadmissupdixanSIGLL3;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixSIGLL3= number_format((nbadmissupdixan($idanac,'SIGL','L3',$bdd)*100)/nbpresentan($idanac,'SIGL','L3',$bdd),2); echo $pourcentsupdixSIGLL3;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanSIGLL3=nbadmisdecisfan($idanac,'SIGL','L3',$bdd); echo   $nbadmisdecisfanSIGLL3;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganSIGLL3=nbadmisdecisgan($idanac,'SIGL','L3',$bdd); echo     $nbadmisdecisganSIGLL3;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanSIGLL3=nbadmisdecisan($idanac,'SIGL','L3',$bdd); echo       $nbadmisdecisanSIGLL3;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisSIGLL3= number_format((nbadmisdecisan($idanac,'SIGL','L3',$bdd)*100)/nbpresentan($idanac,'SIGL','L3',$bdd),2); echo $pourcentdecisSIGLL3;?></td>


        </tr>

        <tr>



            <td style="text-align: center; border: solid 1px black; ">  RTEL </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbetudiantfRTELL3=nbstudentfofclassspec($idanac,'RTEL','L3',$bdd); echo $nbetudiantfRTELL3 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbetudiantgRTELL3=nbstudentgofclassspec($idanac,'RTEL','L3',$bdd); echo $nbetudiantgRTELL3;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbetudiantRTELL3=nbstudentofclassspec($idanac,'RTEL','L3',$bdd);echo $nbetudiantRTELL3;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanRTELL3=nbpresentan($idanac,'RTEL','L3',$bdd);echo $nbpresentanRTELL3 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanRTELL3=nbadmissupzfan($idanac,'RTEL','L3',$bdd); echo $nbadmissupzfanRTELL3 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzgansRTELL3=nbadmissupzgan($idanac,'RTEL','L3',$bdd); echo $nbadmissupzgansRTELL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanRTELL3=nbadmissupzan($idanac,'RTEL','L3',$bdd); echo $nbadmissupzanRTELL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzRTELL3= number_format((nbadmissupzan($idanac,'RTEL','L3',$bdd)*100)/nbpresentan($idanac,'RTEL','L3',$bdd),2); echo $pourcentsupzRTELL3;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanRTELL3=nbadmisinfdfan($idanac,'RTEL','L3',$bdd); echo $nbadmisinfdfanRTELL3 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganRTELL3=nbadmisinfdgan($idanac,'RTEL','L3',$bdd); echo    $nbadmisinfdganRTELL3;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanRTELL3=nbadmisinfdan($idanac,'RTEL','L3',$bdd); echo   $nbadmisinfdanRTELL3;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdRTELL3= number_format((nbadmisinfdan($idanac,'RTEL','L3',$bdd)*100)/nbpresentan($idanac,'RTEL','L3',$bdd),2); echo $pourcentinfdRTELL3;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanRTELL3=nbadmissupdixfan($idanac,'RTEL','L3',$bdd); echo   $nbadmissupdixfanRTELL3


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganRTELL3=nbadmissupdixgan($idanac,'RTEL','L3',$bdd); echo   $nbadmissupdixganRTELL3;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanRTELL3=nbadmissupdixan($idanac,'RTEL','L3',$bdd); echo   $nbadmissupdixanRTELL3;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixRTELL3= number_format((nbadmissupdixan($idanac,'RTEL','L3',$bdd)*100)/nbpresentan($idanac,'RTEL','L3',$bdd),2); echo $pourcentsupdixRTELL3;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanRTELL3=nbadmisdecisfan($idanac,'RTEL','L3',$bdd); echo   $nbadmisdecisfanRTELL3;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganRTELL3=nbadmisdecisgan($idanac,'RTEL','L3',$bdd); echo     $nbadmisdecisganRTELL3;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanRTELL3=nbadmisdecisan($idanac,'RTEL','L3',$bdd); echo       $nbadmisdecisanRTELL3;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisRTELL3= number_format((nbadmisdecisan($idanac,'RTEL','L3',$bdd)*100)/nbpresentan($idanac,'RTEL','L3',$bdd),2); echo $pourcentdecisRTELL3;?></td>


        </tr>

        <tr>




            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ;" height="20px;"  colspan="2">  <strong>TOTAL</strong></td>


            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbetudiantfL3=$nbetudiantfSRITL3+$nbetudiantfRTELL3 +$nbetudiantfSIGLL3 /*+$nbetudiantfTWINL3 */; echo $nbetudiantfL3;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbetudiantgL3=$nbetudiantgSRITL3 + $nbetudiantgRTELL3+ $nbetudiantgSIGLL3 /*  + $nbetudiantgTWINL3*/;echo $nbetudiantgL3;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbetudiantL3=$nbetudiantSRITL3 + $nbetudiantRTELL3 + $nbetudiantSIGLL3 /*+ $nbetudiantTWINL3*/; echo $nbetudiantL3;?></td>


            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbpresentL3= $nbpresentanSRITL3+$nbpresentanRTELL3 +$nbpresentanSIGLL3 /*+$nbpresentanTWINL3*/; echo $nbpresentL3 ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzfL3=$nbadmissupzfanSRITL3+$nbadmissupzfanRTELL3+$nbadmissupzfanSIGLL3 /*+$nbadmissupzfanTWINL3*/; echo $nbadmissupzfL3; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzgL3=$nbadmissupzgansSRITL3 + $nbadmissupzgansRTELL3  + $nbadmissupzgansSIGLL3 /*+ $nbadmissupzgansTWINL3*/;echo $nbadmissupzgL3; ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbadmissupzL3=$nbadmissupzanRTELL3 + $nbadmissupzanSRITL3/* + $nbadmissupzanTWINL3*/  + $nbadmissupzanSIGLL3; echo $nbadmissupzL3 ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php  $pourcentsupzL3= number_format((($nbadmissupzL3*100)/$nbpresentL3),2); echo $pourcentsupzL3;?></td>



            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmisinfdfL3=$nbadmisinfdfanSRITL3+$nbadmisinfdfanRTELL3 +$nbadmisinfdfanSIGLL3 /* +$nbadmisinfdfanTWINL3*/;echo $nbadmisinfdfL3; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $nbadmisinfdgL3=$nbadmisinfdganSRITL3 + $nbadmisinfdganRTELL3+ $nbadmisinfdganSIGLL3 /*+ $nbadmisinfdganTWINL3*/;echo $nbadmisinfdgL3; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisinfdL3=$nbadmisinfdanSRITL3+ $nbadmisinfdanRTELL3 + $nbadmisinfdanSIGLL3 /*+ $nbadmisinfdanTWINL3*/; echo $nbadmisinfdL3; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentinfdL3= number_format((($nbadmisinfdL3*100)/$nbpresentL3),2); echo $pourcentinfdL3;?></td>





            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupdixfL3=$nbadmissupdixfanSRITL3+$nbadmissupdixfanRTELL3+$nbadmissupdixfanSIGLL3/* +$nbadmissupdixfanTWINL3*/; echo $nbadmissupdixfL3 ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmissupdixgL3 = $nbadmissupdixganSRITL3 + $nbadmissupdixganRTELL3+ $nbadmissupdixganSIGLL3 /*+ $nbadmissupdixganTWINL3*/; echo $nbadmissupdixgL3 ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php $nbadmissupdixL3 = $nbadmissupdixanSRITL3 + $nbadmissupdixanRTELL3 + $nbadmissupdixanSIGLL3 /* + $nbadmissupdixanTWINL3*/; echo $nbadmissupdixL3; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentsupdixL3= number_format((($nbadmissupdixL3*100)/$nbpresentL3),2); echo $pourcentsupdixL3;?></td>

            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisdecisfL3=$nbadmisdecisfanSRITL3 + $nbadmisdecisfanRTELL3 + $nbadmisdecisfanSIGLL3 /*+ $nbadmisdecisfanTWINL3*/; echo $nbadmisdecisfL3; ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbadmisdecisgL3= $nbadmisdecisganSRITL3 + $nbadmisdecisganRTELL3  + $nbadmisdecisganSIGLL3 /*+ $nbadmisdecisganTWINL3*/;echo $nbadmisdecisgL3; ?></td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmisdecisL3= $nbadmisdecisanSRITL3 + $nbadmisdecisanRTELL3 + $nbadmisdecisanSIGLL3 /* + $nbadmisdecisanTWINL3*/; echo $nbadmisdecisL3; ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentdecisL3= number_format((($nbadmisdecisL3*100)/$nbpresentL3),2); echo $pourcentdecisL3;?></td>


        </tr>




        <tr>




            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ;" height="20px;"  colspan="2">  <strong>TOTAL LICENCE</strong></td>


            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbetudiantfLICENCE=$nbetudiantfL1+$nbetudiantfL2 +$nbetudiantfL3 ; echo $nbetudiantfLICENCE;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbetudiantgLICENCE=$nbetudiantgL1 + $nbetudiantgL2+ $nbetudiantgL3 ;echo $nbetudiantgLICENCE;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbetudiantLICENCE=$nbetudiantL1 + $nbetudiantL2+ $nbetudiantL3; echo $nbetudiantLICENCE;?></td>


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
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbadmisdecisgLICENCE= $nbadmisdecisgL1 + $nbadmisdecisgL2  + $nbadmisdecisgL3;echo $nbadmisdecisgLICENCE; ?></td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmisdecisLICENCE= $nbadmisdecisL1 + $nbadmisdecisL2+ $nbadmisdecisL3; echo $nbadmisdecisLICENCE; ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentdecisLICENCE= number_format((($nbadmisdecisLICENCE*100)/$nbpresentLICENCE),2); echo $pourcentdecisLICENCE;?></td>


        </tr>













        <tr>



            <td style="text-align: center; border: solid 1px black; "  rowspan="4"> <strong>MASTER 1</strong></td>
            <td style="text-align: center; border: solid 1px black; ">  SIGL </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbetudiantfSIGLM1=nbstudentfofclassspec($idanac,'SIGL','M1',$bdd); echo $nbetudiantfSIGLM1 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbetudiantgSIGLM1=nbstudentgofclassspec($idanac,'SIGL','M1',$bdd); echo $nbetudiantgSIGLM1;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbetudiantSIGLM1=nbstudentofclassspec($idanac,'SIGL','M1',$bdd);echo $nbetudiantSIGLM1;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanSIGLM1=nbpresentan($idanac,'SIGL','M1',$bdd);echo $nbpresentanSIGLM1 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanSIGLM1=nbadmissupzfan($idanac,'SIGL','M1',$bdd); echo $nbadmissupzfanSIGLM1 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzgansSIGLM1=nbadmissupzgan($idanac,'SIGL','M1',$bdd); echo $nbadmissupzgansSIGLM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanSIGLM1=nbadmissupzan($idanac,'SIGL','M1',$bdd); echo $nbadmissupzanSIGLM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzSIGLM1= number_format((nbadmissupzan($idanac,'SIGL','M1',$bdd)*100)/nbpresentan($idanac,'SIGL','M1',$bdd),2); echo $pourcentsupzSIGLM1;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanSIGLM1=nbadmisinfdfan($idanac,'SIGL','M1',$bdd); echo $nbadmisinfdfanSIGLM1 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganSIGLM1=nbadmisinfdgan($idanac,'SIGL','M1',$bdd); echo    $nbadmisinfdganSIGLM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanSIGLM1=nbadmisinfdan($idanac,'SIGL','M1',$bdd); echo   $nbadmisinfdanSIGLM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdSIGLM1= number_format((nbadmisinfdan($idanac,'SIGL','M1',$bdd)*100)/nbpresentan($idanac,'SIGL','M1',$bdd),2); echo $pourcentinfdSIGLM1;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanSIGLM1=nbadmissupdixfan($idanac,'SIGL','M1',$bdd); echo   $nbadmissupdixfanSIGLM1


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganSIGLM1=nbadmissupdixgan($idanac,'SIGL','M1',$bdd); echo   $nbadmissupdixganSIGLM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanSIGLM1=nbadmissupdixan($idanac,'SIGL','M1',$bdd); echo   $nbadmissupdixanSIGLM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixSIGLM1= number_format((nbadmissupdixan($idanac,'SIGL','M1',$bdd)*100)/nbpresentan($idanac,'SIGL','M1',$bdd),2); echo $pourcentsupdixSIGLM1;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanSIGLM1=nbadmisdecisfan($idanac,'SIGL','M1',$bdd); echo   $nbadmisdecisfanSIGLM1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganSIGLM1=nbadmisdecisgan($idanac,'SIGL','M1',$bdd); echo     $nbadmisdecisganSIGLM1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanSIGLM1=nbadmisdecisan($idanac,'SIGL','M1',$bdd); echo       $nbadmisdecisanSIGLM1;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisSIGLM1= number_format((nbadmisdecisan($idanac,'SIGL','M1',$bdd)*100)/nbpresentan($idanac,'SIGL','M1',$bdd),2); echo $pourcentdecisSIGLM1;?></td>


        </tr>
        <tr>




            <td style="text-align: center; border: solid 1px black; ">  SITW </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbetudiantfSITWM1=nbstudentfofclassspec($idanac,'SITW','M1',$bdd); echo $nbetudiantfSITWM1 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbetudiantgSITWM1=nbstudentgofclassspec($idanac,'SITW','M1',$bdd); echo $nbetudiantgSITWM1;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbetudiantSITWM1=nbstudentofclassspec($idanac,'SITW','M1',$bdd);echo $nbetudiantSITWM1;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanSITWM1=nbpresentan($idanac,'SITW','M1',$bdd);echo $nbpresentanSITWM1 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanSITWM1=nbadmissupzfan($idanac,'SITW','M1',$bdd); echo $nbadmissupzfanSITWM1 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzgansSITWM1=nbadmissupzgan($idanac,'SITW','M1',$bdd); echo $nbadmissupzgansSITWM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanSITWM1=nbadmissupzan($idanac,'SITW','M1',$bdd); echo $nbadmissupzanSITWM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzSITWM1= number_format((nbadmissupzan($idanac,'SITW','M1',$bdd)*100)/nbpresentan($idanac,'SITW','M1',$bdd),2); echo $pourcentsupzSITWM1;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanSITWM1=nbadmisinfdfan($idanac,'SITW','M1',$bdd); echo $nbadmisinfdfanSITWM1 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganSITWM1=nbadmisinfdgan($idanac,'SITW','M1',$bdd); echo    $nbadmisinfdganSITWM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanSITWM1=nbadmisinfdan($idanac,'SITW','M1',$bdd); echo   $nbadmisinfdanSITWM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdSITWM1= number_format((nbadmisinfdan($idanac,'SITW','M1',$bdd)*100)/nbpresentan($idanac,'SITW','M1',$bdd),2); echo $pourcentinfdSITWM1;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanSITWM1=nbadmissupdixfan($idanac,'SITW','M1',$bdd); echo   $nbadmissupdixfanSITWM1


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganSITWM1=nbadmissupdixgan($idanac,'SITW','M1',$bdd); echo   $nbadmissupdixganSITWM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanSITWM1=nbadmissupdixan($idanac,'SITW','M1',$bdd); echo   $nbadmissupdixanSITWM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixSITWM1= number_format((nbadmissupdixan($idanac,'SITW','M1',$bdd)*100)/nbpresentan($idanac,'SITW','M1',$bdd),2); echo $pourcentsupdixSITWM1;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanSITWM1=nbadmisdecisfan($idanac,'SITW','M1',$bdd); echo   $nbadmisdecisfanSITWM1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganSITWM1=nbadmisdecisgan($idanac,'SITW','M1',$bdd); echo     $nbadmisdecisganSITWM1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanSITWM1=nbadmisdecisan($idanac,'SITW','M1',$bdd); echo       $nbadmisdecisanSITWM1;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisSITWM1= number_format((nbadmisdecisan($idanac,'SITW','M1',$bdd)*100)/nbpresentan($idanac,'SITW','M1',$bdd),2); echo $pourcentdecisSITWM1;?></td>


        </tr>

        <tr>




            <td style="text-align: center; border: solid 1px black; ">  RTEL </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbetudiantfRTELM1=nbstudentfofclassspec($idanac,'RTEL','M1',$bdd); echo $nbetudiantfRTELM1 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbetudiantgRTELM1=nbstudentgofclassspec($idanac,'RTEL','M1',$bdd); echo $nbetudiantgRTELM1;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbetudiantRTELM1=nbstudentofclassspec($idanac,'RTEL','M1',$bdd);echo $nbetudiantRTELM1;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanRTELM1=nbpresentan($idanac,'RTEL','M1',$bdd);echo $nbpresentanRTELM1 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanRTELM1=nbadmissupzfan($idanac,'RTEL','M1',$bdd); echo $nbadmissupzfanRTELM1 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzgansRTELM1=nbadmissupzgan($idanac,'RTEL','M1',$bdd); echo $nbadmissupzgansRTELM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanRTELM1=nbadmissupzan($idanac,'RTEL','M1',$bdd); echo $nbadmissupzanRTELM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzRTELM1= number_format((nbadmissupzan($idanac,'RTEL','M1',$bdd)*100)/nbpresentan($idanac,'RTEL','M1',$bdd),2); echo $pourcentsupzRTELM1;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanRTELM1=nbadmisinfdfan($idanac,'RTEL','M1',$bdd); echo $nbadmisinfdfanRTELM1 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganRTELM1=nbadmisinfdgan($idanac,'RTEL','M1',$bdd); echo    $nbadmisinfdganRTELM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanRTELM1=nbadmisinfdan($idanac,'RTEL','M1',$bdd); echo   $nbadmisinfdanRTELM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdRTELM1= number_format((nbadmisinfdan($idanac,'RTEL','M1',$bdd)*100)/nbpresentan($idanac,'RTEL','M1',$bdd),2); echo $pourcentinfdRTELM1;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanRTELM1=nbadmissupdixfan($idanac,'RTEL','M1',$bdd); echo   $nbadmissupdixfanRTELM1


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganRTELM1=nbadmissupdixgan($idanac,'RTEL','M1',$bdd); echo   $nbadmissupdixganRTELM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanRTELM1=nbadmissupdixan($idanac,'RTEL','M1',$bdd); echo   $nbadmissupdixanRTELM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixRTELM1= number_format((nbadmissupdixan($idanac,'RTEL','M1',$bdd)*100)/nbpresentan($idanac,'RTEL','M1',$bdd),2); echo $pourcentsupdixRTELM1;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanRTELM1=nbadmisdecisfan($idanac,'RTEL','M1',$bdd); echo   $nbadmisdecisfanRTELM1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganRTELM1=nbadmisdecisgan($idanac,'RTEL','M1',$bdd); echo     $nbadmisdecisganRTELM1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanRTELM1=nbadmisdecisan($idanac,'RTEL','M1',$bdd); echo       $nbadmisdecisanRTELM1;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisRTELM1= number_format((nbadmisdecisan($idanac,'RTEL','M1',$bdd)*100)/nbpresentan($idanac,'RTEL','M1',$bdd),2); echo $pourcentdecisRTELM1;?></td>


        </tr>
        <tr>




            <td style="text-align: center; border: solid 1px black; ">  MBDS </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbetudiantfMBDSM1=nbstudentfofclassspec($idanac,'MBDS','M1',$bdd); echo $nbetudiantfMBDSM1 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbetudiantgMBDSM1=nbstudentgofclassspec($idanac,'MBDS','M1',$bdd); echo $nbetudiantgMBDSM1;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbetudiantMBDSM1=nbstudentofclassspec($idanac,'MBDS','M1',$bdd);echo $nbetudiantMBDSM1;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanMBDSM1=nbpresentan($idanac,'MBDS','M1',$bdd);echo $nbpresentanMBDSM1 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanMBDSM1=nbadmissupzfan($idanac,'MBDS','M1',$bdd); echo $nbadmissupzfanMBDSM1 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzgansMBDSM1=nbadmissupzgan($idanac,'MBDS','M1',$bdd); echo $nbadmissupzgansMBDSM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanMBDSM1=nbadmissupzan($idanac,'MBDS','M1',$bdd); echo $nbadmissupzanMBDSM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzMBDSM1= number_format((nbadmissupzan($idanac,'MBDS','M1',$bdd)*100)/nbpresentan($idanac,'MBDS','M1',$bdd),2); echo $pourcentsupzMBDSM1;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanMBDSM1=nbadmisinfdfan($idanac,'MBDS','M1',$bdd); echo $nbadmisinfdfanMBDSM1 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganMBDSM1=nbadmisinfdgan($idanac,'MBDS','M1',$bdd); echo    $nbadmisinfdganMBDSM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanMBDSM1=nbadmisinfdan($idanac,'MBDS','M1',$bdd); echo   $nbadmisinfdanMBDSM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdMBDSM1= number_format((nbadmisinfdan($idanac,'MBDS','M1',$bdd)*100)/nbpresentan($idanac,'MBDS','M1',$bdd),2); echo $pourcentinfdMBDSM1;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanMBDSM1=nbadmissupdixfan($idanac,'MBDS','M1',$bdd); echo   $nbadmissupdixfanMBDSM1


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganMBDSM1=nbadmissupdixgan($idanac,'MBDS','M1',$bdd); echo   $nbadmissupdixganMBDSM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanMBDSM1=nbadmissupdixan($idanac,'MBDS','M1',$bdd); echo   $nbadmissupdixanMBDSM1;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixMBDSM1= number_format((nbadmissupdixan($idanac,'MBDS','M1',$bdd)*100)/nbpresentan($idanac,'MBDS','M1',$bdd),2); echo $pourcentsupdixMBDSM1;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanMBDSM1=nbadmisdecisfan($idanac,'MBDS','M1',$bdd); echo   $nbadmisdecisfanMBDSM1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganMBDSM1=nbadmisdecisgan($idanac,'MBDS','M1',$bdd); echo     $nbadmisdecisganMBDSM1;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanMBDSM1=nbadmisdecisan($idanac,'MBDS','M1',$bdd); echo       $nbadmisdecisanMBDSM1;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisMBDSM1= number_format((nbadmisdecisan($idanac,'MBDS','M1',$bdd)*100)/nbpresentan($idanac,'MBDS','M1',$bdd),2); echo $pourcentdecisMBDSM1;?></td>


        </tr>


        <tr>




            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ;" height="20px;"  colspan="2" >  <strong>TOTAL </strong></td>


            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbetudiantfM1=$nbetudiantfSIGLM1+$nbetudiantfSITWM1+$nbetudiantfRTELM1  +$nbetudiantfMBDSM1/*+ $nbetudiantfMDSIM1*/ ; echo $nbetudiantfM1;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbetudiantgM1=$nbetudiantgSIGLM1+$nbetudiantgSITWM1 + $nbetudiantgRTELM1 + $nbetudiantgMBDSM1 /*+ $nbetudiantgMDSIM1*/;echo $nbetudiantgM1;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbetudiantM1=$nbetudiantSIGLM1+$nbetudiantSITWM1 + $nbetudiantRTELM1 + $nbetudiantMBDSM1/* + $nbetudiantMDSIM1*/; echo $nbetudiantM1;?></td>


            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbpresentM1= $nbpresentanSIGLM1+$nbpresentanSITWM1+$nbpresentanRTELM1 +$nbpresentanMBDSM1 /*+ $nbpresentanMDSIM1*/; echo $nbpresentM1 ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzfM1=$nbadmissupzfanSIGLM1+$nbadmissupzfanSITWM1+$nbadmissupzfanRTELM1 +$nbadmissupzfanMBDSM1 /*+ $nbadmissupzfanMDSIM1*/; echo $nbadmissupzfM1; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzgM1=$nbadmissupzgansSIGLM1+$nbadmissupzgansSITWM1 + $nbadmissupzgansRTELM1 + $nbadmissupzgansMBDSM1 /*+ $nbadmissupzgansMDSIM1*/;echo $nbadmissupzgM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbadmissupzM1=$nbadmissupzanSIGLM1 +$nbadmissupzanSITWM1 + $nbadmissupzanRTELM1 + $nbadmissupzanMBDSM1/* + $nbadmissupzanMDSIM1*/; echo $nbadmissupzM1 ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php  $pourcentsupzM1= number_format((($nbadmissupzM1*100)/$nbpresentM1),3); echo $pourcentsupzM1;?></td>



            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmisinfdfM1=$nbadmisinfdfanSIGLM1+$nbadmisinfdfanSITWM1+$nbadmisinfdfanRTELM1  +$nbadmisinfdfanMBDSM1/*+ $nbadmisinfdfanMDSIM1*/;echo $nbadmisinfdfM1; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $nbadmisinfdgM1=$nbadmisinfdganSIGLM1+$nbadmisinfdganSITWM1  + $nbadmisinfdganRTELM1  + $nbadmisinfdganMBDSM1/* + $nbadmisinfdganMDSIM1*/;echo $nbadmisinfdgM1; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisinfdM1=$nbadmisinfdanSIGLM1+$nbadmisinfdanSITWM1+ $nbadmisinfdanRTELM1 + $nbadmisinfdanMBDSM1 /*+ $nbadmisinfdanMDSIM1*/; echo $nbadmisinfdM1; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentinfdM1= number_format((($nbadmisinfdM1*100)/$nbpresentM1),2); echo $pourcentinfdM1;?></td>





            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupdixfM1=$nbadmissupdixfanSIGLM1+$nbadmissupdixfanSITWM1+$nbadmissupdixfanRTELM1 +$nbadmissupdixfanMBDSM1/* + $nbadmissupdixfanMDSIM1*/; echo $nbadmissupdixfM1 ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmissupdixgM1 = $nbadmissupdixganSIGLM1 +$nbadmissupdixganSITWM1+ $nbadmissupdixganRTELM1  + $nbadmissupdixganMBDSM1/*+ $nbadmissupdixganMDSIM1*/; echo $nbadmissupdixgM1 ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php $nbadmissupdixM1 = $nbadmissupdixanSIGLM1 +$nbadmissupdixanSITWM1 + $nbadmissupdixanRTELM1 + $nbadmissupdixanMBDSM1 /*+ $nbadmissupdixanMDSIM1*/; echo $nbadmissupdixM1; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentsupdixM1= number_format((($nbadmissupdixM1*100)/$nbpresentM1),2); echo $pourcentsupdixM1;?></td>

            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisdecisfM1=$nbadmisdecisfanSIGLM1+$nbadmisdecisfanSITWM1 + $nbadmisdecisfanRTELM1 + $nbadmisdecisfanMBDSM1 /*+ $nbadmisdecisfanMDSIM1*/; echo $nbadmisdecisfM1; ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbadmisdecisgM1= $nbadmisdecisganSIGLM1+$nbadmisdecisganSITWM1+ $nbadmisdecisganRTELM1 + $nbadmisdecisganMBDSM1/* + $nbadmisdecisganMDSIM1*/;echo $nbadmisdecisgM1; ?></td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmisdecisM1= $nbadmisdecisanSIGLM1 +$nbadmisdecisanSITWM1+ $nbadmisdecisanRTELM1 + $nbadmisdecisanMBDSM1 /*+ $nbadmisdecisanMDSIM1*/; echo $nbadmisdecisM1; ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentdecisM1= number_format((($nbadmisdecisM1*100)/$nbpresentM1),3); echo $pourcentdecisM1;?></td>


        </tr>



        <tr>



            <td style="text-align: center; border: solid 1px black; "  rowspan="4"> <strong>MASTER II <sup></sup></strong></td>
            <td style="text-align: center; border: solid 1px black; ">  SIGL </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbetudiantfSIGLM2=nbstudentfofclassspec($idanac,'SIGL','M2',$bdd); echo $nbetudiantfSIGLM2 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbetudiantgSIGLM2=nbstudentgofclassspec($idanac,'SIGL','M2',$bdd); echo $nbetudiantgSIGLM2;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbetudiantSIGLM2=nbstudentofclassspec($idanac,'SIGL','M2',$bdd);echo $nbetudiantSIGLM2;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanSIGLM2=nbpresentan($idanac,'SIGL','M2',$bdd);echo $nbpresentanSIGLM2 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanSIGLM2=nbadmissupzfan($idanac,'SIGL','M2',$bdd); echo $nbadmissupzfanSIGLM2 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzgansSIGLM2=nbadmissupzgan($idanac,'SIGL','M2',$bdd); echo $nbadmissupzgansSIGLM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanSIGLM2=nbadmissupzan($idanac,'SIGL','M2',$bdd); echo $nbadmissupzanSIGLM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzSIGLM2= number_format((nbadmissupzan($idanac,'SIGL','M2',$bdd)*100)/nbpresentan($idanac,'SIGL','M2',$bdd),2); echo $pourcentsupzSIGLM2;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanSIGLM2=nbadmisinfdfan($idanac,'SIGL','M2',$bdd); echo $nbadmisinfdfanSIGLM2 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganSIGLM2=nbadmisinfdgan($idanac,'SIGL','M2',$bdd); echo    $nbadmisinfdganSIGLM2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanSIGLM2=nbadmisinfdan($idanac,'SIGL','M2',$bdd); echo   $nbadmisinfdanSIGLM2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdSIGLM2= number_format((nbadmisinfdan($idanac,'SIGL','M2',$bdd)*100)/nbpresentan($idanac,'SIGL','M2',$bdd),2); echo $pourcentinfdSIGLM2;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanSIGLM2=nbadmissupdixfan($idanac,'SIGL','M2',$bdd); echo   $nbadmissupdixfanSIGLM2


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganSIGLM2=nbadmissupdixgan($idanac,'SIGL','M2',$bdd); echo   $nbadmissupdixganSIGLM2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanSIGLM2=nbadmissupdixan($idanac,'SIGL','M2',$bdd); echo   $nbadmissupdixanSIGLM2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixSIGLM2= number_format((nbadmissupdixan($idanac,'SIGL','M2',$bdd)*100)/nbpresentan($idanac,'SIGL','M2',$bdd),2); echo $pourcentsupdixSIGLM2;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanSIGLM2=nbadmisdecisfan($idanac,'SIGL','M2',$bdd); echo   $nbadmisdecisfanSIGLM2;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganSIGLM2=nbadmisdecisgan($idanac,'SIGL','M2',$bdd); echo     $nbadmisdecisganSIGLM2;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanSIGLM2=nbadmisdecisan($idanac,'SIGL','M2',$bdd); echo       $nbadmisdecisanSIGLM2;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisSIGLM2= number_format((nbadmisdecisan($idanac,'SIGL','M2',$bdd)*100)/nbpresentan($idanac,'SIGL','M2',$bdd),2); echo $pourcentdecisSIGLM2;?></td>


        </tr>
        <tr>




            <td style="text-align: center; border: solid 1px black; ">  SITW </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbetudiantfSITWM2=nbstudentfofclassspec($idanac,'SITW','M2',$bdd); echo $nbetudiantfSITWM2 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbetudiantgSITWM2=nbstudentgofclassspec($idanac,'SITW','M2',$bdd); echo $nbetudiantgSITWM2;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbetudiantSITWM2=nbstudentofclassspec($idanac,'SITW','M2',$bdd);echo $nbetudiantSITWM2;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanSITWM2=nbpresentan($idanac,'SITW','M2',$bdd);echo $nbpresentanSITWM2 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanSITWM2=nbadmissupzfan($idanac,'SITW','M2',$bdd); echo $nbadmissupzfanSITWM2 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzgansSITWM2=nbadmissupzgan($idanac,'SITW','M2',$bdd); echo $nbadmissupzgansSITWM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanSITWM2=nbadmissupzan($idanac,'SITW','M2',$bdd); echo $nbadmissupzanSITWM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzSITWM2= number_format((nbadmissupzan($idanac,'SITW','M2',$bdd)*100)/nbpresentan($idanac,'SITW','M2',$bdd),2); echo $pourcentsupzSITWM2;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanSITWM2=nbadmisinfdfan($idanac,'SITW','M2',$bdd); echo $nbadmisinfdfanSITWM2 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganSITWM2=nbadmisinfdgan($idanac,'SITW','M2',$bdd); echo    $nbadmisinfdganSITWM2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanSITWM2=nbadmisinfdan($idanac,'SITW','M2',$bdd); echo   $nbadmisinfdanSITWM2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdSITWM2= number_format((nbadmisinfdan($idanac,'SITW','M2',$bdd)*100)/nbpresentan($idanac,'SITW','M2',$bdd),2); echo $pourcentinfdSITWM2;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanSITWM2=nbadmissupdixfan($idanac,'SITW','M2',$bdd); echo   $nbadmissupdixfanSITWM2


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganSITWM2=nbadmissupdixgan($idanac,'SITW','M2',$bdd); echo   $nbadmissupdixganSITWM2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanSITWM2=nbadmissupdixan($idanac,'SITW','M2',$bdd); echo   $nbadmissupdixanSITWM2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixSITWM2= number_format((nbadmissupdixan($idanac,'SITW','M2',$bdd)*100)/nbpresentan($idanac,'SITW','M2',$bdd),2); echo $pourcentsupdixSITWM2;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanSITWM2=nbadmisdecisfan($idanac,'SITW','M2',$bdd); echo   $nbadmisdecisfanSITWM2;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganSITWM2=nbadmisdecisgan($idanac,'SITW','M2',$bdd); echo     $nbadmisdecisganSITWM2;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanSITWM2=nbadmisdecisan($idanac,'SITW','M2',$bdd); echo       $nbadmisdecisanSITWM2;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisSITWM2= number_format((nbadmisdecisan($idanac,'SITW','M2',$bdd)*100)/nbpresentan($idanac,'SITW','M2',$bdd),2); echo $pourcentdecisSITWM2;?></td>


        </tr>

        <tr>




            <td style="text-align: center; border: solid 1px black; ">  RTEL </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbetudiantfRTELM2=nbstudentfofclassspec($idanac,'RTEL','M2',$bdd); echo $nbetudiantfRTELM2 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbetudiantgRTELM2=nbstudentgofclassspec($idanac,'RTEL','M2',$bdd); echo $nbetudiantgRTELM2;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbetudiantRTELM2=nbstudentofclassspec($idanac,'RTEL','M2',$bdd);echo $nbetudiantRTELM2;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanRTELM2=nbpresentan($idanac,'RTEL','M2',$bdd);echo $nbpresentanRTELM2 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanRTELM2=nbadmissupzfan($idanac,'RTEL','M2',$bdd); echo $nbadmissupzfanRTELM2 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzgansRTELM2=nbadmissupzgan($idanac,'RTEL','M2',$bdd); echo $nbadmissupzgansRTELM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanRTELM2=nbadmissupzan($idanac,'RTEL','M2',$bdd); echo $nbadmissupzanRTELM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzRTELM2= number_format((nbadmissupzan($idanac,'RTEL','M2',$bdd)*100)/nbpresentan($idanac,'RTEL','M2',$bdd),2); echo $pourcentsupzRTELM2;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanRTELM2=nbadmisinfdfan($idanac,'RTEL','M2',$bdd); echo $nbadmisinfdfanRTELM2 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganRTELM2=nbadmisinfdgan($idanac,'RTEL','M2',$bdd); echo    $nbadmisinfdganRTELM2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanRTELM2=nbadmisinfdan($idanac,'RTEL','M2',$bdd); echo   $nbadmisinfdanRTELM2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdRTELM2= number_format((nbadmisinfdan($idanac,'RTEL','M2',$bdd)*100)/nbpresentan($idanac,'RTEL','M2',$bdd),2); echo $pourcentinfdRTELM2;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanRTELM2=nbadmissupdixfan($idanac,'RTEL','M2',$bdd); echo   $nbadmissupdixfanRTELM2


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganRTELM2=nbadmissupdixgan($idanac,'RTEL','M2',$bdd); echo   $nbadmissupdixganRTELM2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanRTELM2=nbadmissupdixan($idanac,'RTEL','M2',$bdd); echo   $nbadmissupdixanRTELM2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixRTELM2= number_format((nbadmissupdixan($idanac,'RTEL','M2',$bdd)*100)/nbpresentan($idanac,'RTEL','M2',$bdd),2); echo $pourcentsupdixRTELM2;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanRTELM2=nbadmisdecisfan($idanac,'RTEL','M2',$bdd); echo   $nbadmisdecisfanRTELM2;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganRTELM2=nbadmisdecisgan($idanac,'RTEL','M2',$bdd); echo     $nbadmisdecisganRTELM2;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanRTELM2=nbadmisdecisan($idanac,'RTEL','M2',$bdd); echo       $nbadmisdecisanRTELM2;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisRTELM2= number_format((nbadmisdecisan($idanac,'RTEL','M2',$bdd)*100)/nbpresentan($idanac,'RTEL','M2',$bdd),2); echo $pourcentdecisRTELM2;?></td>


        </tr>


        <tr>




            <td style="text-align: center; border: solid 1px black; ">  MDSI </td>

            <td style="text-align: center; border: solid 1px black; ">  <?php $nbetudiantfMDSIM2=nbstudentfofclassspec($idanac,'MDSI','M2',$bdd); echo $nbetudiantfMDSIM2 ;?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php  $nbetudiantgMDSIM2=nbstudentgofclassspec($idanac,'MDSI','M2',$bdd); echo $nbetudiantgMDSIM2;?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php $nbetudiantMDSIM2=nbstudentofclassspec($idanac,'MDSI','M2',$bdd);echo $nbetudiantMDSIM2;?></td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbpresentanMDSIM2=nbpresentan($idanac,'MDSI','M2',$bdd);echo $nbpresentanMDSIM2 ; ?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzfanMDSIM2=nbadmissupzfan($idanac,'MDSI','M2',$bdd); echo $nbadmissupzfanMDSIM2 ; ?> </td>

            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmissupzgansMDSIM2=nbadmissupzgan($idanac,'MDSI','M2',$bdd); echo $nbadmissupzgansMDSIM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php $nbadmissupzanMDSIM2=nbadmissupzan($idanac,'MDSI','M2',$bdd); echo $nbadmissupzanMDSIM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupzMDSIM2= number_format((nbadmissupzan($idanac,'MDSI','M2',$bdd)*100)/nbpresentan($idanac,'MDSI','M2',$bdd),2); echo $pourcentsupzMDSIM2;?></td>



            <td style="text-align: center; border: solid 1px black; "> <?php $nbadmisinfdfanMDSIM2=nbadmisinfdfan($idanac,'MDSI','M2',$bdd); echo $nbadmisinfdfanMDSIM2 ;



                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php
                $nbadmisinfdganMDSIM2=nbadmisinfdgan($idanac,'MDSI','M2',$bdd); echo    $nbadmisinfdganMDSIM2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php  $nbadmisinfdanMDSIM2=nbadmisinfdan($idanac,'MDSI','M2',$bdd); echo   $nbadmisinfdanMDSIM2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentinfdMDSIM2= number_format((nbadmisinfdan($idanac,'MDSI','M2',$bdd)*100)/nbpresentan($idanac,'MDSI','M2',$bdd),2); echo $pourcentinfdMDSIM2;?></td>


            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixfanMDSIM2=nbadmissupdixfan($idanac,'MDSI','M2',$bdd); echo   $nbadmissupdixfanMDSIM2


                ;?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmissupdixganMDSIM2=nbadmissupdixgan($idanac,'MDSI','M2',$bdd); echo   $nbadmissupdixganMDSIM2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "><?php
                $nbadmissupdixanMDSIM2=nbadmissupdixan($idanac,'MDSI','M2',$bdd); echo   $nbadmissupdixanMDSIM2;


                ?> </td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentsupdixMDSIM2= number_format((nbadmissupdixan($idanac,'MDSI','M2',$bdd)*100)/nbpresentan($idanac,'MDSI','M2',$bdd),2); echo $pourcentsupdixMDSIM2;?></td>

            <td style="text-align: center; border: solid 1px black; "><?php

                $nbadmisdecisfanMDSIM2=nbadmisdecisfan($idanac,'MDSI','M2',$bdd); echo   $nbadmisdecisfanMDSIM2;

                ?></td>
            <td style="text-align: center; border: solid 1px black; ">  <?php


                $nbadmisdecisganMDSIM2=nbadmisdecisgan($idanac,'MDSI','M2',$bdd); echo     $nbadmisdecisganMDSIM2;

                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php

                $nbadmisdecisanMDSIM2=nbadmisdecisan($idanac,'MDSI','M2',$bdd); echo       $nbadmisdecisanMDSIM2;



                ?></td>
            <td style="text-align: center; border: solid 1px black; "> <?php  $pourcentdecisMDSIM2= number_format((nbadmisdecisan($idanac,'MDSI','M2',$bdd)*100)/nbpresentan($idanac,'MDSI','M2',$bdd),2); echo $pourcentdecisMDSIM2;?></td>


        </tr>


        <tr>




            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ;" height="20px;"  colspan="2" >  <strong>TOTAL </strong></td>


            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbetudiantfM2=$nbetudiantfSIGLM2+$nbetudiantfSITWM2+$nbetudiantfRTELM2+ $nbetudiantfMDSIM2; echo $nbetudiantfM2;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbetudiantgM2=$nbetudiantgSIGLM2+$nbetudiantgSITWM2 + $nbetudiantgRTELM2 + $nbetudiantgMDSIM2;echo $nbetudiantgM2;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbetudiantM2=$nbetudiantSIGLM2+$nbetudiantSITWM2 + $nbetudiantRTELM2 + $nbetudiantMDSIM2; echo $nbetudiantM2;?></td>


            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbpresentM2= $nbpresentanSIGLM2+$nbpresentanSITWM2+$nbpresentanRTELM2 + $nbpresentanMDSIM2; echo $nbpresentM2 ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzfM2=$nbadmissupzfanSIGLM2+$nbadmissupzfanSITWM2+$nbadmissupzfanRTELM2 + $nbadmissupzfanMDSIM2; echo $nbadmissupzfM2; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzgM2=$nbadmissupzgansSIGLM2+$nbadmissupzgansSITWM2 + $nbadmissupzgansRTELM2 + $nbadmissupzgansMDSIM2;echo $nbadmissupzgM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbadmissupzM2=$nbadmissupzanSIGLM2 +$nbadmissupzanSITWM2 + $nbadmissupzanRTELM2 + $nbadmissupzanMDSIM2; echo $nbadmissupzM2 ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php  $pourcentsupzM2= number_format((($nbadmissupzM2*100)/$nbpresentM2),3); echo $pourcentsupzM2;?></td>



            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmisinfdfM2=$nbadmisinfdfanSIGLM2+$nbadmisinfdfanSITWM2+$nbadmisinfdfanRTELM2 + $nbadmisinfdfanMDSIM2;echo $nbadmisinfdfM2; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $nbadmisinfdgM2=$nbadmisinfdganSIGLM2+$nbadmisinfdganSITWM2  + $nbadmisinfdganRTELM2 + $nbadmisinfdganMDSIM2;echo $nbadmisinfdgM2; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisinfdM2=$nbadmisinfdanSIGLM2+$nbadmisinfdanSITWM2+ $nbadmisinfdanRTELM2 + $nbadmisinfdanMDSIM2; echo $nbadmisinfdM2; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentinfdM2= number_format((($nbadmisinfdM2*100)/$nbpresentM2),2); echo $pourcentinfdM2;?></td>





            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupdixfM2=$nbadmissupdixfanSIGLM2+$nbadmissupdixfanSITWM2+$nbadmissupdixfanRTELM2+ $nbadmissupdixfanMDSIM2; echo $nbadmissupdixfM2 ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmissupdixgM2 = $nbadmissupdixganSIGLM2 +$nbadmissupdixganSITWM2+ $nbadmissupdixganRTELM2 + $nbadmissupdixganMDSIM2; echo $nbadmissupdixgM2 ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php $nbadmissupdixM2 = $nbadmissupdixanSIGLM2 +$nbadmissupdixanSITWM2 + $nbadmissupdixanRTELM2 + $nbadmissupdixanMDSIM2; echo $nbadmissupdixM2; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentsupdixM2= number_format((($nbadmissupdixM2*100)/$nbpresentM2),2); echo $pourcentsupdixM2;?></td>

            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisdecisfM2=$nbadmisdecisfanSIGLM2+$nbadmisdecisfanSITWM2 + $nbadmisdecisfanRTELM2 + $nbadmisdecisfanMDSIM2; echo $nbadmisdecisfM2; ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbadmisdecisgM2= $nbadmisdecisganSIGLM2+$nbadmisdecisganSITWM2+ $nbadmisdecisganRTELM2+ $nbadmisdecisganMDSIM2;echo $nbadmisdecisgM2; ?></td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmisdecisM2= $nbadmisdecisanSIGLM2 +$nbadmisdecisanSITWM2+ $nbadmisdecisanRTELM2 + $nbadmisdecisanMDSIM2; echo $nbadmisdecisM2; ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentdecisM2= number_format((($nbadmisdecisM2*100)/$nbpresentM2),3); echo $pourcentdecisM2;?></td>


        </tr>






        <tr>




            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ;" height="20px;"  colspan="2" >  <strong>TOTAL MASTER </strong></td>


            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbetudiantfMASTER=$nbetudiantfM1+$nbetudiantfM2 ; echo $nbetudiantfMASTER;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbetudiantgMASTER=$nbetudiantgM1+$nbetudiantgM2 ;echo $nbetudiantgMASTER;?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbetudiantMASTER=$nbetudiantM1+$nbetudiantM2 ; echo $nbetudiantMASTER;?></td>


            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbpresentMASTER= $nbpresentM1+$nbpresentM2; echo $nbpresentMASTER ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzfMASTER=$nbadmissupzfM1+$nbadmissupzfM2; echo $nbadmissupzfMASTER; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupzgMASTER=$nbadmissupzgM1+$nbadmissupzgM2  ;echo $nbadmissupzgMASTER; ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"><?php $nbadmissupzMASTER=$nbadmissupzM1 + $nbadmissupzM2 ; echo $nbadmissupzMASTER ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php  $pourcentsupzMASTER= number_format((($nbadmissupzMASTER*100)/$nbpresentMASTER),3); echo $pourcentsupzMASTER;?></td>



            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmisinfdfMASTER=$nbadmisinfdfM1+$nbadmisinfdfM2;echo $nbadmisinfdfMASTER; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $nbadmisinfdgMASTER= $nbadmisinfdgM1+ $nbadmisinfdgM2 ;echo $nbadmisinfdgMASTER; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisinfdMASTER=$nbadmisinfdM1+$nbadmisinfdM2; echo $nbadmisinfdMASTER; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentinfdMASTER= number_format((($nbadmisinfdMASTER*100)/$nbpresentMASTER),2); echo $pourcentinfdMASTER;?></td>





            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php $nbadmissupdixfMASTER=$nbadmissupdixfM1+$nbadmissupdixfM2 ; echo $nbadmissupdixfMASTER ?> </td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmissupdixgMASTER = $nbadmissupdixgM1+$nbadmissupdixgM2 ; echo $nbadmissupdixgMASTER ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php $nbadmissupdixMASTER = $nbadmissupdixM1 +$nbadmissupdixM2  ; echo $nbadmissupdixMASTER; ?> </td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"> <?php  $pourcentsupdixMASTER= number_format((($nbadmissupdixMASTER*100)/$nbpresentMASTER),2); echo $pourcentsupdixMASTER;?></td>

            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;"><?php  $nbadmisdecisfMASTER=$nbadmisdecisfM1+$nbadmisdecisfM2 ; echo $nbadmisdecisfMASTER; ?></td>
            <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="20px;">  <?php $nbadmisdecisgMASTER= $nbadmisdecisgM1+$nbadmisdecisgM2 ;echo $nbadmisdecisgMASTER; ?></td>
            <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="20px;"> <?php $nbadmisdecisMASTER= $nbadmisdecisM1+$nbadmisdecisM2 ; echo $nbadmisdecisMASTER; ?></td>
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






<br>







</page>



