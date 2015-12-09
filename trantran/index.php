
<meta charset="utf-8">
<script type="text/javascript" src="jquery-min.js"></script>
<?php
	session_start();
	
?>
<link href="style.css" rel="stylesheet" type="text/css">

<div class="container">
  <div class="header">
    <p>BOOKSTORE THANH MAI</p>
    <ul class="nav">
      <li><a href="index.php?dk=bando">Bản đồ</a></li>
      <li><a href="index.php?dk=tuyendung">Tuyền dụng</a></li>
      <li><a href="index.php?dk=lienhe">Liên hệ</a></li>
      <!-- Truyền bằng GET -->
      <li><a href="index.php?dk=gioithieu">Giới thiệu</a></li>
    </ul>
  </div>
  <div class="menu">  
  Menu<br />
    <a href="index.php?dk=loaisach" title="">Loại sách</a><br />
    <a href="index.php?dk=show_cart" title="">Xem Giỏ Hàng</a><br />
    <a href="index.php?dk=login" title="">Login</a><br />
  </div>
  <div class="trangchinh">
  Trang chính<br />
  <?php 
   switch($_GET['dk'])
  	   {
		case gioithieu: include("gioithieu.php"); break;			   
		case lienhe: include("lienhe.php"); break;		   
		case tuyendung: include("tuyendung.php"); break;		   
		case bando: include("bando.php"); break;			
		case loaisach: include("loaisach.php");break;		
		case show_cat: include("show_cat.php"); break;	   
		case show_book: include("show_book.php"); break;		  
		case show_cart: include("show_cart.php"); break;		  
		case checkout: include("checkout.php"); break;		  
		case purchase: include("purchase.php"); break;	
		case process: include("process.php"); break;
		case login: include("login.php"); break;
		case logout: include("logout.php"); break; 
		case insert_category_form: include("insert_category_form.php");break;
		case insert_category:include("insert_category.php");break; 
		case edit_category_form:include("edit_category_form.php");break; 
		case edit_category:include("edit_category.php");break;
	   } 
?>   
</div>
    <div class="trangquantri">Trang quảng trị<br />
    	<?php
			if($_GET['dk']='admin' || isset($_SESSION['admin_user']))
			include("admin.php");		
		?>
    
    
    
    
    </div>
    <div class="welcome">Welcome </div>    
    <div class="copyright">
    <p>Copyright by: <a href="http://duongnhuchuc.xyz">duongnhuchuc</a></p>
    </div>
</div>
