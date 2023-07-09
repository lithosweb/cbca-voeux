<?php
namespace v\controller;

use PDO;
use v\helpers\Helpers;
use v\model\Database;

class Validation
{

    public Database $db;
    public PDO $pdo;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function insertData($data, $code)
    {
        $this->db->insertData($data, $code);
        header("Location: /membre");
        exit;
    }

    public function insertSouscription($data, $code){
        $row = $this->db->insertSous($data, $code);
        header("Location: /souscription");
        exit;
    }

    public function insertLiberation($data, $code){
        $this->db->insertLib($data, $code);
        header("Location: /souscription");
    }

    public function selAll($table){
      $this->db->selectAll($table);
      exit;
    }

}
