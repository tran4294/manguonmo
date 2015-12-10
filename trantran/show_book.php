
<meta charset="utf-8">
<style>
	<!-- table, td {border-collapse: collapse;} -->
	td{padding:10px}
	td img{broder: 1px solid #ccc;}
	
</style>

<?php
	session_start();
	require_once("book_f.php");
?>
<?php
	$isbn=$_GET['isbn'];
	$sql="select * from books where isbn='$isbn'";
	db_connect();
	$kq = mysql_query($sql);
	/* print_r($row = mysql_fetch_row($kq));*/	
	if(mysql_num_rows($kq)==0) return false;
	// Đẩy dữ liệu ra trang chủ
	$row = mysql_fetch_array($kq);
	
	echo '<table border="1">';
	echo "<tr>";
		if(@file_exists("images/$row[isbn].jpg"))
		echo "<td><img src='images/$row[isbn].jpg' border=0 width=100 height=120></td>";
		else echo "<td>$row[isbn]</td>>";
		echo "<td>";
			echo"<ul>";
				echo"<li><b>Title:</b>$row[title]</li>";
				echo"<li><b>Author:</b>$row[author]</li>";
				echo"<li><b>ISBN:</b>$row[isbn]</li>";
				echo"<li><b>Price:</b>"; echo number_format($row[price],2);echo"</li>";
				echo "<li><b>Description:</b>";
				echo $row[description];
				echo"</li>";
				echo"</ul>";
				echo"</td>";
				echo"</tr>";
				echo"</table>";
				echo"<br>";
				// học tiếp 17.11.2015
				$url = "index.php?dk=loaisach";
				if(check_admin_user()){
					display_button("index.php?dk=edit_book_form&isbn=$isbn","edit-item","Edit Item");
					display_button("index.php?dk=admin","admin-menu","Admin Menu");
					display_button($url,"continue","Continue");					
					}
					else{
						display_button("index.php?dk=show_cart&new=$isbn","add-to-cart","Add to cart");
						display_button($url,"continue-shopping","Continue Shopping");
						}								
						
							
?>