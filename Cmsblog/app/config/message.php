<?php
session_start();
function flash($name = "", $message = "") {
  if (!empty($name)) {
    if (!empty($message)) {
      if (isset($_SESSION[$name])) {
        unset($_SESSION[$name]);
      }
      $_SESSION[$name] = $message;
    } else {
      if (isset($_SESSION[$name])) {
     echo '<div class="alert alert-success alert-dismissible shadow-soft fade show" role="alert">
    <span class="alert-inner--icon"><span class="far fa-thumbs-up"></span></span>
    <span class="alert-inner--text"><strong>Well done!</strong>'.$_SESSION[$name].'</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>';
       
       
        unset($_SESSION[$name]);
      }
    }
  }
}
function setSession($data){
    $_SESSION['user'] = $data;
}
function getSession(){
  if(isset($_SESSION['user'])){
    return $_SESSION['user'];
  }else{
    return false;
  }
}
function unsetUser(){
  unset($_SESSION['user']);
}


?>