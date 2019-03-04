<?php
class users_db {
    public static function login($user, $pw) {
        $db = Database::getDB();
        $query = 'SELECT Username, Password
            FROM users
            WHERE username = :user';
        $statement = $db->prepare($query);
        $statement->bindValue(":user", $user);
        $statement->execute();
        $rows = $statement->fetch();
        $statement->closeCursor();

        $username = $rows['Username'];
        $pwHash = $rows['Password'];
        return password_verify($pw, $pwHash);
    }
    public static function add_user($fName, $lName, $email, $user, $pw) {
        $db = Database::getDB();
        $query = 'INSERT INTO users
                 (FirstName, LastName, Email, Username, Password)
              VALUES
                 (:fName, :lName, :email, :user, :pw)';
        $statement = $db->prepare($query);        
        $statement->bindValue(':fName', $fName);
        $statement->bindValue(':lName', $lName);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':user', $user);
        $statement->bindValue(':pw', $pw);
        $statement->execute();
        $statement->closeCursor();
    }
    public static function get_user_by_id($id) {
        $db = Database::getDB();
        $query = 'SELECT * FROM users
              WHERE ID = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $rows = $statement->fetch();
        $statement->closeCursor();
        $users = new user(
                $rows['Email'], 
                $rows['Fname'], 
                $rows['Lname'], 
                $rows['Username'], 
                $rows['Password'],
                $rows['ProfilePicture'], 
                $rows['ID']);

        return $users;
    }
}

