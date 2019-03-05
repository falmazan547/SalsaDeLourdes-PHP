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
    
    public static function isValidUserName($input){
        if (!preg_match('/^[a-zA-Z\d]+$/', $input)) {
            return false;
        }
        else{
            return true;
        }        
    }
    
}
