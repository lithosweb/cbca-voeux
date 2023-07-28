<?php
namespace v\model;


use PDO;
use v\helpers\Helpers;
use v\model\Database;
use v\model\database\Delete;
use v\model\database\Helpers as DatabaseHelpers;
use v\model\database\Insert;
use v\model\database\Update;


/**
 * The Base Validation Class
 */
class Validation
{
    public PDO $pdo;
    public Database $db;
    public string $code;
    public Delete $del;
    public DatabaseHelpers $hel;
    public Insert $ins;
    public Update $upd;

    public function __construct()
    {
        $this->db = new Database;
        $this->code = Helpers::randStr(60);
        $this->del = new Delete;
        $this->hel = new DatabaseHelpers;
        $this->ins = new Insert;
        $this->upd = new Update;
    }

    public function selAll($table)
    {
        $this->db->selectAll($table);
        exit;
    }

}
