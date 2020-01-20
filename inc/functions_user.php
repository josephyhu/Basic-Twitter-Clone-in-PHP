<?php
function findUserByUsername($username)
{
    global $db;

    try {
        $sql = 'SELECT * FROM users WHERE username = ?';
        $results = $db->prepare($sql);
        $results->bindParam(1, $username);
        $results->execute();
        return $results->fetch();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
    }
}

function findUserById($user_id)
{
    global $db;

    try {
        $sql = 'SELECT * FROM users WHERE id = ?';
        $results = $db->prepare($sql);
        $results->bindParam(1, $user_id);
        $results->execute();
        return $results->fetch();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
    }
}

function createUser($username, $password)
{
    global $db;

    try {
        $sql = 'INSERT INTO users (username, password) VALUES (?, ?)';
        $results = $db->prepare($sql);
        $results->bindParam(1, $username);
        $results->bindParam(2, $password);
        $results->execute();
        return findUserByUsername($username);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
    }
}
