<?php
include_once "user.php";

class Post
{
  private $id;
  private $userId;
  private $title;
  private $description;
  private $image;
  private $slug;
  private $commentId;
  private $public;
  private $createdAt;
  private $updatedAt;
  private $liked;
  private $user;

  public function __construct($id = "", $userId = "", $title = "", $description = "", $image = "", $liked = 0, $public=1)
  {
    $this->setId($id);
    $this->setUserId($userId);
    $this->setTitle($title);
    $this->setDescription($description);
    $this->setImage($image);
    $this->setLiked($liked);
    $this->setPublic($public);
    $this->setUser();
  }

  public function setId($param)
  {
    $this->id = $param;
  }
  public function setUserId($param)
  {
    $this->userId = $param;
  }
  public function setTitle($param)
  {
    $this->title = $param;
  }
  public function setDescription($param)
  {
    $this->description = $param;
  }
  public function setImage($param)
  {
    $this->image = $param;
  }
  public function setSlug($param)
  {
    $this->slug = $param;
  }
  public function setCommentId($param)
  {
    $this->commentId = $param;
  }
  public function setPublic($param)
  {
    $this->public = $param;
  }
  public function setCreatedAt($param)
  {
    $this->createdAt = $param;
  }
  public function setUpdatedAt($param)
  {
    $this->updatedAt = $param;
  }
  public function setLiked($param)
  {
    $this->liked = $param;
  }
  // getter
  public function getId()
  {
    return $this->id;
  }
  public function getUserId()
  {
    return $this->userId;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function getImage()
  {
    return $this->image;
  }
  public function getSlug()
  {
    return $this->slug;
  }
  public function getCommentId()
  {
    return $this->commentId;
  }
  public function getPublic()
  {
    return $this->public;
  }
  public function getCreatedAt()
  {
    return $this->createdAt;
  }
  public function getUpdatedAt()
  {
    return $this->updatedAt;
  }
  public function getLiked()
  {
    return $this->liked;
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
