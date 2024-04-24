<?php require('config/check-session.php') ?>

<!-- header -->
<?php include('include/header.php') ?>

<!-- navbar -->
<?php include('include/navbar.php') ?>

<?php
include('service/postService.php');

$userId = $_SESSION["userId"];

$username = $_SESSION["username"];

$profile = $_SESSION["image"];

$postService = new PostService();

$posts = $postService->getmyPosts($userId);


?>

<!-- Contain -->
<!-- Card Section -->
<style>
  .container1 {
    border-radius: 10px;
    border-color: #ccc;
    max-width: 100%;
    margin: 0 auto;
    border: 1px solid rgb(192, 188, 188);

  }

  .profile-pic {
    display: flex;
    justify-content: center;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    overflow: hidden;
    margin: 55px auto 30px;
    margin-top: 100px;
    border: 3px solid rgb(220, 219, 219);
  }

  .user-details {
    text-align: center;
    margin-top: 20px;
  }

  .container {
    margin-top: auto;
  }

  .Hr-line {
    border: 3px solid rgb(220, 219, 219);
    margin: 35px auto 20px;
  }

  .tabs {
    display: flex;
    justify-content: space-around;
    margin-top: auto;

  }

  .tab {
    background-color: #f9f9f9;
    border: none;
    border-radius: 10%;
    padding: 5px 20px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-bottom: 10px;
  }
</style>


<div class="container1">
  <div class="profile-pic">
    <img src="source/images/users/<?php echo $profile ?>" alt="Profile-picture" style="object-fit: cover;">
    <!-- Profile picture image -->

  </div>
  <div class="user-details">
    <h1 class="user-name"><?php echo $username ?></h1>
    <!-- Other user details like location, work, education, etc. -->
    <div>
      <button class="btn btn-primary me-1">
        Add post
      </button>
      <button class="btn btn-primary ms-1">
        Update Profile
      </button>
    </div>
  </div>
  <hr class="Hr-line">
  <div class="tabs">
    <button class="tab">My Posts</button>
  </div>
  <div class="container">
    <?php
    if (!$posts) {
      echo '<p>No data found</p>';
    } else {
      foreach ($posts as $post) {

    ?>
        <div class="wrapper d-flex justify-content-center">
          <div class="card mb-3">
            <img class="img-fluid" src="source/images/posts/<?php echo $post->getImage(); ?>" style="width: 56rem" class="card-img-top" alt="..." />
            <div class="card-body">
              <div class="mb-2">
                <div class="row">
                  <div class="col-8 d-flex align-items-center justify-content-start g-2 ">
                    <div class="mx-1">
                      <img src="source/images/users/<?php echo $post->getUser()->getImage(); ?>" class="img-fluid profile" alt="profile" />
                    </div>
                    <div class="user-acc mx-1">
                      <h5 class="card-title profile-name"><?php echo $post->getUser()->getUsername(); ?></h5>
                    </div>
                  </div>
                  <div class="col-4 d-flex align-items-center justify-content-end">
                    <div class="icon d-flex gap-2">
                      <span class="pe-2"> <?php echo $post->getLiked(); ?> </span>
                      <span><i class="fa-solid fa-heart"></i></span>
                      <span class="pe-2">1</span>
                      <span><i class="fa-regular fa-comment"></i></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="content mb-4">
                <p class="card-text">
                  <?php
                  echo $post->getDescription();
                  ?>
                </p>
              </div>
              <div class="cmt">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="comment" aria-label="Recipient's username" aria-describedby="button-addon2" />
                  <button class="btn btn-info" type="button" id="button-addon2">
                    <i class="fa-solid fa-paper-plane fa-lg" style="color: #ffffff"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
    <?php
      }
    }
    ?>

    <?php include('include/footer.php') ?>