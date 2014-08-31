<?php /* Smarty version Smarty-3.1.18, created on 2014-08-31 21:12:23
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\form_table_header.html" */ ?>
<?php /*%%SmartyHeaderCode:206254031f3795d5b0-58197933%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0cc5612f2b8da9aa71c09fc4bfb6d25d4a9518cf' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\form_table_header.html',
      1 => 1408871450,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206254031f3795d5b0-58197933',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54031f3798b527_75184800',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54031f3798b527_75184800')) {function content_54031f3798b527_75184800($_smarty_tpl) {?><div class="ftb-header">
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
                 <?php }?>
		    </li>
		    <li>
			    <a id="cancel-btn">
				    <i class="fa fa-times"></i> ยกเลิก
			    </a>
		    </li>
	    </ul>
    </div>
</div><?php }} ?>
