<?php

namespace v\model;

use PDO;
use v\helpers\Helpers;
use v\model\Database;

class Validation
{

    public Database $db;
    public PDO $pdo;
    public string $code;

    /**
     * CONSTRUCTOR METHOD
     */

    public function __construct()
    {
        $this->code = Helpers::randStr(60);
        $this->db = new Database;
    }

    // ALL INSERT METHODS

    public function insertMember($data)
    {
        $this->db->insertOneMember($data, $this->code);
        header("Location: /membres");

        exit;
    }

    public function insertSouscription($data)
    {
        $this->db->insertSous($data, $this->code);
        header("Location: /souscriptions");
        exit;
    }

    public function insertLiberation($data)
    {
        $row = $this->db->insertLib($data, $this->code);
        if ($row == 1) {
            echo "Something was inserted";
            header("Location: /souscriptions");
            exit;
        }
        header("Location: /souscriptions");
        exit;
    }

    // ALL SELECT METHODS 

    public function selAll($table)
    {
        $this->db->selectAll($table);
        exit;
    }

    // ALL UPDATE METHODS

    public function updateMember($data)
    {
        if (empty($data)) {
            header("Location: /membres");
            exit;
        }
        if (!array_key_exists("_", $data)) {
            header("Location: /membres");
            exit;
        }

        $code = array_shift($data);

        $row = $this->db->updateMember($code, $data);
        if (!$row) {
            echo "Nothing Changed";
            exit;
        }
        header("Location: /membres");
        exit;
    }

    public function updateSubscriber($data)
    {
        if (empty($data)) {
            header("Location: /souscriptions");
            exit;
        }
        if (!array_key_exists("_", $data)) {
            header("Location: /souscriptions");
            exit;
        }

        $row = $this->db->updateSubscriber($data);
        header("Location: /souscriptions");
        exit;
    }

    public function updateRelease($data)
    {
        if (empty($data)) {
            header("Location: /liberations");
            exit;
        }
        if (!array_key_exists("_", $data)) {
            header("Location: /liberations");
            exit;
        }

        $row = $this->db->updateOneRel($data);
        header("Location: /liberations");
        exit;
    }
    // ALL DELETE METHODS

    public function deleteOneMember($table, $code)
    {

        if (empty($code)) {
            header("Location: /membres");
            exit;
        }
        $codes = $code["_"];
        $check = $this->db->selectOneResult($table, $codes);
        if (!empty($check)) {
            header("Location: /membres");
        }
        $row = $this->db->deleteOne($table, $codes);
        header("Location: /membres");
        exit;
    }

    public function deleteOneSubscriber($table, $code)
    {
        if (empty($code)) {
            header("Location: /souscriptions");
            exit;
        }
        $codes = $code["_"];
        $check = $this->db->selectOneResult($table, $codes);
        if (!empty($check)) {
            header("Location: /souscriptions");
        }

        $row = $this->db->deleteOne($table, $codes);
        header("Location: /souscriptions");
        exit;
    }

    public function deleteOneLiberation($table, $code)
    {
        if (empty($code)) {
            header("Location: /liberations");
            exit;
        }
        $codes = $code["_"];
        $check = $this->db->selectOneResult($table, $codes);
        if (!empty($check)) {
            header("Location: /liberations");
        }
        $row = $this->db->deleteOne($table, $codes);
        header("Location: /liberations");
        exit;
    }

    // ALL OTHERS
    public static function validUpdate($data)
    {
        if (empty($data)) {
            header("Location: /membres");
            exit;
        }
    }
}
