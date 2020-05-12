<?php
require_once CLASSES.DS.'modelpdo.php';
class EmployeeModel extends ModelPDO{
  public function construct(){}
  public function listAll(){
    $sql='select E.EmployeeID, C.ContactID, E.NationalIDNumber,E.Title as ETitle, C.Title as CTitle, C.FirstName, C.MiddleName, C.LastName, C.EmailAddress, E.HireDate
    from employee as E
    inner join contact as C on E.ContactID=C.ContactID
    where E.CurrentFlag<>0';
    return $this->select($sql);
  }
  // public function listOne($id){
  //   $sql='select E.*, C.*,E.Title as ETitle, C.Title as CTitle, EM.Title as EMTitle, CM.Title as CMTitle, CM.FirstName as CMFirstName, CM.MiddleName as CMMiddleName, CM.LastName as CMLastName
  //   from employee as E
  //   inner join contact as C on E.ContactID=C.ContactID
  //   left join employee as EM on E.ManagerID=EM.EmployeeID
  //   left join contact as CM on EM.ContactID=CM.ContactID
  //   where E.CurrentFlag<>0
  //   and E.EmployeeID=:id';
  
  //   $p=array(
  //     ':id'   => array('value'=>$id, 'type'=>PDO::PARAM_INT)
  //   );
  //   return current($this->select($sql,$p));
  // }
  public function listOne($id){
    $sql='select E.EmployeeID, C.ContactID, E.NationalIDNumber,E.Title as ETitle, C.Title as CTitle, C.FirstName, C.MiddleName, C.LastName, C.EmailAddress, E.HireDate
    from employee as E
    inner join contact as C on E.ContactID=C.ContactID
    where E.CurrentFlag<>0
    and E.EmployeeID=:id';
  
    $p=array(
      ':id'   => array('value'=>$id, 'type'=>PDO::PARAM_INT)
    );
    return current($this->select($sql,$p));
  }
  public function listAllFromDepartment($id){
    $sql='select E.EmployeeID, C.ContactID, E.NationalIDNumber,E.Title as ETitle, C.Title as CTitle, C.FirstName, C.MiddleName, C.LastName, C.EmailAddress, E.HireDate
    from employee as E
    inner join contact as C on E.ContactID=C.ContactID
    inner join employeedepartmenthistory as EDH on E.EmployeeID=EDH.EmployeeID
      and EDH.DepartmentID=:id
    where E.CurrentFlag<>0';
    $p=array(
      ':id'   => array('value'=>$id, 'type'=>PDO::PARAM_INT)
    );
    return $this->select($sql,$p);
  }
  public function listManagers(){
    $sql='select E.EmployeeID, C.ContactID, E.NationalIDNumber,E.Title as ETitle, C.Title as CTitle, C.FirstName, C.MiddleName, C.LastName, C.EmailAddress, E.HireDate
    from employee as E
    inner join contact as C on E.ContactID=C.ContactID
    where E.CurrentFlag<>0
    and E.EmployeeID in (select distinct M.ManagerID from employee as M where not isnull(M.ManagerID))';
    return $this->select($sql);
  }
  public function listWithAManager($id){
    $sql='select E.EmployeeID, C.ContactID, E.NationalIDNumber,E.Title as ETitle, C.Title as CTitle, C.FirstName, C.MiddleName, C.LastName, C.EmailAddress, E.HireDate
    from employee as E
    inner join contact as C on E.ContactID=C.ContactID
    where E.CurrentFlag<>0
    and E.ManagerId=:id';
    $p=array(
      ':id'   => array('value'=>$id, 'type'=>PDO::PARAM_INT)
    );
    return $this->select($sql,$p);
  }
  public function remove($id){
    $sql='UPDATE employee AS E SET E.CurrentFlag=0 WHERE E.EmployeeID=:id';
    return $this->delete($sql);
  }
}
?>