<?php require_once( 'header.php' ); ?>

<?php
if( empty( $_SESSION ) || !isset( $_SESSION['PRIVELIGES'] ) ){
    header( "Location:" . ROOT_PATH . '/factoryInventoryApp/index.php' );
}
?>

<?php require_once( 'footer.php' ); ?>

