<?php
include "../../entity/user.php";
include "../../service/userService.php";
include "../../config/util.php";

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (isset($_POST['btnRegister'])) {
  if (
    empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) 
    || empty($_POST['image']) || empty($_POST['role'])
  ){
    if (empty($_POST['username'])) {
      $usernameError = "username is required";
    }
    if (empty($_POST['email'])) {
      $emailError = "email is required";
    }
    if (empty($_POST['password'])) {
      $passwordError = "password is required";
    }
    if (empty($_POST['image'])) {
      $imageError = "image is required";
    }

    $valid = array(
      "usernameError" => $usernameError,
      "emailError" => $emailError,
      "passwordError" => $passwordError,
      "imageError" => $imageError,
    );

    $valid_url = http_build_query($valid);

    header("Location: ./register.php?" . $valid_url);
  }

  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $image = $_POST['image'];

  $hashPassword = Util::encryptPassword($password);

  $user = new User(null, $username, $email, $hashPassword, $image);

  $userService = new UserService();
  $userId = $userService->register($user);

  if ($userId) {
    Util::createSession($userId, $username);
    header('Location ../home.php');
  }
}


?>
