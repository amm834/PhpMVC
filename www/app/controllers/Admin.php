<?php
class Admin extends Controller{
  
  function index(){
    if(getUserSession()){
    $this->view("admin/index");
    }else {
      redirect(URLROOT);
    }
  }
}


?>