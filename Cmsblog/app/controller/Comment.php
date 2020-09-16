<?php
class Comment extends Controller {
  function __construct() {
    $this->commentModel = $this->model("CommentModel");
  }
  function create($params = []) {
    $postid = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $cmt = $_POST['cmt'];
      $postid = $_POST['postid'];
      $username = getSession()->username;
      //Insert
      if (!empty($cmt)) {
              $cmt = htmlspecialchars($cmt);
        if (htmlspecialchars($cmt)){
          flash("cmtSuccess", "You Have Been Commented!");
          $this->commentModel->create($postid, $username, $cmt);
        }


      }
      redirect(URLROOT."post/detail/$postid");

    } else {
      redirect(URLROOT."post/detail/$postid");

    }
  }

}


?>