<?php /* Smarty version Smarty-3.1.18, created on 2014-10-25 21:20:34
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\login.html" */ ?>
<?php /*%%SmartyHeaderCode:30197544bb1b2efda95-98481825%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a9035e5238a3c8d667f080899ae1f6da5f5e566' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\login.html',
      1 => 1413193793,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30197544bb1b2efda95-98481825',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_544bb1b3025f08_09411570',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544bb1b3025f08_09411570')) {function content_544bb1b3025f08_09411570($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<title>Back Office - Spa</title>
	<meta charset="utf-8"/>
    
	<link rel="stylesheet" type="text/css" href="../inc/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	
</head>
<script type="text/javascript">
$(document).ready(function() {
	$('#login-btn').click(function() {
		$.ajax({
			url: '../common/ajaxCheckEmployeesLogin.php',
			type: 'POST',
			data: {
				'formData' : $('#form-login').serialize()
			},
			success:
			function(response) {
				if(response == 'PASS') {
					window.location ='http://localhost/projectSpa/backoffice/manage_table.php';
				} else if(response == 'NOT_PASS') {
					$('#error-message-username').text("ไม่พบบัญชีผู้ใช้นี้ หรือคุณกรอกชื่อผู้ใช้ และรหัสผ่านผิดพลาด โปรดลองอีกครั้ง");
				}  else {
					alert(response);
				}
			}
		})
	});
});
</script>
<body>
<div style="text-align: center; margin-top: 40px;">
	<img src="../img/backoffice/spa-logo.png">
</div>
<div class="login-content container">
	<h1>Account Login</h1>
	<form id="form-login" name="form-login" onsubmit="return false;">

		<div id="error-message-username"></div>
		<label>Username</label>
		<br>
			<input class="control wide-control" type="text" name="username">
		<br>

		<div id="error-message-password"></div>
		<label>Password</label>
		<br>
			<input class="control wide-control" type="password" name="password">
		<br>

	<button id="login-btn" class="myButton">Login</button>
</form>
</div>
<div class="loginPage-footer"></div>
</body>
</html>
<?php }} ?>
