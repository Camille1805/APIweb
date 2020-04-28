<?php
/*
 	1 	VendorID  Primary 	int(11)
	2 	AccountNumber 	varchar(15) 	utf8_general_ci
	3 	Name 	varchar(50) 	utf8_general_ci
	4 	CreditRating 	tinyint(4)
	5 	PreferredVendorStatus 	bit(1)
	6 	ActiveFlag 	bit(1)
	7 	PurchasingWebServiceURL 	mediumtext 	utf8_general_ci
	8 	ModifiedDate 	timestamp
*/

class VendorModel {
  public function construct(){}
  public function listAll(){
    $sql='SELECT * FROM vendor AS V WHERE V.ActiveFlag <>0';
    try {
      $dbh = new PDO('mysql:host=localhost;dbname=adwfull;charset=utf8', 'root', '');
      $stmt=$dbh->prepare($sql);
      //$stmt->bindParam(":var",$var);
      $res=($stmt->execute())?$stmt->fetchAll(PDO::FETCH_OBJ): null;
      $dbh = null;
      return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
  }
  public function listOne($id){
    $sql='SELECT V.* FROM vendor AS V WHERE V.VendorID=:id';
    try {
      $dbh = new PDO('mysql:host=localhost;dbname=adwfull;charset=utf8', 'root', '');
      $stmt=$dbh->prepare($sql);
      $stmt->bindParam(":id",$id);
      $res=($stmt->execute())?$stmt->fetchAll(PDO::FETCH_OBJ): null;
      $dbh = null;
      return current($res);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
  }
  public function delete($id){
    $sql='UPDATE vendor AS V SET V.ActiveFlag=0 WHERE V.VendorID =:id';
    try {
      $dbh = new PDO('mysql:host=localhost;dbname=adwfull;charset=utf8', 'root', '');
      $stmt=$dbh->prepare($sql);
      $stmt->bindParam(":id",$id);
      $res=($stmt->execute())?true: false;
      $dbh = null;
      return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
  }
}
?>
