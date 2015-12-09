
<meta charset="utf-8">

<?php
session_start();
require_once("book_f.php");
?>

<?php
if(check_admin_user())
{
	if($catname=get_category_name($_GET['catid']))
	{
		$catid = $_GET['catid'];
		echo "<form method='post' action='index.php?dk=edit_category'>";
		echo "<table border=0>";
		echo "<tr>";
		echo "<td>Category Name:</td>";
		echo "<td><input type='text' name='catname' value='$catname'></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>";
		echo "<input type='hidden' name='catid' value='$catid'>";	// hoi yes no trc khi thuc thi lenh
		echo "<input type='submit' name='updatecat' value='Update Category'>";
		echo "</td>";
		echo "<td>";
		echo "<button type='button' onClick=\"deletecat($catid)\">Delete Category</button>";
		echo "</td>";
		echo "</tr>";
		echo "</table>";
		echo "</form>";
	}
	else
		echo "Không lấy được catname. Error<br>";
		do_html_url("index.php?dk=admin","Trở lại trang quản trị");
}
else
	echo "Bạn không là admin. Không xem trang này được";
?>