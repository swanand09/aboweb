<?php 
    if (!defined('BASEPATH')) exit('No direct script access allowed');
    function pdf_create($html, $filename='', $stream=TRUE) 
    {
        require_once("dompdf/dompdf_config.inc.php");

        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->set_paper(array(0,0,1000,1200));
        $dompdf->render();
        if ($stream) {
            $dompdf->stream($filename.".pdf");
        } else {
            return $dompdf->output();
        }
    }
?>