<?php
namespace v\model\validation;
use v\auth\Auth;
use v\model\Validation;


/**
 * All helpers methods, This class extends the Base Validation Class
 */
class Helpers extends Validation {
    // ALL OTHERS
    public static function validUpdate($data)
    {
        if (empty($data)) {
            header("Location: /membres");
            exit;
        }
    }

    // admin functions

    public function verifyAdmin($data)
    {
        $conn = $this->hel->verifyAdmin($data);

        if (empty($conn)) {
            header("Location: /connexion");
            exit;
        }

        if (password_verify($data["password"], $conn["l_pass"])) {
            Auth::appAuth($data);
            header("Location: /membres");
            exit;
        } else {
            header("Location: /connexion");
            exit;
        }
    }
}