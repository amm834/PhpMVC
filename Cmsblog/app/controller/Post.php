<?php
class Post extends Controller {
  function __construct() {
    $this->postModel = $this->model("PostModel");
    $this->catModel = $this->model("CategoryModel");
    $this->commentModel = $this->model("CommentModel");
  }

  function index() {
    redirect(URLROOT);
 }

  // Post Dashborad (Show all post details)
  function show($params = []) {
    if(getSession()->userrole != 1){
      redirect(URLROOT);
    }
    $data = [
      'cats' => '',
      'postByCatId' => ''
    ];
    $catId = $params[0];
    $data['cats'] = $this->catModel->showAllCategory();
    $data['postByCatId'] = $this->postModel->showPostByCatId($catId);

    // View To Post Page
    $this->view("posts/home", $data);
  }
  //Detail About Post
  function detail($params = []) {
    $data = [
      'postById' => '',
      'cats'=> $this->catModel->showAllCategory(),
      'cmts'=>''
    ];
      $id = $params[0];
      if($id == 0){
        redirect(URLROOT);
      }
    $data['cmts'] = $this->commentModel->showCmtByPostId($id);
    $data['postById'] = $this->postModel->showPostByPostId($id);
    $this->view("posts/detail", $data);
  }
  
  //Create (insert) posts
  function create() {
    $data = [
      'catid' => '',
      'title' => '',
      'imgpath' => '',
      'sometext' => '',
      'content' => '',
      'cats' => '',
      'title_err' => '',
      'sometext_err' => '',
      'content_err' => ''
    ];
    $data['cats'] = $this->catModel->showAllCategory();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data['catid'] = $_POST['categoryType'];
      $data['title'] = $_POST['title'];
      $data['sometext'] = $_POST['sometext'];
      $data['content'] = $_POST['content'];
      $file = $_FILES['file'];
      // Check File Exist Or Not
      if (!empty($file['name'])) {
        move_uploaded_file($file['tmp_name'], 'uploads/'.'AMMWEBDEV_'.$file['name']);
        $data['imgpath'] = 'AMMWEBDEV_'.$file['name'];
      }
      // Reassign Varaibel
      $catid = $data['catid'];
      $title = $data['title'];
      $imgpath = $data['imgpath'];
      $sometext = $data['sometext'];
      $content = $data['content'];
      //Title Error
      if (empty($title)) {
        $data['title_err'] = 'Title Should Not Empty!';
      }
      //Description Error
      if (empty($sometext)) {
        $data['sometext_err'] = 'Description Should Not Empty!';
      }
      $createPost = $this->postModel->createPost($catid, $title, $imgpath, $sometext, $content);
      if (count($createPost) > 0) {
        flash("createPost", "You Have Been Posted!");
        redirect(URLROOT."post/show");
      }
      //Show Post Create Page If post Method
      $this->view("posts/create", $data);
    } else {
      //Show Post Create Page If Get Method
      $this->view("posts/create", $data);
    }
  }
  //Edit post
  function edit($params = []) {
    $data = [
      'cats' => '',
      'posts' => '',
      'title' => '',
      'catid' => '',
      'sometext' => '',
      'content' => '',
      'imgpath' => ''
    ];
    $data['sometext'] = $_POST['sometext'];
    $data['cats'] = $this->catModel->showAllCategory();
    $data['posts'] = $this->postModel->showPostByPostId($params[0]);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data['catid'] = $_POST['categoryType'];
      $data['title'] = $_POST['title'];
      $data['content'] = $_POST['content'];
      $file = $_FILES['file'];
      //Check File
      if (!empty($file['name'])) {
        $data['imgpath'] = $file['name'];
        $random = rand()*time();
        move_uploaded_file($file['tmp_name'], 'uploads/'.$file['name']);
      } else {
        $fileExist = $data['posts']->imgpath;
        $data['imgpath'] = $fileExist;
      }
      $editData = $this->postModel->editPostByPostId($params[0],$data['catid'],$data['title'],$data['imgpath'],$data['sometext'],$data['content']);
      if($editData){
        redirect(URLROOT."post/show");
      }
      //If Post Method
      $this->view("posts/edit", $data);
    } else {
      //If Get Method
      $this->view("posts/edit", $data);

    }
  }
  //Delete postsfunction
  function deletepost($params = []){
  echo $params[0];
  $id = $params[0];
 $deletePost =  $this->postModel->deletePost($id);
 if(deletePost){
   redirect(URLROOT.'post/show/1');
 }
}

}

?>