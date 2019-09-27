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
            $this->insert_user( array( 
                'username' => 'mainadmin', 
                'pword' => 'mA99fBBnDfeT4', 
                'priveliges_id' => '1' ) 
            );
        }

        if( !in_array( 'user1' , $found_names ) ){
            $this->insert_user( array( 
                'username' => 'user1', 
                'pword' => 'cBUoo958uFgT7', 
                'priveliges_id' => '2' ) 
            );
        }
    }
    
    private function insert_user( $user_details ){
        $conn = $this->create_connection();

        $hashed_pword = password_hash( $user_details['pword'], PASSWORD_DEFAULT );

        $query = "INSERT INTO factory_inventory.users(username, pword, priveliges_id) VALUES(?, ?, ?)";
        $handle = $conn->prepare( $query );

        $handle->bindValue( 1, $user_details['username'] );
        $handle->bindValue( 2, $hashed_pword );
        $handle->bindValue( 3, $user_details['priveliges_id'] );
        
        $result = $handle->execute();

        $conn = null;
    }

    public function app_set_up(){
        $this->check_users_exist();
    }
}
