<?php
$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$vvv = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->

  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> -->

  <link href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- <script src="/vendor/twbs/bootstrap/dist/css/bootstrap.min.js"></script> -->

  <title>Document</title>
</head>

<body class="p-3 mb-2 bg-dark text-white">

  <div class="container text-center">
    <h1>
      CBCA-Voeux
    </h1>
  </div>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">

    <div class="container-fluid">

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link active" href="/membre/creer">Creer un Membre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/membres">Membres</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/souscriptions">Souscriptions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/liberations">Liberations</a>
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

                                                      default:
                                                        echo "Something went wrong";
                                                        echo "<h3><a href='/membres'></a></h3>";
                                                        break;
                                                    } ?>" method="get">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="_" value="<?= $vvv ?>">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

      </div>

    </div>
  </nav>

  <br>

  <div class="text-bg-secondary p-3">
    {{content}}
  </div>


</body>

</html>