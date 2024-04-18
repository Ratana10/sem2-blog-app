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
    if ($result->num_rows === 0) {
      return false;
    }

    $user = $this->fetchToUser($result);

    if (password_verify($password, $user->getPassword())) {
      return $user;
    } else {
      return false;
    }
  }
  public function register($user)
  {
    $hashPassword = password_hash($user->getPassword(), PASSWORD_DEFAULT);
    $sql = " INSERT INTO tbUsers(username, email, password, image, role) VALUES (
      '" . $user->getUsername() . "',
      '" . $user->getEmail() . "',
      '" . $hashPassword . "',
      '" . $user->getImage() . "',
      '" . $user->getRole() . "'
    )";


    try {
      if ($this->conn->query($sql)) {
          // Successful insertion
          return $this->conn->insert_id;
      } else {
          // Failed insertion
          // You can log the error if needed
          // error_log($this->conn->error);
          return false;
      }
  } catch (mysqli_sql_exception $e) {
      // Handle the SQL exception
      return $e->getMessage();
  }
  }

  public function updateUser($user)
  {
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
  private function fetchToUser($result)
  {
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
