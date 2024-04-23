
<?php
include_once "config/check-session.php";
include_once "service/commentService.php";

$postId = $_GET['postId'];
// $postId = $_POST['postId'];

$commentService = new CommentService();

$comments = $commentService->getComments($postId);

$commentJson = array();

foreach ($comments as $comment) {
  $commentJson[] = array(
    "id" => $comment->getId(),
    "content" => $comment->getContent(),
    "username" => $comment->getUser()->getUsername(),
    "image" => $comment->getUser()->getImage(),
  );
}

echo json_encode($commentJson);
