<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->

  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> -->

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

  <style>
    <?= file_get_contents(__DIR__ . "/css/main.css") ?>
  </style>

  <div class="p-3 mb-5 bg-body rounded">
    <div class="container-fluid">
      <h4 class="text-sm-center fs-2">POSTE ECCLESIASTIQUE DE GOMA</h4>
      <h3 class="text-sm-center fs-3">CHAPELLE 3ème CBCA KASIKA</h3>

      <div class="container text-center">
        <div class="row">
          <div class="col">
            <!-- Column -->
          </div>
          <div class="col">
            <img src=<?= __DIR__ . "/icon/logo.png" ?> alt="CBCA logo" srcset="" class="img-thumbnail mx-auto p-2 justify-content-sm-center" style="width: 50px;">
            <!-- column -->
          </div>
          <div class="col">
          </div>
        </div>

      </div>
      <h3 class="text-sm-center fs-4">SITUATION AHADI 2023 | {{categorie}} </h3>
    </div>

  </div>


  <div class="p-3 mb-5 bg-body rounded">
    {{content}}
  </div>


  <div class="container grid">
    <span class="g-col-4">
      <p class="text-sm-center mb-3">Fait a Goma, le <?= " " . date("d-F-Y") . " " ?></p>
    </span>

    <span class="g-col-4">

      <span class="g-col-4">
      </span>

  </div>


  <table class="table table-bordered grid">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col">POUR LA CHAPELLE CBCA KASIKA</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col text-sm-end">POUR LA COMPTABILITE</th>
    </tr>
  </thead>
  <tbody>
      <tr>
        <td scope="row"></td>
        <td scope="row"></td>
        <td scope="row">Rev. LUKOO MAONERO Innocent</td>
        <td scope="row"></td>
        <td scope="row"></td>
        <td scope="row"></td>
        <td scope="row"></td>
        <td scope="row"></td>
        <td scope="row"></td>
        <td scope="row"></td>
        <td scope="row text-sm-end">MUMBERE GILBERT Elisha</td>
      </tr>

      <tr>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row text-sm-end">&nbsp; &nbsp;</td>
      </tr>
      <tr>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row text-sm-end">&nbsp; &nbsp;</td>
      </tr>
      <tr>
      <tr>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row">&nbsp; &nbsp;</td>
        <td scope="row text-sm-end">&nbsp; &nbsp;</td>
      </tr>

      <tr>
        <td scope="row"></td>
        <td scope="row"></td>
        <td scope="row">PASTEUR PAROISSIAL</td>
        <td scope="row"></td>
        <td scope="row"></td>
        <td scope="row"></td>
        <td scope="row"></td>
        <td scope="row"></td>
        <td scope="row"></td>
        <td scope="row"></td>
        <td scope="row text-sm-end">SECRETAIRE COMPTABLE</td>
      </tr>
  </tbody>
</table>

<script>
       <?= file_get_contents(__DIR__ . "/js/main.js") ?>
  </script>

</body>

</html>