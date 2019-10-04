<?php require_once( 'header.php' ); ?>
<?php 

if( isset( $_SESSION['PRIVELIGES'] ) && $_SESSION['PRIVELIGES'] == '2' ){
    header( "Location:" . $_SERVER['DOCUMENT_ROOT'] . '/factoryInventoryApp/index.php' );
}

if( empty( $_SESSION ) || !isset( $_SESSION['PRIVELIGES'] ) ){
    header( "Location:" . $_SERVER['DOCUMENT_ROOT'] . '/factoryInventoryApp/index.php' );
}

?>
<?php require_once( 'footer.php' ); ?>



