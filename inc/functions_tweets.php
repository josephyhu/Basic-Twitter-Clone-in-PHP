<?php
function get_tweets()
{
    global $db;

    try {
      $sql = 'SELECT * FROM tweets ORDER BY id DESC';
      $results = $db->prepare($sql);
      $results->execute();
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage() . "<br>";
      return false;
    }
    return $results->fetchAll();
}

function get_tweets_by_user_id($user_id)
{
    global $db;

    try {
        $sql = 'SELECT * FROM tweets WHERE user_id=:user_id ORDER BY id DESC';
        $results = $db->prepare($sql);
        $results->bindParam('user_id', $user_id);
        $results->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
        return false;
    }
    return $results->fetchAll();
}

function get_tweet($tweet_id)
{
    global $db;

    try {
        $sql = 'SELECT id, tweet FROM tweets WHERE id=:id';
        $results = $db->prepare($sql);
        $results->bindParam('id', $tweet_id);
        $results->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
        return false;
    }
    return $results->fetch();
}

function add_tweet($tweet, $user_id)
{
    global $db;

    try {
      $sql = 'INSERT INTO tweets (tweet, user_id) VALUES (:tweet, :user_id)';
      $results = $db->prepare($sql);
      $results->bindParam('tweet', $tweet);
      $results->bindParam('user_id', $user_id);
      $results->execute();
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage() . "<br>";
      return false;
    }
    return get_tweet($db->lastInsertId());
}

function delete_tweet($tweet_id)
{
    global $db;

    try {
        get_tweet($tweet_id);
        $sql = 'DELETE FROM tweets WHERE id=:id';
        $results = $db->prepare($sql);
        $results->bindParam('id', $tweet_id);
        $results->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
        return false;
    }
    return true;
}
