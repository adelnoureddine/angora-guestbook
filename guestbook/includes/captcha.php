<?php

session_name('angoraGuestbook');
session_start();

$alphanum = "abcdefghijkmnpqrstuvwxyz0123456789";

// generate the verication code
$rand = substr(str_shuffle($alphanum), 0, 5);

// create the hash for the random number and put it in the session
// but first clear the session field
unset($_SESSION['captcha_value']);
$_SESSION['captcha_value'] = hash('sha1', $rand);

// Create image
$image = imagecreatetruecolor(100, 50);

// Create background
$background = imagecolorallocate($image, 0, 0, 0);
imagerectangle($image, 3, 3, 40, 40, $background);

// Draw lines
$col = imagecolorallocate($image, 50, 128, 250);
imageline($image, 10, 10, 400, 150, $col);

$col = imagecolorallocate($image, 128, 250, 30);
imageline($image, 0, 0, 39, 29, $col);
imageline($image, 40, 0, 84, 59, $col);

// Draw ellipses
$col = imagecolorallocate($image, 250, 199, rand(128, 255));
imagearc($image, 20, 25, 60, 60, 0, 360, $col);

// Draw text letter by letter
$angle = mt_rand(10, 40);
$font = "../images/fonts/vera.ttf";
$x = rand(10, 35);

for ($c=0; $c<5; $c++) {
	$size = mt_rand(13, 24);
	$text = $rand[$c];
	$y = 30 + rand(0, 18);
	
	$color = imagecolorallocate($image, rand(100, 254), rand(100, 254), rand(100, 254));
	imagettftext($image, $size, $angle, $x+15*$c, $y, $color, $font, $text);
}

// send several headers to make sure the image is not cached

// Date in the past
header("Expires: Sun, 31 Aug 1997 03:00:00 GMT");

// always modified
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

// HTTP/1.1
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);

// HTTP/1.0
header("Pragma: no-cache");

// send the content type header so the image is displayed properly
header('Content-type: image/png');

// send the image to the browser
imagepng($image);

// destroy the image to free up the memory
imagedestroy($image);

?>