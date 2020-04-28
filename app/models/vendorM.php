<?php
require_once CLASSES.DS.'RestCurlClient.php';
class VendorModel {
  public function construct(){}
  public function listAll(){
    $api=New RestCurlClient();
    try {
      set_time_limit(0);
      $response=$api->get(URL_APIBASE.'/vendor');
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
      $response=$api->get(URL_APIBASE.'/vendor/'.$id);
      if ($response) return $response;
      else return false;
    } catch (Exception $e) {
      //Que fait-on en fonction du code erreur?  #TODO#
      return false;
    }
  }
}
?>