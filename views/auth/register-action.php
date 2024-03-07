<?php
include "../../entity/user.php";
include "../../service/userService.php";

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (isset($_POST['btnRegister'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $image = $_POST['image'];
  $role = $_POST['role'];

  $user = new User("", $username, $email, $password, $image, $role);

  $userService = new UserService();
  $userId = $userService->register($user);

  if ($userId) {
    createSession($userId, $username);
    header('refresh:1 ; url= ../home.php');
  }
}

function createSession($userId, $username)
{
  $_SESSION['userId'] = $userId;
  $_SESSION['username'] = $username;
}
