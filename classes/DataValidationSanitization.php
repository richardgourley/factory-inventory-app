<?php

class DataValidationSanitization{
    
    /**
    * returns error message if number is not a whole number
    */
    public function is_whole_number( $var, $input_name ){

        if( is_numeric( $var ) && strpos( $var, '.') == false ){
            return '';
        }

        return 'Your ' . $input_name . ' is not a valid number.<br>';

    }

    public function is_a_string( $var, $input_name ){
        if( is_numeric( $var ) || is_bool( $var ) ){
            return 'Your ' . $input_name . ' is invalid.<br>';
        }

        if( is_string( $var ) ){
            return '';
        }
    }

    public function is_price( $var, $input_name ){
        $pattern = "/^\d+(\.\d{2})?$/";

        if( preg_match( $pattern, $var ) == 1 ){
            return '';
        }

        return 'Your ' . $input_name . ' should be a whole number or a number with 2 decimal digits.<br>'; 
    }

    public function is_blank_field( $post ){
        foreach( $post as $field ){
            if( $field === '' ){
                return 'One or more of your fields was blank.<br>';
            }
        }

        return '';
    }
}