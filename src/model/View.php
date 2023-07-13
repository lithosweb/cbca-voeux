<?php

namespace v\model;


class View
{

    public static function getHtml($html)
    {
        ob_start();
        require_once __DIR__ . "/../view/voeux/{$html}.php";    
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
}
