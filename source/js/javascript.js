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