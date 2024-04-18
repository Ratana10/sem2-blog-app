<?php
include "../../service/userService.php";

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (isset($_POST['btnLogin'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (empty($username) || empty($password)) {
    if (empty($username)) {
      $usernameError = "username is required";
    }

    if (empty($password)) {
      $passwordError = "password is required";
    }

    $valid = array(
      "usernameError" => $usernameError,
      "passwordError" => $passwordError,
    );

    $valid_url = http_build_query($valid);

    header("Location: ./login.php?" . $valid_url);
  } else {
    $userService = new UserService();

    $user = $userService->login($username, $password);

    if ($user) {
      // verify
      $_SESSION['userId'] = $user->getId();
      $_SESSION['username'] = $username;


      header("Location: ../index.php");
      exit();
    } else {
      echo "fail";

      header("Location: ./login.php?invalid=invalid+username+or+password");
    }
  }
}
// if (isset($_POST['btnLogin'])) {
//   // form validation
//   if (
//     empty($_POST['username']) || empty($_POST['password'])
//   ) {
//     if (empty($_POST['username'])) {
//       $usernameError = "username is required";
//     }
//     if (empty($_POST['password'])) {
//       $passwordError = "password is required";
//     }

//     $valid = array(
//       "usernameError" => $usernameError,
//       "passwordError" => $passwordError,
//     );

//     $valid_url = http_build_query($valid);

//     header("Location: ./login.php?" . $valid_url);
//   }

//   $username = $_POST['username'];
//   $password = $_POST['password'];

//   $userService = new UserService();

//   $user = $userService->login($username, $password);
//   if ($user) {
//     // verify
//     // header("Location: ../home.php");
//     $_SESSION['userId'] = $user->getId();
//     $_SESSION['username'] = $username;


//     header("Location: ../index.php");
//     exit();
//   }
//   //  else {
//   //   header("Location: ./login.php?invalid=invalid+username+or+password");
//   //   exit();
//   // }
// }
