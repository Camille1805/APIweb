<?php
class ErrorController {
    public function construct(){}

    public function e404(){
      require_once CLASSES.DS.'view.php';
      $v=new View();
      $v->setVar('data',array('ErrorMessage'=>'Ressource not found'));
      $v->renderjson(404);
    }
}
?>