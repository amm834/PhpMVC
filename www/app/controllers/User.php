<?php
class User extends Controller {
  function __construct() {
    $this->userModel = $this->model("UserModel");
  }
  function register() {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        "username" => $_POST['username'],
        "email" => $_POST['email'],
        "password" => $_POST['password'],
        "comfirm_password" => $_POST['comfirm_password'],
        "username_err" => "",
        "password_err" => "",
        "email_err" => "",
        "comfirm_password_err" => ""
      ];
      if (empty($data['username'])) {
        $data['username_err'] = "Username must not be empty";
      }
      if (empty($data['email'])) {
        $data['email_err'] = "Email Must not empty";
      } else {
        $emailCond = $this->userModel->getCheckEmail($data['email']);
        if ($emailCond) {
          $data['email_err'] = "Email is already taken!";
        }
      }
      if (empty($data['password'])) {
        $data['password_err'] = "Password Must Not br Empty";
      }
      if (empty($data['comfirm_password'])) {
        $data['comfirm_password_err'] = "Comfirm Password must not br empty";
      } else if ($data['comfirm_password'] != $data['password']) {
        $data['comfirm_password_err'] = "Password Doesnot Match";
      }
      if (empty($data['username_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['comfirm_password_err'])) {
        $this->userModel->register($data["username"], $data["email"], $data["password"]);
        flash("register_success", "Your register is success,plz login!");

        $this->view("user/login");
      } else {
        $this->view("user/register", $data);
      }
    } else {
      /* If not post method */
      $this->view("user/register");
    }

  }
  /*  Login */
  function login() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $data = [
        "email" => $_POST["email"],
        "password" => $_POST["password"],
        "email_err" => "",
        "password_err" => ""
      ];
  if (empty($data['email'])) {
        $data['email_err'] = "Email Must not empty";
      }
  if(empty($data['password'])){
    $data['password_err'] = "password_err";
  }
  $rowUser = $this->userModel->getCheckEmail($data['email']);
  if($rowUser){
    $hash_pass = password_verify($data['password'],$rowUser->password);
    if($hash_pass){
      setUserSession($rowUser);
      redirect(URLROOT."admin/index");
    }else{
      flash("login_failed","Login Failed");
      $this->view("user/login");
    }
  }else{
    flash("login_failed","Login Failed");
      $this->view("user/login");
  }
      

    } else {
      $this->view("user/login", $data);
    }
  }
function logout(){
  unsetUser();
  $this->view("home/index");
}
 
}


?>