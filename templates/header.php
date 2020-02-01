<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<title>Factory Inventory App</title>
	<?php 
    session_start();

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
    ?>
	<link rel="stylesheet" href="<?php echo SITE_URL . '/assets/style.css'; ?>">
</head>
<body>
    <h1>Factory Inventory App</h1>
    

