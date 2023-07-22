<?php
require_once __DIR__ . "/../../../vendor/autoload.php";

use v\helpers\Helpers;
use v\model\Validation;
use v\model\Database;
use v\model\database\Select;
use v\model\validation\Helpers as ValidationHelpers;

$data = $_GET;
ValidationHelpers::validUpdate($data);
$da = new Database;
$d = $da->selectOneResult("members", $data["_"]);
?>
<h3 class="text-sm-center">Creer souscription</h3>

<form class="container" action="/souscription/creer" method="post">

  <div class="shadow-lg p-2 bg-body rounded mx-5">

  <div class="d-flex">
    <input type="hidden" name="_" value="<?= $data["_"] ?>">
    <label class="form-label">Nom</label>
    <input type="text" class="form-control" value="<?= ucfirst($d["m_nom"]) ?>" disabled readonly>

    <label class="form-label">Postnom</label>
    <input type="text" class="form-control" value="<?= ucfirst($d["m_postnom"]) ?>" disabled readonly>

    <label class="form-label">Prenom</label>
    <input type="text" class="form-control" value="<?= ucfirst($d["m_prenom"]) ?>" disabled readonly>
</div>

    <label class="form-label">Chapelle</label>
    <select name="chapelle" aria-placeholder="chapelle" class="form-control">
      <option value="chapelle" disabled>Chapelle</option>
      <option value="kasika">Kasika</option>
      <option value="mashariki">Mashariki</option>
      <option value="central">Central</option>
      <option value="central">Autre</option>
    </select>


    <label class="form-label">Categorie</label>
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
      <option value="hors.categorie">Autre</option>
    </select>

    <label class="form-label">Montant</label>
    <input type="number" name="montant" class="form-control" maxlength="20" placeholder="Montant"> <br>

    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>