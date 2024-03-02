<?php
include "config/conn.php";

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
      echo "
        <script>
          console.log('error insertion user');
        </script>
      ";
      return false;
    }

    // get user

  }

  public function getUserById($userId)
  {
    $sql = "SELECT * FROM tbUsers WHERE id = $userId";
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row;
    }
  }
}
