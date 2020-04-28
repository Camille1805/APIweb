<?php
require_once MODELS.DS.'managerM.php';
require_once CLASSES.DS.'view.php';
class ManagerController {
  public function construct(){}

  public function index() {
    $this->listall();
  }
  public function listall(){
    $m=New ManagerModel();
    $managers=$m->listAll();
    $v=new View();
    $v->setVar('data',$managers);
    $v->renderjson(200);
  }
  public function view($id=null){
    $m=New ManagerModel();
    $v=new View();
    if ($manager=$m->listOne($id)) $v->setVar('data',$manager);
    $v->renderjson(200);
  }
  public function edit($id=null){
    $v=new View();
    $v->setVar('data',array('ErrorMessage'=>'501 - EDIT function Not implemented'));
    $v->renderjson(501);
  }
  public function delete($id=null){
    $m=New ManagerModel();
    $m->remove($id);
    $v=new View();
    $v->setVar('data',array('ID'=>$id));
    $v->renderjson(200);
  }
}
?>