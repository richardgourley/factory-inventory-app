 <?php
require_once( 'DbConnection.php' );

class AppSetUp extends DbConnection{

    /***
    @returns bool - if 'factory_inventory db exists or not'
    ***/
    public function check_db_exists(){
        //creates a connection but not to a specific database
        $conn = $this->create_connection_without_db();
        $search_query = "SHOW DATABASES LIKE 'factory_inventory'";
        $handle = $conn->prepare( $search_query );
        $handle->execute();
        $results = $handle->fetchAll( PDO::FETCH_ASSOC );

        $conn = null;

        if( count( $results ) == 0 ){
            return false;
        }else{
            return true;
        }
    }

    /***
    @returns bool 
    Says if 1 or more user in db has priveliges_id of 1 (master priveliges)
    ***/
    public function check_main_admin_exists(){
        $conn = $this->create_connection();
        $search_query = "SELECT * FROM users WHERE priveliges_id = 1";
        $handle = $conn->prepare( $search_query );
        $handle->execute();
        $results = $handle->fetchAll( PDO::FETCH_ASSOC );
            
        if( count( $results ) > 0 ){
            return true;
        }else{
            return false;
        }
        
    }
    
    public function setup_database_and_tables(){
        $this->setup_database();
        $this->setup_tables_insert_priveliges();
    }

    private function setup_database(){
        $conn = $this->create_connection_without_db();
        $query = "CREATE DATABASE factory_inventory";
        $handle = $conn->prepare($query);
        $result = $handle->execute();

        $conn = null; 
    }

    private function setup_tables_insert_priveliges(){
        $conn = $this->create_connection();
        $query = 
        " 
            CREATE TABLE users(
             id SMALLINT NOT NULL AUTO_INCREMENT, 
             username VARCHAR(100) NOT NULL, 
             pword VARCHAR(100) NOT NULL, 
             priveliges_id SMALLINT NOT NULL, 
             PRIMARY KEY(id) 
            );

            CREATE TABLE products(
             id INT NOT NULL AUTO_INCREMENT,
             product_name VARCHAR(100) NOT NULL,
             product_number INT NOT NULL, 
             description TEXT NOT NULL,
             cost_price DECIMAL(10,2) NOT NULL,
             quantity_in_stock INT NOT NULL,
             PRIMARY KEY(id)
            );

            CREATE TABLE priveliges(
              id SMALLINT NOT NULL,
              priveliges_name VARCHAR(60) NOT NULL,
              PRIMARY KEY(id) 
            );

            INSERT INTO priveliges(id, priveliges_name) 
            VALUES
            (1, 'master'),
            (2, 'view_only');

        ";
        $handle = $conn->prepare( $query );
        $result = $handle->execute();
        
        $conn = null;
        
    }

}
