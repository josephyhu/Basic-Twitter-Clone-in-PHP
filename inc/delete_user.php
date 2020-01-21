<?php
require_once 'bootstrap.php';
requireAdmin();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

delete_user($id);
header('Location: ../index.php');
