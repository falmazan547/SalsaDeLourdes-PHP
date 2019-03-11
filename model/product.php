<?php
class product{
    private $productID, $categoryID, $productName, $price, $description, $date, $image, $categoryName;
    public function __construct($categoryID, $productName, $price, $description, $date, $image, $categoryName) {
        
        $this->categoryID = $categoryID;
        $this->productName = $productName;
        $this->price = $price;
        $this->description = $description;
        $this->date = $date;
        $this->image = $image;
        $this->categoryName = $categoryName;
    }
    public function getProductID() {
        return $this->productID;
    }

    public function getCategoryID() {
        return $this->categoryID;
    }

    public function getProductName() {
        return $this->productName;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getDate() {
        return $this->date;
    }

    public function getImage() {
        return $this->image;
    }

    public function setProductID($productID) {
        $this->productID = $productID;
    }

    public function setCategoryID($categoryID) {
        $this->categoryID = $categoryID;
    }

    public function setProductName($productName) {
        $this->productName = $productName;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setImage($image) {
        $this->image = $image;
    }
    public function getCategoryName() {
        return $this->categoryName;
    }

    public function setCategoryName($categoryName) {
        $this->categoryName = $categoryName;
    }



}