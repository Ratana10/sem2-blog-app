<?php

include "../service/postService.php";
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}



if (isset($_POST["postBtn"])) {
  $userId = $_SESSION['userId'];
  echo ("user id " . $userId);
  $description = $_POST['description'];

  $postService = new PostService();
  $image = $_FILES['image']['name'];

  // check if client upload image 
  if (!empty($image)) {
    $image = $_FILES['image']['name'];

    $uploadDir = "../source/images/posts/";
    move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $_FILES['image']['name']);
  }

  echo ("Image name : " . $image);
  $post = new Post(null, @$userId, null, $description, $image);
  $postService->createPost($post);

  echo "Success";
  header("Location: ../views/#");
}
