<?php
require_once __DIR__ . "/../../../vendor/autoload.php";

use v\model\Database;

$db = new Database;
$data = $db->selectAll("members");
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
<button type="button" class="btn btn-warning btn-sm"><a href="/membre">Editer</a></button><button type="button" class="btn btn-danger btn-sm"><a href="/delete"> Delete

  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="maroon" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
</svg>

</a></button></td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>