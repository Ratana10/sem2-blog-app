<?php
include "../../service/userService.php";

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


    // check if client upload image 
    if (!empty($image)) {

      $uploadDir = "../../source/images/users/";
      move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $_FILES['image']['name']);
    }

    $user = new User(null, $username, $email, $password, "users/" . $image);

    $userService = new UserService();

    

    $userId = $userService->register($user);

    if ($userId) {

      $_SESSION['userId'] = $userId;
      $_SESSION['username'] = $user->getUsername();


      header('Location: ../index.php');
      exit();
    }else{
      
    }
  }

  // $username = $_POST['username'];
  // $email = $_POST['email'];
  // $password = $_POST['password'];
  // $image = $_FILES['image']['name'];

  // // check if client upload image 
  // if (!empty($image)) {
  //   $image = $_FILES['image']['name'];

  //   $uploadDir = "../../source/images/users/";
  //   move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $_FILES['image']['name']);
  // }

  // $user = new User(null, $username, $email, $password, $image);

  // $userService = new UserService();
  // $userId = $userService->register($user);

  // if ($userId) {
  //   Util::createSession($userId, $username);
  //   // header('Location: ../home.php');
  //   header('Location: ../index.php');
  //   exit();
  // }

  // $userId = $_SESSION['userId'];
}
