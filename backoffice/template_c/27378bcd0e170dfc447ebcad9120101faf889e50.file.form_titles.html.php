<?php /* Smarty version Smarty-3.1.18, created on 2014-08-20 14:13:41
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_titles.html" */ ?>
<?php /*%%SmartyHeaderCode:201123c30cd2bb41949-63708203%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27378bcd0e170dfc447ebcad9120101faf889e50' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_titles.html',
      1 => 1408470956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201123c30cd2bb41949-63708203',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_3c30cd2bc39c66_97558076',
  'variables' => 
  array (
    'action' => 0,
    'tableName' => 0,
    'code' => 0,
    'values' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_3c30cd2bc39c66_97558076')) {function content_3c30cd2bc39c66_97558076($_smarty_tpl) {?><!DOCTYPE html>
<html lang="th">
<head>
	<title>Spa - Backoffice</title>
	<meta charset="UTF-8"/>
    
	<link rel="stylesheet" type="text/css" href="../css/lazybingo.css">
    <link rel="stylesheet" type="text/css" href="../jquery-ui/jquery-ui.css"> <!--include if want to use datepicker-->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../jquery-ui/jquery-ui.js"></script> <!--include if want to use datepicker-->
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
        var ajaxUrl     = 'form_table.php'; // เปลี่ยนเป็นชื่อ form_ชื่อตาราง.php กรณีที่การทำงานแตกต่างจากปกติ

        $(document).ready(function () {
            $("#bk_date").datepicker({
                inline: true
            });

            selectReference({
                elem: $('#ref_pos_id'),
                tableName: 'titles',
                keyFieldName: 'title_id',
                textFieldName: 'title_name',
                defaultValue: 'T01'
            });
            selectReference({
                elem: $('#unit_id'),
                tableName: 'units',
                keyFieldName: 'unit_id',
                textFieldName: 'unit_name',
                searchTool: false
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
	<input type="hidden" name="requiredFields" value="title_name"> <!--ใน property value ให้ใส่ชื่อ field ที่ต้องการเช็คค่าว่าง หากมีมากกว่า 1 field ให้คั่นด้วยเครื่องหมาย , และห้ามมีช่องว่าง เช่น name, surname เป็นต้น-->
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
		    <tr>
			    <td>
				    <label>คำนำหน้าชื่อ</label>
				    <input id="title_name" name="title_name" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['title_name'];?>
"> <!--เปลี่ยน id, name, value-->
			    </td>
		    </tr>
	    </tbody>
    </table>
    </form>
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
		    <tr>
                <td>
                    <label>ตำแหน่ง:</label>
				    <div id="ref_pos_id" class="select-reference form-input half"></div>
			    </td>
			    <td>
				    <label>วันที่จอง</label>
				    <input id="bk_date" name="bk_date" type="text" class="form-input half">
			    </td>
		    </tr>
            <tr>
                <td>
                    <label class="twoInput twoInput-large">% completed</label>
                    <label class="twoInput twoInput-small">Priority</label>
                    <br />
                    <input type="text" class="form-input twoInput twoInput-large" />
                    <input type="text" class="form-input twoInput twoInput-small" />
                </td>
                <td>
                    <label class="twoInput twoInput-small">จำนวน</label>
                    <label class="twoInput twoInput-large"></label>
                    <br />
                    <input type="text" class="form-input twoInput twoInput-large" />
                    <div id="unit_id" class="select-reference form-input twoInput twoInput-small" />
                </td>
            </tr>
	    </tbody>
    </table>
</div>
</body>
</html><?php }} ?>
