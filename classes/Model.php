<?php
require_once( 'DbConnection.php' );

class Model extends DbConnection{

    public function view_all(){
        $conn = $this->create_connection();
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $query = "SELECT * FROM products";
        $handler = $conn->prepare( $query );
        $handler->execute();
        $results = $handler->fetchAll( PDO::FETCH_ASSOC );

        return $results;
    }

    public function add_new(){
    	$conn = $this->create_connection();
    }
}