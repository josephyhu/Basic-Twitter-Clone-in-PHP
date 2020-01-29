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

function setOwner()
{
    global $db;

    try {
        $sql = 'UPDATE users SET role_id=:role_id WHERE id=:id';
        $results = $db->prepare($sql);
        $results->bindValue('id', 1);
        $results->bindValue('role_id', 2);
        $results->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
        return false;
    }
    return true;
}

function changeRole($user_id, $role_id)
{
    global $db;

    try {
        $sql = 'UPDATE users SET role_id=:role_id WHERE id=:id';
        $results = $db->prepare($sql);
        $results->bindParam('id', $user_id);
        $results->bindParam('role_id', $role_id);
        $results->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
        return false;
    }
    return true;
}

function findUserByUsername($username)
{
    global $db;

    try {
        $sql = 'SELECT * FROM users WHERE username=:username';
        $results = $db->prepare($sql);
        $results->bindParam('username', $username);
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
        $sql = 'SELECT * FROM users WHERE id=:id';
        $results = $db->prepare($sql);
        $results->bindParam('id', $user_id);
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
        $sql = 'INSERT INTO users (username, password, role_id) VALUES (:username, :password, 0)';
        $results = $db->prepare($sql);
        $results->bindParam('username', $username);
        $results->bindParam('password', $password);
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
        $sql = 'DELETE FROM users WHERE id=:id';
        $results = $db->prepare($sql);
        $results->bindParam('id', $user_id);
        $results->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
        return false;
    }
    return true;
}

function delete_all_users()
{
    global $db;

    try {
        $sql = 'DELETE FROM users WHERE role_id<:role_id';
        $results = $db->prepare($sql);
        $results->bindValue('role_id', 2);
        $results->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
        return false;
    }
    return true;
}
