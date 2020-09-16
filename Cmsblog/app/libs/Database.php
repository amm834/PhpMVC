<?php
class Database {
  private $dbh;
  private $stmt;
  private $hostName = HOST_NAME;
  private $userName = USERNAME;
  private $userPass = USERPASS;
  private $dbName = DB_NAME;
  function __construct() {
    try {
      $this->dbh = new PDO("mysql:host=".$this->hostName.";dbname=".$this->dbName, $this->userName, $this->userPass);
      // Catch Db Error
      $this->dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(Exception $e) {
      echo $e->getMessage();
    }
  }
  // Insert Query and Prepare with statement
  function query($qry) {
    $this->stmt = $this->dbh->prepare($qry);
  }
  // Check Type And Bind It
  function bindParam($param="", $value="",$type="") {
    if(empty($ty)){
          switch ($value) {
      case is_int($value):
        $type = PDO::PARAM_INT;
        break;
      case is_bool($value):
        $type = PDO::PARAM_BOOL;
        break;
      case is_null($value):
        $type = PDO::PARAM_NULL;
        break;
      default:
        $type =  PDO::PARAM_STR;
    }
    }
    $this->stmt->bindValue($param,$value,$type);
  }
  function execute(){
    return $this->stmt->execute();
  }
  function singleSet(){
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
  }
  function multiSet(){
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }
}



?>