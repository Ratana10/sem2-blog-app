<?php
include_once "config/check-session.php";
include_once "service/postService.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $postId = $_POST['postId'];

  $postService = new PostService();

  $result = $postService->likePost($postId);

  if($result){

    $totalLike = $postService->countLike($postId);
    echo $totalLike;
  }
 
}
