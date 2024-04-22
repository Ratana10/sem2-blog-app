<?php


include_once "commentService.php";

$commentService = new CommentService();

$comment = new Comment(null, 1, 3, "Pretty Good");

// $result = $commentService->createComment($comment);

$totalComment = $commentService->countComments(2);
echo $totalComment;
