<?php
include_once "postService.php";
$postService = new PostService();

$posts = $postService->getAllPosts();

foreach($posts as $post){
  echo $post->getUser()->getUsername() . "<br/>";
}
