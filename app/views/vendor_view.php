<main role="main" class="container">
    <div class="starter-template">
      <h1>Affichage d'un fournisseur</h1>
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

  <br/>
  <div class="row">
    <h3>
      <?php if (isset($v->VendorID)) echo '('.$v->VendorID.') '; ?>
      <?php if (isset($v->Name)) echo $v->Name.' '; ?>
      <?php if (isset($v->VendorID)) echo ' <a href="'.URL_BASE.'/vendor/edit/'.$v->VendorID.'" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Modifier le fournisseur"><i class="fas fa-edit"></i> Modifier</a>';?>
    </h3>
  </div>

  <div class="row">
    <label class="col-md-4 control-label">AccountNumber :</label>
    <div class="col-md-8">
      <?php if (isset($v->AccountNumber)) echo $v->AccountNumber; ?>
    </div>
  </div>
  <div class="row">
    <label class="col-md-4 control-label">Niveau de crédit :</label>
    <div class="col-md-8">
      <?php if (isset($v->CreditRating)) echo $v->CreditRating; ?>
    </div>
  </div>
  <div class="row">
    <label class="col-md-4 control-label">Fournisseur Préféré ? :</label>
    <div class="col-md-8">
      <?php if (isset($v->PreferredVendorStatus) && $v->PreferredVendorStatus) echo '<i class="fas fa-check"></i>'; ?>
    </div>
  </div>
  <div class="row">
    <label class="col-md-4 control-label">Dernière modification :</label>
    <div class="col-md-8">
      <?php if (isset($v->ModifiedDate)) echo $v->ModifiedDate; ?>
    </div>
  </div>
</main><!-- /.container -->