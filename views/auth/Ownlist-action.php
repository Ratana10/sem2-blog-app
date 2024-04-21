<?php

// Database connection 
$servername = "localhost";
$database = "blogapp";
$username = "root";
$password = "";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query 
$sql = "SELECT tp.description, tp.image, tp.liked, tp.commentId, ts.username
        FROM tbposts tp 
        INNER JOIN tbusers ts ON tp.userid = ts.id 
        WHERE ts.id = 1";

// Execute query
$result = $conn->query($sql);

// Check if any rows are returned
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "UserName: " . $row["username"] . "<br>";
        echo "Post description: " . $row["description"] . "<br>";
        echo "Post image: " . $row["image"] . "<br>";
        echo "Post liked: " . $row["liked"] . "<br>";
        echo "Post comment: " . $row["commentId"] . "<br>";
    }

} else {
    echo "0 results";
}

// Close connection
$conn->close();

?>
