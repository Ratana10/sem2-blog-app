<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    />
    <title>Document</title>
  </head>
  <body>
    <div class="container d-flex justify-content-center mt-5">
      <form style="width: 500px;">
        <h1 class="fw-bold text-center mb-4">Login</h1>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
          <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
          <label for="floatingPassword">Password</label>
        </div>
        <button class="btn btn-primary mt-4" name="btnLogin">Login</button>
        <a href="./register.php" class="btn btn-primary mt-4" name="btnRegister">Register</a>
      </form>
    </div>
  </body>
</html>
