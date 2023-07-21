<h3 class="text-sm-center">Creer membre</h3>

<form class="container" action="/membre/creer" method="post">

  <div class="shadow-lg p-2 mx-5 bg-body rounded">
    <label class="form-label">Nom</label>
    <input type="text" class="form-control" name="nom" maxlength="30" placeholder="Nom">


    <label class="form-label">Postnom</label>
    <input type="text" class="form-control" name="post" maxlength="30" placeholder="Post-nom">


    <label class="form-label">Prenom</label>
    <input type="text" class="form-control" name="pre" maxlength="30" placeholder="Prenom">


    <label class="form-label">Sexe</label>
    <select class="form-control" name="sexe" aria-placeholder="Sexe">
      <option value="M">Masculin</option>
      <option value="F">Feminin</option>
    </select>

    <label class="form-label">Telephone</label>
    <input type="tel" class="form-control" placeholder="Telephone" name="tel" maxlength="20">
    <br>

    <button type="submit" class="btn btn btn-primary">Submit</button>
  </div>
</form>