<?php
error_reporting(E_STRICT | E_ALL);
date_default_timezone_set('Europe/Paris');
setlocale (LC_TIME, 'fr_FR.utf8','fra');


// =====================  Initialisation
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
define('URL_BASE', 'http://'.$_SERVER['SERVER_NAME'].(($_SERVER['SERVER_PORT'] == '80')?'':':'.$_SERVER['SERVER_PORT']).((dirname($_SERVER['SCRIPT_NAME']) == DS)?'':dirname($_SERVER['SCRIPT_NAME'])) );
define('CONTROLLERS', ROOT.DS.'controllers');
define('VIEWS', ROOT.DS.'views');
define('MODELS', ROOT.DS.'models');
define('VENDORS', ROOT.DS.'vendors');
define('CLASSES', ROOT.DS.'classes');


// =====================  Détermination du controleur à utiliser: Est-ce que j'ai un paramètre 'url' dans mon URL?
if (isset($_GET['url'])){
	//Il y a un paramètre de précisé.
  $initialurl=isset($_GET['url'])?trim($_GET['url']):'';
  //Nettoyage de l'url
  if (substr($initialurl,-1) == '/')  $initialurl=substr($initialurl,0,-1);
  if (substr($initialurl, 0,1) == '/')  $initialurl=substr($initialurl,1);
}else{
	//Pas de paramètre
	$initialurl='';
}

$url = (!empty($initialurl)) ? explode('/', $initialurl) : array();
//print_r($url); 0 controller, 1 method, other :parameters
switch (count($url)) {
  case 0:
    $method='index';
    $controller='home';
    $id=null;
    break;
  case 1:
    // Seul le Controller est fourni
    $method='index';
    $controller=ucfirst(strtolower($url[0]));
    $id=null;
    break;

  case 2:
    // Controller + Method fournis
    $controller=ucfirst(strtolower($url[0]));
    $method=$url[1];
    $id=null;
    break;
  case 3:
      // Controller + Method + id fournis
      $controller=ucfirst(strtolower($url[0]));
      $method=$url[1];
      $id=$url[2];
      break;
  default:
    //plus de paramètres ... il faut décider quoi faire
    break;
}

// =====================  Appel
//On construit le nom du fichier qui contient le contrôleur appelé (ou le contrôleur par défaut)
$controllerfilename=$controller.'C.php';
//On inclut les fichiers nécessaires
include CONTROLLERS.DS.$controllerfilename;
//On construit le nom de la classe que l'on va instancier
$controllerclassname=ucfirst($controller).'Controller';
//On instancie cette classe
$c=new $controllerclassname();
//On appelle la méthode demandée (ou la méthode par défaut)
if (!is_null($id))
  $c->$method($id);
else
  $c->$method();


?>