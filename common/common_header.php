<?php
	include('class_database.php');
	include('common_function.php');
	require(WEB_ROOTDIR.'/inc/Smarty-3.1.18/libs/Smarty.class.php');

	$smarty = new Smarty();
	$smarty->setTemplateDir($subDir.'template');
	$smarty->setCompileDir($subDir.'template_c');

	$nowDate = date('Y/m/d');
	$smarty->assign('nowDate', date('Y/m/d'));

	// Session
	if(isset($_SESSION['loggedin'])) {
		$smarty->assign('session_loggedin', $_SESSION['loggedin']);
	}
	if(isset($_SESSION['emp_id'])) {
		$smarty->assign('session_emp_id', $_SESSION['emp_id']);
	}
	if(isset($_SESSION['emp_user'])) {
		$smarty->assign('session_emp_user', $_SESSION['emp_user']);
	}
	if(isset($_SESSION['emp_name'])) {
		$smarty->assign('session_emp_name', $_SESSION['emp_name']);
	}
	if(isset($_SESSION['emp_surname'])) {
		$smarty->assign('session_emp_surname', $_SESSION['emp_surname']);
	}
?>