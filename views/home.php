<?php
// Start the session if it hasn't been started yet
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['userId']) && !isset($_SESSION['username'])) {
  header('location: ./auth/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <title>Home</title>
</head>

<body>
  <div class="container d-flex justify-content-center mt-5">
    <h2>Home Page</h2>
  </div>
</body>

</html>