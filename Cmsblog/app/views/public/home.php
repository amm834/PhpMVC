<?php
require_once APPROOT.'/views/ini/css.php';
?>
<?php
require_once APPROOT.'/views/ini/navbar.php';
require_once APPROOT.'/views/posts/upost.php';
?>
<hr>
<?
require_once APPROOT.'/views/ini/pagination.php';
?>
<hr>
    <div class="col-12">
        <!-- Icon box -->
        <div class="text-center">
            <div class="icon icon-shape-lg shadow-inset border border-light rounded-circle">
              <a href="<? echo URLROOT.'user/about';  ?>">
                                <span class="icon icon-md icon-shape-sm shadow-soft border border-light rounded-circle bg-success text-light"><span class="far fa-smile"></span></span>

              </a>
            </div>
            <h3 class="h5 my-3">About Me</h3>
        </div>
        <!-- End of Icon box -->
    </div>
</div>
<hr>
<div class="container text-center">
  <i class="fa fa-info-circle mr-2 text-info"></i><br>
 Visiting To My Website Will Automatically Argee With All Terms And Policies Of This Website!
</div>
<?
  require_once APPROOT.'/views/ini/footer.php';
  require_once APPROOT.'/views/ini/js.php';
  ?>