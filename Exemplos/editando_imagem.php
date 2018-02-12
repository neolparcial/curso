<?php 

$image = imagecreatefromjpeg("wallpaper.jpg");

$titeColor= imagecolorallocate($image, 255, 0, 0);
$gray= imagecolorallocate($image, 100, 100, 100);

imagestring($image, 5, 450, 150, "Manoel", $titeColor);
imagestring($image, 5, 550, 150, "Pereira", $titeColor);
imagestring($image, 5, 650, 150, "Dias", $titeColor);
imagestring($image, 5, 750, 150, "Neto", $titeColor);
imagestring($image, 5, 850, 150, date("d/m/Y H:i"), $titeColor);

header("Content-Type: image.jpg");

imagejpeg($image, "wallpaper".date("d-m-Y").".jpg", 10);

imagedestroy($image);

 ?>