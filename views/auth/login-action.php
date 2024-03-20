<?php
include "../../service/userService.php";

if (isset($_POST['btnLogin'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $userService = new UserService();

  $user = $userService->login($username, $password);
  if($user){
    // verify
    header("Location: ../home.php");
  }
  else{
    echo "password doesn't match";
  }
}
