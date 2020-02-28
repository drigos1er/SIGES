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

    <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecSIGLM1=averageofspecsemestrielle( 'TCSIGLSITW','SEM7', $idses, $idanac,$bdd); echo $averspecSIGLM1; ?></td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemSIGLM1=minaveragesemestrielle( 'TCSIGLSITW','SEM7', $idses, $idanac,$bdd); echo $minaversemSIGLM1; ?></td>

    <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemSIGLM1=maxaveragesemestrielle( 'TCSIGLSITW','SEM7', $idses, $idanac,$bdd); echo $maxaversemSIGLM1; ?></td>


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

    <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecRTELM1=averageofspecsemestrielle( 'RTEL','SEM7', $idses, $idanac,$bdd); echo $averspecRTELM1; ?></td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemRTELM1=minaveragesemestrielle( 'RTEL','SEM7', $idses, $idanac,$bdd); echo $minaversemRTELM1; ?></td>

    <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemRTELM1=maxaveragesemestrielle( 'RTEL','SEM7', $idses, $idanac,$bdd); echo $maxaversemRTELM1; ?></td>


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

    <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecMBDSM1=averageofspecsemestrielle( 'MBDS','SEM7', $idses, $idanac,$bdd); echo $averspecMBDSM1; ?></td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemMBDSM1=minaveragesemestrielle( 'MBDS','SEM7', $idses, $idanac,$bdd); echo $minaversemMBDSM1; ?></td>

    <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemMBDSM1=maxaveragesemestrielle( 'MBDS','SEM7', $idses, $idanac,$bdd); echo $maxaversemMBDSM1; ?></td>


</tr>

<!--   <tr>




            <td style="text-align: center; border: solid 1px black;" height="10px; ">  <strong>MDSI</strong></td>

            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfMDSIM1=nbstudentfofclassspec($idanac,'MDSI','M1',$bdd); echo $nbetudiantfMDSIM1;?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgMDSIM1=nbstudentgofclassspec($idanac,'MDSI','M1',$bdd); echo $nbetudiantgMDSIM1;?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantMDSIM1=nbstudentofclassspec($idanac,'MDSI','M1',$bdd); echo $nbetudiantMDSIM1;?></td>


            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentMDSIM1=nbpresent($idanac,'MDSI','SEM7',$idses,$bdd); echo $nbpresentMDSIM1; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfMDSIM1=nbadmissupzf($idanac,'MDSI','SEM7',$idses,$bdd); echo $nbadmissupzfMDSIM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgMDSIM1=nbadmissupzg($idanac,'MDSI','SEM7',$idses,$bdd); echo $nbadmissupzgMDSIM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzMDSIM1=nbadmissupz($idanac,'MDSI','SEM7',$idses,$bdd); echo $nbadmissupzMDSIM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzMDSIM1= number_format((nbadmissupz($idanac,'MDSI','SEM7',$idses,$bdd)*100)/nbpresent($idanac,'MDSI','SEM7',$idses,$bdd),2); echo $pourcentsupzMDSIM1;?></td>



            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfMDSIM1=nbadmisinfdf($idanac,'MDSI','SEM7',$idses,$bdd); echo $nbadmisinfdfMDSIM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgMDSIM1=nbadmisinfdg($idanac,'MDSI','SEM7',$idses,$bdd); echo $nbadmisinfdgMDSIM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdMDSIM1=nbadmisinfd($idanac,'MDSI','SEM7',$idses,$bdd); echo $nbadmisinfdMDSIM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdMDSIM1= number_format((nbadmisinfd($idanac,'MDSI','SEM7',$idses,$bdd)*100)/nbpresent($idanac,'MDSI','SEM7',$idses,$bdd),2); echo $pourcentinfdMDSIM1;?></td>





            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfMDSIM1=nbadmissupdixf($idanac,'MDSI','SEM7',$idses,$bdd); echo $nbadmissupdixfMDSIM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgMDSIM1=nbadmissupdixg($idanac,'MDSI','SEM7',$idses,$bdd); echo $nbadmissupdixgMDSIM1; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixMDSIM1=nbadmissupdix($idanac,'MDSI','SEM7',$idses,$bdd); echo  $nbadmissupdixMDSIM1;?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixMDSIM1= number_format((nbadmissupdix($idanac,'MDSI','SEM7',$idses,$bdd)*100)/nbpresent($idanac,'MDSI','SEM7',$idses,$bdd),2); echo $pourcentsupdixMDSIM1;?></td>

            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfMDSIM1=nbadmisdecisf($idanac,'MDSI','SEM7',$idses,$bdd); echo $nbadmisdecisfMDSIM1; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgMDSIM1=nbadmisdecisg($idanac,'MDSI','SEM7',$idses,$bdd); echo $nbadmisdecisgMDSIM1; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisMDSIM1=nbadmisdecis($idanac,'MDSI','SEM7',$idses,$bdd);echo $nbadmisdecisMDSIM1; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisMDSIM1= number_format((nbadmisdecis($idanac,'MDSI','SEM7',$idses,$bdd)*100)/nbpresent($idanac,'MDSI','SEM7',$idses,$bdd),2); echo $pourcentdecisMDSIM1;?></td>

            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecMDSIM1=averageofspecsemestrielle( 'MDSI','SEM7', $idses, $idanac,$bdd); echo $averspecMDSIM1; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemMDSIM1=minaveragesemestrielle( 'MDSI','SEM7', $idses, $idanac,$bdd); echo $minaversemMDSIM1; ?></td>

            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemMDSIM1=maxaveragesemestrielle( 'MDSI','SEM7', $idses, $idanac,$bdd); echo $maxaversemMDSIM1; ?></td>


        </tr>-->







