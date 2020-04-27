<?php
class DepartmentController {
  public function construct(){}

  public function index() {
    $this->listall();
  }
  public function listall(){
    require_once MODELS.DS.'departmentM.php';
    $m=New DepartmentModel();
    $departments=$m->listAll();
    //var_dump($departments);die();
    // Affichage au sein de la vue des données récupérées via le model
    require_once CLASSES.DS.'view.php';
    $v=new View();
    $v->setVar('data',$departments);
    $v->renderjson(200);
  }
  public function view($id=null){
    require_once MODELS.DS.'departmentM.php';
    $m=New DepartmentModel();
    require_once MODELS.DS.'employeeM.php';
    $e=New EmployeeModel();
    require_once CLASSES.DS.'view.php';
    $v=new View();
    if ($department=$m->listOne($id)) $v->setVar('data',$department);
    //if ($employees=$e->listAllFromDepartment($id)) $v->setVar('employeelist',$employees);
    // Affichage au sein de la vue des données récupérées via le model
    $v->renderjson(200);
  }
  public function edit($id=null){
    require_once CLASSES.DS.'view.php';
    $v=new View();
    $v->setVar('data',array('ErrorMessage'=>'501 - EDIT function Not implemented'));
    $v->renderjson(501);
  }
  public function delete($id=null){
    require_once CLASSES.DS.'view.php';
    $v=new View();
    $v->setVar('data',array('ErrorMessage'=>'501 - EDIT function Not implemented'));
    $v->renderjson(501);
  }

}
?>