<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Post</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Custom CSS -->
  <style>
    .post-form {
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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

<a class="nav-link active" aria-current="page" href="javascript:void(0);" onclick="openPostModal()">
  <button class="btn btn-danger">
    Add
  </button>
</a>

<!-- Modal -->
<div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="postModalLabel">Create Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="post-form">
          <form action="post-action.php" method="post" enctype="multipart/form-data">
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
                <input type="file" class="custom-file-input" id="image" name="image">
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
