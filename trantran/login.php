
<meta charset="utf-8">
<script type="text/javascript" src="jquery-min.js"></script>
<?php
 session_start();
 require_once('book_f.php');
?>
<!-- Ðang nhap Username: admin,Password: admin  -->
<h1>Log In</h1>
<form method="post" action="index.php?dk=admin">
<table bgcolor="#CF306B">
<tr>
	<td>Username</td>
    <td><input type="text" name="username"></td>
</tr>
<tr>
	<td>Password</td>
    <td><input type="password" name="password"></td>
</tr>
<tr>
	<td>Captcha:</td>
    <td><input type="text" name="txtcaptcha"></td>
    <td><img src="captcha.php"></td>
</tr>
<tr>
	<td colspan="2" align="center">
    <input type="submit" name="login" value="login"></td>    
</tr>
</table>
</form>
	
	

