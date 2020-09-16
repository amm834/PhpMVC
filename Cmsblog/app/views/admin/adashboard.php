<?php
require_once APPROOT.'/views/ini/css.php';
?>
<?php
require_once APPROOT.'/views/ini/navbar.php';
?>
<!-- Categpry -->
<div class="container text-center">
  <h3 class="shadow-soft p-2 border-light rounded"><span class="fa fa-list-alt mr-2"></span><strong>Admin Dashboard</strong></h3>
</div>

<div class="container my-5">
    <p class="text-center d-flex justify-content-between no-gutters">
      <a href="<?php echo URLROOT.'admin/index'; ?>" class="btn text-success">
        <span class="fas fa-home"></span>&nbsp;Home
      </a>
      <a href="<?php echo URLROOT.'admin/acategory'; ?>" class="btn btn-success">
        <span class="fas fa-pen"></span>&nbsp;Create
      </a>

    </p>
    <div class="rounded">
      <table class="table table-hover">
        <tr>
          <th class="border-0" scope="col" id="class3">Category Name</th>
        </tr>
        <? if (!empty($data['cats'])): ?>
        <?php foreach ($data['cats'] as $catName): ?>
        <tr>
          <td>
            <?php  echo $catName->catname; ?>
          </td>
          <td><a href="<?  echo URLROOT.'category/edit/'.$catName->id; ?>" class="btn btn-info">Edit</a></td>
          <td><a href="<?
            echo URLROOT.'category/delete/'.$catName->id;
            ?>" class="btn btn-danger">Delete</a></td>
        </tr>
        <?php endforeach; ?>
        <?php else : ?>
        <td>
          <?php echo "<h6 class='text-center my-5'>There is no category to show!</h6>"; ?>
        </td>
        <?php endif; ?>
      </table>

    </div>

  </div>

<!-- Category -->
<!-- Post -->
<div class="container-fluid my-5">
  <!-- Categgory -->
  <div class="container">
    <p class="text-center">
      <span class="shadow-soft p-3  rounded"><span class="fas fa-sticky-note"></span>&nbsp;
        Post Manager
      </span>
    </p>
    <hr>
    <div class="container">
  <a href="<? echo URLROOT.'post/create'; ?>" class="btn btn-block btn-success my-3"><span
  class="fas fa-pen"></span>&nbsp;New Post</a>
</div>

    <div class="shadow-inset p-3 rounded ">
      <? flash("createPost"); ?>
      <p class="text-center d-flex justify-content-between no-gutters">
        <a href="<?php echo URLROOT.'admin/index'; ?>" class="btn text-success">
          <span class="fas fa-home"></span>&nbsp;Home
        </a>
        <a href="<?php echo URLROOT.'category/showcat'; ?>" class="btn btn-info">
          <span class="fas fa-list"></span>&nbsp;Category
        </a>

      </p>
      <div class="rounded">
        <table class="table table-hover">
          <tr>
            <th class="border-0" scope="col" id="class3">Category Name</th>
          </tr>
          <? if (!empty($data['cats'])): ?>
          <?php foreach ($data['cats'] as $catName): ?>
          <tr>
            <td>
              <?php  echo $catName->catname; ?>
            </td>
            <td>
              <a href="<? echo URLROOT.'post/show/'.$catName->id; ?>" class="btn btn-info"><span class="fas fa-sticky-note"></span></a>
            </td>

          </tr>
          <?php endforeach; ?>
          <?php else : ?>
          <td>
            <?php echo "<h6 class='text-center my-5'>There is no category to show!</h6>"; ?>
          </td>
          <?php endif; ?>
        </table>
      </div>

    </div>
  </div>
</div>

<!-- Post -->




<?php
require_once APPROOT.'/views/ini/footer.php';
require_once APPROOT.'/views/ini/js.php';
?>