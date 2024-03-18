<?php
include "../../service/userService.php";
// include "../../entity/user.php";

$userService = new UserService();

// $userService->login("ratana", "12345");

$newUser = new User(2, "ratana10", "ratanaupdated@gmail.com", 12345, "null");

$userService->updateUser($newUser);

echo "Success";

?>
