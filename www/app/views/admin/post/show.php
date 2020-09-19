<?php
require_once APPROOT."/views/ini/header.php";
require_once APPROOT."/views/ini/nav.php";
?>

<div class="container-fluid">
  <div class="container">
    <div class="card-header">
  <?php echo $data['posts']->title; ?>
</div>
<div class="card-block">
  <img src="<?php echo URLROOT.'assets/uploads/'.$data['posts']->img;   ?>" 
  alt="image" class="img-fluid">
  <p class="p-2">
      <?php echo $data['posts']->content; ?>
  </p>
</div>
  </div>
</div>

<?php
require_once APPROOT."/views/ini/footer.php";
?>