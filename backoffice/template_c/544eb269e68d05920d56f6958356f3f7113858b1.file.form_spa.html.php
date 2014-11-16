<?php /* Smarty version Smarty-3.1.18, created on 2014-11-14 16:11:16
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_spa.html" */ ?>
<?php /*%%SmartyHeaderCode:223685465c7349c8582-07060983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '544eb269e68d05920d56f6958356f3f7113858b1' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_spa.html',
      1 => 1414720046,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '223685465c7349c8582-07060983',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
    'tableName' => 0,
    'tableNameTH' => 0,
    'code' => 0,
    'values' => 0,
    'randNum' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5465c7350e6a49_04920650',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5465c7350e6a49_04920650')) {function content_5465c7350e6a49_04920650($_smarty_tpl) {?><!DOCTYPE html>
<html lang="th">
<head>
	<title>Spa - Backoffice</title>
	<meta charset="UTF-8"/>
    
	<link rel="stylesheet" type="text/css" href="../inc/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/lazybingo.css">
	<link rel="stylesheet" type="text/css" href="../inc/jquery-ui/jquery-ui.css"> 
    <script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../inc/jquery-ui/jquery-ui.js"></script> 
    <script type="text/javascript" src="../js/mbk_common_function.js"></script>
    <script type="text/javascript" src="../js/mbk_main.js"></script>
    <script type="text/javascript" src="../js/mbk_form_table.js"></script>
    <script type="text/javascript">
        // Global variables
        var action      = '<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
';
        var tableName   = '<?php echo $_smarty_tpl->tpl_vars['tableName']->value;?>
';
		var tableNameTH = '<?php echo $_smarty_tpl->tpl_vars['tableNameTH']->value;?>
';
        var code        = '<?php echo $_smarty_tpl->tpl_vars['code']->value;?>
';
        var ajaxUrl     = 'form_spa.php';

		$(document).ready(function() {
			//spa_id	spa_name	spa_addr	spa_tel	spa_fax	spa_logo
			uploadImageInput({
				area: $('#spa_logo'),
				input: $('input[name="spa_logo"]'),
				selector: $('#spa_logo_file'),
				defaultValue: '<?php if ($_smarty_tpl->tpl_vars['values']->value['spa_logo']) {?>../img/spa/<?php echo $_smarty_tpl->tpl_vars['values']->value['spa_logo'];?>
?rand=<?php echo $_smarty_tpl->tpl_vars['randNum']->value;?>
<?php }?>'
			});
		});
    </script>
    
</head>
<body>
 	 	 	 	 
<?php echo $_smarty_tpl->getSubTemplate ("form_table_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ftb-body">
	<?php if ($_smarty_tpl->tpl_vars['action']->value=='VIEW_DETAIL') {?>
	<!-- VIEW_DETAIL -->
	<div class="table-view-detail-image full">
	<img src="<?php if ($_smarty_tpl->tpl_vars['values']->value['spa_logo']!='-') {?>../img/spa/<?php echo $_smarty_tpl->tpl_vars['values']->value['spa_logo'];?>
?rand=<?php echo $_smarty_tpl->tpl_vars['randNum']->value;?>
<?php } else { ?>../img/backoffice/no-pic.png<?php }?>">
	</div>
	<table class="table-view-detail">
		<tbody>
			<tr>
				<td>รหัสสปา :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['code']->value;?>
</td>
			</tr>
			<tr>
				<td>ชื่อสปา :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['values']->value['spa_name'];?>
</td>
			</tr>
			<tr>
				<td>ที่อยู่ :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['values']->value['spa_addr'];?>
</td>
			</tr>
			<tr>
				<td>เบอร์โทร :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['values']->value['spa_tel'];?>
</td>
			</tr>
			<tr>
				<td>E-mail :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['values']->value['spa_email'];?>
</td>
			</tr>
			<tr>
				<td>โทรสาร :</td>
				<td><?php echo $_smarty_tpl->tpl_vars['values']->value['spa_fax'];?>
</td>
			</tr>
		</tbody>
	</table>
	<?php } else { ?>	 	
	<!-- ADD, EDIT -->	 	 	 	 	
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="spa_name,spa_addr,spa_tel">
	<table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
			<tr>
				<td colspan="2">
					<label class="input-required">ชื่อสปา</label>
					<input id="spa_name" name="spa_name" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['spa_name'];?>
" valuepattern="character" require>
				</td>
			</tr>
			<tr>
                <td colspan="2">
                    <span id="err-spa_name-require" class="errInputMsg err-spa_name">โปรดป้อนชื่อสปา</span>
                    <span id="err-spa_name-character" class="errInputMsg err-spa_name">โปรดกรอกตัวอักษรภาษาไทย หรือตัวอักษรภาษาอังกฤษเท่านั้น</span>
                </td>
            </tr>
			<tr>
				<td colspan="2">
					<label class="input-required">ที่อยู่</label>
					<textarea id="spa_addr" name="spa_addr" class="form-input full" require><?php echo $_smarty_tpl->tpl_vars['values']->value['spa_addr'];?>
</textarea>
				</td>
			</tr>
			<tr>
                <td colspan="2">
                    <span id="err-spa_addr-require" class="errInputMsg err-spa_addr">โปรดป้อนที่อยู่สปา</span>
                </td>
            </tr>
			<tr>
				<td>
					<label class="input-required">เบอร์โทร</label>
					<input id="spa_tel" name="spa_tel" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['spa_tel'];?>
" require maxlength="10">
				</td>
				<td>
					<label>โทรสาร</label>
					<input id="spa_fax" name="spa_fax" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['spa_fax'];?>
">
				</td>
			</tr>
			<tr>
                <td>
                    <span id="err-spa_tel-require" class="errInputMsg err-spa_tel">โปรดป้อนเบอร์โทร</span>
                </td>
                <td></td>
            </tr>
			<tr>
                <td colspan="2">
                    <label>E-mail</label>
                    <input id="spa_email" name="spa_email" type="text" class="form-input full" 
                    value="<?php echo $_smarty_tpl->tpl_vars['values']->value['spa_email'];?>
" valuepattern="email">
                </td>
            </tr>
			<tr class="errMsgRow">
                <td colspan="2">
                    <span id="err-spa_email-email" class="errInputMsg err-spa_email">รูปแบบอีเมลไม่ถูกต้อง</span>
                </td>
            </tr>
			<tr>
				<td colspan="2">
					<label>รูปภาพสปา</label>
					<div id="spa_logo" class="uploadImageArea full"></div>
					<input type="hidden" name="spa_logo" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['spa_logo'];?>
">
				</td>
			</tr>
		</tbody>
	</table>
	
    </form>
	<form method="post" enctype="multipart/form-data">
		<input id="spa_logo_file" type="file" name="imageFile" class="uploadImageSelector" multiple="multiple">
	</form>
	<?php }?>
</div>
</body>
</html>
<!--
    [Note]
    1. ให้ใส่ field ที่ต้องการเช็คใน input[name="requiredFields"] โดยกำหนดชื่อฟิลด์ลงใน value หากมีมากกว่า 1 field ให้คั่นด้วยเครื่องหมาย คอมม่า (,) และห้ามมีช่องว่าง เช่น value="name,surname,address" เป็นต้น
    2. input จะต้องกำหนด id, name ให้ตรงกับชื่อฟิลด์ของตารางนั้นๆ และกำหนด value ให้มีรูปแบบ value="$values.ชื่อฟิลด์"
--><?php }} ?>
