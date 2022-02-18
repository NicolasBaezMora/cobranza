<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Al requerir el autoload, cargamos todo lo necesario para trabajar
/*require_once APPPATH."/third_party/dompdf/autoload.inc.php";
use Dompdf\Dompdf;*/

class Pdfgenerator {

  public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
  {
    $dompdf = new Dompdf\Dompdf(); // la carpeta vendor tiene que estar dentro de application
    $dompdf->loadHtml($html);
    $dompdf->setPaper($paper, $orientation);
    $dompdf->render();

    $output = $dompdf->output();
    file_put_contents(FCPATH.$filename.'.pdf', $output);

    /*if ($stream) {
        // "Attachment" => 1 hará que por defecto los PDF se descarguen en lugar de presentarse en pantalla.
      $dompdf->stream($filename.".pdf", array("Attachment" => 0));
      return $dompdf->output();
    }
    else 
    {
      return $dompdf->output();
    }*/
  }

  /*SELF = index.php

  Use when you want to include something from your root folder
  FCPATH = C:\xampp\htdocs\your_root_folder\

  Use when you want to include something from your application folder
  APPPATH = C:\xampp\htdocs\your_root_folder\application\

  BASEPATH = C:\xampp\htdocs\your_root_folder\system\*/

}

/* End of file Pdfgenerator.php */
/* Location: ./application/libraries/Pdfgenerator.php */