<nav class="navbar  fixed-top navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img class="logo-img rounded logo-img" src="../source/images/logo/Linkin.png" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span><i class="fa-solid fa-bars"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Home">
            <i class="fa-solid fa-house"></i>
          </a>
        </li>
      </ul>
      <div class="btn-group  ">
        <a class="nav-link " type="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
          <span>Ratana</span>
          <img src="../source/images/users/img_avatar.png" class="rounded-circle ms-2 avatar">
          <i class="fa fa-caret-down" aria-hidden="true"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg-end ">
          <li>
            <a class="dropdown-item" href="#">
              <span><i class="fa-solid fa-tag"></i></span>My Post
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="#">
              <span><i class="fa-regular fa-square-plus"></i></span>Create Post
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="#">
              <span><i class="fa-solid fa-gear"></i></span>Setting
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="./auth/logout.php">
              <span><i class="fa-solid fa-right-from-bracket"></i></span>Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>