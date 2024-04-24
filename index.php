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

<?php
include('service/commentService.php');

$commentService = new CommentService();

?>
<!-- Contain -->
<!-- Card Section -->
<div class="container" style="margin-top: 100px;">

  <?php
  if (!$posts) {
    echo '<p>No data found</p>';
  } else {
    foreach ($posts as $post) {

      $totalComments = $commentService->countComments($post->getId());
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

                    <span class="pe-2 comment-count" data-post-id="<?php echo $post->getId(); ?>"> <?php echo $totalComments; ?>
                    </span>
                    <span id="comment-icon-<?php echo $post->getId(); ?>" class="comment-icon view-comments" data-post-id="<?php echo $post->getId(); ?>">
                      <i class="fa-regular fa-comment"></i>
                    </span>
                    <div class="dropdown">
                      <span class="ms-3 " data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                      </span>

                      <ul class="dropdown-menu ">
                        <li>
                          <a class="dropdown-item edit-post" data-post-id="<?php echo $post->getId(); ?>">
                            <i class="fa-solid fa-pen me-3" style="color: blue;"></i>Edit
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="#"><i class="fa-solid fa-trash me-3" style="color: red;"></i>Delete</a>
                        </li>
                      </ul>
                    </div>
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
                <input type="text" class="form-control " placeholder="comment" />
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

  <?php require "updateProfileModal.php" ?>
  <?php require "commentModal.php" ?>


</div>



<!-- footer -->
<?php include('include/footer.php') ?>