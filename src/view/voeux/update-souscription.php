<?php
require_once __DIR__ . "/../../../vendor/autoload.php";

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

$db = new Database;
$da = $db->selectJoinMembersRemotly("members", "subscriptions", $data["_"]);
if (empty($da)) {
  header("Location: /souscriptions");
  exit;
}
$taux = (int)Helpers::getTaux();
if ($taux == 0) {
$taux = 2500;
}
?>
<h3 class="text-sm-center">Modifier souscription</h3>

<form class="container" action="/souscription/update" method="post">

  <div class="shadow-lg p-3 mb-5 bg-body rounded">
    <input type="hidden" name="_" value="<?= $data["_"]?>">

    <div class="d-flex">
    <label class="form-label">Nom</label>
    <input type="text" class="form-control" value="<?= ucfirst($da["m_nom"]) ?>" disabled>

    <label class="form-label">Postnom</label>
    <input type="text" class="form-control" value="<?= ucfirst($da["m_postnom"]) ?>" disabled>

    <label class="form-label">Prenom</label>
    <input type="text" class="form-control" value="<?= ucfirst($da["m_prenom"]) ?>" disabled>
</div>
    <label  class="form-label">Chapelle</label>
    <input type="text" class="form-control" placeholder="Chapelle" value="<?= $da["s_chapelle"] ?>" disabled>
    <select name="chapelle" aria-placeholder="chapelle" class="form-control">
  <option value="kasika">Kasika</option>
  <option value="mashariki">Mashariki</option>
  <option value="central">Central</option>
 </select><br>


    <label class="form-label">Categorie</label>
    <input type="text" class="form-control" placeholder="Chapelle" value="<?= $da["s_categorie"] ?>" disabled>
    <select name="categorie" aria-placeholder="Categorie" class="form-control"> 
      <option value="categorie" disabled>Categorie</option>
      <option value="neophyte">Neophytes</option>
      <option value="commercant">Commercants</option>
      <option value="min.enfant">Min.Enfant</option>
      <option value="fundi.mikono">Fundi.Mikono</option>
      <option value="debrouillard">Debrouillards</option>
      <option value="fonctionnaire">Fonctionnaires</option>
      <option value="m.j.c">MJC</option>
      <option value="hors.categorie">Hors categorie</option>
 </select>

 <label for="montant">Montant</label>
 <input type="text" class="form-control" placeholder="Chapelle" value="<?= number_format($da["s_montant"], 0, ',', ' ') . " CDF (". number_format(($da["s_montant"] / $taux), 2, ',', ' ')." USD)" ?>" disabled>
 <input type="number" name="montant" class="form-control" id="" required value="<?= $da["s_montant"] ?>">

 <button type="submit" class="btn btn-primary mt-3">Modifier</button>
</form>