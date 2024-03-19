<form action="test1.php" method="post" enctype="multipart/form-data">
  <input type="file" name="image" id="">
  <button type="submit" name="btnSubmit">Submit</button>
</form>

<?php

if (isset($_POST['btnSubmit'])) {

  $image = $_FILES['image']['name'];

  if(empty($image)){
    echo "no file";
  }
  // $uploadDir = "../../source/images/users/";
  // move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $_FILES['image']['name']);

  echo "test" . $image;
}

?>