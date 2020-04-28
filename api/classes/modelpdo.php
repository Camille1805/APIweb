<?php
abstract class ModelPDO {
  private static $instanceDB=null;
  private $id=null;
  private $err=null;

  public function __construct(){}

  private static function getDBInstance(){
    if(is_null(self::$instanceDB)){
      try {
        self::$instanceDB = new PDO(DB_DSN, DB_USERNAME, DB_USERPWD);
        self::$instanceDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
      } catch (PDOException $e){
        die('*** FATAL *** ERROR ** Impossible de se connecter à la base de donnée (PDO). ' . $e->getMessage() );
      }
    }
    return self::$instanceDB;
  }
  protected function select($sql,$params=null,$ftechmethod=PDO::FETCH_OBJ){
    try {
      $stmt=self::getDBInstance()->prepare($sql);
      if (!is_null($params)){
        foreach ($params as $key => $param){
          $stmt->bindParam($key, $param['value'], $param['type']);
        }
      }
      $stmt->execute();
      return $stmt->fetchAll($ftechmethod);
    }catch (PDOException $e){
      die('*** ERROR ** Ereur lors d\'un select ' . $e->getMessage() );
    }
  }
  protected function insert($sql,$params){
    try {
      $stmt=self::getDBInstance()->prepare($sql);
      foreach ($params as $key => $param){
        $stmt->bindParam($key, $param['value'], $param['type']);
      }
      $res=$stmt->execute();
      if ($res){
        $this->id = self::getDBInstance()->lastInsertId();
        $this->err=null;
      }else{
        $this->id=null;
        $this->err=$stmt->errorinfo();
      }
      return $res;
    }catch (PDOException $e){
      die('*** ERROR ** Ereur lors d\'un select ' . $e->getMessage() );
    }
  }
  protected function update($sql,$params){
    try {
      $stmt=self::getDBInstance()->prepare($sql);
      foreach ($params as $key => $param){
        $stmt->bindParam($key, $param['value'], $param['type']);
      }
      $res=$stmt->execute();
      return $res;
    }catch (PDOException $e){
      die('*** ERROR ** Ereur lors d\'un update ' . $e->getMessage() );
    }
  }
  protected function delete($sql,$params){
    try {
      $stmt=self::getDBInstance()->prepare($sql);
      foreach ($params as $key => $param){
        $stmt->bindParam($key, $param['value'], $param['type']);
      }
      $res=$stmt->execute();
      return $res;
    }catch (PDOException $e){
      die('*** ERROR ** Ereur lors d\'un delete ' . $e->getMessage() );
    }
  }
  public function getLastId(){
    return $this->id;
  }
  public function getLastError(){
    return $this->err;
  }
}
