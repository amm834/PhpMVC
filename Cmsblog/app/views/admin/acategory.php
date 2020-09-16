<?php
require_once APPROOT.'/views/ini/css.php';
?>
<?php
require_once APPROOT.'/views/ini/navbar.php';
?>
<div class="container-fluid">

  <div class="container col-md-8 p-2 shadow-inset rounded">

    <div class="shadow-soft rounded p-2">
      <h6 class="text-center my-3 display-4">Create  New Category</h6>
      <!--If Cat Success -->

      <!-- Category Create Form -->
      <form action="<?php  echo URLROOT.'category/create'; ?>" class="p-2" method="post">
        <!-- category Name-->
        <div class="form-group">

          <div class="form-group">
            <label for="validationServer02">Type Category Name</label>
            <input type="text" class="form-control
            <?php
            echo !empty($data['cat_err']) ? 'is-invalid' : 'is-valid';
            ?>
            " id="validationServer02" required name="catName" autocomplete="off">
            <div class="<?php
              echo !empty($data['cat_err']) ? 'invalid-feedback' : 'valid-feedback';
              ?>
              ">
              <?php
              echo !empty($data['cat_err']) ? $data['cat_err'] : 'Look Good';
              ?>
            </div>
          </div>

          <!-- Category Create Button -->
          <button class="btn btn-success btn-block">
            Create
          </button>
        </form>
        <hr>
        <p class="text-center my-2 d-flex justify-content-between">
          <a href="<?php echo URLROOT.'admin/index'; ?>" class="btn btn-danger">
       <span class="fas fa-home"></span>&nbsp;Home
          </a>
          <a href="<?php echo URLROOT.'category/showcat'; ?>" class="btn btn-info
          ">
       <span class="fas fa-list-alt"></span>&nbsp;Category
          </a>
        </p>
      </div>
    </div>
  </div>
</div>


<?php
require_once APPROOT.'/views/ini/footer.php';
require_once APPROOT.'/views/ini/js.php';
?>