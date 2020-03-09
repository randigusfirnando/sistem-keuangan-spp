<?php
 
class PdfGenerator
{
  public function generate($html,$filename)
  {
    define('DOMPDF_ENABLE_AUTOLOAD', false);
    require_once("vendor/dompdf/dompdf/dompdf_config.inc.php");
    //require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
 
    $Dompdf = new DOMPDF();
    $Dompdf->load_html($html);
    //$Dompdf->render();
    $Dompdf->stream($filename.'.pdf',array("Attachment"=>0));
  }
}