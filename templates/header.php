<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<title>Factory Inventory App</title>
    <?php require_once( 
        htmlentities( $_SERVER['DOCUMENT_ROOT'], ENT_QUOTES ) . '/factoryInventoryApp/config/config.php' 
    ); ?>
	<link rel="stylesheet" href="<?php echo BASE_URL . 'assets/style.css'; ?>">
</head>
<body>
    <h1>Factory parts inventory app</h1>
    <?php
    
    session_start();
    
    //$_SESSION['user_name'] = 'Jenny';
    
    ?>
    

    <?php if( isset( $_SESSION['USERNAME'] ) ): ?>
    <h3>Welcome back <?php echo htmlentities( $_SESSION['USERNAME'], ENT_QUOTES ); ?></h3>

    <ul>
    	<li><a href="<?php echo BASE_URL . 'index.php'; ?>">Home</a></li>
        <li><a href="<?php echo BASE_URL . 'templates/viewAll.php'; ?>">View all products</a></li>
        <li><a href="<?php echo BASE_URL . 'templates/addNew.php'; ?>">Add new product</a></li>
    	<li><a href="<?php echo BASE_URL . 'templates/edit.php'; ?>">Edit a product</a></li>
    	<li><a href="<?php echo BASE_URL . 'templates/search.php'; ?>">Search</a></li>
    	<li><a href="<?php echo BASE_URL . 'templates/logout.php'; ?>">Logout</a></li>
    </ul>
    <?php else: ?>
    <p>You are not currently logged in.</p>
    <ul>
        <li><a href="<?php echo BASE_URL . 'index.php'; ?>">Home</a></li>
        <li><a href="<?php echo BASE_URL . 'templates/login.php'; ?>">Login</a></li>
    </ul>
    <?php endif; ?>
    
    



