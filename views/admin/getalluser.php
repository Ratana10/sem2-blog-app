<?php
include "../../service/userService.php";

$userService = new UserService();

$users = $userService->getAllUsers('admin');
foreach ($users as $user) {
  # code...
  echo $user . "<br>\n";
}
// die($users);
