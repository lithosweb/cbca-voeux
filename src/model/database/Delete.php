<?php
namespace v\model\database;
use PDO;
use v\model\Database;

class Delete extends Database {
    
    
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



}