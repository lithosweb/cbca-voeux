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
      <th scope="col">Date</th>
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
        <td><?= $value["r_montant"] . " CDF" ?></td>
        <td><?= $taux . " CDF" ?></td>
        <td><?= $value["r_date"] ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
<?php endif; ?>
</table>