<?php require_once( 'header.php' ); ?>

<?php if( isset( $_SESSION['ERROR_MESSAGE'] ) ): ?>
<small class="error-message"><?php echo htmlentities( $_SESSION['ERROR_MESSAGE'], ENT_QUOTES ) ?></small>
<?php endif; ?>

<form method="post" 
action="../logInAction.php">
  <table class="form-table">
  	<tbody>
  		<tr>
  		  <th>
  		  	Username:
  		  </th>
  		  <td>
  		  	<input type="text" name="username" value="">
  		  </td>
  		</tr>
  		  <th>
  		  	Password:
  		  </th>
  		  <td>
  		  	<input type="password" name="pword" value="">
  		  </td>
  		<tr>
  		</tr>
  		<tr>
  		  <td>
  		  	<input class="button" type="submit" value="Log In">
  		  </td>
  		</tr>
  	</tbody>
  </table>
</form> 

<?php require_once( 'footer.php' ); ?>



