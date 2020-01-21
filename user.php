<?php
require_once 'inc/bootstrap.php';
requireAuth();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$user_id = decodeAuthCookie('auth_user_id');
$user = findUserById($id);
$tweets = get_tweets_by_user_id($id);

$pageTitle = " | " . $user['username'];

include 'inc/header.php';
?>
    <?php
    foreach ($tweets as $item) {
        echo "<p>" . htmlspecialchars($item['tweet']) . "</p>";
        if (isAdmin() && $user_id != 2 || isOwner()) {
            echo "<a href='inc/delete_tweet.php?tweet_id=".$item['id'];
            echo "' onclick=\"return confirm('Do you want to delete this tweet?');\"";
            echo "'>Delete Tweet</a>";
        }
    }
    ?>
<?php include 'inc/footer.php'; ?>
