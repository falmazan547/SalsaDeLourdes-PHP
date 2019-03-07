<?php
class validation {
    public static function isBlank($input){
        if ($input === '') {
            return false;
        }
        else{
            return true;
        }        
    }
    
    public static function isLetters($input){
        if (!preg_match('/^[a-zA-Z]+$/', $input)) {
            return false;
        }
        else{
            return true;
        }        
    }
    public static function isMinLength($input, $length){
        if(strlen($input) < $length){
            return false;
        } else{
            return true;
        }
    }
    public static function isMaxLength($input, $length){
        if(strlen($input) > $length){
            return false;
        } else{
            return true;
        }
    }
    public static function isValidUsername($input){
        if (!preg_match('/^[a-zA-Z\d]+$/', $input)) {
            return false;
        } else{
            return true;
        }
    }
    public static function isBetweenLength($input, $min, $max){
        if (strlen($input) < $min || strlen($input > $max)) {
            return false;
        } else{
            return true;
        }
    }
    
}
