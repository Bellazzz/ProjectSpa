<?php
session_start();
include('../config/config.php');
include('../common/common_header.php');

if(isset($_SESSION['loggedin'])) {
	unset($_SESSION['loggedin']);
}
if(isset($_SESSION['emp_id'])) {
	unset($_SESSION['emp_id']);
}
if(isset($_SESSION['emp_user'])) {
	unset($_SESSION['emp_user']);
}
header("location:login.php");
?>