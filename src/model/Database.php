<?php
namespace v\model;

use Dotenv\Dotenv;
use PDO;

class Database
{
    public Dotenv $dotenv;
    public PDO $pdo;

    public function __construct()
    {
        $host = "localhost";
        $db = "gilbert_db";
        $charset = "utf8";
        $port = "3306";
        $user = "root";
        $password = "";
        $this->pdo = new PDO("mysql:host=$host; dbname=$db; charset=$charset; port=$port", "$user", "$password");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function insertData($data, $code)
    {
        $sql = "INSERT INTO members (m_code, m_nom, m_postnom, m_prenom, m_sexe, m_telephone, m_date) VALUES (:m_code, :m_nom, :m_postnom, :m_prenom, :m_sexe, :m_telephone, :m_date)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":m_code", $code, PDO::PARAM_STR);
        $stmt->bindValue(":m_nom", $data["nom"], PDO::PARAM_STR);
        $stmt->bindValue(":m_postnom", $data["post"], PDO::PARAM_STR);
        $stmt->bindValue(":m_prenom", $data["pre"], PDO::PARAM_STR);
        $stmt->bindValue(":m_sexe", $data["sexe"], PDO::PARAM_STR);
        $stmt->bindValue(":m_telephone", $data["tel"], PDO::PARAM_STR);
        $stmt->bindValue(":m_date", date("Y-F-d"), PDO::PARAM_STR);
        $stmt->execute();
    }

    public function insertSous($data, $code)
    {
        $sql = "INSERT INTO subscriptions (s_code, s_id_member, s_chapelle 	s_categorie, s_montant, s_date) VALUES (:s_code, :s_id_member, :s_chapelle,	:s_categorie, :s_montant, :s_date)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":m_code", $code, PDO::PARAM_STR);
        $stmt->bindValue(":m_nom", $data[""], PDO::PARAM_STR);
        $stmt->bindValue(":m_postnom", $data[""], PDO::PARAM_STR);
        $stmt->bindValue(":m_prenom", $data[""], PDO::PARAM_STR);
        $stmt->bindValue(":m_sexe", $data[""], PDO::PARAM_STR);
        $stmt->bindValue(":m_telephone", $data[""], PDO::PARAM_STR);
        $stmt->bindValue(":m_telephone", date("Y-F-d"), PDO::PARAM_STR);
        $stmt->execute();
    }

    public function insertLib($data, $code)
    {
        $sql = "INSERT INTO members (m_code, m_nom, m_postnom, m_prenom, m_sexe, m_telephone, m_date) VALUES (:m_code, :m_nom, :m_postnom, :m_prenom, :m_sexe, :m_telephone, :m_date)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":m_code", $code, PDO::PARAM_STR);
        $stmt->bindValue(":m_nom", $data[""], PDO::PARAM_STR);
        $stmt->bindValue(":m_postnom", $data[""], PDO::PARAM_STR);
        $stmt->bindValue(":m_prenom", $data[""], PDO::PARAM_STR);
        $stmt->bindValue(":m_sexe", $data[""], PDO::PARAM_STR);
        $stmt->bindValue(":m_telephone", $data[""], PDO::PARAM_STR);
        $stmt->bindValue(":m_telephone", date("Y-F-d"), PDO::PARAM_STR);
        $stmt->execute();
    }

    public function selectAll($table)
    {
        $sql = "SELECT * FROM {$table} ORDER BY " . substr($table, 0, 1) . "_id DESC ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
       return $stmt->fetchAll();         
    }

}
