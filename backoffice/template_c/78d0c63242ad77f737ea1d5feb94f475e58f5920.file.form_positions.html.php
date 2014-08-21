<?php /* Smarty version Smarty-3.1.18, created on 2014-08-21 12:00:50
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_positions.html" */ ?>
<?php /*%%SmartyHeaderCode:2967753f3712aa1e663-01725381%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78d0c63242ad77f737ea1d5feb94f475e58f5920' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_positions.html',
      1 => 1408465078,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2967753f3712aa1e663-01725381',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53f3712aacde92_56236805',
  'variables' => 
  array (
    'action' => 0,
    'tableName' => 0,
    'code' => 0,
    'values' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f3712aacde92_56236805')) {function content_53f3712aacde92_56236805($_smarty_tpl) {?><!DOCTYPE html>
<html lang="th">
<head>
	<title>Spa - Backoffice</title>
	<meta charset="UTF-8"/>
    
	<link rel="stylesheet" type="text/css" href="../css/lazybingo.css">
    <!--<link rel="stylesheet" type="text/css" href="../jquery-ui/jquery-ui.css">--> <!--include if want to use datepicker-->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <!--<script type="text/javascript" src="../jquery-ui/jquery-ui.js"></script>--> <!--include if want to use datepicker-->
    <script type="text/javascript" src="../js/mbk_common_function.js"></script>
    <script type="text/javascript" src="../js/mbk_main.js"></script>
    <script type="text/javascript" src="../js/mbk_form_table.js"></script>
    <script type="text/javascript">
        // Global variables
        var action      = '<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
';
        var tableName   = '<?php echo $_smarty_tpl->tpl_vars['tableName']->value;?>
';
        var code        = '<?php echo $_smarty_tpl->tpl_vars['code']->value;?>
';
        var ajaxUrl     = 'form_table.php';
    </script>
    
</head>
<body>

<div class="ftb-header">
    <div class="toolbar-container clearfix">
	    <ul class="toolbar-menu">
		    <li>
                <?php if ($_smarty_tpl->tpl_vars['action']->value=='ADD') {?>
			    <a id="save-btn">
				    <span class="mbk-icon mbk-check"></span> เพิ่ม
			    </a>
                <?php } elseif ($_smarty_tpl->tpl_vars['action']->value=='EDIT') {?>
                <a id="save-btn">
				    <span class="mbk-icon mbk-save"></span> บันทึก
			    </a>
                 <?php }?>
		    </li>
		    <li>
			    <a id="cancel-btn">
				    <span class="mbk-icon mbk-cross"></span> ยกเลิก
			    </a>
		    </li>
	    </ul>
    </div>
</div>
<div class="ftb-body">
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="pos_name"> <!--Set reqired input-->
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
		    <tr>
			    <td>
				    <label>ชื่อตำแหน่ง</label>
				    <input id="pos_name" name="pos_name" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['pos_name'];?>
">
			    </td>
		    </tr>
	    </tbody>
    </table>
    </form>
</div>
</body>
</html><?php }} ?>
