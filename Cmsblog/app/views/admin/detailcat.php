<?php
require_once APPROOT.'/views/ini/css.php';
?>
<?php
require_once APPROOT.'/views/ini/navbar.php';
?>

<div class="container-fluid my-5">
  <div class="container">
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
</div>




<?php
require_once APPROOT.'/views/ini/footer.php';
require_once APPROOT.'/views/ini/js.php';
?>