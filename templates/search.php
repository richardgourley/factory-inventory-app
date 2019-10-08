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
$results;

if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset( $_POST['search_field'] ) ){
	$search_field = htmlentities( $_POST['search_field'] );
	$results = $model->search_products( $search_field );
}

?>

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

<?php require_once( 'footer.php' ); ?>

