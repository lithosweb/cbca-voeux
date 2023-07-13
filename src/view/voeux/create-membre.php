<h1>Creer un membre</h1>

<form class="container" action="/membre/creer" method="post">

  <div class="shadow-lg p-3 mb-5 bg-body rounded">
    <label for="exampleInputEmail1" class="form-label">Nom</label>
    <input type="text" class="form-control"  name="nom" maxlength="50">


    <label for="exampleInputEmail1" class="form-label">Postnom</label>
    <input type="text" class="form-control"  name="post" maxlength="50">


    <label for="exampleInputEmail1" class="form-label">Prenom</label>
    <input type="text" class="form-control"  name="pre" maxlength="50">


    <label for="exampleInputEmail1" class="form-label">Sexe</label>
    <select class="form-control" name="sexe">
  <option value="M">Masculin</option>
  <option value="F">Feminin</option>
 </select>

    <label for="exampleInputEmail1" class="form-label">Telephone</label>
    <input type="tel" class="form-control" placeholder="Telephone" name="tel" maxlength="20">

  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
