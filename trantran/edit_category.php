
<meta charset="utf-8">

<?php
session_start();
require_once("book_f.php");
?>

<?php
if(check_admin_user())
{
	if(isset($_POST['updatecat']))
	{
		if(update_category($_POST['catid'],$_POST['catname']))
			echo "Loại sách đã được cập nhật ok<br>";
		else
			echo "Có lỗi. Loại sách không được cập nhật. Error<br>";
	}
	else 
		echo "Bạn không click updatecat<br>";
	do_html_url("index.php?dk=admin", "Trở lại trang quản trị");
}
else 
	echo "Bạn không là admin. Không xem trang này được";
?>

