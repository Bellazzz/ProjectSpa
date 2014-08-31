<?php /* Smarty version Smarty-3.1.18, created on 2014-08-29 10:14:46
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\printEmployeeCard.html" */ ?>
<?php /*%%SmartyHeaderCode:1924253ffe2166cb960-92154653%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93d9b7287fff581bb0b90e8cfb8406c36cbd25a7' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\printEmployeeCard.html',
      1 => 1409237425,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1924253ffe2166cb960-92154653',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'empInfo' => 0,
    'datePrint' => 0,
    'dateExpire' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53ffe2168315c9_84058642',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ffe2168315c9_84058642')) {function content_53ffe2168315c9_84058642($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<title>Spa - Backoffice</title>
	<meta charset="utf-8"/>
    
	<link rel="stylesheet" type="text/css" href="../inc/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/lazybingo.css">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="../js/mbk_main.js"></script>
	<style>
		#print-btn {
			margin-right: 15px;
		}
		.empCard {
			width: 244px;
			height: 292px;
			border: 1px solid #888;
			border-radius: 10px;
			font-size: 11px;
			padding: 8px;
			position: relative;
			float: left;
			overflow: hidden;
		}
		.empCard-logo-container {
			text-align: center;
			border-bottom: 1px solid #888;
			margin: -8px -8px 0 -8px;
			background: #8AC007;
			border-radius: 8px 8px 0 0;
		}
		.empCard-logo {
			width: 150px;
			margin: 0px auto;
			padding: 0px;
			display: block;
		}
		.empCard-spa-name {
			display: block;
			text-align: center;
			margin: 5px 0 10px 0;
		}
		.empCard-emp-pic {
			text-align: center;
			margin: 8px 0;
		}
		.empCard-emp-pic img {
			height: 100px;
			border-radius: 3px;
		}
		.empCard-info-label {
			font-weight: bold;
			font-size: 11px;
			width: 80px;
		}
		.empCard-info-value {
			font-size: 11px;
		}
		.empCard-pos-name {
			font-size: 12px;
		}
		.empCard-date {
			padding: 0 10px;
			background: #444;
			color: white;
			position: absolute;
			width: 100%;
			left: 0;
			bottom: 10px;
		}
		.empCard-date .empCard-info-label {
			font-weight: normal;
			width: 100px;
			color: white;
		}
		.empCard-desc {
			margin: -10px;
			padding: 20px 10px 10px 20px;
			background: #f9f9f9;
		}
		.desc-title {
			font-weight: bold;
			margin-bottom: 10px;
			display: block;
			font-size: 12px;
		}
		.empCard-barcode {
			text-align: center;
			position: absolute;
			width: 100%;
			bottom: 10px;
			left: 0;
		}
	</style>
	<script>
		$(document).ready(function() {
			$('#print-btn').click(function() {
				printEmployeeCard();
			});
			$('#cancel-btn').click(function() {
				parent.closeManageBox();
			});
		});

		function printEmployeeCard()
		{
		   var printReadyEle = document.getElementById("printArea");
		   var shtml = '<HTML>\n<HEAD>\n';
		   if (document.getElementsByTagName != null)
		   {
			  var sheadTags = document.getElementsByTagName("head");
			  if (sheadTags.length > 0)
				 shtml += sheadTags[0].innerHTML;
			}
			shtml += '</HEAD>\n<BODY>\n';
			if (printReadyEle != null)
			{
			   shtml += '<form name = frmform1>';
			   shtml += printReadyEle.innerHTML;
			}
			shtml += '\n</form>\n</BODY>\n</HTML>';
			var printWin1 = window.open();
			printWin1.document.open();
			printWin1.document.write(shtml);
			printWin1.document.close();
			setTimeout(function() {
				printWin1.print();
			}, 100);
		}
	</script>

	
</head>
<body>
<div class="ftb-header">
	<div class="title-container">
		<h1 id="ftb-title">พิมพ์บัตรพนักงาน</h1>
	</div>
    <div class="toolbar-container clearfix">
		<button id="print-btn" class="button button-icon button-icon-print">พิมพ์</button>
		<button id="cancel-btn" class="button button-icon button-icon-delete">ยกเลิก</button>
    </div>
</div>
<div id="printArea" class="ftb-body">
	<div class="empCard">
		<div class="empCard-logo-container">
			<img class="empCard-logo" src="../img/backoffice/logo-back-office.png">
		</div>
		<span class="empCard-spa-name">สปาเพื่อสุขภาพ โรงพยาบาลเจ้าพระยาอภัยภูเบศร</span>
		<div class="empCard-emp-pic">
			<img src="../img/employees/<?php echo $_smarty_tpl->tpl_vars['empInfo']->value['emp_pic'];?>
">
		</div>
		<table>
		  <tr>
			<td class="empCard-info-label">รหัสพนักงาน</td>
			<td class="empCard-info-value"><?php echo $_smarty_tpl->tpl_vars['empInfo']->value['emp_id'];?>
</td>
		  </tr>
		  <tr>
			<td class="empCard-info-label">ชื่อพนักงาน</td>
			<td class="empCard-info-value"><?php echo $_smarty_tpl->tpl_vars['empInfo']->value['emp_name'];?>
&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['empInfo']->value['emp_surname'];?>
</td>
		  </tr>
		  <tr>
			<td class="empCard-pos-name" colspan="2"><?php echo $_smarty_tpl->tpl_vars['empInfo']->value['pos_name'];?>
</td>
		  </tr>
		</table>
		<div class="empCard-date">
			<table>
				<tr>
					<td class="empCard-info-label">วันที่ออกบัตร</td>
					<td class="empCard-info-value"><?php echo $_smarty_tpl->tpl_vars['datePrint']->value;?>
</td>
				</tr>
				<tr>
					<td class="empCard-info-label">วันที่บัตรหมดอายุ</td>
					<td class="empCard-info-value"><?php echo $_smarty_tpl->tpl_vars['dateExpire']->value;?>
</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="empCard">
		<ul class="empCard-desc">
		<span class="desc-title">เงื่อนไขการใช้บัตร</span>
		<li>บัตรนี้ถือเป็นทรัพย์สินของสปา พนักงานจะต้องคืนบัตรทันทีเมื่อพ้นสภาพการเป็นพนักงาน</li>
		<li>พนักงานจะต้องเปลี่ยนบัตรใหม่เมื่อบัตรหมดอายุ</li>
		<li>พนักงานต้องติดบัตรนี้ไว้ขณะทำงาน</li>
		<li>บัตรหายกรุณาแจ้งทำบัตรใหม่ทันที และพนักงานจะต้องเสียค่าทำบัตรใหม่เอง</li>
		<li>หากบัตรชำรุดก่อนวันที่บัตรหมดอายุพนักงานจะต้องเสียค่าทำบัตรใหม่เอง</li>
		<li>บัตรนี้ใช้เฉพาะผู้ที่เป็นเจ้าของบัตรเท่านั้นจะใช้แทนกันไม่ได้</li>
		</ul>
		<div class="empCard-barcode">
			<img src="barcode.php?text=<?php echo $_smarty_tpl->tpl_vars['empInfo']->value['emp_id'];?>
">
		</div>
	</div>
	
</div>
</body>
</html><?php }} ?>
