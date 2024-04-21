<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Blog</a>
                    </li>
                </ul>
                <div class="d-flex gap-3 align-items-center">
                    <span>User</span>
                    <button href="./LoginPage.html" class="btn btn-danger" type="submit">
                        Logout
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="wrapper d-flex justify-content-center">
            <div class="card mb-3">
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
                $sql = "SELECT  ts.username , tp.image , tp.liked , tp.commentId , tp.description
                        FROM tbposts tp 
                        INNER JOIN tbusers ts ON tp.userid = ts.id 
                        WHERE ts.id = 5";

                // Execute query
                $result = $conn->query($sql);

                // Check if any rows are returned
                if ($result->num_rows > 0) {
                    
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        //image
                        echo '<img class="img-fluid" src="../source/images/posts/Rectangle2_3.png' . $row["image"] . '" style="width: 56rem" class="card-img-top" alt="..." />';
                        echo '<div class="card-body">';
                        echo '<div class="mb-2">';
                        echo '<div class="row">';
                        echo '<div class="col-8 d-flex align-items-center justify-content-start g-2">';
                        echo '<div class="mx-1">';
                        echo '<img style="border: 1px solid rgb(255, 255, 255); 
                                position: relative; 
                                display: block; 
                                margin-left: auto; 
                                margin-right: auto; 

                                z-index: 1;  
                                width: 60px;
                                height: 60px;
                                border-radius: 50%; " src="../source/images/users/hero.png'  . $row["image"] . '" class="img-fluid" alt="..." />';
                       //username
                                echo '</div>';
                        echo '<div class="user-acc mx-1">';
                        echo '<h5 class="card-title">'  . $row["username"] . '</h5>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="col-4 d-flex align-items-center justify-content-end">';
                        echo '<div class="icon d-flex gap-2">';
                        // Liked
                        echo '<span class="pe-2">  </span>'.$row["liked"]  ;
                        echo '<span><i class="fa-regular fa-heart fa-lg pe-1"></i></span>'   ;
                        //comment
                        echo '<span class="pe-2"></span>' .$row["commentId"] ;
                        echo '<span><i class="fa-regular fa-comment fa-lg"></i></span>';

                        echo '<span class="ps-2"><i class="fa-regular fa-share-from-square fa-lg"></i></span>' ;
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="content mb-4">';
                        //description
                        echo '<p class="card-text">' . $row["description"] . '</p>';
                        echo '</div>';
                        echo '<div class="cmt">';
                        echo '<div class="input-group mb-3">';
                        echo '<input type="text" class="form-control" placeholder="comment" aria-label="Recipient\'s username" aria-describedby="button-addon2" />';
                        echo '<button class="btn btn-info" type="button" id="button-addon2">';
                        echo '<i class="fa-solid fa-paper-plane fa-lg" style="color: #ffffff"></i>';
                        echo '</button>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "0 results";
                }

                // Close connection
                $conn->close();
                ?>
            </div>
        </div>
    </div>

</body>

</html>
