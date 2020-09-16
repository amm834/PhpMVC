<?php
class PostModel {
  private $db;
  function __construct() {
    $this->db = new Database;
  }
  //show all Posts
  function showAllPost($count) {
    if(empty($count)){
      $id = 0;
    }else {
          $id = $count;

    }
    $this->db->query("SELECT * FROM post ORDER BY id DESC LIMIT $id,10");
    return $this->db->multiSet();
  }
  //Count
  function showPostCount() {
    $this->db->query("SELECT * FROM post ORDER BY id DESC");
    return $this->db->multiSet();
  }

  // Get All Posts According To The Category
  function showPostByCatId($id) {
    $this->db->query("SELECT * FROM post WHERE catid=:id ORDER BY id DESC");
    $this->db->bindParam(":id", $id);
    return $this->db->multiSet();
  }

  // Post By Post Id
  function showPostByPostId($id) {
    $this->db->query("SELECT * FROM post WHERE id=:id");
    $this->db->bindParam(":id", $id);
    return $this->db->singleSet();
  }

  //Insert post
  function createPost($catid, $title, $imgpath, $sometext, $content) {
    $this->db->query("INSERT INTO post (catid,title,imgpath,sometext,content) VALUES (:catid,:title,:imgpath,:sometext,:content)");
    $this->db->bindParam(":catid", $catid);
    $this->db->bindParam(":title", $title);
    $this->db->bindParam(":imgpath", $imgpath);
    $this->db->bindParam(":sometext", $sometext);
    $this->db->bindParam(":content", $content);
    return $this->db->execute();
  }

  //Edit Post (Edit Page)
  function editPostByPostId($id, $catid, $title, $imgpath, $sometext, $content) {
    $this->db->query("UPDATE post SET catid=:catid,title=:title,imgpath=:imgpath,sometext=:sometext,content=:content WHERE id=:id");
    $this->db->bindParam(":id", $id);
    $this->db->bindParam(":catid", $catid);
    $this->db->bindParam(":title", $title);
    $this->db->bindParam(":imgpath", $imgpath);
    $this->db->bindParam(":sometext", $sometext);
    $this->db->bindParam(":content", $content);
    return $this->db->execute();
  }
  function deletePost($id) {
    $this->db->query("DELETE FROM post WHERE id=:id");
    $this->db->bindParam(":id", $id);
    return$this->db->execute();
  }

}


?>