<tr>




    <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ;" height="10px;"   >  <strong>TOTAL </strong></td>


    <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;">  <?php $nbetudiantfM1=$nbetudiantfSIGLM1+$nbetudiantfRTELM1 + $nbetudiantfMBDSM1/* + $nbetudiantfMDSIM1 */; echo $nbetudiantfM1;?></td>
    <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;">  <?php $nbetudiantgM1=$nbetudiantgSIGLM1 + $nbetudiantgRTELM1 + $nbetudiantgMBDSM1 /*+ $nbetudiantgMDSIM1*/;echo $nbetudiantgM1;?></td>
    <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbetudiantM1=$nbetudiantSIGLM1 + $nbetudiantRTELM1 + $nbetudiantMBDSM1/*+ $nbetudiantMDSIM1*/; echo $nbetudiantM1;?></td>


    <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"><?php $nbpresentM1= $nbpresentSIGLM1+$nbpresentRTELM1 + $nbpresentMBDSM1/*+ $nbpresentMDSIM1*/; echo $nbpresentM1 ?></td>
    <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmissupzfM1=$nbadmissupzfSIGLM1+$nbadmissupzfRTELM1 + $nbadmissupzfMBDSM1 /* + $nbadmissupzfMDSIM1*/; echo $nbadmissupzfM1; ?> </td>
    <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmissupzgM1=$nbadmissupzgSIGLM1 + $nbadmissupzgRTELM1 + $nbadmissupzgMBDSM1/*+ $nbadmissupzgMDSIM1*/;echo $nbadmissupzgM1; ?> </td>
    <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"><?php $nbadmissupzM1=$nbadmissupzSIGLM1 + $nbadmissupzRTELM1+ $nbadmissupzMBDSM1 /*+ $nbadmissupzMDSIM1*/; echo $nbadmissupzM1 ?> </td>
    <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"> <?php  $pourcentsupzM1= number_format((($nbadmissupzM1*100)/$nbpresentM1),3); echo $pourcentsupzM1;?></td>



    <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmisinfdfM1=$nbadmisinfdfSIGLM1+$nbadmisinfdfRTELM1+ $nbadmisinfdfMBDSM1  /* + $nbadmisinfdfMDSIM1*/;echo $nbadmisinfdfM1; ?> </td>
    <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $nbadmisinfdgM1=$nbadmisinfdgSIGLM1  + $nbadmisinfdgRTELM1  + $nbadmisinfdgMBDSM1 /*+ $nbadmisinfdgMDSIM1*/;echo $nbadmisinfdgM1; ?> </td>
    <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"><?php  $nbadmisinfdM1=$nbadmisinfdSIGLM1+ $nbadmisinfdRTELM1 + $nbadmisinfdMBDSM1 /*+ $nbadmisinfdMDSIM1*/; echo $nbadmisinfdM1; ?> </td>
    <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $pourcentinfdM1= number_format((($nbadmisinfdM1*100)/$nbpresentM1),2); echo $pourcentinfdM1;?></td>





    <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbadmissupdixfM1=$nbadmissupdixfSIGLM1+$nbadmissupdixfRTELM1 +$nbadmissupdixfMBDSM1 /*+ $nbadmissupdixfMDSIM1*/; echo $nbadmissupdixfM1 ?> </td>
    <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"> <?php $nbadmissupdixgM1 = $nbadmissupdixgSIGLM1 + $nbadmissupdixgRTELM1+ $nbadmissupdixgMBDSM1 /* + $nbadmissupdixgMDSIM1*/; echo $nbadmissupdixgM1 ?> </td>
    <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"><?php $nbadmissupdixM1 = $nbadmissupdixSIGLM1+ $nbadmissupdixRTELM1+ $nbadmissupdixMBDSM1/*+ $nbadmissupdixMDSIM1*/; echo $nbadmissupdixM1; ?> </td>
    <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $pourcentsupdixM1= number_format((($nbadmissupdixM1*100)/$nbpresentM1),2); echo $pourcentsupdixM1;?></td>

    <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"><?php  $nbadmisdecisfM1=$nbadmisdecisfSIGLM1+ $nbadmisdecisfRTELM1 + $nbadmisdecisfMBDSM1 /*+ $nbadmisdecisfMDSIM1*/; echo $nbadmisdecisfM1; ?></td>
    <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;">  <?php $nbadmisdecisgM1= $nbadmisdecisgSIGLM1+ $nbadmisdecisgRTELM1 + $nbadmisdecisgMBDSM1/*+ $nbadmisdecisgMDSIM1*/;echo $nbadmisdecisgM1; ?></td>
    <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ; " height="10px;"> <?php $nbadmisdecisM1= $nbadmisdecisSIGLM1 + $nbadmisdecisRTELM1  + $nbadmisdecisMBDSM1/* + $nbadmisdecisMDSIM1*/; echo $nbadmisdecisM1; ?></td>
    <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php  $pourcentdecisM1= number_format((($nbadmisdecisM1*100)/$nbpresentM1),2); echo $pourcentdecisM1;?></td>

    <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;" COLSPAN="3"> </td>

