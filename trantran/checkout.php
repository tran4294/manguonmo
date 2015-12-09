<?php
	//if(!isset($_SESSION)){
	session_start();	  // } 
	require_once("book_f.php");
?>
<?php
	if($_SESSION['cart']){
	display_cart($_SESSION['cart'],false,0);
	display_checkout_form();	
	}
	else echo"<p> Không có giỏ hàng </p>";
	display_button("index.php?dk=show_cart","continue-shopping","Continue Shopping");

?>
<?php function display_checkout_form(){?>
<style>
   .tb_checkout input{width: 85%;
   border: 1px solid #330;
   padding: 5px;
   margin: 5px 0px;
   font-family:Arial, Helvetica, sans-serif;
   font-size:14px;
   color:#333;
   
   }
   .tb_checkout input:hover{
	   border: 2px solid #C30;
	   background-color:#F9C; 
	   
	   }


</style>
	  <form action="index.php?dk=purchase" method="post">
      <table class="tb_checkout" border="0" width="100%" cellspacing="0">
      <tr>
      	<th colspan="2" bgcolor="#cccccc">
        Your details
        </th>
      </tr>
      <tr>
      	<td>Name</td> 
        <td><input type="text" name="name" value=""></td>
      </tr>
       <tr>
      	<td>Address</td> 
        <td><input type="text" name="address" value=""></td>
      </tr>
      <tr>
      	<td>City</td> 
        <td><input type="text" name="city" value=""></td>
      </tr>
      <tr>
      	<td>State</td> 
        <td><input type="text" name="state" value=""></td>
      </tr>
      <tr>
      	<td>Postal code</td> 
        <td><input type="text" name="zip" value=""></td>
      </tr>
      <tr>
      	<td>Country</td> 
        <td><input type="text" name="country" value=""></td>
      </tr>
      	<tr>
      	<th colspan="2" bgcolor="#cccccc">Shipping Address (Có thể bỏ trống)</th>     
        
       <!-- ----------------------------------  --> 
       <tr>
      	<td>Name</td> 
        <td><input type="text" name="ship_name" value=""></td>
      </tr>
       <tr>
      	<td>Address</td> 
        <td><input type="text" name="ship_address" value=""></td>
      </tr>
      <tr>
      	<td>City</td> 
        <td><input type="text" name="ship_city" value=""></td>
      </tr>
      <tr>
      	<td>State</td> 
        <td><input type="text" name="ship_state" value=""></td>
      </tr>
      <tr>
      	<td>Postal code</td> 
        <td><input type="text" name="ship_zip" value=""></td>
      </tr>
      <tr>
      	<td>Country</td> 
        <td><input type="text" name="ship_country" value=""></td>
      </tr>
      <!-- --------------- -->
      <tr>
      	<td colspan="2" align="center">
        <b>Vui lòng click purchase để xác nhận lại đặt hàng Hoặc Continue Shopping để tiếp tục mua sắm</b>
        <?php
			display_form_button('purchase','Purchase these items');		
		
		?>
      	</td>      
      </tr>
      </table>
      </form> 
      <hr /> 			
	


<?php }?>