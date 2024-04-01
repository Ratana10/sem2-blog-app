<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Post</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Custom CSS -->
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
    }

    .change-profile-pic {
      display: none;
    }

    .custom-file-label::after {
      content: "Browse";
    }

    .image-preview {
      width: 100%;
      max-height: 300px;
      object-fit: cover;
      display: none;
      border-radius: 8px;
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

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="post-form">
          <form action="#" method="post" enctype="multipart/form-data">
            <div class="form-group text-center">
              <img src="https://via.placeholder.com/80" class="rounded-circle profile-pic mb-3" alt="Profile Picture">
              <div>
                <h5 class="mb-0">Your Name</h5>
                <input type="file" class="form-control-file mt-1 change-profile-pic" id="profilePic" name="profilePic">
                <label for="profilePic" class="btn btn-sm btn-link mt-2">Change Profile Picture</label>
              </div>
            </div>
            <div class="form-group">
              <textarea class="form-control" id="description" name="description" rows="3" placeholder="What's on your mind?"></textarea>
            </div>
            <div class="form-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input mt-2" id="image" name="image">
                <label class="custom-file-label" for="image">Choose image...</label>
              </div>
              <img src="#" class="image-preview mt-3" alt="Image Preview">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block" name="postBtn">Post</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Custom JS -->
  <script>
    // Image preview
    $("#image").change(function() {
      readURL(this);
    });

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('.image-preview').attr('src', e.target.result).show();
        }

        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
</body>

</html>