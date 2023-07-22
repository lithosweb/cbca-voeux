<?php
require_once __DIR__ . "/../../../vendor/autoload.php";

use v\helpers\Helpers;
use v\model\Database;

$dass = $_GET;
$data = Helpers::sanitizeData($_GET);
$db = new Database;
if (empty($data)) {
  $data = $db->selectAll("members", "m_nom", "");
} else {
  $data = $db->selectAll("members", "m_nom", $data["_"]);
}
?>
<h3 class="text-sm-center">Membres</h3>
<table class="table table-bordered">
  <thead>

    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Postnom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Sexe</th>
      <th scope="col">Telephone</th>
      <th scope="col">Date</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <?php if (!empty($data)) : ?>
    <tbody>
      <?php foreach ($data as $key => $value) : ?>
        <tr>
          <th scope="row">~</th>
          <td scope="row"><?= ucfirst($value["m_nom"]) ?></td>
          <td scope="row"><?= ucfirst($value["m_postnom"]) ?></td>
          <td scope="row"><?= ucfirst($value["m_prenom"]) ?></td>
          <td scope="row"><?= $value["m_sexe"] ?></td>
          <td scope="row"><?= $value["m_telephone"] ?></td>
          <td scope="row"><?= $value["m_date"] ?></td>
          <td scope="row">

            <!-- cool -->
            <a href="/souscription/creer?_=<?= $value["m_code"] ?>" class="btn btn-sm btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
              </svg>Souscrire</a> <br>

            <!-- cool -->
            <a href="/membre/update?_=<?= $value["m_code"] ?>" class="btn btn-sm btn-outline-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brush-fill" viewBox="0 0 16 16">
                  <path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.118 8.118 0 0 1-3.078.132 3.659 3.659 0 0 1-.562-.135 1.382 1.382 0 0 1-.466-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.394-.197.625-.453.867-.826.095-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.201-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.176-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04z" />
                </svg>Update</a> <br>

            <!-- cool -->
            <form action="/membre/delete" method="post">
              <input type="hidden" name="_" value="<?= $value["m_code"] ?>">
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
  <?php endif ?>
</table>