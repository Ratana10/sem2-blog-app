<?php
class Post{
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
}