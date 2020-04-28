<?php
require_once MODELS.DS.'vendorM.php';
require_once CLASSES.DS.'view.php';
class VendorController {
  public function construct(){}

  public function index() {
    $this->listall();
  }
  public function listall(){
    $m=New VendorModel();
    $vendors=$m->listAll();
    $v=new View();
    $v->setVar('data',$vendors);
    $v->renderjson(200);
  }
  public function view($id=null){
    $m=New VendorModel();
    $v=new View();
    if ($vendor=$m->listOne($id)) $v->setVar('data',$vendor);
    $v->renderjson(200);
  }
  public function edit($id=null){
    $v=new View();
    $v->setVar('data',array('ErrorMessage'=>'501 - EDIT function Not implemented'));
    $v->renderjson(501);
  }
  public function delete($id=null){
    $m=New VendorModel();
    $m->remove($id);
    $v=new View();
    $v->setVar('data',array('ID'=>$id));
    $v->renderjson(200);
  }
}
?>