<?php
namespace v\controller;

use v\helpers\Helpers;
use v\model\View;

class Router
{
    public Validation $va;

    public function __construct()
    {
        $this->va = new Validation;
    }

    public function meth($meth, $uri)
    {
        $route = (array) Router::routes();
        if (!array_key_exists($uri, $route)) {
            header("Location: /");
            exit;
        }
        foreach ($route as $key => $value) {
            if (str_contains($key, "/post")) {
                $postKeys[] = $key;
                $postValues[] = $value;
            } else {
                $getRoutes[] = [$key => $value];
                $getKeys[] = $key;
                $getValues[] = $value;
            }
        }
        $postRoutes = array_combine($postKeys, $postValues);
        $getRoutes = array_combine($getKeys, $getValues);

        switch ($meth) {
            case 'GET':
                $this->get($uri, $getRoutes);
                break;

            case 'POST':
                $this->post($uri, $postRoutes);
                break;

            default:
                http_response_code(404);
                echo "Wrong Gate";
                echo "<h1><a href='/'>Go home</a></h1>";
                exit;
                break;
        }
    }

    public function get($uri, $routes)
    {
        View::renderView($routes[$uri], "main");
    }

    public function post($uri, $routes)
    {
        $data = filter_var_array($_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $code = Helpers::randStr(30);
        switch ($uri) {

            case '/membre/post':
                $this->va->insertData($data, $code);
                header("Location: /membres");
                break;

            case '/souscription/post':
                $this->va->insertSouscription($data, $code);
                header("Location: /souscription");
                break;

            case '/liberation/post':
                $this->va->insertLiberation($data, $code);
                header("Location: /liberation");
                break;

            default:

                break;
        }
    }
    public function alternative()
    {
    }

    public function getRoute($meth, $uri)
    {
        $meth = filter_var($meth, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $uri = filter_var($uri, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $this->meth($meth, $uri);
    }

    public static function routes()
    {
        return [
            "/" => "membres",
            "/membre" => "membre",
            "/membres" => "membres",
            "/membre/post" => "membre",
            "/liberation" => "liberation",
            "/liberation/post" => "liberation",
            "/souscription" => "souscription",
            "/souscription/post" => "souscription",
            "/historique" => "historique",
        ];
    }
}
