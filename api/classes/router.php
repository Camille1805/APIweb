<?php
class Router {
    private $method;
    private $controller;
    private $id;

    public function __construct(){
    }
    public function url(){
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
            $this->method='index';
            $this->controller='home';
            $this->id=null;
            break;
          case 1:
            // Seul le Controller est fourni
            $this->method='index';
            $this->controller=ucfirst(strtolower($url[0]));
            $this->id=null;
            break;
        
          case 2:
            // Controller + Method fournis
            $this->controller=ucfirst(strtolower($url[0]));
            $this->method=$url[1];
            $this->id=null;
            break;
          case 3:
              // Controller + Method + id fournis
              $this->controller=ucfirst(strtolower($url[0]));
              $this->method=$url[1];
              $this->id=$url[2];
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