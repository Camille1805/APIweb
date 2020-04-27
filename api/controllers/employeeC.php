<?php
class EmployeeController {
  public function construct(){}

  public function index() {
    $this->listall();
  }
  public function listall(){
    require_once MODELS.DS.'employeeM.php';
    $m=New EmployeeModel();
    $employees=$m->listAll();
    // Affichage au sein de la vue des données récupérées via le model
    require_once CLASSES.DS.'view.php';
    $v=new View();
    $v->setVar('data',$employees);
    $v->renderjson(200);
  }
  public function view($id=null){
    require_once MODELS.DS.'employeeM.php';
    $m=New EmployeeModel();
    require_once CLASSES.DS.'view.php';
    $v=new View();
    if ($employee=$m->listOne($id)) $v->setVar('data',$employee);
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
    require_once MODELS.DS.'employeeM.php';
    $m=New EmployeeModel();
    $m->delete($id);
    $v=new View();
    $v->setVar('data',array('ID'=>$id));
    $v->renderjson(200);
  }
  public function listmanagers(){
    require_once MODELS.DS.'employeeM.php';
    $m=New EmployeeModel();
    $employees=$m->listManagers();
    // Affichage au sein de la vue des données récupérées via le model
    require_once CLASSES.DS.'view.php';
    $v=new View();
    $v->setVar('employeelist',$employees);
    $v->render('employee','listmanagers');
  }
  public function viewmanager($id=null){
    require_once MODELS.DS.'employeeM.php';
    $m=New EmployeeModel();
    require_once CLASSES.DS.'view.php';
    $v=new View();
    if ($employee=$m->listOne($id)) $v->setVar('e',$employee);
    $employees=$m->listWithAManager($id);
    $v->setVar('employeelist',$employees);
    // Affichage au sein de la vue des données récupérées via le model
    $v->render('employee','viewmanager');
  }
}
?>