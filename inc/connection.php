<?php

try {
  $db = new PDO("sqlite:".__DIR__."/tweets.db");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
  echo "Error: " . $e->getMessage() . "<br>";
}
