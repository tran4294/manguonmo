	<style>
    	td{padding: 10px}
    </style>
	<?php
		session_start();
		require_once("book_f.php");			
	?>    
	<?php
		$catid=$_GET['catid'];
		if(!$catid || $catid=="") return false;
		db_connect();
		$sql = "select * from books where catid='$catid'";
		$kq = mysql_query($sql);
		/* print_r($row=mysql_fetch_row($kq));*/
		if(mysql_num_rows($kq)>0)
	{echo"<table width=100% border=0>";
		// Lấy từng dòng mỗi cuốn sách dùng vòng while "Lên thuộc lệnh này dùng nhiều"
		while($row = mysql_fetch_array($kq))
		 {$url="index.php?dk=show_book&isbn=$row[isbn]";
		 	echo"<tr>";
			echo"<td>";
						// "isbn" Kiềm tra 'id' sách
					if(@file_exists("images/$row[isbn].jpg"))// Kiểm tra xem file đó không
						{
						$title="<img src='images/$row[isbn].jpg' width=100 height=120 border=0>";
						do_html_url($url,$title);
						}
							else echo "&nbsp;";
							echo "</td>";
							echo "<td>";
							$title = $row[title]."by".$row[author];
							do_html_url($url,$title);
							echo"</td>";
							echo"</tr>";							
		 } 
		 echo"</table>";
		 echo "<hr>";
	}
	if(isset($_SESSION['admin_user'])){
		display_button("index.php?dk=loaisach","continue","Continue Shopping");
		display_button("index.php?dk=admin","admin-menu","Admin Menu");
		display_button("index.php?dk=edit_category_form&catid=$catid","edit-category","Edit Category");		
	}
	else display_button("index.php?dk=loaisach","continue-shopping","Continue Shopping");		
?>