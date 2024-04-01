<?php
include "../../service/userService.php";

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (isset($_POST['btnRegister'])) {
  if (
    empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])
  ) {
    if (empty($_POST['username'])) {
      $usernameError = "username is required";
    }
    if (empty($_POST['email'])) {
      $emailError = "email is required";
    }
    if (empty($_POST['password'])) {
      $passwordError = "password is required";
    }

    $valid = array(
      "usernameError" => $usernameError,
      "emailError" => $emailError,
      "passwordError" => $passwordError,
    );

    $valid_url = http_build_query($valid);

    header("Location: ./register.php?" . $valid_url);
  }

  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $image = $_FILES['image']['name'];

  // check if client upload image 
  if (!empty($image)) {
    $image = $_FILES['image']['name'];

    $uploadDir = "../../source/images/users/";
    move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $_FILES['image']['name']);
  }

  $user = new User(null, $username, $email, $password, $image);

  $userService = new UserService();
  $userId = $userService->register($user);

  if ($userId) {
    Util::createSession($userId, $username);
    // header('Location: ../home.php');
    header('Location: ../index.php');
    exit();
  }
}
