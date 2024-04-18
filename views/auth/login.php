<?php
// Start the session if it hasn't been started yet
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (isset($_SESSION['userId']) && isset($_SESSION['username'])) {
  header('location: ../index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <title>Document</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    html,
    body {
      height: 100%;
    }

    body {
      display: -ms-flexbox;
      display: -webkit-box;
      display: flex;
      -ms-flex-align: center;
      -ms-flex-pack: center;
      -webkit-box-align: center;
      align-items: center;
      -webkit-box-pack: center;
      justify-content: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }

    .btn-login {
      font-size: 0.9rem;
      letter-spacing: 0.05rem;
      padding: 0.75rem 1rem;
    }

    .btn-google {
      color: white !important;
      background-color: #ea4335;
    }

    .btn-facebook {
      color: white !important;
      background-color: #3b5998;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Login In</h5>
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
</body>

</html>