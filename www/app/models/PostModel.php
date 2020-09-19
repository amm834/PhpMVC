<?php
class PostModel{
  function __construct(){
    $this->db =  new Database();
  }
  function getPostByCatId($catid){
    $this->db->query("SELECT * FROM posts WHERE catid=:catid ORDER BY id DESC");
    $this->db->bind(":catid",$catid);
    return $this->db->multipleSet();
  }
  function insertPost($catid,$title,$desc,$img,$content){
    $this->db->query("INSERT INTO posts (catid,title,descript,img,content) VALUES (:catid,:title,:descript,:img,:content)");
    $this->db->bind(':catid',$catid);
    $this->db->bind(':title',$title);
    $this->db->bind(':descript',$desc);
    $this->db->bind(':img',$img);
    $this->db->bind(':content',$content);
    return $this->db->execute();
  }
  
  function showPostById($id){
    $this->db->query("SELECT * FROM posts WHERE id=:id");
    $this->db->bind(':id',$id);
    return $this->db->singleSet();
  }
  
  function delete($id){
    $this->db->query("delete from posts where id=:id");
   $this->db->bind(":id",$id);
   return $this->db->execute();
  }
}

?>