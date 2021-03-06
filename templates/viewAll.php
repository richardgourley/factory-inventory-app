<?php require_once( 'header.php' ); ?>
<?php require_once( 'menu.php' ); ?>
<?php require_once( SITEPATH . '/classes/Model.php' ); ?>

<?php
if( empty( $_SESSION ) || !isset( $_SESSION['PRIVELIGES'] ) ){
    header( "Location:" . SITE_URL . "/index.php" );
}
?>

<?php 
$model = new Model(); 
$results = $model->view_all();
?>

<div class="products-grid">
  <?php foreach ( $results as $product ): ?>
  <div class="product">
    <p>PRODUCT NUMBER: <?php echo htmlentities( $product['product_number'], ENT_QUOTES ) ?></p>
    <p>NAME: <?php echo htmlentities( $product['product_name'], ENT_QUOTES ) ?></p>
    <p>DESCRIPTION: <?php echo htmlentities( $product['description'], ENT_QUOTES ) ?></p>
    <p>COST PRICE: <?php echo htmlentities( $product['cost_price'], ENT_QUOTES ) ?></p>
    <p>IN STOCK: <?php echo htmlentities( $product['quantity_in_stock'], ENT_QUOTES ) ?></p>
  </div>
  <?php endforeach; ?>
</div>

<?php require_once( 'footer.php' ); ?>






