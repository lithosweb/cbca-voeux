<?php
namespace v\controller;

class Controller{

  public Router $router;

public function __construct()
{
  $this->router = new Router;
}

public function getUser($meth, $uri){
  $this->router->getRoute($meth, $uri);
}

public function putData()
{
  $this->router->alternative();
}
}