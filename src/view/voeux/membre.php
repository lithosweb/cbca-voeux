<h1>Membres Page</h1>

<form class="container" action="/membre/post" method="POST">

  <div class="shadow-lg p-3 mb-5 bg-body rounded">
    <label for="exampleInputEmail1" class="form-label">Nom</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nom">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="shadow-lg p-3 mb-5 bg-body rounded">
    <label for="exampleInputEmail1" class="form-label">Postnom</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="post">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="shadow-lg p-3 mb-5 bg-body rounded">
    <label for="exampleInputEmail1" class="form-label">Prenom</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="pre">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="shadow-lg p-3 mb-5 bg-body rounded">
    <label for="exampleInputEmail1" class="form-label">Sexe</label>
    <select class="form-select" aria-label="Default select example" name="sexe">
  <option value="M">Masculin</option>
  <option value="F">Feminin</option>  
  </div>

</select>
  <div class="shadow-lg p-3 mb-5 bg-body rounded">
    <label for="exampleInputEmail1" class="form-label">Telephone</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tel">
    <div id="emailHelp" class="form-text"></div>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>


