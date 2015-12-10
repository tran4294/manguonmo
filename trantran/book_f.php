
<?php
function db_connect()
	{
	$conn = mysql_connect("localhost","root","");
	if(!$conn) die("Không thể kết nối với server");
	$csdl =mysql_select_db("bookstore",$conn);
	if(!$csdl) die ("không kết nối csdl bookstore");
	mysql_query("set names utf8");
	}
?>
<?php
	function do_html_url($url,$name)
	{
	// Biến 1 chuỗi url thành đường link
	echo "<a href='$url'>$name</a>";
	echo"<br>";
	}
?>
<?php
	function display_button($url,$image,$alt){
	echo"<center>
		<a href='$url'><img src='images/$image.gif' alt='$alt' border=0 height=50 width=135></a>	
	</center>";		
	}
?>
<?php
	function check_admin_user(){
		if(isset($_SESSION[admin_user])) return true;
		else return false;
		}
?>
<?php
	function calculate_items($cart){
		$items=0;
		if(is_array($cart))
		foreach((array)$cart as $isbn=>$qty)
		$items = $items + $qty; // qty số lượng
		return $items;		
		}
	function calculate_price($cart)
		{
		$price=0;
		if(is_array($cart)){
			db_connect();
			foreach($cart as $isbn=>$qty){
				$sql = "select price from books where isbn='$isbn'";	
				$kq = mysql_query($sql);
				$item = mysql_fetch_array($kq);
				$item_price = $item['price'];
				$price = $price + $item_price*$qty;			
				}
				return $price;	
			}
			
		}	
?>
<!--  Tiếp bài học 19.11.2015 -->
<?php
	 function display_cart($cart,$change=true,$images=1){
		 //Change = true : Cho phep thay đổi số lượng
		 // $images=1 	: Có hình bìa 
		$images==1 ? $col=2 : $col=1;
		$images==1 ? $col1=3 : $col1=2;
		echo "<form action='index.php?dk=show_cart' method='post'>";
		echo "<table border='1' width='100%' cellspacing='0'>";
		
		echo "<tr>";
			echo "<th colspan=$col bgcolor='#cccccc'>Item</th>";
			echo "<th bgcolor='#ccccccc'>Price</th>";
			echo "<th bgcolor='#ccccccc'>Qty</th>";
			echo "<th bgcolor='#ccccccc'>Total</th>";
			echo "</tr>";
			
			foreach($cart as $isbn=>$qty){
				$book=get_book_details($isbn);
				echo "<tr>";
				// td image
				if($images==true){
					// bỏ @ thì không báo lổi. Nếu có hình có thì show hình ra ,nếu  ko có hình thì show max $isbn ghi mã sách
					echo"<td aligh=left>";
					if(file_exists("images/$isbn.jpg"))
					echo "<img src='images/$isbn.jpg' border=0 width=100 height=120>";
					else echo $isbn;
					echo "</td>";
				}// td title author	
				echo"<td align=left>";
				echo "<a href='index.php?dk=show_book&isbn=$isbn'>$book[title]</a> by $book[author]";
				echo"</td>";
				// td price
				echo"<td align='center'>$".number_format($book["price"],2);
				echo"</td>";
				// td $qty
				echo "<td align='center'>";
				if($change==true)
				echo"<input type='text' name='$isbn' value='$qty'>";
				else echo "$qty";
				echo "</td>";
				
				// td total
				echo "<td align='center'>$".number_format($book["price"]*$qty,2);
				echo"</td>";
				echo "</tr>";
			}
			
			echo "<tr>";
			echo "<th colspan=$col1 bgcolor='#cccccc'>&nbsp;</th>";
			echo "<th align='center' bgcolor='#cccccc'>".$_SESSION['items']."</th>";
			echo "<th align='center' bgcolor='#cccccc'>$".number_format($_SESSION['total_price'],2)."</th>";
			echo "</tr>";
			if($change==true){
				echo"<tr>";
				echo "<td colspan=5 align='center'>";
				echo "<input type='submit' name='save' value='save change'>";
				echo "<td>";
				echo"</tr>";						
			}				
			echo "</table>";
			echo "</form>";				
		 }

?>
<?php
	function get_book_details($isbn){
		if(!$isbn||$isbn=="")return false;
		db_connect();
		$sql="select * from books where isbn=$isbn";
		$kq = mysql_query($sql);
		if (mysql_num_rows($kq)==0) return false;
		$row = mysql_fetch_array($kq);
		return $row;
	}
	function display_form_button($image,$alt){
		echo "<center><input style='width: 135px; height:50px; border:none;' type='image' src='images/$image.gif' alt='$alt' ></cneter>";
		
		}
?>

<!-- 24.11.2015 -->
<?php
	function calculate_shipping_cost(){
		return 20.00;	
	}
