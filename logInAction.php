<?php
require_once( 'classes/LogIn.php' );

if($_SERVER['HTTP_HOST'] == "localhost"){
	//for local
	define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/factory-inventory-app');
	define('SITEPATH', $_SERVER['DOCUMENT_ROOT'] . '/factory-inventory-app');
}
else{ 
	//for web
	define('SITE_URL', "http://" . $_SERVER['HTTP_HOST']);
	define('SITEPATH', $_SERVER['DOCUMENT_ROOT']);
}

$log_in = new Login();

$is_logged_in = $log_in->verify_login();

if($is_logged_in == false){
	session_start();
	$_SESSION['ERROR_MESSAGE'] = $log_in->get_error_message();
	header( "Location:" . SITE_URL . "/templates/login.php" );
}else{
	session_start();
	$_SESSION['USERNAME'] = $log_in->get_username();
	$_SESSION['PRIVELIGES'] = $log_in->get_priveliges();
	header( "Location:" . SITE_URL . "/index.php" );
}