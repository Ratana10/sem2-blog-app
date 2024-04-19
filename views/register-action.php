<?php
include "../service/userService.php";

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (isset($_POST['btnRegister'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $image = $_FILES['image']['name'];

  if (
    empty($username) || empty($email) || empty($password)
  ) {
    if (empty($username)) {
      $usernameError = "username is required";
    }
    if (empty($email)) {
      $emailError = "email is required";
    }
    if (empty($password)) {
      $passwordError = "password is required";
    }

    $valid = array(
      "usernameError" => $usernameError,
      "emailError" => $emailError,
      "passwordError" => $passwordError,
    );

    $valid_url = http_build_query($valid);

    header("Location: ./register.php?" . $valid_url);
  } else {

    empty($image) ? $image = 'default.png' : $image;


    $user = new User(null, $username, $email, $password, "users/" . $image);

    $userService = new UserService();

    // check exist email and username
    $usernameExist = $userService->checkUsername($username);
    $emailExist = $userService->checkEmail($email);

    if ($usernameExist || $emailExist) {
      if ($usernameExist) {
        $usernameError = "username already exist";
      }

      if ($emailExist) {
        $emailError = "email already exist";
      }

      $valid = array(
        "usernameError" => $usernameError,
        "emailError" => $emailError,
      );

      $valid_url = http_build_query($valid);

      header("Location: ./register.php?" . $valid_url);
    }

    // check if client upload image 
    if (!empty($image)) {

      $uploadDir = "../source/images/users/";
      move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $_FILES['image']['name']);
    }

    $userId = $userService->register($user);

    if ($userId) {

      $_SESSION['userId'] = $userId;
      $_SESSION['username'] = $user->getUsername();

      header('Location: ./index.php');
      exit();
    }
  }
}
