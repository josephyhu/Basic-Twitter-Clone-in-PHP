<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/functions_tweets.php';
require_once __DIR__ . '/functions_user.php';
require_once __DIR__ . '/functions_auth.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
    $db = new PDO("sqlite:".__DIR__."/database.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec( 'PRAGMA foreign_keys = ON;' );
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
    exit;
}

$session = new \Symfony\Component\HttpFoundation\Session\Session();
$session->start();

function request() {
    return \Symfony\Component\HttpFoundation\Request::createFromGlobals();
}

function redirect($path, $extra = []) {
    $response = \Symfony\Component\HttpFoundation\Response::create(null, \Symfony\Component\HttpFoundation\Response::HTTP_FOUND, ['Location' => $path]);
    if (key_exists('cookies', $extra)) {
        foreach ($extra['cookies'] as $cookie) {
            $response->headers->setCookie($cookie);
        }
    }
    $response->send();
    exit;
}

foreach ($session->getFlashBag()->all() as $type => $messages) {
    foreach ($messages as $message) {
        echo '<div class="flash-'.$type.'">'.$message.'</div>';
    }
}
