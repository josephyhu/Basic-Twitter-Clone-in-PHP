<?php
require_once 'inc/bootstrap.php';

$user_id = decodeAuthCookie('auth_user_id');
$tweet = filter_input(INPUT_POST, 'tweet', FILTER_SANITIZE_STRING);

if (add_tweet($tweet, $user_id)) {
    header('Location: index.php');
} else {
    $session->getFlashBag()->add('error', 'Unable to add tweet');
}

include 'inc/header.php';
?>
    <?php if (isAuthenticated()) : ?>
    <form action="index.php" method="post">
      <textarea name="tweet" cols="40" rows="4" maxlength="300" placeholder="300 characters max" required></textarea>
      <input type="submit" value="Tweet">
    </form>
    <?php
    foreach (get_tweets() as $item) {
        $user = findUserById($item['user_id']);
            if ($user['id'] == $user_id) {
                echo "<h3><a href='profile.php'>" . $user['username'] . "</a></h3>";
            } else {
                echo "<h3><a href='user.php?id=" . $item['user_id'] . "'>" . $user['username'] . "</a></h3>";
            }
            echo "<p>" . htmlspecialchars($item['tweet']) . "</p>";
    }
    ?>
    <?php else : ?>
    <p>Please <a href="register.php">register</a> and <a href="login.php">login</a> to see the tweets and add your own tweet.</p>
    <?php endif; ?>
<?php include 'inc/footer.php'; ?>
