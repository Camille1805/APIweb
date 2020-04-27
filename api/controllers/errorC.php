<?php
class ErrorController {
  public function construct(){}

  public function e404(){
    require_once CLASSES.DS.'view.php';
    $v=new View();
    $v->setVar('data',array('ErrorMessage'=>'Ressource not found'));
    $v->renderjson(404);
  }
  public function e400(){
    require_once CLASSES.DS.'view.php';
    $v=new View();
    $v->setVar('data',array('ErrorMessage'=>'Bad request - Merci de corriger votre reqûete'));
    $v->renderjson(404);
  }
  public function e501(){
    require_once CLASSES.DS.'view.php';
    $v=new View();
    $v->setVar('data',array('ErrorMessage'=>'Function Not implemented'));
    $v->renderjson(404);
  }
}
?>