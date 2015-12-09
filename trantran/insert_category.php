<?php
session_start();
require_once("book_f.php");

?>
<?php
if(check_admin_user())
{
	if(isset($_POST['addcat']))
	{
		$catname=$_POST['catname'];
		if(insert_category($catname))
		echo"<p id='ani'> The loai sach da duoc them. OK </p>";
		else
		echo "<br>Loai Sach ko Duoc Them. Error <br>";
	}
	else
	echo " Ban Ko click Addcat. Ko xem trang nay douc";
	do_html_url("index.php?dk=admin","Tro ve trang quan tri");
}
else
echo "Ban ko la admin. Ko xem trang nay duoc";
?>
<script>
//<![CDATA[
var size=10 
var buoctang=2
function ChangeFont()
{
	var paragraph=document.getElementById("ani")
	size= size + buoctang
	paragraph.style.fontSize= size + "px"
	if(size>100)
	buoctang=-2
	if(size<10)
	buoctang=2
	setTimeout("ChangeFont()",100)
}
//]]>
 

</script>

<script>
ChangeFont();
</script>