<?php
require_once __DIR__ . "/../vendor/autoload.php";

use v\auth\Auth;
use v\controller\Controller;
use v\error\ErrorHandler;
use v\security\Security;

// Security::responseHeaders();
// ErrorHandler::mainHandler();
// Security::requestHeaders();
Auth::startSession();

$co = new Controller;
$co->getUserInfos(Controller::method(), Controller::uri());