<meta charset="utf-8">
<!-- 24.11.2015 -->
<?php
	// Đối với máy bàn pc , laptop thì bỏ session_start();
	session_start();
	require_once("book_f.php");
?>

<?php
	
	$_SESSION['POST']=$_POST;
	extract($_POST); // Bung POST thành các biến tương ứng
					// $name=$_POST['name'];
					//$address=$_POST['address'];
					//......
	if($_SESSION['cart']){
		display_cart($_SESSION['cart'],false,0);
		display_shipping(calculate_shipping_cost());// Tính phí vận chuyển 20 USD
// Show phí vận chuyển ra trang web  	
	}
	echo "<pre>";
	//print_r($_SESSION);
	//print_r($_POST);
	echo"</pre>";		
?>
<style>
	.tb_purchase{
	 margin-top:10px;
	}
	.tb_purchase th{
		padding: 10px 0px;
	}
	.tb_purchase input{
	width: 75%;
	border: 1px solid #ccc;
	padding: 5px;
	margin: 5px 0px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:16px;
	color: #333;
	}
	.tb_purchase select{
	border: 1px solid #ccc;
	font-family:Verdana, Geneva, sans-serif;
	font-size:16px;
	color:#333;
	padding: 3px 7px;
	}
	.tb_purchase input:hover{
	border: 1px solid #09f;
	background-color: #ff9;
	}
</style>
<form class="tb_purchase"  action="index.php?dk=process" method="post">
<table border="0" width="100%" cellspacing="0">
<tr>
	<th colspan="2" bgcolor="#cccccc"> Creadit card detalis </th>
</tr>
<tr>
	<td>Type</td>
    <td><select name="card_type">
            <option> VISA
            <option> Master Card
            <option> American Express
        </select>
    </td>
    </tr> 
    <tr>
        <td>Number</td>
        <td><input type="text" name="card_number"></td>
    </tr>
    <tr>
        <td>AMEX code(nếu cần)</td>
        <td><input type="text" name="amex_code"></td>
    </tr>
    <tr>
    <td>Expire Date</td>
    <td>Month
      <select name="card_month">
        <option>01
        <option>02
        <option>03
        <option>04
        <option>05
        <option>06
        <option>07
        <option>08
        <option>09
        <option>10
        <option>11
        <option>12
     </select>    
    
    Year
      <select name="card_year">
        <option>2014
        <option>2015
        <option>2016
        <option>2017
        <option>2018
        <option>2019
        <option>2020
        <option>2021
        <option>2022
        <option>2023
        <option>2024
        <option>2025
        <option>2026
        <option>2027             
     </select>    
   	</td>
    </tr>
    <tr>
    	<td>Name on cart</td>
        <td><input type="text" name="card_name"></td>    
    </tr>
    <tr>
    	<td colspan="2" align="center"><input style="width:auto" type=image src="images/purchase.gif" alt="Purchase" border="0" height="50" width="135">
        </td>    
    </tr>
    </table>
    </form>
<?PHP
	display_button("index.php?dk=show_cart","continue-shopping","Continue Shopping");
?>