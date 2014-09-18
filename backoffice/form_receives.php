<?php
$action			= isset($_REQUEST['action']) ? $_REQUEST['action'] : 'ADD';
$tableName		= 'receives';
$code			= $_REQUEST['code'];

include('../config/config.php');
$tplName = "form_$tableName.html";
$subDir	 = WEB_ROOTDIR.'/backoffice/';
include('../common/common_header.php');
$tableInfo = getTableInfo($tableName);

if(!$_REQUEST['ajaxCall']) {
	//1. Display form
	if($action == 'EDIT') {
		// Get table orders data
		$tableRecord = new TableSpa($tableName, $code);
		$values      = array();
		foreach($tableInfo['fieldNameList'] as $field => $value) {
			$values[$field] = $tableRecord->getFieldValue($field);
		}
		$smarty->assign('values', $values);

		// Get table order_details data
		/*$valuesDetail = array();
		$sql = "SELECT orddtl_id, prd_id, orddtl_amount FROM order_details WHERE ord_id = '$code' ORDER BY orddtl_id";
		$result = mysql_query($sql, $dbConn);
		$rows 	= mysql_num_rows($result);
		for($i=0; $i<$rows; $i++) {
			array_push($valuesDetail, mysql_fetch_assoc($result));
		}
		$smarty->assign('valuesDetail', $valuesDetail);*/

	} else if($action == 'VIEW_DETAIL') {
		// Get table receives data
		$tableRecord = new TableSpa($tableName, $code);
		$values      = array();
		foreach($tableInfo['fieldNameList'] as $field => $value) {
			$values[$field] = $tableRecord->getFieldValue($field);
		}
		$smarty->assign('values', $values);
						
		// Get detail of receives
		$receiveDetailList = array();
		$sum_amount = 0;
		$sql 	= "	SELECT FORMAT(r.recdtl_amount, 0) recdtl_amount,
					r.recdtl_price,
					p.prd_name,
					u.unit_name,
					FORMAT(r.recdtl_amount * r.recdtl_price, 2) sum_price  
					FROM receive_details r, products p, units u 
					WHERE r.prd_id = p.prd_id AND p.unit_id = u.unit_id 
					AND r.rec_id = '$code'";
		$result = mysql_query($sql, $dbConn);
		$rows 	= mysql_num_rows($result);
		for($i=0; $i<$rows; $i++) {
			array_push($receiveDetailList, mysql_fetch_assoc($result));
			$sum_amount += $receiveDetailList[$i]['recdtl_amount'];
		}
		$smarty->assign('sum_amount', $sum_amount);
		$smarty->assign('receiveDetailList', $receiveDetailList);
	}

	$smarty->assign('action', $action);
	$smarty->assign('tableName', $tableName);
	$smarty->assign('tableNameTH', $tableInfo['tableNameTH']);
	$smarty->assign('code', $code);
	include('../common/common_footer.php');
} else {
	//2. Process record
	$formData		= array();
	$values			= array();
	$fieldListEn	= array();
	parse_str($_REQUEST['formData'], $formData);
	
	// Check input required
	if(hasValue($formData['requiredFields'])) {
		$requiredFields = explode(',', $formData['requiredFields']);
		foreach($requiredFields as $key => $fieldName) {
			if(!hasValue($formData[$fieldName])) {
				$response['status'] = 'REQURIED_VALUE';
				$response['text']	= $fieldName;
				echo json_encode($response);
				exit();
			}
		}
	}
	
	// Prepare variable
	foreach($tableInfo['fieldNameList'] as $field => $value) {
		array_push($fieldListEn, $field);
	}

	if($action == 'ADD') {
		//2.1 Insert new record
		$values['fieldName']  = array();
		$values['fieldValue'] = array();

		// Push values to array
		foreach($formData as $fieldName => $value) {
			if(in_array($fieldName, $fieldListEn)) {
				// Skip if value is empty and default this field is null
				if($value == '' && is_array($tableInfo['defaultNull']) && in_array($fieldName, $tableInfo['defaultNull'])) {
					continue;
				}
				
				$value = str_replace("\\\'", "'", $value);
				$value = str_replace('\\\"', '"', $value);
				$value = str_replace('\\\\"', '\\', $value);
				array_push($values['fieldName'], $fieldName);
				array_push($values['fieldValue'], $value);
			}
		}

		## Insert Receives
		$tableRecord = new TableSpa($tableName, $values['fieldName'], $values['fieldValue']);
		if($tableRecord->insertSuccess()) {
			$insertReceivesResult = true;
		} else {
			$insertReceivesResult = false;
		}
		if($insertReceivesResult) {
			## Insert Receives detail
			$rec_id = $tableRecord->getKey();
			foreach ($formData['prd_id'] as $key => $prd_id) {
				$recdtl_amount 		= $formData['recdtl_amount'][$key];
				$recdtl_price 		= $formData['recdtl_price'][$key];
				if(((int)$recdtl_price) > 0 ) {
					$recdtlValues 		= array($rec_id, $prd_id, $recdtl_amount, $recdtl_price);
					$RecDetailRecord 	= new TableSpa('receive_details', $recdtlValues);
					if(!$RecDetailRecord->insertSuccess()) {
						$err = mysql_error($dbConn);
						$response['status'] = "ADD_RECEIVE_DETAIL_FAIL : $err";
						echo json_encode($response);
						exit();
					}
				}
			}

			## Update status of orders
			$ordstat_id = 'OS03'; // defualt is receives completed
			// Get order detail data
			$orderDetailList = array();
			$ord_id = $formData['ord_id'];
			$sql 	= "	SELECT orddtl_amount,
						p.prd_id 
						FROM order_details o, products p, units u 
						WHERE o.prd_id = p.prd_id AND p.unit_id = u.unit_id 
						AND o.ord_id = '$ord_id'";
			$result = mysql_query($sql, $dbConn);
			$rows 	= mysql_num_rows($result);
			for($i=0; $i<$rows; $i++) {
				array_push($orderDetailList, mysql_fetch_assoc($result));
			}
			// Get receive detail data
			$recDetailList = array(
				'prd_id' 		=> array(),
				'recdtl_amount' => array()
			);
			$sql = "SELECT rd.prd_id, SUM(recdtl_amount) recdtl_amount 
					FROM receives r, receive_details rd 
					WHERE r.rec_id = rd.rec_id AND r.ord_id = '$ord_id' 
					GROUP BY rd.prd_id";
			$result = mysql_query($sql, $dbConn);
			$rows 	= mysql_num_rows($result);
			for($i=0; $i<$rows; $i++) {
				$recdtlRow = mysql_fetch_assoc($result);
				array_push($recDetailList['prd_id'], $recdtlRow['prd_id']);
				array_push($recDetailList['recdtl_amount'], $recdtlRow['recdtl_amount']);
			}
			// Check remain product
			foreach ($orderDetailList as $key => $ordPrd) {
				if(in_array($ordPrd['prd_id'], $recDetailList['prd_id'])) {
					if($recDetailList['recdtl_amount'][$key] < $ordPrd['orddtl_amount']) {
						$ordstat_id = 'OS02'; // order product remain
					}
				} else {
					$ordstat_id = 'OS02'; // order product remain
				}
			}
			// Change orders status
			$sql = "UPDATE orders SET ordstat_id = '$ordstat_id' WHERE ord_id = '$ord_id'";
			$result = mysql_query($sql, $dbConn);
			if(!$result) {
				$err = mysql_error($dbConn);
				$response['status'] = "UPDATE_STATUS_ORDERS_FAIL : $err";
				echo json_encode($response);
				exit();
			}

			## Update product amount
			foreach ($formData['prd_id'] as $key => $id) {
				$prdRecord = new TableSpa('products', $id);
				$addAmount = (int)$formData['recdtl_amount'][$key];
				$oldAmount = (int)$prdRecord->getFieldValue('prd_amount');
				$newAmount = $oldAmount + $addAmount;
				$prdRecord->setFieldValue('prd_amount', $newAmount);
				if(!$prdRecord->commit()) {
					$err = mysql_error($dbConn);
					$response['status'] = "UPDATE_PRODUCT_AMOUNT_FAIL : $err";
					echo json_encode($response);
					exit();
				}
			}

			$response['status'] = "ADD_PASS";
			echo json_encode($response);
		} else {
			$err = mysql_error($dbConn);
			$response['status'] = "ADD_RECEIVES_FAIL : $err";
			echo json_encode($response);
		}
		

	} else if($action == 'EDIT') {
		//2.2 Update record
		$tableRecord = new TableSpa($tableName, $code);

		// Set all field value
		foreach($formData as $fieldName => $value) {
			if(in_array($fieldName, $fieldListEn)) {
				// value is empty will set default is null
				if($value == '' && is_array($tableInfo['defaultNull']) && in_array($fieldName, $tableInfo['defaultNull'])) {
					$value = 'NULL';
				}
				
				$tableRecord->setFieldValue($fieldName, $value);
			}
		}

		// Update orders
		if($tableRecord->commit()) {
			$updateOrdersResult = true;
		} else {
			$updateOrdersResult = true;
		}

		if($updateOrdersResult) {
			// Delete order_details if delete old order_details
			$oldOrderDetailList = array();
			$newOrderDetailList = array();
			// Find old order_details
			$sql = "SELECT orddtl_id FROM order_details WHERE ord_id = '$code'";
			$result = mysql_query($sql, $dbConn);
			$rows 	= mysql_num_rows($result);
			for($i=0; $i<$rows; $i++) {
				$oldOrddtlRecord = mysql_fetch_assoc($result);
				array_push($oldOrderDetailList, $oldOrddtlRecord['orddtl_id']);
			}
			// Find new order_detail
			foreach ($formData['orddtl_id'] as $key => $newOrddtl_id) {
				array_push($newOrderDetailList, $newOrddtl_id);
			}
			// Check for delete 
			foreach ($oldOrderDetailList as $key => $oldOrddtl_id) {
				if(!in_array($oldOrddtl_id, $newOrderDetailList)) {
					// Delete order_details
					$orderDetailRecord 	= new TableSpa('order_details', $oldOrddtl_id);
					if(!$orderDetailRecord->delete()) {
						$updateOrdersDetailResult = false;
						$updateOrdersDetailError .= "DELETE_ORDERS_DETAIL[$oldOrddtl_id]_FAIL\n";
					}
				}
			}

			
			// Update or Add order_details
			$updateOrdersDetailResult = true;
			$updateOrdersDetailError  = '';

			foreach ($formData['prd_id'] as $key => $prd_id) {
				$orddtl_amount 	= $formData['prd_qty'][$key];

				if(isset($formData['orddtl_id'][$key])) {
					// Update order_details
					$orddtl_id = $formData['orddtl_id'][$key];
					$orderDetailRecord 	= new TableSpa('order_details', $orddtl_id);
					$orderDetailRecord->setFieldValue('prd_id', $prd_id);
					$orderDetailRecord->setFieldValue('orddtl_amount', $orddtl_amount);
					if(!$orderDetailRecord->commit()) {
						$updateOrdersDetailResult = false;
						$updateOrdersDetailError .= 'EDIT_ORDERS_DETAIL['.($key+1).']_FAIL\n';
					}
				} else {
					// Add new order_details
					$orddtlValues 		= array($code, $prd_id, $orddtl_amount);
					$orderDetailRecord 	= new TableSpa('order_details', $orddtlValues);
					if(!$orderDetailRecord->insertSuccess()) {
						$updateOrdersDetailResult = false;
						$updateOrdersDetailError .= 'ADD_ORDERS_DETAIL['.($key+1).']_FAIL\n';
					}
				}
			}

			if($updateOrdersDetailResult) {
				// Edit order and order_details success
				$response['status'] = 'EDIT_PASS';
				echo json_encode($response);
			} else {
				// Edit order_details fail
				$response['status'] = $updateOrdersDetailError;
				echo json_encode($response);
			}

		} else {
			// Edit orders fail
			$response['status'] = 'EDIT_ORDERS_FAIL';
			echo json_encode($response);
		}


	}
}
?>