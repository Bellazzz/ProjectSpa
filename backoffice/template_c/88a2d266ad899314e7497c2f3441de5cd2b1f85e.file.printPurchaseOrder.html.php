<<<<<<< HEAD
<?php /* Smarty version Smarty-3.1.18, created on 2014-10-03 04:48:12
=======
<<<<<<< HEAD
<?php /* Smarty version Smarty-3.1.18, created on 2014-09-30 10:18:32
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\printPurchaseOrder.html" */ ?>
<?php /*%%SmartyHeaderCode:8288542a12f8e2c9b8-07321391%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.18, created on 2014-10-03 00:56:13
>>>>>>> 0920bacaa5193ba7991fde129f14d49b3eeb31c9
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\printPurchaseOrder.html" */ ?>
<?php /*%%SmartyHeaderCode:31801542d7f40d29cb1-16153906%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> ec0f594f6de95ecbbc77a050f8ce2b8d0e13898b
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88a2d266ad899314e7497c2f3441de5cd2b1f85e' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\printPurchaseOrder.html',
<<<<<<< HEAD
      1 => 1412282881,
=======
<<<<<<< HEAD
      1 => 1411381717,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8288542a12f8e2c9b8-07321391',
  'function' => 
  array (
  ),
  'variables' => 
  array (
=======
      1 => 1412268968,
>>>>>>> 0920bacaa5193ba7991fde129f14d49b3eeb31c9
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31801542d7f40d29cb1-16153906',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_542d7f40ef5dc7_22004659',
  'variables' => 
  array (
    'printNum' => 0,
>>>>>>> ec0f594f6de95ecbbc77a050f8ce2b8d0e13898b
    'ordData' => 0,
    'spaData' => 0,
    'orddtlData' => 0,
    'orddlt' => 0,
    'prdWhiteSpaceRows' => 0,
    'totalPriceText' => 0,
    'totalPrice' => 0,
    'nowDateThai' => 0,
  ),
  'has_nocache_code' => false,
<<<<<<< HEAD
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_542a12f90de5f6_83019792',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542a12f90de5f6_83019792')) {function content_542a12f90de5f6_83019792($_smarty_tpl) {?><!DOCTYPE html>
=======
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542d7f40ef5dc7_22004659')) {function content_542d7f40ef5dc7_22004659($_smarty_tpl) {?><!DOCTYPE html>
>>>>>>> ec0f594f6de95ecbbc77a050f8ce2b8d0e13898b
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

		#printArea, form[name="frmform1"] {
			text-align: center;
			font-size: 12px;
		}
		.order-data-table-container {
			margin: 20px 0 5px 0;
		}
		.order-data-table {
			width: 49.5%;
			min-height: 150px;
			padding: 10px;
			border:1px solid #555;
			-webkit-border-radius: 4px;
			-moz-border-radius: 4px;
			border-radius: 4px;
		}
		.order-data-table:first-child {
			float:left;
		}
		.order-data-table:last-child {
			float:right;
		}
		.order-data-table table{
			width: 100%;
			line-height: 1.4em;
		}
		.order-data-table table td {
			vertical-align: top;
			text-align: left;
			font-size: 12px;
		}
		.order-data-table table td:first-child {
			padding-right: 20px;
			white-space: nowrap;
		}
		.order-data-table table td:last-child {
			width: 100%;
		}
		.order-data-table table tfoot td {
			border : 1px solid #555;
		}
		.signature {
			display: inline-block;
			border: 1px solid #555;
			padding: 30px;
		}
		.space-for-signature {
			width: 160px;
			height: 10px;
			margin: 5px 50px;
			border-bottom: 1px solid #555;
		}
		.productList-container {
			border: 1px solid #555;
			-webkit-border-radius: 4px;
			-moz-border-radius: 4px;
			border-radius: 4px;
			overflow: hidden;
		    margin-bottom: 20px;
		}
		table.productList {
		    border-collapse: collapse;
		    width: 100%;
		    font-size: 12px;
		}
		table.productList th {
		    color: #ffffff;
		    background-color: #555555;
		    border: 1px solid #555555;
		    padding: 3px;
		    vertical-align: top;
		    text-align: center;
		}
		table.productList td {
		    border: none;
		    padding: 5px;
		    padding-top: 7px;
		    padding-bottom: 7px;
		    vertical-align: top;
			border: 1px solid #555;
		}
		table.productList td:first-child {
			border-left: none;
		}
		table.productList td:last-child {
			border-right: none;
		}
		table.productList tbody tr:last-child td {
			border-bottom: 1px solid #555
		}
		table.productList tfoot tr:last-child td {
			border-bottom: none;
		}
	</style>
	<script>
<<<<<<< HEAD
		$(document).ready(function() {
			$('#print-btn').click(function() {
				printPurchaseOrder();
=======
		var printNum = '<?php echo $_smarty_tpl->tpl_vars['printNum']->value;?>
';

		$(document).ready(function() {
			$('#print-btn').click(function() {
				confirmPrint();
>>>>>>> ec0f594f6de95ecbbc77a050f8ce2b8d0e13898b
			});
			$('#cancel-btn').click(function() {
				parent.closeManageBox();
			});
		});

<<<<<<< HEAD
=======
		function confirmPrint() {
			if(printNum > 0) {
				parent.showActionDialog({
	                title: 'พิมพ์ใบสั่งซื้อซ้ำ',
	                message: 'ใบสั่งซื้อนี้ถูกพิมพ์ไปแล้ว ' + printNum + ' ครั้ง ท่านต้องการพิมพ์อีกใช่หรือไม่?',
	                actionList: [
	                    {
	                        id: 'ok',
	                        name: 'ตกลง',
	                        desc: 'พิมพ์ใบสั่งซื้อนี้',
	                        func:
	                        function() {
	                        	insertPrintPurchaseOrders();
	                        }
	                    },
		                {
		                    id: 'cancel',
		                    name: 'ยกเลิก',
		                    desc: 'ไม่พิมพ์ใบสั่งซื้อ',
		                    func:
		                    function() {
		                        parent.hideActionDialog();
		                    }
		                }
	                ],
	                boxWidth: 400
	            });
			} else {
				insertPrintPurchaseOrders();
			}
			
		}

		function insertPrintPurchaseOrders() {
			$.ajax({
        		url: '../common/ajaxInsertPrintPurchaseOrders.php',
        		type: 'POST',
        		data: {
        			ord_id: '<?php echo $_smarty_tpl->tpl_vars['ordData']->value['ord_id'];?>
'
        		},
        		success:
        		function(response) {
        			if(response == "PASS") {
        				parent.hideActionDialog();
        				parent.closeManageBox();
        				printPurchaseOrder();
        			} else if(response == "INSERT_PRINT_PURCHASE_ORDERS_FAIL") {
        				alert('เกิดข้อผิดพลาด! ไม่สามารถเพิ่มข้อมูลการพิมพ์ใบสั่งซื้อได้');
        			} else {
        				alert(response);
        			}
        		}
        	});
		}

>>>>>>> ec0f594f6de95ecbbc77a050f8ce2b8d0e13898b
		function printPurchaseOrder()
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
		<h1 id="ftb-title">ใบสั่งซื้อ (เลขที่ <?php echo $_smarty_tpl->tpl_vars['ordData']->value['ord_id'];?>
)</h1>
	</div>
    <div class="toolbar-container clearfix">
    	<?php if ($_smarty_tpl->tpl_vars['ordData']->value['ordstat_id']=='OS01') {?>
		<button id="print-btn" class="button button-icon button-icon-print">พิมพ์</button>
		<?php }?>
		<button id="cancel-btn" class="button button-icon button-icon-delete">ยกเลิก</button>
    </div>
</div>
<div id="printArea" class="ftb-body">
	<h2><?php echo $_smarty_tpl->tpl_vars['spaData']->value['spa_name'];?>
</h2>
	<p>
		<?php echo $_smarty_tpl->tpl_vars['spaData']->value['spa_addr'];?>
<br>
		โทรศัพท์ : <?php echo $_smarty_tpl->tpl_vars['spaData']->value['spa_tel'];?>
 โทรสาร : <?php echo $_smarty_tpl->tpl_vars['spaData']->value['spa_fax'];?>
 อีเมล : 
	</p>
	<h2>ใบสั่งซื้อผลิตภัณฑ์</h2>
	<div class="order-data-table-container clearfix">
		<div class="order-data-table">
			<table>
				<tr>
					<td><b>ชื่อผู้ติดต่อ</b></td>
					<td><?php echo $_smarty_tpl->tpl_vars['ordData']->value['comp_contact'];?>
</td>
				</tr>
				<tr>
					<td><b>ชื่อบริษัท</b></td>
					<td><?php echo $_smarty_tpl->tpl_vars['ordData']->value['comp_name'];?>
</td>
				</tr>
				<tr>
					<td><b>ที่อยู่</b></td>
					<td><?php echo $_smarty_tpl->tpl_vars['ordData']->value['comp_addr'];?>
</td>
				</tr>
				<tr>
					<td><b>โทรศัพท์</b></td>
					<td><?php echo $_smarty_tpl->tpl_vars['ordData']->value['comp_tel'];?>
 &nbsp;&nbsp;&nbsp;&nbsp; <b>โทรสาร</b>&nbsp; <?php echo $_smarty_tpl->tpl_vars['ordData']->value['fax'];?>
</td>
				</tr>
			</table>
		</div>
		<div class="order-data-table">
			<table>
				<tr>
					<td><b>เลขที่ใบสั่งซื้อ</b></td>
					<td><?php echo $_smarty_tpl->tpl_vars['ordData']->value['ord_id'];?>
</td>
				</tr>
				<tr>
					<td><b>วันที่ออกใบสั่งซื้อ</b></td>
					<td><?php echo $_smarty_tpl->tpl_vars['ordData']->value['ord_date'];?>
</td>
				</tr>
				<tr>
					<td><b>วันกำหนดส่ง</b></td>
					<td><?php echo $_smarty_tpl->tpl_vars['ordData']->value['ord_snd_date'];?>
</td>
				</tr>
			</table>
		</div>
	</div> <!--end order-table-container-->
	
	
	<div class="productList-container">
		<table class="productList">
	        <thead>
	            <tr>
	            	<th>ลำดับ</th>
	                <th>ชื่อผลิตภัณฑ์</th>
	                <th>จำนวน</th>
	                <th>หน่วยนับ</th>
	                <th>ราคาต่อหน่วย(บาท)</th>
	                <th>ราคารวม(บาท)</th>
	            </tr>
	        </thead>
	        <tbody>
	            <?php  $_smarty_tpl->tpl_vars['orddlt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['orddlt']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['orddtlData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['orddlt']->key => $_smarty_tpl->tpl_vars['orddlt']->value) {
$_smarty_tpl->tpl_vars['orddlt']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['orddlt']->key;
?>
	            <tr>
	            	<td align="center"><?php echo $_smarty_tpl->tpl_vars['orddlt']->value['no'];?>
</td>
	                <td align="left"><?php echo $_smarty_tpl->tpl_vars['orddlt']->value['prd_name'];?>
</td>
	                <td align="right"><?php echo $_smarty_tpl->tpl_vars['orddlt']->value['orddtl_amount'];?>
</td>
	                <td align="left"><?php echo $_smarty_tpl->tpl_vars['orddlt']->value['unit_name'];?>
</td>
	                <td align="right"><?php echo $_smarty_tpl->tpl_vars['orddlt']->value['prd_price'];?>
</td>
	                <td align="right"><?php echo $_smarty_tpl->tpl_vars['orddlt']->value['sum_price'];?>
</td>
	            </tr>
	            <?php } ?>
	            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['name'] = 'prdWhiteSpace';
$_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['prdWhiteSpaceRows']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['prdWhiteSpace']['total']);
?>
				 <tr>
	            	<td><span style="visibility: hidden">White space</span></td>
	            	<td><span style="visibility: hidden">White space</span></td>
	            	<td><span style="visibility: hidden">White space</span></td>
	            	<td><span style="visibility: hidden">White space</span></td>
	            	<td><span style="visibility: hidden">White space</span></td>
	            	<td><span style="visibility: hidden">White space</span></td>
	           	</tr>
				<?php endfor; endif; ?>
	        </tbody>
	        <tfoot>
	        	<tr>
	        		<td colspan="4" align="center">(<?php echo $_smarty_tpl->tpl_vars['totalPriceText']->value;?>
)</td>
	        		<td align="center"><b>ราคารวมทั้งหมด</b></td>
	        		<td align="right"><b><?php echo $_smarty_tpl->tpl_vars['totalPrice']->value;?>
</b></td>
	        	</tr>
	        </tfoot>
	    </table>
	</div>
	
    <div style="text-align: center;">
    	<div class="signature">
    		<div class="space-for-signature"></div>
    		<p align="center">(<span style="width: 160px; display:inline-block;"></span>)</p>
    		<p align="center">ผู้สั่งซื้อ</p>
    		<p align="center">วันที่ <?php echo $_smarty_tpl->tpl_vars['nowDateThai']->value;?>
</p>
    	</div>
    	<div class="signature">
    		<div class="space-for-signature"></div>
    		<p align="center">(<span style="width: 160px; display:inline-block;"></span>)</p>
    		<p align="center">ผู้อนุมัติ</p>
    		<p align="center">
    			วันที่ 
    			<span style="text-decoration: underline;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
    		</p>
    	</div>
    </div>
</div>
</body>
</html><?php }} ?>
