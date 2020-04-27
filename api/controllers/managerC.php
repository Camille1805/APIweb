<?php
class ManagerController {
  public function construct(){}

  public function index() {
    $this->listall();
  }
  public function listall(){
    require_once MODELS.DS.'managerM.php';
    $m=New managerl();
    $managers=$m->listAll();
    // Affichage au sein de la vue des données récupérées via le model
    require_once CLASSES.DS.'view.php';
    $v=new View();
    $v->setVar('data',$managers);
    $v->renderjson(200);
  }
  public function view($id=null){
    require_once MODELS.DS.'managerM.php';
    $m=New managerl();
    require_once CLASSES.DS.'view.php';
    $v=new View();
    if ($manager=$m->listOne($id)) $v->setVar('data',$manager);
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
    require_once MODELS.DS.'managerM.php';
    $m=New managerl();
    $m->delete($id);
    $v=new View();
    $v->setVar('data',array('ID'=>$id));
    $v->renderjson(200);
  }
}
?>