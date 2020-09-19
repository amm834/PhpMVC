<?php
require_once APPROOT."/views/ini/header.php";
require_once APPROOT."/views/ini/nav.php";
?>
<h1 class="text-center my-2">Post Page</h1>
<div class="container">
  <?php
  flash('pis');
  ?>
  <a href="<?php echo URLROOT.'post/create';  ?>" class="btn btn-outline-primary btn-block">
  Create Post
</a>
  <ul class="list-group mt-3">
    <?php  foreach ($data['cats'] as $cat): ?>
    <li class="list-group-item">
      <a href="<?php echo URLROOT.'post/home/'.$cat->id; ?>">
        <?php echo $cat->name; ?>
      </a>
    </li>
    <?php endforeach; ?>
  </ul>
</div>

<div class="container mt-3">
  <?php foreach ($data['posts'] as $post): ?>
  <div class="card m-2">
    <div class="card-header">
      <h6 class="text-center">
        <?php echo $post->title; ?>
      </h6>
    </div>
    <div class="card-block p-1">
      <p class="text-center">
        <?php
        echo $post->descript;
        ?>
      </p>
    </div>
    <div class="card-footer">
      <div class="row float-right">
        <a href="<?php echo URLROOT.'post/show/'.$post->id; ?>" class="btn btn-success text-white btn-sm">
          Detail
        </a>
        <a href="#" class="btn btn-warning text-white btn-sm">
          Edit
        </a>
        <a href="<?php echo URLROOT.'post/delete/'.$post->id;  ?>" class="btn btn-danger text-white btn-sm">
          Delete
        </a>
        
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>
<?php
require_once APPROOT."/views/ini/footer.php";
?>