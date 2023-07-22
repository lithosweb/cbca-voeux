<!DOCTYPE html>
<html lang="en">

<head>
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
            <!-- Column -->
          </div>
        </div>


      </div>
      <!-- <h3 class="text-sm-center fs-4">FICHE DE RAPPORT DE LA SEMAINE N°28 DU 10 JUILLET AU 16 JUILLET 2023</h3> -->
      <h3 class="text-sm-center fs-4">SITUATION AHADI 2023 | {{categorie}} </h3>
      <!-- FICHE DE RAPPORT DE LA SEMAINE N°28 DU 10 JUILLET AU 16 JUILLET 2023 -->
    </div>

  </div>


  <div class="p-3 mb-5 bg-body rounded">
    {{content}}
  </div>

  <!-- 
  <div class="container text-center">
  <div class="row">
    <div class="col"> -->
  <!-- Column -->
  <!-- </div>
    <div class="col"> -->
  <!-- Column -->
  <!-- <p class="text-sm-center mb-3">Fait a Goma, le <?= " " // . date("d-F-Y") . " " 
                                                      ?></p>
    </div>
    <div class="col"> -->
  <!-- Column -->
  <!-- </div>
  </div>
</div> -->


  <!-- <div class="container text-center">
  <div class="row align-items-start">
    <div class="col"> -->
  <!-- Column -->
  <!-- <p class="">POUR LA CHAPELLE CBCA KASIKA</p>
    <p class="">Rév. LUKOO MAONERO Innocent</p>
    <p class="">PASTEUR PAROISSIAL</p>
    </div>
    <div class="col">
    <p class="">POUR LA COMPTABILITE</p>
    <p class="">MUMBERE GILBERT Elisha</p>
    <p class="">SECRETAIRE COMPTABLE</p> -->
  <!-- Column -->
  <!-- </div>
    <div class="col"> -->
  <!-- Column -->
  <!-- </div>
    <div class="col"> -->
  <!-- Column -->
  <!-- </div>
  </div>
</div> -->


  <!-- <div class="container text-center d-flex justify-content-center">
  <div class="row">
    <div class="col"> -->
  <!-- Column -->
  <!-- <p class="">POUR LA CHAPELLE CBCA KASIKA</p>
    <p class="">Rév. LUKOO MAONERO Innocent</p>
    <p class="">PASTEUR PAROISSIAL</p>
    </div>
    <div class="col"> -->
  <!-- Column -->
  <!-- <p class="text-sm-center mb-3">Fait a Goma, le <?= " " // . date("d-F-Y") . " " 
                                                      ?></p>
    </div>
    <div class="col"> -->
  <!-- Column -->
  <!-- <p class="">POUR LA COMPTABILITE</p>
    <p class="">MUMBERE GILBERT Elisha</p>
    <p class="">SECRETAIRE COMPTABLE</p>
    </div>
  </div>
</div> -->

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
        <td scope="row text-sm-end">MUMBERE GILBERT JOEL</td>
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


</body>

</html>