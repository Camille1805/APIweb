<?php
class Router {
  private $method;
  private $controller;
  private $id;

  public function __construct(){
  }
  public function url(){
    $requestmethod=$_SERVER['REQUEST_METHOD'];
    $initialuri=$_SERVER['REQUEST_URI'];
    if (substr($initialuri,-1) == '/')  $initialuri=substr($initialuri,0,-1);
    $scriptname=$_SERVER['SCRIPT_NAME'];
    $dirscriptname=dirname($scriptname);
    $lensn=strlen($dirscriptname);
    $requesteduri=(substr($scriptname,0,$lensn) == $dirscriptname)?substr($initialuri,(strlen($initialuri)-$lensn-1)*-1):'';

    if (substr($requesteduri,-1) == '/')  $requesteduri=substr($requesteduri,0,-1);
    if (substr($requesteduri, 0,1) == '/')  $requesteduri=substr($requesteduri,1);

    if ($initialuri == $dirscriptname) $requesteduri='';
    $uri = (!empty($requesteduri)) ? explode('/', $requesteduri) : array();
    //print_r($url); 0 controller, 1 method, other :parameters
    switch (count($uri)) {
      case 0:
        $this->method='e404';
        $this->controller='error';
        $this->id=null;
        break;
      case 1:
        // Seul le Controller est fourni
        //On vérifie que la méthode est bien un GET
        if ($requestmethod == 'GET'){
          $this->method='listall';
          $this->controller=ucfirst(strtolower($uri[0]));
          $this->id=null;
        }else{
          $this->method='400'; //bad request
          $this->controller='error';
          $this->id=null;
        }
        break;
      case 2:
        // Controller + id fournis
        $this->controller=ucfirst(strtolower($uri[0]));
        $this->id=$uri[1];
        switch ($requestmethod) {
          case 'GET':
            $this->method='view';
            break;
          case 'DELETE':
            $this->method='delete';
            break;
          case 'PUT':
            $this->method='edit';
            break;
          case 'POST':
            $this->method='add';
            break;
          default:
            //décider quel traitement faire lorsque le verbe HTTP n'est pas connu
            break;
        }

        break;
      default:
        //plus de paramètres ... il faut décider quoi faire
        break;
    }
  }
  public function exec(){
      // =====================  Appel
      //On construit le nom du fichier qui contient le contrôleur appelé (ou le contrôleur par défaut)
      $this->controllerfilename=$this->controller.'C.php';
      //On inclut les fichiers nécessaires
      include CONTROLLERS.DS.$this->controllerfilename;
      //On construit le nom de la classe que l'on va instancier
      $this->controllerclassname=ucfirst($this->controller).'Controller';
      //On instancie cette classe
      $c=new $this->controllerclassname();
      //On appelle la méthode demandée (ou la méthode par défaut)
      $m=$this->method;
      if (!is_null($this->id))
          $c->$m($this->id);
      else
          $c->$m();
  }
}