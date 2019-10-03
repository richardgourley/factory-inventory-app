<?php require_once( 'header.php' ); ?>
<?php require_once( $_SERVER['DOCUMENT_ROOT'] . '/factoryInventoryApp/classes/Model.php' ); ?>

<?php 
$model = new Model(); 
$results = $model->view_all();
?>

<?php require_once( 'footer.php' ); ?>






