<?php /* Smarty version Smarty-3.1.18, created on 2014-09-23 21:48:58
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_products.html" */ ?>
<?php /*%%SmartyHeaderCode:110854200ec97578f9-88540411%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a4444bf579b4ca48a0a8395c74326af9e3bc40b' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_products.html',
      1 => 1411480003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110854200ec97578f9-88540411',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54200ec98b50d9_98049417',
  'variables' => 
  array (
    'action' => 0,
    'tableName' => 0,
    'tableNameTH' => 0,
    'code' => 0,
    'values' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54200ec98b50d9_98049417')) {function content_54200ec98b50d9_98049417($_smarty_tpl) {?><!DOCTYPE html>
<html lang="th">
<head>
	<title>Spa - Backoffice</title>
	<meta charset="UTF-8"/>
    
	<link rel="stylesheet" type="text/css" href="../inc/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/lazybingo.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
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
        var ajaxUrl     = 'form_products.php';

        $(document).ready(function () {
            selectReference({
                elem			: $('#prdtyp_id'),
                tableName		: 'product_types',
                keyFieldName	: 'prdtyp_id',
                textFieldName	: 'prdtyp_name',
				searchTool		: true,
                defaultValue	: '<?php echo $_smarty_tpl->tpl_vars['values']->value['prdtyp_id'];?>
'
            });

			selectReference({
                elem			: $('#brand_id'),
                tableName		: 'brands',
                keyFieldName	: 'brand_id',
                textFieldName	: 'brand_name',
				searchTool		: true,
                defaultValue	: '<?php echo $_smarty_tpl->tpl_vars['values']->value['brand_id'];?>
'
            });

			selectReference({
                elem			: $('#unit_id'),
                tableName		: 'units',
                keyFieldName	: 'unit_id',
                textFieldName	: 'unit_name',
				searchTool		: true,
                defaultValue	: '<?php echo $_smarty_tpl->tpl_vars['values']->value['unit_id'];?>
'
            });

            uploadImageInput({
                area: $('#prd_pic'),
                input: $('input[name="prd_pic"]'),
                selector: $('#prd_pic_file'),
                defaultValue: '<?php if ($_smarty_tpl->tpl_vars['values']->value['prd_pic']) {?>../img/products/<?php echo $_smarty_tpl->tpl_vars['values']->value['prd_pic'];?>
<?php }?>'
            });
        });
    </script>
    
</head>
<body>

<?php echo $_smarty_tpl->getSubTemplate ("form_table_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ftb-body">
    <div class="ftb-body">
    <?php if ($_smarty_tpl->tpl_vars['action']->value=='VIEW_DETAIL') {?>
    <!-- VIEW_DETAIL-->
    <div class="table-view-detail-image full">
        <img src="../img/products/<?php echo $_smarty_tpl->tpl_vars['values']->value['prd_pic'];?>
">
    </div>
    <table class="table-view-detail">
        <tbody>                     
            <tr>
                <td>รหัสแพ็คเกจ :</td>
                <td><?php echo $_smarty_tpl->tpl_vars['code']->value;?>
</td>
            </tr>
            <tr>
                <td>ประเภทผลิตภัณฑ์ :</td>
                <td><div id="prdtyp_id" class="select-reference text"></td>
            </tr>
            <tr>
                <td>ยี่ห้อ :</td>
                <td><div id="brand_id" class="select-reference text"></td>
            </tr>
            <tr>
                <td>ชื่อผลิตภัณฑ์ :</td>
                <td><?php echo $_smarty_tpl->tpl_vars['values']->value['prd_name'];?>
</td>
            </tr>
            <tr>
                <td>ราคา :</td>
                <td><?php echo $_smarty_tpl->tpl_vars['values']->value['prd_price'];?>
   บาท</td>
            </tr>
            <tr>
                <td>จำนวน :</td>
                <td><?php echo $_smarty_tpl->tpl_vars['values']->value['prd_amount'];?>
   <div id="unit_id" class="select-reference text"></td>
            </tr>
        </tbody>
    </table>
    <?php } else { ?>      
    <!-- ADD, EDIT -->
    <form id="form-table" name="form-table" onsubmit="return false;">
	<input type="hidden" name="requiredFields" value="prd_name,prdtyp_id,brand_id,prd_price,prd_amount,unit_id">
    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
	    <tbody>
			<tr>
			    <td colspan="2">
				    <label class="input-required">ชื่อผลิตภัณฑ์</label>
				    <input id="prd_name" name="prd_name" type="text" class="form-input full" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['prd_name'];?>
">
			    </td>
		    </tr>
			<tr>
			    <td colspan="2">
				    <label class="input-required">ชื่อประเภทผลิตภัณฑ์</label>
				    <div id="prdtyp_id" class="select-reference form-input full"></div>
			    </td>
		    </tr>
			<tr>
			    <td colspan="2">
				    <label class="input-required">ชื่อยี่ห้อ</label>
				    <div id="brand_id" class="select-reference form-input full"></div>
			    </td>
		    </tr>
		    <tr>
                <td>
                    <label class="input-required">ราคา (บาท)</label>
					 <input id="prd_price" name="prd_price" type="text" class="form-input half" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['prd_price'];?>
">
                </td>
                <td>
					<label class="twoInput twoInput-small">จำนวน</label>
					<label class="twoInput twoInput-large">ชื่อหน่วยนับ</label>
                    <br>
					<input id="prd_amount" name="prd_amount" type="text" class="form-input twoInput twoInput-small" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['prd_amount'];?>
">
					<div id="unit_id" class="select-reference form-input twoInput twoInput-large">
                </td>
            </tr>
	    </tbody>
    </table>

    <table class="mbk-form-input-normal" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td>
                    <div id="prd_pic" class="uploadImageArea full"></div>
                    <input type="hidden" name="prd_pic" value="<?php echo $_smarty_tpl->tpl_vars['values']->value['prd_pic'];?>
">
                </td>
            </tr>
        </tbody>
    </table>
    </form>

    <form method="post" enctype="multipart/form-data">
        <input id="prd_pic_file" type="file" name="imageFile" class="uploadImageSelector" multiple="multiple">
    </form>

    <?php }?>
</div>
</body>
</html>
<!--
    [Note]
    1. ให้ใส่ field ที่ต้องการเช็คใน input[name="requiredFields"] โดยกำหนดชื่อฟิลด์ลงใน value หากมีมากกว่า 1 field ให้คั่นด้วยเครื่องหมาย คอมม่า (,) และห้ามมีช่องว่าง เช่น value="name,surname,address" เป็นต้น
    2. input จะต้องกำหนด id, name ให้ตรงกับชื่อฟิลด์ของตารางนั้นๆ และกำหนด value ให้มีรูปแบบ value="$values.ชื่อฟิลด์"
	3.  input[name="uniqueFields"] ใส่ชื่อฟิลด์ที่ต้องการเช็คว่าห้ามซ้ำ
--><?php }} ?>
