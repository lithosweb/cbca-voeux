<?php
namespace v\model;

class View
{

    public static function getView($view)
    {
        ob_start();
        require_once __DIR__ . "/../view/voeux/{$view}.php";
        return ob_get_clean();
    }

    public static function getLayout($layout)
    {
        ob_start();
        require_once __DIR__ . "/../view/{$layout}.php";
        return ob_get_clean();
    }

    public static function renderView($view = "membres", $layout = "main")
    {
        $html = View::getView($view);
        $render = View::getLayout($layout);
        echo str_replace("{{content}}", $html, $render);
    }

}
