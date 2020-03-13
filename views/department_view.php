<?php
function fAge($date) {
  $datetime1 = new DateTime("today");
  $datetime2 = new DateTime($date);
  $interval = $datetime2->diff($datetime1);
  return $interval->format('%y');
  }  ?>
<main role="main" class="container">
    <div class="starter-template">
      <h1>Affichage d'un département</h1>
    </div>

<!--
object(stdClass)[6]
  public 'DepartmentID' => string '1' (length=1)
  public 'Name' => string 'Engineering' (length=11)
  public 'GroupName' => string 'Research and Development' (length=24)
  public 'ModifiedDate' => string '1998-06-01 00:00:00' (length=19)
-->

  <br/>
  <div class="row">
    <h3>
      <?php if (isset($d->DepartmentID)) echo '('.$d->DepartmentID.') '; ?>
      <?php if (isset($d->Name)) echo $d->Name.' '; ?>
      <?php if (isset($d->DepartmentID)) echo ' <a href="'.URL_BASE.'/department/edit/'.$d->DepartmentID.'" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Modifier le département"><i class="fas fa-edit"></i> Modifier</a>';?>
    </h3>
  </div>

  <div class="row">
    <label class="col-md-4 control-label">Nom du groupe :</label>
    <div class="col-md-8">
      <?php if (isset($d->GroupName)) echo $d->GroupName; ?>
    </div>
  </div>
  <div class="row">
    <label class="col-md-4 control-label">Dernière modification :</label>
    <div class="col-md-8">
      <?php if (isset($d->ModifiedDate)) echo $d->ModifiedDate; ?>
    </div>
  </div>

  <?php if (isset($employeelist)) { ?>
  <div class="row">
    <br/><br/> <h4>Les employés du département.</h4>
    <table class="table table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Contact #</th>
        <th scope="col">National #</th>
        <th scope="col">Titre</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Poste</th>
        <th scope="col">Date Embauche</th>
        <th scope="col">Mail</th>
        <th scope="col"><i class="fas fa-eye"></i></th>
        <th scope="col"><i class="fas fa-edit"></i></th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($employeelist as $e){ ?>
      <tr>
        <td><?php if (isset($e->EmployeeID)) echo $e->EmployeeID; ?></td>
        <td><?php if (isset($e->ContactID)) echo $e->ContactID; ?></td>
        <td><?php if (isset($e->NationalIDNumber)) echo $e->NationalIDNumber; ?></td>
        <td><?php if (isset($e->CTitle)) echo $e->CTitle; ?></td>
        <td><?php if (isset($e->LastName)) echo $e->LastName; ?></td>
        <td><?php if (isset($e->FirstName)) echo $e->FirstName; ?></td>
        <td><?php if (isset($e->ETitle)) echo $e->ETitle; ?></td>
        <td><?php if (isset($e->HireDate)) echo date('d/m/Y',strtotime($e->HireDate)); ?></td>
        <td><?php if (isset($e->EmailAddress)) echo $e->EmailAddress; ?></td>
        <td><?php if (isset($e->EmployeeID)) echo '<a href="'.URL_BASE.'/employee/view/'.$e->EmployeeID.'" data-toggle="tooltip" title="Voir" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>';?></td>
        <td><?php if (isset($e->EmployeeID)) echo '<a href="'.URL_BASE.'/employee/edit/'.$e->EmployeeID.'" data-toggle="tooltip" title="Modifier" class="btn btn-warning  btn-sm"><i class="fas fa-edit"></i></a>';?></td>
      </tr>
    <?php }?>
    </tbody>
    </table>
  </div>
  <?php } else {?>
    <div class="row">
      Aucun employé au sein de ce département.
  </div>
  <?php }?>

</main><!-- /.container -->