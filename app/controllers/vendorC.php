<?php
class VendorController {
  public function construct(){}

  public function index() {
    $this->listall();
  }
  public function listall(){
    require_once MODELS.DS.'vendorM.php';
    $m=New VendorModel();
    $vendors=$m->listAll();
    // Affichage au sein de la vue des données récupérées via le model
    require_once CLASSES.DS.'view.php';
    $v=new View();
    $v->setVar('vendorlist',$vendors);
    $v->render('vendor','listall');
  }
  public function view($id=null){
    require_once MODELS.DS.'vendorM.php';
    $m=New VendorModel();
    require_once CLASSES.DS.'view.php';
    $v=new View();
    if ($vendor=$m->listOne($id)) $v->setVar('v',$vendor);
    // Affichage au sein de la vue des données récupérées via le model
    $v->render('vendor','view');
  }
  public function edit($id=null){
    die('modification d\'un fournisseur');
  }
  public function delete($id=null){
    require_once MODELS.DS.'vendorM.php';
    $m=New VendorModel();
    $m->delete($id);
    $this->listall();
  }
}
?>