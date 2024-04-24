<?php
$database = "blogapp";
// create database
$sql = "CREATE DATABASE IF NOT EXISTS $database";

if ($conn->query($sql) === TRUE) {
  echo "
  <script>
    console.log('database created successfully');
  </script>
  ";
} else {
  echo "
  <script>
    console.log('error creating database . $conn->error  .');
  </script>
  ";
}

// select databse
$conn->select_db($database);

// create table users
$sql = "CREATE TABLE IF NOT EXISTS tbUsers(
  id int(6) AUTO_INCREMENT PRIMARY KEY,
  username NVARCHAR(50) NOT NULL UNIQUE,
  email NVARCHAR(50) NULL UNIQUE,
  password NVARCHAR(255) NOT NULL,
  image NVARCHAR(255) NOT NULL,
  role NVARCHAR(50) NOT NULL,
  createdAt TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  updatedAt TIMESTAMP NULL DEFAULT NULL
);";

if ($conn->query($sql) === TRUE) {
  echo "
    <script>
      console.log('table users created successfully');
    </script>
  ";
} else {
  echo "
  <script>
    console.log('error creating table users . $conn->error  .');
  </script>
  ";
}



// create table posts
$sql = "CREATE TABLE IF NOT EXISTS tbPosts(
  id int(6) AUTO_INCREMENT PRIMARY KEY,
  userId int(6) NOT NULL,
  title NVARCHAR(50) NOT NULL,
  description NVARCHAR(255) NULL,
  image NVARCHAR(255) NULL,
  liked INT(6) NOT NULL DEFAULT 0,
  public TINYINT NOT NULL DEFAULT 1,
  createdAt TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  updatedAt TIMESTAMP NULL DEFAULT NULL,
  CONSTRAINT FK_UserPost FOREIGN KEY (userId) REFERENCES tbUsers(id) 
  ON UPDATE CASCADE ON DELETE CASCADE
);";

// //-- Define created_at column with TIMESTAMP data type and default value

if ($conn->query($sql) === TRUE) {
  echo "
    <script>
      console.log('table posts created successfully');
    </script>
  ";
} else {
  echo "
  <script>
    console.log('error creating table posts . $conn->error  .');
  </script>
  ";
}

// create table comments
$sql = "CREATE TABLE IF NOT EXISTS tbComments(
  id int(6) AUTO_INCREMENT PRIMARY KEY,
  userId int(6) NOT NULL,
  postId int(6) NOT NULL,
  content NVARCHAR(255) NOT NULL,
  createdAt TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  updatedAt TIMESTAMP NULL DEFAULT NULL,
  CONSTRAINT FK_UserComment FOREIGN KEY (userId) REFERENCES tbUsers(id),
  CONSTRAINT FK_PostComment FOREIGN KEY (postId) REFERENCES tbPosts(id)
  ON UPDATE CASCADE ON DELETE CASCADE
);";

if ($conn->query($sql) === TRUE) {
  echo "
    <script>
      console.log('table comments created successfully');
    </script>
  ";
} else {
  echo "
  <script>
    console.log('error creating table comments . $conn->error  .');
  </script>
  ";
}

// create table Setting
$sql = "CREATE TABLE IF NOT EXISTS tbSettings(
  id int(6) AUTO_INCREMENT PRIMARY KEY,
  name NVARCHAR(50) NOT NULL,
  logo NVARCHAR(255) NULL,
  status TINYINT NOT NULL DEFAULT 0,
  createdAt TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  updatedAt TIMESTAMP NULL DEFAULT NULL
);";

// //-- Define created_at column with TIMESTAMP data type and default value

if ($conn->query($sql) === TRUE) {
  echo "
    <script>
      console.log('setting posts created successfully');
    </script>
  ";
} else {
  echo "
  <script>
    console.log('error creating setting  . $conn->error  .');
  </script>
  ";
}


// create table Likes
$sql = "CREATE TABLE IF NOT EXISTS tbLikes(
  id int(6) AUTO_INCREMENT PRIMARY KEY,
  postId INT(6) NOT NULL,
  userId INT(6) NOT NULL,
  createdAt TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  updatedAt TIMESTAMP NULL DEFAULT NULL,
  FOREIGN KEY (postId) REFERENCES tbPosts(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (userId) REFERENCES tbUsers(id) ON UPDATE CASCADE ON DELETE CASCADE
);";


// //-- Define created_at column with TIMESTAMP data type and default value

if ($conn->query($sql) === TRUE) {
  echo "
    <script>
      console.log('tblikes created successfully');
    </script>
  ";
} else {
  echo "
  <script>
    console.log('error creating like  . $conn->error  .');
  </script>
  ";
}