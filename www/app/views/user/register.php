<?php
require_once APPROOT."/views/ini/header.php";
require_once APPROOT."/views/ini/nav.php";
?>

<div class="container my-5">
  <div class="card p-5">
    <form action="<?php echo URLROOT.'user/register' ; ?>" method="post">
      <p>
        Username
      </p>
      <div>
        <input type="text" name="username" class="<?php echo !empty($data['username_err']) ? 'is_invalid' : '';
        ?>">
        <span class="text-danger">
          <? echo $data['username_err'];
          ?>
        </span>

      </div>
      <p>
        Email
      </p>
      <div>
        <input type="email" name="email" class="<?php echo !empty($data['email_err']) ? 'is_invalid' : '';
        ?>">
         <span class="text-danger">
          <? echo $data['email_err']; ?>
          </span>
        
      </div>
      <p>
        Password
      </p>
      <div>
        <input type="password" name="password" class="<?php echo !empty($data['password_err']) ? 'is_invalid' : '';
        ?>">
        <span class="text-danger">
          <? echo $data['password_err'];
          ?>
        </span>
      </div>
      <p>
        Comfirm Password
      </p>
      <div>
        <input type="password" name="comfirm_password" class="<?php echo !empty($data['comfirm_password_err']) ? 'is_invalid' : '';
        ?>">
        <span class="text-danger">
          <? echo $data['comfirm_password_err'];
          ?>
        </span>
      </div>
      <input type="submit" name="register" class="btn btn-primary btn-block mt-3" value="Register">
      <input type="submit" name="cancel" class="btn btn-danger btn-block mt-3" value="Cancel">
    </form>
    <a href="<? echo URLROOT.'user/login'; ?>">Already have account?Login!</a>
  </div>
</div>






<?php
require_once APPROOT."/views/ini/footer.php";
?>