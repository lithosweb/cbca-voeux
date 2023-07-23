<?php
require_once __DIR__."/../../../vendor/autoload.php";
use v\helpers\Helpers;

$taux = Helpers::getTaux();
?>

<h3 class="text-sm-center">Modifier taux</h3>

<form class="container" action="/taux" method="post">

    <div class="shadow-lg p-3 mb-3 bg-body rounded">
        <label class="form-label">Ancien taux</label>
        <input type="text" class="form-control" maxlength="50" value='<?= " 1 USD ~ " . number_format($taux, 0, ',', ' ') . " CDF" ?>' disabled readonly>
        <label class="form-label">Nouveau taux</label>
        <input type="number" class="form-control" maxlength="50" placeholder="Inserer taux" name="taux" autofocus required>
        <button type="submit" class="btn btn btn-primary mt-3">Submit</button>
    </div>
</form>