console.log("Testing hello");

$(document).ready(function () {
  $('.confirmDeletePost').click(function () {
    var postId = $('.delete-post').data('post-id');
    $.ajax({
      type: 'POST', // Use POST method for sending data
      url: 'delete-post.php',
      data: { postId: postId },
      success: function (response) {

        var Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 2000,
        });

        Toast.fire({
          icon: "success",
          text: "Post delete success!",
        });

        setTimeout(function () {
          location.reload();
        }, 1000); // Reload after 3 seconds (same as toast timer)



      }
    });

  })
});