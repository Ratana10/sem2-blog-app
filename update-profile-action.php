<?php include_once "config/check-session.php"; ?>

<?php

include_once "service/userService.php";

if (isset($_POST['btnUpdate'])) {
  $userId = $_POST['userId'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $image = $_FILES['profileImage']['name'];


  $userService = new UserService();

  $user = $userService->getUserById($userId);

  $usernameError;
  $emailError;

  if ($username != $user->getUsername()) {

    $usernameExist = $userService->checkUsername($username);

    if ($usernameExist) {
      $usernameError = "username already exist";
    } else {
      $userService->updateUsername($userId, $username);
      $_SESSION['username'] = $username;
    }
  }


  if ($email != $user->getEmail()) {

    $emailExist = $userService->checkEmail($email);

    if ($emailExist) {
      $emailError = "email already exist";
    } else {
      $userService->updateEmail($userId, $email);
    }
  }


  $valid = array(
    "usernameError" => $usernameError,
    "emailError" => $emailError,
  );

  empty($image) ? $image = 'default.png' : $image;

  // check if client upload image 
  if (!empty($image)) {
    $uploadDir = "source/images/users/";


    // Remove previouse image

    if($user->getImage()){
      unlink($uploadDir . $user->getImage());
    }

    move_uploaded_file($_FILES['profileImage']['tmp_name'], $uploadDir . $_FILES['profileImage']['name']);

    $userService->updateImage($userId, $image);

    $_SESSION['image'] = $image;
  }

  header("Location: index.php?" . $valid);

}
