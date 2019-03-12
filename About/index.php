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
        $action = 'about_page';
    }
}
switch ($action){
    case 'about_page':
        include 'about_view.php';
        die();
        break;
}