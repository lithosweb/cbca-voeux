<?php
namespace v\controller;

class Controller{

  public Router $router;

public function __construct()
{
  $this->router = new Router;
}

public function getUserInfos($meth, $uri){
  $this->router->manageInfo($meth, $uri);
}
}