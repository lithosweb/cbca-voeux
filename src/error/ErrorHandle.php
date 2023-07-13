<?php
namespace v\error;

use Error;

class ErrorHandle extends Error{
    public string $err;
    public string $errno;
    public int $line;
    public string $msg;
    public function __construct()
    {
    }

    public function errorHandler(){

    }

}