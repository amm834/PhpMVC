<?php
session_start();
ob_start();
function flash($name = "", $message = "") {
  if (!empty($name)) {
    if (!empty($message)) {
      
      if ($_SESSION[$name]) {
        unset($_SESSION[$name]);
      }
      
      $_SESSION[$name] = $message;
      
    } else {
      if(isset($_SESSION[$name])){
      echo "<div class='alert alert-success alert-dismiss'>".$_SESSION[$name]."</div>";
      unset($_SESSION[$name]);
    }
    }
  }
}
function setUserSession($value){
  $_SESSION["currrentUser"] = $value;
}
function getUserSession(){
  if(isset($_SESSION['currrentUser'])){
 return $_SESSION['currrentUser'];

  }else{
    return false;
  }
}
function unsetUser(){
  unset($_SESSION['currrentUser']);
}


function redirect($page){
  header("Location:".$page);
}
function setCatId($value){
  if(isset($_SESSION['curCat'])){
    unset($_SESSION['curCat']);
  }
  $_SESSION['curCat'] = $value;
}
function getCatId(){
if(isset($_SESSION['curCat'])){
    return$_SESSION['curCat'];
  }
}
function deleteCatId(){
  if(isset($_SESSION['curCat'])){
    unset($_SESSION['curCat']);
  }
}



?>