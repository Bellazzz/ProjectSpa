$(document).ready(function () {
    // Effect when open form
    $('body').fadeOut(0);
    $('body').fadeIn(300);

    // Button Click
    $('#save-btn').click(function () {
        saveRecord();
    });
    $('#cancel-btn').click(function () {
        parent.confirmCloseFormTable(action);
    });
});

function saveRecord() {
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

                if ($('#' + response.text).hasClass('.select-reference')) {
                    // Add event for remove select reference required
                } else {
                    // Add event for remove input required
                    $('#' + response.text).on('focusout', function () {
                        if ($(this).val() != '') {
                            $(this).removeClass('required');
                        }
                    });
                }
            } else {
                alert(response.status + "\n" + response.text);
            }
        }
    });
}