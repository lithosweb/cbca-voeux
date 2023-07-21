<!DOCTYPE html>
<html lang="en" class="p-3 mb-2 bg-black text-white">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->

  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> -->

  <link rel="stylesheet" href="main.css">
  <title>CBCA-Kasika</title>
</head>

<body class="p-3 mb-2 bg-black text-white mb-0">

  <!-- STYLING DOCUMENT -->
  <style>
    <?= file_get_contents(__DIR__ . "/css/main.css") ?>
  </style>
  <!-- STYLING DOCUMENT -->

  <div class="mt-5 pt-5 py-3">
    <div class="fs-1 d-flex align-items-center justify-content-center">
      Login
    </div>




    <div class="d-flex align-items-center justify-content-center">
      {{content}}
    </div>

  </div>
  <script src="js/main.js"></script>
</body>


</html>