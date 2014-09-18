var orderPrdList = Array();
var recPrdItem 	= Array();

$(document).ready(function(){
});

function isInt(value) {
  return !isNaN(value) && 
         parseInt(Number(value)) == value && 
         !isNaN(parseInt(value, 10));
}

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
				$('#receives-product-list-container').html(response);

				// Add event
				$('input[name="recdtl_amount[]"]').change(function(){
					var value = parseInt($(this).val());
					var max   = parseInt($(this).attr('max'));

					// set max if value is not number or value > max
					if(!isInt($(this).val()) || (value > max)) {
						$(this).val($(this).attr('max'));
					} else {
						$(this).val(parseInt($(this).val()));
					}
					calculate();
				});
				$('input[name="recdtl_price[]"]').change(function(){
					// set 0 if wrong value
					if(!isInt($(this).val())) {
						$(this).val(0);
					} else {
						$(this).val(parseInt($(this).val()));
					}
					calculate();
				});
			} else {
				alert('no return data.');
			}
		}
	})
}

function calculate() {
	var totalPrice = 0;
	var totalRemain = 0;
	$('input[name="recdtl_amount[]"]').each(function() {
		var tr 			= $(this).parent().parent();
		var recAmount 	= parseInt($(this).val());

		// sum price
		var unitPrice 	= parseInt(tr.find('input[name="recdtl_price[]"]').val());
		var sumPrice 	= unitPrice * recAmount;
		tr.find('.sum_price').text(sumPrice);

		// remain
		var ordAmount 	= parseInt(tr.find('.ordPrd_amount').text());
		var remain 		= ordAmount - recAmount;
		tr.find('.remain').text(remain);

		totalPrice +=  sumPrice;
		totalRemain += remain;
	});

	$('input[name="rec_total_price"]').val(totalPrice);
	$('#total_price').text(totalPrice);
	$('#total_amount').text(totalRemain);
}