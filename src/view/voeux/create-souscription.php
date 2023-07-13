<?php
require_once __DIR__."/../../../vendor/autoload.php";
use v\model\Validation;
use v\model\Database;

$data = $_GET;
Validation::validUpdate($data);
$da = new Database;
$d = $da->selectOneResult("members", $data["_"]);
?>
<h1>Creer une souscription</h1>

<form class="container" action="/souscription/creer" method="post">

  <div class="shadow-lg p-3 mb-5 bg-body rounded">

 <input type="hidden" name="_" value="<?= $data["_"] ?>">
    <label class="form-label">Nom</label>
    <input type="text" class="form-control" value="<?= $d["m_nom"] ?>" disabled> <br>


    <label class="form-label">Postnom</label>
    <input type="text" class="form-control" value="<?= $d["m_postnom"] ?>" disabled> <br>


    <label class="form-label">Prenom</label>
    <input type="text" class="form-control" value="<?= $d["m_prenom"] ?>" disabled> <br>


    <label  class="form-label">Chapelle</label>
    <select name="chapelle" aria-placeholder="chapelle"> 
  <option value="kasika">Kasika</option>
  <option value="mashariki">Mashariki</option>
  <option value="central">Central</option>
 </select><br>


    <label class="form-label">Categorie</label>
    <select name="categorie" aria-placeholder="Categorie"> 
      <option value="neophyte">Neophytes</option>
      <option value="commercant">Commercants</option>
      <option value="minenfant">Min.Enfant</option>
      <option value="fundimikono">Fundi.Mikono</option>
      <option value="mjc">MJC</option>
 </select><br>

    <label class="form-label">Montant</label>
    <input type="number" name="montant" class="form-control" maxlength="20">CDF <br>

  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>