<?php
require_once APPROOT.'/views/ini/css.php';
?>
<?php
require_once APPROOT.'/views/ini/navbar.php';
?>
<div class="container-fluid">

  <div class="container col-md-8 p-2 shadow-inset rounded">

    <div class="shadow-soft rounded p-2">
      <h6 class="text-center my-3 display-4">Rename Category</h6>
      <!--If Cat Success -->

      <!-- Category Create Form -->
      <form action="<?php  echo URLROOT.'category/edit/'.$data['catid']->id; ?>" class="p-2" method="post">
        <!-- category Name-->
        <div class="form-group">

          <div class="form-group">
            <label for="validationServer02">Rename Category</label>
            <input type="text"

            value="<? echo $data['catid']->catname;
            ?>"
            class="form-control
            <?php
            echo !empty($data['cat_err']) ? 'is-invalid' : 'is-valid';
            ?>
            " id="validationServer02" required name="catName">

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
          <div class="container">
            <p class="row d-flex justify-content-between p-2">
              <a href="<? echo URLROOT.'category/showcat'; ?>" class="btn btn-danger">
                Cancel
              </a>
              <button class="btn btn-success">
                Rename
              </button>

            </p>
          </div>
        </form>
        <hr>
        <p class="text-center">
          <a href="<?php echo URLROOT.'admin/index'; ?>" class="btn btn-info">
            <span class="fas fa-home"></span>
            Home </a>
        </p>
      </div>
    </div>
  </div>
</div>


<?php
require_once APPROOT.'/views/ini/footer.php';
require_once APPROOT.'/views/ini/js.php';
?>