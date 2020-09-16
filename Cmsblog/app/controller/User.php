<?php
class User extends Controller {
  function __construct() {
    $this->userModel = $this->model("UserModel");
    $this->catModel = $this->model("CategoryModel");
  }
  function index() {
    redirect(URLROOT);
  }
  // Register Account
  
  function register() {
    #Data For Views
    $data = [
      'username' => '',
      'email' => '',
      'password' => '',
      'comfirm_password' => '',
      'username_err' => '',
      'email_err' => '',
      'password_err' => '',
      'comfirm_password_err' => '',
      'cats'=>''
    ];
    $data['cats'] = $this->catModel->showAllCategory();
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      #Get Input Data
      $data['username'] = $_POST['username'];
      $data['email'] = $_POST['email'];
      $data['password'] = $_POST['password'];
      $data['comfirm_password'] = $_POST['comfirm_password'];
    // Reassign Var Name To Make Easy
    $username =  $data['username'];
    $email = $data['email'];
    $password = $data['password'];
    $comfirm_password = $data['comfirm_password'];
// Catch Error
if(!regexUsername($username)){
  $data['username_err'] = "Username Shouldn't Have Invalid Words!";
}
if(!regexEmail($email)){
  $data['email_err'] = "Email Should Have @ Keyword and Valid Email Address!";
}

#Check Email Is Exist Or Not
$checkEmail = $this->userModel->checkUserEmail($email);
if(!empty($checkEmail)){
  $data['email_err'] = "Email Is Already Exists!";
}

if(!regexPassword($password)){
  $data['password_err'] = "Password Should Have Capital Letter,Small Letter,Numbers And At least One Special Character!";
}
if($password != $comfirm_password){
  $data['comfirm_password_err'] = "Comfirm Password Must Be Same As Above Password!";
}

// If Not Have Error Register It (Sign Up It)
if(empty($data['username_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['comfirm_password_err'])){
$password = password_hash($password,PASSWORD_BCRYPT);
  $registerUser = $this->userModel->createUser($username,$email,$password);    
  if($registerUser){
    flash("registerSuccess","You Have Been Registered Successful");
    redirect(URLROOT.'user/login');
  }
}

    #View Register Page
      $this->view("account/register", $data);
      
    } else {
      $this->view("account/register", $data);
    }

  }
  // Login User Account An Check User Role (Admin?Member?)
  function login(){
      #Data For Views
    $data = [
      'email' => '',
      'password' => '',
      'email_err' => '',
      'password_err' => '',
      'cats'=>''
    ];
    $data['cats'] = $this->catModel->showAllCategory();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    #Get Input Data
    $data['email'] = $_POST['email'];
    $data['password'] = $_POST['password'];
    
    #Reassign Variable
    $email = $data['email'];
    $password = $data['password'];

    #Get Data From Login
    $loginUser = $this->userModel->checkLoginEmail($email);
    #Check User Exist Or Not
    if(!empty($loginUser)){
    $hashPass = $loginUser->password;
    $checkUser = password_verify($password,$hashPass);
    if($checkUser){
      #Check Admin?User? 
      $userRole = $loginUser->userrole;
      if($userRole == 1){
      //Go To Admin Index(Home)
      setSession($loginUser);
      flash("loginAdmin","Welcome Back Sir \"$loginUser->username\"");
      redirect(URLROOT.'admin/index');
      }else{
      //Go To User Page (User Home)
      setSession($loginUser);
    flash("loginUser","Welcome Back Sir \"$loginUser->username\"");
        redirect(URLROOT.'0');
      }
      
    }else{
      $data['password_err'] = 'Wrong Password!';
    }
    }else{
      #If Not Registered
      $data['email_err'] = 'Your Email Is Not Registered Yet!';
      $data['password_err'] = "Worong Password";
    }

     #Login View
    $this->view("account/login",$data);
    }else{
      
      #Login View
       $this->view("account/login",$data);
    }
  }
  //Logout User
  function logout(){
    unsetUser();
    redirect(URLROOT.'0');
  }
  //About Me
  function about(){
    $this->view("about-me/@amm");
  }
}

?>