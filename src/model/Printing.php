<?php

namespace v\model;

use Dompdf\Dompdf;
use Dompdf\Options;

class Printing
{

    public Dompdf $dompdf;
    public Options $options;

    public function __construct()
    {
        $this->options = new Options();
        $this->dompdf = new Dompdf($this->options);
    }

    public function printingResult($html)
    {
        /*       $options = $this->options->setChroot(__DIR__ . "/../view/media/photos");
        $options = $this->options->setIsRemoteEnabled(true); */
        $html = View::getHtml($html, "printing");
        $printThat = View::renderViewForPrint($html);
        $this->dompdf->loadHtml($printThat, "UTF-8");
        $this->dompdf->setPaper("A4", "landscape");
        $this->dompdf->render();
        $this->dompdf->stream("voeux-" . date("d-F-Y"), ["Attachment" => 0]);
    }
}


// // Options for getting photos viewed
// $options = new Options;
// $options = $options->setChroot(__DIR__);
// $options = $options->setIsRemoteEnabled(true);

// //get HTML outside
// $html = "<h1 style='color: blue'>Hello DomPdf Parser</h1>";
// //$html .= "<img src='1682638344057.png'>";

// // instantiate and use the dompdf class
// $dompdf = new Dompdf($options);
// $dompdf->loadHtml($html);

// // (Optional) Setup the paper size and orientation
// //$dompdf->setPaper('A4', 'portrait');

// // Render the HTML as PDF
// $dompdf->render();

// // Output the generated PDF to Browser
// $dompdf->stream("example.pdf", ["Attachment" => 0]);