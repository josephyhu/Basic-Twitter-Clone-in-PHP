<?php
function getAllUsers()
{
    global $db;

    try {
        $sql = 'SELECT * FROM users ORDER BY id DESC';
        $results = $db->prepare($sql);
        $results->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
    }
    return $results->fetchAll();
}

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
        $sql = 'INSERT INTO users (username, password, role_id) VALUES (?, ?, 0)';
        $results = $db->prepare($sql);
        $results->bindParam(1, $username);
        $results->bindParam(2, $password);
        $results->execute();
        return findUserByUsername($username);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
    }
}

function delete_user($user_id)
{
    global $db;

    try {
        $sql = 'DELETE FROM users WHERE id = ?';
        $results = $db->prepare($sql);
        $results->bindParam(1, $user_id);
        $results->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
        return false;
    }
    return true;
}
