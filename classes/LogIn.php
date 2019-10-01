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
                    $errors .= $this->verify_password( $_POST['username'], $_POST['pword'] );
                }
            }
        }

        return $errors;
    }

    private function is_blank( $field_name, $field_input ){
        if( $field_input  == '' ){
            return 'The ' . $field_name . ' field must not be empty.';
        }
    }

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
            return '';
        }

    }
}
