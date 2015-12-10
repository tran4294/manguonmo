<meta charset="utf-8">
<?php
// Them 1 loai sach moi
session_start();
require_once("book_f.php");

?>
<?php
if(check_admin_user())
{
?>
<form method='post' action='index.php?dk=insert_category'>
<table border=0>
<tr>
<td> Category Name: </td>
<td> <input type='text' name='catname'></td>
</tr>
<tr>
<td colspan=2 align='center'>
<input type='submit' name='addcat' value='Add Category'>
</td>
</tr>
</table>
</form><br>

<?php
do_html_url("index.php?dk=admin","Trở về Trang quản trị");
}
else
echo "Bạn ko la admin. Ko xem trang nay duoc";

?>