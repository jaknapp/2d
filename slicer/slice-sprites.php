<?php

$spritesFilename = "sprites/Fighter red.png";
$sprites = imagecreatefrompng($spritesFilename);

$width = 50;
$height = 50;
$image = imagecreate($width, $height);
imagecopy($image, $sprites, 0, 0, 50, 0, 50, 50);

$filename = "images/fighter-red-01.png";
imagepng($image, $filename, 9);

$imageContents = file_get_contents($filename);
$imageBase64 = base64_encode($imageContents);
echo "<image src=\"data:image/png;base64," . $imageBase64 . "\"/>";