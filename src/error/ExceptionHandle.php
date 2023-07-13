<?php
namespace v\error;

use Exception;

class ErrorHandle extends Exception{

    public string $err;
    public string $errno;
    public int $line;
    public string $msg;

    public function __construct()
    {        
    }
    
    public function exceptionHandler(){

    }

}