<?php

include_once __DIR__ . "/../config/conn.php";
include_once __DIR__ . "/../entity/like.php";

class likeService
{

  private $conn;

  public function __construct()
  {
    global $conn;
    $this->conn = $conn;
  }

  public function createLike($like)
  {

    $sql = " INSERT INTO tbLikes(postId, userId) VALUES (
      '" . $like->getPostId() . "',
      '" . $like->getUserId() . "'
    )";

    if (!$this->conn->query($sql)) {
      // fail insertion
      return false;
    }

    return $this->conn->insert_id;
  }

  public function countLike($likeId)
  {

    $sql = "SELECT COUNT(*) AS like_count FROM tbLikes WHERE postId = $likeId";

    $result = $this->conn->query($sql);

    if ($result->num_rows === 1) {
      $row = $result->fetch_assoc();
      return $row['like_count'];
    } else {
      return 0;
    }
  }
}
