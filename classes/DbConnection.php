<?php

class DbConnection{
    //Enter your mysql login details here here
    private $host_name = '';
    private $db = 'factory_inventory'; //database name
    private $user_name = '';
    private $password = '';

    public function create_connection(){
        $conn = new PDO( 'mysql:host=' . $this->host_name . ';dbname = ' . $this->db . ';', 
            $this->user_name,
            $this->password
        );
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }
}
