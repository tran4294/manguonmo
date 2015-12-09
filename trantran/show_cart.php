<?php
	session_start();
	require_once("book_f.php");
?>
<?php
	@$new=$_GET['new'];
	// SESSION cart xe hàng
	if(!isset($_SESSION['cart'])){
		$_SESSION['cart'] = array();
		$_SESSION['items']=0;
		$_SESSION['total_price']=0.00;		
	}
	if($new){
		if(isset($_SESSION['cart'][$new]))
			// Nếu sách đó đã có trong giỏ hàng thì tăng số lượng sách lên 1.
			$_SESSION['cart'][$new]++;
			//Nếu chưa có thì bỏ sách đó vào giỏ hàng với số lượng là 1.
			else $_SESSION['cart'][$new]=1;
			$_SESSION['items']=calculate_items($_SESSION['cart']); // Tính tổng số món hàng
			$_SESSION['total_price']=calculate_price($_SESSION['cart']); //tính tổng thành tiền của xe hàng	
			}

	if(isset($_POST['save']))
	{//Duyệt giỏ hàng
		foreach($_SESSION['cart']as $isbn=>$qty)
			{// qty tổng số lượng	
			
			if($_POST[$isbn]==0)// Nếu isbn là 0 thì loại bỏ cuốn sách ra khỏi giỏ hàng
				unset($_SESSION['cart'][$isbn]);// Cuốn sách đó khỏi giỏ hàng
				else $_SESSION['cart'][$isbn]=$_POST[$isbn];// Cập nhật số lượng mới
			}
			$_SESSION['total_price']=calculate_price($_SESSION['cart']);
			$_SESSION['items']=calculate_items($_SESSION['cart']);
		
	 }	
	
?>

<?php
	/*echo "<pre>";
	// print_r($_SESSION);
	echo "</pre>";*/
	// Tiếp bài học 19.11.2015
	if ($_SESSION['cart'])
		display_cart($_SESSION['cart']);
	else{
		echo"<p>Giỏ hàng rỗng</p>";
		echo "<hr>";
	}
	$url = "index.php?dk=loaisach";
	if ($new){
		$detail = get_book_details($new);
		if($detail[catid])
			$url="index.php?dk=show_cart&catid=$detail[catid]";	
	}
	display_button($url, 'continue-shopping', 'Continue Shopping');
	display_button('index.php?dk=checkout', 'go-to-checkout', 'Go-To-Checkout');
?>
