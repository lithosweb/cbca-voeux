<?php
require_once __DIR__ . "/../../../vendor/autoload.php";

use v\helpers\Helpers;
use v\model\database\Printing;

$info = $_POST;

$db = new Printing;
$taux = Helpers::getTaux();
$data = $db->selectReleasesByOneForPrint(value: $info["_"]);

// var_dump($info); exit;

?>
<p class="text-sm-center fs-4 pb-5 mb-5">HISTORIQUE DE LIBERATIONS DE : <?= " " . $info["prenom"] . " " . $info["nom"] . " " .$info["postnom"] ?></p>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">--</th>
      <th scope="col">--</th>
      <th scope="col">Montant</th>
      <th scope="col">Taux</th>
      <th scope="col">Date</th>
      <th scope="col">Observation</th>
    </tr>
  </thead>
  <?php if (!empty($data)) : ?>
    <tbody>
      <?php foreach ($data as $key => $value) : ?>
        <tr>
          <td></td>
          <td></td>
          <td><?= number_format((int)$value["r_montant"], 0, ',', ' ') . " CDF" ?></td>
          <td><?= number_format((int)$taux, 0, ',', ' ') . " CDF" ?></td>
          <td><?= $value["r_date"] ?></td>
          <td><?= " " ?></td>
        </tr>
      <?php endforeach; ?>
      <hr>
      <?php
      $lib = 0;
      foreach ($data as $k => $v) {
        $lib += (int) $v["r_montant"];
      }
      ?>
      <tr>
        <th scope="col"><?= "TOTAL" ?></th>
        <th scope="col"></th>
        <th scope="col"><?= number_format((int)$lib, 0, ',', ' ') . " CDF <br> (" . number_format(((int)$lib / $taux), 2, ',', ' ') . " USD)"; ?></th>
        <th scope="col"><?= number_format((int)$taux, 0, ',', ' ') . " CDF" ?></th>
        <th scope="col"><?= '' ?></th>
      </tr>
    </tbody>
  <?php endif; ?>
</table>