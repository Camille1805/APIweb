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
    // Affichage au sein de la vue des données récupérées via le model

    $v=new View();
    $v->setVar('employeelist',$employees);
    $v->render('employee','listall');
  }
  public function view($id=null){
    $m=New EmployeeModel();
    $v=new View();
    echo $id;
    if ($employee=$m->listOne($id)) $v->setVar('e',$employee);
    // Affichage au sein de la vue des données récupérées via le model
    $v->render('employee','view');
  }
  public function edit($id=null){
    die('modification d\'un employé');
  }
  public function delete($id=null){
    $m=New EmployeeModel();
    $m->remove($id);
    $this->listall();
  }
  public function listmanagers(){
    $m=New EmployeeModel();
    $employees=$m->listManagers();
    // Affichage au sein de la vue des données récupérées via le model
    $v=new View();
    $v->setVar('employeelist',$employees);
    $v->render('employee','listmanagers');
  }
  public function viewmanager($id=null){
    $m=New EmployeeModel();
    $v=new View();
    if ($employee=$m->listOne($id)) $v->setVar('e',$employee);
    $employees=$m->listWithAManager($id);
    $v->setVar('employeelist',$employees);
    // Affichage au sein de la vue des données récupérées via le model
    $v->render('employee','viewmanager');
  }
}
?>