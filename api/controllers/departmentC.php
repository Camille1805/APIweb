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
      $v->setVar('departmentlist',$departments);
      $v->render('department','listall');
    }
    public function view($id=null){
      require_once MODELS.DS.'departmentM.php';
      $m=New DepartmentModel();
      require_once MODELS.DS.'employeeM.php';
      $e=New EmployeeModel();
      require_once CLASSES.DS.'view.php';
      $v=new View();
      if ($department=$m->listOne($id)) $v->setVar('d',$department);
      if ($employees=$e->listAllFromDepartment($id)) $v->setVar('employeelist',$employees);
      // Affichage au sein de la vue des données récupérées via le model
      $v->render('department','view');
    }
    public function edit($id=null){
      die('modification d\'un département');
    }
    public function delete($id=null){
      die('suppression d\'un département');
    }

}
?>