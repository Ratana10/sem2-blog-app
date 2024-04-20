<?php
// Start the session if it hasn't been started yet
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['userId']) && !isset($_SESSION['username'])) {
  header('location: login.php');
}

?>