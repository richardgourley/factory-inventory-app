<?php
require_once( 'header.php' );
require_once( __DIR__ . "/../classes/AppSetUp.php" );
require_once( __DIR__ . "/../classes/Model.php" );
require_once( __DIR__ . "/../classes/DataValidationSanitization.php" );
$app_setup = new AppSetUp();

$db_exists = $app_setup->check_db_exists();

//check db exists then check if users with privelige 1 exist in db - if so, exit script
if( $db_exists == true ){
    if( $app_setup->check_main_admin_exists() == true ){
        require_once( 'menu.php' );
        exit();
    }
}

//set up db if doesnt exist - first time user of app
if( $db_exists == false ){
    $app_setup->setup_database_and_tables();
}

?>

<h3>Welcome!</h3>
<p>Your database has been set up. You can now register as the main admin.</p>
<p>You will have full priveliges to add and edit products and manage users.</p>

<?php
if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset( $_POST['username'] ) ){
    $model = new Model();
    $input_checks = new DataValidationSanitization();
    $errors = '';
    $post = filter_var_array( $_POST, FILTER_SANITIZE_STRING );

    //blank fields check
    if( $input_checks->is_blank_field( $post ) ){
        $errors .= 'One or more of your fields was blank.<br>';
    }

    //data validation
    if( $input_checks->is_valid_string( $post['username'] ) == false ){
        $errors .= 'Your username is not valid..<br>';
    }

    if( strlen( $errors) > 0 ){
        echo '<h4>Please review these errors in your form</h4>';
        echo '<p class="error-message">' . $errors . '</p>';
    }else{
        var_dump($post);
        //echo $model->add_first_time_user( $post ); //returns 'user added ' or error message
    }

}
?>

<div>
  <form method="post" action="<?php htmlentities( $_SERVER['PHP_SELF'], ENT_QUOTES ); ?>">
    <table class="form-table">
      <tr>
        <th>
          Username (letters or spaces only):
        </th>
        <td>
          <input type="text" name="username" placeholder="Username">
        </td>
      </tr>
      <tr>
        <th>
          Password:
        </th>
        <td>
          <input type="password" name="password" placeholder="Password">
        </td>
      </tr>
      <tr>
        <td>
          <input type="submit" name="submit" value="Create your account">
        </td>
      </tr>
    </table>
  </form>
</div>

<?php require_once( 'footer.php' );

    



