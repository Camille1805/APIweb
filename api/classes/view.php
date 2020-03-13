<?php
class View {
  private $vars=array();
  public function construct(){}
  public function renderhtml($controllername,$viewname){
    if (isset($this->vars)){
      extract($this->vars);
    }
    echo '<!doctype html>';
    echo '<html lang="fr">';
    echo '<head>';
    include VIEWS.DS.'common'.DS.'head.php';
    echo '</head>';
    echo '<body>';
    include VIEWS.DS.'common'.DS.'nav.php';
    include VIEWS.DS.strtolower($controllername).'_'.strtolower($viewname).'.php';
    include VIEWS.DS.'common'.DS.'bs_js.php';
    echo '<body>';
  }
  public function renderjson($code=200){
    $jsone=isset($this->vars['data'])?json_encode($this->vars['data']):json_encode($this->vars);
    // On défini le header HTTP
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    // On défini le code retour HTTP
    http_response_code($code);
    echo $jsone;
    exit;
  }
  public function setVar($key, $value = null){
    if (is_array($key)){
      $this->vars = $key;
    } else {
      $this->vars[$key] = $value;
    }
  }
}
?>