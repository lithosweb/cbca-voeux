<?php
require_once __DIR__ . "/../../../vendor/autoload.php";

use v\model\Validation;
use v\model\Database;

$data = $_GET;

Validation::validUpdate($data);
$db = new Database;
$da = $db->selectJoinMembersRemotly("members", "releases", $data["_"]);
if (empty($da)) {
  header("Location: /liberations");
  exit;
}
?>

<h2>Update Liberation</h2>

<form class="container" action="/liberation/update" method="post">

  <div class="shadow-lg p-3 mb-5 bg-body rounded">
    <input type="hidden" name="_" value="<?= $data["_"]?>"><br>

    <label class="form-label">Nom</label>
    <input type="text" class="form-control" placeholder="Nom" value="<?= $da["m_nom"] ?>" disabled><br>

    <label class="form-label">Postnom</label>
    <input type="text" class="form-control" placeholder="Post-nom" value="<?= $da["m_postnom"] ?>" disabled><br>

    <label class="form-label">Prenom</label>
    <input type="text" class="form-control" placeholder="Prenom" value="<?= $da["m_prenom"] ?>" disabled><br>

 <label for="montant">Montant</label>
 <input type="text" class="form-control" placeholder="Chapelle" value="<?= $da["r_montant"] ?>" disabled> <br>
 <input type="number" name="montant" class="form-control" id="">CDF <br>

 <button type="submit" class="btn btn-primary">Submit</button>
</form>