<?php
namespace v\model\validation;


use v\model\Validation;

class Update extends Validation {
    
    
    // ALL UPDATE METHODS

    public function updateMember($data)
    {
        if (empty($data)) {
            header("Location: /membres");
            exit;
        }
        if (!array_key_exists("_", $data)) {
            header("Location: /membres");
            exit;
        }

        $code = array_shift($data);

        $row = $this->upd->updateMember($code, $data);
        if (!$row) {
            echo "Nothing Changed";
            exit;
        }
        header("Location: /membres");
        exit;
    }

    public function updateSubscriber($data)
    {
        if (empty($data)) {
            header("Location: /souscriptions");
            exit;
        }
        if (!array_key_exists("_", $data)) {
            header("Location: /souscriptions");
            exit;
        }

        $this->upd->updateSubscriber($data);
        header("Location: /souscriptions");
        exit;
    }

    public function updateRelease($data)
    {
        if (empty($data)) {
            header("Location: /liberations");
            exit;
        }
        if (!array_key_exists("_", $data)) {
            header("Location: /liberations");
            exit;
        }

        $row = $this->upd->updateOneRel($data);
        $this->hel->updateSubAtLibUp($data);
        header("Location: /liberations");
        exit;
    }

}