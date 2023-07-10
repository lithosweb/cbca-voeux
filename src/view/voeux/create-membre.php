<h1>Membres Page</h1>

<form class="container" action="/membre/post" method="POST">

  <div class="shadow-lg p-3 mb-5 bg-body rounded">
    <label for="exampleInputEmail1" class="form-label">Nom</label>
    <input type="text" class="form-control"  name="nom">


    <label for="exampleInputEmail1" class="form-label">Postnom</label>
    <input type="text" class="form-control"  name="post">


    <label for="exampleInputEmail1" class="form-label">Prenom</label>
    <input type="text" class="form-control"  name="pre">


    <label for="exampleInputEmail1" class="form-label">Sexe</label>
    <select class=" name="sexe" aria-placeholder="Sexe">
  <option value="M">Masculin</option>
  <option value="F">Feminin</option>
 </select>


    <label for="exampleInputEmail1" class="form-label">Telephone</label>
    <input type="text" class="form-control" placeholder="Telephone" name="tel">


  <button type="submit" class="btn btn-primary">Submit</button></div>
</form>
