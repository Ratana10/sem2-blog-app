create database db_book

create table tb_books(
 id int(6) AUTO_INCREMENT PRIMARY KEY,
  name NVARCHAR(50) NOT NULL,
  email NVARCHAR(50) NOT NULL,
  phone NVARCHAR(50) NOT NULL,
  address NVARCHAR(50) NOT NULL,
  location NVARCHAR(50) NOT NULL,
  people NVARCHAR(50) NOT NULL,
  arrival TIMESTAMP NULL DEFAULT NULL,
  leaving TIMESTAMP NULL DEFAULT NULL,
)

$sql = "CREATE TABLE IF NOT EXISTS tbLikes(
  id int(6) AUTO_INCREMENT PRIMARY KEY,
  postId INT(6) NOT NULL,
  userId INT(6) NOT NULL,
  createdAt TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  updatedAt TIMESTAMP NULL DEFAULT NULL,
  FOREIGN KEY (postId) REFERENCES tbPosts(id) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (userId) REFERENCES tbUsers(id) ON UPDATE CASCADE ON DELETE CASCADE
);";