?>
<?php
	function display_shipping($shipping){
	echo '<table border="0" width="93%" cellspacing="0">';
	echo "<tr>";
		echo "<td align='left'>Shipping</td>";
		echo "<td align='right'>";echo number_format($shipping,2); echo"</td>";
		//echo '<td align="right">'.$shipping.'</td>';
	echo "</tr>";
		echo"<th bgcolor='#cccccc' align='left'>TOTAL INCLUDING SHIPPING </th>";				
		echo"<th bgcolor='#cccccc' align='right'>$";echo number_format($shipping+$_SESSION['total_price'],2);echo "</th>";	
			
		
	echo"</tr>";
	echo"</table>";
	echo"<br>";		
	}
?>

<?php
	function process_card($card_details){
		return true;
	}
	// <!-- học tiếp 28.11. 2015-->
	function insert_order(){
		extract($_SESSION['POST']);
			if(!$ship_name && !$ship_address && !$ship_city && !$ship_state && !$ship_zip && !$ship_country){
				$ship_name = $name;
				$ship_address = $address;
				$ship_city = $city;
				$ship_state = $state;
				$ship_zip = $zip;
				$ship_country = $country;	
			}
			db_connect();
			$sql="select customerid from customers where
			name='$name' and address='$address' and
			city = '$city' and state='$state' and
			zip='$zip' and country='$country'";
			$kq=mysql_query($sql);
			// Nếu khách hàng đã có thì lấy customerid của khách hàng đó
			if(mysql_num_rows($kq)>0){
				$customer = mysql_fetch_row($kq);
				$customerid = $customer[0];	
			}
			else{
				/*echo*/ $sql="insert into customers values('','$name','$address','$city','$state','$zip','$country')";
				$kq = mysql_query($sql);
				if(!$kq)
				{ echo "1";
				return false; 
				}
				$customerid = mysql_insert_id();	
			}
			$date=date('y-m-d');
			/*echo*/ $sql="insert into orders values('',$customerid," .$_SESSION['total_price'].",'$date','PARTIAL','$ship_name','$ship_address','$ship_city','$ship_state','$ship_zip','$ship_country')";// 	PARTIAL chưa giao hàng
			$kq=mysql_query($sql);
			if(!$kq)
			/*{ echo "2";*/
				return false; 
				
			echo $orderid = mysql_insert_id();
			// Ghi vào bảng order_items các chi tiết ĐDH(Đơn Đặt Hàng)
			//Có thì xóa ghi cái cái mới
			foreach($_SESSION['cart']as $isbn=>$quantity){
				$detail=get_book_details($isbn);
				$sql="delete from order_items where orderid ='$orderid' and isbn='$isbn'";
				$kq=mysql_query($sql);
				/*echo*/ $sql="insert into order_items values('$orderid','$isbn',".$detail['price'].",$quantity)";
				$kq=mysql_query($sql);
				if(!$kq)
				/*{ echo "2";*/
				return false; 
				
			}
			return $orderid;
			    		
	}
?>
<?php
	function login($username,$password)
	{
	db_connect();
	//select * from admins where username='admin' and password=sha1('admin')
	$sql="select * from admins where username='$username' and password=sha1('$password')";
	$kq=mysql_query($sql);
	if(mysql_num_rows($kq)==0)return false;
	else return 1;	
	}
?>
<!--lt nut Edit Category trong show_cat de xoa, sua loai sach-->
<?php
function insert_category($catname)
{
	if(empty($catname))
	{
		echo "catname rỗng<br>";
		return false;
	}
	db_connect();
	// kiem tra xem the loai sach moi da co chua
	$sql="select * from categories where catname='$catname'";
	$kq=mysql_query($sql);
	if(!$kq || mysql_num_rows($kq)>0) 
	return false;
	// ghi the loai sach moi vao csdl
	$sql="insert into categories values('','$catname')";
	$kq=mysql_query($sql);
	if(!$kq)
	return false;
	else
	return true;
}
?>

<?php
function get_category_name($catid)
{
	db_connect();
	$sql = "select catname from categories where catid= '$catid'";
	$kq = mysql_query($sql);
	if(mysql_num_rows($kq)==0)
		return false;
	$row = mysql_fetch_array($kq);
	$catname = $row['catname'];
	return $catname;
}
?>

<script>
function deletecat(catid)
{
	if(confirm("Delete Category?"))
	window.location="index.php?dk=delete_category&catid="+catid;
}
</script>

<?php
function update_category($catid, $catname)
{
	db_connect();
	$sql = "update categories set catname='$catname' where catid='$catid'";
	$kq = mysql_query($sql);
	if(!$kq)
		return false;
	else
		return true;
}
?>
