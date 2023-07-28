<h3 class="text-sm-center">Printing page</h3>

<form class="container" action="/print" method="post" target="_blank">
  <div class="shadow-lg p-2 mx-5 bg-body rounded">

    <select name="display" aria-placeholder="display" class="form-control mb-3">
      <option value="display" disabled>Orientation</option>
      <option value="portrait">Portrait</option>
      <option value="landscape">Paysage</option>
    </select>

    <select name="table" aria-placeholder="table" class="form-control mb-3">
      <option value="categorie" disabled>Table</option>
      <option value="souscriptions">Souscriptions</option>
      <option value="membres">Membres</option>
      <option value="liberations">Liberations</option>
      <option value="custom">Personnaliser</option>
    </select>

    <select name="categorie" aria-placeholder="Categorie" class="form-control">
      <option value="categorie" disabled>Categorie</option>
      <option value="neophyte">Neophytes</option>
      <option value="commercant">Commercants</option>
      <option value="min.enfant">Min.Enfant</option>
      <option value="fundi.mikono">Fundi.Mikono</option>
      <option value="debrouillard">Debrouillards</option>
      <option value="fonctionnaire">Fonctionnaires</option>
      <option value="m.j.c">M.J.C</option>
      <option value="hors.categorie">Hors categorie</option>
      <option value="all">Toutes categories</option>
    </select>

    <button type="submit" class="btn btn-sm btn-primary mt-3">Imprimer</button>
  </div>
</form>