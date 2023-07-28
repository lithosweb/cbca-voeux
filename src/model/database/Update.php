<?php
namespace v\model\database;

use PDO;
use v\model\Database;


/**
 * All updates methods, This class extends the Base Database Class
 */
Class Update extends Database{
    // All update s methods

    public function updateMember($code, $data)
    {
        $sql = "UPDATE members SET m_nom = :nom, m_postnom = :post, m_prenom = :pre, m_sexe = :sexe, m_telephone = :tel WHERE m_code = :code";

        $stmt = $this->pdo->prepare($sql);

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

}