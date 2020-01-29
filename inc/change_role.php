<?php
require_once 'bootstrap.php';
requireAdmin();

if (changeRole(request()->get('id'), request()->get('role_id'))) {
    $session->getFlashBag()->add('success', 'Successfully promoted/demoted user');
} else {
    $session->getFlashBag()->add('error', 'Unable to promote/demote user');
}
redirect('/admin.php');
