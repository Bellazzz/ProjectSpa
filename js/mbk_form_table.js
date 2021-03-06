$(document).ready(function () {
    //Init
	var ftbTitle;
	if(action == 'ADD') {
		ftbTitle = 'เพิ่มข้อมูล' + tableNameTH;
	} else if(action == 'EDIT') {
		ftbTitle = 'แก้ไขข้อมูล' + tableNameTH + ' (' + code + ')';
	} else if(action == 'VIEW_DETAIL') {
		ftbTitle = 'ข้อมูล' + tableNameTH + ' (' + code + ')';
	}
	$('#ftb-title').html(ftbTitle);

    // Button Click
    $('#save-btn').click(function () {
    	if(checkRequiredInput()) {
	    	if(action == 'EDIT'){
		        parent.showActionDialog({
		            title: 'บันทึกการแก้ไข',
		            message: 'คุณต้องการแก้ไขข้อมูลใช่หรือไม่?',
		            actionList: [
		                {
		                    id: 'ok',
		                    name: 'ตกลง',
		                    desc: 'บันทึกการเปลี่ยนแปลงข้อมูล',
		                    func:
		                    function() { 
		                    	saveRecord();
		                        parent.hideActionDialog();
		                    }
		                },
		                {
		                    id: 'cancel',
		                    name: 'ยกเลิก',
		                    desc: 'ยกเลิกการเปลี่ยนแปลงข้อมูล',
		                    func:
		                    function() {
		                        parent.hideActionDialog();
		                    }
		                }
		            ],
		            boxWidth: 400
		        });
	    	} else if (action == 'ADD'){
	    		saveRecord();
	    	}
	    }
    });
    $('#cancel-btn').click(function () {
        parent.confirmCloseFormTable(action);
		clearTempImage();
    });
    $('#edit-btn').click(function () {
        parent.openFormTable('EDIT', code);
    });

    // Check Input required and pattern
    $('#form-table input').filter('[require],[valuepattern]').focusout(validateInput);
    $('#form-table textarea').filter('[require],[valuepattern]').focusout(validateInput);

    // Fixed image in view detail
    $('.table-view-detail-image img').load(function() {
    	var width 	= $(this).width();
    	var height 	= $(this).height();
    	if(height > 350) {
    		$(this).height(350);
    	} else if(width > 470) {
    		$(this).width(470);
    	}
    })
});

function saveRecord() {
	// Convert thai date to real date
	$('.mbk-dtp-th').each(function() {
		if($(this).val() != '') {
			if(isDateThaiFormat($(this))) {
				getRealDate($(this));
			} else {
				convertThaiDate($(this));
				getRealDate($(this));
			}
		}
	});

	$.ajax({
		url: ajaxUrl,
		type: 'POST',
		data: {
			'ajaxCall'			: true,
			'action'			: action,
			'tableName'			: tableName,
			'code'				: code,
			'formData'			: $('#form-table').serialize()
		},
		success:
		function (responseJSON) {
			var response = $.parseJSON(responseJSON);
			if (response.status == 'ADD_PASS') {
				// Add record success
				parent.closeFormTable();
				parent.refreshTable();
			} else if (response.status == 'EDIT_PASS') {
				// Edit record success
				parent.closeFormTable();
				parent.refreshTable();
			} else if (response.status == 'REQURIED_VALUE') {
				// Add required
				$('#' + response.text).addClass('required');
				$('#' + response.text).focus();
			} else if(response.status== 'UNIQUE_VALUE') {
				// Add required
				$('#' + response.text).addClass('required');
				$('.err-' + response.text).css('display', 'none');
				$('#err-' + response.text + '-unique').css('display', 'block');
				$('#' + response.text).focus();
			} else {
				alert(response.status + "\n" + response.text);
			}
		}
	});
}

