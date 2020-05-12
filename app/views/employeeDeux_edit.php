<main role="main" class="container">
  <div class="starter-template">
    <h1>Création d'un fournisseur</h1>
  </div>
<form class="form-horizontal" id="addData" method="post" action="<?php echo URL_BASE.'/employeedeux/doedit'; ?>"  enctype="multipart/form-data">
  <div class="form-group row">
    <label class="col-md-4 col-form-label" for="LastName">LastName :</label>
    <div class="col-md-6 col-form-label">
    <input id="ContactID" name="ContactID" type="hidden" placeholder="" value="<?php echo $e->ContactID; ?>" class="form-control input-md">
    <input id="AddressID" name="AddressID" type="hidden" placeholder="" value="<?php echo $e->AddressID; ?>" class="form-control input-md">
    <input id="EmployeeID" name="EmployeeID" type="hidden" placeholder="" value="<?php echo $e->EmployeeID; ?>" class="form-control input-md">

      <input id="LastName" name="LastName" type="text" placeholder="" value="<?php echo $e->LastName; ?>" class="form-control input-md">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-4 col-form-label" for="FirstName">FirstName :</label>
    <div class="col-md-6 col-form-label">
      <input id="FirstName" name="FirstName" type="text" placeholder="" value="<?php echo $e->FirstName; ?>" class="form-control input-md" required>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-4 col-form-label" for="AddressLine1">AddressLine1 :</label>
    <div class="col-md-6 col-form-label">
      <input id="AddressLine1" name="AddressLine1" type="text" placeholder="" value="<?php echo $e->AddressLine1; ?>" class="form-control input-md" required>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-4 col-form-label" for="City">City :</label>
    <div class="col-md-6 col-form-label">
      <input id="City" name="City" type="text" placeholder="" value="<?php echo $e->City; ?>" class="form-control input-md" required>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-4 col-form-label" for="PostalCode">PostalCode :</label>
    <div class="col-md-6 col-form-label">
      <input id="PostalCode" name="PostalCode" type="text" placeholder="" value="<?php echo $e->PostalCode; ?>" class="form-control input-md" required>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-md-4 col-form-label" for="ValidationButton"></label>
    <div class="col-md-8">
      <button type="submit" id="submit" name="submit" class="btn btn-primary">Modifier</button>
      <a href="<?php echo URL_BASE . '/employeedeux/listall'; ?>" id="cancel" class="btn btn-warning">Annuler</a>
    </div>
  </div>
</form>
</div>