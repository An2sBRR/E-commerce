<?php 

use Dompdf\Dompdf;

    require_once '../dompdf/autoload.inc.php';

    /*je veux un nouveau dompdf */
    $dompdf = new Dompdf();
    $dompdf->loadHtml('test');

    $dompt->setPaper('A4');
    /* Pour generer le pdf */
    $dompt->render();
    $dompdf->stream();


?>