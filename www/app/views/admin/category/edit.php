<?php

require_once APPROOT."/views/ini/header.php";
require_once APPROOT."/views/ini/nav.php";
?>
<div class="container no-gutters">
  <h1>Rename Category</h1>
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

<div class="container no-gutters">
  <div class="mt-5"></div>
  <form action="<?php echo URLROOT.'category/edit';; ?>" method="post">
    <label>Rename category Page</label>

    <input type="text" name="catname" value="<?php
    echo $data['curCat']->name;
    ?>">

    <input type="submit" value="Rename">
  </form>

</div>



<?php
require_once APPROOT."/views/ini/footer.php";
?>