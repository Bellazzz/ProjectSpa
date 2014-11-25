<?php /* Smarty version Smarty-3.1.18, created on 2014-11-18 12:11:39
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\getProductListOfOrder.html" */ ?>
<?php /*%%SmartyHeaderCode:7058546ad50b321f57-45687787%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b32426c8c97490d2100ed85dbf5ae2c6e3e52f12' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\getProductListOfOrder.html',
      1 => 1411381717,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7058546ad50b321f57-45687787',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ordPrdList' => 0,
    'ordPrd' => 0,
    'ord_date' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_546ad50b45ac78_83630343',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546ad50b45ac78_83630343')) {function content_546ad50b45ac78_83630343($_smarty_tpl) {?><table id="receives-product-list">
	<tr>
		<th>ลำดับ</th>
		<th>ผลิตภัณฑ์</th>
		<th>จำนวนที่สั่ง</th>
		<th>หน่วยนับ</th>
		<th>จำนวนที่รับ</th>
		<th>ราคาต่อหน่วย (บาท)</th>
		<th>ราคารวม</th>
		<th>คงเหลือ</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['ordPrd'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ordPrd']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ordPrdList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ordPrd']->key => $_smarty_tpl->tpl_vars['ordPrd']->value) {
$_smarty_tpl->tpl_vars['ordPrd']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['ordPrd']->key;
?>
	<tr>
		<td align="center">
			<?php echo $_smarty_tpl->tpl_vars['ordPrd']->value['no'];?>

			<input type="hidden" name="prd_id[]" value="<?php echo $_smarty_tpl->tpl_vars['ordPrd']->value['prd_id'];?>
">
		</td>
	    <td>
	    	<span class="prd_name"><?php echo $_smarty_tpl->tpl_vars['ordPrd']->value['prd_name'];?>
</span>
	    </td>
	    <td align="right">
	    	<span class="ordPrd_amount"><?php echo $_smarty_tpl->tpl_vars['ordPrd']->value['amount'];?>
</span>
	    </td>
	    <td align="center">
	    	<span class="unit_name"><?php echo $_smarty_tpl->tpl_vars['ordPrd']->value['unit_name'];?>
</span>
	    </td>
	    <td>
	    	<input type="text" name="recdtl_amount[]" value="0" min="0" max="<?php echo $_smarty_tpl->tpl_vars['ordPrd']->value['amount'];?>
">
	    </td>
	    <td>
	    	<input type="text" name="recdtl_price[]" value="<?php echo $_smarty_tpl->tpl_vars['ordPrd']->value['prd_price'];?>
">
	    </td>
	    <td align="right">
	    	<span class="sum_price">0</span>
	    </td>
	    <td align="right">
	    	<span class="remain"><?php echo $_smarty_tpl->tpl_vars['ordPrd']->value['amount'];?>
</span>
	    </td>
	</tr>
	<?php } ?>
	<tr>
		<td colspan="6" align="right">
			รวม
		</td>
		<td align="right">
			<span id="total_price">0</span>
			<input type="hidden" name="rec_total_price" value="0">
		</td>
		<td align="right">
			<span id="total_amount">0</span>
		</td>
	</tr>
</table>

<script type="text/javascript" id="tmpGetPrdListOrd">
setOrdDate('<?php echo $_smarty_tpl->tpl_vars['ord_date']->value;?>
');
$('#tmpGetPrdListOrd').remove();
</script>
<?php }} ?>
