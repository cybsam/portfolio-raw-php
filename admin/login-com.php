<?php
session_start();
require 'db-con/db_con.php';

$email = $_POST['email'];
$password = $_POST['password'];

if (empty($email)) {
	$_SESSION['email_err'] = 'Email Fild Require.';
	header('location:login.php?email_fild_empty');
}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$_SESSION['email_err'] = 'Valid Email Require';
	header('location:login.php?valid_email_require');
}else if (empty($password)) {
	$_SESSION['pass_err'] = 'Password fild can leave empty';
	header('location:login.php?password_error');
}else{

	$eml_check = "SELECT COUNT(*) AS eml_che, full_name,role FROM users WHERE email='$email'";
	$eml_check_que = mysqli_query($db_con,$eml_check);
	$eml_check_assoc = mysqli_fetch_assoc($eml_check_que);

	if ($eml_check_assoc['eml_che']==1) {
		$sel_eml = "SELECT * FROM users WHERE email='$email'";
		$sel_eml_que = mysqli_query($db_con,$sel_eml);
		$sel_eml_assoc = mysqli_fetch_assoc($sel_eml_que);

		if (password_verify($password, $sel_eml_assoc['password'])) {
			$_SESSION['login_success'] = 'Well Boss';
			$_SESSION['full_name'] = $sel_eml_assoc['full_name'];
			$_SESSION['role'] = $sel_eml_assoc['role'];
			header('location:index.php?welcome');
		}else{
			$_SESSION['pass_err'] = 'Password Not Match';
			header('location:login.php?pass_not_match');
		}
	}else{
		$_SESSION['email_err'] = 'Email Not Found, Register Now';
		header('location:login.php?email_error');
	}
}



?>