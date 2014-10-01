var orderPrdList = Array();
var recPrdItem 	= Array();

$(document).ready(function(){
	// Check date
    $('#rec_date').change(function() {
        var selectedDate = new Date($('#rec_date').val());
        var orderDate    = new Date(ordDate);
        if(selectedDate.getTime() < orderDate.getTime()) {
        	if(parent.$('.action-dialog-container').length <= 0) {
        		parent.showActionDialog({
					title: 'วันที่รับไม่ถูกต้อง',
			        message: 'วันที่รับไม่สามารถเป็นวันก่อนหน้าวันที่สั่งซื้อได้ค่ะ',
			        actionList: [
			            {
			                id: 'ok',
			                name: 'ตกลง',
			                desc: 'ป้อนวันที่รับใหม่',
			                func:
			                function() {
			                	parent.hideActionDialog();
								$('#rec_date').val('');
								$('#rec_date').focus();
			                }
			            }
			        ],
			        boxWidth: 400
			    });
        	}
        }
    });
});

function isInt(value) {
	 return !isNaN(value) && 
	        parseInt(Number(value)) == value && 
	        !isNaN(parseInt(value, 10));
}
function isFloat(value) {
	return 	!isNaN(value) && 
	     	parseFloat(Number(value)) == value && 
	     	!isNaN(parseFloat(value, 10));
}

function allowChangeOrderId() {
	if(action == 'EDIT') {
		parent.showActionDialog({
			title: 'ไม่สามารถเปลี่ยนการสั่งซื้อได้',
	        message: 'การรับสินค้าที่ที่บันทึกแล้วไม่สามารถแก้ไขรหัสการสั่งซื้อได้',
	        actionList: [
	            {
	                id: 'ok',
	                name: 'ตกลง',
	                func:
	                function() {
	                	parent.hideActionDialog();
						return false;
	                }
	            }
	        ],
	        boxWidth: 500
	    });
	} else {
	    return true;
	}
}

function changeOrderId() {
	var orderId = $('input[name="ord_id"]').val();

	if($('#receives-product-list').length > 0) {
		parent.showActionDialog({
			title: 'เปลี่ยนการสั่งซื้อ',
	        message: 'คุณแน่ใจหรือไม่ที่จะเปลี่ยนการสั่งซื้อ หากคุณเปลี่ยนการสั่งซื้อข้อมูลที่คุณป้อนจะถูกเคลียร์',
	        actionList: [
	            {
	                id: 'change',
	                name: 'เปลี่ยน',
	                desc: 'ข้อมูลที่คุณป้อนจะถูกเคลียร์',
	                func:
	                function() {
						$.ajax({
							url: '../backoffice/getProductListOfOrder.php',
							data: {
								ord_id: orderId
							},
							success:
							function(response) {
								if(response != '') {
									$('#receives-product-list-container').html(response);
									addEventRecPrdTable();
									calculate();
								} else {
									alert('no return data.');
								}
							}
						});
	                    parent.hideActionDialog();
	                }
	            },
	            {
	                id: 'cancel',
	                name: 'ยกเลิก',
	                desc: 'กลับไปแก้ไขการรับ',
	                func:
	                function() {
	                    parent.hideActionDialog();
	                }
	            }
	        ],
	        boxWidth: 500
	    });
	} else {
		$.ajax({
			url: '../backoffice/getProductListOfOrder.php',
			data: {
				ord_id: orderId
			},
			success:
			function(response) {
				if(response != '') {
					$('#receives-product-list-container').html(response);
					addEventRecPrdTable();
					calculate();
				} else {
					alert('no return data.');
				}
			}
		});
	}
	//$('#rec_date').val('');
}

