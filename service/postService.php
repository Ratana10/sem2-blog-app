<?php
include_once __DIR__ . "/../config/conn.php";
include_once __DIR__ . "/../entity/post.php";

class PostService
{
  private $conn;

  public function __construct()
  {
    global $conn;
    $this->conn = $conn;
  }

  /*
    INSERT INTO `tbPosts` (`id`, `userId`, `title`, `description`, `image`, `liked`, `commentId`, `published`, `createdAt`, `updatedAt`) 
    VALUES (NULL, '1', '11111', '11111111', NULL, '0', NULL, '0', current_timestamp(), NULL);
    */
  public function createPost($post)
  {
    $sql = " INSERT INTO tbPosts(userId, title, description, image, liked, public) VALUES (
      '" . $post->getUserId() . "',
      '" . $post->getTitle() . "',
      '" . $post->getDescription() . "',
      '" . $post->getImage() . "',
      '" . $post->getLiked() . "',
      '" . $post->getPublic() . "'
    )";

    if (!$this->conn->query($sql)) {
      // fail insertion
      return false;
    }

    return $this->conn->insert_id;
  }

  public function updatePost($post)
  {
    $sql = " UPDATE tbPosts SET
    title = '" . $post->getTitle() . "',
    description = '" . $post->getDescription() . "',
    image = '" . $post->getImage() . "'
    WHERE id=" . $post->getId();

    if (!$this->conn->query($sql)) {
      // fail insertion
      return false;
    }

    return true;
  }
  public function getAllPostsV1()
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
  // Test get all post with user
  public function getAllPosts()
  {
    $sql = "SELECT p.id as postId, p.userId, p.title, p.description, p.image, p.liked, p.commentId, p.public, p.createdAt, p.updatedAt, 
            u.id, u.username, u.image as profile
            FROM tbPosts p INNER JOIN tbUsers u 
            ON p.userId = u.id
            ";

    $result = $this->conn->query($sql);
    if ($result->num_rows === 0) {
      return false;
    }

    $posts = array();

    while ($row = $result->fetch_assoc()) {
      $post = $this->fetchPostWithUser($row);
      $posts[] = $post; // Add the post to the array
    }

    return $posts;
  }

  public function deletePost($postId)
  {
    $sql = "DELETE FROM tbPosts WHERE id=$postId ";
    if (!$this->conn->query($sql)) {
      // fail insertion
      return false;
    }

    return true;
  }

  private function fetchPostWithUser($row)
  {
    $post = new Post(
      $row['postId'],
      $row['userId'],
      $row['title'],
      $row['description'],
      $row['image'],
      $row['liked'],
      $row['commentId'],
      $row['public'],
      $row['createdAt'],
      $row['updatedAt']
    );

    $post->getUser()->setUsername($row['username']);
    $post->getUser()->setImage($row['profile']);

    return $post;
  }
  public function likePost($postId)
  {
    $sql = "UPDATE tbPosts SET Liked = Liked + 1 WHERE id=$postId";
    if (!$this->conn->query($sql)) {
      return false;
    }
    return true;
  }

  public function countLike($postId)
  {
    $sql = "SELECT liked FROM tbPosts WHERE id=$postId";

    $result = $this->conn->query($sql);


    if ($result->num_rows <= 0) {
      return null;
    }

    $row = $result->fetch_assoc();
    $totalLike = $row['liked'];

    return $totalLike;
  }

  private function fetchToPost($row)
  {
    $post = new Post(
      $row['id'],
      $row['userId'],
      $row['title'],
      $row['description'],
      $row['image'],
      $row['liked'],
      $row['commentId'],
      $row['published'],
      $row['createdAt'],
      $row['updatedAt']
    );
    return $post;
  }

  public function countPost($published = 1)
  {

    $sql = "SELECT COUNT(*) AS post_count FROM tbPosts WHERE published=$published";

    $result = $this->conn->query($sql);

    if ($result->num_rows <= 0) {
      return null;
    }

    $row = $result->fetch_assoc();
    $totalPost = $row['post_count'];

    return $totalPost;
  }
}
