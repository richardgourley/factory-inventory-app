<?php
class DbConnection{
    private $host_name = 'localhost';
    private $db = 'factory_inventory';
    private $user_name = 'root';
    private $password = '';

    public function create_connection(){
        $conn = new PDO( 'mysql:host=' . $this->host_name . ';dbname=' . $this->db . ';', 
            $this->user_name,
            $this->password
        );
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }

    public function create_connection_without_db(){
        $conn = new PDO( 'mysql:host=' . $this->host_name . ';', 
            $this->user_name,
            $this->password
        );
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }

}