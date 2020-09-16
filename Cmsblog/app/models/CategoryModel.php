<?php
class CategoryModel {
  private $db;
  function __construct() {
    $this->db = new Database();
  }
  // Create A New Category (Data Insert)
  function createCategory($name) {
    $this->db->query("INSERT INTO category (catname) VALUES (:name)");
    $this->db->bindParam(":name", $name);
    return $this->db->execute();
  }
  //Show All category
  function showAllCategory() {
    $this->db->query("SELECT * FROM category");
    return $this->db->multiSet();
  }
  function editDataByCatId() {
    $this->db->query("");
  }
  //Get Cat By Id
  function getCatById($id) {
    $this->db->query("SELECT * FROM category WHERE id=:id");
    $this->db->bindParam(":id", $id);
    return $this->db->singleSet();
  }

  function renameCat($name,$id){
  $this->db->query("UPDATE category SET catname=:name WHERE id=:id");
  $this->db->bindParam(":id",$id);
  $this->db->bindParam(":name",$name);
  return $this->db->execute();
  }
  
  function delete($id){
    $this->db->query("DELETE FROM category WHERE id=:id");
      $this->db->bindParam(":id",$id);
      return $this->db->execute();
  }
  
  
}


?>