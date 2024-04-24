<?php
include_once "like.php";
include_once "user.php";
include_once "post.php";

class Like
{
  private $id;
  private $userId;
  private $postId;
  private $createdAt;
  private $updatedAt;
  private $user;
  private $post;

  public function __construct($id = "", $userId = "", $postId = "", $createdAt = "", $updatedAt = "")
  {
    $this->setId($id);
    $this->setUserId($userId);
    $this->setPostId($postId);
    $this->setCreatedAt($createdAt);
    $this->setUpdatedAt($updatedAt);
    $this->setUser();
    $this->setPost();
  }
  public function setId($param)
  {
    $this->id = $param;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setUserId($param)
  {
    $this->userId = $param;
  }
  public function getUserId()
  {
    return $this->userId;
  }
  public function setPostId($param)
  {
    $this->postId = $param;
  }
  public function getPostId()
  {
    return $this->postId;
  }
  public function setCreatedAt($param)
  {
    $this->createdAt = $param;
  }
  public function getCreatedAt()
  {
    return $this->createdAt;
  }
  public function setUpdatedAt($param)
  {
    $this->updatedAt = $param;
  }
  public function getUpdatedAt()
  {
    return $this->updatedAt;
  }
  public function setUser()
  {
    $this->user = new User();
  }
  public function getUser()
  {
    return $this->user;
  }
  public function setPost()
  {
    $this->post = new Post();
  }
  public function getPost()
  {
    return $this->post;
  }
}
