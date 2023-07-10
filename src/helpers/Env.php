<?php
namespace v\helpers;

use Dotenv\Dotenv;

class Env
{
    /**
     * Class constructor.
     */
    public static function dbCredentials()
    {
        $dotenv = Dotenv::createImmutable(dirname(dirname(__DIR__)));
        $dotenv->load();
    }
}
