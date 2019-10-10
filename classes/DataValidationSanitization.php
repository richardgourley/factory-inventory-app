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
    * returns error message if number is not a string
    */
    public function is_a_string( $var, $input_name ){
        if( is_numeric( $var ) || is_bool( $var ) ){
            return 'Your ' . $input_name . ' is invalid.<br>';
        }

        if( is_string( $var ) ){
            return '';
        }
    }
    
    /**
    * returns error message if number is not a valid price
    */
    public function is_price( $var, $input_name ){
        $pattern = "/^\d+(\.\d{2})?$/";

        if( preg_match( $pattern, $var ) == 1 ){
            return '';
        }

        return 'Your ' . $input_name . ' should be a whole number or a number with 2 decimal digits.<br>'; 
    }
    
    /**
    * returns error message if any field in array is blank
    */
    public function is_blank_field( $post ){
        foreach( $post as $field ){
            if( $field === '' ){
                return 'One or more of your fields was blank.<br>';
            }
        }

        return '';
    }


}