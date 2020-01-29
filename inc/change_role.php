<?php
require_once 'bootstrap.php';
requireAdmin();

$user = changeRole(request()->get('id'), request()->get('role_id'));

if ($user['role_id'] == 1) {
    $session->getFlashBag()->add('success', 'Successfully promoted user to admin');
} elseif ($user['role_id'] == 0) {
    $session->getFlashBag()->add('success', 'Successfully demoted admin to user');
} else {
    $session->getFlashBag()->add('error', 'Unable to promote/demote user');
}
redirect('/admin.php');
