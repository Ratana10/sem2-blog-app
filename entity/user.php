<?php

class User
{
  private $id;
  private $username;
  private $email;
  private $password;
  private $image;
  private $role;
  private $createdAt;
  private $updatedAt;

  public function __construct($id="", $username="", $email="", $password="", $image="", $role="", $createdAt="", $updatedAt="")
  {
    $this->setId($id);
    $this->setUsername($username);
    $this->setEmail($email);
    $this->setPassword($password);
    $this->setImage($image);
    $this->setRole($role);
    $this->setCreatedAt($createdAt);
    $this->setUpdatedAt($updatedAt);
  }

  public function setId($param)
  {
    $this->id = $param;
  }
  public function setUsername($param)
  {
    $this->username = $param;
  }
  public function setEmail($param)
  {
    $this->email = $param;
  }
  public function setPassword($param)
  {
    $this->password = $param;
  }
  public function setImage($param)
  {
    $this->image = $param;
  }
  public function setRole($param)
  {
    $this->role = $param;
  }
  public function setCreatedAt($param)
  {
    $this->createdAt = $param;
  }
  public function setUpdatedAt($param)
  {
    $this->updatedAt = $param;
  }

  public function getId()
  {
    return $this->id;
  }
  public function getUsername()
  {
    return $this->username;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function getPassword()
  {
    return $this->password;
  }
  public function getImage()
  {
    return $this->image;
  }
  public function getRole()
  {
    return $this->role;
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
