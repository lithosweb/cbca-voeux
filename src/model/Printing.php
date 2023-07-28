<?php

namespace v\model;

use Dompdf\Dompdf;
use Dompdf\Options;


/**
 * The main Class for Printing
 */
class Printing
{

    public function resolve($data)
    {
        if (empty($data)) {
            header("Location: print");
            exit;
        }
        switch ($data["table"]) {
            case 'souscriptions':
                $this->printSouscriptions($data);
                break;

            case 'membres':
                $this->printMembres($data);
                break;

            case 'liberation':
                $this->printLiberation($data);
                break;

            case 'liberations':
                $this->printLiberations($data);
                break;

            case 'custom':
                header("Location: /print/custom");
                break;

            default:
                header("Location: /print");
                break;
        }
    }

    public function customPrint($data)
    {
        $this->printingResult("<p class='text-sm-center mb-3'>" . $data["text"] . "</p>", "rapport", false, orientation: $data["display"]);
    }

    public function printLiberations($data)
    {
        $this->printingResult("liberations", "liberations", orientation: $data["display"]);
    }

    public function printLiberation($data)
    {
        $this->printingResult("liberation", "liberations", orientation: $data["display"]);
    }

    public function printMembres($data)
    {
        $this->printingResult("membres", "membres", orientation: $data["display"]);
    }

    public function printSouscriptions($data)
    {
        switch ($data["categorie"]) {
            case 'neophyte':
                $this->printingResult("souscription", $data["categorie"], orientation: $data["display"]);
                break;

            case 'commercant':
                $this->printingResult("souscription", $data["categorie"], orientation: $data["display"]);
                break;

            case 'min.enfant':
                $this->printingResult("souscription", $data["categorie"], orientation: $data["display"]);
                break;

            case 'fundi.mikono':
                $this->printingResult("souscription", $data["categorie"], orientation: $data["display"]);
                break;

            case 'debrouillard':
                $this->printingResult("souscription", $data["categorie"], orientation: $data["display"]);
                break;

            case 'fonctionnaire':
                $this->printingResult("souscription", $data["categorie"], orientation: $data["display"]);
                break;

            case 'm.j.c':
                $this->printingResult("souscription", $data["categorie"], orientation: $data["display"]);
                break;

            case 'hors.categorie':
                $this->printingResult("souscription", $data["categorie"], orientation: $data["display"]);
                break;

            case 'all':
                $this->printingResult("souscriptions", $data["table"], orientation: $data["display"]);
                break;

            default:
                header("Location: /print");
                break;
        }
    }

    public function printingResult($html, $categorie, $bool = true, $orientation = "landscape")
    {
        $options = new Options();
        $options = $options->setChroot(__DIR__ . "/../view/layout/icon/logo.png");

        // for remote ressource, like remote styling...
        // $options = $options->setIsRemoteEnabled(true); 

        $dompdf = new Dompdf($options);
        if ($bool == true) {
            $htmll = View::renderViewForPrint(html: $html, categorie: strtoupper($categorie));
        } else {
            $htmll = View::renderViewForCustomPrint(html: $html, categorie: strtoupper($categorie));
        }
        $dompdf->loadHtml($htmll, "UTF-8");
        $dompdf->setPaper("A4", $orientation);
        $dompdf->render();
        return $dompdf->stream("voeux-du-" . date("d-F-Y") . ".pdf", ["Attachment" => 0]);
    }
}
