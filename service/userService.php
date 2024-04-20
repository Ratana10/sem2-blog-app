<?php
include __DIR__ . "/../config/conn.php";
include __DIR__ . "/../entity/user.php";

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

    $row = $result->fetch_assoc();
    $user = $this->fetchToUser($row);

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


    if (!$this->conn->query($sql)) {
      // fail insertion
      return false;
    }
    // sccess insertion
    return $this->conn->insert_id;
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

  public function getAllUsers($role = "user")
  {
    // $user = new User();
    $sql = "SELECT id, username, email, password, image, role, createdAt, updatedAt
    FROM tbUsers WHERE role='$role' ";

    $users = array();

    $result = $this->conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $user = $this->fetchToUser($row);

        $users[] = $user;
      }
    }
    return $users;
  }

  public function countUser($role = "user")
  {
    // $user = new User();
    $sql = "SELECT 
    FROM tbUsers WHERE role='$role' ";
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
    $user = $this->fetchToUser($row);
    return $user;
  }

  public function checkEmail($email)
  {
    $sql = "SELECT COUNT(*) as count FROM tbUsers WHERE email= '$email'";
    $result = $this->conn->query($sql);

    if (!$result) {
      return false;
    }

    $row = $result->fetch_assoc();
    if ($row['count'] > 0) {
      return true;
    }

    return false;
  }

  public function checkUsername($username)
  {
    $sql = "SELECT COUNT(*) as count FROM tbUsers WHERE username= '$username'";
    $result = $this->conn->query($sql);

    if (!$result) {
      return false;
    }

    $row = $result->fetch_assoc();
    if ($row['count'] > 0) {
      return true;
    }

    return false;
  }

  private function fetchToUser($row)
  {

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
