$(document).ready(function() {
	pullProductList();


});

function pullProductList() {
	$.ajax({
		url: '../common/ajaxGetProductListPOS.php',
		type: 'POST',
		data: {
			prdtyp_id : 'PT12',
			searchText: ''
		},
		success:
		function(response) {
			$('#columns').html(response);
			
			// Add event
			$('.pin').click(function() {
				var prdId 		= $(this).attr('prd-id');
				var prdPrice 	= $(this).attr('prd-price');
				var prdName 	= $(this).find('p').text();
				addSaleDetail({
					prd_id: prdId,
					prd_name: prdName,
					unit_price: prdPrice,
					qty: 1
				})
			});
		}
	})
}

function addSaleDetail(data) {
	var html 		= '';
	var prdRow 		= $('#' + data.prd_id);
	var prdName 	= '';
	var prdQty		= 1;
	var unitPrice 	= 0;
	var sumPrice 	= 0;

	if(typeof(data.prd_name) != 'undefined') {
		prdName = data.prd_name;
	}
	if(typeof(data.qty) != 'undefined') {
		prdQty = parseInt(data.qty);
	}
	if(typeof(data.unit_price) != 'undefined') {
		unitPrice = parseFloat(data.unit_price);
	}

	if(prdRow.length > 0) {
		// Add to old product row
		plusOrMinusQty(data.prd_id, data.qty, 'plus');
	} else {
		// First product row
		html 	= '<tr id="' + data.prd_id + '">'
				+ '		<td class="prdName-col">' + prdName + '</td>'
				+ '		<td class="qty-col">'
				+ ' 		<button type="button" class="qty-circle-btn" style="position: absolute;left: 0;top: 2px;" '
				+ '			onclick="plusOrMinusQty(\'' + data.prd_id + '\',1,\'minus\')">'
				+ '				<i class="fa fa-minus"></i>'
				+ '			</button>'
				+ '			<span class="prd_qty">' + prdQty + '</span>'
				+ ' 		<button type="button" class="qty-circle-btn" style="position: absolute;right: 0;top: 2px;" '
				+ '			onclick="plusOrMinusQty(\'' + data.prd_id + '\',1,\'plus\')">'
				+ '				<i class="fa fa-plus"></i>'
				+ '			</button>'
				+ '		</td>'
				+ '		<td class="unitPrice-col">฿' + unitPrice.formatMoney(2, '.', ',') + '</td>'
				+ '		<td class="sumPrice-col">฿' + unitPrice.formatMoney(2, '.', ',') + '</td>'
				+ '		<input type="hidden" name="prd_id[]" value="' + data.prd_id + '">'
				+ '		<input type="hidden" name="qty[]" value="' + prdQty + '">'
				+ '		<input type="hidden" name="sumPrice[]" value="' + unitPrice + '">'
				+ '</tr>';
		$('#sale-product-list tbody').append(html);
		// cal total price
		calSummary();
		// add event
		$('#' + data.prd_id).click(function(){
			$(this).siblings('tr').removeClass('selected');
			if($(this).hasClass('selected')) {
				// Close edit qty box
				$(this).removeClass('selected');
			} else {
				// Open edit qty box
				$(this).addClass('selected');
				openEditQtyBox(data.prd_id);
			}
		});
		$('#' + data.prd_id).find('.qty-circle-btn').click(function(e) {
			e.stopPropagation();
		});
	}

	// animate scroll bar
	var container 	= $('#sale-product-list-body')
    var scrollTo 	= $('#' + data.prd_id);
    container.animate({
	    scrollTop: scrollTo.offset().top - container.offset().top + container.scrollTop()
	}, 'fast');
	// hilight that row
	$('#' + data.prd_id).addClass('hilight');
	setTimeout(function(){
		$('#' + data.prd_id).removeClass('hilight');
	}, 1000)
	
}

function calSummary() {
	var totalPrice 		= 0;
	var sumPrice   		= 0;
	var qty 			= 0;
	var totalQty 		= 0;
	var totalProduct 	= $('#sale-product-list tbody tr').length;

	$('#sale-product-list tbody tr').each(function() {
		sumPrice = parseFloat($(this).find('.sumPrice-col').text().replace('฿','').replace(',',''));
		qty 	 = parseInt($(this).find('.prd_qty').text().replace(',',''));
		totalPrice += sumPrice;
		totalQty   += qty;
	});

	$('#total-price').text(totalPrice.formatMoney(2, '.', ','));
	$('#total-product').text(totalProduct.formatMoney(0, '.', ','));
	$('#total-qty').text(totalQty.formatMoney(0, '.', ','));
	$('input[name="total-price"]').val(totalPrice);
}

function plusOrMinusQty(prd_id, qty, action) {
	var prdRow 		= $('#' + prd_id);
	var prdQty		= 1;
	var unitPrice 	= 0;
	var sumPrice 	= 0;

	prdQty 		= parseFloat(prdRow.find('.prd_qty').text().replace(',',''));
	unitPrice 	= parseFloat(prdRow.find('.unitPrice-col').text().replace('฿', '').replace(',',''));
	if(action == 'plus') {
		// plus
		prdQty 		= prdQty + qty;
	} else {
		// minus
		if(prdQty <= 1) {
			//remove product
			prdRow.remove();
			// cal total price
			calSummary();
			return;
		}
		prdQty 		= prdQty - qty;
	}
	sumPrice 	= parseFloat(prdQty * unitPrice);

	prdRow.find('.prd_qty').text(prdQty.formatMoney(0, '.', ','));
	prdRow.find('.sumPrice-col').text('฿' + sumPrice.formatMoney(2, '.', ','));
	prdRow.find('input[name="qty[]"]').val(prdQty);
	prdRow.find('input[name="sumPrice[]"]').val(sumPrice);
	// cal total price
	calSummary();
}

function openEditQtyBox(prd_id) {
	//var editQtyBoxHtml = '<div id="edit-quantity-product"></div>';
	//$('body').prepend(editQtyBoxHtml);
}