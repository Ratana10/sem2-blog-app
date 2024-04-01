<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <title>Document</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
  <div class="container d-flex justify-content-center mt-5">
    <form style="width: 500px;" method="post" action="login-action.php">
      <h1 class="fw-bold text-center mb-4">Login</h1>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingUsername" placeholder="Username" name="username">
        <label for="floatingUsername">Username</label>
        <span class="text-danger">
          <?php if (!empty($_GET['usernameError'])) {
            echo $_GET['usernameError'];
          } ?>
        </span>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
        <label for="floatingPassword">Password</label>
        <span class="text-danger">
          <?php if (!empty($_GET['passwordError'])) {
            echo $_GET['passwordError'];
          } ?>
        </span>
      </div>
      <?php
      if (!empty($_GET['invalid'])) {
        echo '
          <div class="alert alert-danger mt-2" role="alert">
            ' . $_GET["invalid"] . '
          </div>
        ';
      }
      ?>
      <button class="btn btn-primary mt-2" name="btnLogin" type='submit'>Login</button>
      <a href="./register.php" class="btn btn-primary mt-2" name="btnRegister">Register</a>
    </form>
  </div>
</body>
<script>
  $(document).ready(function() {
    $('#floatingUsername').focus(function() {
      // Remove the invalid parameter from the URL
      history.replaceState({}, document.title, window.location.pathname);

      //hide alert div
      $(".alert").hide();
    });
    
  });
</script>

</html>