<?php
require('../model/database.php');
require_once('../model/user.php');
require('../model/users_db.php');
require('../model/xecho.php');
require('../model/validation.php');

session_start();
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'profile_page';
    }
}
switch ($action){
    case 'profile_page':
        if(isset($_SESSION['userID'])){
            $user = users_db::get_user_by_id($_SESSION['userID']);
            if (!isset($first_name)) {
                $first_name = $user->getFName();
            }
            if (!isset($last_name)) {
                $last_name = $user->getLName();
            }

            if (!isset($email)) {
                $email = $user->getEmail();
            }
            
            include 'profile.php';
        }
        else{
            header("Location: ../index.php");
        }
        die();
        break;
        
    case 'user_update':
        if(isset($_SESSION['userID'])){
            $first_name = filter_input(INPUT_POST, 'first_name');
            $last_name = filter_input(INPUT_POST, 'last_name');
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            
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
            
            if (
                    $error_first != '' || 
                    $error_last != '' || 
                    $error_email != ''
                ){
                include ("../index.php");
                exit();
            } else {                
                users_db::update_user($_SESSION['userID'], $first_name, $last_name, $email);
                include 'profile/profile.php';
            }
            die();
            break;
        }
}
