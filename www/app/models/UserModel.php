<?php
class UserModel{
  private $db;
  function __construct(){
    $this->db = new Database();
  }
  function getAllUser(){
    $this->db->query("SELECT * FROM users");
   return $this->db->multipleSet();
  }
  function register($username,$email,$password){
  $password = password_hash($password,PASSWORD_BCRYPT);
  $this->db->query("INSERT INTO users (name,email,password) VALUES (:username,:email,:password)");
  $this->db->bind(":username",$username);
  $this->db->bind(":email",$email);
  $this->db->bind(":password",$password);
  return $this->db->execute();
  }
  function getCheckEmail($email){
    $this->db->query("SELECT * FROM users WHERE email=:email");
    $this->db->bind(":email",$email);
    $row = $this->db->singleSet();
    if($row){
      return $row;
    }else {
      return $row;
    }
  }


 
 
 
 

}
?>