<?php

namespace Foundation\Pdf;

use Mpdf\Mpdf;

class HelperPDF{
    private $caminho = "";
    function __construct()
    {
        $this->caminho = dirname(__FILE__)."/../../public/temp/pdf/";
        if(!is_dir($this->caminho)){
            mkdir($this->caminho);
        }
    }

    public function getCaminhoPdf()
    {
        return $this->caminho;
    }

    function criar($html)
    {
        ob_start();
        date_default_timezone_set('America/Sao_Paulo');
        $dtAgora = date("d.m.Y_H.i.s");

        $mpdf = new Mpdf();

        $mpdf->SetDisplayMode('fullpage');

        $mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list

        $mpdf->WriteHTML($html);

        $nmarquivo ="Nome do arquivo - ".$dtAgora;
        $completo = $this->caminho.$nmarquivo.'.pdf';

        $mpdf->Output($completo,'F');
        ob_get_clean();

        return "{$nmarquivo}";
    }
}