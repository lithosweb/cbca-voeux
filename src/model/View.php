<?php

namespace v\model;


class View
{

    public static function getHtml($html, $folder = "voeux")
    {
        ob_start();
        require_once __DIR__ . "/../view/{$folder}/{$html}.php";    
        return ob_get_clean();
    }

    public static function getLayout($layout)
    {
        ob_start();
        require_once __DIR__ . "/../view/layout/{$layout}.php";
        return ob_get_clean();
    }

    public static function renderView($html = "membres", $layout = "main")
    {
        $html = View::getHtml($html);
        $render = View::getLayout($layout);
        echo str_replace("{{content}}", $html, $render);
    }

    public static function renderViewForPrint($html = "membres", $layout = "main")
    {
        $render = View::getLayout($layout);
        echo str_replace("{{content}}", $html, $render);
    }
}
