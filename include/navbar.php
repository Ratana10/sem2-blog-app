<nav class="navbar fixed-top  navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img class="logo-img rounded" src="source/images/logo/kolap.png" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span><i class="fa-solid fa-bars"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Home">
            <i class="fa-solid fa-house"></i>
          </a>
        </li>
      </ul>
      <div class="btn-group  ">
        <a class="nav-link " type="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
          <span> <?php echo $_SESSION["username"] ?> </span>
          <img src="source/images/users/<?php echo $_SESSION["image"] ?>" class="rounded-circle ms-2 avatar">
          <i class="fa fa-caret-down" aria-hidden="true"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg-end ">
          <li>
            <a class="dropdown-item" href="myposts.php">
              <span><i class="fa-solid fa-tag"></i></span>My Post
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="post.php">
              <span><i class="fa-regular fa-square-plus"></i></span>Create Post
            </a>
          </li>
          <li>
            <a class="dropdown-item" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#updateProfileModal">
              <span><i class="fa-solid fa-gear"></i></span>Update Profile
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="logout.php">
              <span><i class="fa-solid fa-right-from-bracket"></i></span>Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>