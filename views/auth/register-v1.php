<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <title>Register</title>
  <style>
    .image-preview {
      width: 100%;
      max-height: 300px;
      object-fit: cover;
      display: none;
      border: 3px solid gray;
      border-radius: 8px;
      vertical-align: middle;
    }
  </style>
</head>

<body>
  <div class="container d-flex justify-content-center mt-5">
    <form style="width: 500px;" method="post" action="register-action.php" enctype="multipart/form-data">
      <h1 class="fw-bold text-center mb-4">Register User</h1>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingUsername" placeholder="Username" name="username">
        <label for="floatingUsername">Username</label>
        <span class="text-danger">
          <?php if (!empty($_GET['usernameError'])) {
            echo $_GET['usernameError'];
          } ?>
        </span>
      </div>
      <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingEmail" placeholder="email@gmail.com" name="email">
        <label for="floatingEmail">Email</label>
        <span class="text-danger">
          <?php if (!empty($_GET['emailError'])) {
            echo $_GET['emailError'];
          } ?>
        </span>
      </div>
      <div class="form-floating mb-3">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
        <label for="floatingPassword">Password</label>
        <span class="text-danger">
          <?php if (!empty($_GET['passwordError'])) {
            echo $_GET['passwordError'];
          } ?>
        </span>
      </div>
      <div class="form-floating mb-3">
        <input type="file" class="form-control" id="floatingImage" placeholder="Image" name="image">
        <label for="floatingImage">Image</label>
        <img id="imagePreview" src="#" alt="Image Preview" class="image-preview mt-4">

      </div>
      <button class="btn btn-primary mt-4" name="btnRegister" type="submit">Register</button>
    </form>
  </div>

  <!-- jQuery Library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#floatingImage').change(function() {
        previewImage(this);
      });
    });

    function previewImage(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#imagePreview').attr('src', e.target.result).show();
        }

        reader.readAsDataURL(input.files[0]);
      } else {
        $('#imagePreview').hide();
      }
    }
  </script>
</body>

</html>