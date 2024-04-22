<?php
include_once "config/check-session.php";
include_once "service/commentService.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $postId = $_POST['postId'];
  $content = $_POST['content'];

  $userId = $_SESSION['userId'];

  $comment = new Comment(null, $userId, $postId, $content);

  $commentService = new CommentService();

  $result = $commentService->createComment($comment);
 
  if($result){
    echo "commented";
  }
}
