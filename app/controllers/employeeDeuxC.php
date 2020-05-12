<?php
class EmployeeDeuxController {
  public function construct(){}

  public function index() {
    $this->listall();
  }
  public function listall(){
    require_once MODELS.DS.'employeeDeuxM.php';
    $m=New EmployeeDeuxModel();
    $employees=$m->listAll();
    // Affichage au sein de la vue des données récupérées via le model
    require_once CLASSES.DS.'view.php';
    $v=new View();
    $v->setVar('employeelist',$employees);
    $v->render('employeedeux','listall');
  }
  public function view($id=null){
    require_once MODELS.DS.'employeeDeuxM.php';
    $m=New EmployeeDeuxModel();
    require_once CLASSES.DS.'view.php';
    $v=new View();
    if ($employee=$m->listOne($id)) $v->setVar('e',$employee);
    // Affichage au sein de la vue des données récupérées via le model
    $v->render('employeedeux','view');
  }
  public function edit($id){
    require_once MODELS.DS.'employeeDeuxM.php';
    $m=New EmployeeDeuxModel();
    require_once CLASSES.DS.'view.php';

    $v=new View();
    if ($employee=$m->listOne($id)) $v->setVar('e',$employee);
    // Affichage de la vue
    $v->render('employeeDeux','edit');
  }
  public function doedit(){
    require_once MODELS.DS.'employeeDeuxM.php';

    //On vérifie d'abord si les données minimales attendues sont bien présentes.
    //note: Il y a déjà un contrôle côté client, mais on refait la vérification côté serveur
    //On récupère les données postées
    $EmployeeID = !empty($_POST['EmployeeID']) ? trim($_POST['EmployeeID']) : 0;
    $ContactID = !empty($_POST['ContactID']) ? trim($_POST['ContactID']) : 0;
    $AddressID = !empty($_POST['AddressID']) ? intval(trim($_POST['AddressID'])) : 0;
    $LastName = !empty($_POST['LastName']) ? trim($_POST['LastName']) : '';
    $FirstName = !empty($_POST['FirstName']) ? trim($_POST['FirstName']) : '';
    $AddressLine1 = !empty($_POST['AddressLine1']) ? trim($_POST['AddressLine1']) : '';
    $ville = !empty($_POST['City']) ? trim($_POST['City']) : '';
    $codePostal = !empty($_POST['PostalCode']) ? trim($_POST['PostalCode']) : '';
    //On enregistre les données en base
    $m=New EmployeeDeuxModel();
    if (!$m->edit($EmployeeID, $ContactID, $AddressID, $LastName, $FirstName, $AddressLine1, $ville, $codePostal)){
      //La création du nouveau fournisseur n'a pas aboutie. On affiche un message d'erreur
    }
    header('Location: http://127.0.0.1/camillebalmerExamen/app/employeedeux/listall');
    exit();
  }
}
?>