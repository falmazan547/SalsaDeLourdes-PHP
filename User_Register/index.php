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
        if(!isset($_SESSION['user_id'])){
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
            header("Location: home.php");
        }
        die();
        break;
        
    case 'add_user':
        if(!isset($_SESSION['id'])){
            $first_name = filter_input(INPUT_POST, 'first_name');
            $last_name = filter_input(INPUT_POST, 'last_name');
            $username = filter_input(INPUT_POST, 'username');
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, 'password');
            $first_name = trim($first_name);
            $last_name = trim($last_name);
            $username = trim($username);
            
            $user_exists = users_db::username_exists($username);
            $emailexists = users_db::email_exists($email);
            
            $error_first = '';
            $error_last = '';
            $error_username = '';
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
            } else if(!$email){
                $error_email = 'You must enter a valid email address';
            } else if (!validation::isMaxLength($email, 320)) {
                $error_email = "Email must be less than 321 characters.";
            }
            
            if (!validation::isBlank($username)) {
                $error_username = 'You must enter a user name';
            } else if ($user_exists !== false) {
                $error_username = 'Username already taken';
            } else if (!validation::isValidUserName($username)) {
                $error_username = "Username can only contain letters and numbers.";
            } else if (!validation::isBetweenLength($username, 4, 30)) {
                $error_username = "Username must be between 4 and 30 characters.";
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
                    $error_first != '' || $error_last != '' || 
                    $error_username != '' || $error_email != '' || 
                    $error_password_length != '' || $error_password_lower != '' || 
                    $error_password_upper != '' || $error_password_digit != '' || 
                    $error_password_special != ''
                    ){
                include 'user_add.php';
                exit();
            } else {
                $hashPassword = password_hash($password, PASSWORD_BCRYPT, array('cost' => 11));
                users_db::add_user($first_name, $last_name, $email, $username, $hashPassword);
                include 'confirmation.php';
            }
            die();
            break;
        }
}
