<?php
require_once APPROOT."/views/ini/header.php";
require_once APPROOT."/views/ini/nav.php";
?>

<div class="container my-5">
    <?php
    flash('register_success');
    echo flash("login_failed");
    ?>
  
  <div class="card p-5">
    <form action="<? echo URLROOT."user/login"; ?>" method="post">
      <p>
        Email
      </p>
      <div>
        <input type="email" name="email" class="<?php echo !empty($data['email_err']) ? 'is_invalid' : '';
        ?>">
        <p><?php echo !empty($data['email_err']) ? $data['email_err']: ''; ?></p>
      </div>
      <p>
        Password
      </p>
      <div>
        <input type="password" name="password" class="<?php echo !empty($data['password_err']) ? 'is_invalid' : '';
        ?>">
        <span>
          <? echo $data['password_err'];
          ?>
        </span>
      </div>
      <input type="submit" name="login" class="btn btn-success btn-block mt-3" value="Login">
      <input type="submit" name="cancel" class="btn btn-danger btn-block mt-3" value="Cancel">
    </form>
    <a href="<? echo URLROOT.'user/register'; ?>">Not register yet?Login!</a>
  </div>
</div>






<?php
require_once APPROOT."/views/ini/footer.php";
?>