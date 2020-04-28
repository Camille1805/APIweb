<?php
require_once MODELS.DS.'employeeM.php';
require_once CLASSES.DS.'view.php';
class EmployeeController {
  public function construct(){}

  public function index() {
    $this->listall();
  }
  public function listall(){
    $m=New EmployeeModel();
    $employees=$m->listAll();
    $v=new View();
    $v->setVar('data',$employees);
    $v->renderjson(200);
  }
  public function view($id=null){
    $m=New EmployeeModel();
    $v=new View();
    if ($employee=$m->listOne($id)) $v->setVar('data',$employee);
    $v->renderjson(200);
  }
  public function edit($id=null){
    $v=new View();
    $v->setVar('data',array('ErrorMessage'=>'501 - EDIT function Not implemented'));
    $v->renderjson(501);
  }
  public function delete($id=null){
    $m=New EmployeeModel();
    $m->remove($id);
    $v=new View();
    $v->setVar('data',array('ID'=>$id));
    $v->renderjson(200);
  }
}
?>