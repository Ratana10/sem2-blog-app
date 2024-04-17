<?php

include "../../service/postService.php";
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }


if(isset($_POST["postBtn"])){
    $description = $_POST['description'];
    $userId = 1;
    echo $description;

    $post = new Post(NULL, 1, '1111132323', '22323323', NULL);

    echo ("get post: "   );
    
    //  $postedService = $postService->createPost($post);
    //  echo ($postedService);

    //  if ($postedService){
       
    //  }
}

?>