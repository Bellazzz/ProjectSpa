<?php /* Smarty version Smarty-3.1.18, created on 2014-10-13 20:43:53
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_table_header.html" */ ?>
<?php /*%%SmartyHeaderCode:23508543bc909f23ee7-51363126%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0cc5612f2b8da9aa71c09fc4bfb6d25d4a9518cf' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_table_header.html',
      1 => 1411381717,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23508543bc909f23ee7-51363126',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
    'hideEditButton' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_543bc90a0a74c0_25749594',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_543bc90a0a74c0_25749594')) {function content_543bc90a0a74c0_25749594($_smarty_tpl) {?><div class="ftb-header">
	<div class="title-container">
		<h1 id="ftb-title"></h1>
	</div>
    <div class="toolbar-container clearfix">
	    <ul class="toolbar-menu">
		    <li>
		    	<?php if ($_smarty_tpl->tpl_vars['action']->value=='ADD') {?>
			    <a id="save-btn">
				    <i class="fa fa-check"></i> เพิ่ม
			    </a>
			    <?php } elseif ($_smarty_tpl->tpl_vars['action']->value=='EDIT') {?>
			    <a id="save-btn">
				    <i class="fa fa-floppy-o"></i> บันทึก
			    </a>
			    <?php } elseif ($_smarty_tpl->tpl_vars['action']->value=='VIEW_DETAIL') {?>
				    <?php if (!$_smarty_tpl->tpl_vars['hideEditButton']->value) {?>
				    <a id="edit-btn">
					    <i class="fa fa-pencil"></i> แก้ไขข้อมูล
				    </a>
				    <?php }?>
			    <?php }?>
		    </li>
		    <li>
			    <a id="cancel-btn">
			    	<?php if ($_smarty_tpl->tpl_vars['action']->value=='VIEW_DETAIL') {?>
			    	<i class="fa fa-times"></i> ปิด
			    	<?php } else { ?>
				    <i class="fa fa-times"></i> ยกเลิก
				    <?php }?>
			    </a>
		    </li>
	    </ul>
    </div>
</div><?php }} ?>
