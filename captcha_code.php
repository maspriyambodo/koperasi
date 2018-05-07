<?php
session_start();
//$random_alpha = md5(rand());
//$captcha_code = substr($random_alpha, 0, 5);
//$_SESSION["captcha_code"] = $captcha_code;
//session_write_close();
//$target_layer = imagecreatetruecolor(80,28);
//$captcha_background = imagecolorallocate($target_layer, 255, 100, 200);
//imagefill($target_layer,0,0,$captcha_background);
//$captcha_text_color = imagecolorallocate($target_layer, 0, 0, 0);
//imagestring($target_layer, 5, 5, 5, $captcha_code, $captcha_text_color);
//header("Content-type: image/jpeg");
//imagejpeg($target_layer);

//session_start();
header("Content-type: image/png");
$captcha_image = imagecreatefrompng("counter/captcha.png");
$captcha_font = imageloadfont("counter/font.gdf");
$captcha_code = substr(md5(uniqid('')),-6,6);
$_SESSION['captcha_code'] = $captcha_code;
session_write_close();
$captcha_color = imagecolorallocate($captcha_image,0,0,0);
imagestring($captcha_image,$captcha_font,15,5,$captcha_code,$captcha_color);
imagepng($captcha_image);
imagedestroy($captcha_image);
?>