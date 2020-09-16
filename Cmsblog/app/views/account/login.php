<?php
require_once APPROOT.'/views/ini/css.php';
?>
<?php
require_once APPROOT.'/views/ini/navbar.php';
?>
<div class="container-fluid">
  <div class="container col-md-8 p-2 shadow-inset rounded">
    <div class="shadow-soft rounded p-2">
      <h6 class="text-center my-3 display-4">Login Your Account</h6>
      <!-- If Register Is Success  -->
      <?php 
      flash("registerSuccess");
      ?>
    <!-- Login Form -->

    <form action="<?php  echo URLROOT.'user/login'; ?>" class="p-2" method="post">
          <!-- Username -->
      <div class="form-group">

      <!-- Email  -->
      <div class="form-group">
        <label for="validationServer02">Email</label>
        <input type="email" class="form-control
        <?php
        echo !empty($data['email_err']) ? 'is-invalid' : 'is-valid';
        ?>
        " id="validationServer02" required name="email">
        <div class="<?php
          echo !empty($data['email_err']) ? 'invalid-feedback' : 'valid-feedback';
          ?>
          ">
          <?php
          echo !empty($data['email_err']) ? $data['email_err'] : 'Look Good';
          ?>
        </div>
      </div>

      <!-- Password -->
      <div class="form-group">
        <label for="validationServer03">Password</label>
        <input type="password" class="form-control
        <?php
        echo !empty($data['password_err']) ? 'is-invalid' : 'is-valid';
        ?>
        " id="validationServer03" required name="password">
        <div class="<?php
          echo !empty($data['password_err']) ? 'invalid-feedback' : 'valid-feedback';
          ?>
          ">
          <?php
          echo !empty($data['password_err']) ? $data['password_err'] : 'Look Good';
          ?>

        </div>
      </div>

      <!-- Login Button -->
      <button class="btn btn-success btn-block">
        Login
      </button>
      <p class="text-center my-3">
        Not Registered?<br> <a href="<?php echo URLROOT.'user/register';  ?>" class="text-success"><u>Register Your Account</u></a>
      </p>
    </form>
  </div>
</div>
</div>
</div>



<?php
require_once APPROOT.'/views/ini/footer.php';
require_once APPROOT.'/views/ini/js.php';
?>