</tr>


<tr>



    <td style="text-align: center; border: solid 1px black; " rowspan="3" height="10px;" > <strong>MASTER II</strong></td>
    <td style="text-align: center; border: solid 1px black; ">  <strong>SIGL </strong></td>


    <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfSIGLM2=nbstudentfofclassspec($idanac,'SIGL','M2',$bdd); echo $nbetudiantfSIGLM2;?></td>
    <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgSIGLM2=nbstudentgofclassspec($idanac,'SIGL','M2',$bdd); echo $nbetudiantgSIGLM2;?></td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantSIGLM2=nbstudentofclassspec($idanac,'SIGL','M2',$bdd); echo $nbetudiantSIGLM2;?></td>


    <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentSIGLM2=nbpresent($idanac,'SIGL','SEM9',$idses,$bdd); echo $nbpresentSIGLM2; ?></td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfSIGLM2=nbadmissupzf($idanac,'SIGL','SEM9',$idses,$bdd); echo $nbadmissupzfSIGLM2; ?> </td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgSIGLM2=nbadmissupzg($idanac,'SIGL','SEM9',$idses,$bdd); echo $nbadmissupzgSIGLM2; ?> </td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzSIGLM2=nbadmissupz($idanac,'SIGL','SEM9',$idses,$bdd); echo $nbadmissupzSIGLM2; ?> </td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzSIGLM2= number_format((nbadmissupz($idanac,'SIGL','SEM9',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM9',$idses,$bdd),2); echo $pourcentsupzSIGLM2;?></td>



    <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfSIGLM2=nbadmisinfdf($idanac,'SIGL','SEM9',$idses,$bdd); echo $nbadmisinfdfSIGLM2; ?> </td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgSIGLM2=nbadmisinfdg($idanac,'SIGL','SEM9',$idses,$bdd); echo $nbadmisinfdgSIGLM2; ?> </td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdSIGLM2=nbadmisinfd($idanac,'SIGL','SEM9',$idses,$bdd); echo $nbadmisinfdSIGLM2; ?> </td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdSIGLM2= number_format((nbadmisinfd($idanac,'SIGL','SEM9',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM9',$idses,$bdd),2); echo $pourcentinfdSIGLM2;?></td>





    <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfSIGLM2=nbadmissupdixf($idanac,'SIGL','SEM9',$idses,$bdd); echo $nbadmissupdixfSIGLM2; ?> </td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgSIGLM2=nbadmissupdixg($idanac,'SIGL','SEM9',$idses,$bdd); echo $nbadmissupdixgSIGLM2; ?> </td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixSIGLM2=nbadmissupdix($idanac,'SIGL','SEM9',$idses,$bdd); echo  $nbadmissupdixSIGLM2;?> </td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixSIGLM2= number_format((nbadmissupdix($idanac,'SIGL','SEM9',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM9',$idses,$bdd),2); echo $pourcentsupdixSIGLM2;?></td>

    <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfSIGLM2=nbadmisdecisf($idanac,'SIGL','SEM9',$idses,$bdd); echo $nbadmisdecisfSIGLM2; ?></td>
    <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgSIGLM2=nbadmisdecisg($idanac,'SIGL','SEM9',$idses,$bdd); echo $nbadmisdecisgSIGLM2; ?></td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisSIGLM2=nbadmisdecis($idanac,'SIGL','SEM9',$idses,$bdd);echo $nbadmisdecisSIGLM2; ?></td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisSIGLM2= number_format((nbadmisdecis($idanac,'SIGL','SEM9',$idses,$bdd)*100)/nbpresent($idanac,'SIGL','SEM9',$idses,$bdd),2); echo $pourcentdecisSIGLM2;?></td>

    <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecSIGLM2=averageofspecsemestrielle( 'SIGL','SEM9', $idses, $idanac,$bdd); echo $averspecSIGLM2; ?></td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemSIGLM2=minaveragesemestrielle( 'SIGL','SEM9', $idses, $idanac,$bdd); echo $minaversemSIGLM2; ?></td>

    <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemSIGLM2=maxaveragesemestrielle( 'SIGL','SEM9', $idses, $idanac,$bdd); echo $maxaversemSIGLM2; ?></td>

</tr>


<!-- <tr>




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

            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecSITWM2=averageofspecsemestrielle( 'SITW','SEM9', $idses, $idanac,$bdd); echo $averspecSITWM2; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemSITWM2=minaveragesemestrielle( 'SITW','SEM9', $idses, $idanac,$bdd); echo $minaversemSITWM2; ?></td>

            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemSITWM2=maxaveragesemestrielle( 'SITW','SEM9', $idses, $idanac,$bdd); echo $maxaversemSITWM2; ?></td>

        </tr>

        <tr>




            <td style="text-align: center; border: solid 1px black; ">  <strong>MDSI</strong></td>


            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfMDSIM2=nbstudentfofclassspec($idanac,'MDSI','M2',$bdd); echo $nbetudiantfMDSIM2;?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgMDSIM2=nbstudentgofclassspec($idanac,'MDSI','M2',$bdd); echo $nbetudiantgMDSIM2;?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantMDSIM2=nbstudentofclassspec($idanac,'MDSI','M2',$bdd); echo $nbetudiantMDSIM2;?></td>


            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentMDSIM2=nbpresent($idanac,'MDSI','SEM9',$idses,$bdd); echo $nbpresentMDSIM2; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfMDSIM2=nbadmissupzf($idanac,'MDSI','SEM9',$idses,$bdd); echo $nbadmissupzfMDSIM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgMDSIM2=nbadmissupzg($idanac,'MDSI','SEM9',$idses,$bdd); echo $nbadmissupzgMDSIM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzMDSIM2=nbadmissupz($idanac,'MDSI','SEM9',$idses,$bdd); echo $nbadmissupzMDSIM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzMDSIM2= number_format((nbadmissupz($idanac,'MDSI','SEM9',$idses,$bdd)*100)/nbpresent($idanac,'MDSI','SEM9',$idses,$bdd),2); echo $pourcentsupzMDSIM2;?></td>



            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfMDSIM2=nbadmisinfdf($idanac,'MDSI','SEM9',$idses,$bdd); echo $nbadmisinfdfMDSIM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgMDSIM2=nbadmisinfdg($idanac,'MDSI','SEM9',$idses,$bdd); echo $nbadmisinfdgMDSIM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdMDSIM2=nbadmisinfd($idanac,'MDSI','SEM9',$idses,$bdd); echo $nbadmisinfdMDSIM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdMDSIM2= number_format((nbadmisinfd($idanac,'MDSI','SEM9',$idses,$bdd)*100)/nbpresent($idanac,'MDSI','SEM9',$idses,$bdd),2); echo $pourcentinfdMDSIM2;?></td>





            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfMDSIM2=nbadmissupdixf($idanac,'MDSI','SEM9',$idses,$bdd); echo $nbadmissupdixfMDSIM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgMDSIM2=nbadmissupdixg($idanac,'MDSI','SEM9',$idses,$bdd); echo $nbadmissupdixgMDSIM2; ?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixMDSIM2=nbadmissupdix($idanac,'MDSI','SEM9',$idses,$bdd); echo  $nbadmissupdixMDSIM2;?> </td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixMDSIM2= number_format((nbadmissupdix($idanac,'MDSI','SEM9',$idses,$bdd)*100)/nbpresent($idanac,'MDSI','SEM9',$idses,$bdd),2); echo $pourcentsupdixMDSIM2;?></td>

            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfMDSIM2=nbadmisdecisf($idanac,'MDSI','SEM9',$idses,$bdd); echo $nbadmisdecisfMDSIM2; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgMDSIM2=nbadmisdecisg($idanac,'MDSI','SEM9',$idses,$bdd); echo $nbadmisdecisgMDSIM2; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisMDSIM2=nbadmisdecis($idanac,'MDSI','SEM9',$idses,$bdd);echo $nbadmisdecisMDSIM2; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisMDSIM2= number_format((nbadmisdecis($idanac,'MDSI','SEM9',$idses,$bdd)*100)/nbpresent($idanac,'MDSI','SEM9',$idses,$bdd),2); echo $pourcentdecisMDSIM2;?></td>

            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecMDSIM2=averageofspecsemestrielle( 'MDSI','SEM9', $idses, $idanac,$bdd); echo $averspecMDSIM2; ?></td>
            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemMDSIM2=minaveragesemestrielle( 'MDSI','SEM9', $idses, $idanac,$bdd); echo $minaversemMDSIM2; ?></td>

            <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemMDSIM2=maxaveragesemestrielle( 'MDSI','SEM9', $idses, $idanac,$bdd); echo $maxaversemMDSIM2; ?></td>

        </tr>-->
<tr>




    <td style="text-align: center; border: solid 1px black; ">  <strong>RTEL</strong></td>


    <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantfRTELM2=nbstudentfofclassspec($idanac,'RTEL','M2',$bdd); echo $nbetudiantfRTELM2;?></td>
    <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbetudiantgRTELM2=nbstudentgofclassspec($idanac,'RTEL','M2',$bdd); echo $nbetudiantgRTELM2;?></td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbetudiantRTELM2=nbstudentofclassspec($idanac,'RTEL','M2',$bdd); echo $nbetudiantRTELM2;?></td>


    <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbpresentRTELM2=nbpresent($idanac,'RTEL','SEM9',$idses,$bdd); echo $nbpresentRTELM2; ?></td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $nbadmissupzfRTELM2=nbadmissupzf($idanac,'RTEL','SEM9',$idses,$bdd); echo $nbadmissupzfRTELM2; ?> </td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupzgRTELM2=nbadmissupzg($idanac,'RTEL','SEM9',$idses,$bdd); echo $nbadmissupzgRTELM2; ?> </td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupzRTELM2=nbadmissupz($idanac,'RTEL','SEM9',$idses,$bdd); echo $nbadmissupzRTELM2; ?> </td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupzRTELM2= number_format((nbadmissupz($idanac,'RTEL','SEM9',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM9',$idses,$bdd),2); echo $pourcentsupzRTELM2;?></td>



    <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdfRTELM2=nbadmisinfdf($idanac,'RTEL','SEM9',$idses,$bdd); echo $nbadmisinfdfRTELM2; ?> </td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisinfdgRTELM2=nbadmisinfdg($idanac,'RTEL','SEM9',$idses,$bdd); echo $nbadmisinfdgRTELM2; ?> </td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisinfdRTELM2=nbadmisinfd($idanac,'RTEL','SEM9',$idses,$bdd); echo $nbadmisinfdRTELM2; ?> </td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentinfdRTELM2= number_format((nbadmisinfd($idanac,'RTEL','SEM9',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM9',$idses,$bdd),2); echo $pourcentinfdRTELM2;?></td>





    <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixfRTELM2=nbadmissupdixf($idanac,'RTEL','SEM9',$idses,$bdd); echo $nbadmissupdixfRTELM2; ?> </td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmissupdixgRTELM2=nbadmissupdixg($idanac,'RTEL','SEM9',$idses,$bdd); echo $nbadmissupdixgRTELM2; ?> </td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmissupdixRTELM2=nbadmissupdix($idanac,'RTEL','SEM9',$idses,$bdd); echo  $nbadmissupdixRTELM2;?> </td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentsupdixRTELM2= number_format((nbadmissupdix($idanac,'RTEL','SEM9',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM9',$idses,$bdd),2); echo $pourcentsupdixRTELM2;?></td>

    <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $nbadmisdecisfRTELM2=nbadmisdecisf($idanac,'RTEL','SEM9',$idses,$bdd); echo $nbadmisdecisfRTELM2; ?></td>
    <td style="text-align: center; border: solid 1px black; " height="10px;">  <?php $nbadmisdecisgRTELM2=nbadmisdecisg($idanac,'RTEL','SEM9',$idses,$bdd); echo $nbadmisdecisgRTELM2; ?></td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php $nbadmisdecisRTELM2=nbadmisdecis($idanac,'RTEL','SEM9',$idses,$bdd);echo $nbadmisdecisRTELM2; ?></td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"> <?php  $pourcentdecisRTELM2= number_format((nbadmisdecis($idanac,'RTEL','SEM9',$idses,$bdd)*100)/nbpresent($idanac,'RTEL','SEM9',$idses,$bdd),2); echo $pourcentdecisRTELM2;?></td>

    <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $averspecRTELM2=averageofspecsemestrielle( 'RTEL','SEM9', $idses, $idanac,$bdd); echo $averspecRTELM2; ?></td>
    <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $minaversemRTELM2=minaveragesemestrielle( 'RTEL','SEM9', $idses, $idanac,$bdd); echo $minaversemRTELM2; ?></td>

    <td style="text-align: center; border: solid 1px black; " height="10px;"><?php $maxaversemRTELM2=maxaveragesemestrielle( 'RTEL','SEM9', $idses, $idanac,$bdd); echo $maxaversemRTELM2; ?></td>

</tr>
<tr>




    <td style="text-align: center; border: solid 1px black; background-color: #e5e5e5 ;" height="10px;"  >  <strong>TOTAL </strong></td>


    <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;">  <?php $nbetudiantfM2=$nbetudiantfSIGLM2+$nbetudiantfRTELM2 /*+$nbetudiantfSITWM2 +$nbetudiantfMDSIM2*/; echo $nbetudiantfM2;?></td>
    <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;">  <?php $nbetudiantgM2=$nbetudiantgSIGLM2 + $nbetudiantgRTELM2/*+ $nbetudiantgSITWM2+ $nbetudiantgMDSIM2 */ ;echo $nbetudiantgM2;?></td>
    <td style="text-align: center; border: solid 1px black;  background-color: #e5e5e5 ;" height="10px;"> <?php $nbetudiantM2=$nbetudiantSIGLM2 + $nbetudiantRTELM2 /*+ $nbetudiantSITWM2 + $nbetudiantMDSIM2*/; echo $nbetudiantM2;?></td>


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