<?php
class Util
{
  public static function createSession($userId, $username)
  {
    $_SESSION['userId'] = $userId;
    $_SESSION['username'] = $username;
  }

  public static function encryptPassword($password)
  {
    return password_hash($password, PASSWORD_DEFAULT);
  }

  public static function verifyPassword($password, $hashPassword)
  {
    return password_verify($password, $hashPassword);
  }
}

?>
