<?php

namespace v\model;


class View
{

    public static function getHtml($html, $htmlFolder = "voeux")
    {
        ob_start();
        require_once __DIR__ . "/../view/{$htmlFolder}/{$html}.php";    
        return ob_get_clean();
    }

    public static function getLayout($layout)
    {
        ob_start();
        require_once __DIR__ . "/../view/layout/{$layout}.php";
        return ob_get_clean();
    }

    public static function renderView($html = "connexion", $layout = "main", $htmlFolder = "voeux")
    {
        $htm = View::getHtml($html, $htmlFolder);
        $render = View::getLayout($layout);
        echo str_replace("{{content}}", $htm, $render);
    }

    public static function renderViewForPrint($html = "membre", $layout = "_print")
    {
        $htm = View::getHtml($html, "printing");
        $render = View::getLayout($layout);
        return str_replace("{{content}}", $htm, $render);
    }

    public static function renderViewForCustomPrint(string $html = "membre", string $layout = "_print")
    {
        $render = View::getLayout($layout);
        return str_replace("{{content}}", $html, $render);
    }
}
