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
      $v->setVar('employeelist',$employees);
      $v->render('employee','listall');
    }
    public function view($id=null){
      require_once MODELS.DS.'employeeM.php';
      $m=New EmployeeModel();
      require_once CLASSES.DS.'view.php';
      $v=new View();
      if ($employee=$m->listOne($id)) $v->setVar('e',$employee);
      // Affichage au sein de la vue des données récupérées via le model
      $v->render('employee','view');
    }
    public function edit($id=null){
      die('modification d\'un employé');
    }
    public function delete($id=null){
      require_once MODELS.DS.'employeeM.php';
      $m=New EmployeeModel();
      $m->delete($id);
      $this->listall();
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