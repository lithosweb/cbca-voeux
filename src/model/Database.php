<?php
namespace v\model;

use Dotenv\Dotenv;
use PDO;
use v\helpers\Env;


/**
 * The Base Database Class
 */
class Database
{
    public Dotenv $dotenv;
    public PDO $pdo;

    public function __construct()
    {        
        Env::dbCredentials();
        $host = $_ENV["DB_HOST"];
        $db = $_ENV["DB_NAME"];
        $charset = $_ENV["DB_CHARSET"];
        $port = $_ENV["DB_PORT"];
        $user = $_ENV["DB_USER"];
        $pass = $_ENV["DB_PASS"];
        $this->pdo = new PDO("mysql:host=$host; dbname=$db; charset=$charset; port=$port", "$user", "$pass");

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_STR_PARAM, PDO::PARAM_STR);
    }

    public function selectAll($table, $placeholder = "m_nom", $value = "")
    {
        $sql = "SELECT * FROM {$table} WHERE $placeholder LIKE :val ORDER BY " . substr($table, 0, 1) . "_date DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":val", "%$value%");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function selectOneResult($table, $code)
    {
        $sql = "SELECT * FROM {$table} WHERE " . substr($table, 0, 1) . "_code = :code";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":code", $code, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }

    // Selects with joins for members

    public function selectJoinMembers($table1 = "members", $table2, $placeholder = "members.m_nom", $value = "")
    {
        $sql = "SELECT * FROM $table1 JOIN $table2 WHERE ($placeholder LIKE :val AND " . $table1 . "." . substr($table1, 0, 1) . "_code = " . $table2 . "." . substr($table2, 0, 1) . "_code_membre) ORDER BY " . substr($table2, 0, 1) . "_date DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":val", "%$value%");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function selectJoinMembersRemotly($table1 = "members", $table2, $code)
    {
        $sql = "SELECT * FROM $table1 JOIN $table2 WHERE " . $table1 . "." . substr($table1, 0, 1) . "_code = " . $table2 . "." . substr($table2, 0, 1) . "_code_membre AND " . $table2 . "." . substr($table2, 0, 1) . "_code = :code ORDER BY " . substr($table2, 0, 1) . "_date DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":code", $code);
        $stmt->execute();
        return $stmt->fetch();
    }

    //Method for printing a couple releases

    // AND " . $table1 . "." . substr($table1, 0, 1) . "_code = :val

    public function selectReleasesByOneForPrint($value){
        $sql = "SELECT * FROM releases WHERE r_code_membre = :val ORDER BY r_date DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":val", $value);
        $stmt->execute();
        return $stmt->fetchAll();
    }


}
