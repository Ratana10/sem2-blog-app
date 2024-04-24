<?php require_once "config/check-session.php"; ?>

<?php

include_once "service/postService.php";

if (isset($_POST['btnUpdatePost'])) {
  $postId = $_POST["postId"];
  $description = $_POST["description"];
  $public = $_POST["public"];
  $image = $_FILES['image']['name'];

  $postService = new PostService();

  $post = $postService->getPostById($postId);


  $post->setDescription($description);
  $post->setPublic($public);

  if (!empty($image)) {
    $image = $_FILES['image']['name'];

    $uploadDir = "source/images/posts/";
    move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $_FILES['image']['name']);

    unlink($uploadDir . $post->getImage());

    $post->setImage($image);
  }

 

  $result = $postService->updatePost($post);


  header("Location: index.php");
}

?>