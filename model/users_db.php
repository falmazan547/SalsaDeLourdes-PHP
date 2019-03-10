<?php

class users_db {
    public static function login($email, $pw) {
        $db = Database::getDB();
        $query = 'SELECT email, Password
                    FROM users
                    WHERE email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(":email", $email);
        $statement->execute();
        $rows = $statement->fetch();
        $statement->closeCursor();

        $email = $rows['email'];
        $pwHash = $rows['Password'];
        return password_verify($pw, $pwHash);
        
    }
    public static function add_user($fName, $lName, $email, $pw) {
        $db = Database::getDB();
        $query = 'INSERT INTO users
                    (email, fName, lName, Password)
                    VALUES
                    (:email, :fName, :lName, :Password)';
        $statement = $db->prepare($query);        
        $statement->bindValue(':fName', $fName);
        $statement->bindValue(':lName', $lName);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':Password', $pw);
        $statement->execute();
        $statement->closeCursor();
    }
    public static function get_user_by_email($email) {
        $db = Database::getDB();
        $query = 'SELECT * 
                    FROM users
                    WHERE email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(":email", $email);
        $statement->execute();
        $rows = $statement->fetch();
        $statement->closeCursor();
        $user = new user(
                $rows['userID'], 
                $rows['firstName'], 
                $rows['lastName'], 
                $rows['email'],
                $rows['password'],
                $rows['shipAddressID'],
                $rows['billAddressID']);

        return $user;
    }
    public static function get_user_by_id($id) {
        $db = Database::getDB();
        $query = 'SELECT * 
                    FROM users
                    WHERE userID = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $rows = $statement->fetch();
        $statement->closeCursor();
        $user = new user(
                $rows['userID'], 
                $rows['firstName'], 
                $rows['lastName'], 
                $rows['email'],
                $rows['password'],
                $rows['shipAddressID'],
                $rows['billAddressID']);

        return $user;
    }
    public static function email_exists($email) {
        $db = Database::getDB();
        $query = 'Select email
                    from users 
                    where email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $email = $statement->fetch();
        $statement->closeCursor();
        return $email;
    }
    public static function update_user($id,$firstName,$lastName,$email){
     $db = Database::getDB();
        $query = 'update users
            set firstName = :firstName,
            lastName = :lastName,
            email = :email
            where userID = :id;';
            
             
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $statement->closeCursor();
        
    }
}

