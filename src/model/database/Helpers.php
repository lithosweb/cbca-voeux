<?php
namespace v\model\database;
use PDO;
use v\model\Database;


        // SPECIAL FUNCTIONS
        
class Helpers extends Database{

        
    // Admin function...

    public function verifyAdmin($data)
    {
        $sql = "SELECT * FROM adminlogin WHERE l_user = :l_user";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":l_user", $data["username"]);
        $stmt->execute();
        return $stmt->fetch();
    }

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
}