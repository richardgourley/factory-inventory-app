<?php require_once( 'header.php' ); ?>
<?php require_once( ROOT_PATH . 'classes/Model.php'  ); ?>
<?php require_once( ROOT_PATH . 'classes/DataValidationSanitization.php'  ); ?>

<?php
if( empty( $_SESSION ) || !isset( $_SESSION['PRIVELIGES'] ) ){
    header( "Location:" . ROOT_PATH . '/factoryInventoryApp/index.php' );
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
  	  	  	<input type="text" name="search-field">
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

