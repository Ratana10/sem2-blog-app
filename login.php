<?php
// Start the session if it hasn't been started yet
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (isset($_SESSION['userId']) && isset($_SESSION['username'])) {
  header('location: index.php');
}

?>

<!-- header -->
<?php include('include/header.php') ?>

<!-- Contain -->
<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5">Login In</h5>
            <form action="login-action.php" method="post">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Enter username" name="username">
                <label for="floatingInput">Username</label>
                <span class="text-danger">
                  <?php if (!empty($_GET['usernameError'])) {
                    echo $_GET['usernameError'];
                  } ?>
                </span>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Enter password" name="password">
                <label for="floatingPassword">Password</label>
                <span class="text-danger">
                  <?php if (!empty($_GET['passwordError'])) {
                    echo $_GET['passwordError'];
                  } ?>
                </span>
              </div>
              <div class="d-grid">
                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" name="btnLogin">
                  Login</button>
              </div>
              <span class="text-danger">
                <?php if (!empty($_GET['invalid'])) {
                  echo $_GET['invalid'];
                } ?>
              </span>
              <hr class="my-4">
              <div>
                <a href="register.php">
                  <p class="text-end ">Don't have an account ?</p>
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- footer -->
<?php include('include/footer.php') ?>