<?php
require_once 'bootstrap.php';
requireAdmin();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (delete_user($id)) {
    $session->getFlashBag()->add('success', 'Successfully deleted user');
} else {
    $session->getFlashBag()->add('error', 'Unable to delete user');
}
redirect('/admin.php');
