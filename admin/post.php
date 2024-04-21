<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');

?>

<?php
include_once "../service/postService.php";
$postService = new PostService();

$posts = $postService->getAllPosts(1);
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Post Data</h1>
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
                    <th>Username</th>
                    <th>Text</th>
                    <th>Image</th>
                    <th>Liked</th>
                    <th>Public</th>
                    <th>CreatedAt</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (!$posts) {
                    echo '<tr><td colspan="8" class="text-center">No data found</td></tr>';
                  } else {

                    foreach ($posts as $index => $post) {

                  ?>
                      <tr>
                        <td><?php echo $index + 1 ?></td>
                        <td><?php echo $post->getUser()->getUsername() ?></td>
                        <td><?php echo $post->getDescription() ?></td>
                        <td>
                          <img src="../source/images/posts/<?php echo $post->getImage() ?>" alt="image" class="img-fluid " style="height: 50px; width: 100px; object-fit: contain;">
                        </td>
                        <td>
                          <?php echo 10 ?></span>
                        </td>
                        <td>
                          <?php echo 'Public' ?></span>
                        </td>
                        <td><?php echo $post->getCreatedAt() ?></td>
                        <td>
                          <button class="btn btn-danger delete-post" data-post-id="<?php echo $post->getId() ?>" data-toggle="modal" data-target="#deletePostModal">
                            <i class="fa-solid fa-trash"></i>
                          </button>
                        </td>
                      </tr>

                  <?php
                    }
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
    <div>

      <!-- Modal -->
      <div class="modal fade delete-post" id="deletePostModal" tabindex="-1" role="dialog" aria-labelledby="deletePostModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deletePostModalLabel">Delete Post</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Are you sure you want to delete this post ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              <button type="button" class="btn btn-primary confirmDeletePost" data-dismiss="modal">Yes</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>



<?php
include('includes/footer.php');

?>