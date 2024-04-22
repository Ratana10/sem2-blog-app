<?php
// include_once "postService.php";
// $postService = new PostService();

// $posts = $postService->getAllPosts();

// foreach($posts as $post){
//   echo $post->getUser()->getUsername() . "<br/>";
// }

include_once "settingService.php";

$settingService = new SettingService();

$setting = new Setting(null, 'Facebook', null, 1);

$settingService->create($setting);

$settings = $settingService->getAllSetting();

if (!$settings) {
  echo "no data";
}
foreach ($settings as $setting) {
  echo $setting->getName() . "<br/>";
}
