<?php
require_once( 'dbConnection.php' );

class LogIn extends DbConnection{
    private function get_errors(){
        $errors = '';

        if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
            if( isset( $_POST['username'] ) && isset( $_POST['pword'] ) ){
                $errors .= $this->is_blank( 'username', $_POST['username'] );
                $errors .= $this->is_blank( 'password', $_POST['pword'] );
                if( $errors == '' ){
                    $errors .= $this->check_password( $_POST['username'], $_POST['pword'] );
                }
            }
        }

        return $errors;
    }
}