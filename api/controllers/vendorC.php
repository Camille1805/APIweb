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
    require_once CLASSES.DS.'view.php';
    $v=new View();
    $v->setVar('data',$vendors);
    $v->renderjson(200);
  }
  public function view($id=null){
    require_once MODELS.DS.'vendorM.php';
    $m=New VendorModel();
    require_once CLASSES.DS.'view.php';
    $v=new View();
    if ($vendor=$m->listOne($id)) $v->setVar('data',$vendor);
    $v->renderjson(200);
  }
  public function edit($id=null){
    require_once CLASSES.DS.'view.php';
    $v=new View();
    $v->setVar('data',array('ErrorMessage'=>'501 - EDIT function Not implemented'));
    $v->renderjson(501);
  }
  public function delete($id=null){
    require_once MODELS.DS.'vendorM.php';
    $m=New VendorModel();
    $m->delete($id);
    $v=new View();
    $v->setVar('data',array('ID'=>$id));
    $v->renderjson(200);
  }
}
?>