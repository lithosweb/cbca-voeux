<?php
require_once __DIR__ . "/../../../vendor/autoload.php";

use v\helpers\Helpers;
use v\model\database\Printing;

$db = new Printing;
$taux = Helpers::getTaux();
$data = $db->selectJoinMembersForPrint("members", "releases");
?>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Postnom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Montant</th>
      <th scope="col">Taux</th>
      <th scope="col">Observation</th>
    </tr>
  </thead>
  <?php if (! empty($data)): ?>
  <tbody>
    <?php foreach ($data as $key => $value) : ?>
      <tr>
        <th scope="row"><?= "~" ?></th>
        <td><?= $value["m_nom"] ?></td>
        <td><?= $value["m_postnom"] ?></td>
        <td><?= $value["m_prenom"] ?></td>
        <td><?= number_format((int)$value["r_montant"], 0, ',', ' ') . " CDF" ?></td>
        <td><?= number_format((int)$taux, 0, ',', ' ') . " CDF" ?></td>
        <td><?= " " ?></td>
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
    <?php
$lib = 0;
foreach ($data as $k => $v) {
$lib += (int) $v["r_montant"];
}
?>
      <tr>
      <th scope="col"><?= '-###-'?></th>
      <th scope="col"><?= "TOTAUX" ?></th>
      <th scope="col"><?= "GENERAUX" ?></th>
      <th scope="col"><?= '-###-' ?></th>
      <th scope="col"><?= number_format((int)$lib, 0, ',', ' ') . " CDF <br> (" . number_format(((int)$lib / $taux), 2, ',', ' ') . " USD)"; ?></th>
      <th scope="col"><?= number_format((int)$taux, 0, ',', ' ') . " CDF" ?></th>
      <th scope="col"><?= '' ?></th>
    </tr>
  </tbody>
<?php endif; ?>
</table>