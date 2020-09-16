<?php
class Admin extends Controller{
  function __construct(){
    $this->catModel = $this->model("CategoryModel");
  }
  function index(){
    $data['cats'] = $this->catModel->showAllCategory();
    if(getSession()->userrole == 1){
   $this->view("admin/index",$data);
    }else{
      redirect(URLROOT);
    }
  }
  //Admin Dashboard Will Show All About This Site
  function adashboard(){
    $data = [
      'cats'=>''
      ];
    $data['cats'] = $this->catModel->showAllCategory();
    $this->view("admin/adashboard",$data);
  }
  // Category Control
  function acategory(){
    if(getSession()->userrole == 1){
          $this->view("admin/acategory");
    }else {
      redirect(URLROOT);
    }
  }
} 

?>