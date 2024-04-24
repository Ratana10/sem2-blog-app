<?php require_once "config/check-session.php"; ?>

<?php

include_once "service/postService.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $postId = $_POST["postId"];

  $postService = new PostService();

  $result = $postService->deletePost($postId);

  if (true) {
    echo "success";
  }
}
?>