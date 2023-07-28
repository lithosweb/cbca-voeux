<?php
namespace v\auth;

use v\model\Database;

/**
 * The main Authentication class
 */
class Auth
{

    public Database $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public static function startSession(){
       return session_start();
    }

    public static function appAuth($data)
    {
        $_SESSION["session"] = password_hash($data["password"], PASSWORD_DEFAULT);
        return $_SESSION;
    }

    public function verifyAuth()
    {
        if (empty($_SESSION)) {
            header("Location: /connexion");
            exit;
        }
        $name = false;
        if (array_key_exists("session", $_SESSION)) {
            return true;
        }
        if ($name == false) {
            header("Location: /connexion");
            exit;
        }
        return $name;
    }

    public static function getBlankSession(){
        session_unset();
        return session_destroy();
    }
}
