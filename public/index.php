<?php
require_once __DIR__."/../vendor/autoload.php";

use v\controller\Controller;


$uri = $_SERVER["REQUEST_URI"];
$meth = $_SERVER["REQUEST_METHOD"];

$co = new Controller;
$co->getUserInfos($meth, $uri);