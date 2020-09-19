<?php
class Controller{
  function view($view,$data = []){
    if("../app/views/".$view.".php"){
      require_once "../app/views/".$view.".php";
    }
  }
  function model($model){
    if(file_exists("../app/models/".$model.".php")){
      require_once "../app/models/".$model.".php";
      return new $model;
    }
  }
}
?>