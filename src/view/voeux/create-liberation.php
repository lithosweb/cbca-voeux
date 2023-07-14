<?php
require_once __DIR__."/../../../vendor/autoload.php";

use v\model\Validation;
use v\model\Database;

$data = $_GET;
Validation::validUpdate($data);
$da = new Database;
$d = $da->selectOneResult("members", $data["_"]);
?>

<h1>Creer une Liberation</h1>

<form class="container" action="/liberation/creer" method="post">

  <div class="shadow-lg p-3 mb-5 bg-body rounded">

 <input type="hidden" name="_" value="<?= $data["_"] ?>">
 <input type="hidden" name="__" value="<?= $data["__"] ?>">
    <label class="form-label">Nom</label>
    <input type="text" class="form-control" value="<?= $d["m_nom"] ?>" disabled> <br>


    <label class="form-label">Postnom</label>
    <input type="text" class="form-control" value="<?= $d["m_postnom"] ?>" disabled> <br>


    <label class="form-label">Prenom</label>
    <input type="text" class="form-control" value="<?= $d["m_prenom"] ?>" disabled> <br>

    <label class="form-label" for="montant">Montant</label>
    <input type="number" name="montant" class="form-control" maxlength="20" placeholder="Montant"> <br>

  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
