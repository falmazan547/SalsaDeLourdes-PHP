<?php

class cart_db {

    static function cart_add_item($product_id, $quantity) {
        $_SESSION['cart'][$product_id] = round($quantity, 0);

        // Set last category added to cart
        $product = 
        $_SESSION['last_category_id'] = $product['categoryID'];
        $_SESSION['last_category_name'] = $product['categoryName'];
    }

    static function get_cart_items() {
        $items = array();
        foreach ($_SESSION['cart'] as $product_id => $quantity) {
            // Get product data from db
            $product = get_product($product_id);
            $list_price = $product['listPrice'];
            $discount_percent = $product['discountPercent'];
            $quantity = intval($quantity);


            $line_price = round($list_price * $quantity, 2);

            // Store data in items array
            $items[$product_id]['name'] = $product['productName'];
            $items[$product_id]['description'] = $product['description'];
            $items[$product_id]['list_price'] = $list_price;
            $items[$product_id]['unit_price'] = $unit_price;
            $items[$product_id]['quantity'] = $quantity;
            $items[$product_id]['line_price'] = $line_price;
        }
        return $items;
    }

}
