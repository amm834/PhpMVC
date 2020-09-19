<?php
class CategoryModel {
  private $db;
  function __construct() {
    $this->db = new Database;
  }
  function getAllCatData() {
    $this->db->query("SELECT *  FROM category");
    return  $this->db->multipleSet();
  }

  function insertCat($name) {
    $this->db->query("INSERT INTO category (name) VALUES (:name)");
    $this->db->bind(":name", $name);
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  function getCatNameById($id) {

    $this->db->query("SELECT * FROM category WHERE id=:id");
    $this->db->bind(":id", $id);
    $this->db->execute();
    return $this->db->singleSet();
  }
function renameCatById($name,$id){
  $this->db->query("UPDATE category SET name=:name WHERE id=:id");
  $this->db->bind(":name",$name);
  $this->db->bind(":id",$id);
  $this->db->execute();
}

function deleteCat($id){
$this->db->query("DELETE FROM category WHERE id=:id");
  $this->db->bind(":id",$id);
  $this->db->execute();
}



}


?>