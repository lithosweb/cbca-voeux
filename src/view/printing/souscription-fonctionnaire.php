<?php
require_once __DIR__ . "/../../../vendor/autoload.php";

use v\helpers\Helpers;
use v\model\database\Printing;

// $categorie

$db = new Printing;
$data = $db->selectJoinMembersAtForPrint("members", "subscriptions", "fonctionnaire");
$taux = Helpers::getTaux();
?>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Postnom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Categorie</th>
      <th scope="col">Montant.Souscrit</th>
      <th scope="col">Liberations</th>
      <th scope="col">Ecart</th>
      <th scope="col">Taux.real</th>
      <th scope="col">Observation</th>
    </tr>
  </thead>
  <?php if (!empty($data)) : ?>
  <tbody>
    <?php foreach ($data as $key => $value) : ?>
      <tr>
        <td><?= "~" ?></td>
        <td><?= $value["m_nom"] ?></td>
        <td><?= $value["m_postnom"] ?></td>
        <td><?= $value["m_prenom"] ?></td>
        <td><?= $value["s_categorie"] ?></td>
        <td><?= number_format((int)$value["s_montant"], 0, ',', ' ') . " CDF" ?></td>
        <td><?= number_format((int)$value["s_total_released"], 0, ',', ' ')  . " CDF" ?></td>
        <td><?= number_format((int)$value["s_ecart"], 0, ',', ' ')  . " CDF " ?></td>
        <td><?= (int)$value["s_taux_real"] . " %" ?></td>
        <td><?= " " ?></td>
      </tr>
    <?php endforeach; ?>
    <?php      $sous = 0;
$lib = 0;
$eca = 0;
foreach ($data as $k => $v) {
$sous += (int) $v["s_montant"];
$lib += (int) $v["s_total_released"];
$eca += (int) $v["s_ecart"];
}
?>
<tr>
      <th scope="col">_______________</th>
      <th scope="col">_______________</th>
      <th scope="col">_______________</th>
      <th scope="col">_______________</th>
      <th scope="col">_______________</th>
      <th scope="col">_______________</th>
      <th scope="col">_______________</th>
      <th scope="col">_______________</th>
      <th scope="col">_______________</th>
      <th scope="col">_______________</th>  
</tr>

      <tr>
      <th scope="col"><?= '-###-'?></th>
      <th scope="col"><?= "TOTAUX" ?></th>
      <th scope="col"><?= "-###-" ?></th>
      <th scope="col"><?= "GENERAUX" ?></th>
      <th scope="col"><?= '-###-' ?></th>
      <th scope="col"><?= number_format((int)$sous, 0, ',', ' ')  . " CDF <br> (" . number_format(((int)$sous / $taux), 2, ',', ' ') . " USD)"; ?></th>
      <th scope="col"><?= number_format((int)$lib, 0, ',', ' ') . " CDF <br> (" . number_format(((int)$lib / $taux), 2, ',', ' ') . " USD)"; ?></th>
      <th scope="col"><?= number_format((int)$eca, 0, ',', ' ') . " CDF <br> (" . number_format(((int)$eca / $taux), 2, ',', ' ') . " USD)"; ?></th>
      <th scope="col"><?= "-###-" ?></th>
      <th scope="col"><?= "" ?></th>
    </tr>
  </tbody>
<?php endif; ?>
</table>
