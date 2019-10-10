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
$errors = '';

if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset( $_POST['search_field'] ) ){
    $search_field = htmlentities( $_POST['search_field'], ENT_QUOTES );
    
    if( $input_checks->is_blank_field( array( $search_field ) ) ){
        $errors .= 'Your search field was blank.<br>';
    }

    if( $errors == ''){
        if( $input_checks->is_whole_number( $search_field ) || $input_checks->is_valid_string( $search_field ) ){
            $product = $model->return_product( $search_field );

        }else{
            $errors .= 'Your input should contain only letters or be a whole number.';
        }
    }

}

?>

<?php if( $errors !== ''): ?>
<small class="error-message"><?php echo $errors; ?></small>
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

<?php if( isset( $product ) && !isset( $product[0]['product_name'] ) ): ?>
  <h3>Sorry, no products match your search</h3>        
<?php endif; ?>

<?php if( isset( $product ) && isset( $product[0]['product_name'] ) ): ?>
<div class="product">
  <h3><?php echo htmlentities( $product[0]['product_name'], ENT_QUOTES ) ?></h3>    
  <p>Product Number: <?php echo htmlentities( $product[0]['product_number'], ENT_QUOTES ) ?></p>    
  <p>Description: <?php echo htmlentities( $product[0]['description'], ENT_QUOTES ) ?></p>    
  <p>Cost Price: <?php echo htmlentities( $product[0]['cost_price'], ENT_QUOTES ) ?></p>    
  <p>Quantity In Stock: <?php echo htmlentities( $product[0]['quantity_in_stock'], ENT_QUOTES ) ?></p>    
</div>
<?php endif; ?>

<?php require_once( 'footer.php' ); ?>

