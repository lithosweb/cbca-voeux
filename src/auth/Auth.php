<?php
namespace v\auth;

use v\model\Database;

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
        $_SESSION = [];
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
    }

    public static function getBlankSession(){
        $_SESSION = [];
        session_unset();
        return session_destroy();
    }
}
