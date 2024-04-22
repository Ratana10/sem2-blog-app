<?php require('config/check-session.php') ?>


<!-- header -->
<?php include('include/header.php') ?>

<!-- navbar -->
<?php include('include/navbar.php') ?>


<?php
include('service/postService.php');

$postService = new PostService();

$posts = $postService->getAllPosts();

?>
<!-- Contain -->
<!-- Card Section -->
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
                    <span class="pe-2 liked-count"> <?php echo $post->getLiked(); ?> </span>
                    <span id="like-icon-<?php echo $post->getId(); ?>" class="like-icon" data-post-id="<?php echo $post->getId(); ?>">
                      <i class="fa-solid fa-heart"></i>
                    </span>
                    <span class="pe-2 comment-count">2</span>
                    <span id="comment-icon-<?php echo $post->getId(); ?>" class="comment-icon" data-post-id="<?php echo $post->getId(); ?>">
                    <i class="fa-regular fa-comment"></i>
                    </span>
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
                <input type="text" class="form-control" placeholder="comment" />
                <button class="btn btn-info btn-comment" type="button" data-post-id="<?php echo $post->getId(); ?>">
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

  <?php
  include('service/userService.php');

  $userId = $_SESSION['userId'];

  $userService = new UserService();

  $user = $userService->getUserById($userId);


  ?>

  <!-- Update Profile Modal -->
  <div class="modal fade " id="updateProfileModal" tabindex="-1" aria-labelledby="updateProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateProfileModalLabel">Profile</h5>
          <button type="button" class="btn-close btnCloseProfile" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="update-profile.php" method="post">
          <div class="modal-body">
            <div>
              <div class="d-flex justify-content-center mb-3">
                <input type="file" id="profileUpload" style="display: none;" accept="image/*" name="profileImage">
                <img src="./source/images/users/<?php echo $user->getImage() ?>" id="profilePreview" alt="default.png" style="width: 80px; height: 80px; border-radius: 100%;" onclick="document.getElementById('profileUpload').click()">
              </div>
              <div class="mb-3">
                <input type="text" hidden value="<?php echo $user->getId() ?>" name="userId">
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Username</label>
                <input type="text" class="form-control" value="<?php echo $user->getUsername() ?>" name="username">
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Email address</label>
                <input type="email" class="form-control" value="<?php echo $user->getEmail() ?>" name="email">
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Old Password</label>
                <input type="password" class="form-control" placeholder="oldPassword">
              </div>
              <div class="mb-3">
                <label for="" class="form-label">New Password</label>
                <input type="password" class="form-control" placeholder="user1" name="password">
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" placeholder="user1" name="password2">
              </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btnCloseProfile" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="btnUpdate">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- footer -->
<?php include('include/footer.php') ?>