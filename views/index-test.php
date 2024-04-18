<?php
include "../service/postService.php";
// // include "../../entity/user.php";

$postService = new PostService();

//$posts = $postService->getAllPosts();

$post = new Post(4, 2, "Party update", "Chill with my friend", null);

   
$posts = $postService->getAllPosts(1);

testArrPosts($posts);
// $postService->updatePost($post);
//$postService->createPost($post);
// $postService->likePost(1);


function testArrPosts($posts)
{
  if ($posts !== false) {
    foreach ($posts as $post) {
      // Output post information
      echo "ID: " . $post->getId() . "<br>";
      echo "User ID: " . $post->getUserId() . "<br>";
      echo "Title: " . $post->getTitle() . "<br>";
      echo "Description: " . $post->getDescription() . "<br>";
      // Output other properties as needed

    }
  } else {
    echo "No posts found.";
  }
}

echo "Success";
