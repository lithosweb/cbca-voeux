<?php
require_once __DIR__."/../../../vendor/autoload.php";

use v\helpers\Helpers;
use v\model\Validation;
use v\model\Database;
use v\model\database\Select;
use v\model\validation\Helpers as ValidationHelpers;

$data = $_GET;
ValidationHelpers::validUpdate($data);
if (! array_key_exists("_", $data)) {
  header("Location: /souscriptions");
  exit;
}
if ($data["_"] == '') {
  header("Location: /souscriptions");
  exit;
}
$da = new Database;
$d = $da->selectOneResult("members", $data["_"]);
?>
<h3 class="text-sm-center">Creer liberation</h3>

<form class="container" action="/liberation/creer" method="post">

  <div class="shadow-lg p-2 mx-5 bg-body rounded">

 <input type="hidden" name="_" value="<?= $data["_"] ?>">
 <input type="hidden" name="__" value="<?= $data["__"] ?>">

 <div class="d-flex">
    <label class="form-label">Nom</label>
    <input type="text" class="form-control" value="<?= ucfirst($d["m_nom"]) ?>" disabled readonly> <br>


    <label class="form-label">Postnom</label>
    <input type="text" class="form-control" value="<?= ucfirst($d["m_postnom"]) ?>" disabled readonly> <br>


    <label class="form-label">Prenom</label>
    <input type="text" class="form-control" value="<?= ucfirst($d["m_prenom"]) ?>" disabled readonly> <br>
</div>
    <label class="form-label" for="montant">Montant</label>
    <input type="number" name="montant" class="form-control" maxlength="20" placeholder="Montant"> <br>

  <button type="submit" class="btn btn-primary">Liberer</button>
</div>
</form>
