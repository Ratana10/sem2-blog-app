<?php

class Comment{
  private $id;
  private $userId;
  private $description;
  
  public function __construct() {
    
  }
  public function setId($param){
    $this->id=$param;
  }
  public function setUserId($param){
    $this->userId=$param;
  }
  public function setDescription($param){
    $this->description=$param;
  }
  public function getId(){
    return $this->id;
  }
  public function getUserId(){
    return $this->userId;
  }
  public function getDescription(){
    return $this->description;
  }
}