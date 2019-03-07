<?php
require('../model/database.php');
require('../model/users_db.php');
require('../model/xecho.php');
require('../model/validation.php');

session_start();
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'reg_page';
    }
}
switch ($action){
    case 'reg_page':
        if(!isset($_SESSION['userID'])){
            if (!isset($first_name)) {
                $first_name = '';
            }
            if (!isset($last_name)) {
                $last_name = '';
            }
            if (!isset($username)) {
                $username = '';
            }
            if (!isset($email)) {
                $email = '';
            }
            if (!isset($password)) {
                $password = '';
            }
            include 'user_add.php';
        }
        else{
            header("Location: ../index.php");
        }
        die();
        break;
        
    case 'add_user':
        if(!isset($_SESSION['userID'])){
            $first_name = filter_input(INPUT_POST, 'first_name');
            $last_name = filter_input(INPUT_POST, 'last_name');
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, 'password');
            $first_name = trim($first_name);
            $last_name = trim($last_name);
            
            $email_exists = users_db::email_exists($email);
            
            $error_first = '';
            $error_last = '';
            $error_email = '';
            $error_password_digit = '';
            $error_password_upper = '';
            $error_password_lower = '';
            $error_password_length = '';
            $error_password_special = '';
            
            if(!validation::isBlank($first_name)){
                $error_first = 'You must enter your first name';
            } else if(!validation::isLetters($first_name)){
                $error_first = 'You must enter a valid first name';
            }
            
            if(!validation::isBlank($last_name)){
                $error_last = 'You must enter your last name';
            } else if(!validation::isLetters($last_name)){
                $error_last = 'You must enter a valid last name';
            }
            
            if(!validation::isBlank($email)){
                $error_email = 'You must enter your email address';
            } else if($email_exists !== false){
                $error_email = 'Email already exists';
            } else if (!validation::isMaxLength($email, 320)) {
                $error_email = "Email must be less than 321 characters.";
            }
            
            if (!validation::isMinLength($password, 10)) {
                $error_password_length = "Password must be at least 10 characters.";
            }
            if (!preg_match('/[A-Z]/', $password)) {
                $error_password_upper = "Password must include a uppercase letter.";
            }
            if (!preg_match('/[a-z]/', $password)) {
                $error_password_lower = "Password must include a lowercase letter.";
            }
            if (!preg_match('/\d/', $password)) {
                $error_password_digit = "Password must include at least one number";
            }
            if (!preg_match('/[!@#$%^&*=.-<>]/', $password)) {
                $error_password_special = "Password must include one of these symbols: !@#$%^&*=.-<> ";
            }
            
            if (
                    $error_first != '' || $error_last != '' || $error_email != '' || 
                    $error_password_length != '' || $error_password_lower != '' || 
                    $error_password_upper != '' || $error_password_digit != '' || 
                    $error_password_special != ''
                    ){
                include 'user_add.php';
                exit();
            } else {
                $hashPassword = password_hash($password, PASSWORD_BCRYPT, array('cost' => 11));
                users_db::add_user($first_name, $last_name, $email, $hashPassword);
                include 'confirmation.php';
            }
            die();
            break;
        }
}
