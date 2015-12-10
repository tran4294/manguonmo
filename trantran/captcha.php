<?php
session_start();
function create_image(){// hash: là mật mã
	$md5_hash = md5(rand(0,999));// rand phat sinh 1 số từ 0 - 999
								// md5 sẽ mã hóa 1 số thành 1 số khác đến 32 ký tự
	$security_code = substr($md5_hash,15,4);// substr lấy 1 chuỗi con trong md5_hash, lấy từ ký tự thứ 15 và lấy 5 ký tự
	$_SESSION['security_code']=$security_code;
	$width=100;//Khai báo kích thước captcha
	$height=30;
	$image= imagecreate($width,$height);
	$while=imagecolorallocate($image,255,255,255);
	$black=imagecolorallocate($image,0,0,0);
	$red=imagecolorallocate($image,255,255,0);
	imagefill($image,0,0,$black);
	imagestring($image,5,30,6,$security_code,$while);// 5 font size
													// 30 khoảng cách bên trái
													//khoảng cách từ trên xuống
	$captcha=imagecreatefrompng('captcha1.png');
	$font = 'arial.ttf';
	imagettftext($captcha,23,6,20,38, $black, $font, $security_code);
	header("Content-Type:image/jpeg");// chuyển trang web thành dạng hình jpg
	imagejpeg($captcha);//Tạo hình
	imagedestroy($captcha);// Hủy hình gốc vì đã tạo thành trang
}
create_image();
exit();
?>