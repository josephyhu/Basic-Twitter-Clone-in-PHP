<?php
require_once __DIR__ . '/bootstrap.php';

$user = findUserByUsername(request()->get('username'));

if (empty($user)) {
    $session->getFlashBag()->add('error', 'User not found');
    redirect('/login.php');
}

if (!password_verify(request()->get('password'), $user['password'])) {
    $session->getFlashBag()->add('error', 'Invalid password');
    redirect('/login.php');
}

saveUserData($user);
