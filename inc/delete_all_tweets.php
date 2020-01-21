<?php
require_once 'bootstrap.php';
requireOwner();

if (delete_all_tweets()) {
    $session->getFlashBag()->add('success', 'Successfully deleted all tweets');
} else {
    $session->getFlashBag()->add('error', 'Unable to delete all tweets');
}

header('Location: ../index.php');
