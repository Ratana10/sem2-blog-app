<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');

?>

<?php

include_once "../service/userService.php";

$userService = new UserService();

$totalUser = $userService->countUser();

$totalAdmin = $userService->countUser("admin");
?>

<?php

include_once "../service/postService.php";

$postService = new PostService();

$totalPost = $postService->countPost();

$totalUnpublished = $postService->countPost(0);


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $totalAdmin ?></h3>

              <p>Admin</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-user-tie"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo $totalUser ?></h3>
              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-user"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3><?php echo $totalPost ?></h3>

              <p>Total Published Post</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-tags"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-secondary">
            <div class="inner">
              <h3><?php echo $totalUnpublished ?></h3>

              <p>Total UnPublished Post</p>
            </div>
            <div class="icon">
              <i class="fa-regular fa-eye-slash"></i>
            </div>
          </div>
        </div>


      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<?php
include('includes/footer.php');

?>