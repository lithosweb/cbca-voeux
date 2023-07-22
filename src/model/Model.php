<?php

namespace v\model;

use v\auth\Auth;
use v\helpers\Helpers;
use v\model\validation\Delete;
use v\model\validation\Helpers as ValidationHelpers;
use v\model\validation\Insert;
use v\model\validation\Update;

class Model
{
    public Insert $ins;
    public ValidationHelpers $vh;
    public Update $upd;
    public Delete $del;
    public Printing $pr;
    public Auth $au;

    public function __construct()
    {
        $this->pr = new Printing;
        $this->ins = new Insert;
        $this->vh = new ValidationHelpers;
        $this->upd = new Update;
        $this->del = new Delete;
        $this->au = new Auth;
    }

    public function getRedirects($uri)
    {
        $data = Helpers::sanitizeData($_GET);
        switch ($uri) {

            // Connexion
            case "/connexion":
                Auth::getBlankSession();
                View::renderView("connexion", "out-sphere");
                break;

                // Render listings

            case "/membres":
                $this->au->verifyAuth();
                View::renderView("membres", "main");
                break;

            case "/liberations":
                $this->au->verifyAuth();
                View::renderView("liberations", "main");
                break;

            case "/souscriptions":
                $this->au->verifyAuth();
                View::renderView("souscriptions", "main");
                break;

            case "/souscriptions/categorie":
                $this->au->verifyAuth();
                View::renderView("categorie-souscription", "main");
                break;

                // Create Pages

            case "/membre/creer":
                $this->au->verifyAuth();
                View::renderView("create-membre", "main");
                break;

            case "/liberation/creer":
                $this->au->verifyAuth();
                View::renderView("create-liberation", "main");
                break;

            case "/souscription/creer":
                $this->au->verifyAuth();
                View::renderView("create-souscription", "main");
                break;

                // Update pages

            case "/membre/update":
                $this->au->verifyAuth();
                View::renderView("update-membre", "main");
                break;

            case "/liberation/update":
                $this->au->verifyAuth();
                View::renderView("update-liberation", "main");
                break;

            case "/souscription/update":
                $this->au->verifyAuth();
                View::renderView("update-souscription", "main");
                break;

// Taux
            case "/taux":
                $this->au->verifyAuth();
                View::renderView("taux");
                break;

                // Error
            case "/error":
                $this->au->verifyAuth();
                View::renderView(html: "404", htmlFolder: "error");
                break;

                // Printing pages
            case "/print":
                $this->au->verifyAuth();
                View::renderView("print");
                break;

            case "/print/custom":
                $this->au->verifyAuth();
                View::renderView("custom");
                break;

                // Default
            default:
                http_response_code(422);
                header("Allow: GET");
                header("Location: /connexion");
                break;
        }
    }

    public function postRedirects($uri)
    {
        $data = Helpers::sanitizeData($_POST);
        switch ($uri) {

            // Connexion Resolution
            case "/connexion":
                $this->vh->verifyAdmin($data);
                break;

                // Creation Resolution
            case "/membre/creer":
                $this->au->verifyAuth();
                $this->ins->insertMember($data);
                break;

            case "/liberation/creer":
                $this->au->verifyAuth();
                $this->ins->insertLiberation($data);
                break;

            case "/souscription/creer":
                $this->au->verifyAuth();
                $this->ins->insertSouscription($data);
                break;

                // Update Resolution
            case "/membre/update":
                $this->au->verifyAuth();
                $this->upd->updateMember($data);
                break;

            case "/liberation/update":
                $this->au->verifyAuth();
                $this->upd->updateRelease($data);
                break;

            case "/souscription/update":
                $this->au->verifyAuth();
                $this->upd->updateSubscriber($data);
                break;

                // Deletion Resolution
            case "/membre/delete":
                $this->au->verifyAuth();
                $this->del->deleteOneMember("members", $data);
                break;

            case "/liberation/delete":
                $this->au->verifyAuth();
                $this->del->deleteOneLiberation("releases", $data);
                break;

            case "/souscription/delete":
                $this->au->verifyAuth();
                $this->del->deleteOneSubscriber("subscriptions", $data);
                break;

                // Taux update resolution
            case "/taux":
                $this->au->verifyAuth();
                Helpers::updateTaux($data);
                break;
                
                // Printing Resolution
            case "/print":
                $this->au->verifyAuth();
                $this->pr->resolve($data);
                break;

            case "/print/custom":
                $this->au->verifyAuth();
                $this->pr->customPrint($data);
                break;

                // Default
            default:
                http_response_code(422);
                header("Allow: POST");
                header("Location: /connexion");
                break;
        }
    }
}
