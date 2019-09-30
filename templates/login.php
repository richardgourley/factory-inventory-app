<?php require_once( 'header.php' ); ?>

<form method="post" action="<?php echo htmlentities( $_SERVER['PHP_SELF'], ENT_QUOTES ); ?>">
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
          <input type="submit" value="Log In">
        </td>
      </tr>
    </tbody>
  </table>
</form> 

<?php require_once( 'footer.php' ); ?>