function validateInput() {
	var id = $(this).attr('id');

	// Clear error
	$(this).removeClass('required');
	$('.err-' + id).css('display', 'none');
	
	var value = '';
	if($(this).hasClass('select-reference')) {
		value = $(this).find('.select-reference-input').val();
	} else {
		value = $(this).val();
	}
	if (value == '') {
        var attrRequire = $(this).attr('require');
    	if (typeof attrRequire !== typeof undefined && attrRequire !== false) {
    		// Check require
    		$(this).addClass('required');
    		$('#err-' + id + '-require').css('display', 'block');
		}
    } else {
    	var attrPattern = $(this).attr('valuepattern');
    	if (typeof attrPattern !== typeof undefined && attrPattern !== false) {
    		// Validate value pattern
    		if(attrPattern == 'money') {
    			if(!validateMoney(value)) {
					$('#err-' + id + '-money').css('display', 'block');
					$(this).addClass('required');
				}
    		} else if(attrPattern == 'email') {
    			if(!validateEmail(value)) {
					$('#err-' + id + '-email').css('display', 'block');
					$(this).addClass('required');
				}
    		} else if(attrPattern == 'number') {
    			if(!validateNumber(value)) {
					$('#err-' + id + '-number').css('display', 'block');
					$(this).addClass('required');
				}
    		} else if(attrPattern == 'character') {
    			if(!validateCharacter(value)) {
					$('#err-' + id + '-character').css('display', 'block');
					$(this).addClass('required');
				}
    		} else if(attrPattern == 'tel') {
    			if(!validateTel(value)) {
					$('#err-' + id + '-tel').css('display', 'block');
					$(this).addClass('required');
				}
    		} else if(attrPattern == 'minute') {
    			if(!validateMinute(value)) {
					$('#err-' + id + '-minute').css('display', 'block');
					$(this).addClass('required');
				}
    		} else if(attrPattern == 'numberMoreThanZero') {
    			if(!validateNumberMoreThanZero(value)) {
					$('#err-' + id + '-numberMoreThanZero').css('display', 'block');
					$(this).addClass('required');
				}
    		} else if(attrPattern == 'username') {
    			if(!validateUsername(value)) {
					$('#err-' + id + '-username').css('display', 'block');
					$(this).addClass('required');
				}
    		}
		}
    }
}

function checkRequiredInput() {
	var pass = true;

	$('#form-table input').filter('[require],[valuepattern]').focusout();
	$('#form-table textarea').filter('[require],[valuepattern]').focusout();
	$('#form-table .select-reference').filter('[require]').each(validateInput);

	// Do someting before save
	if(typeof beforeSaveRecord == 'function') {
		if(beforeSaveRecord()) {
			pass = false;
		}
	}

	var inputErr 		= $('#form-table input.required').length;
	var txtAreaErr 		= $('#form-table textarea.required').length;
	var selectRefErr 	= $('#form-table .select-reference.required').length;
	var allErr 			= inputErr + txtAreaErr + selectRefErr;
	if(allErr > 0) {
		pass = false;
	}

	return pass;
}

function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function validateMoney(money) {
	var re = /^[0-9]*(\.[0-9]{1,2})?$/;
	return re.test(money);
}

function validateNumber(number) {
	var re = /^[0-9]*$/;
	return re.test(number);
}

function validateCharacter(character) {
	var re = /^[a-zA-Zก-๙\s]+$/;
	return re.test(character);
}

function validateTel(tel) {
	var re = /^[0-9]{10}$/;
	return re.test(tel);
}

function validateMinute(min) {
	var pass = true;
	var re 	 = /^[0-9]{1,2}$/;
	if(re.test(min)) {
		if(parseInt(min) > 59) {
			pass = false;
		}
	} else {
		pass = false;
	}

	return pass;
}

function validateNumberMoreThanZero(number) {
	var pass = true;
	var re 	 = /^[0-9]+$/;
	if(re.test(number)) {
		if(parseInt(number) <= 0) {
			pass = false;
		}
	} else {
		pass = false;
	}

	return pass;
}

function validateUsername(strUsername) {
	var pass = true;
	var re = /^[a-zA-Z]+[a-zA-Z0-9]*$/;
	if(re.test(strUsername)) {
		if(strUsername.length < 6) {
			pass = false;
		}
	} else {
		pass = false;
	}

	return pass;
}