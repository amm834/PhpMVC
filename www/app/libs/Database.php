<?php
class Database {
  private $host = DB_HOST;
  private $dbname = DB_NAME;
  private $dbuser = DB_USER;
  private $dbpass = DB_PASS;
  private $stmt;
  private $dbh;
  function __construct() {
    $dbc = "mysql:host=".$this->host.";dbname=".$this->dbname;
    $options = [
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];
    try {
      $this->dbh = new PDO($dbc, $this->dbuser, $this->dbpass, $options);
    }catch(PDOException $e) {
      exit($e->getMessage());
    }
  }
  public function query($qry) {
    $this->stmt = $this->dbh->prepare($qry);
  }
  public function bind($param, $value, $type = '') {
    if (empty($type)) {
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
          $type = PDO::PARAM_STR;
          break;
      }
    }
    $this->stmt->bindValue($param, $value, $type);
  }
  function execute() {
    return $this->stmt->execute();
  }
  
  function multipleSet() {
    $this->stmt->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }
  function singleSet() {
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
  }
  function rowCount() {
    return $this->stmt->rowCount();
  }
  function lastInsertId() {
    return $this->dbh->lastInsertId();
  }
}


?>