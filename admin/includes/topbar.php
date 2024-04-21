<?php include_once "../config/check-session.php" ?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index3.html" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Profile -->
    <li class="nav-item dropdown ">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <span style="margin-right: 10px;"><?php echo $_SESSION["username"] ?></span>
        <img src="../source/images/users/<?php echo $_SESSION["image"] ?>" class="rounded-circle ms-2 avatar" style="height: 30px; width: 30px;">
        <i class="fa fa-caret-down" aria-hidden="true"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right" style="width: 10px;">
        <a href="../logout.php" class="dropdown-item">
          <span style="margin-right: 10px;"><i class="fa-solid fa-right-from-bracket"></i></span>Logout
        </a>
      </div>
    </li>

  </ul>
</nav>
<!-- /.navbar -->