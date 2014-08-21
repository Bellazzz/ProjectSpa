<?php
include('../config/config.php');
$tplName = 'form_titles.html'; /*Change for new table*/
$subDir	 = WEB_ROOTDIR.'/backoffice/';
include('../common/common_header.php');

$action			= isset($_REQUEST['action']) ? $_REQUEST['action'] : 'ADD';
$tableName		= $_REQUEST['tableName'];
$code			= $_REQUEST['code'];
$requiredFields	= array('title_name'); /*Change for new table*/

if(!$_REQUEST['ajaxCall']) {
	//1. Display form
	if($action == 'EDIT') {
		$tableRecord = new Titles($code); /*Change for new table*/
		$values      = array();
		foreach($table[$tableName]['fieldNameList'] as $field => $value) {
			$values[$field] = $tableRecord->getFieldValue($field); /*Change for new table*/
		}
		$smarty->assign('values', $values);
	}

	$smarty->assign('action', $action);
	$smarty->assign('tableName', $tableName);
	$smarty->assign('code', $code);
	$smarty->assign('requiredFields', $requiredFields);
	include('../common/common_footer.php');
} else {
	//2. Process record
	$formData	= $_REQUEST['formData'];
	$values		= array();

	if($action == 'ADD') {
		//2.1 Insert new record
		$values['fieldName']  = array();
		$values['fieldValue'] = array();
		$fieldListEn		  = array();

		// Prepare variable
		foreach($table[$tableName]['fieldNameList'] as $field => $value) {
			array_push($fieldListEn, $field);
		}

		// Push values to array
		foreach($formData as $key => $data) {
			if(($data['value'] == null || $data['value'] == '') && in_array($requiredField, $data['name'])) {
				echo "REQURIED_VALUE";
			} else if(in_array($data['name'], $fieldListEn)) {
				array_push($values['fieldName'], $data['name']);
				array_push($values['fieldValue'], $data['value']);
			}
		}

		// Insert
		$tableRecord = new Titles($values['fieldName'], $values['fieldValue']); /*Change for new table*/
		if($tableRecord->insertSuccess()) {
			echo "ADD_PASS";
		} else {
			echo "ADD_FAIL";
		}
	} else if($action == 'EDIT') {
		//2.2 Update record
		$tableRecord = new Titles($code); /*Change for new table*/

		// Set all field value
		foreach($formData as $key => $data) {
			$tableRecord->setFieldValue($data['name'], $data['value']);
		}

		// Commit
		if($tableRecord->commit()) {
			echo "EDIT_PASS";
		} else {
			echo "EDIT_FAIL";
		}
	}
}
?>