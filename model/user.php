<?php

class user {

    private $userID, $userType, $fName, $lName, $email, $password, $shipAddressID, $billAddressID;
    
    public function __construct($userID = -1, $userType, $fName, $lName, $email, $password, $shipAddressID, $billAddressID) {
        $this->userID = $userID;
        $this->userType = $userType;
        $this->fName = $fName;
        $this->lName = $lName;
        $this->email = $email;
        $this->password = $password;
        $this->shipAddressID = $shipAddressID;
        $this->billAddressID = $billAddressID;
    }
    public function getUserID() {
        return $this->userID;
    }
    
    public function getUserType() {
        return $this->userType;
    }

    public function getFName() {
        return $this->fName;
    }

    public function getLName() {
        return $this->lName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getShipAddressID() {
        return $this->shipAddressID;
    }

    public function getBillAddressID() {
        return $this->billAddressID;
    }

    public function setUserID($userID) {
        $this->userID = $userID;
    }
    
    public function setUserType($userType) {
        $this->userType = $userType;
    }

    public function setFName($fName) {
        $this->fName = $fName;
    }

    public function setLName($lName) {
        $this->lName = $lName;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setShipAddressID($shipAddressID) {
        $this->shipAddressID = $shipAddressID;
    }

    public function setBillAddressID($billAddressID) {
        $this->billAddressID = $billAddressID;
    }
}