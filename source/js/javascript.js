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

    console.log("testlike", likedCountSpan)

    $.ajax({
      url: "like-action.php",
      type: "POST",
      data: {
        postId: postId
      },
      success: function (data) {
        // update like
        likedCountSpan.text(data); // Assuming data contains the updated liked count

        // make red color
        likeIcon.find("i").css("color", data === '1' ? "red" : "#000000");
      },
    })
    console.log("Test", likedCountSpan)
  })

  function updateCommentCount(postId, newCommentCount) {
    // Find the specific comment count element related to the submitted comment
    var commentedCountSpan = $('.comment-count[data-post-id="' + postId + '"]');

    // Update the text content of the comment count element
    commentedCountSpan.text(newCommentCount);
  }

  // 
  $('.btn-comment').click(function (event) {
    console.log("clicked")
    var commentIcon = $(this);
    var commentText = commentIcon.siblings("input[type='text']").val(); // Get comment text
    var postId = commentIcon.data("postId");


    console.log("clicked", commentText)

    $.ajax({
      url: "comment-action.php",
      type: "POST",
      data: { postId: postId, content: commentText },
      success: function (response) {
        updateCommentCount(postId, response);
        commentIcon.siblings("input[type='text']").val("");

      }
    })
  });

  $('#submit-comment').click(function (event) {
    var commentText = $("#comment-input").val();

    var postId = $(this).data('post-id');


    $.ajax({
      url: "comment-action.php",
      type: "POST",
      data: { postId: postId, content: commentText },
      success: function (response) {
        updateCommentCount(postId, response);
        $("#comment-input").val("");

        fetchComments(postId);
        // 
      }
    })

  });

  $('.view-comments').click(function (event) {
    var postId = $(this).data('post-id');
    fetchComments(postId);

    // Show the modal
    $('#commentModal').modal('show');
  });

  function fetchComments(postId) {
    $.ajax({
      url: "get-comments.php", // Replace with your comment fetching script
      type: "GET",
      data: { postId: postId },
      success: function (response) {
        // Parse the response (assuming JSON format)
        var comments = JSON.parse(response);

        $('#comments-container').html("");

        for (var i = 0; i < comments.length; i++) {
          var comment = comments[i];

          var commentElement = `
              <div class="d-flex "  >
                <div><img src="./source/images/users/${comment.image}" alt="Avatar" class="avatar" ></div>
                <div class="d-flex flex-column " style="margin-left: 4px;">
                  <span><strong>${comment.username}</strong></span>
                  <p>${comment.content}</p>
                </div>
              </div>
              <hr>
            `;
          $('#comments-container').append(commentElement);

        }

        $('#submit-comment').attr("data-post-id", postId);

      }

    });
  }

  $('.edit-post').click(function (event) {
    var postId = $(this).data("postId");
    window.location.href = "edit-post.php?id=" + postId;

  });

  $('.delete-post').click(function (e) {
    var postId = $(this).data("postId");
    $.ajax({
      url: 'delete-post-action.php',
      type: 'POST',
      data: {
        postId: postId
      },
      success: function (res) {
        console.log("successs", res);
      }
    })
  });



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

