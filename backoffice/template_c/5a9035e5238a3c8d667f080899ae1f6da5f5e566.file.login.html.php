<<<<<<< HEAD
<?php /* Smarty version Smarty-3.1.18, created on 2014-10-03 08:15:52
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\login.html" */ ?>
<?php /*%%SmartyHeaderCode:28770542deab88706c2-17880725%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.18, created on 2014-10-03 04:45:14
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\login.html" */ ?>
<?php /*%%SmartyHeaderCode:20219542db95a122294-08022581%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> 2db499a0f3d4667770f50dd9df219a5368fbffad
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a9035e5238a3c8d667f080899ae1f6da5f5e566' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\login.html',
<<<<<<< HEAD
      1 => 1411691405,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28770542deab88706c2-17880725',
=======
      1 => 1411612149,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20219542db95a122294-08022581',
>>>>>>> 2db499a0f3d4667770f50dd9df219a5368fbffad
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
<<<<<<< HEAD
  'unifunc' => 'content_542deab89201d6_06876023',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542deab89201d6_06876023')) {function content_542deab89201d6_06876023($_smarty_tpl) {?><!DOCTYPE html>
=======
  'unifunc' => 'content_542db95a1aa9f5_81054682',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542db95a1aa9f5_81054682')) {function content_542db95a1aa9f5_81054682($_smarty_tpl) {?><!DOCTYPE html>
>>>>>>> 2db499a0f3d4667770f50dd9df219a5368fbffad
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
					$('#error-message-username').text("ไม่พบบัญชีผู้ใช้นี้ หรือท่านกรอกชื่อผู้ใช้ และรหัสผ่านผิดพลาด โปรดลองอีกครั้ง");
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
