<?php
session_start();
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

		// Get order product 
		$ordPrdList = Array();
		$ord_id 	= $tableRecord->getFieldValue('ord_id');
		$sql 		=  "SELECT 	od.prd_id,
								od.orddtl_amount 
						FROM 	orders o, order_details od, products p 
						WHERE 	o.ord_id = od.ord_id AND od.prd_id = p.prd_id 
								AND o.ord_id ='$ord_id'";
		$result = mysql_query($sql, $dbConn);
		$rows 	= mysql_num_rows($result);
		$err 	= mysql_error($dbConn);
		for($i=0; $i<$rows; $i++) {
			$orddtlRecord = mysql_fetch_assoc($result);
			$ordPrdList[$orddtlRecord['prd_id']] = array(
				'prd_id' 			=> $orddtlRecord['prd_id'],
				'amount' 			=> $orddtlRecord['orddtl_amount']
			);
		}
		
		// Get received product
		$receivedPrdList = Array();
		$sql = "SELECT  rd.prd_id,
						rd.recdtl_amount 
				FROM 	receives r, receive_details rd 
				WHERE 	r.rec_id = rd.rec_id 
						AND r.ord_id = '$ord_id' AND r.rec_id != '$code'";
		$result = mysql_query($sql, $dbConn);
		$rows 	= mysql_num_rows($result);
		$err 	= mysql_error($dbConn);
		for($i=0; $i<$rows; $i++) {
			$secdtlRecord = mysql_fetch_assoc($result);
			$prd_id 	  = $secdtlRecord['prd_id'];
			if(isset($ordPrdList[$prd_id])) {
				$ordAmount = $ordPrdList[$prd_id]['amount'];
				$recAmount = $secdtlRecord['recdtl_amount'];
				if($ordAmount > $recAmount) {
					$ordPrdList[$prd_id]['amount'] = $ordAmount - $recAmount;
				} else {
					unset($ordPrdList[$prd_id]);
				}
			}
		}

		// Get current receive product
		$recPrdList = array();
		$sum_amount = 0;
		$sql 	= "	SELECT r.recdtl_id,
					r.prd_id,
					r.recdtl_amount,
					r.recdtl_price,
					p.prd_name,
					u.unit_name 
					FROM receive_details r, products p, units u 
					WHERE r.prd_id = p.prd_id AND p.unit_id = u.unit_id 
					AND r.rec_id = '$code'";
		$result = mysql_query($sql, $dbConn);
		$rows 	= mysql_num_rows($result);
		for($i=0; $i<$rows; $i++) {
			array_push($recPrdList, mysql_fetch_assoc($result));
			$recPrdList[$i]['no'] = $i+1;
		}
		
		// Get order date
		$orderRecord 	= new TableSpa('orders', $ord_id);
		$ord_date 	= $orderRecord->getFieldValue('ord_date');
		$smarty->assign('ordPrdList', $ordPrdList);
		$smarty->assign('recPrdList', $recPrdList);
		$smarty->assign('ord_date', date('Y/m/d', strtotime($ord_date)));

	} else if($action == 'VIEW_DETAIL') {
		// Get table receives data
		$tableRecord = new TableSpa($tableName, $code);
		$values      = array();
		foreach($tableInfo['fieldNameList'] as $field => $value) {
			$values[$field] = $tableRecord->getFieldValue($field);
		}
		// Get receives date thai
		$values['rec_date_th'] = dateThaiFormat($values['rec_date']);
		$smarty->assign('values', $values);
						
		// Get detail of receives
		$receiveDetailList = array();
		$sum_amount = 0;
		$sql 	= "	SELECT r.recdtl_amount,
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
						AND o.ord_id = '$ord_id' 
						ORDER BY p.prd_id";
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
					GROUP BY rd.prd_id 
					ORDER BY rd.prd_id";
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
		
		// Update receives
		if(!$tableRecord->commit()) {
			$err = mysql_error($dbConn);
			$response['status'] = "UPDATE_RECEIVES_FAILE : $err";
			echo json_encode($response);
			exit();
		}

		// Get old receive product
		$oldRecDtlList = array();
		$sql = "SELECT rd.recdtl_id, rd.prd_id, rd.recdtl_amount 
					FROM receives r, receive_details rd 
					WHERE r.rec_id = rd.rec_id AND r.rec_id = '$code'";
		$result = mysql_query($sql, $dbConn);
		$rows 	= mysql_num_rows($result);
		for($i=0; $i<$rows; $i++) {
			$recdtlRow = mysql_fetch_assoc($result);
			$oldRecDtlList[$recdtlRow['recdtl_id']] = array(
				'prd_id' 		=> $recdtlRow['prd_id'],
				'recdtl_amount' => $recdtlRow['recdtl_amount']
			);
		}

		// Get edited receive product
		$newRecDtlList = array();
		foreach ($formData['recdtl_id'] as $i => $recdtl_id) {
			$newRecDtlList[$recdtl_id] = array(
				'recdtl_id' 	=> $recdtl_id,
				'recdtl_amount' => $formData['recdtl_amount'][$i],
				'recdtl_price' 	=> $formData['recdtl_price'][$i],
			);
		}

		foreach ($oldRecDtlList as $recdtl_id => $oldRecDtl) {
			$prd_id    = $oldRecDtl['prd_id'];
			$oldAmount = (int)$oldRecDtl['recdtl_amount'];
			$newAmount = (int)$newRecDtlList[$recdtl_id]['recdtl_amount'];
			
			if($newAmount > 0) {
				## Update receive details
				$newPrice = (int)$newRecDtlList[$recdtl_id]['recdtl_price'];
				$recdtlRecord = new TableSpa('receive_details', $recdtl_id);
				$recdtlRecord->setFieldValue('recdtl_amount', $newAmount);
				$recdtlRecord->setFieldValue('recdtl_price', $newPrice);
				if(!$recdtlRecord->commit()) {
					$err = mysql_error($dbConn);
					$response['status'] = "UPDATE_RECEIVE_DETAIL_FAILE : $err";
					echo json_encode($response);
					exit();
				}

				## Update products
				$prdRecord 		= new TableSpa('products', $prd_id);
				$oldPrdAmount 	= (int)$prdRecord->getFieldValue('prd_amount');
				if($newAmount > $oldAmount) {
					##- Add product amount
					$addPrdAmount 	= $newAmount - $oldAmount;
					$newPrdAmount 	= $oldPrdAmount + $addPrdAmount;
					$prdRecord->setFieldValue('prd_amount', $newPrdAmount);
					if(!$prdRecord->commit()) {
						$err = mysql_error($dbConn);
						$response['status'] = "ADD_PRODUCT_AMOUNT_FAILE : $err";
						echo json_encode($response);
						exit();
					}
				} else if($newAmount < $oldAmount) {
					##- Remove product amount
					$removePrdAmount 	= $oldAmount - $newAmount;
					$newPrdAmount 		= $oldPrdAmount - $removePrdAmount;
					$prdRecord->setFieldValue('prd_amount', $newPrdAmount);
					if(!$prdRecord->commit()) {
						$err = mysql_error($dbConn);
						$response['status'] = "REMOVE_PRODUCT_AMOUNT_FAILE : $err";
						echo json_encode($response);
						exit();
					}
				}

			}  else {
				## Delete receive detail
				$recdtlRecord = new TableSpa('receive_details', $recdtl_id);
				if(!$recdtlRecord->delete()) {
					$err = mysql_error($dbConn);
					$response['status'] = "REMOVE_RECEIVE_DETAILS_FAILE : $err";
					echo json_encode($response);
					exit();
				}

				## Remove product amount
				$prdRecord 			= new TableSpa('products', $prd_id);
				$oldPrdAmount 		= (int)$prdRecord->getFieldValue('prd_amount');
				$newPrdAmount 		= $oldPrdAmount - $oldAmount;
				$prdRecord->setFieldValue('prd_amount', $newPrdAmount);
				if(!$prdRecord->commit()) {
					$err = mysql_error($dbConn);
					$response['status'] = "REMOVE_PRODUCT_AMOUNT_FAILE : $err";
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
					AND o.ord_id = '$ord_id' 
					ORDER BY p.prd_id";
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
				GROUP BY rd.prd_id 
				ORDER BY rd.prd_id";
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

		$response['status'] = "EDIT_PASS";
		echo json_encode($response);

	}
}
?>