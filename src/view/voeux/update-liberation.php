<?php
require_once __DIR__ . "/../../../vendor/autoload.php";

use v\helpers\Helpers;
use v\model\Validation;
use v\model\Database;
use v\model\database\Select;
use v\model\validation\Helpers as ValidationHelpers;

$data = $_GET;

ValidationHelpers::validUpdate($data); 
$db = new Database;
$da = $db->selectJoinMembersRemotly("members", "releases", $data["_"]);
if (empty($da)) {
  header("Location: /liberations");
  exit;
}
$taux = Helpers::getTaux();
?>
<h3 class="text-sm-center">Modifier liberation</h3>

<form class="container" action="/liberation/update" method="post">

  <div class="shadow-lg p-3 mb-5 bg-body rounded">
    <input type="hidden" name="_" value="<?= $data["_"]?>">
<div class="d-flex">
    <label class="form-label">Nom</label>
    <input type="text" class="form-control" placeholder="Nom" value="<?= ucfirst($da["m_nom"]) ?>" disabled readonly>

    <label class="form-label">Postnom</label>
    <input type="text" class="form-control" placeholder="Post-nom" value="<?= ucfirst($da["m_postnom"]) ?>" disabled readonly>

    <label class="form-label">Prenom</label>
    <input type="text" class="form-control" placeholder="Prenom" value="<?= ucfirst($da["m_prenom"]) ?>" disabled readonly>
</div>
 <label for="montant">Montant</label>
 <input type="text" class="form-control" placeholder="Chapelle" value="<?= $da["r_montant"] . "CDF (". number_format(($da["r_montant"] / $taux), 2, ',', ' ') . " USD)"?>" disabled readonly> 

 <input type="number" name="montant" class="form-control" id="" placeholder="Nouveau montant">

 <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>