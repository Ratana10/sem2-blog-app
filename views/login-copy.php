<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- font Awesome  -->
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

  <title>Document</title>
  <style>
    .logo-img {
      width: 40px;
      height: 40px;
    }

    .avatar {
      vertical-align: middle;
      width: 40px;
      height: 40px;
      border-radius: 50%;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary ">
    <div class="container-fluid ">
      <a class="navbar-brand" href="#">
        <img class="logo-img" src="../source/images/logo/Linkin.png" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="main_nav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item active"> <a class="nav-link" href="#">Home </a> </li>
          <li class="nav-item"><a class="nav-link" href="#"> About </a></li>
          <li class="nav-item"><a class="nav-link" href="#"> Services </a></li>
        </ul>
        <div class="btn-group  dropstart  ">
          <a class="nav-link " type="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
            <img src="../source/images/users/img_avatar.png" width="40" height="40" class="rounded-circle">
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </div>

      </div> <!-- navbar-collapse.// -->
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>