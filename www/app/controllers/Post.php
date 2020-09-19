<?php

class Post extends Controller {
  public function __construct() {
    $this->postModel = $this->model("PostModel");
    $this->catModel = $this->model("CategoryModel");
  }
  function home($params = []) {
    $data = [
      "cats" => "",
      "posts" => ""
    ];
    $data['cats'] = $this->catModel->getAllCatData();
    $data['posts'] = $this->postModel->getPostByCatId($params[0]);
    $this->view("admin/post/home", $data);
  }


  function create() {
    $data = [
      "cats" => "",
      "title" => "",
      "desc" => "",
      "content" => ""
    ];
    $data['cats'] = $this->catModel->getAllCatData();
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $data['title'] = $_POST['title'];
      $data['desc'] = $_POST['desc'];
      $data['content'] = $_POST['content'];
      $file = $_FILES['file'];
      if (!empty($file['name'])) {
        move_uploaded_file($file['tmp_name'], 'assets/uploads/'.$file['name']);
        $insert = $this->postModel->insertPost($_POST['catid'], $data['title'], $data['desc'], $file['name'], $data['content']);
        if ($insert) {
          flash("pis", 'Post Insert Success');
          redirect(URLROOT."post/home/1");
        } else {
          $this->view("admin/post/create", $data);

        }

      } else {
        flash("fde","File Does Not Exist");
        redirect(URLROOT."post/create");
      }

    } else {
      $this->view("admin/post/create", $data);
    }
  }
  
  function show($params = []){
    $post = $this->postModel->showPostById($params[0]);
    $this->view('admin/post/show',['posts'=>$post]);
  }
function delete($params = []){
  $id = $params[0];
  $this->postModel->delete($id);
  redirect(URLROOT.'post/home/1');
}
}


?>