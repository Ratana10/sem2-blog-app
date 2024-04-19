const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

// Register page
$(document).ready(function () {
  $('#floatingImage').change(function () {
    previewImage(this);
  });
  console.log("Testing")
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

function validatePassword() {
  var password = document.getElementById("floatingPassword").value;
  var confirmPassword = document.getElementById("floatingConfirmPassword").value;
  if (password != confirmPassword) {
    alert("Passwords not match!");
    return false;
  }
  return true;
}