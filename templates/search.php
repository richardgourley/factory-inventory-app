<?php require_once( 'header.php' ); ?>
<?php require_once( ROOT_PATH . 'classes/Model.php'  ); ?>
<?php require_once( ROOT_PATH . 'classes/DataValidationSanitization.php'  ); ?>

<?php
if( empty( $_SESSION ) || !isset( $_SESSION['PRIVELIGES'] ) ){
    header( "Location:" . ROOT_PATH . '/factoryInventoryApp/index.php' );
}
?>

<?php
$model = new Model();
$input_checks = new DataValidationSanitization();
$products_error_message = '';

if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset( $_POST['search_field'] ) ){
	$search_field = htmlentities( $_POST['search_field'], ENT_QUOTES );
	$product = $model->return_product( $search_field ); 
	if( empty( $product ) ){
		$products_error_message = 'Sorry, no products were found. Please search again.';
	}
}

?>

<?php if( $products_error_message !== ''): ?>
<small class="error-message"><?php echo $products_error_message; ?></small>
<?php endif; ?>

<div>
  <h3>Search</h3>
  <form method="post" action="<?php echo htmlentities( $_SERVER['PHP_SELF'], ENT_QUOTES ) ?>">
  	<table class="form-table">
  	  <tbody>
  	  	<tr>
  	  	  <th>
  	  	  	Enter a product name or a product number:
  	  	  </th>
  	  	  <td>
  	  	  	<input type="text" name="search_field">
  	  	  </td>
  	  	</tr>
  	  	<tr>
  	  	  <td>
  	  	  	<input type="submit" name="submit" value="Search">
  	  	  </td>
  	  	</tr>
  	  </tbody>
  	</table>
  </form>
</div>

<?php if( isset( $product['product_name'] ) ): ?>
<div class="product">
  <h3><?php echo htmlentities( $product['product_name'], ENT_QUOTES ) ?></h3>    
  <p>Product Number: <?php echo htmlentities( $product['product_number'], ENT_QUOTES ) ?></p>    
  <p>Description: <?php echo htmlentities( $product['description'], ENT_QUOTES ) ?></p>    
  <p>Cost Price: <?php echo htmlentities( $product['cost_price'], ENT_QUOTES ) ?></p>    
  <p>Quantity In Stock: <?php echo htmlentities( $product['quantity_in_stock'], ENT_QUOTES ) ?></p>    
</div>
<?php endif; ?>

<?php require_once( 'footer.php' ); ?>

