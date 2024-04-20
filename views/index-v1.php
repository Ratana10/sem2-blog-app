<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css" />
  <title>Document</title>
  <style>
    .post-form {
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .profile-pic {
      width: 80px;
      height: 80px;
      object-fit: cover;
      border-radius: 50%;
      border: 2px solid #007bff;
    }

    .change-profile-pic {
      display: none;
    }

    .custom-file-label::after {
      content: "Browse";
    }

    .image-preview-container {
      width: 100%;
      max-height: 400px;
      overflow-y: auto;
      /* enable vertical scrolling */
      border-radius: 8px;
      position: relative;
      padding-right: 20px;
      /* add padding to prevent content overlap with scrollbar */
    }

    .image-preview {
      width: 100%;
      object-fit: contain;
      display: block;
      border-radius: 8px;
      height: 250px;
    }

    .custom-file-input {
      cursor: pointer;
    }

    .custom-file-input:lang(en)~.custom-file-label::after {
      content: "Browse";
    }
  </style>
</head>

<body>
  <!-- Navbar -->
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

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="javascript:void(0);" onclick="openPostModal()">
              <button class="btn btn-danger">
                Add
              </button>
            </a>
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

  <!-- Card Section -->
  <div class="container">
    <div class="wrapper d-flex justify-content-center">
      <div class="card mb-3">
        <img class="img-fluid" src="../source/images/posts/car.jpg" style="width: 56rem" class="card-img-top" alt="..." />
        <div class="card-body">
          <div class="mb-2">
            <div class="row">
              <div class="col-8 d-flex align-items-center justify-content-start g-2">
                <div class="mx-1">
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



  <!-- Visalroth add Post Modal -->

  <!-- Post Modal -->
  <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="postModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="postModalLabel">Create Post</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="post-form">
            <form action="post-action.php" method="post" enctype="multipart/form-data">
              <div class="form-group text-center">
                <img src="https://scontent.fpnh1-1.fna.fbcdn.net/v/t39.30808-6/365410323_1944848762558502_4092404705433958573_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeH5o-Sdv3U4em01OFRON1d8XM0Cdaq9Yx5czQJ1qr1jHvjfxI8bFpTwQXmSsDCstjybulwr5Vu2KS-HQ1HWdj1X&_nc_ohc=LTCbAQXGyAgAb5TFzUk&_nc_ht=scontent.fpnh1-1.fna&oh=00_AfA9XUCtossYNEp3e0GYP3X8UlJfihK-Fufmaf8PZ4AhGg&oe=6622A680" class="rounded-circle profile-pic mb-3" alt="Profile Picture">
                <div>
                  <h5 class="mb-0">Your Name</h5>
                  <input type="file" class="form-control-file mt-1 change-profile-pic" id="profilePic" name="profilePic">
                  <!-- <label for="profilePic" class="btn btn-sm btn-link mt-2">Change Profile Picture</label> -->
                </div>
              </div>
              <div class="form-group">
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="What's on your mind?"></textarea>
              </div>
              <br>


              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image" name="image">
                </div>
                <div class="image-preview-container">
                  <img src="#" class="image-preview mt-3" alt="">
                </div>
              </div>
              <br>
              <br>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block form-control" name="postBtn">Post</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

  <!-- Custom JS -->
  <script>
    function openPostModal() {
      $('#postModal').modal('show');
    }

    $("#image").change(function() {
      readURL(this);
    });

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('.image-preview').attr('src', e.target.result).show();
        };

        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
</body>

</html>