<?php 

header("Content-type: image/jpg");

$file = "wallpaper.jpg";

list($old_width, $old_heigth) = getimagesize($file);

$new_width = $old_width/5;
$new_heigth = $old_heigth/5;

$new_image = imagecreatetruecolor($new_width, $new_heigth);
$old_image = imagecreatefromjpeg($file);

imagecopyresampled($new_image, $old_image, 0, 0, 0, 0, $new_width, $new_heigth, $old_width, $old_heigth);

imagejpeg($new_image);

imagedestroy($new_image);
imagedestroy($old_image);

 ?>