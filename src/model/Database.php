<?php

namespace v\model;

use Dotenv\Dotenv;
use PDO;
use v\helpers\Env;

class Database
{
    public Dotenv $dotenv;
    public PDO $pdo;

    /**
     * constructor
     */

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

    // All selection s methods

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
        $sql = "SELECT * FROM {$table} WHERE " . substr($table, 0, 1) . "_code = :code ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":code", $code, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }

    // Selects with joins for members

    public function selectJoinMembers($table1 = "members", $table2, $placeholder = "members.m_nom", $value = "")
    {
        $sql = "SELECT * FROM $table1 JOIN $table2 WHERE ($placeholder LIKE :val AND " . $table1 . "." . substr($table1, 0, 1) . "_code = " . $table2 . "." . substr($table2, 0, 1) . "_code_membre)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":val", "%$value%");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function selectJoinMembersRemotly($table1 = "members", $table2, $code)
    {
        $sql = "SELECT * FROM $table1 JOIN $table2 WHERE " . $table1 . "." . substr($table1, 0, 1) . "_code = " . $table2 . "." . substr($table2, 0, 1) . "_code_membre AND " . $table2 . "." . substr($table2, 0, 1) . "_code = :code";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":code", $code);
        $stmt->execute();
        return $stmt->fetch();
    }

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
        $stmt->bindValue(":m_date", date("d-F-Y"), PDO::PARAM_STR);

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
        $stmt->bindValue(":s_date", date("d-F-Y"), PDO::PARAM_STR);

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
        $stmt->bindValue(":r_date", date("d-F-Y"), PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->rowCount();
    }

    // All update s methods

