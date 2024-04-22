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

  public function countComments($postId)
  {
    $sql = "SELECT COUNT(*) AS comment_count FROM tbComments WHERE postId = $postId";

    $result = $this->conn->query($sql);

    if ($result->num_rows === 1) {
      $row = $result->fetch_assoc();
      return $row['comment_count'];
    } else {
      return 0;
    }
  }

  public function getComments($postId)
  {
    $sql = "SELECT c.id, c.userId, c.postId, c.content, c.createdAt, c.updatedAt,  
            u.id , u.username, u.image
            FROM tbComments c
            INNER JOIN tbUsers u
            ON c.userId = u.id
            WHERE postId = $postId";

    $result = $this->conn->query($sql);

    if ($result->num_rows === 0) {
      return false;
    }

    $comments = array();

    while ($row = $result->fetch_assoc()) {
      $comment = $this->fetchToComment($row);
      $comments[] = $comment;
    }

    return $comments;
  }

  private function fetchToComment($row)
  {
    $comment = new Comment(
      $row['id'],
      $row['userId'],
      $row['postId'],
      $row['content'],
      $row['createdAt'],
      $row['updatedAt'],
    );
    $comment->getUser()->setUsername($row['username']);
    $comment->getUser()->setImage($row['image']);
    return $comment;
  }
}
