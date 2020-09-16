<?php
require_once APPROOT.'/views/ini/css.php';
?>
<?php
require_once APPROOT.'/views/ini/navbar.php';
?>
<div class="container-fluid">
  <?  flash("cmtSuccess"); ?>
  <div class="row">
    <div class="col-12 col-md-12">
      <div class="card bg-primary border-light shadow-inset">
        <img src="<? echo URLROOT.'uploads/'.$data['postById']->imgpath; ?>" class="card-img-top rounded-top img-fluid">
        <div class="card-body">
          
          <span class="h6 icon-tertiary small"><span class="fas fa-calendar-alt mr-2"></span><?php
            echo $data['postById']->created_at;
            ?></span>
          <h3 class="h5 card-title mt-3">
          <strong><?php
            echo $data['postById']->title;
            ?></strong></h3>
          <p>
            <strong>Description</strong>
          </p>
          <p class="card-text">
<span>    <?php
            echo $data['postById']->sometext;
            ?></span>

          </p>
          <hr>
          <p>
            <span>
            <?php
            echo $data['postById']->content;
            ?>
            </span>
          </p>
        </div>
        <div class="card-footer">
          <div class="d-flex justify-content-between">
            <p>
              <span class="far fa-comments mr-2"></span><?
              echo count($data['cmts']);
              ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container my-5">
    <div class="border-light">
     <!-- Comments -->
          <? foreach ($data['cmts'] as $cmt): ?>
          <div class="alert shadow-soft" role="alert">
            <p class="alert-inner--text"><span class="fa fa-user mr-2"></span><span><? echo $cmt->username; ?></span></p>
                      <span class="fas fa-calendar ml-3 mr-2"></span> <? $str = $cmt->commented_at;
                $str = explode(" ",$str);
                echo $str[0];
                        ?>
            <br>
            <?php echo $cmt->comment; ?>
          </div>
            <? endforeach; ?>
          <!-- Comments -->
          <!-- Comment Form -->
          <div class="form-group">
            <? if (getSession()): ?>
            <form action="<?  echo URLROOT.'comment/create' ?>" method="post">

              <div class="input-group mb-4">
                <input type="text" name="postid" value="<?php echo $data['postById']->id; ?>" hidden>
                <input name="cmt" class="form-control" id="exampleInputIcon2" placeholder="Comment Your Advice" type="text" autocomplete="off">
                <div class="input-group-append">
                  <button class="btn btn-primary"><span class="fa fa-arrow-up"></span></button>
                </div>
              </div>

              <? else : ?>
              <div class="input-group mb-4">
                <input class="form-control text-center" id="exampleInputIcon2" placeholder="Login To Comment" type="text" disabled="on">
              </div>

              <? endif; ?>
            </form>
          </div>
          <!-- Comment Form -->

        
      
    </div>
  </div>

</div>


<?php
require_once APPROOT.'/views/ini/footer.php';
require_once APPROOT.'/views/ini/js.php';
?>