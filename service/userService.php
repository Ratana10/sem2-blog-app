<?php
include "../../config/conn.php";

class UserService
{
  private $conn;

  public function __construct()
  {
    global $conn;
    $this->conn = $conn;
  }
  public function login()
  {
  }
  public function register($user)
  {
    $sql = " INSERT INTO tbUsers(username, email, password, image, role) VALUES (
      '" . $user->getUsername() . "',
      '" . $user->getEmail() . "',
      '" . $user->getPassword() . "',
      '" . $user->getImage() . "',
      '" . $user->getRole() . "'
    )";


    if (!$this->conn->query($sql)) {
      // fail insertion
      echo "
        <script>
          console.log('error insertion user');
        </script>
      ";
      return false;
    }
    // sccess insertion
    return $this->conn->insert_id;
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
}
