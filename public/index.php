<?php
require_once __DIR__ . "/../vendor/autoload.php";

use v\auth\Auth;
use v\controller\Controller;
use v\error\ErrorHandler;

// ErrorHandler::mainHandler();
Auth::startSession();

$co = new Controller;
$co->getUserInfos(Controller::method(), Controller::uri());
