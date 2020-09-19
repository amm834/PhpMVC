<?php
 
require_once APPROOT."/views/ini/header.php";
require_once APPROOT."/views/ini/nav.php";
?>
<div class="container no-gutters">
  <h1>Category Home</h1>
  <ul class="list-group">
    <?php
    foreach ($data['cats'] as $cat){
      ?>

  <li class="list-group-item">
    <a href="<?  echo URLROOT.'category/home'; ?>"><?php echo $cat->name; ?></a>
    
   <a href="<?php echo URLROOT.'category/edit/'.$cat->id;  ?>" class="pl-5">Edit</a>
   <a href="<?php echo URLROOT.'category/delete/'.$cat->id;  ?>" class="pl-5 text-danger">Delete</a>
  </li>
  <?php
}
  ?>
  </ul>
</div>
<div class="container m-3 p-5 no-gutters">
  <form action="<?php echo URLROOT.'category/home';  ?>" method="post">
  <?php flash('cat_success');
   flash('cat_failed'); ?>
    <label>Create Index Category</label>
    <input type="text" name="catname">
    <input type="submit" value="Create">
  </form>

</div>
<?php
require_once APPROOT."/views/ini/footer.php";
?>