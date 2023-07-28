<?php
namespace v\helpers;

use Dotenv\Dotenv;


/**
 * My Env Loading Class
 */
class Env
{
    public static function dbCredentials()
    {
        $dotenv = Dotenv::createImmutable(dirname(dirname(__DIR__)));
        $dotenv->load();
    }
}
