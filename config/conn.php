<?php

$servername = "localhost";
$database = "blogapp";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SHOW DATABASES LIKE '$database'";

if($conn->query($sql)->num_rows == 0){

  //creating databse and table file
  require("initalize-database.php");
}else{

}

// // select databse
$conn->select_db($database);

