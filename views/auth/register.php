<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <title>Register</title>
</head>

<body>
  <div class="container d-flex justify-content-center mt-5">
    <form style="width: 500px;" method="post" action="register-action.php">
      <h1 class="fw-bold text-center mb-4">Register User</h1>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
        <label for="floatingInput">Username</label>
      </div>
      <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="email@gmail.com" name="email">
        <label for="floatingInput">Email</label>
      </div>
      <div class="form-floating mb-3">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
        <label for="floatingPassword">Password</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Image" name="image">
        <label for="floatingInput">Image</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Role" name="role">
        <label for="floatingInput">Role</label>
      </div>
      <button class="btn btn-primary mt-4" name="btnRegister" type="submit">Register</button>
    </form>
  </div>
</body>

</html>