<?php
require_once APPROOT."/views/ini/header.php";
require_once APPROOT."/views/ini/nav.php";
?>
<?php
flash("fde")
?>
<div class="container-fluid">
  <div class="container my-5">
    <form action="<?php echo URLROOT.'post/create'; ?>" method="post" enctype="multipart/form-data">
  <div>
    <label>Category Type</label><br>
    <select name="catid" class="form-controls">
          <?php foreach ($data['cats'] as $cat): ?>
      <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <br>
  <input type="file" name="file">
  <div>
    <label>Title</label><br>
    <input type="text" name="title"><br>
  </div>
  <div>
    <label>Post Description</label><br>
    <input type="text" name="desc"><br>
  </div>
  <div>
    <label>Post Content</label><br>
    <input type="text" name="content"><br>
  </div>
  <input type="submit" name="create" class="btn btn-success btn-block">
</form>

  </div>
</div>

<?php
require_once APPROOT."/views/ini/footer.php";
?>