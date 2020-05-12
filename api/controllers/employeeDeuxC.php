<?php
require_once MODELS.DS.'employeeDeuxM.php';
require_once CLASSES.DS.'view.php';
class EmployeeDeuxController {
  public function construct(){}

  public function index() {
    $this->listall();
  }
  public function listall(){
    $m=New EmployeeDeuxModel();
    $employees=$m->listAll();
    $v=new View();
    $v->setVar('data',$employees);
    $v->renderjson(200);
  }
  public function view($id=null){
    $m=New EmployeeDeuxModel();
    $v=new View();
    if ($employee=$m->listOne($id)) $v->setVar('data',$employee);
    $v->renderjson(200);
  }
  public function edit($id=null)
  {
    $json = file_get_contents('php://input');
    $post_vars = json_decode($json);
    $m=New EmployeeDeuxModel();
    $v=new View();    
    $m->updateEmployee2($post_vars->ContactID, $post_vars->AddressID, $post_vars->nom, $post_vars->prenom, $post_vars->adresse, $post_vars->ville, $post_vars->codePostal);
    $v->renderjson(200);
    
  }
}
?>