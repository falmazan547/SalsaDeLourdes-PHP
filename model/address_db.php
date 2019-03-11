<?php
function add_address($userID, $address1, $address2, $city, $state, $zip, $phone) {
    global $db;
    $query = '
        INSERT INTO addresses 
        (userID, address1, address2, city, state, zip, phone)
        VALUES 
        (:userID, :address1, :address2, :city, :state, :zip, :phone)';
    $statement = $db->prepare($query);
    $statement->bindValue(':userID', $userID);
    $statement->bindValue(':address1', $address1);
    $statement->bindValue(':address2', $address2);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':zip', $zip);
    $statement->bindValue(':phone', $phone);
    $statement->execute();
    $addressID = $db->lastInsertId();
    $statement->closeCursor();
    return $addressID;
}

function get_address($address_id) {
    global $db;
    $query = 'SELECT * FROM addresses WHERE addressID = :address_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':address_id', $address_id);
    $statement->execute();
    $address = $statement->fetch();
    $statement->closeCursor();
    return $address;
}

function update_address ($address_id, $line1, $line2,
                         $city, $state, $zip_code, $phone) {
    global $db;
    $query = '
        UPDATE addresses
        SET line1 = :line1,
            line2 = :line2,
            city = :city,
            state = :state,
            zipCode = :zip_code,
            phone = :phone
        WHERE addressID = :address_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':address_id', $address_id);
    $statement->bindValue(':line1', $line1);
    $statement->bindValue(':line2', $line2);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':zip_code', $zip_code);
    $statement->bindValue(':phone', $phone);
    $statement->execute();
    $statement->closeCursor();
}

function disable_or_delete_address($address_id) {
    global $db;
    if (is_used_address_id($address_id)) {
        $query = 'UPDATE addresses SET disabled = 1 WHERE addressID = :address_id';
        $statement = $db->prepare($query);
        $statement->bindValue(":address_id", $address_id);
        $statement->execute();
        $statement->closeCursor();
    } else {
        $query = 'DELETE FROM addresses WHERE addressID = :address_id';
        $statement = $db->prepare($query);
        $statement->bindValue(":address_id", $address_id);
        $statement->execute();
        $statement->closeCursor();
    }
}

function is_used_address_id($address_id) {
    global $db;

    // Check if the address is used as a billing address
    $query1 = "SELECT COUNT(*) FROM orders WHERE billingAddressID = :value";
    $statement1 = $db->prepare($query1);
    $statement1->bindValue(':value', $address_id);
    $statement1->execute();
    $result1 = $statement1->fetch();
    $billing_count = $result1[0];
    $statement1->closeCursor();
    if ($billing_count > 0) { return true; }

    // Check if the address is used as a shipping address
    $query2 = "SELECT COUNT(*) FROM orders WHERE shipAddressID = :value";
    $statement2 = $db->prepare($query2);
    $statement2->bindValue(':value', $address_id);
    $statement2->execute();
    $result2 = $statement2->fetch();
    $ship_count = $result2[0];
    $statement2->closeCursor();
    if ($ship_count > 0) { return true; }

    return false;
}

?>