<?php
$action			= isset($_REQUEST['action']) ? $_REQUEST['action'] : 'ADD';
$tableName		= $_REQUEST['tableName'];
$code			= $_REQUEST['code'];

include('../config/config.php');
$tplName = "form_$tableName.html";
$subDir	 = WEB_ROOTDIR.'/backoffice/';
include('../common/common_header.php');

if(!$_REQUEST['ajaxCall']) {
	//1. Display form
	if($action == 'EDIT') {
		$tableRecord = new TableSpa($tableName, $code);
		$values      = array();
		foreach($table[$tableName]['fieldNameList'] as $field => $value) {
			$values[$field] = $tableRecord->getFieldValue($field);
		}
		$smarty->assign('values', $values);
	}

	$smarty->assign('action', $action);
	$smarty->assign('tableName', $tableName);
	$smarty->assign('code', $code);
	include('../common/common_footer.php');
} else {
	//2. Process record
	$formData		= array();
	$values			= array();
	$fieldListEn	= array();
	parse_str($_REQUEST['formData'], $formData);
	$requiredFields = explode(',', $formData['requiredFields']);

	// Check input required
	foreach($requiredFields as $key => $fieldName) {
		if(!hasValue($formData[$fieldName])) {
			$response['status'] = 'REQURIED_VALUE';
			$response['text']	= $fieldName;
			echo json_encode($response);
			exit();
		}
	}

	// Prepare variable
	foreach($table[$tableName]['fieldNameList'] as $field => $value) {
		array_push($fieldListEn, $field);
	}

	if($action == 'ADD') {
		//2.1 Insert new record
		$values['fieldName']  = array();
		$values['fieldValue'] = array();
		
		// Push values to array
		foreach($formData as $fieldName => $value) {
			if($fieldName != 'requiredFields') {
				array_push($values['fieldName'], $fieldName);
				array_push($values['fieldValue'], $value);
			}
		}

		// Insert
		$tableRecord = new TableSpa($tableName, $values['fieldName'], $values['fieldValue']);
		if($tableRecord->insertSuccess()) {
			$response['status'] = 'ADD_PASS';
			echo json_encode($response);
		} else {
			$response['status'] = 'ADD_FAIL';
			echo json_encode($response);
		}
	} else if($action == 'EDIT') {
		//2.2 Update record
		$tableRecord = new TableSpa($tableName, $code);

		// Set all field value
		foreach($formData as $fieldName => $value) {
			if(in_array($fieldName, $fieldListEn)) {
				$tableRecord->setFieldValue($fieldName, $value);
			}
		}

		// Commit
		if($tableRecord->commit()) {
			$response['status'] = 'EDIT_PASS';
			echo json_encode($response);
		} else {
			$response['status'] = 'EDIT_FAIL';
			echo json_encode($response);
		}
	}
}
?>