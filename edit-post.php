<?php require_once "config/check-session.php"; ?>
<?php

include_once "service/postService.php";

if ($postId = $_GET['id']) {
    $postService = new PostService();

    $post = $postService->getPostById($postId);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="source/css/style.css">

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark">
        <div class="container-fluid">
            <!-- <a class="navbar-brand" href="index.php">&lt;- back</a> -->
            <a class="navbar-brand" href="index.php"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
    </nav>

    <!-- Post Form -->
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="post-form">
                    <form action="edit-post-action.php" method="post" enctype="multipart/form-data">
                        <div class="form-group d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <img src="source/images/users/<?php echo $_SESSION["image"] ?>" class="rounded-circle ms-2 avatar">
                                <div class="d-flex flex-column ms-2">
                                    <h7 class="mb-0"><?php echo $_SESSION["username"] ?></h7>
                                    <div class="">
                                        <select class="form-select-sm  " name="public" id="">
                                            <option value="1" <?php if ($post->getPublic()) echo 'selected' ?>>Public</option>
                                            <option value="0" <?php if (!$post->getPublic()) echo 'selected' ?>>Private</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" hidden name="postId" value="<?php echo $post->getId() ?>">
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="What's on your mind?"><?php echo $post->getDescription()  ?></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                            </div>
                            <div class="image-preview-container">
                                <img src="source/images/posts/<?php echo $post->getImage()  ?>" alt="" class="mt-3 existing-image">
                                <img src="#" class="mt-3 image-preview" alt="">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block form-control" name="btnUpdatePost">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script>
        $("#image").change(function() {
            readURL(this);
            $('.existing-image').hide();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.image-preview').attr('src', e.target.result).show(); // Changed from hide() to show()
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                $('.image-preview').hide();
            }
        }

        function updateTag(tag) {
            document.getElementById('tag').innerText = tag;
        }
    </script>
</body>

</html>