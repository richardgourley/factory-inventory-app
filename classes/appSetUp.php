<?php
require_once( 'dbConnection.php' );

class AppSetUp extends DbConnection{
    private function check_users_exist(){
        $conn = $this->create_connection();
        $query = "SELECT username FROM factory_inventory.users";
        $handle = $conn->prepare( $query );
        $handle->execute();
        $results = $handle->fetchAll( PDO::FETCH_NUM );

        $found_names = [];

        foreach( $results as $user ){
            array_push( $found_names, $user[0] );
        }

        $conn = null;

        if( !in_array( 'mainadmin' , $found_names ) ){
            $this->insert_user( array( 'mainadmin', 'mA99fBBnDfeT4', '1' ) );
        }

        if( !in_array( 'user1' , $found_names ) ){
            $this->insert_user( 'user1', 'cBUoo958uFgT7', '2' );
        }
    }
    
    private function insert_user( $user_details ){
        //$user_details array used to create a new user
    }

    public function app_set_up(){
        
    }
}
