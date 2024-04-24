<?php
include "likeService.php";

$like = new Like(null, 1, 1);

$likeService = new likeService();

$result = $likeService->createLike($like);

echo $result;
