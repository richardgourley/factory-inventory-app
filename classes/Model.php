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

    public function add_user( $post ){
        $conn = $this->create_connection();
        $hashed_password = password_hash( $post['password'], PASSWORD_DEFAULT );
        
        $query = "INSERT INTO users
        (username, pword, priveliges_id) 
        VALUES(?,?,?)";
        $handle = $conn->prepare( $query );
        $handle->bindValue( 1, $post['username'] );
        $handle->bindValue( 2, $hashed_password );
        $handle->bindValue( 3, $post['priveliges_id'] );

        $result = $handle->execute();

        $conn = null;

        if( $result ){
            return 'User successfully added.';
        }else{
            return 'There was an error, your user was not added. Please try again.';
        }
    }

    public function add_first_time_user( $post ){
        $conn = $this->create_connection();
        $hashed_password = password_hash( $post['password'], PASSWORD_DEFAULT );
        
        $query = "INSERT INTO users
        (username, pword, priveliges_id) 
        VALUES(?,?,?)";
        $handle = $conn->prepare( $query );
        $handle->bindValue( 1, $post['username'] );
        $handle->bindValue( 2, $hashed_password );
        $handle->bindValue( 3, 1 );

        $result = $handle->execute();

        $conn = null;

        if( $result ){
            return 'User successfully added.';
        }else{
            return 'There was an error, your user was not added. Please try again.';
        }
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

		$conn = null;

        if( $result ){
        	return 'Product successfully added.';
        }else{
        	return 'There was an error, your product was not added. Please try again.';
        }
		
    }

    public function update_product( $post ){
        $conn = $this->create_connection();
    	
		$query = "UPDATE products 
		SET product_number = ?, product_name = ?, description = ?, cost_price = ?, quantity_in_stock = ?
 		WHERE id = ?";
		$handle = $conn->prepare( $query );
		$handle->bindValue( 1, $post['product_number'] );
		$handle->bindValue( 2, $post['product_name'] );
		$handle->bindValue( 3, $post['description'] );
		$handle->bindValue( 4, $post['cost_price'] );
		$handle->bindValue( 5, $post['quantity_in_stock'] );
		$handle->bindValue( 6, $post['id'] );
		
		$result = $handle->execute();

		$conn = null;

        if( $result ){
        	return 'Product successfully updated.';
        }else{
        	return 'There was an error, your product was not updated. Please try again.';
        }
    }

    //returns a single product or a result of empty
    public function return_product( $search_field ){
        
        $conn = $this->create_connection();
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        
        $query = "SELECT * FROM products WHERE product_name = ? OR product_number = ? LIMIT 1";
        
        $handle = $conn->prepare( $query );
        $handle->bindValue( 1, $search_field );
        $handle->bindValue( 2, $search_field );
        $handle->execute();
        $result = $handle->fetchAll( PDO::FETCH_ASSOC );
 
        $conn = null;
        return $result;
        
    }
}