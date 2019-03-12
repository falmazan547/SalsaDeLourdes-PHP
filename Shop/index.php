<?php
session_start();

require_once('../model/database.php');
require_once('../model/user.php');
require_once('../model/users_db.php');
require_once('../model/product_db.php');
require('../model/product.php');
require('../model/xecho.php');
require('../model/validation.php');


$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'products_page';
    }
}
switch ($action){
    case 'products_page':
        
            $products = product_db::get_all_products();
            include 'products.php';
        
        die();
        break;
        
    case 'add_cart_item':
        $productID = filter_input(INPUT_POST, 'product_id');
        $quantity = filter_input(INPUT_POST, 'quantity');
        
        if (!isset($_SESSION['cart']) ) {
            $_SESSION['cart'] = array();
            
            
        }
        
        
        if (isset($_SESSION['cart'][$productID])) {
            
            $_SESSION['cart'][$productID] += round($quantity, 0);
        }
        
        
        
        var_dump($_SESSION['cart']);
        
        
        
        $products = product_db::get_all_products();
        include 'products.php';
        die();
        break;
}
