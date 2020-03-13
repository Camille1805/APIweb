<main role="main" class="container">
    <div class="starter-template">
      <h1>Affichage de la liste des départements</h1>
    </div>

<!--
0 =>
    object(stdClass)[5]
      public 'DepartmentID' => string '1' (length=1)
      public 'Name' => string 'Engineering' (length=11)
      public 'GroupName' => string 'Research and Development' (length=24)
      public 'ModifiedDate' => string '1998-06-01 00:00:00' (length=19)
-->

  <div class="row">
    <table class="table table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Nom du groupe</th>
        <th scope="col"><i class="fas fa-eye"></i></th>
        <th scope="col"><i class="fas fa-edit"></i></th>
        <th scope="col"><i class="fas fa-trash-alt"></i></th>

      </tr>
    </thead>
    <tbody>
    <?php foreach ($departmentlist as $d){ ?>
      <tr>
        <td><?php if (isset($d->DepartmentID)) echo $d->DepartmentID; ?></td>
        <td><?php if (isset($d->Name)) echo $d->Name; ?></td>
        <td><?php if (isset($d->GroupName)) echo $d->GroupName; ?></td>
        <td><?php if (isset($d->DepartmentID)) echo '<a href="'.URL_BASE.'/department/view/'.$d->DepartmentID.'" data-toggle="tooltip" title="Voir" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>';?></td>
        <td><?php if (isset($d->DepartmentID)) echo '<a href="'.URL_BASE.'/department/edit/'.$d->DepartmentID.'" data-toggle="tooltip" title="Modifier" class="btn btn-warning  btn-sm"><i class="fas fa-edit"></i></a>';?></td>
        <td><?php if (isset($d->DepartmentID)) echo '<a href="'.URL_BASE.'/department/delete/'.$d->DepartmentID.'" data-toggle="tooltip" title="Supprimer" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>';?></td>
      </tr>
    <?php }?>
    </tbody>
    </table>
  </div>
</main><!-- /.container -->