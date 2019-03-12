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
        $action = 'cart_page';
    }
}

switch ($action) {
    case 'cart_page':
        $subtotal = 0;
        $count = 0;
        $items = array();
        if (isset($_SESSION['cart'])) {
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
        }

        include 'cart_view.php';
        die();
        break;
    case 'update_cart':
        $subtotal = 0;
        $count = 0;
        $_SESSION['CartNum'] = 0;
        $items = filter_input(INPUT_POST, 'items', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        foreach ($items as $productID => $quantity) {
            if ($quantity == 0) {
                if (isset($_SESSION['cart'][$productID])) {
                    unset($_SESSION['cart'][$productID]);
                }
            } else {
                if (isset($_SESSION['cart'][$productID])) {
                    $_SESSION['cart'][$productID] = round($quantity, 0);
                }
            }
        }
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

        include 'cart_view.php';
        die();
        break;
}