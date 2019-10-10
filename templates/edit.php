<?php require_once( 'header.php' ); ?>
<?php require_once( ROOT_PATH . 'classes/Model.php' ); ?>
<?php 
require_once( 
	$_SERVER['DOCUMENT_ROOT'] . '/factoryInventoryApp/classes/DataValidationSanitization.php'  
); 
?>


<?php 

if( isset( $_SESSION['PRIVELIGES'] ) && $_SESSION['PRIVELIGES'] == '2' ){
    header( "Location:" . $_SERVER['DOCUMENT_ROOT'] . '/factoryInventoryApp/index.php' );
}

if( empty( $_SESSION ) || !isset( $_SESSION['PRIVELIGES'] ) ){
    header( "Location:" . $_SERVER['DOCUMENT_ROOT'] . '/factoryInventoryApp/index.php' );
}

?>

<?php 
$model = new Model();
$products = $model->view_all();

if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset( $_POST['product_number'] ) ){
    $input_checks = new DataValidationSanitization();
    $errors = '';
    $post = filter_var_array( $_POST, FILTER_SANITIZE_STRING );

    //blank fields
    if( $input_checks->is_blank_field( $post ) ){
        $errors .= 'One or more of your fields was blank.<br>';
    }
    
    //data validation

    if( $input_checks->is_whole_number( $post['product_number'] ) == false ){
        $errors .= 'Your product number field is not a valid number.<br>';
    }
    
    if( $input_checks->is_valid_string( $post['product_name'] ) == false  ){
        $errors .= 'Your product name field is not valid.<br>';
    }

    if( $input_checks->is_valid_string( $post['description'] ) == false ){
        $errors .= 'Your description field is not valid.<br>';
    }

    if( $input_checks->is_price( $post['cost_price'] ) == false  ){
        $errors .= 'Your cost price field should be a whole number or a number with 2 decimal digits.<br>';
    }

    if( $input_checks->is_whole_number( $post['quantity_in_stock'] ) == false ){
        $errors .= 'Your quantity in stock field is not a valid number.<br>';
    }


    if( strlen( $errors) > 0 ){
        echo '<h4>Please review these errors in your form</h4>';
        echo '<p class="error-message">' . $errors . '</p>';
    }else{
        echo $model->update_product( $post ); //returns 'product added ' or error message
        //refresh products
        $products = $model->view_all();
    }
}
?>

<?php foreach( $products as $product ): ?>
<div>
    <h3>Edit a product</h3>
    <form method="post" action="<?php htmlentities( $_SERVER['PHP_SELF'], ENT_QUOTES ); ?>">
        <table class="form-table">
          <tbody>
            <tr>
              <th>
                Product Number:
              </th>
              <td>
                <input type="text" name="product_number" placeholder="Product Number" 
                value="<?php echo htmlentities( $product['product_number'], ENT_QUOTES ); ?>">
              </td>
            </tr>
            <tr>
              <th>
                Product Name:
              </th>
              <td>
                <input type="text" name="product_name" placeholder="Product Name"
                value="<?php echo htmlentities( $product['product_name'], ENT_QUOTES ); ?>">
              </td>
            </tr>
            <tr>
              <th>
                Description:
              </th>
              <td>
                <input type="text" name="description" placeholder="Description"
                value="<?php echo htmlentities( $product['description'], ENT_QUOTES ); ?>">
              </td>
            </tr> 
            <tr>
              <th>
                Cost Price:
              </th>
              <td>
                <input type="text" name="cost_price" placeholder="Cost Price"
                value="<?php echo htmlentities( $product['cost_price'], ENT_QUOTES ); ?>">
              </td>
            </tr> 
            <tr>
              <th>
                Quantity In Stock:
              </th>
              <td>
                <input type="text" name="quantity_in_stock" placeholder="Quantity in Stock"
                value="<?php echo htmlentities( $product['quantity_in_stock'], ENT_QUOTES ); ?>">
              </td>
            </tr> 
            <tr>
              <td>
                <input type="hidden" name="id"
                value="<?php echo htmlentities( $product['id'], ENT_QUOTES ); ?>">
              </td>
            </tr> 
            <tr>
              <td>
                <input type="submit" name="submit" value="Add Product">
              </td>
            </tr> 
          </tbody>
        </table>
    </form>
</div>
<?php endforeach; ?>

<?php require_once( 'footer.php' ); ?>



