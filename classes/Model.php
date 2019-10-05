<?php
require_once( 'DbConnection.php' );

class Model extends DbConnection{

    public function view_all(){
        $conn = $this->create_connection();
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $query = "SELECT * FROM products";
        $handle = $conn->prepare( $query );
        $handle->execute();
        $results = $handle->fetchAll( PDO::FETCH_ASSOC );
 
        $conn = null;
        return $results;
    }

    public function add_product( $post ){
    	$conn = $this->create_connection();
    	
		$query = "INSERT INTO products
		(product_number, product_name, description, cost_price, quantity_in_stock) 
		VALUES(?,?,?,?,?)";
		$handle = $conn->prepare( $query );
		$handle->bindValue( 1, $post['product_number'] );
		$handle->bindValue( 2, $post['product_name'] );
		$handle->bindValue( 3, $post['description'] );
		$handle->bindValue( 4, $post['cost_price'] );
		$handle->bindValue( 5, $post['quantity_in_stock'] );
		
		$result = $handle->execute();

        if( $result ){
        	return 'Product sucsessfully added.';
        }else{
        	return 'There was an error, your product was not added. Please try again.';
        }
		

    }
}