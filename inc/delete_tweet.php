<?php
require_once 'bootstrap.php';

$tweet_id = request()->get('tweet_id');
$user_id = decodeAuthCookie('auth_user_id');

if (delete_tweet($tweet_id)) {
    $session->getFlashBag()->add('success', 'Successfully deleted tweet');
} else {
    $session->getFlashBag()->add('error', 'Unable to delete tweet');
}
redirect('/index.php');
