<?php
require_once __DIR__ . "/../../../vendor/autoload.php";

use v\model\database\Printing;

$db = new Printing;
$data = $db->selectAllForPrint("members");
?>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Postnom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Sexe</th>
      <th scope="col">Telephone</th>
      <th scope="col">Observation</th>
    </tr>
  </thead>
  <?php if (!empty($data)) : ?>
    <tbody>
      <?php foreach ($data as $key => $value) : ?>
        <tr>
          <td scope="row">~</td>
          <td scope="row"><?= $value["m_nom"] ?></td>
          <td scope="row"><?= $value["m_postnom"] ?></td>
          <td scope="row"><?= $value["m_prenom"] ?></td>
          <td scope="row"><?= $value["m_sexe"] ?></td>
          <td scope="row"><?= $value["m_telephone"] ?></td>
          <td scope="row"><?= " " ?></td>
        </tr>
      <?php endforeach; ?>
      <tr>
        <th scope="col">_______________</th>
        <th scope="col">_______________</th>
        <th scope="col">_______________</th>
        <th scope="col">_______________</th>
        <th scope="col">_______________</th>
        <th scope="col">_______________</th>
        <th scope="col">_______________</th>
      </tr>
    </tbody>
  <?php endif; ?>
</table>