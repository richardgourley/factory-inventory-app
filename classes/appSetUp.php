<?php
require_once( 'dbConnection.php' );

class AppSetUp extends DbConnection{
    private function check_users_exist(){
        $conn = $this->create_connection();
        $query = "SELECT name FROM my_test.test_table";
        $handle = $conn->prepare( $query );
        $handle->execute();
        $results = $handle->fetchAll( PDO::FETCH_NUM );

        $found_names = [];

        foreach( $results as $user ){
            array_push( $found_names, $user[0] );
        }

        $conn = null;

        if( !in_array( 'Deborah' , $found_names ) ){
            $this->insert_user( 'Deborah' );
        }

        if( !in_array( 'Steven' , $found_names ) ){
            $this->insert_user( 'Steven' );
        }
    }
    
    private function insert_user( $user_details ){
        
    }

    public function app_set_up(){
        
    }
}
