<?php 
require_once( 'templates/header.php' );
require_once( 'classes/appSetUp.php' ); 


//create instance of appsetup
$app_setup = new AppSetUp();

//returns boolean - checks existence of database
$db_exists = $app_setup->check_db_exists();

if( $db_exists == false ){
    header("Location:templates/appSetUp");
}else{
	require_once( 'templates/header.php' );
	require_once( 'templates/menu.php' );
}

if( isset( $_SESSION['ERROR_MESSAGE'] ) ){
    unset( $_SESSION['ERROR_MESSAGE'] );
}

require_once( 'templates/footer.php' );


