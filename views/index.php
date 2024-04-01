<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <title>Document</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Blog</a>
          </li>
        </ul>
        <div class="d-flex gap-3 align-items-center">
          <span>User</span>
          <button href="./LoginPage.html" class="btn btn-danger" type="submit">
            Logout
          </button>
        </div>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="wrapper d-flex justify-content-center">
      <div class="card mb-3">
        <img class="img-fluid" src="../source/images/posts/car.jpg" style="width: 56rem" class="card-img-top" alt="..." />
        <div class="card-body">
          <div class="mb-2">
            <div class="row">
              <div class="col-8 d-flex align-items-center justify-content-start g-2">
                <div class="mx-1">
                  <!-- <span>Profile</span> -->
                  <img style="border: 1px solid rgb(255, 255, 255); 
                            position: relative; 
                            display: block; 
                            margin-left: auto; 
                            margin-right: auto; 
                            z-index: 1;  
                            width: 60px;
                            height: 60px;
                            border-radius: 50%; " src="../source/images/users/under.jpeg" class="img-fluid" alt="..." />
                </div>
                <div class="user-acc mx-1">
                  <h5 class="card-title">N1T</h5>
                </div>
              </div>
              <div class="col-4 d-flex align-items-center justify-content-end">
                <div class="icon d-flex gap-2">
                  <span class="pe-2">1</span>
                  <span><i class="fa-regular fa-heart fa-lg pe-1"></i></span>
                  <span class="pe-2">1</span>
                  <span><i class="fa-regular fa-comment fa-lg"></i></span>
                  <span class="ps-2"><i class="fa-regular fa-share-from-square fa-lg"></i></span>
                </div>
              </div>
            </div>
          </div>
          <div class="content mb-4">
            <p class="card-text">
              This is a wider card with supporting text below as a natural
              lead-in to additional content. This content is a little bit
              longer.
            </p>
          </div>
          <div class="cmt">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="comment" aria-label="Recipient's username" aria-describedby="button-addon2" />
              <button class="btn btn-info" type="button" id="button-addon2">
                <i class="fa-solid fa-paper-plane fa-lg" style="color: #ffffff"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>