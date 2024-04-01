<?php
include "../config/conn.php";
include "../config/util.php";
include "../entity/post.php";

class PostService
{
  private $conn;

  public function __construct()
  {
    global $conn;
    $this->conn = $conn;
  }

  public function getAllPosts()
  {
    $sql = "SELECT * FROM tbPosts";

    $result = $this->conn->query($sql);
    if ($result->num_rows === 0) {
      return false;
    }

    $posts = array();

    while ($row = $result->fetch_assoc()) {
      $post = $this->fetchToPost($row);
      $posts[] = $post; // Add the post to the array
    }

    return $posts;
  }
  public function likePost($postId)
  {
    $sql = "UPDATE tbPosts SET Liked = Liked + 1 WHERE id=$postId";
    if(!$this->conn->query($sql)){
      return false;
    }
    return true;
  }
  private function fetchToPost($row)
  {
    $post = new Post(
      $row['id'],
      $row['userId'],
      $row['title'],
      $row['description'],
      $row['image'],
      $row['commentId'],
      $row['published'],
      $row['createdAt'],
      $row['updatedAt']
    );
    return $post;
  }
}
