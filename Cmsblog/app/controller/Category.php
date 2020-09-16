<?php
class Category extends Controller {
  // Check User
  function __construct() {
    if (getSession()->userrole != 1) {
      redirect(URLROOT);
    }
    function index(){
      
    }
    $this->catModel = $this->model("CategoryModel");
  }

  // Create A New Category
  function create() {
    $data = [
      'catName' => '',
      'cat_err' => ''
    ];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      //Get Cat Data
      $data['catName'] = $_POST['catName'];
      //Reassign Variable Name
      $catName = $data['catName'];
      if (empty($catName)) {
        $data['cat_err'] = 'Category Name Must Not Empty!';
      }
      $createCat = $this->catModel->createCategory($catName);
      if ($createCat) {
        $data['catName'] = $catName;
        redirect(URLROOT."category/showcat");
      } else {
        $data['cat_err'] = 'Failed To Create!';
      }
      //show category page if post method
      $this->view("admin/acategory", $data);
    } else {
      // show category page if get method
      $this->view("admin/acategory", $data);
    }
  }

  //Show Category
  function showcat() {
    $data = [
      'cats' => ''
    ];
    $data['cats'] = $this->catModel->showAllCategory();
    //If get Method
    $this->view("admin/detailcat", $data);
  }

  // Edit Cat
  function edit($params = []) {
    $data = [
      'catid' => '',
      'cat_err'=>''
    ];
    $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
    if (!empty($_POST['catName'])) {
    $updateCat =  $this->catModel->renameCat($_POST['catName'], $params[0]);
    if($updateCat){
      redirect(URLROOT."category/showcat");
    }
    }
    $data['catid'] = $this->catModel->getCatById($params[0]);
    $this->view("admin/editcat", $data);
  }
  function delete($params = []){
  $delete =  $this->catModel->delete($params[0]);
  if($delete){
          redirect(URLROOT."category/showcat");
  }
  }
}


?>