<?php require_once( 'header.php' ); ?>
<?php require_once( $_SERVER['DOCUMENT_ROOT'] . '/factoryInventoryApp/classes/Model.php'  ); ?>
<?php require_once( $_SERVER['DOCUMENT_ROOT'] . '/factoryInventoryApp/classes/DataValidationSanitization.php'  ); ?>

<?php
if( isset( $_SESSION['PRIVELIGES'] ) && $_SESSION['PRIVELIGES'] == '2' ){
    header( "Location:" . $_SERVER['DOCUMENT_ROOT'] . '/factoryInventoryApp/index.php' );
}

if( empty( $_SESSION ) || !isset( $_SESSION['PRIVELIGES'] ) ){
    header( "Location:" . $_SERVER['DOCUMENT_ROOT'] . '/factoryInventoryApp/index.php' );
}

?>

<?php 
if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset( $_POST['product_number'] ) ){
    $model = new Model();
    $input_checks = new DataValidationSanitization();
    $errors = '';
    $post = filter_var_array( $_POST, FILTER_SANITIZE_STRING );

    //blank fields
    $errors .= $input_checks->is_blank_field( $post );
    
    //data validation

    $errors .= $input_checks->is_whole_number( $post['product_number'], 'Product Number' );
    $errors .= $input_checks->is_a_string( $post['product_name'], 'Product Name' );
    $errors .= $input_checks->is_a_string( $post['description'], 'Description' );
    $errors .= $input_checks->is_price( $post['cost_price'], 'Cost Price' );
    $errors .= $input_checks->is_whole_number( $post['quantity_in_stock'], 'Quanitiy in Stock' );


    if( strlen( $errors) > 0 ){
        echo '<h4>Please review these errors in your form</h4>';
        echo '<p>' . $errors . '</p>';
    }else{
        $model->add_product( $post );
    }
}
?>

<div>
    <h3>Add a product</h3>
    <form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <table class="form-table">
          <tbody>
            <tr>
              <th>
                Product Number:
              </th>
              <td>
                <input type="text" name="product_number" placeholder="Product Number">
              </td>
            </tr>
            <tr>
              <th>
                Product Name:
              </th>
              <td>
                <input type="text" name="product_name" placeholder="Product Name">
              </td>
            </tr>
            <tr>
              <th>
                Description:
              </th>
              <td>
                <input type="text" name="description" placeholder="Description">
              </td>
            </tr> 
            <tr>
              <th>
                Cost Price:
              </th>
              <td>
                <input type="text" name="cost_price" placeholder="Cost Price">
              </td>
            </tr> 
            <tr>
              <th>
                Quantity In Stock:
              </th>
              <td>
                <input type="text" name="quantity_in_stock" placeholder="Quantity in Stock">
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

<?php require_once( 'footer.php' ); ?>



