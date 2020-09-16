<?php
class UserModel{
  private $db;
  function __construct(){
    $this->db = new Database();
  }
  // Create New User (User Registration)
  function createUser($username,$email,$password){
  $this->db->query("INSERT INTO users (username,email,password) VALUES (:username,:email,:password)");
  $this->db->bindParam(":username",$username);
  $this->db->bindParam(":email",$email);
  $this->db->bindParam(":password",$password);
  return $this->db->execute();
  }
  
  //Check User Exist Or Not
  function checkUserEmail($email){
    $this->db->query("SELECT email FROM users WHERE email=:email");
    $this->db->bindParam(":email",$email);
    return $this->db->singleSet();
  }
  
  //Check Login User
  function checkLoginEmail($email){
    $this->db->query("SELECT * FROM users WHERE email=:email");
    $this->db->bindParam(":email",$email);
    return $this->db->singleSet();
  }

}


?>