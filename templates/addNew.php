<?php require_once( 'header.php' ); ?>

<?php
if( isset( $_SESSION['PRIVELIGES'] ) && $_SESSION['PRIVELIGES'] == '2' ){
    header( "Location:" . $_SERVER['DOCUMENT_ROOT'] . '/factoryInventoryApp/index.php' );
}

if( empty( $_SESSION ) || !isset( $_SESSION['PRIVELIGES'] ) ){
    header( "Location:" . $_SERVER['DOCUMENT_ROOT'] . '/factoryInventoryApp/index.php' );
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



