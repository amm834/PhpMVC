
<nav class="navbar navbar-expand-sm navbar-dark indigo">
  <div class="container">
      <a class="navbar-brand" href="<?php echo URLROOT;  ?>">MvC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse ml-auto" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <?php if(getUserSession()): ?>
            <li class="nav-item active">
        <a class="nav-link" href="<?php echo URLROOT."admin/index"; ?>">Admin Panel
          <span class="sr-only"></span>
        </a>
      </li>

      <?php endif; ?>


<div class="dropdown">

  <!--Trigger-->
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
    <?php if(getUserSession() != false) : ?>
    <?php echo getUserSession()->name ; ?>
    <?php else : ?>
    Member
    <?php endif; ?>
    </button>

  <!--Menu-->
  <div class="dropdown-menu dropdown-primary">
    <?php if(getUserSession() != false) : ?>
      <a class="dropdown-item" href="<?php echo URLROOT.'user/logout';  ?>">Logout</a>
    <?php else: ?>
      <a class="dropdown-item" href="<?php echo URLROOT.'user/register';  ?>">Register</a>
    <a class="dropdown-item" href="<?php echo URLROOT.'user/login';  ?>">Login</a>
    <?php endif; ?>
  </div>
</div>

      
      
      
      <!--Dropdown primary-->
<div class="dropdown">

  <!--Trigger-->
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">Material dropdown</button>

  <!--Menu-->
  <div class="dropdown-menu dropdown-primary">
    <a class="dropdown-item" href="#">Php</a>
    <a class="dropdown-item" href="#">JD</a>
    <a class="dropdown-item" href="#">Vue</a>
  </div>
</div>
<!--/Dropdown primary-->
    </ul>
  </div>
  </div>
</nav>
