<?php
namespace v\model\validation;

use v\model\Validation;


/**
 * All delete methods, This class extends the Base Validation Class
 */
class Delete extends Validation {
    
    // ALL DELETE METHOD

    public function deleteOneMember($table, $code)
    {

        if (empty($code)) {
            header("Location: /membres");
            exit;
        }
        $codes = $code["_"];
        $this->del->deleteCustomOnes("releases", "r_code_membre", $codes);
        $this->del->deleteCustomOnes("subscriptions", "s_code_membre", $codes);
        $this->del->deleteOne($table, $codes);
        header("Location: /membres");
        exit;
    }

    public function deleteOneSubscriber($table, $code)
    {
        if (empty($code)) {
            header("Location: /souscriptions");
            exit;
        }
        $codes = $code["_"];
        $this->del->deleteCustomOnes("releases", "r_code_souscription", $codes);
        $this->del->deleteOne($table, $codes);
        header("Location: /souscriptions");
        exit;
    }

    public function deleteOneLiberation($table, $code)
    {
        if (empty($code)) {
            header("Location: /liberations");
            exit;
        }
        $codes = $code["_"];
        $this->hel->updateSubAtLibDel($codes);
        $this->del->deleteOne($table, $codes);
        header("Location: /liberations");
        exit;
    }

}