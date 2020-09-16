<?php
require_once APPROOT.'/views/ini/css.php';
?>
<?php
require_once APPROOT.'/views/ini/navbar.php';
?>

<div class="container-fluid">
  <div class="container">
    <? flash("loginAdmin"); ?>

    <div class="row mb-lg-5">
      
    <div class="col-md-6 mb-5">
        <!-- Admin box -->
        <div class="card bg-primary shadow-soft border-light  mb-lg-0">
            <div class="card-body p-4 p-xl-5">
                <div class="icon icon-shape shadow-soft rounded-circle text-light bg-success">
                    <span class="fas fa-tachometer-alt mr-2"></span>
                </div>
                <h3 class="h5 my-3">Admin Dashboard</h3>
                <p class="mb-4">Show all categories,posts,users,admins comments and charts.</p>
                <a href="<? echo URLROOT.'admin/adashboard'; ?>" class="btn btn-primary text-success"><span class="fas fa-link m-2"></span>Go To Admin Dashboard</a>
            </div>
        </div>
        <!-- End of Admin box -->
    </div>
        <div class="col-md-6 mb-5">
        <!-- Post box -->
        <div class="card bg-primary shadow-soft border-light mb-4 mb-lg-0">
            <div class="card-body p-4 p-xl-5">
                <div class="icon icon-shape shadow-soft rounded-circle">
                    <span class="fa fa-sticky-note"></span>
                </div>
                <h3 class="h5 my-3">Post Manager</h3>
                <p class="mb-4">Show all details about admin categories.</p>
                <a href="<? echo URLROOT.'post/show';  ?>" class="btn btn-primary"><span class="fas fa-link m-2"></span>Manage Posts</a>
            </div>
        </div>
        <!-- End of Post box -->
    </div>

    <div class="col-md-6 mb-5">
        <!-- Category box -->
        <div class="card bg-primary shadow-soft border-light  mb-lg-0">
            <div class="card-body p-4 p-xl-5">
                <div class="icon icon-shape shadow-soft rounded-circle">
                    <span class="fa fa-list-alt"></span>
                </div>
                <h3 class="h5 my-3">Admin Category</h3>
                <p class="mb-4">Show all details about admin categories.</p>
                <a href="<? echo URLROOT.'category/showcat';  ?>" class="btn btn-primary"><span class="fas fa-link m-2"></span>Manage Category</a>
            </div>
        </div>
        <!-- End of Category box -->
    </div>
    
</div>
  </div>
</div>




<?php
  require_once APPROOT.'/views/ini/footer.php';
  require_once APPROOT.'/views/ini/js.php';
  ?>