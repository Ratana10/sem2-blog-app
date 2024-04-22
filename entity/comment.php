<?php
include_once "user.php";

class Comment
{
  private $id;
  private $userId;
  private $postId;
  private $content;
  private $createdAt;
  private $updatedAt;
  private $user;

  public function __construct($id = "", $userId = "", $postId = "", $content = "", $createdAt = "", $updatedAt = "")
  {
    $this->setId($id);
    $this->setUserId($userId);
    $this->setPostId($postId);
    $this->setContent($content);
    $this->setCreatedAt($createdAt);
    $this->setUpdatedAt($updatedAt);
    $this->setUser();
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
  public function setContent($param)
  {
    $this->content = $param;
  }
  public function getContent()
  {
    return $this->content;
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
}
