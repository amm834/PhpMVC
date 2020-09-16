<?php
class Home extends Controller {
  function __construct() {
    $this->postModel = $this->model("PostModel");
    $this->catModel = $this->model("CategoryModel");
  }

//Show All Post
  function index($params = []) {
    $data = [
      'posts'=>'',
      'cats'=>'',
      'postcount'=>''
      ];
      $data['postcount'] = $this->postModel->showPostCount();
      $data['posts'] = $this->postModel->showAllPost($params[0]);
      $data['cats'] = $this->catModel->showAllCategory();
    $this->view('public/home',$data);
  }
  //Show post by cat id
  function showPostByCat($params = []){
    $data = [
      'catPosts'=>'',
      'cats'=>'',
      'catid'=>''
      ];
      $data['catid'] =$this->catModel->getCatById($params[0]);
      $data['catPosts'] = $this->postModel->showPostByCatId($params[0]);
            $data['cats'] = $this->catModel->showAllCategory();

    $this->view("posts/postByCatid",$data);
  }
}

?>