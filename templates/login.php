<?php require_once( 'header.php' ); ?>

<?php //<form method="post" action="" 
?>

<?php echo htmlentities( $_SERVER['PHP_SELF'], ENT_QUOTES ); ?>

<form method="post" action="<?php echo htmlentities( $_SERVER['PHP_SELF'], ENT_QUOTES ); ?>">
  <table class="form-table">
  	<tbody>
  	</tbody>
  </table>
</form> 

<?php require_once( 'footer.php' ); ?>



