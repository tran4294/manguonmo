
<meta charset="utf-8">

 <?php
	session_start();
	require_once("book_f.php");
	
	
	if(!isset($_SESSION['item']))
	$session['items']='0';
	if(!isset($_SESSION['total_price']))
	$_session['total_price']='0.000';
	// catid mã laoi sách
	if(!isset($_SESSION['catid']))
	$_SESSION['catid']=0.00;
  ?>
<?php 
	echo "<p>Please choose a category</p>";	
	db_connect();
	$sql="select * from categories";
	$kq=mysql_query($sql);
	if(mysql_num_rows($kq)==0)return false;
	echo"<ul>";
	while($row=mysql_fetch_array($kq))
		{
		// Tạo đường linh cho các category
		$url="index.php?dk=show_cat&catid=$row[catid]";	
		$catname=$row[catname];
		echo "<li>";
		do_html_url($url,$catname);
		echo "</li>";
		echo "<br>";		
		}
		echo "</ul>";
		// Đường gạch dưới
		echo "<hr>";
?>