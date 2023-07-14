<?php
require_once __DIR__ . "/../../../vendor/autoload.php";

use v\model\Validation;
use v\model\Database;

$data = $_GET;

Validation::validUpdate($data);

$db = new Database;
$da = $db->selectJoinMembersRemotly("members", "subscriptions", $data["_"]);
if (empty($da)) {
  header("Location: /subscriptions");
  exit;
}
?>

<h2>Update souscription</h2>

<form class="container" action="/souscription/update" method="post">

  <div class="shadow-lg p-3 mb-5 bg-body rounded">
    <input type="hidden" name="_" value="<?= $data["_"]?>"><br>

    <label class="form-label">Nom</label>
    <input type="text" class="form-control" placeholder="Nom" value="<?= $da["m_nom"] ?>" disabled><br>

    <label class="form-label">Postnom</label>
    <input type="text" class="form-control" placeholder="Post-nom" value="<?= $da["m_postnom"] ?>" disabled><br>

    <label  class="form-label">Chapelle</label>
    <input type="text" class="form-control" placeholder="Chapelle" value="<?= $da["s_chapelle"] ?>" disabled><br>
    <select name="chapelle" aria-placeholder="chapelle" class="form-control">
  <option value="kasika">Kasika</option>
  <option value="mashariki">Mashariki</option>
  <option value="central">Central</option>
 </select><br>


    <label class="form-label">Categorie</label>
    <input type="text" class="form-control" placeholder="Chapelle" value="<?= $da["s_categorie"] ?>" disabled><br>
    <select name="categorie" aria-placeholder="Categorie" class="form-control"> 
      <option value="neophyte">Neophytes</option>
      <option value="commercant">Commercants</option>
      <option value="minenfant">Min.Enfant</option>
      <option value="fundimikono">Fundi.Mikono</option>
      <option value="mjc">MJC</option>
 </select><br>

 <label for="montant">Montant</label>
 <input type="text" class="form-control" placeholder="Chapelle" value="<?= $da["s_montant"] ?>" disabled> <br>
 <input type="number" name="montant" class="form-control" id="">CDF <br>

 <button type="submit" class="btn btn-primary">Submit</button>
</form>