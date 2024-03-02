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

echo "
  <script>
    console.log('Connected successfully');
  </script>
";

$sql = "SHOW DATABASES LIKE '$database'";

if($conn->query($sql)->num_rows == 0){
  echo "<script>
    console.log('no database');
  </script>";

  //creating databse and table file
  require("initalize-database.php");
}else{
  echo "<script>
  console.log('already have database');
</script>";
}

// // select databse
$conn->select_db($database);

