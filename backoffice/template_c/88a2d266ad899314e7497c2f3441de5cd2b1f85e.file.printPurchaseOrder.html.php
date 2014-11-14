<?php /* Smarty version Smarty-3.1.18, created on 2014-11-12 16:34:56
         compiled from "C:\AppServ\www\projectSpa\backoffice\template\printPurchaseOrder.html" */ ?>
<?php /*%%SmartyHeaderCode:18776546329c0da8393-89824958%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88a2d266ad899314e7497c2f3441de5cd2b1f85e' => 
    array (
      0 => 'C:\\AppServ\\www\\projectSpa\\backoffice\\template\\printPurchaseOrder.html',
      1 => 1415678099,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18776546329c0da8393-89824958',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ordData' => 0,
    'spaData' => 0,
    'orddtlData' => 0,
    'orddlt' => 0,
    'printNum' => 0,
    'totalPriceText' => 0,
    'totalPrice' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_546329c1157814_39717528',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546329c1157814_39717528')) {function content_546329c1157814_39717528($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<title>Purchase order (<?php echo $_smarty_tpl->tpl_vars['ordData']->value['ord_id'];?>
)</title>
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
			line-height: 1.2em;
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
			word-wrap: break-word;
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
		.signature-container {
			page-break-after: always;
		}
		.spa_name, .purchaseTxt {
			font-family: ThaiSansNeue-Bold;
		}
		.spa_name {
			font-size: 30px;
		}
		.purchaseTxt {
			font-size: 25px;
		}
		.prd_name_col {
			width: 200px;
			max-width: 200px;
		}
		.no_col {
			width: 50px;
			max-width: 50px;
		}
	</style>
	
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
		<button id="cancel-btn" class="button button-icon button-icon-delete">ปิด</button>
    </div>
</div>
<div id="printArea" class="ftb-body">
	<h2 id="spa_name_1" class="spa_name"><?php echo $_smarty_tpl->tpl_vars['spaData']->value['spa_name'];?>
</h2>
	<p id="spa_contact_1">
		<?php echo $_smarty_tpl->tpl_vars['spaData']->value['spa_addr'];?>
<br>
		โทรศัพท์ : <?php echo $_smarty_tpl->tpl_vars['spaData']->value['spa_tel'];?>
 โทรสาร : <?php echo $_smarty_tpl->tpl_vars['spaData']->value['spa_fax'];?>
 อีเมล : <?php echo $_smarty_tpl->tpl_vars['spaData']->value['spa_email'];?>

	</p>
	<h2 id="purchaseTxt_1" class="purchaseTxt">ใบสั่งซื้อผลิตภัณฑ์</h2>
	<div id="ordDataTable_1" class="order-data-table-container clearfix">
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
				<tr>
					<td><b>อีเมล</b></td>
					<td><?php echo $_smarty_tpl->tpl_vars['ordData']->value['comp_email'];?>
</td>
				</tr>
			</table>
		</div>
		<div class="order-data-table">
			<table>
				<tr>
					<td><b>หน้า</b></td>
					<td><span class="curPage">1</span> จาก <span class="allPage">1</span> หน้า</td>
				</tr>
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
				<tr>
					<td><b>รายการสั่งซื้อทั้งหมด</b></td>
					<td><?php echo count($_smarty_tpl->tpl_vars['orddtlData']->value);?>
 รายการ</td>
				</tr>
			</table>
		</div>
	</div>
	
	
	<div id="prdListCont_1" class="productList-container">
		<table id="productList_1" class="productList">
	        <thead>
	            <tr>
	            	<th class="no_col">ลำดับ</th>
	                <th class="prd_name_col">ชื่อผลิตภัณฑ์</th>
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
	            	<td align="center" class="no_col"><?php echo $_smarty_tpl->tpl_vars['orddlt']->value['no'];?>
</td>
	                <td align="left" class="prd_name_col"><?php echo $_smarty_tpl->tpl_vars['orddlt']->value['prd_name'];?>
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
	        </tbody>
	    </table>
	</div>
</div>

<script>
	var printNum = '<?php echo $_smarty_tpl->tpl_vars['printNum']->value;?>
';
	var purchaseOrdPage	= 1;

	$(document).ready(function() {
		$('#print-btn').click(function() {
			confirmPrint();
		});
		$('#cancel-btn').click(function() {
			parent.closeManageBox();
		});

		if($('#productList_1').height() <= 486) {
			while($('#productList_1').height() < 456) {
				// 1 page
				var spaceHtml 	= '<tr>'
								+ '<td><span style="visibility: hidden">WS</span></td>'
								+ '<td><span style="visibility: hidden">WS</span></td>'
								+ '<td><span style="visibility: hidden">WS</span></td>'
								+ '<td><span style="visibility: hidden">WS</span></td>'
								+ '<td><span style="visibility: hidden">WS</span></td>'
								+ '<td><span style="visibility: hidden">WS</span></td>'
								+ '</tr>';
				$('#productList_1 tbody').append(spaceHtml);
			}
			addTotalRow('#productList_1');
			addSignatureBox();
		} else {
			// Multi page
			addSignatureBox();
			while($('#productList_' + purchaseOrdPage).height() > 486) {
				// Add head purchase order
				var curPage			= purchaseOrdPage+1;
				var spa_name 		= '<h2 id="spa_name_' + curPage + '" class="spa_name">' + $('#spa_name_1').html() + '</h2>';
				var spa_contact 	= '<p id="spa_contact_' + curPage + '">' + $('#spa_contact_1').html() + '</p>';
				var purchaseTxt 	= '<h2 id="purchaseTxt_' + curPage + '" class="purchaseTxt">' + $('#purchaseTxt_1').html() + '</h2>'
				var ordDataTable 	= '<div id="ordDataTable_' + curPage + '" class="order-data-table-container clearfix">'
									+ $('#ordDataTable_1').html()
									+ '</div>';
				$('#printArea').append(spa_name + spa_contact + purchaseTxt + ordDataTable);

				// Add product list table
				var prdListCont = '<div id="prdListCont_' + curPage + '" class="productList-container">'
								+ '<table id="productList_' + curPage + '" class="productList">'
								+ '		<thead>' + $('#productList_1 thead').html() + '</thead>'
								+ '		<tbody></tbody>'
								+ '</table>';
				$('#printArea').append(prdListCont);

				//break page of product list table
				while($('#productList_' + purchaseOrdPage).height() > 486) {
					var tr = '<tr>' + $('#productList_' + purchaseOrdPage + ' tbody tr:last-child').html() + '</tr>';
					$('#productList_' + purchaseOrdPage + ' tbody tr:last-child').remove();
					$('#productList_' + curPage + ' tbody').prepend(tr);
				}

				// add curent page and all page
				$('#ordDataTable_' + curPage).find('.curPage').text(curPage);
				$('.allPage').text(curPage);

				if($('#productList_' + curPage).height() <= 486) {
					addTotalRow('#productList_' + curPage);
				}
				addSignatureBox();
				purchaseOrdPage++;
			}
			// add space rows
			while($('#productList_' + purchaseOrdPage).height() < 456) {
				var spaceHtml 	= '<tr>'
								+ '<td><span style="visibility: hidden">WS</span></td>'
								+ '<td><span style="visibility: hidden">WS</span></td>'
								+ '<td><span style="visibility: hidden">WS</span></td>'
								+ '<td><span style="visibility: hidden">WS</span></td>'
								+ '<td><span style="visibility: hidden">WS</span></td>'
								+ '<td><span style="visibility: hidden">WS</span></td>'
								+ '</tr>';
				$('#productList_' + purchaseOrdPage + ' tbody').append(spaceHtml);
			}
		}
	});

	function confirmPrint() {
		if(printNum > 0) {
			parent.showActionDialog({
                title: 'พิมพ์ใบสั่งซื้อซ้ำ',
                message: 'ใบสั่งซื้อนี้ถูกพิมพ์ไปแล้ว ' + printNum + ' ครั้ง คุณต้องการพิมพ์อีกใช่หรือไม่?',
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

	function addTotalRow(id) {
		var tfoot 	= '<tfoot>'
					+ '		<tr>'
					+ '			<td colspan="4" align="center">(<?php echo $_smarty_tpl->tpl_vars['totalPriceText']->value;?>
)</td>'
					+ '			<td align="center"><b>ราคารวมทั้งหมด</b></td>'
					+ '			<td align="right"><b><?php echo $_smarty_tpl->tpl_vars['totalPrice']->value;?>
</b></td>'
					+ '		</tr>'
					+ '</tfoot>';
		$(id).append(tfoot);
	}

	function addSignatureBox() {
		var sigBox 	= '<div style="text-align: center;" class="signature-container">'
					+ '		<div class="signature">'
					+ '			<div class="space-for-signature"></div>'
					+ '			<p align="center">(<span style="width: 160px; display:inline-block;"></span>)</p>'
					+ '			<p align="center">ผู้สั่งซื้อ</p>'
					+ '			<p align="center">'
					+ '			วันที่ '
					+ '			<span style="text-decoration: underline;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>'
					+ '			</p>'
					+ '		</div>'
					+ '		<div class="signature">'
					+ '			<div class="space-for-signature"></div>'
					+ '			<p align="center">(<span style="width: 160px; display:inline-block;"></span>)</p>'
					+ '			<p align="center">ผู้อนุมัติ</p>'
					+ '			<p align="center">'
					+ '			วันที่ '
					+ '			<span style="text-decoration: underline;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>'
					+ '			</p>'
					+ '		</div>'
					+ '</div>';
		$('#printArea').append(sigBox);
	}
</script>

</body>
</html><?php }} ?>
