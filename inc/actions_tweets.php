<?php
require_once 'bootstrap.php';

$action = request()->get('action');
$tweet_id = request()->get('tweet_id');
$tweet = request()->get('tweet');
$user_id = decodeAuthCookie('auth_user_id');

$url="../index.php";

switch ($action) {
case "add":
    add_tweet($tweet, $user_id);
    break;
case "delete":
    if (delete_tweet($tweet_id)) {
        $session->getFlashBag()->add('success', 'Tweet deleted');
    } else {
        $session->getFlashBag()->add('error', 'Could not delete tweet');
    }
    break;
}
header("Location: ".$url);
