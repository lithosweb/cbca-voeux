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
        $this->db->insertLib($data, $this->code);
        $this->db->updateSubAtLibInsert($data);
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

        $this->db->updateSubscriber($data);
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
        $this->db->updateSubAtLibUp($data);
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
        $this->db->deleteCustomOnes("releases", "r_code_membre", $codes);
        $this->db->deleteCustomOnes("subscriptions", "s_code_membre", $code);
        $this->db->deleteOne($table, $codes);
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
        $this->db->deleteCustomOnes("releases", "r_code_souscription", $codes);
        $this->db->deleteOne($table, $codes);
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
        $this->db->updateSubAtLibDel($codes);
        $this->db->deleteOne($table, $codes);
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
