<?php
require_once CLASSES.DS.'modelpdo.php';
class DepartmentModel extends ModelPDO {
  public function construct(){}
  public function listAll(){
    $sql='SELECT * FROM department';
    return $this->select($sql);
  }
  public function listOne($id){
    $sql='select D.* from department as D where D.DepartmentID=:id';
    $p=array(
      ':id'   => array('value'=>$id, 'type'=>PDO::PARAM_INT)
    );
    return(current($this->select($sql,$p)));
  }

}
?>