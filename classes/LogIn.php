<?php
require_once( 'DbConnection.php' );

class LogIn extends DbConnection{
    private $error_message;
    private $username;
    private $priveliges;

    public function verify_login(){ //returns true or false
        $this->error_message = $this->get_errors();
        if( $this->error_message == '' ){
            return true;
        }else{
            return false;
        }
    }

    public function get_username(){
        return $this->username;
    }

    public function get_priveliges(){
        return $this->priveliges;
    }

    public function get_error_message(){
        return $this->error_message;
    }

    private function get_errors(){
        $errors = '';

        if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
            if( isset( $_POST['username'] ) && isset( $_POST['pword'] ) ){
                $errors .= $this->verify_password( $_POST['username'], $_POST['pword'] );
            }
        }

        return $errors;
    }

    //return error message, set username and priveliges properties
    private function verify_password( $username, $pword ){
        $conn = $this->create_connection();

        $query = "SELECT * FROM factory_inventory.users WHERE username = ?";
        $handle = $conn->prepare( $query );
        $handle->bindValue( 1, $username );
        $handle->execute();
        $user = $handle->fetchAll( PDO::FETCH_ASSOC );

        $conn = null;

        if( $user ){
            $pword_is_correct = password_verify( $pword, $user[0]['pword'] );
        }

        if( $user == null || $pword_is_correct == false ){
            return 'Username or password is not correct.';
        }

        if( $pword_is_correct ){
            $this->username = $username;
            $this->priveliges = $user[0]['priveliges_id'];
            return '';
        }

    }

}