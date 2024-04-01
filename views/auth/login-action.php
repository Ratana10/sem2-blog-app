<?php
include "../../service/userService.php";

if (isset($_POST['btnLogin'])) {
  // form validation
  if (
    empty($_POST['username']) || empty($_POST['password'])
  ) {
    if (empty($_POST['username'])) {
      $usernameError = "username is required";
    }
    if (empty($_POST['password'])) {
      $passwordError = "password is required";
    }

    $valid = array(
      "usernameError" => $usernameError,
      "passwordError" => $passwordError,
    );

    $valid_url = http_build_query($valid);

    header("Location: ./login.php?" . $valid_url);
  }

  $username = $_POST['username'];
  $password = $_POST['password'];

  $userService = new UserService();

  $user = $userService->login($username, $password);
  if ($user) {
    // verify
    // header("Location: ../home.php");
    header("Location: ../index.php");
    exit();
  } else {
    header("Location: ./login.php?invalid=invalid+username+or+password");
    exit();
  }
}
