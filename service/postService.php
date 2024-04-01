<?php
include "../../config/conn.php";
include "../../config/util.php";
include "../../entity/post.php";

class PostService
{
  private $conn;

  public function __construct()
  {
    global $conn;
    $this->conn = $conn;
  }
  
  public function getAllPosts(){
    $sql = "SELECT * FROM tbPosts";

    $result = $this->conn->query($sql);
    if ($result->num_rows === 0) {
      return false;
    }

    $post = $this->fetchToPost($result);

    echo $post;
    
  }
  private function likePost($postId)
  {
    $sql = "UPDATE tbPosts SET Liked = Liked + 1 WHERE id=$postId";
    
  }
  private function fetchToPost($result)
  {
    $row = $result->fetch_assoc();
    $post = new Post(
      $row['id'],
      $row['userId'],
      $row['title'],
      $row['description'],
      $row['image'],
      $row['slug'],
      $row['commentId'],
      $row['published'],
      $row['createdAt'],
      $row['updatedAt']
    );
    return $post;
  }
}
