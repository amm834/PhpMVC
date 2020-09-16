<?php
require_once APPROOT.'/views/ini/css.php';
?>
<?php
require_once APPROOT.'/views/ini/navbar.php';
?>

<div class="container-fluid">
  <div class="container col-md-8 p-2 shadow-inset rounded">
    <div class="shadow-soft rounded p-2">
      <h6 class="text-center my-3 display-4">Register Your Account</h6>
      <!-- Register Form -->

      <form action="<?php  echo URLROOT.'user/register'; ?>" class="p-2" method="post">
        <!-- Username -->
        <div class="form-group">
          <label for="validationServer01">Username</label>
          <input type="text" class="form-control
          <?php
          echo !empty($data['username_err']) ? 'is-invalid' : 'is-valid';
          ?>
          " id="validationServer01" required name="username">
          <div class="<?php
            echo !empty($data['username_err']) ? 'invalid-feedback' : 'valid-feedback';
            ?>
            ">
            <?php
            echo !empty($data['username_err']) ? $data['username_err'] : 'Look Good';
            ?>
          </div>
        </div>

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
        <!-- Comfirm password -->
        <div class="form-group">
          <label for="validationServer04">Comfirm Password</label>
          <input type="password" class="form-control
          <?php
          echo !empty($data['comfirm_password_err']) ? 'is-invalid' : 'is-valid';
          ?>
          " id="validationServer04" required name="comfirm_password">
          <div class="<?php
            echo !empty($data['comfirm_password_err']) ? 'invalid-feedback' : 'valid-feedback';
            ?>
            ">
            <?php
            echo !empty($data['comfirm_password_err']) ? $data['comfirm_password_err'] : 'Look Good';
            ?>

          </div>
        </div>
        <!-- Register Button -->
        <button class="btn btn-dark btn-block">
          Register
        </button>
        <p class="text-center my-3">
          Have you ever Registered?<br> <a href="<? echo URLROOT.'user/login'; ?>" class="text-success"><u>Login Your Account</u></a>
        </p>
      </form>
    </div>
  </div>
</div>



<?php
require_once APPROOT.'/views/ini/footer.php';
require_once APPROOT.'/views/ini/js.php';
?>