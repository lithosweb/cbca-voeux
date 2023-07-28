<?php

namespace v\controller;

use v\controller\Routes;
use v\helpers\Helpers;
use v\model\Model;

/**
 * The Only Router for the app
 */
class Router
{
    public Model $mo;

    public function __construct()
    {
        $this->mo = new Model;
    }

    public function manageInfo($meth, $uri)
    {
        $meth = Helpers::sanitizeMeth($meth);
        $uri = Helpers::sanitizeUri($uri);

        switch ($meth) {
            case "GET":
                $getRoutes = Routes::getRoutes();
                if (! array_key_exists($uri, $getRoutes)) {
                    header("Location: /membres");
                    exit;
                }
                $this->mo->getRedirects($uri);
                break;

            case "POST":
                $postRoutes = Routes::postRoutes();
                if (! array_key_exists($uri, $postRoutes)) {
                    header("Location: /membres");
                    exit;
                }
                $this->mo->postRedirects($uri);
                break;

            default:
                http_response_code(422);
                header("Allow: GET, POST");
                header("Location: /connexion");
                break;
        }
    }  
 }
