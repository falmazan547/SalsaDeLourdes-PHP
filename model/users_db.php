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
    public static function add_user($fName, $lName, $email, $user, $pw) {
        $db = Database::getDB();
        $query = 'INSERT INTO users
                    (Email, Fname, Lname, Password, Username)
                    VALUES
                    (:email, :fName, :lName, :Password, :userName)';
        $statement = $db->prepare($query);        
        $statement->bindValue(':fName', $fName);
        $statement->bindValue(':lName', $lName);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':userName', $user);
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
                $rows['fName'], 
                $rows['lName'], 
                $rows['email'],
                $rows['userName'], 
                $rows['password'],
                $rows['profilePicture']);

        return $user;
    }
    public static function username_exists($userName) {
        $db = Database::getDB();
        $query = 'Select Username
                    from users 
                    where Username = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $userName);
        $statement->execute();
        $user = $statement->fetch();
        $statement->closeCursor();
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
}

