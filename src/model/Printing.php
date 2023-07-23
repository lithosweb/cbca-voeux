<?php

namespace v\model;

use Dompdf\Dompdf;
use Dompdf\Options;

class Printing
{

    public function __construct()
    {
    }

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
                $this->printMembres();
                break;

            case 'liberations':
                $this->printLiberations();
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
        $this->printingResult("<p class='text-sm-center mb-3'>" . $data["text"] . "</p>", "rapport", false);
    }

    public function printLiberations()
    {
        $this->printingResult("liberations", "liberations");
    }
    public function printMembres()
    {
        $this->printingResult("membres", "membres");
    }

    public function printSouscriptions($data)
    {
        switch ($data["categorie"]) {
            case 'neophyte':
                $this->printingResult("souscription-neophyte", 'neophytes');
                break;

            case 'commercant':
                $this->printingResult("souscription-commercant", 'commercants');
                break;

            case 'min.enfant':
                $this->printingResult("souscription-minenfant", 'min.enfants');
                break;

            case 'fundi.mikono':
                $this->printingResult("souscription-fundimikono", 'fundi.mikono');
                break;

            case 'debrouillard':
                $this->printingResult("souscription-debrouillard", 'debrouillards');
                break;

            case 'fonctionnaire':
                $this->printingResult("souscription-fonctionnaire", 'fonctionnaires');
                break;

            case 'm.j.c':
                $this->printingResult("souscription-mjc", 'm.j.c');
                break;

            case 'hors.categorie':
                $this->printingResult("souscription-horscategorie", 'hors.categorie');
                break;

            case 'all':
                $this->printingResult("souscriptions", "souscriptions");
                break;

            case 'custom':
                header("Location: /print/custom");
                break;

            default:
                $this->printingResult("souscriptions", "souscriptions");
                header("Location: /print");
                break;
        }
    }

    public function printingResult($html, $categorie, $bool = true)
    {
        $options = new Options();
        $options = $options->setChroot(__DIR__ . "/../view/layout/icon/logo.png");

        // $options = $options->setIsRemoteEnabled(true); for remote ressource

        $dompdf = new Dompdf($options);
        if ($bool == true) {
            $htmll = View::renderViewForPrint(html: $html, categorie: strtoupper($categorie));
        } else {
            $htmll = View::renderViewForCustomPrint(html: $html, categorie: strtoupper($categorie));
        }
        $dompdf->loadHtml($htmll, "UTF-8");
        $dompdf->setPaper("A4", "landscape");
        $dompdf->render();
        $dompdf->stream("voeux-du-" . date("d-F-Y") . ".pdf", ["Attachment" => 0]);
    }
}
