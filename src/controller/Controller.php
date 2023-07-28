<?php
namespace v\controller;

/**
 * The Base Controller
 */
class Controller{
  public Router $router;

public function __construct()
{
  $this->router = new Router;
}

public static function method(){
return $_SERVER["REQUEST_METHOD"];
}

public static function uri(){
return parse_url($_SERVER["REQUEST_URI"])["path"];
}


public function getUserInfos($meth, $uri){
  $this->router->manageInfo($meth, $uri);
}
}