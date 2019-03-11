<?php
session_start();

require_once('model/database.php');
require_once('model/users_db.php');
require_once('model/xecho.php');
require_once('model/validation.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'home_page';
    }
}
switch ($action){
    case 'home_page':
        include 'home.php';
        die();
        break;
        
    
}