function addEventRecPrdTable() {
	// Add event
	$('input[name="recdtl_amount[]"]').change(function(){
		var input = $(this);
		var value = parseInt($(this).val());
		var max   = parseInt($(this).attr('max'));
		var unitName = $(this).parent().parent().find('.unit_name').text();

		// set max if value is not number or value > max
		if(!isInt($(this).val()) || value > max || value < 0) {
			var titleDialog   = '';
			var messageDialog = '';
			if(!isInt($(this).val()) || value < 0) {
				titleDialog   = 'ป้อนข้อมูลไม่ถูกต้อง';
				messageDialog = 'คุณป้อนรูปแบบจำนวนที่รับไม่ถูกต้อง คุณต้องการที่จะ?'
			} else if(value > max) {
				titleDialog   = 'จำนวนที่รับเกินกำหนด';
				messageDialog = 'คุณป้อนจำนวนที่รับเกินจำนวนที่สั่งซื้อ คุณต้องการที่จะ?';
			}

			parent.showActionDialog({
				title 	: titleDialog,
	            message : messageDialog,
	            actionList: [
	                {
	                    id: 'setmax',
	                    name: 'ป้อนจำนวนทั้งหมด',
	                    desc: 'แก้ไขจำนวนที่รับให้เท่ากับจำนวนทั้งหมดที่สั่งซื้อ คือ ' + max + ' ' + unitName,
	                    func:
	                    function() {
	                        input.val(input.attr('max'));
	                        input.focus();
	                        calculate();
	                        parent.hideActionDialog();
	                    }
	                },
	                {
	                    id: 'cancel',
	                    name: 'กลับไปแก้ไข',
	                    desc: 'เคลียร์ค่าที่ป้อน แล้วกลับไปแก้ไขจำนวนที่รับใหม่',
	                    func:
	                    function() {
	                    	input.val(0);
	                    	input.focus();
	                    	input.select();
	                    	calculate();
	                        parent.hideActionDialog();
	                    }
	                }
	            ],
	            boxWidth: 500
	        });
		} else {
			$(this).val(parseInt($(this).val()));
			input.removeClass('required');
			calculate();
		}
		
	});
	$('input[name="recdtl_price[]"]').change(function(){
		// set 0 if wrong value
		if((isInt($(this).val()) || isFloat($(this).val())) && $(this).val() >= 0 ) {
			$(this).removeClass('required');
		} else {
			$(this).val(0);
		}
		calculate();
	});
}

function calculate() {
	var totalPrice = 0;
	var totalRemain = 0;
	$('input[name="recdtl_amount[]"]').each(function() {
		var tr 			= $(this).parent().parent();
		var recAmount 	= parseFloat($(this).val());

		// sum price
		var unitPrice 	= parseFloat(tr.find('input[name="recdtl_price[]"]').val());
		var sumPrice 	= unitPrice * recAmount;
		tr.find('.sum_price').text(sumPrice.formatMoney(2));

		// remain
		var ordAmount 	= parseFloat(tr.find('.ordPrd_amount').text());
		var remain 		= ordAmount - recAmount;
		tr.find('.remain').text(remain);

		totalPrice +=  sumPrice;
		totalRemain += remain;
	});

	$('input[name="rec_total_price"]').val(totalPrice);
	$('#total_price').text(totalPrice.formatMoney(2, '.', ','));
	$('#total_amount').text(totalRemain.formatMoney(0, '.', ','));
}

function beforeSaveRecord() {
    // Check input required
    var returnVal 		= false;
    var notInputAmount 	= true;
    $('input[name="recdtl_amount[]"]').each(function() {
        if($(this).val() != '' && $(this).val() != '0') {
        	var unitPrice = $(this).parent().parent().find('input[name="recdtl_price[]"]');
        	if(unitPrice.val() == '' || unitPrice.val() == 0) {
        		unitPrice.addClass('required');
        		returnVal = true;
        	}
        	notInputAmount = false;
        }
    });

    $('input[name="recdtl_price[]"]').each(function() {
    	if($(this).val() != '' && $(this).val() != '0') {
        	var amount = $(this).parent().parent().find('input[name="recdtl_amount[]"]');
        	if(amount.val() == '' || amount.val() == 0) {
        		amount.addClass('required');
        		returnVal = true;
        	}
        }
    });

    // Not input amount (all input amount is 0)
    if(notInputAmount) {
    	parent.showActionDialog({
	            title	: 'คุณยังไม่ได้ป้อนข้อมูล',
	            message : 'โปรดป้อนข้อมูลการรับอย่างน้อย 1 รายการค่ะ',
	            actionList: [
	                {
	                    id: 'ok',
	                    name: 'ตกลง',
	                    func:
	                    function() {
	                        parent.hideActionDialog();
	                    }
	                }
	            ]
	        });
    	returnVal = true;
    }

    return returnVal;
}