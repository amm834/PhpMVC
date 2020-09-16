<nav class="navbar navbar-expand-lg navbar-transparent navbar-light shadow-soft navbar-theme-primary mb-5">
  <div class="container position-relative">
    <a class="navbar-brand mr-lg-5" href="<?php echo URLROOT.'0'; ?>">
      Sharable
    </a>
    <div class="navbar-collapse collapse" id="navbar-default-primary">
      <div class="navbar-collapse-header">
        <div class="row">
          <div class="col-6 collapse-brand">
            <a class="navbar-brand mr-lg-5">
            </a>
          </div>
          <div class="col-6 collapse-close">
            <i class="fas fa-times" data-toggle="collapse" role="button"
              data-target="#navbar-default-primary" aria-controls="navbar-default-primary"
              aria-expanded="false" aria-label="Toggle navigation"></i>
          </div>
        </div>
      </div>
      <!-- Menu Area -->
      <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
        <div class="nav-wrapper position-relative">
          <ul class="nav nav-pills nav-fill flex-column flex-md-row">
            <? if (getSession()->userrole == 1): ?>
            <li class="nav-item">
              <a class="nav-link text-success mb-sm-3 mb-md-0 active" href="<?php echo URLROOT.'admin/index';  ?>"><span class="icon-success"><span class="fas fa-tachometer-alt mr-2"></span>Admin Dashboard</span></a>
            </li>
            <? endif; ?>
            <li class="nav-item">
              <!-- Category -->
              <a class="nav-link  text-dark mb-sm-3 mb-md-0" href="<? echo URLROOT.'0'; ?>"><span class="icon-success"><span class="fa fa-home mr-2"></span>Home</span></a>
            </li>
            <li class="nav-item">
              <!-- About -->
              <a class="nav-link  text-dark mb-sm-3 mb-md-0" href="<? echo URLROOT.'user/about'; ?>"><span class="icon-success"><span class="fa fa-smile mr-2"></span>About Me</span></a>
            </li>
            <div class="accordion shadow-soft rounded">
              <div class="card card-sm card-body bg-primary border-light mb-0 rounded">
                <a href="#panel-4" data-target="#panel-4" class="accordion-panel-header" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="panel-1">
                  <span class="icon-title h6 mb-0 font-weight-bold"><span class="fab fa-leanpub"></span>Category</span>
                  <span class="icon"><span class="fas fa-plus"></span></span>
                </a>
                <div class="collapse" id="panel-4">
                  <div class="pt-3">
                    <div class="nav-wrapper position-relative">
                      <!-- Category ITEMS -->
                      <? foreach($data['cats'] as $cat): ?>
                             <a href="<? echo URLROOT.'home/showPostByCat/'.$cat->id; ?>" class="btn btn-block shadow-inset"><? echo $cat->catname; ?></a>

                      <? endforeach;?>
                    </div>
                  </div>
                </div>
              </div>

            </ul>
          </div>
          <div class="dropdown">
            <? if (getSession()): ?>
            <button class="btn btn-block btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <? echo getSession()->username; ?>
              <i class="fas fa-angle-down nav-link-arrow"></i>
            </button>
            <?php else : ?>
            <button class="btn btn-block btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Your Account
              <i class="fas fa-angle-down nav-link-arrow"></i>
            </button>
            <? endif; ?>
            <!-- Account -->
            <div class="dropdown-menu shadow-inset p-2"
              aria-labelledby="dropdownMenuButton">
              <div class="shadow-soft p-2 rounded">

                <? if (getSession()): ?>
                <a href="<?php echo URLROOT.'user/logout'; ?>" class="btn btn-danger btn-block  p-2">Logout</a>
                <?php else : ?>
                <a href="<?php echo URLROOT.'user/register'; ?>" class="btn btn-block btn-dark p-2">Register</a>
                <a href="<?php echo URLROOT.'user/login'; ?>" class="btn btn-block btn-success p-2">Login</a>
                <? endif; ?>
              </div>
            </div>
          </div>


        </ul>
      </div>
     </ul>
      <div class="d-flex align-items-center">
        <button class="btn navbar-toggler ml-2" type="button" data-toggle="collapse"
          data-target="#navbar-default-primary" aria-controls="navbar-default-primary"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
  </div>

</div>
</nav>
