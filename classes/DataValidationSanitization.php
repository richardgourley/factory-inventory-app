<?php

class DataValidationSanitization{
    
    /**
    * returns error message if number is not a whole number
    */
    public function is_whole_number( $var, $input_name ){

        if( is_numeric( $var ) && strpos( $var, '.') == false ){
            return '';
        }

        return 'Your ' . $input_name . ' is not a valid number';

    }
}