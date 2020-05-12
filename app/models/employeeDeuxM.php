<?php
require_once CLASSES.DS.'RestCurlClient.php';
class EmployeeDeuxModel {
  public function construct(){}
  public function listAll(){
    $api=New RestCurlClient();
    try {
      set_time_limit(0);
      $response=$api->get(URL_APIBASE.'/employeeDeux');
      if ($response) return $response;
      else return false;
    } catch (Exception $e) {
      //Que fait-on en fonction du code erreur?  #TODO#
      return false;
    }
  }
  public function listOne($id){
    $api=New RestCurlClient();
    try {
      set_time_limit(0);
      $response=$api->get(URL_APIBASE.'/employeeDeux/'.$id);
      if ($response) return $response;
      else return false;
    } catch (Exception $e) {
      //Que fait-on en fonction du code erreur?  #TODO#
      return false;
    }
  }
  public function edit($EmployeeID, $ContactID, $AddressID, $nom, $prenom, $adresse, $ville, $codePostal){
    $api=New RestCurlClient();
    try {
      set_time_limit(0);
      $content=array(
        'ContactID'=>$ContactID,
        'AddressID'=>$AddressID,
        'nom'=>$nom,
        'prenom'=>$prenom,
        'adresse'=>$adresse,
        'ville'=>$ville,
        'codePostal'=>$codePostal
      );
      echo URL_APIBASE.'/employeedeux/'.$EmployeeID;
      var_dump($content);
      $response=$api->put(URL_APIBASE.'/employeedeux/'.$EmployeeID,null,$content);
      if ($response) return true;
      else return false;
    } catch (Exception $e) {
      //Que fait-on en fonction du code erreur?  #TODO#
      return false;
    }
  }
}
?>