<?php
/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */

    // get the HTML
    ob_start();
    include(dirname(__FILE__).'/tableconvoquesessionSITWSEM820182019.php');
    $content = ob_get_clean();

    // convert to PDF
    require_once(dirname(__FILE__).'/class_html2PDF/html2pdf.class.php');
	
    try
    {
        $html2pdf = new HTML2PDF('L', 'A4', 'fr', true, 'UTF-8', 3);
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('convoquesessionSITWSEM820182019.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }