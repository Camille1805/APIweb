<?php
require_once CLASSES.DS.'modelpdo.php';
class EmployeeDeuxModel extends ModelPDO{
  public function construct(){}
  public function listAll(){
    $sql='SELECT  employee.EmployeeID, contact.FirstName,contact.LastName,address.AddressLine1,address.City,address.PostalCode 
    FROM address INNER JOIN employeeaddress on address.AddressID=employeeaddress.AddressID 
    INNER JOIN employee on employeeaddress.EmployeeID = employee.EmployeeID INNER JOIN contact on employee.ContactID=contact.ContactID
    where employee.CurrentFlag<>0';
    return $this->select($sql);
  }
  public function listOne($id){
    $sql='SELECT  employee.EmployeeID,contact.ContactID,address.AddressID, contact.FirstName,contact.LastName,address.AddressLine1,address.City,address.PostalCode 
    FROM address INNER JOIN employeeaddress on address.AddressID=employeeaddress.AddressID 
    INNER JOIN employee on employeeaddress.EmployeeID = employee.EmployeeID INNER JOIN contact on employee.ContactID=contact.ContactID
    where employee.EmployeeID =:id';
    $p=array(
          ':id'   => array('value'=>$id, 'type'=>PDO::PARAM_INT)
    );
    return current($this->select($sql,$p));
  }
  public function updateEmployee2($ContactID, $AddressID, $nom, $prenom, $adresse, $ville, $codePostal)
  {
    $sql='UPDATE contact AS C SET C.FirstName=:prenom, C.LastName=:nom WHERE C.ContactID=:ContactID;
    UPDATE address AS A SET A.AddressLine1=:adresse, A.City=:ville, A.PostalCode=:codePostal WHERE A.AddressID=:AddressID';
    $p=array(
      ':ContactID'   => array('value'=>$ContactID, 'type'=>PDO::PARAM_INT),
      ':AddressID'   => array('value'=>$AddressID, 'type'=>PDO::PARAM_INT),
      ':nom'   => array('value'=>$nom, 'type'=>PDO::PARAM_STR),
      ':prenom'   => array('value'=>$prenom, 'type'=>PDO::PARAM_STR),
      ':adresse'   => array('value'=>$adresse, 'type'=>PDO::PARAM_STR),
      ':ville'   => array('value'=>$ville, 'type'=>PDO::PARAM_STR),
      ':codePostal'   => array('value'=>$codePostal, 'type'=>PDO::PARAM_STR)
    );
    return $this->update($sql,$p);
  }
  
}
?>