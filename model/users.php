<?php

class user {
    private $email,$fName,$lName,$userName,$userID,$password,$profilepic;
    
    public function __construct($email, $fName, $lName, $userName,$password,$profilePicture ,$userID = -1) {
        $this->email = $email;
        $this->fName = $fName;
        $this->lName = $lName;
        $this->userName = $userName;
        $this->userID = $userID;
        $this->profilepic = $profilePicture;
        $this->password = $password;
        
        
    }
    
    public function getEmail() {
        return $this->email;
    }

    public function getFName() {
        return $this->fName;
    }

    public function getLName() {
        return $this->lName;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function getUserID() {
        return $this->userID;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function getProfilepic() {
        return $this->profilepic;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }

    public function setFName($fName) {
        $this->fName = $fName;
    }

    public function setLName($lName) {
        $this->lName = $lName;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function setUserID($userID) {
        $this->userID = $userID;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setProfilepic($profilepic) {
        $this->profilepic = $profilepic;
    }

}