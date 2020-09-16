<?php
require_once APPROOT.'/views/ini/css.php';
?>
<?php
require_once APPROOT.'/views/ini/navbar.php';
?>
<div class="container-fluid">
  <div class="container col-md-8 p-2 shadow-inset rounded">
    <div class="shadow-soft rounded p-2">
      <h6 class="text-center my-3 display-4">Edit Post</h6>
   <!-- Edit Post Form -->

    <form action="<?php  echo URLROOT.'post/edit/'.$data['posts']->id; ?>" class="p-2" method="post" enctype="multipart/form-data">
      <div class="form-group">
      <!-- Post Title  -->
      <div class="form-group">
        <label for="validationServer02">Post Title</label>
        <input type="text" class="form-control
        <?php
        echo !empty($data['title_err']) ? 'is-invalid' : 'is-valid';
        ?>
        " id="validationServer02" required name="title" value="<? echo $data['posts']->title; ?>">
        <div class="<?php
          echo !empty($data['title_err']) ? 'invalid-feedback' : 'valid-feedback';
          ?>
          ">
          <?php
          echo !empty($data['title_err']) ? $data['title_err'] : 'Look Good';
          ?>
        </div>
      </div>
      <!-- File -->
      <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" name="file">
    <label class="custom-file-label" for="customFile">Choose Image</label>
</div>
   <!-- Category Type -->
   <div class="form-group">
    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Category Type</label>
    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="categoryType">
      <?php foreach($data['cats'] as $cat): ?>
      <option value="<? echo $cat->id; ?>"><?
      echo $cat->catname;
      ?></option>

      <?php endforeach; ?>
    </select>
</div>
      <!-- Description -->
      <div class="form-group">
        <label for="validationServer03">Description</label>
        <input type="text"  class="form-control
        <?php
        echo !empty($data['sometext_err']) ? 'is-invalid' : 'is-valid';
        ?>
        " id="validationServer03" required name="sometext" value="<? echo $data['posts']->sometext; ?>">
        <div class="<?php
          echo !empty($data['sometext_err']) ? 'invalid-feedback' : 'valid-feedback';
          ?>
          ">
          <?php
          echo !empty($data['sometext_err']) ? $data['sometext_err'] : 'Look Good';
          ?>

        </div>
      </div>
      <!-- Content -->
      <div class="form-group">
        <label for="validationServer03">Content</label>
        <textarea class="form-control
        <?php
        echo !empty($data['content_err']) ? 'is-invalid' : 'is-valid';
        ?>
        " id="validationServer03" required name="content" rows="10" ><? echo $data['posts']->sometext; ?>
        </textarea>
        <div class="<?php
          echo !empty($data['content_err']) ? 'invalid-feedback' : 'valid-feedback';
          ?>
          ">
          <?php
          echo !empty($data['content_err']) ? $data['content_err'] : 'Look Good';
          ?>

        </div>
      </div>
      <!-- Login Button -->
      <button class="btn btn-info btn-block">
        Edit Post
      </button>
    </form>
  </div>
</div>
</div>
</div>



<?php
require_once APPROOT.'/views/ini/footer.php';
require_once APPROOT.'/views/ini/js.php';
?>