    public function updateMember($code, $data)
    {
        $sql = "UPDATE members SET m_nom = :nom, m_postnom = :post, m_prenom = :pre, m_sexe = :sexe, m_telephone = :tel WHERE m_code = :code";

        $stmt = $this->pdo->prepare($sql);
        var_dump($sql);
        $stmt->bindValue(":nom", $data["nom"], PDO::PARAM_STR);
        $stmt->bindValue(":post", $data["post"], PDO::PARAM_STR);
        $stmt->bindValue(":pre", $data["pre"], PDO::PARAM_STR);
        $stmt->bindValue(":sexe", $data["sexe"], PDO::PARAM_STR);
        $stmt->bindValue(":tel", $data["tel"], PDO::PARAM_STR);
        $stmt->bindValue(":code", $code, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function updateSubscriber($data)
    {
        $sel = $this->selectOneResult("subscriptions", $data["_"]);
        if ($sel["s_montant"] != $data["montant"]) {
            $sql = "UPDATE subscriptions SET s_chapelle = :s_chapelle, s_categorie = :s_categorie, s_montant = :s_montant, s_ecart = :s_ecart, s_taux_real = :s_taux_real  WHERE s_code = :s_code";

            $ecart = (int)$data["montant"] - (int)$sel["s_total_released"];
            $taux_real = (((int)$sel["s_total_released"] / (int)$data["montant"]) * 100);

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":s_chapelle", $data["chapelle"], PDO::PARAM_STR);
            $stmt->bindValue(":s_categorie", $data["categorie"], PDO::PARAM_STR);
            $stmt->bindValue(":s_montant", $data["montant"]);
            $stmt->bindValue(":s_ecart", $ecart);
            $stmt->bindValue(":s_taux_real", $taux_real); 
        } else {
        $sq = "UPDATE subscriptions SET s_chapelle = :s_chapelle, s_categorie = :s_categorie WHERE s_code = :s_code";

        $stmt = $this->pdo->prepare($sq);
        $stmt->bindValue(":s_chapelle", $data["chapelle"], PDO::PARAM_STR);
        $stmt->bindValue(":s_categorie", $data["categorie"], PDO::PARAM_STR);            
        }        
        $stmt->bindValue(":s_code", $data["_"], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function updateOneRel($data)
    {
        $sql = "UPDATE releases SET r_montant = :r_montant WHERE r_code = :r_code";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(":r_code", $data["_"], PDO::PARAM_STR);
        $stmt->bindValue(":r_montant", $data["montant"], PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->rowCount();
    }

    // All delete s methods

    public function deleteOne($table, $code)
    {
        $sql = "DELETE FROM {$table} WHERE " . substr($table, 0, 1) . "_code = :code ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(":code", $code, PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deleteCustomOnes($table, $culomn, $value)
    {
        $sql = "DELETE FROM {$table} WHERE $culomn = :code ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(":code", $value, PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->rowCount();
    }

    // SPECIAL FUNCTIONS

    // at insert lib update subsciptions table

    public function updateSubAtLibInsert($datas)
    {
        $aa = $this->selectOneResult("subscriptions", $datas["__"]);
        $nouveauSolde = (int)$aa["s_total_released"] + (int)$datas["montant"];
        $ancienMontant = (int)$aa["s_montant"];

        $ecart = $ancienMontant - $nouveauSolde;
        $taux_real = ($nouveauSolde / $ancienMontant) * 100;
 
        echo "<script>alert('Hello there')</script>";

        $sq = "UPDATE subscriptions SET s_total_released = :s_total_released, s_ecart = :s_ecart, s_taux_real = :s_taux_real WHERE s_code = :s_code";

        $stmt = $this->pdo->prepare($sq);
        $stmt->bindValue(":s_total_released", $nouveauSolde);
        $stmt->bindValue(":s_ecart", $ecart);
        $stmt->bindValue(":s_taux_real", $taux_real);
        $stmt->bindValue(":s_code", $datas["__"]);
        return $stmt->execute();
    }

    // at lib delete, also subsciption must be updated

    public function updateSubAtLibDel($codes)
    {
        $b = $this->selectOneResult("releases", $codes);

        $aa = $this->selectOneResult("subscriptions", $b["r_code_souscription"]);
        $ancienRel = (int)$aa["s_total_released"];
        $transitRel = (int)$b["r_montant"];
        $nouveauRel = (int)($ancienRel - $transitRel);
        $ancienMontant = (int)$aa["s_montant"];

        $ecart = $ancienMontant - $nouveauRel;
        $taux_real = ($nouveauRel / $ancienMontant) * 100;

        // var_dump($ancienRel);
        // var_dump($transitRel);
        // var_dump($nouveauRel);
        // var_dump($ancienMontant);
        // var_dump($ecart);
        // var_dump($taux_real);

        $sql = "UPDATE subscriptions SET s_total_released = :s_total_released, s_ecart = :s_ecart, s_taux_real = :s_taux_real WHERE s_code = :s_code";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":s_total_released", $nouveauRel, PDO::PARAM_STR);
        $stmt->bindValue(":s_ecart", $ecart, PDO::PARAM_INT);
        $stmt->bindValue(":s_taux_real", $taux_real, PDO::PARAM_INT);
        $stmt->bindValue(":s_code", $b["r_code_souscription"], PDO::PARAM_STR);

        return $stmt->execute();
    }


// at lib update, update also subscriptions
    public function updateSubAtLibUp($data)
    {
        $b = $this->selectOneResult("releases", $data["_"]);
        $sq = "SELECT r_montant FROM releases WHERE r_code_souscription = :code ";
        $stmt = $this->pdo->prepare($sq);
        $stmt->bindValue(":code", $b["r_code_souscription"], PDO::PARAM_STR);
        $stmt->execute();
        $dd = $stmt->fetch();
        $nouveauSolde = (int)array_sum($dd);

        $aa = $this->selectOneResult("subscriptions", $b["r_code_souscription"]);
        $ancienMontant = (int)$aa["s_montant"];

        $ecart = $ancienMontant - $nouveauSolde;
        $taux_real = (int) ($nouveauSolde / $ancienMontant) * 100;

        $sql = "UPDATE subscriptions SET s_total_released = :s_total_released, s_ecart = :s_ecart, s_taux_real = :s_taux_real WHERE s_code = :s_code";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":s_total_released", $nouveauSolde, PDO::PARAM_STR);
        $stmt->bindValue(":s_ecart", $ecart, PDO::PARAM_INT);
        $stmt->bindValue(":s_taux_real", $taux_real, PDO::PARAM_INT);
        $stmt->bindValue(":s_code", $b["r_code_souscription"], PDO::PARAM_STR);

        $stmt->execute();
    }


    // at lib insertion
    // public function updateMontant($data)
    // {
    //     $dat = $this->selectOneResult("subscriptions", $data["__"]);
    //     if (empty($dat)) {
    //         header("Location: /souscriptions");
    //         exit;
    //     }

    //     $total_released = (int)$dat["s_total_released"] + (int)$data["montant"];
    //     $ecart = (int)$dat["s_montant"] - (int)$total_released;
    //     $taux_real = (int) ((int)$total_released / (int)$dat["s_montant"]) * 100;

    //     $sql = "UPDATE subscriptions SET s_total_released = :s_total_released, s_ecart = :s_ecart, s_taux_real = :s_taux_real WHERE s_code = :s_code";

    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->bindValue(":s_total_released", $total_released, PDO::PARAM_STR);
    //     $stmt->bindValue(":s_ecart", $ecart, PDO::PARAM_STR);
    //     $stmt->bindValue(":s_taux_real", $taux_real, PDO::PARAM_STR);
    //     $stmt->bindValue(":s_code", $data["__"], PDO::PARAM_STR);

    //     $stmt->execute();
    // }
}
