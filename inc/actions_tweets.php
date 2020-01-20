<?php
require_once 'bootstrap.php';

$action = request()->get('action');
$tweet_id = request()->get('tweet_id');
$tweet = request()->get('tweet');
$user_id = decodeAuthCookie('auth_user_id');

$url="../index.php";

switch ($action) {
case "add":
    if (add_tweet($tweet, $user_id)) {
        $session->getFlashBag()->add('success', 'Successfully added tweet');
    } else {
        $session->getFlashBag()->add('error', 'Unable to add tweet');
    }
    break;
case "delete":
    if (delete_tweet($tweet_id)) {
        $session->getFlashBag()->add('success', 'Successfully deleted tweet');
    } else {
        $session->getFlashBag()->add('error', 'Unable to delete tweet');
    }
    break;
}
header("Location: ".$url);
