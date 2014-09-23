<?php /* Smarty version Smarty-3.1.18, created on 2014-09-23 11:30:15
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\login.html" */ ?>
<?php /*%%SmartyHeaderCode:7235420e947ba3a70-66064513%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a9035e5238a3c8d667f080899ae1f6da5f5e566' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\login.html',
      1 => 1411442280,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7235420e947ba3a70-66064513',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'session_emp_id' => 0,
    'session_emp_user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5420e947c656e3_00371128',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5420e947c656e3_00371128')) {function content_5420e947c656e3_00371128($_smarty_tpl) {?><!DOCTYPE html>
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
<div style="height: 40px;"></div>
emp_id : <?php echo $_smarty_tpl->tpl_vars['session_emp_id']->value;?>
<br>
emp_user : <?php echo $_smarty_tpl->tpl_vars['session_emp_user']->value;?>
<br>
<form id="form-login" name="form-login" onsubmit="return false;">
	<div id="error-message-username"></div>
	<input type="text" name="username">
	<div id="error-message-password"></div>
	<input type="password" name="password">
	<button id="login-btn">Login</button>
</form>

<div class="loginPage-footer"></div>
</body>
</html><?php }} ?>
