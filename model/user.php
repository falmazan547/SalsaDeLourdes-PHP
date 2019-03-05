<?php

class user {

    private $userID, $fName, $lName, $email, $userName, $password, $profilepic;
    
    public function __construct($userID = -1, $fName, $lName, $email, $userName, $password, $profilepic) {
        $this->userID = $userID;
        $this->fName = $fName;
        $this->lName = $lName;
        $this->email = $email;
        $this->userName = $userName;
        $this->password = $password;
        $this->profilepic = $profilepic;
    }
    public function getUserID() {
        return $this->userID;
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

    public function getUserName() {
        return $this->userName;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getProfilepic() {
        return $this->profilepic;
    }

    public function setUserID($userID) {
        $this->userID = $userID;
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

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setProfilepic($profilepic) {
        $this->profilepic = $profilepic;
    }


}
