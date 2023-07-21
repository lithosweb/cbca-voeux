<?php
namespace v\model\validation;


use v\model\Validation;

class Insert extends Validation {

    
    // ALL INSERT METHODS

    public function insertMember($data)
    {
        $this->ins->insertOneMember($data, $this->code);
        header("Location: /membres");
        exit;
    }

    public function insertSouscription($data)
    {
        $this->ins->insertSous($data, $this->code);
        header("Location: /souscriptions");
        exit;
    }

    public function insertLiberation($data)
    {
        $this->ins->insertLib($data, $this->code);
        $this->hel->updateSubAtLibInsert($data);
        header("Location: /souscriptions");
        exit;
    }
}