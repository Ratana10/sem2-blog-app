<?php
include "../../service/userService.php";

$userService = new UserService();

$userService->login("ratana", "12345");

echo "Success";
