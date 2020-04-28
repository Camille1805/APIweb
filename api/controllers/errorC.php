<?php
require_once CLASSES.DS.'view.php';
class ErrorController {
  public function construct(){}

  public function e404(){
    $v=new View();
    $v->setVar('data',array('ErrorMessage'=>'Ressource not found'));
    $v->renderjson(404);
  }
  public function e400(){
    $v=new View();
    $v->setVar('data',array('ErrorMessage'=>'Bad request - Merci de corriger votre reqûete'));
    $v->renderjson(404);
  }
  public function e501(){
    $v=new View();
    $v->setVar('data',array('ErrorMessage'=>'Function Not implemented'));
    $v->renderjson(404);
  }
}
?>