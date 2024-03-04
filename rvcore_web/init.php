<?php
session_start();
ob_start();
$errors = array();

$current_file_path = $_SERVER['PHP_SELF']; //  echo $current_file_path;
$current_file = explode('/', $_SERVER['SCRIPT_NAME']); //  print_r($current_file);
$current_file = end($current_file);

include_once('database/connect.php');
include_once('function/mysql.php');
include_once('function/function.php');
include_once('function/count.php');
include_once('function/users.php');
include_once('function/forms.php');

date_default_timezone_set('Asia/Kolkata');
if (logged_in() === true) {
	$condition = array(
		'id'  => $_SESSION['rvadminloginId'],
	);
	$tabledata = rowSelect('employees', $condition, 'id', 'emp_fname', 'emp_lname', 'email', 'password', 'contact_number', 'change_password', 'active', 'created_at', 'updated_at','last_password_change','last_login');
	//$userdata = $tabledata['data'][0];
// 	echo $userdata['fname'];
}
?>
