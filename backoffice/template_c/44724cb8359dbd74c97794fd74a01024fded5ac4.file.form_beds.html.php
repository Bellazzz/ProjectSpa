<?php /* Smarty version Smarty-3.1.18, created on 2014-08-20 02:13:12
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_beds.html" */ ?>
<?php /*%%SmartyHeaderCode:1756953f38d3ae19b95-46016884%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44724cb8359dbd74c97794fd74a01024fded5ac4' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_beds.html',
      1 => 1408471990,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1756953f38d3ae19b95-46016884',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53f38d3aefc0a0_75144392',
  'variables' => 
  array (
    'action' => 0,
    'tableName' => 0,
    'code' => 0,
    'values' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f38d3aefc0a0_75144392')) {function content_53f38d3aefc0a0_75144392($_smarty_tpl) {?><!DOCTYPE html>
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

        $(document).ready(function () {
            selectReference({
                elem: $('#room_id'),
                tableName: 'rooms',
                keyFieldName: 'room_id',
                textFieldName: 'room_name',
                defaultValue: '<?php echo $_smarty_tpl->tpl_vars['values']->value['room_id'];?>
'
            });
        });
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
	<input type="hidden" name="requiredFields" value="bed_name,room_id"> <!--ใน property value ให้ใส่ชื่อ field ที่ต้องการเช็คค่าว่าง หากมีมากกว่า 1 field ให้คั่นด้วยเครื่องหมาย , และห้ามมีช่องว่าง เช่น name,surname เป็นต้น-->
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
		    <tr>
			    <td>
				    <label>ชื่อเตียงนวด</label>
				    <input id="bed_name" name="bed_name" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['bed_name'];?>
">
			    </td>
		    </tr>
            <tr>
			    <td>
				    <label>ชื่อห้องนวด</label>
				    <div id="room_id" class="select-reference form-input full"></div>
			    </td>
		    </tr>
	    </tbody>
    </table>
    </form>
</div>
</body>
</html><?php }} ?>
