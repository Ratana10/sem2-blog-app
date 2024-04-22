const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

// Register page
$(document).ready(function () {
  $('#floatingImage').change(function () {
    previewImage(this);
  });

  $('#profileUpload').change(function () {
    previewProfile(this);
  });

  $('.btnCloseProfile').click(function () {
    location.reload(); // Reload the page
  });

  // Liked
  $('.like-icon').click(function () {
    var likeIcon = $(this);
    var postId = likeIcon.data("postId");
    var likedCountSpan = likeIcon.siblings(".liked-count")

    $.ajax({
      url: "like-action.php",
      type: "POST",
      data: {
        postId: postId
      },
      success: function (data) {
        console.log("data", data);
        // update like
        likedCountSpan.text(data); // Assuming data contains the updated liked count

        // make red color
        likeIcon.find("i").css("color", data === '1' ? "red" : "#000000");
      },
    })
    console.log("Test", likedCountSpan)
  })

  // 
  $('.btn-comment').click(function (event) {
    var commentText = $(this).siblings("input[type='text']").val(); // Get comment text
    var postId = $(this).data("postId");
    console.log("commenting", commentText + postId);

    $.ajax({
      url: "comment-action.php",
      type: "POST",
      data: { postId: postId, content: commentText },
      success: function(response){
        console.log("response", response);
      }
    })
  })
});

function previewImage(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#imagePreview').attr('src', e.target.result).show();
    }

    reader.readAsDataURL(input.files[0]);
  } else {
    $('#imagePreview').hide();
  }
}

var previousImageSrc;

function previewProfile(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      previousImageSrc = $('#profilePreview').attr('src');

      $('#profilePreview').attr('src', e.target.result).show();
    }

    reader.readAsDataURL(input.files[0]);
  } else {
    $('#profilePreview').attr('src', previousImageSrc).show();

  }
}



function validatePassword() {
  var password = document.getElementById("floatingPassword").value;
  var confirmPassword = document.getElementById("floatingConfirmPassword").value;
  if (password != confirmPassword) {
    alert("Passwords not match!");
    return false;
  }
  return true;
}




function openPostModal() {
  $('#postModal').modal('show');
}

$("#image").change(function () {
  readURL(this);
});

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('.image-preview').attr('src', e.target.result).show();
    };

    reader.readAsDataURL(input.files[0]);
  }
}


