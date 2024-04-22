<?php
include __DIR__ . "/../config/conn.php";
include __DIR__ . "/../entity/comment.php";

class CommentService
{
  private $conn;

  public function __construct()
  {
    global $conn;
    $this->conn = $conn;
  }

  public function createComment($comment)
  {
    $sql = " INSERT INTO tbComments(postId, userId, content) VALUES (
      '" . $comment->getPostId() . "',
      '" . $comment->getUserId() . "',
      '" . $comment->getContent() . "'
    )";

    if (!$this->conn->query($sql)) {
      // fail insertion
      return false;
    }

    return $this->conn->insert_id;
  }
}
