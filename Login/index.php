<?php
session_start();
require_once('../model/database.php');
require_once('../model/user.php');
require_once('../model/users_db.php');
require('../model/xecho.php');
require('../model/validation.php');


$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'login_page';
    }
}
switch ($action){
    case 'login_page':
        if (!isset($_SESSION['userID'])) {
            if (!isset($email)) {
                $email = '';
            }
            if (!isset($password)) {
                $password = '';
            }
            if (!isset($login_error)) {
                $login_error = '';
            }
            include 'login.php';
        } else {
            session_destroy();
            header("Location: ../index.php");
        }
        die();
        break;
        
    case 'login_attempt':
        if (!isset($_SESSION['userID'])) {
            if (!isset($password)) {
                $password = '';
            }
            if (!isset($email)) {
                $email = '';
            }if (!isset($login_error)) {
                $login_error = '';
            }
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'password');
            if (users_db::login($email, $password)) {
                $user = users_db::get_user_by_email($email);
                $_SESSION['userID'] = $user->getUserID();
                $_SESSION['userType'] = $user->getUserType();
                
                header("Location: ../index.php");
            } else {
                $login_error = "Invalid username or password";
                
                include 'login.php';
            }
        } else{
            header("Location: ../index.php");
        }
        die();
        break;
    case 'logout':
        session_destroy();
        
        header("Location: ../index.php");
        die();
        break;
    
        
}
