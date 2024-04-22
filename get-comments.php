
<?php
include_once "config/check-session.php";
include_once "service/commentService.php";

$postId = $_GET['postId'];

$commentService = new CommentService();

$comment = $commentService->getComments($postId);

$commentJson = json_encode($comment);

echo $commentJson;