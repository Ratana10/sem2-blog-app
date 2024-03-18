<?php
include "../../config/conn.php";
include "../../config/util.php";
include "../../entity/user.php";

class UserService
{
  private $conn;

  public function __construct()
  {
    global $conn;
    $this->conn = $conn;
  }
  public function login($username, $password)
  {
    $sql = "SELECT * FROM tbUsers WHERE username= '" . $username . "'";
    $result = $this->conn->query($sql);
    if($result->num_rows === 0){
      return false;
    }

    $user = $this->fetchToUser($result);

    if($password === $user->getPassword()){
      return $user;
    }
    else{
      echo "incorrect";
      return false;
    }
  }
  public function register($user)
  {
    //$hashPassword = Util::encryptPassword($user->getPassword());

    $sql = " INSERT INTO tbUsers(username, email, password, image, role) VALUES (
      '" . $user->getUsername() . "',
      '" . $user->getEmail() . "',
      '" . $user->getPassword() . "',
      '" . $user->getImage() . "',
      '" . $user->getRole() . "'
    )";


    if (!$this->conn->query($sql)) {
      // fail insertion
      return false;
    }
    // sccess insertion
    return $this->conn->insert_id;
  }

  public function updateUser($user){
    $sql = " UPDATE tbUsers SET 
      username = '" . $user->getUsername() . "',
      email    = '" . $user->getEmail() . "',
      image    = '" . $user->getImage() . "',
      WHERE id = " . $user->getId();

    if (!$this->conn->query($sql)) {
      return false;
    }
    return true;
  }

  public function getAllUsers()
  {
    // $user = new User();
    // $sql = "SELECT * FROM tbUsers";
    // $result = $this->conn->query($sql);
    // if ($result->num_rows > 0) {
      
    // }
    // return null;
  }
  public function getUserById($userId)
  {
    $sql = "SELECT id, username, email, password, image, 
          role, createdAt, updatedAt FROM tbUsers WHERE id='$userId'";

    $result = $this->conn->query($sql);
    if ($result->num_rows <= 0) {
      return null;
    }

    $row = $result->fetch_assoc();
    $user = new User(
      $row['id'],
      $row['username'],
      $row['email'],
      $row['password'],
      $row['image'],
      $row['role'],
      $row['createdAt'],
      $row['updatedAt']
    );
    return $user;
  }
  private function fetchToUser($result){
    $row = $result->fetch_assoc();
    $user = new User(
      $row['id'],
      $row['username'],
      $row['email'],
      $row['password'],
      $row['image'],
      $row['role'],
      $row['createdAt'],
      $row['updatedAt']
    );
    return $user;
  }
}

?>
