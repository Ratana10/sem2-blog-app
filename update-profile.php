<?php include_once "config/check-session.php"; ?>

<?php

include_once "service/userService.php";

if (isset($_POST['btnUpdate'])) {
  $userId = $_POST['userId'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
 

  $userService = new UserService();

  $user = $userService->getUserById($userId);

  

  // $userService->updateUser($user);
}
