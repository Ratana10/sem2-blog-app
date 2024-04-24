<?php
include_once "../config/check-session.php";
include_once "../service/userService.php";

if ($_SERVER['REQUEST_METHOD'] === 'USER') {
  $userId = $_USER['userId'];

  $userService = new UserService();

  $result = $userService->deleteUser($userId);
  if (true) {
    echo "success";
  } else {
    echo "fail";
  }
}