<?php
class Post
{
  private $id;
  private $userId;
  private $title;
  private $description;
  private $image;
  private $slug;
  private $commentId;
  private $published;
  private $createdAt;
  private $updatedAt;
  private $liked;

  public function __construct($id = "", $userId = "", $title = "", $description = "", $image = "", $liked = 0)
  {
    $this->setId($id);
    $this->setUserId($userId);
    $this->setTitle($title);
    $this->setDescription($description);
    $this->setImage($image);
    $this->setLiked($liked);
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
  public function setPublished($param)
  {
    $this->published = $param;
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
  public function getPublished()
  {
    return $this->published;
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
}
