<?php 
require_once( 'templates/header.php' );
require_once( 'classes/appSetUp.php' ); 

//create instance of appsetup
$app_setup = new AppSetUp();

//returns boolean - checks existence of database
$db_exists = $app_setup->check_db_exists();

//check db exists then check if users with privelige 1 exist in db - if so, display main menu
if( $db_exists == true ){
    if( $app_setup->check_main_admin_exists() == true ){
        require_once( 'templates/menu.php' );
        exit();
    }
}

//set up db if doesnt exist - first time user of app - go to appSetUp.php
if( $db_exists == false ){
    $app_setup->setup_database_and_tables();
    header("Location:templates/appSetUp.php");
}

//if db exists but no user exists - go to appSetUp.php
if( $db_exists == true ){
    if( $app_setup->check_main_admin_exists() == false ){
    	header("Location:templates/appSetUp.php");
    }
}

require_once( 'templates/footer.php' );



