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
        $action = 'checkout_view';
    }
}

switch ($action){
    case 'checkout_view':
        if(isset($_SESSION['userID'])){
            $subtotal = 0;
            $count = 0;
            $tax = 0;
            $items = array();
            foreach ($_SESSION['cart'] as $productID => $quantity) {

                $product = product_db::get_product_by_id($productID);
                $price = $product->getPrice();
                $quantity = intval($quantity);

                $line_price = round($price * $quantity, 2);

                $items[$productID]['name'] = $product->getProductName();
                $items[$productID]['list_price'] = $price;
                $items[$productID]['quantity'] = $quantity;
                $items[$productID]['line_price'] = $line_price;
            }


            foreach ($items as $item) {
                $subtotal += $item['list_price'] * $item['quantity'];
                $count += $item['quantity'];
                $_SESSION['CartNum'] = $count;
            }

            $tax = 0.07 * $subtotal;
            $shipping_cost = 10;
            $total = $subtotal + $tax + $shipping_cost;

            include 'confirm.php';
            die();
            break;
        } else{
            header("Location: ../login");
            
        }
        
    case 'confirm':
        
        
        include 'cart_view.php';
        die();
        break;
        
}