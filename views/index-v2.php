<?php
// Start the session if it hasn't been started yet
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['userId']) && !isset($_SESSION['username'])) {
  header('location: ./login.php');
}
?>

<!-- header -->
<?php include('./include/header.php') ?>

<!-- navbar -->
<?php include('./include/navbar.php') ?>

<?php include('../service/postService.php');

$postService = new PostService();
$posts=$postService->getAllPosts();

?>



<!-- Contain -->
<!-- Card Section -->
<div class="container">

<?php
foreach ($posts as $post) {
?>


  <div class="wrapper d-flex justify-content-center">
    <div class="card mb-3">
      <img class="img-fluid" src="../source/images/posts/<?php echo $post->getImage(); ?>" style="width: 56rem" class="card-img-top" alt="..." />
      <div class="card-body">
        <div class="mb-2">
          <div class="row">
            <div class="col-8 d-flex align-items-center justify-content-start g-2">
              <div class="mx-1">
                <img src="../source/images/users/under.jpeg" class="img-fluid profile" alt="..." />
              </div>
              <div class="user-acc mx-1">
                <h5 class="card-title">N1T</h5>
              </div>
            </div>
            <div class="col-4 d-flex align-items-center justify-content-end">
              <div class="icon d-flex gap-2"  >
                <span class="pe-2"> <?php echo $post->getLiked(); ?> </span>
                <span class="like-button" id="likeButton"><i class="fa-solid fa-heart"></i></span>

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
    ?>
</div>

<script>
  // Get the like button element
  const likeButton = document.getElementById('likeButton');

  // Add a click event listener to the like button
  likeButton.addEventListener('click', function() {
    // Call your like function here
    likeFunction();
  });

  // Example like function
  function likeFunction() {
    // This is just an example, you can replace this with your actual like logic
    <?php
      echo $post->getDescription();
    ?>
  }
</script>

<!-- footer -->
<?php include('./include/footer.php') ?>