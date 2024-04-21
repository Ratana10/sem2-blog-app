<?php
class Setting
{
  private $id;
  private $name;
  private $logo;
  private $createdAt;
  private $updatedAt;

  public function __construct($id="", $name="", $logo="", $createdAt="", $updatedAt="")
  {
    $this->setId($id);
    $this->setName($name);
    $this->setLogo($logo);
    $this->setCreatedAt($createdAt);
    $this->setUpdatedAt($updatedAt);
  }

  public function setId($param)
  {
    $this->id = $param;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setName($param)
  {
    $this->name = $param;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setLogo($param)
  {
    $this->logo = $param;
  }

  public function getLogo()
  {
    return $this->logo;
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
}
