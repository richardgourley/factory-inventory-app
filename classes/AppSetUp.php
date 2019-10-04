 <?php
require_once( 'DbConnection.php' );

class AppSetUp extends DbConnection{

    public function hash_plain_passwords(){
        $this->check_passwords();
    }
    
    private function check_passwords(){
        $conn = $this->create_connection();
        $search_query = "SELECT * FROM users";
        $handle = $conn->prepare( $search_query );
        $handle->execute();
        $results = $handle->fetchAll( PDO::FETCH_ASSOC );

        foreach( $results as $user ){
            $pword = $user['pword'];
            $pword_info = password_get_info( $pword );

            if( $pword_info['algo'] === 0 || $pword_info['algoName'] === 'unknown' ){
                $hashed_pword = password_hash( $pword, PASSWORD_DEFAULT );
                $this->update_password( $conn, $user, $hashed_pword );
            }
        }

        $conn = null;

    }

    private function update_password($conn, $user, $hashed_pword){
        $query = "UPDATE users SET password = ? WHERE id = ?";
        $handle = $conn->prepare( $query );
        $handle->bindValue( 1, $hashed_pword );
        $handle->bindValue( 2, $user['id'] );
        $result = $handle->execute();
        var_dump( $result ); 
    }

}
