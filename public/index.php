<?php
require_once __DIR__."/../vendor/autoload.php";


use Dotenv\Dotenv;
use v\controller\Controller;

//$dotenv = Dotenv::createImmutable(dirname(__DIR__));
//$dotenv->load();


$uri = $_SERVER["REQUEST_URI"];
$meth = $_SERVER["REQUEST_METHOD"];

$co = new Controller;
$co->getUser($meth, $uri);
$co->putData($uri);