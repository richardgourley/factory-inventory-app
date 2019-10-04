<?php require_once( 'config/config.php' ); ?>
<?php require_once( 'templates/header.php' ); ?>
<?php require_once( 'classes/appSetUp.php' ); ?>

<?php
//checks passwords are encrypted and encrypts if necessary
$app = new AppSetUp();
$app->hash_plain_passwords();

if( isset( $_SESSION['ERROR_MESSAGE'] ) ){
    unset( $_SESSION['ERROR_MESSAGE'] );
}

?>

<?php require_once( 'templates/footer.php' ); ?>
