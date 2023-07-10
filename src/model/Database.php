<?php
namespace v\model;

use Dotenv\Dotenv;
use PDO;
use v\helpers\Env;


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

    public function deleteOne($table, $code)
    {
        $sql = "DELETE * FROM {$table} WHERE " . substr($table, 0, 1) . "_code = :code ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":code", $code);
        $stmt->execute();
    }

    public function updateOneMem($code, $data, $options)
    {
        $sql = "UPDATE members SET () VALUES ()";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(":code", $code);

        $stmt->execute();
        return $stmt->fetch();

    }
    public function updateOneSub($code, $data, $options)
    {
        $sql = "UPDATE subscriptions SET () VALUES ()";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(":code", $code);

        $stmt->execute();
        return $stmt->fetch();

    }
    public function updateOneRel($code, $data, $options)
    {
        $sql = "UPDATE releases SET () VALUES ()";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(":code", $code);

        $stmt->execute();
        return $stmt->fetch();

    }

}
