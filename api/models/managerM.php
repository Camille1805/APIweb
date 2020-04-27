<?php
class EmployeeModel {
  public function construct(){}
  public function listall(){
    $sql='select E.EmployeeID, C.ContactID, E.NationalIDNumber,E.Title as ETitle, C.Title as CTitle, C.FirstName, C.MiddleName, C.LastName, C.EmailAddress, E.HireDate
    from employee as E
    inner join contact as C on E.ContactID=C.ContactID
    where E.CurrentFlag<>0
    and E.EmployeeID in (select distinct M.ManagerID from employee as M where not isnull(M.ManagerID))';
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
    $sql='select E.*, C.*,E.Title as ETitle, C.Title as CTitle, EM.Title as EMTitle, CM.Title as CMTitle, CM.FirstName as CMFirstName, CM.MiddleName as CMMiddleName, CM.LastName as CMLastName
    from employee as E
    inner join contact as C on E.ContactID=C.ContactID
    left join employee as EM on E.ManagerID=EM.EmployeeID
    left join contact as CM on EM.ContactID=CM.ContactID
    where E.CurrentFlag<>0
    and E.EmployeeID=:id';
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

  public function listallEmployeeOfAManager($id){
    $sql='select E.EmployeeID, C.ContactID, E.NationalIDNumber,E.Title as ETitle, C.Title as CTitle, C.FirstName, C.MiddleName, C.LastName, C.EmailAddress, E.HireDate
    from employee as E
    inner join contact as C on E.ContactID=C.ContactID
    where E.CurrentFlag<>0
    and E.ManagerId=:id';
    try {
      $dbh = new PDO('mysql:host=localhost;dbname=adw;charset=utf8', 'root', '');
      $stmt=$dbh->prepare($sql);
      $stmt->bindParam(":id",$id);
      $res=($stmt->execute())?$stmt->fetchAll(PDO::FETCH_OBJ): null;
      $dbh = null;
      return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
  }
  public function delete($id){
    $sql='UPDATE employee AS E SET E.CurrentFlag=0 WHERE E.EmployeeID=:id';
    try {
      $dbh = new PDO('mysql:host=localhost;dbname=adw;charset=utf8', 'root', '');
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