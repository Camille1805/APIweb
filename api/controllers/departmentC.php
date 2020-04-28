<?php
require_once MODELS.DS.'departmentM.php';
require_once CLASSES.DS.'view.php';
class DepartmentController {
  public function construct(){}

  public function index() {
    $this->listall();
  }
  public function listall(){
    $m=New DepartmentModel();
    $departments=$m->listAll();
    $v=new View();
    $v->setVar('data',$departments);
    $v->renderjson(200);
  }
  public function view($id=null){
    $m=New DepartmentModel();
    require_once MODELS.DS.'employeeM.php';
    $e=New EmployeeModel();
    $v=new View();
    if ($department=$m->listOne($id)) $v->setVar('data',$department);
    $v->renderjson(200);
  }
  public function edit($id=null){
    $v=new View();
    $v->setVar('data',array('ErrorMessage'=>'501 - EDIT function Not implemented'));
    $v->renderjson(501);
  }
  public function delete($id=null){
    $v=new View();
    $v->setVar('data',array('ErrorMessage'=>'501 - DELETE function Not implemented'));
    $v->renderjson(501);
  }

}
?>