<?php 
namespace v\model\database;

use v\model\Database;

class Printing extends Database{

    // All selection s methods
    public function selectAllForPrint($table)
    {
        $sql = "SELECT * FROM {$table} ORDER BY " . substr($table, 0, 1) . "_date DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function selectJoinMembersForPrint($table1 = "members", $table2)
    {
        $sql = "SELECT * FROM $table1 JOIN $table2 ORDER BY " . substr($table2, 0, 1) . "_date DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}