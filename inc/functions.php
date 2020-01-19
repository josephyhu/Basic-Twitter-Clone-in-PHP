<?php
function get_tweets() {
  require_once 'connection.php';

  $sql = 'SELECT tweet FROM tweets ORDER BY id DESC';
  try {
    $results = $db->prepare($sql);
    $results->execute();
  } catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
    return array();
  }
  return $results->fetchAll();
}

function add_tweet($tweet) {
  require_once 'connection.php';

  $sql = 'INSERT INTO tweets (tweet) VALUES (?)';
  try {
    $results = $db->prepare($sql);
    $results->bindValue(1, $tweet, PDO::PARAM_STR);
    $results->execute();
  } catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
    return false;
  }
  return true;
}
