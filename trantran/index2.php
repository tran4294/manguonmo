<?php
session_start();

$captcha=imagecreatefrompng('captcha1.png');
// Set someone variable
$black=imagecolorallocate($captcha,0,0,0);
$white=imagecolorallocate($captcha,255,255,255);
$red=imagecolorallocate($captcha,225,0,0);
$font = 'arial.ttf';
$string = md5(microtime()* mktime());
$text = substr($string,0,3);// điểm bắt đầu là 0 , dịch sang bên phải 9 ký tự
$_SESSION['code']=$text;

/* imageline($captcha,50,50,100,100, $red);
$text = 'Hello word';
 imagefilledrectangle($captcha,10,10,90,90,$white);*/
 

imagettftext($captcha,23,6,20,38, $red, $font, $text);


header('content-type: image/jpg');
imagepng($captcha);
//clean up
imagedestroy($captcha);
?>