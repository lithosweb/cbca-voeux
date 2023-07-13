<?php

namespace v\model;

use v\model\Validation;
use v\helpers\Helpers;

class Model
{
    public Validation $va;
    public function __construct()
    {
        $this->va = new Validation;
    }

    public function getRedirects($uri)
    {
        $data = Helpers::sanitizeData($_GET);
        switch ($uri) {

            case "/membres":
                View::renderView();
                break;

            case "/liberations":
                View::renderView("liberations");
                break;

            case "/souscriptions":
                View::renderView("souscriptions");
                break;

            case "/membre/creer":
                View::renderView("create-membre");
                break;

            case "/liberation/creer":
                View::renderView("create-liberation");
                break;

            case "/souscription/creer":
                View::renderView("create-souscription");
                break;

            case "/membre/update":
                View::renderView("update-membre");
                break;

            case "/liberation/update":
                View::renderView("update-liberation");
                break;

            case "/souscription/update":
                View::renderView("update-souscription");
                break;

            default:
                http_response_code(422);
                header("Allow: GET");
                header("Location: /membres");
                break;
        }
    }

    public function postRedirects($uri)
    {
        $data = Helpers::sanitizeData($_POST);
        switch ($uri) {

            case "/membre/creer":
                $this->va->insertMember($data);
                break;

            case "/liberation/creer":
                $this->va->insertLiberation($data);
                break;

            case "/souscription/creer":
                $this->va->insertSouscription($data);
                break;

            case "/membre/update":
                $this->va->updateMember($data);
                break;

            case "/liberation/update":
                $this->va->updateRelease($data);
                break;

            case "/souscription/update":
                $this->va->updateSubscriber($data);
                break;

            case "/membre/delete":
                $this->va->deleteOneMember("members", $data);
                break;

            case "/liberation/delete":
                $this->va->deleteOneLiberation("releases", $data);
                break;

            case "/souscription/delete":
                $this->va->deleteOneSubscriber("subscriptions", $data);
                break;

            default:
                http_response_code(422);
                header("Allow: POST");
                header("Location: /membres");
                break;
        }
    }
}
