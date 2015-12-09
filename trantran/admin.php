<?php
session_start();
require_once('book_f.php');
?>
<?php
	if(isset($_POST['login'])){
		if($_POST['txtcaptcha']==NULL)
			 echo"Vui lòng nhập mã captcha";
		else{
			if($_POST['txtcaptcha']==$_SESSION['security_code']){
				if(isset($_POST['username']) && isset($_POST['password'])){
					$username = $_POST['username'];
					$password = $_POST['password'];
					if (login($username,$password))
						$_SESSION['admin_user']=$username;//Lên nhớ admin-user chính là người đã đăng nhập thành công
				}else{
					echo"Login không thành công. Bạn không xe mtrang này được";
					if(isset($_SESSION['admin_user']))unset($_SESSION['admin_user']);	
				}		
			}else{
					echo "Mã captcha không hợp lệ";
					if(isset($_SESSION['admin_user']))unset($_SESSION['admin_user']);
				}
		}		
	}
?>

<?php
	if(check_admin_user())
	{
		echo"<br>";
		echo"<a href='index.php?dk=loaisach'>Go to main site</a><br>";
		echo"<a href='index.php?dk=insert_category_form'>Add a new category form</a><br>";
		echo"<a href='index.php?dk=insert_category'>Add a new category</a><br>";
		echo"<a href='index.php?dk=insert_book_form'>Add a new book</a><br>";
		echo"<a href='index.php?dk=change_password_form'>Change admin</a><br>";
		echo"<a href='index.php?dk=show_order'>Xem các đơn hàng</a><br>";	
		echo"<a href='index.php?dk=delete_ddh'>Xóa các đơn đặt hàng</a><br>";// ddh đơn đặt hàng
		echo"<a href='index.php?dk=show_customer'>Xem danh sách khách hàng</a><br>";
		// Đối với hình thì src='images/log-out.gif' thì gạch giữa log-out '-'
		echo"<a href='index.php?dk=logout'><img src='images/log-out.gif'  alt='log Out' border='0' height='50' width='135'></a><br>";
				
	}
?>
