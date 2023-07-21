<?php
namespace v\controller;

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
return $_SERVER["REQUEST_URI"];
}


public function getUserInfos($meth, $uri){
  $this->router->manageInfo($meth, $uri);
}
}