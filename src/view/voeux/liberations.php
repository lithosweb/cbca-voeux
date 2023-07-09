<?php
require_once __DIR__ . "/../../../vendor/autoload.php";

use v\model\Database;

$db = new Database;
$data = $db->selectAll("releases");
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Postnom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Sexe</th>
      <th scope="col">Telephone</th>
      <th scope="col">Date</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $key => $value): ?>
    <tr>
      <th scope="row"><?=1?></th>
      <td><?=$value["m_nom"]?></td>
      <td><?=$value["m_postnom"]?></td>
      <td><?=$value["m_prenom"]?></td>
      <td><?=$value["m_sexe"]?></td>
      <td><?=$value["m_telephone"]?></td>
      <td><?=$value["m_telephone"]?></td>
      <td><?=$value["m_date"]?></td>
      <td>      
        <button type="button" class="btn btn-primary btn-sm"><a href="/souscription">Souscrire</a></button>
        <button type="button" class="btn btn-secondary"><a href="/liberation">Liberer</a> </button>
<button type="button" class="btn btn-warning btn-sm"><a href="/membre">Editer</a></button><button type="button" class="btn btn-danger btn-sm"><a href="/delete">Delete</a></button></td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>