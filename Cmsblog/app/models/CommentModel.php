<?php
class CommentModel{
  private $db;
  function __construct(){
    $this->db = new Database();
  }
  function create($postid,$username,$comment){
    $this->db->query("INSERT INTO comments (postid,username,comment) VALUES (:postid,:username,:comment)");
    $this->db->bindParam(":postid",$postid);
    $this->db->bindParam(":username",$username);
    $this->db->bindParam(":comment",$comment);
    return $this->db->execute();
  }
  function showCmtByPostId($id){
    $this->db->query("SELECT * FROM comments WHERE postid=:id");
    $this->db->bindParam(":id",$id);
    return $this->db->multiSet();
    
  }
}

?>