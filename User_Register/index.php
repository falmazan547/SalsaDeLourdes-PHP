<?php
require('../model/database.php');
require('../model/users_db.php');
require('../model/xecho.php');

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
            header("Location: index.php");
        }
        die();
        break;
        
    case 'add_user':
        if(!isset($_SESSION['user_id'])){
            $first_name = filter_input(INPUT_POST, 'first_name');
            $last_name = filter_input(INPUT_POST, 'last_name');
            $uname = filter_input(INPUT_POST, 'username');
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, 'password');
            $first_name = trim($first_name);
            $last_name = trim($last_name);
            $uname = trim($uname);
            
            $error_first = '';
            $error_last = '';
            $error_username = '';
            $error_email = '';
            $error_password_digit = '';
            $error_password_upper = '';
            $error_password_lower = '';
            $error_password_length = '';
            $error_password_special = '';
            
            include 'index.php';
        }
        else{
            header("Location: index.php");
        }
        die();
        break;
        
}
