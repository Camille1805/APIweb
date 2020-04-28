<main role="main" class="container">
    <div class="starter-template">
      <h1>Affichage de la liste des fournisseurs</h1>
    </div>

<!--
 	1 	VendorID  Primary 	int(11)
	2 	AccountNumber 	varchar(15) 	utf8_general_ci
	3 	Name 	varchar(50) 	utf8_general_ci
	4 	CreditRating 	tinyint(4)
	5 	PreferredVendorStatus 	bit(1)
	6 	ActiveFlag 	bit(1)
	7 	PurchasingWebServiceURL 	mediumtext 	utf8_general_ci
	8 	ModifiedDate 	timestamp
-->

  <div class="row">
    <table class="table table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">AccountNumber</th>
        <th scope="col">Niveau de crédit</th>
        <th scope="col">Fournisseur préféré?</th>
        <th scope="col"><i class="fas fa-eye"></i></th>
        <th scope="col"><i class="fas fa-edit"></i></th>
        <th scope="col"><i class="fas fa-trash-alt"></i></th>

      </tr>
    </thead>
    <tbody>
    <?php foreach ($vendorlist as $v){ ?>
      <tr>
        <td><?php if (isset($v->VendorID)) echo $v->VendorID; ?></td>
        <td><?php if (isset($v->Name)) echo $v->Name; ?></td>
        <td><?php if (isset($v->AccountNumber)) echo $v->AccountNumber; ?></td>
        <td><?php if (isset($v->CreditRating)) echo $v->CreditRating; ?></td>
        <td><?php if (isset($v->PreferredVendorStatus) && $v->PreferredVendorStatus) echo '<i class="fas fa-check"></i>'; ?></td>
        <td><?php if (isset($v->VendorID)) echo '<a href="'.URL_BASE.'/vendor/view/'.$v->VendorID.'" data-toggle="tooltip" title="Voir" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>';?></td>
        <td><?php if (isset($v->VendorID)) echo '<a href="'.URL_BASE.'/vendor/edit/'.$v->VendorID.'" data-toggle="tooltip" title="Modifier" class="btn btn-warning  btn-sm"><i class="fas fa-edit"></i></a>';?></td>
        <td><?php if (isset($v->VendorID)) echo '<a href="'.URL_BASE.'/vendor/delete/'.$v->VendorID.'" data-toggle="tooltip" title="Supprimer" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>';?></td>
      </tr>
    <?php }?>
    </tbody>
    </table>
  </div>
</main><!-- /.container -->