var orderPrdList = Array();
var recPrdItem 	= Array();

$(document).ready(function(){
});

function changeOrderId() {
	var orderId = $('input[name="ord_id"]').val();
	$.ajax({
		url: '../backoffice/getProductListOfOrder.php',
		data: {
			ord_id: orderId
		},
		success:
		function(response) {
			if(response != '') {
				$('#orders-product-list').html(response);
			} else {
				alert('no return data.');
			}
		}
	})
}

function receivesProduct(trId) {
	var ordPrd = $('#' + trId);
	recPrdItem = {
		prd_id		: ordPrd.find('.prd_id').text(),
		prd_name	: ordPrd.find('.prd_name').text(),
		prd_amount	: parseInt(ordPrd.find('.prd_amount').text()),
		unit_name 	: ordPrd.find('.unit_name').text()
	};
	addPrdItemToRec();
}

function addPrdItemToRec() {
	
	if($('#recPrd_' + recPrdItem.prd_id).length > 0) {
		// Update amount if has product item in receives table
		var recPrd   	= $('#recPrd_' + recPrdItem.prd_id);
		var ordAmount 	= recPrdItem.prd_amount;
		var recAmount 	= parseInt(recPrd.find('.prd_amount').text())
		recPrdItem.prd_id = recAmount + ordAmount;
		recPrd.find('.prd_amount').text(recPrdItem.prd_id);
	} else {
		// Append product in receives table
		var recPrdHtml 	= '<tr id="recPrd_' + recPrdItem.prd_id + '">'
				   		+ '	<td>'
				   		+ '		<input type="hidden" name="prd_id" value="' + recPrdItem.prd_id + '">'
				   		+ '		<span class="prd_name">' + recPrdItem.prd_name + '</span>'
				   		+ '	</td>'
				   		+ ' <td align="right">'
				   		+ '		<span class="prd_amount">' + recPrdItem.prd_amount + '</span>'
				   		+ '	</td>'
				   		+ '	<td align="center">'
				   		+ '		<span class="unit_name">' + recPrdItem.unit_name + '</span></td>'
				   		+ '	</td>'
				   		+ '	<td>'
				   		+ '		<button onclick="removeReceivesProduct(\'' + recPrdItem.prd_id + '\')">คืนสินค้า</button>'
				   		+ '	</td>'
				   		+ '</tr>'
		$('#receives-product-list').append(recPrdHtml);
	}

	
}