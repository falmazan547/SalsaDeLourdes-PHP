<?php
class product_db{
    static function get_all_products() {
        $db = Database::getDB();
        $query = '
            SELECT *
            FROM products p
            INNER JOIN categories c
            ON p.categoryID = c.categoryID';
        
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            
            $products = array();
            foreach ($rows as $value) {
                $p = new product(
                        $value['categoryID'],
                        $value['productName'],                        
                        $value['price'], 
                        $value['description'],
                        $value['date'], 
                        $value['image'],
                        $value['categoryName']);
                $p->setProductID($value['productID']);
                $products[] = $p;
            }
            
            
            return $products;
    }
    static function get_product_by_id($productID) {
        $db = Database::getDB();
        $query = '
            SELECT *
            FROM products p
            INNER JOIN categories c
            ON p.categoryID = c.categoryID
            WHERE productID = :productID';
        
            $statement = $db->prepare($query);
            $statement->bindValue(':productID', $productID);
            $statement->execute();
            $value = $statement->fetch();
            $statement->closeCursor();
            $product = new product(
                    $value['categoryID'],
                    $value['productName'],
                    $value['price'], 
                    $value['description'],
                    $value['date'], 
                    $value['image'],
                    $value['categoryName']);
            
             $product->setProductID($value['productID']);
            
            return $product;
    }
    
    
}
