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
          <h1 class="m-0">Setting</h1>
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

            <div class="card-body table-responsive p-0 table-striped " style="height: 625px;">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>App Name</th>
                    <th>Logo</th>
                    <th>Status</th>
                    <th>CreatedAt</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include_once "../service/settingService.php";
                  $settingService = new SettingService();

                  $settings = $settingService->getAllSetting();
                  ?>

                  <?php
                  foreach ($settings as $index => $setting) {

                  ?>
                    <tr>
                      <td><?php echo $index + 1 ?></td>
                      <td><?php echo $setting->getName() ?></td>
                      <td>
                        <img src="../source/images/logo/<?php echo $setting->getLogo() ?>" alt="image" class="img-fluid " style="height: 40px; width: 40px; object-fit: contain;">
                      </td>
                      <td>
                        <span class="badge bg-success">
                          <?php echo $setting->getStatus() ? "true" : "false"; ?>
                        </span>
                      </td>
                      <td><?php echo $setting->getCreatedAt() ?></td>
                      <td>
                        <button class="btn btn-primary">
                          <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button class="btn btn-danger">
                          <i class="fa-solid fa-trash"></i>
                        </button>
                      </td>
                    </tr>

                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">«</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
              </ul>
            </div> -->
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