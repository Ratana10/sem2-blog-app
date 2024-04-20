<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">User Data</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="card-body table-responsive p-0 table-striped " style="height: 600px;">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Role</th>
                    <th>CreatedAt</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include_once "../service/userService.php";
                  $userService = new UserService();

                  $users = $userService->getAllUsers();
                  ?>

                  <?php
                  foreach ($users as $index => $user) {

                  ?>
                    <tr>
                      <td><?php echo $index + 1 ?></td>
                      <td><?php echo $user->getUsername() ?></td>
                      <td><?php echo $user->getEmail() ?></td>
                      <td>
                        <img src="../source/images/<?php echo $user->getImage() ?>" alt="image" class="img-fluid " style="height: 50px; width: 100px; object-fit: contain;">
                      </td>
                      <td>
                        <span class="badge bg-success"><?php echo $user->getRole() ?></span>
                      </td>
                      <td><?php echo $user->getCreatedAt() ?></td>
                      <td>
                        <button class="btn btn-danger">
                          Delete
                        </button>
                      </td>
                    </tr>

                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">«</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
              </ul>
            </div>
          </div>

        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<?php
include('includes/footer.php');

?>