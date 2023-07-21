<?php
require_once __DIR__ . "/../../../vendor/autoload.php";

use v\helpers\Helpers;
use v\model\Database;

$dass = $_GET;
$dat = Helpers::sanitizeData($_GET);
$db = new Database;
$taux = (int) Helpers::getTaux();
if ($taux == 0) {
$taux = 2500;
}

if (empty($dat)) {
  $data = $db->selectJoinMembers("members", "subscriptions", "members.m_nom", "");
} else {
  $data = $db->selectJoinMembers("members", "subscriptions", "members.m_nom", $dat["_"]);
}
?>
<h3 class="text-sm-center">Souscriptions</h3>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Postnom</th>
      <th scope="col">Prenom</th>
      <!-- <th scope="col">Chapelle</th> -->
      <th scope="col">Categorie</th>
      <th scope="col">Souscription (T)</th>
      <th scope="col">Liberations (T)</th>
      <th scope="col">Ecart (S-L)</th>
      <th scope="col">Taux.real (%)</th>
      <th scope="col">(USD~CDF)</th>
      <th scope="col">Date</th>
      <th scope="col">Actions (*)</th>
    </tr>
  </thead>
  <?php if (!empty($data)) : ?>
    <tbody>
      <?php
      foreach ($data as $key => $value) :
        // $foreign = $db->selectAll("subscriptions");
      ?>
        <tr>
          <td><?= "~" ?></td>
          <td><?= ucfirst($value["m_nom"]) ?></td>
          <td><?= ucfirst($value["m_postnom"]) ?></td>
          <td><?= ucfirst($value["m_prenom"]) ?></td>
          <!-- <td><?php // $value["s_chapelle"] ?></td> -->
          <td><?= $value["s_categorie"] ?></td>
          <td><?= number_format((int)$value["s_montant"], 0, ',', ' ') . " CDF <br> (" . number_format(((int)$value["s_montant"] / $taux), 2, ',', ' ') . " USD)" ?></td>
          <td><?= number_format((int)$value["s_total_released"], 0, '.', ' ') . " CDF <br> (" . number_format(((int)$value["s_total_released"] / $taux), 2, ',', ' ') . " USD)" ?></td>
          <td><?= number_format((int)$value["s_ecart"], 0, ',', ' ') . " CDF <br> (" . number_format(((int)$value["s_ecart"] / $taux), 2, ',', ' ') . " USD)" ?></td>
          <td><?= number_format((int)$value["s_taux_real"], 0, ',', ' ') . " %" ?></td>
          <td><?= $taux . " CDF" ?></td>
          <td><?= $value["s_date"] ?></td>
          <td>
            <!-- cool -->
            <a href="/liberation/creer?_=<?= $value["s_code_membre"] . "&__=" . $value["s_code"] ?>" class="btn btn-sm btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
              </svg>Liberer</a> <br>

            <!-- cool -->
            <a href="/souscription/update?_=<?= $value["s_code"] ?>" class="btn btn-sm btn-outline-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brush-fill" viewBox="0 0 16 16">
                <path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.118 8.118 0 0 1-3.078.132 3.659 3.659 0 0 1-.562-.135 1.382 1.382 0 0 1-.466-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.394-.197.625-.453.867-.826.095-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.201-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.176-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04z" />
              </svg>Update</a> <br>

            <!-- cool -->
            <form action="/souscription/delete" method="post">
              <input type="hidden" name="_" value="<?= $value["s_code"] ?>">
              <button type="submit" class="btn btn-sm btn-outline-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="maroon" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                </svg>Delete

              </button>
            </form>

          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
</table>
<?php endif ?>