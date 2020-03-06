<?php
class DepartmentModel {
    public function construct(){}
    public function listAll(){
      $sql='SELECT * FROM department';
      try {
        $dbh = new PDO('mysql:host=localhost;dbname=adw;charset=utf8', 'root', '');
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
      $sql='select D.*
      from department as D
      where D.DepartmentID=:id';
      try {
        $dbh = new PDO('mysql:host=localhost;dbname=adw;charset=utf8', 'root', '');
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
}
?>