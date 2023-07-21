<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <title>Document</title> -->
</head>

<body>

  <style>
    <?= file_get_contents(__DIR__ . "/css/main.css") ?>
  </style>

  <div class="p-3 mb-5 bg-body rounded">
    <div class="container-fluid">
      <h4 class="text-sm-center fs-2">POSTE ECCLESIASTIQUE DE GOMA</h4>
      <h3 class="text-sm-center fs-3">CHAPELLE 3ème CBCA KASIKA</h3>
      <img src="" alt="" srcset="">
      <!-- <h3 class="text-sm-center fs-4">FICHE DE RAPPORT DE LA SEMAINE N°28 DU 10 JUILLET AU 16 JUILLET 2023</h3> -->
      <h3 class="text-sm-center fs-4">SITUATION AHADI 2023 | <?= "LIBERATIONS" ?></h3>
      <!-- FICHE DE RAPPORT DE LA SEMAINE N°28 DU 10 JUILLET AU 16 JUILLET 2023 -->
    </div>

    <div class="container text-center">
      <div class="row">
        <div class="col">
          <!-- Column -->
        </div>
        <div class="col">
          <img src=<?= __DIR__ . "/icon/logo.png" ?> alt="" srcset="" class="img-thumbnail mx-auto p-2 justify-content-sm-center" style="width: 50px;" alt="CBCA logo">
          <!-- column -->
          <!-- <img src="..." class="img-thumbnail" alt="..."> -->
        </div>
        <div class="col">
          <!-- Column -->
        </div>
      </div>
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
      <p class="text-sm-start end-50">POUR LA CHAPELLE CBCA KASIKA</p>
      <p class="text-sm-start end-50">Rév. LUKOO MAONERO Innocent</p>
      <p class="text-sm-start end-50">PASTEUR PAROISSIAL</p>

      <span class="g-col-4">
        <p class="text-sm-end start-50">POUR LA COMPTABILITE</p>
        <p class="text-sm-end start-50">MUMBERE GILBERT JOEL</p>
        <p class="text-sm-end start-50">SECRETAIRE COMPTABLE</p>
      </span>

  </div>


</body>

</html>