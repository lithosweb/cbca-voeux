<?php
$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
?>
<!DOCTYPE html>
<html lang="en" class="bg-dark text-white">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->

  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> -->

  <title>CBCA-Kasika</title>
</head>

<body class="p-3 mb-2 bg-dark text-white">
  <!-- STYLING DOCUMENT -->
  <style type="text/css">
    <?= file_get_contents(__DIR__ . "/css/main.css") ?>
  </style>
  <!-- STYLING DOCUMENT -->


  <div class="pe-3 me-3 container text-center">
    <h1>
      Secretariat - CBCA - Kasika
    </h1>
  </div>

  <nav class="navbar navbar-expand-lg bg-body-tertiary mb-0">

    <div class="container-fluid">
      <div class="nav-item">
        <a href="/connexion" class="btn btn-sm btn-outline-danger">Deconnexion</a>
      </div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class='nav-item mx-md-2 me-3'>
            <a class="btn btn-outline-success" href="/membre/creer">Creer membre</a>
          </li>
          <li class='nav-item mx-md-2'>
            <a class="btn btn-outline-success" href="/membres">Membres</a>
          </li>
          <li class='nav-item mx-md-2'>
            <a class="btn btn-outline-success" href="/souscriptions">Souscriptions</a>
          </li>
          <li class='nav-item mx-md-2'>
            <a class="btn btn-outline-success" href="/souscriptions/categorie">categories</a>
          </li>
          <li class='nav-item mx-md-2'>
            <a class="btn btn-outline-success" href="/liberations">Liberations</a>
          </li>
          <li class='nav-item mx-md-2'>
            <a class="btn btn-outline-success" href="/taux">Taux</a>
          </li>
          <li class='nav-item mx-md-2'>
            <a class="btn btn-outline-success" href="/print">Imprimer</a>
          </li>

        </ul>

        <form class="d-flex" role="search" action="<?php
                                                    switch ($uri) {
                                                      case '/membres':
                                                        echo "/membres";
                                                        break;

                                                      case '/souscriptions':
                                                        echo "/souscriptions";
                                                        break;
                                                        break;

                                                      case '/liberations':
                                                        echo "/liberations";
                                                        break;

                                                      case '/souscriptions/categorie':
                                                        echo "/souscriptions/categorie";
                                                        break;

                                                      default:
                                                        echo "<script>alert('Something occurs');</script>";
                                                        echo "<h3><a href='/membres'>Go Home</a></h3>";
                                                        break;
                                                    } ?>" method="get">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="_">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

      </div>

    </div>
  </nav>

  <br>

  <div class="text-bg-dark mx-3">
    {{content}}
  </div>

  <script src="js/main.js"></script>
</body>

</html>