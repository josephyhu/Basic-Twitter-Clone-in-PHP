<?php
require_once 'bootstrap.php';
requireOwner();

if (delete_all_users()) {
    $session->getFlashBag()->add('success', 'Successfully deleted all users');
} else {
    $session->getFlashBag()->add('error', 'Unable to delete all users');
}

header('Location: ../index.php');
