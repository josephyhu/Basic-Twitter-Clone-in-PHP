<?php
require_once 'inc/bootstrap.php';
requireAuth();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$user = findUserById($id);
$tweets = get_tweets_by_user_id($id);

$pageTitle = " | " . $user['username'];

include 'inc/header.php';
?>
    <?php
    foreach ($tweets as $item) {
        echo "<p>" . htmlspecialchars($item['tweet']) . "</p>";
    }
    ?>
<?php include 'inc/footer.php'; ?>
