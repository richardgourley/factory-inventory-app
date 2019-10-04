<?php
require_once( 'classes/LogIn.php' );
$log_in = new Login();

$is_logged_in = $log_in->verify_login();

if($is_logged_in == false){
	session_start();
	$_SESSION['ERROR_MESSAGE'] = $log_in->get_error_message();
	header("Location:templates/login.php");
}else{
	session_start();
	$_SESSION['USERNAME'] = $log_in->get_username();
	$_SESSION['PRIVELIGES'] = $log_in->get_priveliges();
	header("Location:index.php");
}