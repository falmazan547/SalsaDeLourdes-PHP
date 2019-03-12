<?php
session_start();

require('../model/database.php');
require('../model/users_db.php');
require('../model/xecho.php');
require('../model/validation.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'cart_page';
    }
}

switch ($action){
    case 'cart_page':
        
        $items = array();
        foreach ($_SESSION['cart'] as $product_id => $quantity) {
            // Get product data from db
            $product = product_db::get_all_products();
            $list_price = $product['listPrice'];
            $discount_percent = $product['discountPercent'];
            $quantity = intval($quantity);

            // Calculate discount
            $discount_amount = round($list_price * ($discount_percent / 100.0), 2);
            $unit_price = $list_price - $discount_amount;
            $line_price = round($unit_price * $quantity, 2);

            // Store data in items array
            $items[$product_id]['name'] = $product['productName'];
            $items[$product_id]['description'] = $product['description'];
            $items[$product_id]['list_price'] = $list_price;
            $items[$product_id]['discount_percent'] = $discount_percent;
            $items[$product_id]['discount_amount'] = $discount_amount;
            $items[$product_id]['unit_price'] = $unit_price;
            $items[$product_id]['quantity'] = $quantity;
            $items[$product_id]['line_price'] = $line_price;
        }
        include 'cart_view.php';
        die();
        break;
        
        
}