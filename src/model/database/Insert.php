<?php
namespace v\model\database;

use PDO;
use v\model\Database;


/**
 * All Inserts methods, This class extends the Base Database Class
 */
Class Insert extends Database{
// All insert s methods

public function insertOneMember($data, $code)
{
    $sql = "INSERT INTO members (m_code, m_nom, m_postnom, m_prenom, m_sexe, m_telephone, m_date) VALUES (:m_code, :m_nom, :m_postnom, :m_prenom, :m_sexe, :m_telephone, :m_date)";
    
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(":m_code", $code, PDO::PARAM_STR);
    $stmt->bindValue(":m_nom", $data["nom"], PDO::PARAM_STR);
    $stmt->bindValue(":m_postnom", $data["post"], PDO::PARAM_STR);
    $stmt->bindValue(":m_prenom", $data["pre"], PDO::PARAM_STR);
    $stmt->bindValue(":m_sexe", $data["sexe"], PDO::PARAM_STR);
    $stmt->bindValue(":m_telephone", $data["tel"], PDO::PARAM_STR);
    $stmt->bindValue(":m_date", date("d-F-Y H:i:s"), PDO::PARAM_STR);

    $stmt->execute(); 
    return $stmt->rowCount();
}

public function insertSous($data, $code) 
{
    $sql = "INSERT INTO subscriptions (s_code, s_code_membre, s_chapelle,	s_categorie, s_montant, s_date) VALUES (:s_code, :s_code_membre,	:s_chapelle, :s_categorie, :s_montant, :s_date)";

    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(":s_code", $code, PDO::PARAM_STR);
    $stmt->bindValue(":s_code_membre", $data["_"], PDO::PARAM_STR);
    $stmt->bindValue(":s_chapelle", $data["chapelle"], PDO::PARAM_STR);
    $stmt->bindValue(":s_categorie", $data["categorie"], PDO::PARAM_STR);
    $stmt->bindValue(":s_montant", $data["montant"], PDO::PARAM_STR);
    $stmt->bindValue(":s_date", date("d-F-Y H:i:s"), PDO::PARAM_STR);

    $stmt->execute();
    return $stmt->rowCount();
}

public function insertLib($data, $code)
{
    $sql = "INSERT INTO releases (r_code, r_code_membre, r_code_souscription, r_montant, r_date) VALUES (:r_code, :r_code_membre, :r_code_souscription, :r_montant, :r_date)";

    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(":r_code", $code, PDO::PARAM_STR);
    $stmt->bindValue(":r_code_membre", $data["_"], PDO::PARAM_STR);
    $stmt->bindValue(":r_code_souscription", $data["__"], PDO::PARAM_STR);
    $stmt->bindValue(":r_montant", $data["montant"], PDO::PARAM_STR);
    $stmt->bindValue(":r_date", date("d-F-Y H:i:s"), PDO::PARAM_STR);

    $stmt->execute();
    return $stmt->rowCount();
}

}