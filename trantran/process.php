<?php
	session_start();
	// Require_one: Load 1 lần  file 'book_f.php'
	require_once('book_f.php');
?>
<?php
	/* echo "<pre>";
	print_r($_POST);
	echo"</pre>"; */
	// Bung các POST thành các biến
	extract($_POST);
	/*echo "<pre>";
			print_r($_POST);
			echo"</pre>"; */
	if($card_type && $card_number && $card_month && $card_year && $card_name){
		//echo "if";
		if(process_card($_POST)){
			// Học tiếp ngày 28.11.2015	
			$orderid=insert_order(); // Đơn đặt hàng vào CSDL, và trả về orderid giao cho KH
				if ($orderid!=""){
					display_cart($_SESSION['cart'],false,0);
					display_shipping(calculate_shipping_cost());
					echo "Cám ơn quý khách đã giao dịch ĐDH của quý khách đã được nhận<br>";
					echo "Orderid của quý khách là:$orderid xin nhớ mã này để tiện giao dịch<br>";
					unset ($_SESSION['cart']);
					unset ($_SESSION['items']);
					unset ($_SESSION['total_price']);
					unset ($_POST);	
				}
				else{
					echo"Có lỗi không thể xử lý được ĐDH. Xin vui lòng thực hiện lại<br>";
						return false;	
				}				
					
		}
			else{
				echo "Không thể xử lý thẻ của quý khách được<br>";
				echo"vui lòng dùng hình thức thanh toán khác<br>";	
			}			
	}
	else{
	echo"Có lỗi.Bạn không điền đầy đủ vào form<br>";
	echo"Vui lòng dùng hình thức thanh toán khác<br>";		
	}
		display_button("index.php?dk=loaisach","back","Back");
?>