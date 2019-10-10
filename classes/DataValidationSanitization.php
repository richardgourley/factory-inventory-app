<?php

class DataValidationSanitization{
    
    /**
    * returns error message if number is not a whole number
    */
    public function is_whole_number( $var ){

        if( is_numeric( $var ) && strpos( $var, '.') == false ){
            return true;
        }

        return false;

    }

    /**
    * returns false if string contains non alpha characters
    */
    public function is_valid_string( $var ){

        $pattern = "/[^a-zA-Z ]/";

        if( preg_match( $pattern, $var ) == 1 ){
            return false;
        }

        return true; 
        
    }
    
    /**
    * returns false if number is not a valid price
    */
    public function is_price( $var ){
        $pattern = "/^\d+(\.\d{2})?$/";

        if( preg_match( $pattern, $var ) == 1 ){
            return true;
        }

        return false; 
    }
    
    /**
    * returns error message if any field in array is blank
    */
    public function is_blank_field( $post ){
        foreach( $post as $field ){
            if( $field === '' ){
                return true;
            }
        }

        return false;
    }


}