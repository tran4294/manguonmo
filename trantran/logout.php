<?php
	session_start();
	require_once("book_f.php");
	$old_user=$_SESSION['admin_user']; //Lưu lại tên admin cũ
	unset($_SESSION['admin_user']);// Làm mất trang quảng trị
	if(isset($_SESSION['admin']))
	unset($_SESSION['admin']);
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
<?php
	if(!empty($old_user)){
		echo"<p id='ani'>Log Out</p>";
		do_html_url("index.php?dk=login","Login");//dk là biến điều khiển	
	}else{
		echo"<br><strong>Bạn không là admin.Không xem trang này được";	
	}
?>
<script>
ChangeFont();
</script>