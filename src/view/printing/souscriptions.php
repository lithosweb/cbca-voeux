<?php
require_once __DIR__ . "/../../../vendor/autoload.php";

use v\model\database\Printing;

$db = new Printing;
$data = $db->selectJoinMembersForPrint("members", "subscriptions");
?>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Postnom</th>
      <th scope="col">Prenom</th>
      <!-- <th scope="col">Chapelle</th> -->
      <th scope="col">Categorie</th>
      <th scope="col">Montant.Souscrit</th>
      <th scope="col">Liberations</th>
      <th scope="col">Ecart</th>
      <th scope="col">Taux.real</th>
      <th scope="col">Date</th>
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
        <!-- <td><?= "" //$value["s_chapelle"] ?></td> -->
        <td><?= $value["s_categorie"] ?></td>
        <td><?= (int)$value["s_montant"] . " CDF" ?></td>
        <td><?= (int)$value["s_total_released"] . " CDF" ?></td>
        <td><?= (int)$value["s_ecart"] . " CDF" ?></td>
        <td><?= (int)$value["s_taux_real"] . " %" ?></td>
        <td><?= $value["s_date"] ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
<?php endif; ?>
</table>
