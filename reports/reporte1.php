<?php

require_once '../vendor/autoload.php';
require_once '../model/SuperHero.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    //Instanciar clase superhero
    $superhero = new SuperHero();
    $datosObtenidos = $superhero->buscar($_GET['race_id'], $_GET['gender_id'], $_GET['alignment_id']);
    $titulo = $_GET['titulo'];

    ob_start();

    //Archivos que componen pdf
    //hoja de estilos
    include './estilos.report.html';

    //Archivos con datos(estaticos/dinamicos)
    include './reporte.data.php';

    $content = ob_get_clean();

    $html2pdf = new Html2Pdf('P', 'A4', 'es');
    $html2pdf->writeHTML($content);
    $html2pdf->output('HolaMundo.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}